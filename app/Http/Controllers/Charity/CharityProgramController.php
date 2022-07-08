<?php

namespace App\Http\Controllers\Charity;

use App\Models\Role;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use App\Models\Charity\Charity;
use App\Models\ProgramDonation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\Charity\CharityProgram;
use Illuminate\Support\Facades\Storage;
use App\Models\Charity\CharityFollowers;
use App\Http\Requests\Charity\CharityProgramRequest;
use App\Models\Benefactor;
use Symfony\Component\HttpFoundation\Response as ResponseCode;

class CharityProgramController
{
    public function index(int $id): Response
    {
        $charity =  Charity::query()
            ->findOrFail($id);

        $seeFollowOrUnfollow = false;
        $canFollow = false;

        if (Auth::user()->role_id == Role::USERS['BENEFACTOR']) {
            $seeFollowOrUnfollow = true;

            $canFollow = CharityFollowers::query()
                ->where('charity_id', $id)
                ->where('benefactor_id', Auth::id())
                ->exists();
        }

        return Inertia::render('Charity/Program/Index',[
            'programs' => CharityProgram::where(
                    'charity_id', $id
                )->latest()->get(),
            'charity' => $charity,
            'can' => [
                'access' => Auth::id() ==  $charity->id,
                'seeFollowOrUnfollow' =>  $seeFollowOrUnfollow,
                'follow' => $canFollow
            ]
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Charity/Program/Create',[
            'csrfToken' => csrf_token(),
        ]);
    }

    public function store(CharityProgramRequest $request): RedirectResponse
    {
        $link = '';
        $id = Auth::id();

        if($request->hasFile('header'))
        {
            $file = $request->file('header');
            $filename = $file[0]->getClientOriginalName();

            $temporaryFile = TemporaryFile::where('filename',$filename)
                ->where('file_type','program-header')
                ->latest()
                ->first()
                ->getRawOriginal();

            Storage::move('tmp/program/'.$temporaryFile['folder'].'/'.$temporaryFile['filename'], 
            'public/charity/'.$id.'/program'.'/'.$filename);
            //this doesn't work
            Storage::deleteDirectory('tmp/program/'.$temporaryFile['folder']);

            TemporaryFile::where('filename',$filename)
                ->where('file_type','program-header')
                ->latest()
                ->first()
                ->delete();

            //delete temporary
            $link = '/storage/charity/'. $id .'/'.'program/'.$filename;
        }

        CharityProgram::create(
           array_merge(
            $request->validated(),
            [
                'header' => $link,
                'total_needed_amount' => collect($request->expenses)->pluck('amount')->sum()
            ]
           )
        );

        return to_route('charity.program.index', Auth::id());
    }

    public function show(int $id): Response
    {
        $program = CharityProgram::with('charity:id,name,eth_address')->findOrFail($id);

        $donation = ProgramDonation::query()
            ->selectRaw("sum(amount) as total_donation")
            ->selectRaw('count(distinct benefactor_id) as total_donors')
                ->where('charity_program_id', $id)
            ->first()
            ->toArray();

        return Inertia::render(
            'Charity/Program/Show',
            [
                'program' => $program,
                'stats' => $donation,
                'can' => [
                    'modify' =>  $program->charity_id == Auth::id()
                ]
            ]
        );
    }

    public function edit(int $id): Response
    {
        $program = CharityProgram::findOrFail($id);

        abort_if($program->charity_id != Auth::id(), ResponseCode::HTTP_FORBIDDEN);

        return Inertia::render(
            'Charity/Program/Edit',
            ['program' => $program]
        );
    }

    public function update(CharityProgramRequest $request, int $id): RedirectResponse
    {
        $program = CharityProgram::findOrFail($id);

        abort_if($program->charity_id != Auth::id(), ResponseCode::HTTP_FORBIDDEN);

        $program->update(
            array_merge(
                $request->validated(),
                [
                    'total_needed_amount' => collect($request->expenses)
                        ->pluck('amount')
                        ->sum()
                ]
            )
        );

        return to_route('charity.program.index', Auth::id());
    }

    public function destroy(int $id): RedirectResponse
    {
        $program = CharityProgram::findOrFail($id);

        abort_if($program->charity_id != Auth::id(), ResponseCode::HTTP_FORBIDDEN);

        ProgramDonation::where('charity_program_id', $id)->delete();

        $program->delete();

        return to_route('charity.program.index', Auth::id());
    }

    public function supporters(int $id)
    {
        $program = CharityProgram::query()
            ->with(['charity:id,name,eth_address',
                'supporters',
            ])
            ->findOrFail($id);

        $program->load(['supporters.benefactor' => function ($query) use ($id) {
            $query->whereIn('id', function($query) use ($id) {
                $query->select('benefactor_id')
                    ->from('program_donations')
                    ->where('charity_program_id', (int) $id)
                    ->where('is_anonymous', 0)
                    ->get();
            });
        }]);


        $donation = ProgramDonation::query()
            ->selectRaw("sum(amount) as total_donation")
            ->selectRaw('count(distinct benefactor_id) as total_donors')
                ->where('charity_program_id', $id)
            ->first()
            ->toArray();

        return Inertia::render(
            'Charity/Program/Supports',
            [
                'program' => $program,
                'stats' => $donation,
                'can' => [
                    'modify' =>  $program->charity_id == Auth::id()
                ]
            ]
        );
    }

    public function uploadProgramPhoto(Request $request){

        if($request->hasFile('header'))
        {
            $file = $request->file('header');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('tmp/program/'. $folder ,$filename);

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename,
                'file_type' => 'program-header'
            ]);

            return '200';
        }

        return '500';
    }

    public function uploadProgramPhotoRevert(Request $request)
    {
        try{
            $filename = $request['filename'];
            $folder = TemporaryFile::where('filename',$filename)->pluck('folder')->first();
            TemporaryFile::where('filename',$filename)->first()->delete();

             Storage::deleteDirectory('/tmp/program/'.$folder);

            return 200;
        }catch(\Exception $e){
            return 500;
        }
    }

    public function request(Request $request, $id)
    {
        $request->validate([
            'amount' => ['required', 'int', 'min:0']
        ]);

        CharityProgram::query()
            ->findOrFail($id)
            ->update([
                'has_withdraw_request' => true,
                'withdraw_request_amount' => $request->amount,
                'withdraw_requested_at' => now(),
            ]);
    }

    public function cancel(int $id)
    {
        CharityProgram::query()
            ->findOrFail($id)
            ->update([
                'has_withdraw_request' => false,
                'withdraw_request_amount' => 0,
                'withdraw_requested_at' => null,
            ]);
    }
}
