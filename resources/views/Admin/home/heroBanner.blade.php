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

            <h4 class="card-title">تعديل العنوان الرئيسي للصفحة</h4><br>

            <form method="post" action="{{route('updateHeroBanner')}}" enctype="multipart/form-data">
                @csrf

<input type="hidden" name="id" value="{{ $hero->id }}">


              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">عنوان فرعي</label>
                <div class="col-sm-10">
                    <input name="sub_title" class="form-control" type="text" id="example-text-input" value="{{ $hero->sub_title }}">

                    @error('title')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->


              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">العنوان الرئيسى</label>
                <div class="col-sm-10">
                    <input name="title" value="{{ $hero->title }}" class="form-control" type="text" data-role="tagsinput">
                </div>
            </div>
            <!-- end row -->



            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label"> الوصف </label>
                <div class="col-sm-10">


      <textarea name="description" class="form-control" type="text" data-role="tagsinput" rows="3"> {{ $hero->description }} </textarea>
                </div>
            </div>
            <!-- end row -->

             <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">الزر</label>
                <div class="col-sm-10">
                    <input name="button" value="{{ $hero->button }}" class="form-control" type="text" data-role="tagsinput">
                </div>
            </div>
            <!-- end row -->


             <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">الصورة </label>
                <div class="col-sm-10">
           <input name="image" class="form-control" type="file" id="image">
                </div>
            </div>
            <!-- end row -->


              <div class="row mb-3">
                 <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                <div class="col-sm-10">
  <img id="showImage" class="rounded avatar-lg" src="{{asset('frontend/assets/img/hero-img.png')}}" alt="Card image cap" height="200" width="200">
                </div>
            </div>
            <!-- end row -->
<input type="submit" class="btn btn-primary waves-effect waves-light" value="تحديث">
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
