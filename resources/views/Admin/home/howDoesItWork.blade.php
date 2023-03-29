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

            <h4 class="card-title">كيفية الاستخدام</h4><br>

            <form method="post" action="{{route('updateHDIW')}}">
                @csrf

<input type="hidden" name="id" value="{{ $hdiw->id }}">


              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label"><h4>الموضوع الاول</h4> </label>
                <div class="col-sm-10">
                    <input name="tab1" class="form-control" type="text" id="example-text-input" value="{{ $hdiw->tab1 }}">

                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">الخطوة الاولي </label>
                <div class="col-sm-10">
                    <input name="tab11" class="form-control" type="text" id="example-text-input" value="{{ $hdiw->tab11 }}">

                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">الخطوة الثانية </label>
                <div class="col-sm-10">
                    <input name="tab12" class="form-control" type="text" id="example-text-input" value="{{ $hdiw->tab12 }}">

                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">الخطوة الثالثة </label>
                <div class="col-sm-10">
                    <input name="tab13" class="form-control" type="text" id="example-text-input" value="{{ $hdiw->tab13 }}">

                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">الخطوة الرابعة </label>
                <div class="col-sm-10">
                    <input name="tab14" class="form-control" type="text" id="example-text-input" value="{{ $hdiw->tab14 }}">

                </div>
            </div>
            <!-- end row -->




                 <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label"><h4>الموضوع الثاني</h4></label>
                <div class="col-sm-10">
                    <input name="tab2" class="form-control" type="text" id="example-text-input" value="{{ $hdiw->tab2 }}">

                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">النقطة الاولي </label>
                <div class="col-sm-10">
                    <input name="tab21" class="form-control" type="text" id="example-text-input" value="{{ $hdiw->tab21 }}">

                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">النقطة الثانية </label>
                <div class="col-sm-10">
                    <input name="tab22" class="form-control" type="text" id="example-text-input" value="{{ $hdiw->tab22 }}">

                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">النقطة الثالثة </label>
                <div class="col-sm-10">
                    <input name="tab23" class="form-control" type="text" id="example-text-input" value="{{ $hdiw->tab23 }}">

                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">النقطة الرابعة </label>
                <div class="col-sm-10">
                    <input name="tab24" class="form-control" type="text" id="example-text-input" value="{{ $hdiw->tab24 }}">

                </div>
            </div>
            <!-- end row -->




                 <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label"><h4>الموضوع الثالث </h4></label>
                <div class="col-sm-10">
                    <input name="tab3" class="form-control" type="text" id="example-text-input" value="{{ $hdiw->tab3 }}">

                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">النقطة الاولي </label>
                <div class="col-sm-10">
                    <input name="tab31" class="form-control" type="text" id="example-text-input" value="{{ $hdiw->tab31 }}">

                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">النقطة الثانية </label>
                <div class="col-sm-10">
                    <input name="tab32" class="form-control" type="text" id="example-text-input" value="{{ $hdiw->tab32 }}">

                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">النقطة الثالثة </label>
                <div class="col-sm-10">
                    <input name="tab33" class="form-control" type="text" id="example-text-input" value="{{ $hdiw->tab33 }}">

                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">الخطوة الرابعة </label>
                <div class="col-sm-10">
                    <input name="tab34" class="form-control" type="text" id="example-text-input" value="{{ $hdiw->tab34 }}">

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