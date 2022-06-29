<?php

namespace App\Http\Controllers\Admin;


use File;
use ZipArchive;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Charity\Charity;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class AdminHomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Index', [
            'charities' => $this->getCharities(),
            'filters' =>  [
                'search' => request()->get('name') ? request()->get('name') : null,
                'sort' => request()->get('sort') ? request()->get('sort') : 'asc',
                'status' => request()->get('status') ? request()->get('status') : 'pending',
            ]
        ]);
    }

    private function getCharities()
    {
        return  Charity::addSelect(['created_at' => function ($query) {
            $query->select('created_at')
                ->from('users')
                ->whereColumn('id', 'charities.id')
                ->limit(1);
        }])
        ->when((request()->get('status') == 'pending'), function($query, $value) {
            $query->orderBy('charity_verified_at', 'asc'); 
        })
        ->when((request()->get('status') == 'approved'), function($query, $value) {
            $query->orderBy('charity_verified_at', 'desc'); 
        })  
        ->when((request()->get('name')), function($query, $value) {
            $query->where('charities.name', 'like', '%'.$value.'%'); 
        })
        ->when((request()->get('sort') == 'asc' || request()->get('sort') == null), 
            function($query, $value) {
            $query->oldest(); 
        })
        ->when((request()->get('sort') == 'desc'), function($query, $value) {
            $query->latest(); 
        })
        ->paginate(15)
        ->withQueryString();
    }

    public function download(int $id)
    {
        $zip = new ZipArchive;

        $zipFile = Storage::path('documents.zip');
        
        if($zip->open($zipFile, ZipArchive::CREATE | ZipArchive::OVERWRITE)) 
        {
            $files = File::files(storage_path("app\charity\\".$id."\\documents"));

            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }
                
            $zip->close();
        }
    
        return response()->download($zipFile);
    }
}
