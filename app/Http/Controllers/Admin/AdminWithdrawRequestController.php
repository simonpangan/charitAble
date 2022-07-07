<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\ProgramDonation;
use App\Mail\WithdrawRequestMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
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
        $program = CharityProgram::query()
            ->with('charity')
            ->findOrFail($request->id);

        $benefactor_id = ProgramDonation::query()
            ->where('charity_program_id', $request->id)
            ->get('benefactor_id')
            ->pluck('benefactor_id')
            ->unique();
        
        $emails = User::find($benefactor_id, 'email')->pluck('email');

        Mail::bcc($emails)->send(new WithdrawRequestMail($program));

        $program->update([
            'has_withdraw_request' => 0,
            'withdraw_requested_at' => null,
            'withdraw_request_amount' => 0,
            'total_withdrawn_amount' => $program->total_withdrawn_amount + $program->withdraw_request_amount,
        ]);



        to_route('admin.withdraw.index');
    }
}
