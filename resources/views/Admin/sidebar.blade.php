<aside class="sidebar-wrapper ">
              <nav class="sidebar-nav">
                 <ul class="metismenu" id="menu1">
                    <li class="single-nav-wrapper">
                        <a href="{{route('admin.dashboard')}}" class="menu-item">
                            <span class="left-icon"><i class="fas fa-home"></i></span>
                            <span class="menu-text">الرئيسية</span>
                        </a>
                      </li>


                          @if(Auth::user()->role_id == 1)

                          <li class="single-nav-wrapper ">

                          <a class="has-arrow menu-item " href="#" aria-expanded="false">
                            <span class="left-icon"><i class="fa-solid fa-pen-to-square"></i></span>
                              <span class="menu-text">تعديل الصفحة الرئيسية
                            </span>
                          </a>
                          <ul class="dashboard-menu">


                        <li class="single-nav-wrapper">
                        <a href="{{route('openheroBanner')}}" class="menu-item">
                            <span class="left-icon"><i class="fa-solid fa-image"></i></span>
                            <span class="menu-text">العنوان</span>
                        </a>
                      </li>

                      <li class="single-nav-wrapper">
                        <a href="{{route('openAboutUs')}}" class="menu-item">
                            <span class="left-icon"><i class="fa-solid fa-address-card"></i></span>
                            <span class="menu-text">من نحن</span>
                        </a>
                      </li>

                       <li class="single-nav-wrapper">
                        <a href="{{route('openHDIW')}}" class="menu-item">
                            <span class="left-icon"><i class="fa-solid fa-briefcase"></i></span>
                            <span class="menu-text">كيفية الاستخدام
</span>
                        </a>
                      </li>

                      <li class="single-nav-wrapper">
                        <a href="{{route('forRequesters')}}" class="menu-item">
                            <span class="left-icon"><i class="fa-solid fa-registered"></i></span>
                            <span class="menu-text">المستخدم</span>
                        </a>
                      </li>

                      <li class="single-nav-wrapper">
                        <a href="{{route('forProviders')}}" class="menu-item">
                            <span class="left-icon"><i class="fa-brands fa-product-hunt"></i></span>
                            <span class="menu-text">مقدم الخدمة</span>
                        </a>
                      </li>

                        <li class="single-nav-wrapper">
                          <a class="has-arrow menu-item" href="#" aria-expanded="false">
                            <span class="left-icon"><i class="fa-solid fa-server"></i></span>
                              <span class="menu-text">الخدمات</span>
                          </a>
                          <ul class="dashboard-menu">
                              <li><a href="{{ route('a.allServices') }}">كل الخدمات</a></li>

                              <li><a href="{{ route('NewService') }}">اضف خدمة</a></li>


                            </ul>
                        </li>


                      </li>

                       <li class="single-nav-wrapper">
                        <a href="{{route('cta')}}" class="menu-item">
                            <span class="left-icon"><i class="fa-solid fa-circle-plus"></i></span>
                            <span class="menu-text">طلب التسجيل</span>
                        </a>
                      </li>

                      <li class="single-nav-wrapper">
                          <a class="has-arrow menu-item" href="#" aria-expanded="false">
                            <span class="left-icon"><i class="fa-solid fa-circle-question"></i></span>
                              <span class="menu-text">الأسئلة المتداولة
                            </span>
                          </a>
                          <ul class="dashboard-menu">
                              <li><a href="{{ route('allFaqs') }}">كل الاسئلة</a></li>

                              <li><a href="{{ route('NewFaqs') }}">اضف سؤال</a></li>
                            </ul>
                        </li>

                      <li class="single-nav-wrapper">
                        <a href="{{route('social')}}" class="menu-item">
                            <span class="left-icon"><i class="fa-brands fa-facebook"></i></span>
                            <span class="menu-text">مواقع التواصل </span>
                        </a>
                      </li>

                      <li class="single-nav-wrapper">
                        <a href="{{route('addTerms')}}" class="menu-item">
                            <span class="left-icon"><i class="fa-sharp fa-solid fa-shield"></i></span>
                            <span class="menu-text">  الشروط والاحكام </span>
                        </a>
                      </li>







                            </ul>
                        </li>


                        <li class="single-nav-wrapper">
                            <a href="{{route('allReqServices')}}" class="menu-item">
                                <span class="left-icon"><i class="fa-solid fa-hand-holding-medical"></i></span>
                                <span class="menu-text">   خدمات الطلبات </span>
                            </a>
                          </li>

                        <li class="single-nav-wrapper">
                        <a href="{{route('admin.allReq')}}" class="menu-item">
                            <span class="left-icon"><i class="fa-solid fa-server"></i></span>
                            <span class="menu-text"> الطلبات </span>
                        </a>
                      </li>




                      <li class="single-nav-wrapper">
                        <a href="{{route('compeletedReq')}}" class="menu-item">
                            <span class="left-icon"><i class="fa-sharp fa-solid fa-circle-check"></i></span>
                            <span class="menu-text">  الطلبات المكتملة </span>
                        </a>
                      </li>

                      <li class="single-nav-wrapper">
                        <a href="{{route('cancelledReq')}}" class="menu-item">
                            <span class="left-icon"><i class="fa-sharp fa-solid fa-circle-xmark"></i></span>
                            <span class="menu-text">  الطلبات الملغية </span>
                        </a>
                      </li>

                      <li class="single-nav-wrapper">
                        <a href="{{route('rate')}}" class="menu-item">
                            <span class="left-icon"><i class="fa-solid fa-dollar-sign"></i></span>
                            <span class="menu-text">   اضف نسبة الربح </span>
                        </a>
                      </li>

                      <li class="single-nav-wrapper">
                        <a href="{{route('withdrawTable')}}" class="menu-item">
                            <span class="left-icon"><i class="fa-solid fa-hand-holding-dollar"></i></span>
                            <span class="menu-text">  طلبات السحب </span>
                        </a>
                      </li>



                           <li class="single-nav-wrapper">
                          <a class="has-arrow menu-item" href="#" aria-expanded="false">
                            <span class="left-icon"><i class="fa-solid fa-user"></i></span>
                              <span class="menu-text">الاعضاء</span>
                          </a>
                          <ul class="dashboard-menu">
                              <li><a href="{{ route('allUsers') }}">مدير</a></li>
                              <li><a href="{{ route('rallUsers') }}">مستخدم</a></li>
                              <li><a href="{{ route('pallUsers') }}">مقدم خدمة</a></li>
                              <li><a href="{{ route('addUser') }}">اضف عضو</a></li>
                            </ul>
                        </li>


                        <li class="single-nav-wrapper">
