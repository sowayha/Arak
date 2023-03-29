<footer id="footer">

    <!-- <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
 -->

 @php
 $social = App\Models\Social::find(1);
@endphp
    <div class="footer-top">
      <div class="container">
        <div class="row justify-content-center">

          <!-- <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Arak</h3>

          </div>
 -->
        <!--   <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div> -->



          <div class="col-lg-3 col-md-6 footer-links text-center">
            <h4 class="">تابعنا</h4>




            <div class="social-links mt-3">
              <a href="{{$social->tw}}" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="{{$social->facebook}}" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="{{$social->insta}}" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="{{$social->youtube}}" class="youtube"><i class="bx bxl-youtube"></i></a>
              <a href="{{$social->linkedin}}" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        جميع الحقوق محفوظة © 2023<strong><span> Arak</span></strong>.
      </div>
      <!-- <div class="credits">

        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div> -->
    </div>
  </footer>
