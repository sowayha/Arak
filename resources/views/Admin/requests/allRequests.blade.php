@extends('Admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">



    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title"> كل الطلبات </h4><br>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap table-responsive-sm" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>ID</th>
                            @if(Auth::user()->role_id == 1)
                            <th> المستخدم </th>
                            @endif

                            <th>نوع الخدمة</th>
                            <th> عنوان الخدمة </th>
                            <th> وصف الخدمة </th>
                            <th> التكلفة </th>
                            <th> عدد ايام العمل </th>
                            <th> مقدم الخدمة </th>
                            <th>  تاريخ الطلب </th>
                            <th> حالة الطلب  </th>


                            <th>أجراءات</th>


                        </thead>


                        <tbody>
                        	@php($i = 1)
                        	@foreach($requests as $item)
                        <tr>

                            <td> {{ $i++}} </td>
                            @if(Auth::user()->role_id == 1)
                        <td> {{ $item->reqUser->name }} </td>

                        @endif
                            <td> {{ $item->ser->services }} </td>
                            <td> {{ $item->title }} </td>
                            <td> {{ Str::limit($item->description , 30)}} </td>
                            <td>  {{ $item->cost}} ريال </td>

                            @if(! $item->provider_id )
                            <td> -------------------- </td>
                            @else

                            <td> <?php
                            $prov = DB::table('quotations')->where('req_id', $item->id)->where('user_id', $item->provider_id)->first();
                            echo $prov->req_deadline;

                            ?> </td>
                            @endif


                            @if(! $item->provider_id )
                            <td> -------------------- </td>
                            @else

                            <td> <?php
                            $prov = DB::table('users')->where('id', $item->provider_id)->first();
                            echo $prov->name;

                            ?> </td>
                            @endif

                            <td> {{ Carbon\Carbon::parse($item->created_at)->diffForHumans()  }} </td>
                            <td> {{ $item->status->status}} </td>




                            {{-- @if(Auth::user()->role_id == 1)
                            @else

                            @if(! $item->update_status )
                            <td> -------------------- </td>
                            @else
                            @if($item->status_id == 3)
                            <td> تم تأكيد انتهاء تنفيذ الطلب </td>
                            @elseif($item->status_id == 4)
                            <td> تم إلغاء الطلب </td>
                            @else
                            <td> تم تنفيذ الطلب برجاء المراجعه وتأكيد العملية </td>
                            @endif
                            @endif
                            @endif --}}

                            @if(Auth::user()->role_id == 1)
                            <td>
                                <a href="{{ route('requestDetails',$item->id) }}" class="btn btn-primary sm" title="view Data">  <i class="fa-solid fa-eye"></i></a>

                            <a href="{{ route('editReq',$item->id) }}" class="btn btn-primary sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>

                            <a href="{{route('deleteReq',$item->id)}}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>

                            </td>
                            @else

                            <td>
     <a href="{{ route('requestDetails',$item->id) }}" class="btn btn-primary sm" title="view Data">  <i class="fa-solid fa-eye"></i></a>

@if($item->status_id == 2)
@if(! $item->provider_id )
@else

<a href="{{route('chatbox', $item->provider_id)}}" class="btn btn-primary sm" title="Send Message">   <i class="fa-brands fa-facebook-messenger"></i> </a>
@endif

<form method="POST" action="{{route('compeleteReq', $item->id)}}" class="float-left">
    @csrf

    <input type="hidden" name="status_id" >

    <input type="submit" class="btn btn-primary sm mt-2" value="تم تنفيذ الطلب">


   {{-- <a type="submit" class="btn btn-primary sm" title="Completed">  <i class="fa-solid fa-circle-check"></i> </a> --}}

</form>

<form method="POST" action="{{route('cancelReq', $item->id)}}" class="float-left ml-3">
    @csrf

    <input type="hidden" name="status_id" >

    <input type="submit" class="btn btn-danger sm cancel mt-2" value="إلغاء الطلب">

   {{-- <a href="" class="btn btn-danger sm" title="Cancel & Refund" id="delete">  <i class="fa-sharp fa-solid fa-ban"></i> </a> --}}

</form>



@elseif($item->status_id == 1)

<a href="{{ route('editReqService',$item->id) }}" class="btn btn-primary sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>

     <a href="{{route('deleteReqService',$item->id)}}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>

@else
@endif
                            </td>
@endif
                        </tr>
                        @endforeach

                        </tbody>


{{-- ----------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------                         --}}

                        <tbody>
                        	@php($i = 1)
                        	@foreach($orders as $item)
                        <tr>

                            <td> {{ $i++}} </td>
                            @if(Auth::user()->role_id == 1)
                        <td> {{ $item->reqUser->name }} </td>
                        @endif
                            <td> {{ $item->ser->services }} </td>
                            <td> {{ $item->title }} </td>
                            <td> {{ Str::limit($item->description , 30)}} </td>
                            <td>  {{ $item->cost}} ريال </td>
                            <td> {{ $item->deadline }} </td>


                            <td> <?php
                                $prov = DB::table('users')->where('id', $item->provider_id)->first();
                                echo $prov->name;

                                ?> </td>
                        <td> {{ Carbon\Carbon::parse($item->created_at)->diffForHumans()  }} </td>



                        @if($item->status_id == 1)
                        <td> في انتظار تأكيد مقدم الخدمة </td>
                        @elseif($item->status_id == 2)

                            @if(! $item->update_status)
                            <td> جاري تنفيذ الطلب </td>
                            @else
                                @if(Auth::user()->role_id == 1)
                                <td>  تم تنفيذ الطلب وفي انتظار تأكيد المستخدم  </td>

                                @else
                                <td>  تم تنفيذ الطلب برجاء المراجعه وتأكيد العملية	  </td>

                                @endif

                            @endif

                        @elseif($item->status_id == 3)
                        <td> تم تنفيذ الطلب </td>
                        @elseif($item->status_id == 4)
                        <td> تم إلغاء الطلب </td>
                        @endif




                            @if(Auth::user()->role_id == 1)
                            <td>

                            <a href="{{route('adminDeleteOrder', $item->id)}}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>

                            </td>
                            @else

                            <td>
                            @if($item->status_id == 2)

                            <a href="{{route('chatbox', $item->provider_id)}}" class="btn btn-primary sm" title="Send Message">  <i class="fa-brands fa-facebook-messenger"></i></a>


                            <form method="POST" action="{{route('CompeleteOrder', $item->id)}}" class="float-left">
                            @csrf


                            <input type="submit" class="btn btn-primary sm mt-2" value="تم إنهاء العمل">


                            {{-- <a type="submit" class="btn btn-primary sm" title="Completed">  <i class="fa-solid fa-circle-check"></i> </a> --}}

                            </form>

                            <form method="POST" action="{{route('CancelOrder', $item->id)}}" class="float-left ml-3">
                            @csrf


                            <input type="submit" class="btn btn-danger sm cancel mt-2" value="إلغاء العمل">

                            {{-- <a href="" class="btn btn-danger sm" title="Cancel & Refund" id="delete">  <i class="fa-sharp fa-solid fa-ban"></i> </a> --}}

                            </form>



                            @elseif($item->status_id == 1)

                            <a href="{{route('chatbox', $item->provider_id)}}" class="btn btn-primary sm" title="Send Message">  <i class="fa-brands fa-facebook-messenger"></i> </a>

                            <a href="{{route('deleteOrder', $item->id)}}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>

                            @elseif($item->status_id == 3)

                            <a href="{{route('chatbox', $item->provider_id)}}" class="btn btn-primary sm" title="Send Message">  <i class="fa-brands fa-facebook-messenger"></i> </a>

                            @elseif($item->status_id == 4)
                            <a href="{{route('chatbox', $item->provider_id)}}" class="btn btn-primary sm" title="Send Message">  <i class="fa-brands fa-facebook-messenger"></i> </a>


                            @endif
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
