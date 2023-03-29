
@extends('frontend.master')
@section('frontend')




<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <ol class="mt-3">
      <li><a href="{{route('home')}}"> الرئيسة </a></li>
      <li><a href="{{ route('terms_conditions') }}"> الشروط والاحكام  </a> </li>
    </ol>
    <h2 class="title">  الشروط والاحكام  </h2>

  </div>
</section><!-- End Breadcrumbs -->



<section class="inner-page">
    <div class="container d-md-flex mb-5">
       <!-- Page Content  -->


       <h4 class="pb-5"> {{$terms->terms}} </h4>
    </div></section>


@endsection
