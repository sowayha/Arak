

@extends('Admin.admin_master')
@section('admin')


<div class="row justify-content-center" style="margin-top: 50px">

    <div class="col-xl-8 col-sm-10">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title"> نبذة عن مقدم الخدمة   </h4><br>


                <form method="post" action="{{route('provDesc')}}" >
                    @csrf

                <div class="row mb-3">
                    <div class="col-sm-12">
                        <textarea name="description" class="form-control" type="text"  id="example-text-input" rows="4" maxlength = "400">{{$user->description}}</textarea>
                    </div>
                </div>
                <!-- end row -->

                <input type="submit" class="btn btn-primary  waves-effect waves-light" value="إضافة ">
                </form>
            </div></div></div></div>


            @endsection
