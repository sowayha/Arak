
<header class="header_area" >

     <ul class="header_menu">

        <li><a class="responsive_menu_toggle" href="#"><i class="fas fa-bars"></i></a></li>

                    <li><a data-toggle="dropdown" href="#"><i class="far fa-user"></i> {{ Auth::user()->name }} </a>
                            <div class="user_item dropdown-menu dropdown-menu-right">

                            <ul>
                                @if(Auth::user()->role_id == 1)

                                <li class="pt-2"><a href="{{Route('admin.profile')}}"><span><i class="fas fa-user"></i></span> حسابي</a></li>

                                @elseif(Auth::user()->role_id == 2)
                                <li class="pt-2"><a href="{{Route('requester.profile')}}"><span><i class="fas fa-user"></i></span> حسابي</a></li>
                                <li class="pt-2"><a href="{{route('requester.addBankAcc')}}"><span><i class="fas fa-user"></i></span>  الحساب البنكي </a></li>


                                @else
                                <li class="pt-2"><a href="{{Route('provider.profile')}}"><span><i class="fas fa-user"></i></span> حسابي</a></li>
                                <li class="pt-2"><a href="{{route('provider.addBankAcc')}}"><span><i class="fas fa-user"></i></span>  الحساب البنكي </a></li>


                                @endif


                                @if(Auth::user()->role_id == 1)

                                <li><a href="{{Route('admin.changePassword')}}"><span><i class="fas fa-cogs"></i></span>  تغيير كلمة المرور</a></li>
                                <li>

                                @elseif(Auth::user()->role_id == 2)
                                <li><a href="{{Route('requester.changePassword')}}"><span><i class="fas fa-cogs"></i></span>  تغيير كلمة المرور</a></li>
                                <li>

                                @else
                                <li><a href="{{Route('provider.changePassword')}}"><span><i class="fas fa-cogs"></i></span>  تغيير كلمة المرور</a></li>
                                <li>

                                @endif


                                @if(Auth::user()->role_id == 1)

                                <a href="{{route('admin.logout')}}"><span><i class="fas fa-unlock-alt"></i></span> تسجيل الخروج</a></li>

                                @elseif(Auth::user()->role_id == 2)
                                <a href="{{route('requester.logout')}}"><span><i class="fas fa-unlock-alt"></i></span> تسجيل الخروج</a></li>

                                @else
                                <a href="{{route('provider.logout')}}"><span><i class="fas fa-unlock-alt"></i></span> تسجيل الخروج</a></li>

                                @endif






                            </ul>



                        </div>
                    </li>


                    {{-- ------------------------- chatbox ---------------------------------------- --}}
{{--
                    @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
                        <li><a  href="{{route('messages')}}"><i class="far fa-envelope"></i><span>4</span></a></li>
                        @endif --}}



                </ul>








            <!-- logo -->
            <div class="sidebar_logo container">
            {{-- <a href="{{route('home')}}"> -->
                <img src="{{asset('admin/assets/images/favicon.png')}}" alt="" class="img-fluid logo1">
                <img src="{{asset('admin/assets/images/favicon.png')}}" alt="" class="img-fluid logo2">
                </a> --}}
                <div class="row align-items-center">
                <div class="col mobile-logo">
                <h1 class="logo me-auto ml-3"><a href="{{route('home')}}">Arak</a></h1></div></div>


                </div>

                </header>
