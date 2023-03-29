@extends('Admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="page-content">
<div class="container-fluid mt-3">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title"> تعديل العرض </h4><br>

                        @if(count($errors))
                @foreach ($errors->all() as $error)
                <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                @endforeach

            @endif


            <form method="post" action="{{route('provider.updateQuote')}}" >
                @csrf

                <input type="hidden" name="id" value="{{ $quote->id }}">





            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label"> مدة العمل </label>
                <div class="col-sm-10">
                    <input name="req_deadline" class="form-control" type="text" value="{{$quote->req_deadline}}"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->


            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label"> التكلفة ($)</label>
                <div class="col-sm-10">
                    <input name="cost" class="form-control" type="text" value="{{$quote->cost}}"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->


            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label"> الرسالة </label>
                <div class="col-sm-10">
                    <input name="message" class="form-control" type="text" value="{{$quote->message}}"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->



            <br>







<input type="submit" class="btn btn-primary  waves-effect waves-light" value="تحديث">
            </form>



        </div>
    </div>
    <br>
</div> <!-- end col -->



</div>



</div>
</div>

@endsection
