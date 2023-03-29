@extends('Admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="page-content">
<div class="container-fluid mt-3">

<div class="row justify-content-center mt-5">
<div class="col-xl-10 col-sm-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">  اضف النسبة المطلوبة  </h4><br><br>

            <form method="post" action="{{route('update_rate')}}" >
                @csrf
            <input type="hidden" name="id" value="{{ $rate->id }}">




            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label rate-width"><b>  النسبة للمستخدم (%) </b></label>
                <div class="col-sm-9">
                    <input name="req_rate" class="form-control" type="text" value="{{ $rate->req_rate }}"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->
            <br>

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label rate-width"><b>  النسبة لمقدم الخدمة (%) </b></label>
                <div class="col-sm-9">
                    <input name="prov_rate" class="form-control" type="text" value="{{ $rate->prov_rate }}"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->
            <br>

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label rate-width"><b>  الحد الادني للمستخدم (ريال) </b></label>
                <div class="col-sm-9">
                    <input name="req_min" class="form-control" type="text" value="{{ $rate->req_min }}"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->
            <br>

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label rate-width"><b>  الحد الادني لمقدم الخدمة (ريال) </b></label>
                <div class="col-sm-9">
                    <input name="prov_min" class="form-control" type="text" value="{{ $rate->prov_min }}"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->
            <br><br>


<input type="submit" class="btn btn-primary  waves-effect waves-light" value="اضافة">
            </form>



@endsection
