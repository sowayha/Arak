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

                    <h4 class="card-title">  كل الطلبات المكتملة</h4><br>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap table-responsive-sm" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>ID</th>

                            <th> المستخدم </th>
                            <th> تاريخ الطلب </th>
                            <th> تاريخ البداية </th>


                            <th>نوع الخدمة </th>
                            <th> مقدم الخدمة </th>
                            <th> التكلفة </th>
                            <th> تاريخ التسليم  </th>
                            <th>أجراءات</th>


                        </thead>


                        <tbody>
                        	@php($i = 1)
                        	@foreach($requests as $item)
                        <tr>

                            <td> {{ $i++}} </td>
                        <td> {{ $item->reqUser->name }} </td>
                        <td> {{ Carbon\Carbon::parse($item->created_at) }} </td>

                        <td> {{$item->updated_at}} </td>

                            <td> {{ $item->ser->services }} </td>



                            <td>  <?php
                                $prov = DB::table('users')->where('id', $item->provider_id)->first();
                                echo $prov->name;

                                ?> </td>

                            <td>  <?php
                                $q = DB::table('quotations')->where('user_id', $item->provider_id)->where('req_id', $item->id)->first();
                                $rate = DB::table('rates')->find(1);
                                $total = $q->cost - ($q->cost * $rate->req_rate / 100);
                                echo $total;

                                ?>  ريال </td>
                            <td> {{ $item->update_status}} </td>

                            <td>
                                <a href="{{ route('requestDetails',$item->id) }}" class="btn btn-primary sm" title="view Data">  <i class="fa-solid fa-eye"></i></a>
                            </td>

                        @endforeach

{{-- ---------------------------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------------------------                         --}}

                        </tbody>

                        <tbody>
                        	@php($i = 1)
                        	@foreach($orders as $item)
                        <tr>

                            <td> {{ $i++}} </td>
                        <td> {{ $item->reqUser->name }} </td>
                        <td> {{ Carbon\Carbon::parse($item->created_at) }} </td>

                        <td> {{$item->updated_at}} </td>

                            <td> {{ $item->ser->services }} </td>



                            <td>  <?php
                                $prov = DB::table('users')->where('id', $item->provider_id)->first();
                                echo $prov->name;

                                ?> </td>

                            <td>  <?php
                                $rate = DB::table('rates')->find(1);
                                $total = $item->cost - ($item->cost * $rate->req_rate / 100);
                                echo $total;

                                ?>  ريال </td>
                            <td> {{ $item->update_status}} </td>



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
