<?php

namespace App\Http\Controllers\Charity;

use App\Models\Role;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Benefactor;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use Illuminate\Support\Carbon;
use App\Models\Charity\Charity;
use App\Models\ProgramDonation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\Charity\CharityProgram;
use Illuminate\Support\Facades\Storage;
use App\Models\Charity\CharityFollowers;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Charity\CharityProgramRequest;
use App\Models\Charity\CharityPosts;
use Symfony\Component\HttpFoundation\Response as ResponseCode;

class CharityProgramController
{
    public function index(Request $request, int $id)
    {
        $charity =  Charity::query()
            ->findOrFail($id);


        if (is_null($charity->charity_verified_at)) {
            return back();
        }

        $seeFollowOrUnfollow = false;
        $canFollow = false;

        if (Auth::user()->role_id == Role::USERS['BENEFACTOR']) {
            $seeFollowOrUnfollow = true;

            $canFollow = CharityFollowers::query()
                ->where('charity_id', $id)
                ->where('benefactor_id', Auth::id())
                ->exists();
        }

        $latestFiveActivePrograms = CharityProgram::query()
            ->where('charity_id' , $id)
            ->where('is_active', true)
            ->latest()
            ->limit(5)
            ->get();


        $list = CharityProgram::where('charity_id', $id)
            ->when($request->status, function ($query, $status) {
                if ($status == 'Inactive') 
                {
                    $query->where('is_active', false);
                } else if ($status == 'Active') {
                    $query->where('is_active', true);
                }
            })
            ->latest()
            ->paginate(16);

        return Inertia::render('Charity/Program/Index',[
            'programs' => $list,    
            'charity' => $charity,
            'filter' => ($request->status) ? $request->status : 'All',
            'latestFiveActivePrograms' => $latestFiveActivePrograms,
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

            Storage::move(
                'tmp/program/'.$temporaryFile['folder'].'/'.$temporaryFile['filename'],
                "public/charity/{$id}/program/".Carbon::now()->timestamp.".{$file[0]->getClientOriginalExtension()}"
            );

            Storage::deleteDirectory('tmp/program/'.$temporaryFile['folder']);

            TemporaryFile::where('filename',$filename)
                ->where('file_type','program-header')
                ->latest()
                ->first()
                ->delete();


            $link = "/storage/charity/{$id}/program/".Carbon::now()->timestamp. ".{$file[0]->getClientOriginalExtension()}";
        }

        CharityProgram::create(
           array_merge(
            $request->validated(),
            [
                'header' => $link,
                'total_needed_amount' => collect($request->expenses)->pluck('amount')->sum(),
                'is_active' => true,
                'updates' => [
                    array_merge($request->validated(), [
                        'created_at' => now()
                    ])
                ]
            ]
           )
        );

        return to_route('charity.program.index', Auth::id());
    }

    public function show(int $id)
    {
        $program = CharityProgram::with('charity:id,name,eth_address,charity_verified_at')->findOrFail($id);

        if (is_null($program->charity->charity_verified_at)) {
            return back();
        }

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

        $updates = collect($program->updates);

        $updates->push($program->getChanges());
        
        $program->update([
            'updates' => $updates 
        ]);

        return to_route('charity.program.index', Auth::id());
    }

    public function destroy(int $id): RedirectResponse
    {
        $program = CharityProgram::findOrFail($id);

        abort_if($program->charity_id != Auth::id(), ResponseCode::HTTP_FORBIDDEN);

        if (! is_null($program->header) &&
                //for demonstration purpose only
            $program->header != 'https://andscape.com/wp-content/uploads/2019/02/GettyImages-1125042094-e1550278649308.jpg?w=700'
        ) {
            unlink(substr($program->header, 1));
        }

        ProgramDonation::where('charity_program_id', $id)->delete();

        $program->delete();

        return to_route('charity.program.index', Auth::id());
    }

    public function supporters(int $id)
    {
        $program = CharityProgram::query()
            ->with(['charity:id,name,eth_address,charity_verified_at',
                'supporters',
            ])
            ->findOrFail($id);  

        if (is_null($program->charity->charity_verified_at)) {
            return back();
        }

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
        $posts = CharityPosts::where('charity_programs_id',$id)->get()->toArray();

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
                'posts' => $posts,
                'stats' => $stats,
                'can' => [
                    'modify' =>  $program->charity_id == Auth::id()
                ]
            ]
        );
    }

    public function updateSection(int $id){
        $program = CharityProgram::with('charity:id,name,eth_address')->findOrFail($id);
        $posts = CharityPosts::where('charity_programs_id',$id)->get()->toArray();
        $charity = Charity::where('id', Auth::id())->get()->toArray();

        $programStats = ProgramDonation::query()
            ->select(['amount','benefactor_id'])
            ->where('charity_program_id', $id)
            ->get();

        $stats['total_donation'] = $programStats->sum('amount');
        $stats['total_donors'] = $programStats->unique('benefactor_id')->count();

        return Inertia::render(
            'Charity/Program/Updates',
            [
                'program' => $program,
                'posts' => $posts,
                'charity' => $charity,
                'stats' => $stats,
                'can' => [
                    'modify' =>  $program->charity_id == Auth::id()
                ]
            ]
        );
    }

    public function historySection(int $id){
        $program = CharityProgram::with('charity:id,name,eth_address')->findOrFail($id);
        $posts = CharityPosts::where('charity_programs_id',$id)->get()->toArray();
        $charity = Charity::where('id', Auth::id())->get()->toArray();

        $programStats = ProgramDonation::query()
            ->select(['amount','benefactor_id'])
            ->where('charity_program_id', $id)
            ->get();

        $stats['total_donation'] = $programStats->sum('amount');
        $stats['total_donors'] = $programStats->unique('benefactor_id')->count();

        return Inertia::render(
            'Charity/Program/History',
            [
                'program' => $program,
                'posts' => $posts,
                'charity' => $charity,
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
        $program = CharityProgram::findOrFail($id);

       

        $programStats = ProgramDonation::query()
            ->select(['amount','benefactor_id'])
            ->where('charity_program_id', $id)
            ->get();

        $totalBalance = round($programStats->sum('amount') - $program->total_withdrawn_amount, 2);

        $messages = [
            'amount.max' => 'Your total balance left is ' . $totalBalance ,
        ];

        $validator = Validator::make($request->all(), 
            [
                'amount' => ['required', 'numeric','min:1', 'max:'.$totalBalance]
            ] , 
            $messages
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $program->update([
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
