@extends('Admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">



    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title"> كل طلبات التعميد </h4><br>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap table-responsive-md" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>نوع الخدمة</th>
                            <th> عنوان الخدمة </th>
                            <th> وصف الخدمة </th>
                            <th> عدد ايام العمل </th>
                            <th> التكلفة </th>
                            <th> المستفيد</th>
                            <th> تاريخ الطلب </th>
                            <th>  حالة الطلب </th>

                            <th>أجراءات</th>


                        </thead>


                        <tbody>
                        	@php($i = 1)
                        	@foreach($requests as $item)
                        <tr>

                            <td> {{ $i++}} </td>
                            <td> {{ $item->ser->services }} </td>
                            <td> {{ $item->title }} </td>
                            <td> {{ Str::limit($item->description , 30)}} </td>
                            <td> {{ $item->deadline }} </td>
                            <td>  {{ $item->cost}} ريال </td>

                            <td> <?php
                            $req = DB::table('users')->where('id', $item->user_id)->first();
                            echo $req->name;

                            ?> </td>
                            <td> {{ $item->created_at }} </td>

                            @if($item->status_id == 1)
                            <td> في انتظار تأكيد الطلب  </td>

                            @elseif($item->status_id == 2)

                                @if(! $item->update_status)
                                <td> جاري تنفيذ الطلب </td>
                                @else
                                <td> سيتم المراجعة لتأكيد الطلب	   </td>
                                @endif

                            @elseif($item->status_id == 3)
                            <td> تم تأكيد انتهاء تنفيذ الطلب </td>

                            @elseif($item->status_id == 4)
                            <td> تم إلغاء الطلب </td>


                            @endif



<td>

<a href="{{route('chatbox', $item->user_id)}}" class="btn btn-primary sm" title="Send Message">   <i class="fa-brands fa-facebook-messenger"></i></a>

@if($item->status_id == 1)

<form method="POST" action="{{route('acceptOrder', $item->id)}}" class="float-left">
    @csrf

    <input type="hidden" name="status_id" >
    <input type="hidden" name="id" value="{{$item->id}}" >


    <input type="submit" class="btn btn-primary sm mt-2" value="ابدأ الان">

</form>

<form method="POST" action="{{route('rejOrder', $item->id)}}" class="float-left ml-3">
    @csrf

    <input type="hidden" name="status_id" >
    <input type="hidden" name="id" value="{{$item->id}}" >

    <input type="submit" class="btn btn-danger sm cancel mt-2" value=" رفض الطلب ">


</form>

@elseif($item->status_id == 2)
@if(! $item->update_status)

<form method="POST" action="{{route('provCompelete', $item->id)}}" class="float-left">
    @csrf



    <input type="hidden" name="id" value="{{$item->id}}">


    <input type="submit" class="btn btn-primary sm mt-2" value=" تم انهاء العمل ">


</form>
@endif
@endif


                            </td>
              </tr>
                        @endforeach

                        </tbody>

                        <div class="pagination-wrap">
                            {{ $requests->links('vendor.pagination.custom') }}
                            </div>
                    </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->



                    </div> <!-- container-fluid -->
                </div>


@endsection
