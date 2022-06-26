<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Charity\Charity;
use App\Http\Controllers\Controller;

class AdminApprovalController extends Controller
{
    public function approve(Request $request)
    {
        Charity::find($request->id)->update(['charity_verified_at' => now()]);

        return to_route('admin.home.index');
    }
    
    public function disApprove(Request $request)
    {
        Charity::find($request->id)->update(['charity_verified_at' => null]);

        return to_route('admin.home.index');
    }
}
