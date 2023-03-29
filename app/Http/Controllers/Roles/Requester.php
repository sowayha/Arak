<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\BankAccount;
use App\Models\ReqStatus;
use App\Models\ReqServices;
use App\Models\Requests;
use Illuminate\Support\Carbon;
use App\Models\Quotation;
use App\Models\Rate;
use App\Models\Hire;
use App\Models\PaymentAmount;

use Session;

use DB;



class Requester extends Controller
{
    public function index(){

        $id = Auth::User()->id;
        $user = User::find($id);
        return view('Admin.dashboard', compact('user'));

    }

     public function profilePage(){
        $id = Auth::User()->id;
        $adminData = User::find($id);
        $accdata = DB::table('bank_accounts')->where('user_id',$id)->first();
        return view('Admin.profile.profile', compact('adminData','accdata'));

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
        return redirect()->route('requester.profile');

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
          $id = Auth::User()->id;
        $accdata = DB::table('bank_accounts')->where('user_id',$id)->first();

        return view('Admin.profile.add_bank_account', compact('accdata'));

    }


     public function saveBankAcc(Request $request){
        $data = array();
        $data['user_id'] = Auth::User()->id;
        $data['account_number'] = $request->accNumber;
        $data['account_name'] = $request->accName;


    DB::table('bank_accounts')->insert($data);
    session()->flash('message','تم إضافة بيانات الحساب');
        return redirect()->back();
    }

     public function editBankAcc(){
        $id = Auth::User()->id;
        $accdata = DB::table('bank_accounts')->where('user_id',$id)->first();

        return view('Admin.profile.edit_bank_account', compact('accdata'));

    }


    public function updateBankAcc(Request $request){
      $data = array();
        $data['user_id'] = Auth::User()->id;
        $data['account_number'] = $request->accNumber;
        $data['account_name'] = $request->accName;


    DB::table('bank_accounts')->update($data);
    session()->flash('message','تم تحديث بيانات الحساب');
        return redirect()->route('requester.addBankAcc');
}



//-----------------------------------------------------------------------
// --------------------- Services ------------------------------
//-----------------------------------------------------------------------

public function allServices(){
    $user= Auth::User()->id;
    $services= ReqServices::latest()->get();
    $requests= Requests::latest()->where('user_id',$user)->get();
    $prov = DB::table('users')->first();


    $orders= Hire::latest()->where('user_id',$user)->get();



    return view('Admin.requests.allRequests', compact('services', 'requests', 'prov', 'orders'));
}



 public function reqPage(){
    $id = Auth::User()->id;
        $user = User::find($id);
        $status = ReqStatus::find(1);
        $services = ReqServices::orderBy('id','ASC')->get();

    return view('Admin.requests.addRequest', compact('user', 'status', 'services'));
}


public function addService(Request $request){
    $data = array();
    $data['user_id'] = $request->user_id;
    $data['service_id'] = $request->service_id;
    $data['title'] = $request->title;
    $data['description'] = $request->description;
    $data['cost'] = $request->cost;

    $data['created_at'] = Carbon::now();


$user = User::where('id', Auth::User()->id)->first()->balance;
$rate = Rate::findOrFail(1);
$r = $request->cost * $rate->req_rate / 100;
$total = $request->cost + $r;

if($total > $user){
    Session::flash('recharge', 'Here is your fail message');
    return redirect()->back();

}else{
    DB::table('requests')->insert($data);
   session()->flash('message','تم إضافة الطلب');
    return redirect()->route('r.allServices');
}
}


 public function deleteService($id){
    DB::table('requests')->where('id',$id)->delete();
    session()->flash('message','تم إزالة الطلب');
    return redirect()->back();
}