@php
    $check = DB::table('email_checks')->find(1);
@endphp
@if($check->check == 0)
                            <form method="GET" action="{{route('updateCheck')}}">
                            <button type="submit" class="btn btn-primary w-100">
                            تفعيل التحقق من البريد الالكتروني
                            </button>
                            </form>
@else

                        <form method="GET" action="{{route('check')}}">
                            <button type="submit" class="btn btn-primary w-100" style="background-color: #198754; border-color:#198754;">
                            تعطيل التحقق من البريد الالكتروني
                            </button>
                            </form>
@endif
                          </li>






                          @endif





                @if(Auth::user()->role_id == 2)


                      <li class="single-nav-wrapper">
                          <a class="has-arrow menu-item" href="#" aria-expanded="false">
                            <span class="left-icon"><i class="fa-solid fa-plus"></i></span>
                              <span class="menu-text"> الطلبات </span>
                          </a>
                          <ul class="dashboard-menu">
                              <li><a href="{{ route('r.allServices') }}"> كل طلباتي  </a></li>
                              <li><a href="{{ route('addReqPage') }}"> اضافة طلب جديد </a></li>
                            </ul>
                        </li>





                          <li class="single-nav-wrapper">
                            <a href="{{ route('allProvider')}}" class="menu-item">
                                <span class="left-icon"><i class="fa-sharp fa-regular fa-handshake"></i></span>
                                <span class="menu-text">   مقدمي الخدمة  </span>
                            </a>
                          </li>



                        <li class="single-nav-wrapper">
                            <a href="{{ route('reqWithdrawHistory')}}" class="menu-item">
                                <span class="left-icon"><i class="fa-solid fa-money-bill-transfer"></i></span>
                                <span class="menu-text">  طلبات السحب  </span>
                            </a>
                          </li>








                @elseif(Auth::user()->role_id == 3)

                <li class="single-nav-wrapper">
                    <a href="{{ route('provDescPage')}}" class="menu-item">
                        <span class="left-icon"><i class="fa-regular fa-pen-to-square"></i></span>
                        <span class="menu-text"> نبذة عن مقدم الخدمة                        </span>
                    </a>
                  </li>

                <li class="single-nav-wrapper">
                    <a href="{{ route('front.reqPage')}}" class="menu-item">
                        <span class="left-icon"><i class="fa-solid fa-server"></i></span>
                        <span class="menu-text"> جميع الطلبات المفتوحة </span>
                    </a>
                  </li>

                  <li class="single-nav-wrapper">
                    <a href="{{ route('provierQuotations')}}" class="menu-item">
                        <span class="left-icon"><i class="fa-solid fa-user"></i></span>
                        <span class="menu-text">  جميع العروض المقدمة  </span>
                    </a>
                  </li>

                  <li class="single-nav-wrapper">
                    <a href="{{ route('providerOrders')}}" class="menu-item">
                        <span class="left-icon"><i class="fa-sharp fa-regular fa-handshake"></i></span>
                        <span class="menu-text">  طلبات التعميد </span>
                    </a>
                  </li>



                  <li class="single-nav-wrapper">
                    <a href="{{ route('provierWithdrawHistory')}}" class="menu-item">
                        <span class="left-icon"><i class="fa-solid fa-money-bill-transfer"></i></span>
                        <span class="menu-text">  طلبات السحب  </span>
                    </a>
                  </li>

                @endif





                    </ul>
              </nav>
            </aside>


