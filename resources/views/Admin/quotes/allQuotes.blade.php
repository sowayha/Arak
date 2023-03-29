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

                    <h4 class="card-title"> كل العروض  </h4><br>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap table-responsive-sm" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>ID</th>


                            <th> اسم المستخدم</th>
                            <th> عنوان الطلب </th>
                            <th> وصف الطلب </th>
                            <th> مده العمل </th>
                            <th> التكلفة</th>
                            <th> العرض المقدم </th>
                            <th>  الحالة </th>

                            <th>أجراءات</th>


                        </thead>


                        <tbody>
                        	@php($i = 1)
                        	@foreach($quotes as $item)
                        <tr>

 <?php
$quote = DB::table('requests')->where('id', $item->req_id)->first();
$deadline = Carbon\Carbon::parse($quote->updated_at)->addDays($item->req_deadline);
?>

                            <td> {{ $i++}} </td>
                            <td> {{ $item->quoteReq->reqUser->name}} </td>
                            <td> {{ $item->quoteReq->title}} </td>
                            <td> {{ Str::limit($item->quoteReq->description , 50)}} </td>
                            <td> {{ $item->req_deadline }} </td>
                            <td> {{ $item->cost }} ريال </td>
                            <td> {{ Str::limit($item->message , 50)}} </td>

                            @if($item->user_id == $item->quoteReq->provider_id && $item->quoteReq->status_id == 2)
                            @if($today > $deadline)
                            <td>  تم إلغاء الطلب لعدم التسليم في الوقت المحدد </td>

                            @else
                            @if(! $item->updated_at)
                            <td> تم اختيارك لتنفيذ العمل </td>

                            @else
                            <td> سيتم المراجعة لتأكيد الطلب </td>

                            @endif
                            @endif
                            @else

                            <td> {{ $item->quoteReq->status->status}} </td>
                            @endif








                            <td>
     <a href="{{ route('requestDetails',$item->req_id) }}" class="btn btn-primary sm" title="view Data">  <i class="fa-solid fa-eye"></i></a>



@if($item->user_id == $item->quoteReq->provider_id && $item->quoteReq->status_id == 2)
@if($today > $deadline)

<a class="btn btn-danger sm" title="Cancelled" id="delete">  <i class="fa-sharp fa-solid fa-ban Cancelled fq"></i> </a>

@else

<a href="{{route('chatbox', $item->quoteReq->user_id)}}" class="btn btn-primary sm" title="Send Message">  <i class="fa-sharp fa-solid fa-comments"></i> </a>

<form method="POST" action="{{route('provider_compeleteReq', $quote->id)}}" class="float-left">
    @csrf



    <input type="hidden" name="status_id" value="{{$quote->status_id}}">

    @if(! $item->updated_at)

    <input type="submit" class="btn btn-primary sm mt-2" value="تم تنفيذ الطلب">
    @endif

   {{-- <a type="submit" class="btn btn-primary sm" title="Completed">  <i class="fa-solid fa-circle-check"></i> </a> --}}

</form>
@endif
@elseif($item->quoteReq->status_id == 4)

<a class="btn btn-danger sm" title="Cancelled" id="delete">  <i class="fa-sharp fa-solid fa-ban fq"></i> </a>

@elseif($item->quoteReq->status_id == 3)
<a class="btn btn-primary sm" title="Completed">  <i class="fa-solid fa-circle-check Completed fq"></i> </a>

@else

   <a href="{{ route('provider.editQuote',$item->id) }}" class="btn btn-primary sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>

     <a href="{{route('deleteQuote',$item->id)}}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>

     @endif


                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                        <div class="pagination-wrap">
                            {{ $quotes->links('vendor.pagination.custom') }}
                            </div>
                    </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->



                    </div> <!-- container-fluid -->
                </div>



@endsection
