<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="{{asset('admin/assets/images/favicon.png')}}" >
        <!--Page title-->
        @if(Auth::user()->role_id == 1)
        <title>Admin Dashboard</title>
        @elseif(Auth::user()->role_id == 2)
        <title>Requester Dashboard</title>
        @else
        <title>Provider Dashboard</title>
        @endif
        <!--bootstrap-->
        <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">

        <!-- RTL -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">

        <!--font awesome-->
        <link rel="stylesheet" href="{{asset('admin/assets/css/all.min.css')}}">

        <link rel="stylesheet" href="https://kit.fontawesome.com/6dd87f8259.css" crossorigin="anonymous">
        <!-- metis menu -->
        <link rel="stylesheet" href="{{asset('admin/assets/plugins/metismenu-3.0.4/assets/css/metisMenu.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin/assets/plugins/metismenu-3.0.4/assets/css/mm-vertical-hover.css')}}">
        <!-- chart -->

        <!-- <link rel="stylesheet" href="assets/plugins/chartjs-bar-chart/chart.css"> -->
        <!--Custom CSS-->
        <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">


    <!-- Moyasar Styles -->
    <link rel="stylesheet" href="https://cdn.moyasar.com/mpf/1.7.3/moyasar.css">

    <!-- Moyasar Scripts -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=fetch"></script>
    <script src="https://cdn.moyasar.com/mpf/1.7.3/moyasar.js"></script>


        <!-- Toaster -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
    </head>
    <body id="page-top" style="direction: rtl;text-align: right;">
        <!-- preloader -->
        <div class="preloader">
            <img src="panel/assets/images/preloader.gif" alt="">
        </div>
 <!-- header area -->
           @include('Admin.header')
            <!-- / header area -->
        <!-- wrapper -->
        <div class="wrapper">





            <!-- sidebar area -->
            @include('Admin.sidebar')
            <!-- /sidebar Area-->

             @yield('admin')

        </div><!--/ wrapper -->




        <!-- jquery -->
        <script src="{{asset('admin/assets/js/jquery.min.js')}}"></script>
        <!-- popper Min Js -->
        <script src="{{asset('admin/assets/js/popper.min.js')}}"></script>
        <!-- Bootstrap Min Js -->
        <script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>
        <!-- Fontawesome-->
        <script src="{{asset('admin/assets/js/all.min.js')}}"></script>
        <script src="https://kit.fontawesome.com/6dd87f8259.js" crossorigin="anonymous"></script>
        <!-- metis menu -->
        <script src="{{asset('admin/assets/plugins/metismenu-3.0.4/assets/js/metismenu.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/metismenu-3.0.4/assets/js/mm-vertical-hover.js')}}"></script>
        <!-- nice scroll bar -->
        <script src="{{asset('admin/assets/plugins/scrollbar/jquery.nicescroll.min.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/scrollbar/scroll.active.js')}}"></script>
        <!-- counter -->
        <script src="{{asset('admin/assets/plugins/counter/js/counter.js')}}"></script>
        <!-- chart -->
   <script src="{{asset('admin/assets/plugins/chartjs-bar-chart/Chart.min.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/chartjs-bar-chart/chart.js')}}"></script>
        <!-- pie chart -->
        <script src="{{asset('admin/assets/plugins/pie_chart/chart.loader.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/pie_chart/pie.active.js')}}"></script>


        <!-- Main js -->
        <script src="{{asset('admin/assets/js/main.js')}}"></script>


        <!-- Toaster -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
         @if(Session::has('message'))
         var type = "{{ Session::get('alert-type','info') }}"
         switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;
            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;
            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;
            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
         }
         @endif
        </script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

          @if(Session::has('withdraw'))
          <script>
              swal("تم ارسال الطلب", "سيتم مراجعة الطلب وتأكيد العملية", "success");
          </script>
          @elseif(Session::has('error'))
          <script>
            swal("لا يوجد رصيد يمكن سحبة", "برجاء التأكد من وجود رصيد كافي لطلب السحب", "error");
        </script>
           @elseif(Session::has('recharge'))
           <script>
             swal("لا يوجد رصيد كافي ", "برجاء التأكد من وجود رصيد كافي وإعادة المحاولة ", "error");
         </script>
          @endif

          <style>
            .swal-icon--success__line{
                background-color: #0d6efd;
            }
            .swal-icon--success__ring{
                border: 4px solid rgba(13,110,253,.25);
            }
            .swal-button:not([disabled]):hover{
                background-color: #0a58ca;
            }
            .swal-button{
                background-color: #0d6efd;
            }
          </style>





    </body>
</html>
