<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Charity\Charity;
use App\Http\Controllers\Controller;

class AdminApprovalController extends Controller
{
    public function approve(Request $request)
    {
        Charity::findOrFail($request->id)->update(['charity_verified_at' => now()]);

        return to_route('admin.home.index');
    }
    
    public function disApprove(Request $request)
    {
        Charity::findOrFail($request->id)->update(['charity_verified_at' => null]);

        return to_route('admin.home.index');
    }

    public function permits(Request $request)
    {
        Charity::findOrFail($request->charityID)->update(['permits' => $request->permits]);

        return to_route('admin.home.index');
    }
}
