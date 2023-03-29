@extends('Admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="page-content">
<div class="container-fluid mt-3">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">تعديل بيانات العضو </h4><br>

                        @if(count($errors))
                @foreach ($errors->all() as $error)
                <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                @endforeach

            @endif

            <form method="post" action="{{route('admin.updateUser')}}" >  
                @csrf

                <input type="hidden" name="id" value="{{ $user->id }}">


         <div class="row mb-3">
        <label for="example-text-input" class="col-sm-2 col-form-label">تغيير الصلاحية</label>
        <div class="col-sm-10">
        <select name="role_id" class="form-select" aria-label="Default select example">
            <option selected="{{ $user->role_id }}" disabled selected>Choose Role</option>
            @foreach($roles as $role)
            <option value="{{ $role->id}}">{{ $role->id == $user->role_id ? 'Current: ' : '' }}{{ $role->name }}</option>
            @endforeach
            </select>
               </div>
            </div>
            <!-- end row -->

            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">الاسم</label>
                <div class="col-sm-10">
                    <input name="name" class="form-control" type="text" value="{{$user->name}}"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->

              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">البريد الالكتروني </label>
                <div class="col-sm-10">
                    <input name="email" class="form-control" type="text" value="{{$user->email}}"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="password" class="col-sm-2 col-form-label">كلمة المرور</label>
                <div class="col-sm-10">
                  <input name="password" class="form-control" type="password" placeholder="Enter a New Password">

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

@if(! empty($accdata->account_number))
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Bank Account</h4><br>


                <h6 class="card-title">Account Number : {{ $accdata->account_number }} </h6>
                <hr>
                <h6 class="card-title">Account Name : {{ $accdata->account_name }} </h6>
                <hr>
                <br>


                <a href="{{route('requester.editBankAcc')}}" class="btn btn-primary waves-effect waves-light" > Edit Bank Account</a>




        </div>
    </div>
    <br>
</div> <!-- end col -->
@endif

</div>



</div>
</div>

@endsection