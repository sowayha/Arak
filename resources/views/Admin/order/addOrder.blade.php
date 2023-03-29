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

            <h4 class="card-title"> طلب  التعميد </h4><br>

             @if(count($errors))
                @foreach ($errors->all() as $error)
                <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                @endforeach

            @endif

            <form method="POST" action="{{route('hiring')}}">
                @csrf

                <input type="hidden" name="status_id" >
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <input type="hidden" name="provider_id" value="{{$provid}}">



              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label"> اختر من الخدمات </label>
                <div class="col-sm-10">
        <select name="service_id" class="form-select" aria-label="Default select example">
            <option selected="">Choose service</option>
            @foreach($services as $ser)
            <option value="{{ $ser->id}}">{{ $ser->id == $user->service_id ? '' : '' }} {{ $ser->services }}</option>
            @endforeach
            </select>
               </div>
            </div>



              <div class="row mb-3">
                <label for="title" class="col-sm-2 col-form-label"> عنوان الخدمة </label>
                <div class="col-sm-10">
                    <input name="title" class="form-control @error('title') is-invalid @enderror" type="text" value="{{ old('title') }}" required autocomplete="title" autofocus>

                   @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->



            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label"> وصف الخدمة </label>
                <div class="col-sm-10">
                  <textarea name="description" class="form-control @error('email') is-invalid @enderror" type="text" value="{{ old('description') }}" required autocomplete="description" rows="5"></textarea>

                </div>
            </div>
            <!-- end row -->


            <div class="row mb-3">
                <label for="deadline" class="col-sm-2 col-form-label">    عدد ايام العمل </label>
                <div class="col-sm-10">
                  <input name="deadline" class="form-control @error('cost') is-invalid @enderror" type="text" value="{{ old('deadline') }}" required autocomplete="deadline">

                </div>
            </div>
            <!-- end row -->


            <div class="row mb-3">
                <label for="cost" class="col-sm-2 col-form-label">    تكلفة الخدمة (ريال) </label>
                <div class="col-sm-10">
                  <input name="cost" class="form-control @error('cost') is-invalid @enderror" type="text" value="{{ old('cost') }}" required autocomplete="cost">

                </div>
            </div>
            <!-- end row -->


            @error('cost')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
<br>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                <label class="form-check-label" for="flexCheckDefault">
                    لقد قرأتُ <a href="{{ route('terms_conditions') }}"> الشروط والأحكام </a> وأوافق عليها *
                </label>
              </div>

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