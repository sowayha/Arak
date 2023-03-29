@extends('Admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="page-content">
<div class="container-fluid mt-3">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">تعديل السؤال </h4><br>

                        @if(count($errors))
                @foreach ($errors->all() as $error)
                <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                @endforeach

            @endif

            <form method="post" action="{{route('updateFaqs')}}" >  
                @csrf

                <input type="hidden" name="id" value="{{ $faqs->id }}">


            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">السؤال</label>
                <div class="col-sm-10">
                    <input name="question" class="form-control" type="text" value="{{$faqs->question}}"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->

              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">الاجابة</label>
                <div class="col-sm-10">
                    <textarea name="answer" class="form-control" type="text" id="example-text-input">{{$faqs->answer}}</textarea>
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