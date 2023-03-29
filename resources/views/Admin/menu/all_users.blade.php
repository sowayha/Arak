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

                    <h4 class="card-title">الاعضاء</h4><br>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap table-responsive-sm" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>الاسم</th>
                            <th>البريد الالكتروني </th>
                            <th> رقم الهاتف  </th>
                            <th>الصلاحية</th>
                            <th>أجراءات</th>
                            @if($role == 1)
                            @else
                            <th> الرصيد </th>
                            <th> شحن الرصيد </th>
                            @endif


                        </thead>


                        <tbody>
                        	@php($i = 1)
                        	@foreach($users as $item)
                        <tr>
                            <td> {{ $i++}} </td>
                            <td> {{ $item->name }} </td>
                            <td> {{ $item->email }} </td>
                            <td> {{ $item->phoneNumber }} </td>
                            <td> {{ $item->role->name }} </td>

                            <td>
   <a href="{{route('admin.editUser',$item->id)}}" class="btn btn-primary sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>

     <a href="{{route('admin.deleteUser',$item->id)}}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>

                            </td>
                            @if($item->role_id == 1)
                            @else
                            <td> {{ $item->balance }} </td>

                            <td>
                                <a href="{{route('chargeBalance', $item->id)}}" class="btn btn-primary sm" title="User Balance" ata-toggle="modal" data-target="#exampleModalCenter">  <i class="fa-solid fa-hand-holding-dollar"></i> </a>
                            </td>
                            @endif

                        </tr>
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
