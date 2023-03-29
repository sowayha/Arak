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

            <h4 class="card-title">اضف خدمة جديدة</h4><br>

             @if(count($errors))
                @foreach ($errors->all() as $error)
                <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                @endforeach

            @endif

            <form method="POST" action="{{route('addNewService')}}">
                @csrf



              <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">العنوان </label>
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
                <label for="email" class="col-sm-2 col-form-label">الوصف </label>
                <div class="col-sm-10">
                  <input name="description" class="form-control @error('description') is-invalid @enderror" type="text" value="{{ old('description') }}" required autocomplete="description">

                </div>
            </div>
            <!-- end row -->

            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $description }}</strong>
            </span>
            @enderror
<br>

            

<input type="submit" class="btn btn-primary waves-effect waves-light" value="اضافة">
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