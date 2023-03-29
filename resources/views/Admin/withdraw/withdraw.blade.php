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
            <th>الاسم</th>
            <th>  الصلاحية  </th>
            <th> البريد الالكتروني </th>
            <th> رقم الهاتف  </th>
            <th>  تاريخ طلب السحب  </th>
            <th>  المبلغ المطلوب </th>

            <th>أجراءات</th>



        </thead>


        <tbody>
            @php($i = 1)
            @foreach($user as $item)
        <tr>
            <td> {{$i++}} </td>
            <td> {{ $item->name }}  </td>
            <td> {{ $item->role->name }} </td>
            <td> {{ $item->email }} </td>
            <td> {{ $item->phoneNumber }} </td>
            <td> {{ $item->withdraw_date }} </td>
            <td> {{ $item->withdraw_cost }} </td>


            <td>
                @if(! $item->withdraw_update)
                <a href="{{route('withdrawUpdate', $item->id)}}" class="btn btn-primary sm" title="Done">  تأكيد العملية </a>

                @else
                <p> تم تأكيد العملية  </p>

                @endif
            </td>


        </tr>
        @endforeach

        </tbody>

        <div class="pagination-wrap">
            {{ $user->links('vendor.pagination.custom') }}
            </div>
    </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->



    </div> <!-- container-fluid -->
</div>



@endsection
