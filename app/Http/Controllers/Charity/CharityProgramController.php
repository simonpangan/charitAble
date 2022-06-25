<?php

namespace App\Http\Controllers\Charity;

use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;
use App\Models\Charity\CharityProgram;
use App\Http\Requests\Charity\CharityProgramRequest;
use App\Models\Charity\Charity;
use Illuminate\Support\Facades\Storage;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;

class CharityProgramController
{
    public function index(): Response
    {
        return Inertia::render('');
    }

    public function create(): Response
    {
        return Inertia::render('Charity/Program/Create',[
            'csrfToken' => csrf_token(),
        ]);
    }

    public function store(CharityProgramRequest $request): RedirectResponse
    {
        // CharityProgram::create($request->validated());
        $link = '';
        // dd($request->input('goal'));
        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();

            $temporaryFile = TemporaryFile::where('filename',$filename)
                            ->where('file_type','logo')
                            ->latest()
                            ->first()
                            ->getRawOriginal();

            Storage::move('tmp/program/'.$temporaryFile['folder'].'/'.$temporaryFile['filename'], 'charity/'.'/'.'program/'.$filename);
            //this doesn't work
            Storage::deleteDirectory('tmp/program/'.$temporaryFile['folder']);

            TemporaryFile::where('filename',$filename)
                            ->where('file_type','program-header')
                            ->latest()
                            ->first()
                            ->delete();

            //delete temporary
            $link = 'charity/'.'/'.'program/'.$filename;
            }

            $this->createProgram($request,$link);

        return to_route('charity.profile.index');
    }

    public function createProgram(CharityProgramRequest $request,$link){

        $goal_array = [];
        for($i=0; $i<count($request['goal']);$i++){
            $goal_array[] = $request['goal'][$i];
        }
        CharityProgram::create([
            'program_name' => $request['program_name'],
            'program_description' => $request['program_description'],
            'location' => $request['location'],
            //'goal' => implode("-",$request['goal']),
            'goal' => $request['goal'],
            'total_donation_amount' => $request['program_donation_total'],
            'program_expenses' =>  implode("-",$request['program_expenses']),
            'header' => $link
        ]);
    }

    public function uploadProgramPhoto(Request $request){

        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('tmp/program/'. $folder ,$filename);

            return TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename,
                'file_type' => 'program-header'
            ]);


        }
        return '500';
    }


    public function show(int $id): Response
    {
        $charity_id = CharityProgram::findOrFail($id)->charity_id;
        return Inertia::render(
            'Charity/Program/ViewProgram',
            [
                'program' => CharityProgram::findOrFail($id)->toArray(),
                'charity' => Charity::where('id',$charity_id)->get()->toArray(),
            ]);

    }

    public function edit(int $id): Response
    {
        return Inertia::render(
            '',
            CharityProgram::findOrFail($id)->toArray()
        );
    }

    public function update(CharityProgramRequest $request, int $id): RedirectResponse
    {
        CharityProgram::query()
            ->findOrFail($id)
            ->update($request->validated());

        return to_route('');
    }

    public function destroy(int $id): RedirectResponse
    {
        CharityProgram::query()
            ->findOrFail($id)
            ->delete();

        return to_route('index');
    }
}
