<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Charity\CharityProgram;

class AdminWithdrawRequestController extends Controller
{
    public function index()
    {
        return Inertia::render(
            'Admin/Withdraw',[
                'programs' => $this->getProgramWithWithdrawRequest()
            ]
        );
    }

    private function getProgramWithWithdrawRequest()
    {
        return CharityProgram::query()
            ->where('has_withdraw_request', 1)
            ->paginate(15);
    }

    public function approve(Request $request)
    {
        $program = CharityProgram::findOrFail($request->id);

        $program->update([
            'has_withdraw_request' => 0,
            'withdraw_requested_at' => null,
            'withdraw_request_amount' => 0,
            'total_withdrawn_amount' => $program->total_withdrawn_amount + $program->withdraw_request_amount,
        ]);

        to_route('admin.withdraw.index');
    }
}
