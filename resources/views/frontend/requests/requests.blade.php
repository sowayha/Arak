
@extends('frontend.master')
@section('frontend')




<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <ol class="mt-3">
      <li><a href="{{route('home')}}"> الرئيسة </a></li>
      <li> الخدمات المطلوبة </li>
    </ol>
    <h2 class="title"> الخدمات المطلوبة  </h2>

  </div>
</section><!-- End Breadcrumbs -->

<section class="inner-page">
<div class="container d-md-flex">
   <!-- Page Content  -->


   <nav id="sidebar">

   <div class="form-outline">
  <input type="search" id="form1" class="form-control" placeholder=" البحث " aria-label="Search" />
</div>

				<div class="p-4 pt-5">
					<h5 class="sidebar_title"> الخدمات </h5>
	        <ul class="list-unstyled components mb-5">
	          <!-- <li>
	            <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Mens Shoes</a>
	            <ul class="collapse list-unstyled" id="pageSubmenu1">
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Casual</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Football</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Jordan</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Lifestyle</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Running</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Soccer</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Sports</a></li>
	            </ul>
	          </li> -->
              <li><a href="{{ route('front.reqPage')}}"> جميع الخدمات </a></li>

              @foreach($services as $ser)


              <li><a href="{{ route('serReq',$ser->id) }}">{{ $ser->services  }} </a></li>
                @endforeach

	        </ul>
            <h5 class="sidebar_title"> الحالة </h5>

            <ul class="list-unstyled components mb-5">

                <li><a href="{{ route('front.reqPage')}}"> الكل </a></li>

                @foreach($status as $ser)


                <li><a href="{{ route('statusReq',$ser->id) }}">{{ $ser->status  }} </a></li>
                  @endforeach

              </ul>







    	</nav>


        @if ($allreqs->isEmpty())
        <h4> لا يوجد نتائج للبحث </h4>
        @else

        @foreach($allreqs as $item)

   <div id="content" class="">


   <div class="card">
  <div class="card-body">

    <a href="{{ route('serReq',$item->service_id) }}" class="btn btn-outline-primary req-ser"> {{$item->ser->services}} </a>
    <h5 class="card-title"><a href="{{ route('requestDetails',$item->id) }}"> {{$item->title}} </a></h5>
    <h6 class="card-text mt-5"> {{Str::limit($item->description, 100)}}</h6>
    <hr class="hr" />
    <a href="{{ route('requesterReq',$item->user_id) }}" class="btn btn-outline-primary"> اسم المستخدم: {{$item->reqUser->name}}  </a>
    <h5 class="btn btn-outline-primary mt-2"> التكلفة: {{$item->cost}} ريال </h5>
    <a href="{{ route('statusReq',$item->status_id) }}" class="btn btn-outline-primary"> الحالة: {{$item->status->status}} </a>

    <p class="req-date">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</p>
  </div>


</div>
<br>
@endforeach

<div class="pagination-wrap">
    {{ $allreqs->links('vendor.pagination.custom') }}
    </div>


@endif




  </div>
</section>

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="row">
          <div class="col-lg-6 text-center text-lg-start cta-mobile">
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
