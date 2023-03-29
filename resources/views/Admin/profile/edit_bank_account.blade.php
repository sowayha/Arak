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


            <h4 class="card-title">تعديل البيانات</h4><br>

             @if(count($errors))
                @foreach ($errors->all() as $error)
                <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                @endforeach

            @endif


                @if(Auth::user()->role_id == 2)
                  <form method="POST" action="{{ route('requester.updateBankAcc') }}">
                @csrf


                @else
                 <form method="POST" action="{{ route('provider.updateBankAcc') }}">
                @csrf

                @endif




              <div class="row mb-3">
                <label for="accNumber" class="col-sm-2 col-form-label">رقم الحساب</label>
                <div class="col-sm-10">
                    <input name="accNumber" class="form-control @error('accNumber') is-invalid @enderror" type="text" value="{{ $accdata->account_number }} " required autocomplete="accNumber" autofocus>

                   @error('accNumber')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->
          


            <div class="row mb-3">
                <label for="accName" class="col-sm-2 col-form-label">اسم الحساب</label>
                <div class="col-sm-10">
                  <input name="accName" class="form-control @error('accName') is-invalid @enderror" type="accNameaccName" value="{{ $accdata->account_name }} " required autocomplete="email">

                </div>
            </div>
            <!-- end row -->

            @error('accName')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror



<input type="submit" class="btn btn-primary waves-effect waves-light" value="تحديث">
            </form>



        </div>
    </div>
    <br>
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