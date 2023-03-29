@extends('Admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="page-content">
<div class="container-fluid mt-3">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">تعديل الخدمة  </h4><br>

                        @if(count($errors))
                @foreach ($errors->all() as $error)
                <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                @endforeach

            @endif

            <form method="post" action="{{route('updateService')}}" >  
                @csrf

                <input type="hidden" name="id" value="{{ $service->id }}">


            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">العنوان</label>
                <div class="col-sm-10">
                    <input name="title" class="form-control" type="text" value="{{$service->title}}"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->

              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">الوصف</label>
                <div class="col-sm-10">
                    <input name="description" class="form-control" type="text" value="{{$service->description}}"  id="example-text-input">
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