@extends('Admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="page-content">
<div class="container-fluid mt-3">

<div class="row justify-content-center mt-5">
<div class="col-xl-10 col-sm-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title"> شحن الرصيد  </h4><br>

                        @if(count($errors))
                @foreach ($errors->all() as $error)
                <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                @endforeach

            @endif

            <h6 class="card-title">الاسم : {{ $user->name }} </h6>
            <hr>
            <h6 class="card-title">البريد الالكتروني  : {{ $user->email }} </h6>
            <hr>
            <h6 class="card-title">رقم الهاتف : +20{{ $user->phoneNumber }} </h6>
            <hr>
            <h6 class="card-title">الصلاحية : {{ $role->name }} </h6>
            <hr>
            <br>

            @if($user->role_id == 2)

            <form method="post" action="{{route('raddBAlance')}}" >
                @csrf

                @elseif($user->role_id == 3)
                <form method="post" action="{{route('paddBAlance')}}" >
                    @csrf
                    @endif

                <input type="hidden" name="id" value="{{ $user->id }}">
                <input type="hidden" name="name" value="{{ $user->name }}">
                <input type="hidden" name="email" value="{{ $user->email }}">
                <input type="hidden" name="phoneNumber" value="{{ $user->phoneNumber }}">






            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label mobile-balance" ><b> الرصيد (ريال) </b></label>
                <div class="col-sm-10">
                    <input name="balance" class="form-control" type="text" value="{{$user->balance}}"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->
            <br>


<input type="submit" class="btn btn-primary  waves-effect waves-light" value="تحديث">
            </form>



        </div>
    </div>
    <br>
</div> <!-- end col -->


</div>



</div>
</div>

@endsection
