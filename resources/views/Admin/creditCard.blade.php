@extends('Admin.admin_master')
@section('admin')



 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">


                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title"> الدفع عن طريق بطاقة إئتمان </h4><br>

@php
$find = DB::table('payment_amounts')->where('user_id', Auth::User()->id)->first();
@endphp

@if(session()->has('success'))
<div class="alert alert-dismissable alert success" style="background: #198754; color: white;">
    <button type="button" class="close float-left" data-dismiss="alert" aria-label="close" style="color: white">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong class="successMessage">
        {!! session()->get('success') !!}
    </strong>
</div><br>

@elseif(session()->has('fail'))
<div class="alert alert-dismissable alert success" style="background: #b1140f; color: white;">
    <button type="button" class="close float-left" data-dismiss="alert" aria-label="close" style="color: white">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong class="failMessage">
        {!! session()->get('fail') !!}
    </strong>
</div><br>


@endif

                    <form method="get" action="{{route('amount')}}" >
                        @csrf
                    <div class="container">
                        <div class="row mb-3 justify-content-center">
                            <div class="col-sm-3">
                        <div class="input-group mb-3">

                            @if(! $find)
                            <input name="amount" class="form-control" type="text"  id="example-text-input" placeholder=" المبلغ " required>
                            @else
                            <input name="amount" class="form-control" style="border-radius: 5px;" type="text"  id="example-text-input" placeholder=" المبلغ " value="{{$find->amount}}" required>
                            @endif
                            <div class="input-group-append">
                              <input type="submit" class="btn  input-group-text" style="background: #183f9c; color: white; border-radius: 5px; border-top-right-radius: 0px; border-bottom-right-radius: 0px;" id="basic-addon2" value=" تأكيد ">
                            </div></div>
                            </div>
                          </div>
                        </div>
                    <!-- end row -->
                    </form>




                    <div class="mysr-form"></div>
                    <script>
                        Moyasar.init({
                            element: '.mysr-form',
                            // Amount in the smallest currency unit.
                            // For example:
                            // 10 SAR = 10 * 100 Halalas
                            // 10 KWD = 10 * 1000 Fils
                            // 10 JPY = 10 JPY (Japanese Yen does not have fractions)
                            amount: {{$find->amount * 100}},
                            currency: 'SAR',
                            description: 'Balance of {{Auth::User()->name}}',
                            publishable_api_key: 'pk_test_iSjYMpr52VHDk8i2MZjRUGPc3a6DiXr82EvYAg86',
                            callback_url: '{{route('thankYou')}}',
                            methods: ['creditcard'],
                        });
                    </script>


                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->



                    </div> <!-- container-fluid -->
                </div>





@endsection
