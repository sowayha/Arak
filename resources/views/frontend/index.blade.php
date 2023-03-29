@extends('frontend.master')
@section('frontend')

@php
$hero = App\Models\HomeHeroBanner::find(1);
$about = App\Models\AboutUs::find(1);
$hdiw = App\Models\HowDoesItWork::find(1);
$req = App\Models\ForRequesterSection::find(1);
$prov = App\Models\ForProviderSection::find(1);
$cta = App\Models\CTA::find(1);
$social = App\Models\Social::find(1);
$service = App\Models\Services::latest()->limit(4)->get();
$faqs = App\Models\Faqs::latest()->limit(6)->get();


if(! $hero && ! $about && ! $hdiw && ! $req && ! $prov && ! $cta && ! $social){
$homeSeed = new \Database\Seeders\HomeData();
$homeSeed->run();
$roleSeed = new \Database\Seeders\RoleTable();
$roleSeed->run();
$roleSeed = new \Database\Seeders\UserTable();
$roleSeed->run();

}

@endphp

<!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-8 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h4 style="color: #2BB574;">{{ $hero->sub_title }}</h4>
          <h1>{{ $hero->title }}</h1>
          <h2>{{ $hero->description }}</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#about" class="btn-get-started scrollto">{{ $hero->button }}</a>

          </div>
        </div>
        <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{ $hero->image }}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">





 <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>  من نحن </h2>
        </div>

        <div class="row content align-items-center">
          <div class="col-lg-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">

              <div class="icon-box mb-5">

              <h4>اﻟﺮﺅﻳﺔ </h4>
              <p>{{ $about->vision }}</p>

            </div>
            <div class="icon-box mt-5 ">

              <h4>اﻟﺮﺳﺎﻟﺔ </h4>
              <p>{{ $about->mission }}</p>

            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 ">
            <p><strong>
              {{ $about->description }}</strong>
            </p>
            <ul>
              @if(! $about->l1)
              @else
              <li><i class="ri-check-double-line"></i> {{ $about->l1 }}</li>
              @endif
              @if(! $about->l2)
              @else
              <li><i class="ri-check-double-line"></i> {{ $about->l2 }}</li>
              @endif
              @if(! $about->l3)
              @else
              <li><i class="ri-check-double-line"></i> {{ $about->l3 }}</li>
              @endif
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->


      <!-- ======= How Does It Work Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>كيفية الاستخدام</h2>

        </div>



        <nav>
        <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
          <button class="nav-link active filter-active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">{{$hdiw->tab1}}</button>
          <button class="nav-link filter-active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">{{$hdiw->tab2}}</button>
          @if(! $hdiw->tab3)
          @else
          <button class="nav-link filter-active" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">{{$hdiw->tab3}}</button>
          @endif
        </div>
      </nav><br>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active text-center" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

          @if(! $hdiw->tab13 && ! $hdiw->tab14)
          <div class="row align-items-center">
              <div class="col-lg-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">

            <div class="icon-box">
              <div class="icon"></div>
              <h4>الخطوة الأولى</h4>
              <p>{{$hdiw->tab11}}</p>
            </div>
          </div>
            <div class="col-lg-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">

            <div class="icon-box">
              <div class="icon"></div>
              <h4>الخطوة الثانية</h4>
              <p>{{$hdiw->tab12}}</p>
            </div>
          </div>
          </div>
          @else
            <div class="row align-items-center">
              <div class="col-lg-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">

            <div class="icon-box">
              <div class="icon"></div>
              <h4>الخطوة الأولى</h4>
              <p>{{$hdiw->tab11}}</p>
            </div>
          </div>
            <div class="col-lg-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">

            <div class="icon-box">
              <div class="icon"></div>
              <h4>الخطوة الثالثة</h4>
              <p>{{$hdiw->tab13}}</p>
            </div>
          </div>
          </div>

            <div class="row align-items-center">
              <div class="col-lg-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">

            <div class="icon-box">
              <div class="icon"></div>
              <h4>الخطوة الثانية</h4>
              <p>{{$hdiw->tab12}}</p>
            </div>
          </div>
          @if(! $hdiw->tab14)
          @else
            <div class="col-lg-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">

            <div class="icon-box">
              <div class="icon"></div>
              <h4>الخطوة الرابعة</h4>
              <p>{{$hdiw->tab14}}</p>
            </div>
          </div>
          @endif
          </div>
          @endif
        </div>

        <div class="tab-pane fade text-center" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">


          <div class="row align-items-center">

            <div class="icon-box">
              <div class="icon"></div>

              <p><i class="ri-check-double-line"></i>{{$hdiw->tab21}}</p>
              @if(! $hdiw->tab22)
              @else
              <p><i class="ri-check-double-line"></i>{{$hdiw->tab22}}</p>
              @endif
              @if(! $hdiw->tab23)
              @else
              <p><i class="ri-check-double-line"></i>{{$hdiw->tab23}}</p>
              @endif
              @if(! $hdiw->tab24)
              @else
              <p><i class="ri-check-double-line"></i>{{$hdiw->tab24}}</p>
              @endif
            </div>

          </div>


        </div>

        @if(! $hdiw->tab3)
        @else
        <div class="tab-pane fade text-center" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

          <div class="row align-items-center">

            <div class="icon-box">
              <div class="icon"></div>


              <p><i class="ri-check-double-line"></i>{{$hdiw->tab31}}</p>
              @if(! $hdiw->tab32)
              @else
              <p><i class="ri-check-double-line"></i>{{$hdiw->tab32}}</p>
              @endif
              @if(! $hdiw->tab33)
              @else
              <p><i class="ri-check-double-line"></i>{{$hdiw->tab33}}</p>
              @endif
              @if(! $hdiw->tab34)
              @else
              <p><i class="ri-check-double-line"></i>{{$hdiw->tab34}}</p>
              @endif

            </div>

          </div>

        </div>
        @endif
      </div>

      </div>




    </section><!-- End How Does It Work Section -->


     <!-- ======= For requesters Section ======= -->
    <section id="req" class="req">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2> المستخدم </h2>
          <p>{{$req->description}}</p>
        </div>

        <div class="row">
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"></div>
              <h4>{{$req->title1}}</h4>
              <p>{{$req->description1}}</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"></div>
              <h4>{{$req->title2}}</h4>
              <p>{{$req->description2}}</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"></div>
              <h4>{{$req->title3}}</h4>
              <p>{{$req->description3}}</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <div class="icon"></div>
              <h4>{{$req->title4}}</h4>
              <p>{{$req->description4}}</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End For requesters Section -->



    <!-- ======= Providers Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

            <div class="content">
              <h3> <strong>لماذا أصبح مقدم خدمة ؟</strong></h3>
              <p>
                {{$prov->description}}
              </p>
            </div>

            <div class="accordion-list">
              <ul>
                <li>
                  <a data-bs-toggle="collapse" class="collapsed" data-bs-target="#accordion-list-1"><span>01</span> {{$prov->title1}} <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                    <p>
                      {{$prov->description1}}
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> {{$prov->title2}} <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      {{$prov->description2}}
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> {{$prov->title3}}<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      {{$prov->description3}}
                    </p>
                  </div>
                </li>

              </ul>
            </div>

          </div>

          <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("{{$prov->image}}");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
        </div>

      </div>
    </section><!-- End Providers Section -->






        <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>خدماتنا</h2>

        </div>

        <div class="row">
          @foreach($service as $item)

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-layer"></i></div>
              <h4>{{$item->title}}</h4>
              <p>{{$item->description}}</p>
            </div>
          </div>

          @endforeach

        </div>

      </div>
    </section><!-- End Services Section -->





    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="row">
          <div class="col-lg-6 text-center text-lg-start">
            <h3>{{$cta->title}}</h3>
            <p> {{$cta->description}}</p>
          </div>
          <div class="col-lg-6 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="{{ route('reqRegister') }}">سجل كمستخدم</a>
            <a class="cta-btn align-middle" href="{{ route('provRegister') }}">سجل لتصبح مقدم خدمة</a>
          </div>
        </div>

      </div>
    </section><!-- End Cta Section -->


     <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>الأسئلة المتداولة</h2>

        </div>

        <div class="faq-list">
          <ul>
            @php
            $i=1;
            @endphp
            @foreach($faqs as $item)

            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-{{$i}}">{{$item->question}}<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-{{$i}}" class="collapse" data-bs-parent=".faq-list">
                <p>
                  {{$item->answer}}
                </p>
              </div>
            </li>
            @php
            $i++;
            @endphp
            @endforeach

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->


  </main><!-- End #main -->
@endsection
