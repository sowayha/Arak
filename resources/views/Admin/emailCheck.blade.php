
@extends('Admin.admin_master')
@section('admin')

<div class="content_wrapper">


<div class="row justify-content-center mt-5">
    <div class="col-8">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title"> تحقق من البريد الالكتروني  </h4><br>


                <form method="POST" action="{{route('updateCheck')}}">


                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="check" value="1" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                                تفعيل
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="check" value="0" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            تعطيل
                        </label>
                      </div>
                      <br>

                      <input type="submit" class="btn btn-primary" value="تم" name="bc">

        </form>

            </div></div></div></div>


</div>

            @endsection




