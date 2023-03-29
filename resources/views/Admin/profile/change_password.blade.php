@extends('Admin.admin_master')
@section('admin')


<div class="page-content">
<div class="container-fluid mt-3">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">تغيير كلمة المرور </h4><br>

            @if(count($errors))
                @foreach ($errors->all() as $error)
                <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                @endforeach

            @endif

            


                 @if(Auth::user()->role_id == 1)
                <form method="post" action=" {{route('admin.change')}}" >
                @csrf

                @elseif(Auth::user()->role_id == 2)
                <form method="post" action=" {{route('requester.change')}}" >
                @csrf

                @else
                <form method="post" action=" {{route('provider.change')}}" >
                @csrf
                @endif


            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">كلمة المرور الحالية</label>
                <div class="col-sm-10">
                    <input name="oldpassword" class="form-control" type="password"   id="oldpassword">
                </div>
            </div>
            <!-- end row -->


             <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">كلمة المرور الجديدة</label>
                <div class="col-sm-10">
                <input name="newpassword" class="form-control" type="password"  id="newpassword">
                </div>
            </div>
            <!-- end row -->



             <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label"> تكرار كلمة المرور الجديدة</label>
                <div class="col-sm-10">
                    <input name="confirm_password" class="form-control" type="password"   id="confirm_password">
                </div>
            </div>
            <!-- end row -->
            <br>




<input type="submit" class="btn btn-primary waves-effect waves-light" value="تحديث">
            </form>



        </div>
    </div>
</div> <!-- end col -->
</div>



</div>
</div>



@endsection 