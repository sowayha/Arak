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

            <h4 class="card-title"> اضف الشروط والاحكام الخاصة بك</h4>
            <br><br>

            <form method="post" action="{{route('updateTerms')}}" >
                @csrf

<input type="hidden" name="id" value="{{$terms->id}}">



            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label"> الشروط والاحكام </label>
                <div class="col-sm-10">
                    <textarea name="terms" class="form-control" type="text" id="example-text-input" rows="9">{{$terms->terms}}</textarea>

                </div>
            </div>
            <!-- end row -->


<br>



<input type="submit" class="btn btn-primary waves-effect waves-light" value="تحديث">

<a href="{{route('terms_conditions')}}" class="btn btn-primary waves-effect waves-light" > صفحة الشروط والاحكام </a>

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
