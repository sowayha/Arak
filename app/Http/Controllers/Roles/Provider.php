<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\Quotation;
use App\Models\Requests;
use App\Models\ReqServices;
use App\Models\Hire;
use App\Models\Rate;
use App\Models\PaymentAmount;

use Session;

use App\Models\BankAccount;
use DB;


class Provider extends Controller
{
    public function index(){

        $id = Auth::User()->id;
        $user = User::find($id);
        return view('Admin.dashboard', compact('user'));

    }

     public function profilePage(){
        $id = Auth::User()->id;
        $adminData = User::find($id);
        return view('Admin.profile.profile', compact('adminData'));

    }
    public function editProfile(){
        $id = Auth::User()->id;
        $user = User::find($id);
        $roles = Role::get();
        return view('Admin.profile.edit_profile', compact('user','roles'));

    }
    public function updateProfile(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phoneNumber = $request->phoneNumber;

        // $data->role_id = $request->role_id;
        $data->save();
        session()->flash('message','تم تحديث بيانات الملف الشخصي');
        return redirect()->route('provider.profile');

    }

    public function changePass(){

        return view('Admin.profile.change_password');

    }

    public function UpdatePassword(Request $request){
    $validateData = $request->validate([
        'oldpassword' => 'required',
        'newpassword' => 'required',
        'confirm_password' => 'required|same:newpassword',

    ]);

    $hashedPassword = Auth::user()->password;
    if (Hash::check($request->oldpassword,$hashedPassword )) {
        $users = User::find(Auth::id());
        $users->password = bcrypt($request->newpassword);
        $users->save();

        session()->flash('message','تم تحديث كلمة المرور');
        return redirect()->back();
    } else{
        session()->flash('message','كلمة المرور غير متطابقة');
        return redirect()->back();
    }

}


    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

     public function addBankAcc(){

        return view('Admin.profile.add_bank_account');

    }



     public function paddBankAcc(){
          $id = Auth::User()->id;
        $accdata = DB::table('bank_accounts')->where('user_id',$id)->first();

        return view('Admin.profile.add_bank_account', compact('accdata'));

    }


     public function psaveBankAcc(Request $request){
        $data = array();
        $data['user_id'] = Auth::User()->id;
        $data['account_number'] = $request->accNumber;
        $data['account_name'] = $request->accName;


    DB::table('bank_accounts')->insert($data);
    session()->flash('message','تم إضافة بيانات الحساب');
        return redirect()->back();
    }

     public function peditBankAcc(){
        $id = Auth::User()->id;
        $accdata = DB::table('bank_accounts')->where('user_id',$id)->first();

        return view('Admin.profile.edit_bank_account', compact('accdata'));

    }


