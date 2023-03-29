@extends('Admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    } 
</style>

<div class="page-content">
<div class="container-fluid">

<div class="row mt-3">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">عضو جديد</h4><br>

             @if(count($errors))
                @foreach ($errors->all() as $error)
                <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                @endforeach

            @endif

            <form method="POST" action="{{ route('admin.addnewUser') }}" enctype="multipart/form-data">
                @csrf



              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">صلاحية العضو</label>
                <div class="col-sm-10">
        <select name="role_id" class="form-select" aria-label="Default select example">
            <option selected="">Choose Role</option>
            @foreach($roles as $role)
            <option value="{{ $role->id}}">{{ $role->id == $user->role_id ? '' : '' }} {{ $role->name }}</option>
            @endforeach
            </select>
               </div>
            </div>



              <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label"> اسم العضو </label>
                <div class="col-sm-10">
                    <input name="name" class="form-control @error('name') is-invalid @enderror" type="text" value="{{ old('name') }}" required autocomplete="name" autofocus>

                   @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->
          


            <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label"> البريد الالكتروني </label>
                <div class="col-sm-10">
                  <input name="email" class="form-control @error('email') is-invalid @enderror" type="email" value="{{ old('email') }}" required autocomplete="email">

                </div>
            </div>
            <!-- end row -->

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="row mb-3">
                <label for="phoneNumber" class="col-sm-2 col-form-label"> رقم الهاتف </label>
                <div class="col-sm-10">
                  <input name="phoneNumber" class="form-control @error('phoneNumber') is-invalid @enderror" type="text" value="{{ old('email') }}" required autocomplete="email">

                </div>
            </div>
            <!-- end row -->

            
            @error('phoneNumber')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="row mb-3">
                <label for="password" class="col-sm-2 col-form-label">كلمة المرور </label>
                <div class="col-sm-10">
                  <input name="password" class="form-control @error('password') is-invalid @enderror" type="password" required autocomplete="new-password">

                </div>
            </div>
            <!-- end row -->

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>
   


<input type="submit" class="btn btn-primary waves-effect waves-light" value="إضافة">
            </form>



        </div>
    </div>
</div> <!-- end col -->
</div>



</div>
</div>


<script type="text/javascript">
    
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection 