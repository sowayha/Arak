@extends('Admin.admin_master')
@section('admin')




@if(count($errors))
@foreach ($errors->all() as $error)
<p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
@endforeach
@endif

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

                    <h4 class="card-title"> كل الخدمات الممكن طلبها </h4>

                    <form class="form-inline float-left" method="post" action="{{route('admin.addReqService')}}">
                        @csrf
                        <div class="form-group mb-2">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                          <input type="text" class="form-control" id="services" name="services" placeholder="اسم الخدمة">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2"> اضف خدمة جديدة </button>
                      </form>

                    {{-- <a class="btn btn-primary float-left mb-5" href="#" role="button"> اضف خدمة جديدة </a> --}}

                    <br>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th> الخدمة</th>
                            <th>  عدد طلبات الخدمة </th>
                            <th>أجراءات</th>


                        </thead>


                        <tbody>
                        	@php($i = 1)
                        	@foreach($services as $item)
                        <tr>

                            <td> {{ $i++}} </td>
                            <td> {{ $item->services }} </td>

                            <td> {{  $count->where("service_id", $item->id)->count() }} </td>

                            <td>


                            <a href="{{ route('admin.editReqService',$item->id) }}" class="btn btn-primary sm" title="Edit Data" >  <i class="fas fa-edit"></i> </a>



                        @if($count->where("service_id", $item->id)->count() == 0)

                            <a href="{{route('admin.deleteReqService',$item->id)}}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>
                        @endif
                            </td>

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
