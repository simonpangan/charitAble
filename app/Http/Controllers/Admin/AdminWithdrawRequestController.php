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
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

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
            ->with('charity:id,eth_address,charity_verified_at')
            ->where('has_withdraw_request', 1)
            ->latest('withdraw_requested_at')
            ->paginate(15);
    }

    public function approve(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [
            'receipt' => ['required', 'file', 'mimes:jpg,jpeg,png', 'max:5240'],
        ], 
        [
            'max' => 'The :attribute must not be more than 5mb.',
        ]);

        if ($validator->fails()) {
            throw ValidationException::withMessages(
                $validator->messages()->toArray()
            );
        }
        
        if (is_null($request->blockchain_transaction)) {
            return to_route('admin.withdraw.index');
        }

        $program = CharityProgram::query()
            ->with('charity')
            ->findOrFail($request->id);

        $benefactor_id = ProgramDonation::query()
            ->where('charity_program_id', $request->id)
            ->get('benefactor_id')
            ->pluck('benefactor_id')
            ->unique();
        
        $emails = User::find($benefactor_id, 'email')->pluck('email');

        Mail::to($program->charity->charity_email)
            ->bcc($emails)
            ->send(new WithdrawRequestMail(
                $program, $request->blockchain_transaction,
                $request->file('receipt')
            ));

        $program->update([
            'has_withdraw_request' => 0,
            'withdraw_requested_at' => null,
            'withdraw_request_amount' => 0,
            'total_withdrawn_amount' => $program->total_withdrawn_amount + $program->withdraw_request_amount,
        ]);

        to_route('admin.withdraw.index');
    }
}
