<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Charity\Charity;
use App\Mail\ApproveCharityMail;
use App\Http\Controllers\Controller;
use App\Mail\DisapproveCharityMail;
use Illuminate\Support\Facades\Mail;

class AdminApprovalController extends Controller
{
    public function approve(Request $request)
    {
        $charity = Charity::findOrFail($request->id);   

        Mail::to($charity->charity_email)
            ->send(new ApproveCharityMail($charity));

        $charity->update(['charity_verified_at' => now()]);
    }
    
    public function disApprove(Request $request)
    {
        $request->validate([
            'message' => ['required', 'string', 'max:280']
        ]);

        $charity = Charity::findOrFail($request->charityID);   

        Mail::to($charity->charity_email)
            ->send(new DisapproveCharityMail($charity, $request->message));

        $charity->update(['charity_verified_at' => null]);
    }

    public function permits(Request $request)
    {
        Charity::findOrFail($request->charityID)->update(['permits' => $request->permits]);

        return to_route('admin.home.index');
    }

    public function checkIfEthAddressExists(Request $request){
        $charity_eth_address = Charity::where('id',$request['charityId'])->pluck('eth_address');
         if(is_Null($charity_eth_address[0])){
            return 'empty';
         }else return 'exists';
    }

    public function createEthAddress(Request $request){
        try{
            //double validation para ndi talaga magalaw charity eth address
            $charity_eth_address = Charity::where('id',$request['charityId'])->pluck('eth_address');
            
            if(is_Null($charity_eth_address[0])){
                Charity::findOrFail($request['charityId'])->update(['eth_address' => $request['ethAddress']]);
                return 200;

            }else return 'exists';
        }catch(\Exception $e){
            return $e;
        }
    }
}
