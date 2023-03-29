@extends('Admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<div class="page-content">
<div class="container-fluid mt-3">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">حسابي </h4><br>



            <div class="card-body">
                <h6 class="card-title">الاسم : {{ $adminData->name }} </h6>
                <hr>
                <h6 class="card-title">البريد الالكتروني  : {{ $adminData->email }} </h6>
                <hr>
                <h6 class="card-title">رقم الهاتف : +20{{ $adminData->phoneNumber }} </h6>
                <hr>
                <h6 class="card-title">الصلاحية : {{ Auth::user()->role->name }} </h6>
                <hr>
                <br>

                @if(Auth::user()->role_id == 1)
                <a href="{{route('admin.editProfile')}}" class="btn btn-primary waves-effect waves-light" > تعديل البيانات</a>

                @elseif(Auth::user()->role_id == 2)
                <a href="{{route('requester.editProfile')}}" class="btn btn-primary waves-effect waves-light" > تعديل البيانات</a>

                @else
                <a href="{{route('provider.editProfile')}}" class="btn btn-primary waves-effect waves-light" > تعديل البيانات</a>
                @endif





            </div>



        </div>
    </div>
    <br>
</div> <!-- end col -->




</div>






</div>
</div>


@endsection