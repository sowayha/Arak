<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use DB;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function thankyou(){
        $id = request()->query('id');
        $amount =  DB::table('payment_amounts')->where('user_id', Auth::User()->id)->first()->amount;
        $user_balance = DB::table('users')->where('id', Auth::User()->id)->first()->balance;
        $token = base64_encode(config('services.moyasar.secret'). ':');
        $payment = Http::baseUrl('https://api.moyasar.com/v1')
            ->withBasicAuth(config('services.moyasar.secret'), '')
            ->get("payments/{$id}")
            ->json();
        //dd($payment);

        if($payment['status'] == 'paid'){
            $user_balance = $user_balance + $amount;


            DB::table('users')->where('id', Auth::User()->id)->update(['balance' => $user_balance]);
            $capture = Http::baseUrl('https://api.moyasar.com/v1')
                ->withHeaders([
                    'Authorization' => "Basic {$token}"
                ])
                ->post("payments/{$id}/capture")
                ->json();
            //dd($payment);
            //if (isset($payment['type']) && $payment['type'] == 'invalid_request_error'){
            session()->flash('success',' تم شحن الرصيد ');
            if(Auth::user()->role_id == 2){
                return redirect()->route('r.creditCard');
            }elseif(Auth::user()->role_id == 3){
                return redirect()->route('p.creditCard');
            }



        // if($capture['status'] == 'captured'){
        //     $user_balance = $user_balance + $amount;
        // }
        }else{
            session()->flash('fail',' عملية مرفوضة');
            if(Auth::user()->role_id == 2){
                return redirect()->route('r.creditCard');
            }elseif(Auth::user()->role_id == 3){
                return redirect()->route('p.creditCard');
            }
        }
        // session()->flash('message',' تم شحن الرصيد ');
        // return redirect()->back();
    }

    public function amount(Request $request){
        $data = array();

    $data['amount'] = $request->amount;
    $data['user_id'] = Auth::User()->id;

    $find =  DB::table('payment_amounts')->where('user_id', Auth::User()->id)->first();
if(! $find){
    DB::table('payment_amounts')->insert($data);

}else{
    DB::table('payment_amounts')->update($data);

}
        return redirect()->back();

    }

}
