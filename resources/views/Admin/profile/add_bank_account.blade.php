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

    @if(! empty($accdata->account_number))
    @elseif(Auth::user()->role_id == 2)

<div class="col-12">
    <div class="card">
        <div class="card-body">


            <h4 class="card-title">اضف حسابك البنكي</h4><br>

             @if(count($errors))
                @foreach ($errors->all() as $error)
                <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                @endforeach

            @endif



                <form method="POST" action="{{ route('requester.saveBankAcc') }}">
                @csrf




              <div class="row mb-3">
                <label for="accNumber" class="col-sm-2 col-form-label">رقم الحساب </label>
                <div class="col-sm-10">
                    <input name="accNumber" class="form-control @error('accNumber') is-invalid @enderror" type="text" value="{{ old('accNumber') }}" required autocomplete="accNumber" autofocus>

                   @error('accNumber')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->



            <div class="row mb-3">
                <label for="accName" class="col-sm-2 col-form-label">اسم الحساب </label>
                <div class="col-sm-10">
                  <input name="accName" class="form-control @error('accName') is-invalid @enderror" type="accNameaccName" value="{{ old('accName') }}" required autocomplete="email">

                </div>
            </div>
            <!-- end row -->

            @error('accName')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror



<input type="submit" class="btn btn-primary waves-effect waves-light" value="Save">
            </form>



        </div>
    </div>
    <br>
</div> <!-- end col -->

@elseif(Auth::user()->role_id == 3)
<div class="col-12">
    <div class="card">
        <div class="card-body">


            <h4 class="card-title">اضف حسابك البنكي</h4><br>

             @if(count($errors))
                @foreach ($errors->all() as $error)
                <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                @endforeach

            @endif



                <form method="POST" action="{{ route('provider.saveBankAcc') }}">
                @csrf




              <div class="row mb-3">
                <label for="accNumber" class="col-sm-2 col-form-label">رقم الحساب </label>
                <div class="col-sm-10">
                    <input name="accNumber" class="form-control @error('accNumber') is-invalid @enderror" type="text" value="{{ old('accNumber') }}" required autocomplete="accNumber" autofocus>

                   @error('accNumber')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->



            <div class="row mb-3">
                <label for="accName" class="col-sm-2 col-form-label">اسم الحساب </label>
                <div class="col-sm-10">
                  <input name="accName" class="form-control @error('accName') is-invalid @enderror" type="accNameaccName" value="{{ old('accName') }}" required autocomplete="email">

                </div>
            </div>
            <!-- end row -->

            @error('accName')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror



<input type="submit" class="btn btn-primary waves-effect waves-light" value="Save">
            </form>



        </div>
    </div>
    <br>
</div> <!-- end col -->


@endif




@if(Auth::user()->role_id == 2 && ! empty($accdata->account_number))

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">الحساب البنكي</h4><br>


                <h6 class="card-title"> رقم الحساب : {{ $accdata->account_number }} </h6>
                <hr>
                <h6 class="card-title"> اسم الحساب : {{ $accdata->account_name }} </h6>
                <hr>
                <br>


                <a href="{{route('requester.editBankAcc')}}" class="btn btn-primary waves-effect waves-light" > تعديل  </a>




        </div>
    </div>
    <br>
</div> <!-- end col -->

@elseif(Auth::user()->role_id == 3 && ! empty($accdata->account_number))

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">الحساب البنكي</h4><br>


                <h6 class="card-title">رقم الحساب : {{ $accdata->account_number }} </h6>
                <hr>
                <h6 class="card-title">اسم الحساب : {{ $accdata->account_name }} </h6>
                <hr>
                <br>


                <a href="{{route('provider.editBankAcc')}}" class="btn btn-primary waves-effect waves-light" > تعديل</a>



        </div>
    </div>
    <br>
</div> <!-- end col -->

@endif









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
