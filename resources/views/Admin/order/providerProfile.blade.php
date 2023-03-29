@extends('Admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<div class="page-content">
<div class="container-fluid mt-3">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title"> مقدم الخدمة </h4><br>
<div class="float-left">
    <a href="{{route('chatbox', $user->id)}}" class="btn btn-primary sm" title="Send Message">  <i class="fa-brands fa-facebook-messenger"></i> </a>


   <a href="{{route('addOrder', $user->id)}}" class="btn btn-primary sm" title="Request"> طلب التعميد </a>

</div>

            <div class="card-body">
                <h6 class="card-title">الاسم : {{ $user->name }} </h6>
                <hr>
                <h6 class="card-title">البريد الالكتروني  : {{ $user->email }} </h6>
                <hr>
                <h6 class="card-title">رقم الهاتف : +20{{ $user->phoneNumber }} </h6>
                <hr>
                <h6 class="card-title">الوصف : {{ $user->description }} </h6>

                <br>

            </div>



        </div>
    </div>
    <br>
</div> <!-- end col -->




</div>






</div>
</div>


@endsection
