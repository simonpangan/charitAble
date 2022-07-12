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
                )->latest()->paginate(15),
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
        $charity = Charity::find(Auth::id());

        abort_if(is_null($charity->charity_verified_at), 403);

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

        $programStats = ProgramDonation::query()
            ->select(['amount','benefactor_id'])
            ->where('charity_program_id', $id)
            ->get();

        $stats['total_donation'] = $programStats->sum('amount');
        $stats['total_donors'] = $programStats->unique('benefactor_id')->count();

        return Inertia::render(
            'Charity/Program/Show',
            [
                'program' => $program,
                'stats' => $stats,
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

        $programStats = ProgramDonation::query()
            ->select(['amount','benefactor_id'])
            ->where('charity_program_id', $id)
            ->get();

        $stats['total_donation'] = $programStats->sum('amount');
        $stats['total_donors'] = $programStats->unique('benefactor_id')->count();

        return Inertia::render(
            'Charity/Program/Supports',
            [
                'program' => $program,
                'stats' => $stats,
                'can' => [
                    'modify' =>  $program->charity_id == Auth::id()
                ]
            ]
        );
    }

    public function gallery(int $id){
        $program = CharityProgram::with('charity:id,name,eth_address')->findOrFail($id);

        $programStats = ProgramDonation::query()
            ->select(['amount','benefactor_id'])
            ->where('charity_program_id', $id)
            ->get();

        $stats['total_donation'] = $programStats->sum('amount');
        $stats['total_donors'] = $programStats->unique('benefactor_id')->count();

        return Inertia::render(
            'Charity/Program/Gallery',
            [
                'program' => $program,
                'stats' => $stats,
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

    public function withdrawRequest(Request $request, $id)
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

    public function cancelWithdrawRequest(int $id)
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
