<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\ForProviderSection;
use App\Models\ForRequesterSection;
use App\Models\HomeHeroBanner;
use App\Models\HowDoesItWork;
use App\Models\TermsConditions;
use Illuminate\Http\Request;
use App\Models\CTA;
use App\Models\Requests;
use App\Models\ReqServices;
use App\Models\ReqStatus;
use App\Models\Quotation;
use App\Models\Rate;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;
use Illuminate\Support\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }




    public function reqPage(){
        $cta = CTA::find(1);
        $services = ReqServices::orderBy('id','ASC')->get();
        $status = ReqStatus::orderBy('id','ASC')->get();

        $allreqs = Requests::latest()->paginate(3);
        return view('frontend.requests.requests', compact('cta', 'allreqs', 'services', 'status'));
    }


// filter
    public function serReq($id){

        $cta = CTA::find(1);
        $services = ReqServices::orderBy('id','ASC')->get();
        $status = ReqStatus::orderBy('id','ASC')->get();
        $allreqs = Requests::get()->where('service_id',$id)->paginate(5);
        $filterStatus = Requests::get()->where('status_id',$id)->paginate(5);
        return view('frontend.requests.filterByService', compact('cta', 'allreqs', 'services', 'status', 'filterStatus'));

     }

     public function statusReq($id){

        $cta = CTA::find(1);
        $services = ReqServices::orderBy('id','ASC')->get();
        $status = ReqStatus::orderBy('id','ASC')->get();
        $filterStatus = Requests::get()->where('status_id',$id)->paginate(5);

        return view('frontend.requests.filterByStatus', compact('cta', 'services', 'status', 'filterStatus'));

     }

     public function requesterReq($id){

        $cta = CTA::find(1);
        $services = ReqServices::orderBy('id','ASC')->get();
        $status = ReqStatus::orderBy('id','ASC')->get();
        $filterByrequester = Requests::get()->where('user_id',$id)->paginate(5);
        return view('frontend.requests.filterByrequester', compact('cta', 'services', 'status', 'filterByrequester'));

     }


     public function addQuote(Request $request){
        $data = array();
        $data['user_id'] = $request->user_id;
        $data['req_id'] = $request->req_id;
        $data['req_deadline'] = $request->req_deadline;
        $data['cost'] = $request->cost;
        $data['message'] = $request->message;
        $data['created_at'] = Carbon::now();



    DB::table('quotations')->insert($data);
    session()->flash('success',' تم اضافة عرضك لتقديم الخدمة');
        return redirect()->back();
    }



    public function reqDetails($id){

        if (Auth::check()){
        $userid = Auth::User()->id;
        $user = User::find($userid);} else{ $user = Auth::User(); }

        $test = Quotation::where('req_id', $id);

        if (Quotation::where('req_id', $id)->exists()) {
            $title = " عروض مقدمي الخدمة ";
            $quotes = Quotation::get()->where('req_id',$id)->sortByDesc('created_at')->paginate(5);
         }
         else{
            $title = " لا يوجد عروض بعد... ";
            $quotes = "  ";
         }


        $req = Requests::findOrFail($id);
        $cta = CTA::find(1);
        $services = ReqServices::orderBy('services','ASC')->get();
        $allreqs = Requests::latest()->paginate(5);

        return view('frontend.requests.request_details', compact('user', 'req', 'cta', 'allreqs', 'services', 'quotes', 'title'));

     }

    public function acceptProv(Request $request){


        $id = $request->id;
        $q = Quotation::findOrFail($id);
        $rate = Rate::findOrFail(1);
        $r = $q->cost * $rate->req_rate / 100;
        if(Auth::user()->balance >= $q->cost + $r){

        $data = array();

        $data['status_id'] = 2;
        $data['provider_id'] = $request->provider_id;
        $data['updated_at'] = Carbon::now();




    DB::table('requests')->where('id', $q->req_id)->update($data);
    $req = Requests::where('id', $q->req_id)->pluck('user_id')->first();

    if($r < $rate->req_min){
        $r = $rate->req_min;
        $total = $r + $q->cost;

    }else{
        $total = $r + $q->cost;
    }

    DB::table('users')->where('id', $req)->update(['balance' => Auth::user()->balance - $total]);
    DB::table('users')->where('id', $req)->update(['stuck' => Auth::user()->stuck + $total]);
    DB::table('users')->where('id', $q->user_id)->update(['stuck' => Auth::user()->stuck + $q->cost]);

    session()->flash('success',' تم تعيينة لتنفيذ الطلب! ');
        return redirect()->back();
        }else{
            session()->flash('success',' برجاء شحن الرصيد وإعادة المحاولة <a href="/r/dashboard" class="mr-3" style="color: white;     text-decoration: underline;            "> اشحن الان </a>');
        return redirect()->back();
        }
    }


    public function terms_conditions(){
        $terms = TermsConditions::find(1);
        return view('frontend.terms_conditions', compact('terms'));
    }

    public function chat($id){
        return redirect('http://127.0.0.1:8000/messages/'. $id);
    }


    public function messages(){
        return redirect('http://127.0.0.1:8000/messages');
    }


    public function provRegister(){
        return view('auth.provRegister');
    }

    public function reqRegister(){
        return view('auth.register');
    }

}
