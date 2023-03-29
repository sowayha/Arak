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

            <h4 class="card-title">مواقع التواصل الاجتماعي</h4><br>

            <form method="post" action="{{route('updatesocial')}}">
                @csrf

<input type="hidden" name="id" value="{{ $social->id }}">


              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Facebook </label>
                <div class="col-sm-10">
                    <input name="facebook" class="form-control" type="text" id="example-text-input" value="{{ $social->facebook }}">

                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Twitter </label>
                <div class="col-sm-10">
                    <input name="tw" class="form-control" type="text" id="example-text-input" value="{{ $social->tw }}">

                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Instagram</label>
                <div class="col-sm-10">
                    <input name="insta" class="form-control" type="text" id="example-text-input" value="{{ $social->insta }}">

                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Linkedin </label>
                <div class="col-sm-10">
                    <input name="linkedin" class="form-control" type="text" id="example-text-input" value="{{ $social->linkedin }}">

                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Youtube </label>
                <div class="col-sm-10">
                    <input name="youtube" class="form-control" type="text" id="example-text-input" value="{{ $social->youtube }}">

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