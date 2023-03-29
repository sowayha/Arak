
@extends('frontend.master')
@section('frontend')




<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <ol class="mt-3">
      <li><a href="{{route('home')}}"> الرئيسة </a></li>
      <li><a href="{{ route('front.reqPage')}}"> الخدمات المطلوبة </a></li>
      <li> تفاصيل الخدمة  </li>
    </ol>
    <h2 class="title">  {{ $req->title }}  </h2>

  </div>
</section><!-- End Breadcrumbs -->



    <div class="container mt-4 mb-n4">
@if(session()->has('success'))
<div class="alert alert-dismissable alert success" style="background: #198754;">
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong class="successMessage">
        {!! session()->get('success') !!}
    </strong>
</div>

@endif

    </div>



<section class="inner-page">
<div class="container d-md-flex">
   <!-- Page Content  -->







   <div id="content" class="">


   <div class="card">
  <div class="card-body">

    <button class="btn btn-outline-primary req-ser"> {{$req->ser->services}} </button>
    <h5 class="card-title"> {{$req->title}} </h5>
    <h6 class="card-text mt-5"> {{$req->description}}</h6>
    <hr class="hr" />
    <button  class="btn btn-outline-primary"> اسم المستخدم: {{$req->reqUser->name}}  </button>
    <button  class="btn btn-outline-primary"> التكلفة: {{$req->cost}} ريال </button>
    <button  class="btn btn-outline-primary"> الحالة: {{$req->status->status}} </button>

    <p class="req-date">{{ Carbon\Carbon::parse($req->created_at)->diffForHumans() }}</p>
  </div>


</div>
<br>




    <div class="card">
   <div class="card-body">
    <h5 class="card-title">  اضف عرضك الان </h5>
    <br>


@if (Auth::check() && Auth::user()->role_id == 3)


@if (isset($error))
    <div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
          $error
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
@endif


    <form class="mb-5" method="post" id="contactForm" name="contactForm" action="{{route('addQuote')}}">
        @csrf
        <input type="hidden" name="req_id" value="{{$req->id}}">
                <input type="hidden" name="user_id" value="{{$user->id}}">


        <div class="row">
          <div class="col-md-12 form-group mb-3">

            <input type="text" class="form-control" name="req_deadline" id="req_deadline" placeholder=" عدد ايام العمل " required>
          </div>

        </div>

        <div class="row">
          <div class="col-md-12 form-group mb-3">

            <input type="text" class="form-control" name="cost" id="cost" placeholder=" التكلفة (ريال) " required>
          </div>
        </div>

        <div class="row mb-5">
          <div class="col-md-12 form-group mb-3">

            <textarea class="form-control" name="message" id="message" cols="30" rows="8"  placeholder=" الرسالة " required></textarea>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-5 form-group text-center">
            <input type="submit" value=" إرسال " class="btn btn-outline-primary w-50">
            <span class="submitting"></span>



          </div>
        </div>
      </form>

      @else

      <hr class="hr" />
   <div class="reqLogin">
    <a href="{{ route('register') }}" class="btn btn-outline-primary">  حساب جديد </a>
    <a href="{{ route('login') }}" class="btn btn-outline-primary"> دخول </a>
   </div>
    @endif

   </div></div>
<br>



   <div >

@if($quotes == "  ")

    <h5 class="card-title">  {{$title}} </h5>
    <br>

@else

     @foreach($quotes as $item)

     <div id="content" class="">




     <div class="card">
    <div class="card-body">

        <h5 class="btn btn-outline-primary">  {{$item->quoteUser->name}} </h5>


        @if ($req->provider_id == $item->user_id)

        <form >

            @if (Auth::check() && $req->user_id == Auth::User()->id)
            <a href="{{route('chatbox', $req->provider_id)}}"><button type="button" class="btn btn-outline-primary float-left mt-n5 chat" style="margin-left: 200px;"> تواصل معي </button></a>

            @endif

            <input type="submit" value=" تم تعيينة لتنفيذ الطلب " class="btn btn-outline-primary float-left mt-n5">





        </form>


        @elseif (Auth::check() && $req->user_id == Auth::User()->id)

        <form method="post" action="{{ route('acceptProv') }}">
            @csrf
            <input type="hidden" name="id" value="{{$item->id}}">
            <input type="hidden" name="provider_id" value="{{$item->user_id}}">




            <input type="submit" value=" وظفني " class="btn btn-outline-primary float-left mt-n5">




        </form>
        @else

        @endif

      <h5 class="card-title mt-5"> {{$item->message}} </h5>

<br>

      <hr class="hr" />

      <h5 class="btn btn-outline-primary"> التكلفة: {{$item->cost}} ريال </h5>
      <h5 class="btn btn-outline-primary"> عدد ايام العمل : {{$item->req_deadline}} </h5>


      <p class="req-date">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</p>
    </div>


  </div>
  <br>
  @endforeach



<div class="pagination-wrap">
    {{ $quotes->links('vendor.pagination.custom') }}
    </div>





 </div>
 @endif

   </div>

  </div>
</section>

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="row">
          <div class="col-lg-6 text-center text-lg-start">
            <h3>{{$cta->title}}</h3>
            <p> {{$cta->description}}</p>
          </div>
          <div class="col-lg-6 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="{{ route('reqRegister') }}">سجل كمستخدم</a>
            <a class="cta-btn align-middle" href="{{ route('provRegister') }}">سجل لتصبح مقدم خدمة</a>
          </div>
        </div>

      </div>
    </section><!-- End Cta Section -->

</main><!-- End #main -->


@endsection
