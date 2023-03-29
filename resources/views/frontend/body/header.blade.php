<header id="header" class="fixed-top ">
    <div class="container d-flex justify-content-between">
<div class="row align-items-center">
  <div class="col">
      <h1 class="logo me-auto" ><a href="{{route('home')}}" >Arak</a></h1>
</div>
</div>
      <nav id="navbar" class="navbar">
        <ul>

        <li><a class="nav-link scrollto active" href="{{route('home')}}">الرئيسة</a></li>

        <li><a class="nav-link scrollto " href="{{ route('front.reqPage')}}"> الطلبات </a></li>


        <!-- <li class="dropdown"><a href="#">القائمة<i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->


              @if (Route::has('login'))

                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">حسابي</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">سجل الدخول</a>

                        {{-- @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">حساب جديد</a>
                        @endif --}}
                    @endauth
            @endif




        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->



    </div>
  </header>
