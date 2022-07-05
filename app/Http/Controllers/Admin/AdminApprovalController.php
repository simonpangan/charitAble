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
