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

    <h4 class="card-title"> طلبات السحب </h4><br>


    <table id="datatable" class="table table-bordered dt-responsive nowrap table-responsive-sm" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
        <tr>
            <th>ID</th>
            <th>  المبلغ المطلوب </th>
            <th>  تاريخ الطلب  </th>
            <th> تاريخ السحب  </th>
            <th>الحالة</th>



        </thead>


        <tbody>
            @php($i = 1)
            @foreach($user as $item)
            @if($item->id == Auth::User()->id)

        <tr>
            <td> {{$i++}} </td>
            <td> {{ $item->withdraw_cost }} </td>
            <td> {{ $item->withdraw_date }} </td>
            @if(! $item->withdraw_update)
            <td> ___________________ </td>
            @else
            <td> {{ $item->withdraw_update}} </td>
            @endif

            <td>
                @if(! $item->withdraw_update)
                <p> جاري تنفيذ الطلب </p>

                @else
                <p> تم تأكيد العملية  </p>

                @endif
            </td>


        </tr>
        @endif

        @endforeach

        </tbody>
    </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->



    </div> <!-- container-fluid -->
</div>



@endsection
