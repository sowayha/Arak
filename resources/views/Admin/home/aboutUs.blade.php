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

            <h4 class="card-title">من نحن </h4><br>

            <form method="post" action="{{route('updateAboutUs')}}" enctype="multipart/form-data">
                @csrf

<input type="hidden" name="id" value="{{ $about->id }}">


              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">الرؤية </label>
                <div class="col-sm-10">
                    <input name="vision" class="form-control" type="text" id="example-text-input" value="{{ $about->vision }}">

                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">الرسالة </label>
                <div class="col-sm-10">
                    <input name="mission" class="form-control" type="text" id="example-text-input" value="{{ $about->mission }}">

                </div>
            </div>
            <!-- end row -->




            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label"> الوصف </label>
                <div class="col-sm-10">


      <textarea name="description" class="form-control" type="text" data-role="tagsinput" rows="3"> {{ $about->description }} </textarea>
                </div>
            </div>
            <!-- end row -->

             <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">النقطة الاولي</label>
                <div class="col-sm-10">
                    <input name="l1" value="{{ $about->l1 }}" class="form-control" type="text" data-role="tagsinput">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">النقطة الثانية</label>
                <div class="col-sm-10">
                    <input name="l2" value="{{ $about->l2 }}" class="form-control" type="text" data-role="tagsinput">
                </div>
            </div>
            <!-- end row -->


            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">النقطة الثالثة</label>
                <div class="col-sm-10">
                    <input name="l3" value="{{ $about->l3 }}" class="form-control" type="text" data-role="tagsinput">
                </div>
            </div>
            <!-- end row --><br>



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
