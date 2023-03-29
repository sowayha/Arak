@extends('Admin.admin_master')
@section('admin')



<div class="page-content">
<div class="container-fluid mt-3">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">تعديل بيانات الحساب </h4><br>

                @if(count($errors))
                @foreach ($errors->all() as $error)
                <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                @endforeach

                @endif

            


                 @if(Auth::user()->role_id == 1)
                <form method="post" action="{{route('admin.update.profile')}}" >
                @csrf

                @elseif(Auth::user()->role_id == 2)
                <form method="post" action="{{route('requester.update.profile')}}" >
                @csrf

                @else
                <form method="post" action="{{route('provider.update.profile')}}" >
                @csrf
                @endif





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
                <label for="example-text-input" class="col-sm-2 col-form-label">رقم الهاتف</label>
                <div class="col-sm-10">
                    <input name="phoneNumber" class="form-control" type="text" value="{{$user->phoneNumber}}"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->


          <!--   <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Change Role</label>
                <div class="col-sm-10">
        <select name="role_id" class="form-select" aria-label="Default select example">
            <option selected="">Choose Role</option>
            @foreach($roles as $role)
            <option value="{{ $role->id}}">{{ $role->id == $user->role_id ? '' : '' }} {{ $role->name }}</option>
            @endforeach
            </select>
               </div>
            </div> -->
            <!-- end row -->
            <br>




              

<input type="submit" class="btn btn-primary  waves-effect waves-light" value="تحديث ">
            </form>



        </div>
    </div>
</div> <!-- end col -->
</div>



</div>
</div>

@endsection