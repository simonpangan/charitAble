<?php

namespace App\Http\Controllers\Auth\Register;

use Inertia\Inertia;
use App\Traits\RedirectTo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CharityRegisterRequest;
use Illuminate\Foundation\Auth\RegistersUsers;

class CharityRegisterController extends Controller
{
    use RedirectTo, RegistersUsers;

    public function index()
    {
        return Inertia::render('Auth/CharityRegister');
    }

    public function store(CharityRegisterRequest $request)
    {
        # code...
    }

    public function uploadPhoto(Request $request){
         $file = $request->file('file');
         $filename = $file->getClientOriginalName();
         $file->storeAs('/public', $filename);
    }
}
