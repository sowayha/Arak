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

    <div class="row mt-3 mb-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title mt-3"> مقدمي الخدمة </h4>
                    <div class="form-outline">
                        <div class="dropdown float-left">
                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Filter By Services
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <a class="dropdown-item" href="#">ser1</a>
                              <a class="dropdown-item" href="#">ser2</a>
                              <a class="dropdown-item" href="#">ser3</a>
                            </div>
                          </div>
                        </div>
                      <br>
                      <br>


                @foreach($users as $item)

                <div id="content" class="">


                <div class="card">
               <div class="card-body">

                 <h5 class="card-title"><a href=""> {{$item->name}} </a></h5>
                 <p class="card-text mt-4 mb-4"> {{Str::limit($item->description, 500)}}</p>



                {{-- <a  type="button" class="btn btn-primary sm" title="view Data" data-toggle="modal" data-target="#exampleModalCenter" style="color: white">  <i class="fa-solid fa-eye"></i></a> --}}


                {{-- <!-- Modal -->
                <div class="modal fade"  id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">

                          <h5 class="modal-title" id="exampleModalLongTitle"> {{$item->id}} </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            {{Str::limit($item->description, 500)}}
                        </div>

                      </div>
                    </div>
                  </div> --}}
                </div>

<div class="card-footer">
<div class="float-left my-2">
                <a href="{{route('chatbox', $item->id)}}" class="btn btn-primary sm" title="Send Message">  <i class="fa-brands fa-facebook-messenger"></i> </a>
                <a href="{{route('addOrder', $item->id)}}" class="btn btn-primary sm" title="Request"> وظفني </a>
</div>
</div>


             </div>
             <br>
             @endforeach

             <div class="pagination-wrap">
                 {{ $users->links('vendor.pagination.custom') }}
                 </div>

                                </div>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->



                    </div> <!-- container-fluid -->
                </div>




@endsection