    public function pupdateBankAcc(Request $request){
      $data = array();
        $data['user_id'] = Auth::User()->id;
        $data['account_number'] = $request->accNumber;
        $data['account_name'] = $request->accName;


    DB::table('bank_accounts')->update($data);
    session()->flash('message','تم تحديث بيانات الحساب');
        return redirect()->route('provider.addBankAcc');
}



//-----------------------------------------------------------------------
// --------------------- Quotations ------------------------------
//-----------------------------------------------------------------------

public function provierQuotations(){

    $user= Auth::User()->id;
    $today = Carbon::now();
    $req = Requests::get();
    $quotes= Quotation::latest()->where('user_id',$user)->get()->paginate(30);


    return view('Admin.quotes.allQuotes', compact('quotes', 'user', 'today', 'req'));

}


public function deleteQuote($id){
    DB::table('quotations')->where('id',$id)->delete();
    session()->flash('message','تم إزالة العرض');
    return redirect()->back();
}

public function editQuote($id){
    $quote = DB::table('quotations')->where('id',$id)->first();

    return view('Admin.quotes.editQuotes', compact('quote'));
}


public function updateQuote(Request $request){
    $id = $request->id;
    $quote = DB::table('quotations')->where('id',$id)->first();
    $data = array();


    $data['req_deadline'] = $request->req_deadline;
    $data['cost'] = $request->cost;
    $data['message'] = $request->message;




DB::table('quotations')->where('id',$id)->update($data);
session()->flash('message','تم تحديث العرض');
    return redirect()->route('provierQuotations');
}


public function compeleteReq(Request $request, $id){
    $id = $request->id;

    $data = array();

    $data['update_status'] = Carbon::now();

DB::table('requests')->where('id',$id)->update($data);


$qdata = array();
$qdata['updated_at'] = Carbon::now();
DB::table('quotations')->where('id',$id)->update($qdata);

session()->flash('message','تم تنفيذ العمل');
    return redirect()->route('provierQuotations');
}

public function withdraw(Request $request){
    $id = $request->id;
    $user = User::where('id', $id)->first();

    if($user->balance == 0){
        Session::flash('error', 'Here is your fail message');
    }else{
        Session::flash('withdraw', 'Here is your success message');
        $data = array();
        $data['withdraw_date'] = Carbon::now();
        $data['withdraw_cost'] = $user->balance;

        DB::table('users')->where('id',$id)->update($data);
    }

    return redirect()->back();

}


public function withdrawHistory(){
    $user = User::where('withdraw_date', '!=', null)->get()->paginate(30);

    return view('Admin.withdraw.usersWithdraws', compact('user'));
}




public function provDesc(Request $request){
    $id = Auth::user()->id;
    $data = User::find($id);
    $data->description = $request->description;

    $data->save();
    session()->flash('message','تم تحديث البيانات');
    return redirect()->back();

}

public function providerOrders(){
    $user= Auth::User()->id;
    $services= ReqServices::latest()->get();
    $requests= Hire::latest()->where('provider_id',$user)->get()->paginate(30);

    return view('Admin.order.providerOrders', compact('user', 'services', 'requests'));
}

public function acceptOrder(Request $request){

    $id = $request->id;

    $data = array();

    $data['status_id'] = 2;
    $data['updated_at'] = Carbon::now();


DB::table('hires')->where('id', $id)->update($data);
    return redirect()->back();
 }


    public function provCompelete(Request $request){

        $id = $request->id;

        $data = array();

        $data['update_status'] = Carbon::now();


    DB::table('hires')->where('id', $id)->update($data);
        return redirect()->back();
}

        public function rejOrder(Request $request){

            $id = $request->id;

            $data = array();

            $data['status_id'] = 4;
            $data['update_status'] = Carbon::now();


            $req = DB::table('hires')->where('id', $id)->first();
            $requester = DB::table('users')->where('id', $req->user_id)->first();
            $provider = DB::table('users')->where('id', $req->provider_id)->first();

            $rate = Rate::findOrFail(1);
            $r = $req->cost * $rate->req_rate / 100;

            if($r < $rate->req_min){
                $r = $rate->req_min;
                $total = $r + $req->cost;
            }else{
                $total = $r + $req->cost;
            }

            DB::table('users')->where('id', $req->user_id)->update(['stuck' => $requester->stuck - $total]);
            DB::table('users')->where('id', $req->user_id)->update(['balance' => $requester->balance + $total]);


            DB::table('users')->where('id', $req->provider_id)->update(['stuck' => $provider->stuck - $req->cost]);


            DB::table('hires')->where('id', $id)->update($data);

            return redirect()->back();
 }

 public function creditCard(){
    $find = DB::table('payment_amounts')->where('user_id', Auth::User()->id)->first();
    if(! $find){
        $data = array();
        $data['user_id'] = Auth::User()->id;
        $data['amount'] = null;
        DB::table('payment_amounts')->insert($data);
    }

    return view('Admin.creditCard');
}


public function provDescPage(){
    $id = Auth::User()->id;
    $user = User::find($id);
    return view('Admin.order.provDescription', compact('user'));
}



}
