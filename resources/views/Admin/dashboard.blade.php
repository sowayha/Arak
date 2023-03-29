@extends('Admin.admin_master')
@section('admin')



<div class="content mx-3">
    <!--middle content wrapper-->
    @php
    $id = Auth::user()->id;
    $adminData = App\Models\User::find($id);
    @endphp

    <h4 class="ml-5 mt-4">اهلا,  {{ $adminData->name }}  </h4>
    <p class="ml-5">يمكنك إدارة الموقع عن طريق لوحة التحكم .
</p>

<br>
<br>

@if(Auth::user()->role_id == 2 || Auth::user()->role_id == 3)



<div class="row justify-content-center">

<div class="balance">

    <button type="button" class="btn btn-primary float-left mr-3 mobile-charge" data-toggle="modal" data-target="#exampleModalCenter">
        شحن الرصيد
    </button>


@if(Auth::user()->role_id == 2)
    <form method="POST" action="{{route('r.withdraw')}}">
        @csrf
@else
<form method="POST" action="{{route('p.withdraw')}}">
    @csrf
@endif

            <input type="hidden" name="id" value="{{ Auth::User()->id }}" >



    <button type="submit" class="btn btn-secondary mobile-withdraw"> سحب الرصيد </button>


    </form>



    <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"> اتبع الخطوات لشحن الرصيد </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>





<!-- Tabs navs -->
<ul class="nav nav-tabs nav-fill mb-3" id="ex1" role="tablist">
    <li class="nav-item" role="presentation">
      <a
        class="nav-link active"
        id="ex2-tab-1"
        data-mdb-toggle="tab"
        href="#ex2-tabs-1"
        role="tab"
        aria-controls="ex2-tabs-1"
        aria-selected="true"
        > بطاقة إئتمان </a
      >
    </li>
    <li class="nav-item" role="presentation">

        <a
          class="nav-link"
          id="ex2-tab-2"
          data-mdb-toggle="tab"
          href=""
          role="tab"
          data-toggle="modal" data-target="#bankTransfer"
          aria-controls="ex2-tabs-2"
          aria-selected="false"
          > تحويل بنكي </a>

    </li>



<!-- Modal -->
<div class="modal fade" id="bankTransfer" tabindex="-1" role="dialog" aria-labelledby="bankTransferTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"> اتبع الخطوات لشحن الرصيد </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">



            <h5 class="float-right"> تحويل بنكي </h5>
<br>



        <ol >
            <li style="text-align:right;">
                اختيار الحساب الذي تجري التحويل منه
            </li>

        @php
        $id = Auth::User()->id;
        $accdata = DB::table('bank_accounts')->where('user_id',$id)->first();
        @endphp

        @if( ! empty($accdata->account_number))

                <br>
                <h6 class="card-title" style="text-align:right;"> رقم الحساب : {{ $accdata->account_number }} </h6>
                <h6 class="card-title" style="text-align:right;"> اسم الحساب : {{ $accdata->account_name }} </h6>
                <br>


        @else

                <br>
                @if(Auth::user()->role_id == 2)
                <h6 class="card-title" style="text-align:right;"> <a href="{{route('requester.addBankAcc')}}"> اضف حسابك البنكي </a> </h6>
                @else
                <h6 class="card-title" style="text-align:right;"> <a href="{{route('provider.addBankAcc')}}"> اضف حسابك البنكي </a> </h6>
                <br>
                @endif


        @endif

            <li style="text-align:right;">
                ملء تفاصيل المستفيد والمبلغ والغرض من التحويل
            </li>


            <br>
            <h6 class="card-title" style="text-align:right;"> رقم الحساب : 12345 </h6>
            <h6 class="card-title" style="text-align:right;"> اسم الحساب : admin </h6>
            <br>


            <li style="text-align:right;">
                ارسال صورة التحويل للبريد الالكتروني info@arak.com
            </li>


        </ol><br>
        <p style="text-align:center;"> *سيتم مراجعة العملية وإضافة الشحن الي رصيدك بالمنصة </p>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal"> تم </button>
        </div>
      </div>
    </div>
  </div>


  </ul>
  <!-- Tabs navs -->

<!-- Tabs content -->
<div class="tab-content" id="ex2-content">
  <div
    class="tab-pane fade show active"
    id="ex2-tabs-1"
    role="tabpanel"
    aria-labelledby="ex2-tab-1"
  >
  <br>

  <div class="modal-body">
    <div class="text-center">
    <button type="button" class="btn btn-primary">
        @if(Auth::user()->role_id == 2)
        <a href="{{route('r.creditCard')}}" style="color:white;"> شحن الرصيد عن طريق البطاقة الائتمانية  </a>
        @else
        <a href="{{route('p.creditCard')}}" style="color:white;"> شحن الرصيد عن طريق البطاقة الائتمانية  </a>
        @endif
        </button>

    </div>
</div>
<br>

  </div>


</div>
<!-- Tabs content -->




        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal"> تم </button>

        </div>
      </div>
    </div>
  </div>




</div></div>
  <div class="row justify-content-center">



    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-truncate font-size-14 mb-2 text-center"> الرصيد الكلي </p>

                        <h4 class="mb-2 text-center"> {{$user->balance}} ريال </h4>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-light text-primary rounded-3">
                            <i class="ri-shopping-cart-2-line font-size-24"></i>
                        </span>
                    </div>
                </div>
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-truncate font-size-14 mb-2 text-center"> الرصيد المعلق </p>
                        <h4 class="mb-2 text-center"> {{$user->stuck}} ريال </h4>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-light text-success rounded-3">
                            <i class="mdi mdi-currency-usd font-size-24"></i>
                        </span>
                    </div>
                </div>
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->

</div><!-- end row -->

@else
@endif


</div><!--/ content wrapper -->




@endsection