 public function editService($id){
    $req = DB::table('requests')->where('id',$id)->first();
    $service = ReqServices::get();
    $status = ReqStatus::get();
    $serName = ReqServices::find($req->service_id);

    return view('Admin.requests.editRequest', compact('service', 'req', 'status', 'serName'));
}


public function updateService(Request $request){
    $id = $request->id;

    $data = array();


    if(! $request->service_id){
    }else{$data['service_id'] = $request->service_id;}

    $data['title'] = $request->title;
    $data['description'] = $request->description;
    $data['cost'] = $request->cost;




DB::table('requests')->where('id',$id)->update($data);
session()->flash('message','تم تحديث الطلب');
    return redirect()->route('r.allServices');
}


public function compeleteReq(Request $request, $id){
    $id = $request->id;
    $data = array();


    $data['status_id'] = 3;
    $data['update_status'] = Carbon::now();




DB::table('requests')->where('id',$id)->update($data);

$req = Requests::where('id', $id)->pluck('provider_id')->first();
$reqUser = Requests::where('id', $id)->pluck('user_id')->first();
$q = Quotation::where('user_id', $req)->where('req_id', $id)->first();
$user = User::where('id', $req)->first();
$rate = Rate::findOrFail(1);
$r = $q->cost * $rate->req_rate / 100;
$p = $q->cost * $rate->prov_rate / 100;

if($r < $rate->req_min){
    $r = $rate->req_min;
    $total = $r + $q->cost;
}else{
    $total = $r + $q->cost;
}


DB::table('users')->where('id', $reqUser)->update(['stuck' => Auth::user()->stuck - $total]);

if($p < $rate->prov_min){
    $p = $rate->prov_min;
}else{
    $p;
}

DB::table('users')->where('id', $user->id)->update(['balance' => $user->balance + ($q->cost - $p)]);
DB::table('users')->where('id', $user->id)->update(['stuck' => $user->stuck - $q->cost]);


session()->flash('message','تم إنهاء تنفيذ الطلب');
    return redirect()->route('r.allServices');
}

public function cancelReq(Request $request, $id){
    $id = $request->id;
    $data = array();


    $data['status_id'] = 4;
    $data['update_status'] = Carbon::now();




DB::table('requests')->where('id',$id)->update($data);


$req = Requests::where('id', $id)->pluck('provider_id')->first();
$reqUser = Requests::where('id', $id)->pluck('user_id')->first();
$q = Quotation::where('user_id', $req)->where('req_id', $id)->first();
$user = User::where('id', $req)->first();
$rate = Rate::findOrFail(1);
$r = $q->cost * $rate->req_rate / 100;

if($r < $rate->req_min){
    $r = $rate->req_min;
    $total = $r + $q->cost;
}else{
    $total = $r + $q->cost;
}


DB::table('users')->where('id', $reqUser)->update(['stuck' => Auth::user()->stuck - $total]);
DB::table('users')->where('id', $reqUser)->update(['balance' => Auth::user()->balance + $total]);


DB::table('users')->where('id', $user->id)->update(['stuck' => $user->stuck - $q->cost]);

session()->flash('message','تم إلغاء الطلب');
    return redirect()->route('r.allServices');
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

//
public function withdrawHistory(){
    $user = User::where('withdraw_date', '!=', null)->get()->paginate(30);

    return view('Admin.withdraw.usersWithdraws', compact('user'));
}

public function allProvider(){
    $role = 3;
    $users= User::latest()->get()->where('role_id', $role)->paginate(5);

    return view('Admin.order.allProviders', compact('users', 'role'));
}

public function addOrder($id){
    $provid = $id;
    $reqid = Auth::User()->id;
    $user = User::find($reqid);
    $status = ReqStatus::find(1);
    $services = ReqServices::orderBy('id','ASC')->get();


    return view('Admin.order.addOrder', compact('user', 'status', 'services', 'provid'));
}





public function hiring(Request $request){
    $data = array();
    $data['user_id'] = $request->user_id;
    $data['service_id'] = $request->service_id;
    $data['title'] = $request->title;
    $data['description'] = $request->description;
    $data['deadline'] = $request->deadline;
    $data['cost'] = $request->cost;
    $data['provider_id'] = $request->provider_id;


    $data['created_at'] = Carbon::now();

$user = User::where('id', $request->user_id)->first()->balance;
$prov = User::where('id', $request->provider_id)->first()->stuck;
$rate = Rate::findOrFail(1);
$r = $request->cost * $rate->req_rate / 100;
$total = $request->cost + $r;

if($total > $user){
    Session::flash('recharge', 'Here is your fail message');
    return redirect()->back();

}else{
    DB::table('hires')->insert($data);
   session()->flash('message','تم إضافة الطلب');

   if($r < $rate->req_min){
    $r = $rate->req_min;
    $total = $r + $request->cost;

}else{
    $total = $r + $request->cost;
}

   DB::table('users')->where('id', $request->user_id)->update(['balance' => Auth::user()->balance - $total]);
   DB::table('users')->where('id', $request->user_id)->update(['stuck' => Auth::user()->stuck + $total]);
   DB::table('users')->where('id', $request->provider_id)->update(['stuck' => $prov + $request->cost]);

       return redirect()->route('r.allServices');
   }

}




public function deleteOrder($id){
    DB::table('hires')->where('id',$id)->delete();
    session()->flash('message','تم إزالة الطلب');
    return redirect()->back();
}


public function CompeleteOrder(Request $request){

    $id = $request->id;

    $data = array();

    $data['status_id'] = 3;


DB::table('hires')->where('id', $id)->update($data);

$req = DB::table('hires')->where('id', $id)->first();
$requester = DB::table('users')->where('id', $req->user_id)->first();
$provider = DB::table('users')->where('id', $req->provider_id)->first();


$rate = Rate::findOrFail(1);
$r = $req->cost * $rate->req_rate / 100;
$p = $req->cost * $rate->prov_rate / 100;

if($r < $rate->req_min){
    $r = $rate->req_min;
    $total = $r + $req->cost;
}else{
    $total = $r + $req->cost;
}


DB::table('users')->where('id', $req->user_id)->update(['stuck' => Auth::user()->stuck - $total]);

if($p < $rate->prov_min){
    $p = $rate->prov_min;
}else{
    $p;
}

DB::table('users')->where('id', $req->provider_id)->update(['balance' => $provider->balance + ($req->cost - $p)]);
DB::table('users')->where('id', $req->provider_id)->update(['stuck' => $provider->stuck - $req->cost]);



session()->flash('message','تم إنهاء تنفيذ الطلب');

    return redirect()->back();
}

public function CancelOrder(Request $request){

    $id = $request->id;

    $data = array();

    $data['status_id'] = 4;


DB::table('hires')->where('id', $id)->update($data);

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


DB::table('users')->where('id', $req->user_id)->update(['stuck' => Auth::user()->stuck - $total]);
DB::table('users')->where('id', $req->user_id)->update(['balance' => Auth::user()->balance + $total]);


DB::table('users')->where('id', $req->provider_id)->update(['stuck' => $provider->stuck - $req->cost]);


session()->flash('message','تم إلغاء الطلب');

    return redirect()->back();
}

public function creditCard(){
    $find = DB::table('payment_amounts')->where('user_id', Auth::User()->id)->first();
    if(! $find){
        $data = array();
        $data['user_id'] = Auth::User()->id;
        $data['amount'] = 0;
        DB::table('payment_amounts')->insert($data);
    }
    return view('Admin.creditCard');}


}
