<!doctype html>
<html class="no-js" lang=""{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>{{ $title ?? "Awazone" }}</title>

   {{-- @foreach ($metaData as $name => $content)
      <meta name="{{ $name }}" content="{{ $content }}">
   @endforeach --}}

   <meta name="description" content="">

   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Place favicon.ico in the root directory -->
   <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

   <!-- CSS here -->
   <link rel="stylesheet" href="{{ asset("guest/css/bootstrap.min.css") }}">
   <link rel="stylesheet" href="{{ asset("guest/css/animate.css")}}">
   <link rel="stylesheet" href="{{ asset("guest/css/custom-animation.css")}}">
   <link rel="stylesheet" href="{{ asset("guest/css/swiper-bundle.css")}}">
   <link rel="stylesheet" href="{{ asset("guest/css/slick.css")}}">
   <link rel="stylesheet" href="{{ asset("guest/css/nice-select.css")}}">
   <link rel="stylesheet" href="{{ asset("guest/css/flaticon.css")}}">
   <link rel="stylesheet" href="{{ asset("guest/css/meanmenu.css")}}">
   <link rel="stylesheet" href="{{ asset("guest/css/font-awesome-pro.css")}}">
   <link rel="stylesheet" href="{{ asset("guest/css/magnific-popup.css")}}">
   <link rel="stylesheet" href="{{ asset("guest/css/spacing.css")}}">
   <link rel="stylesheet" href="{{ asset("guest/css/style.css")}}">
</head>

<body>

   <!-- preloader -->
   <div id="preloader">
      <div class="preloader">
         <span></span>
         <span></span>
      </div>
   </div>
   <!-- preloader end  -->
   
   <!-- back-to-top-start  -->
   <button class="scroll-top scroll-to-target" data-target="html">
      <i class="far fa-angle-double-up"></i>
   </button>
   <!-- back-to-top-end  -->


   <header>
      <!-- tp-header-area-start -->
      <div class="tp-header__top-area theme-bg tp-header__space-3 d-none d-sm-block">
         <div class="container-fluid">
            <div class="row align-items-center">
               <div class="col-xxl-8 col-xl-8 col-lg-6 col-md-6 col-6">
                  <div class="tp-header__top-left">
                     <a href="tel:915900885">
                        <svg width="14" height="19" viewBox="0 0 14 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <circle cx="2" cy="2" r="2" fill="#3EB7FD" />
                           <circle cx="7" cy="2" r="2" fill="#3EB7FD" />
                           <circle cx="12" cy="2" r="2" fill="#3EB7FD" />
                           <circle cx="12" cy="7" r="2" fill="#3EB7FD" />
                           <circle cx="12" cy="12" r="2" fill="#3EB7FD" />
                           <circle cx="7" cy="7" r="2" fill="#3EB7FD" />
                           <circle cx="7" cy="12" r="2" fill="#3EB7FD" />
                           <circle cx="7" cy="17" r="2" fill="#3EB7FD" />
                           <circle cx="2" cy="7" r="2" fill="#3EB7FD" />
                           <circle cx="2" cy="12" r="2" fill="#3EB7FD" />
                        </svg>
                        <span>Help Desk : <b class="frist-child">+91 590 088 55 </b></span>
                     </a>
                     <a class="last-child" href="#">
                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path
                              d="M16 7.3125C16 6.68359 15.6445 6.10938 15.125 5.80859V1.65234C15.125 1.40625 14.9336 0.75 14.25 0.75C14.0312 0.75 13.8398 0.832031 13.7031 0.96875L11.3516 2.82812C10.2031 3.75781 8.72656 4.25 7.25 4.25H2C1.01562 4.25 0.25 5.04297 0.25 6V8.625C0.25 9.60938 1.01562 10.375 2 10.375H2.90234C2.875 10.6758 2.84766 10.9766 2.84766 11.25C2.84766 12.3438 3.09375 13.3828 3.55859 14.2852C3.69531 14.5859 3.99609 14.75 4.32422 14.75H6.34766C7.05859 14.75 7.49609 13.957 7.05859 13.3828C6.62109 12.7812 6.34766 12.0703 6.34766 11.25C6.34766 10.9492 6.40234 10.6758 6.45703 10.375H7.25C8.72656 10.375 10.2031 10.8945 11.3516 11.8242L13.7031 13.6836C13.8125 13.793 14.0586 13.875 14.2227 13.875C14.9062 13.875 15.0977 13.2734 15.0977 13V8.84375C15.6445 8.54297 16 7.96875 16 7.3125ZM13.375 11.1953L12.4453 10.457C10.9688 9.28125 9.13672 8.625 7.25 8.625V6C9.13672 6 10.9688 5.37109 12.4453 4.19531L13.375 3.45703V11.1953Z"
                              fill="#3EB7FD" />
                        </svg>
                        <span><b>Now Hiring: </b>Are you a driven and motivated 1st Line IT Support Engineer?</span>
                     </a>
                  </div>
               </div>
               <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-6">
                  <div class="tp-header__top-right text-end">
                     <a href="#"><i class="fab fa-facebook-f"></i></a>
                     <a href="#"><i class="fab fa-twitter"></i></a>
                     <a href="#"><i class="fab fa-instagram"></i></a>
                     <a href="#"><i class="fab fa-linkedin"></i></a>
                     <a href="#"><i class="fab fa-pinterest"></i></a>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div id="header-sticky"
         class="tp-header__area tp-header__space-3 tp-header__transparent z-index-5 tp-header__bottom p-relative">
         <div class="container-fluid">
            <div class="row align-items-center">
               <div class="col-xl-2 col-lg-2 col-md-6 col-7">
                  <div class="tp-header__logo">
                     <a href="{{ route('welcome') }}">
                        <img src="{{ asset('guest/img/logo/logo-black.png') }}" alt="">
                     </a>
                  </div>
               </div>
               <div class="col-xl-7 col-lg-7 d-none d-lg-block">
                  <div class="tp-header__main-menu tp-header__black-menu tp-header__menu-3">
                     <nav id="mobile-menu">
                        <ul>
                           <li><a href="{{ route('welcome') }}">Home</a></li>
                           <li><a href="{{ route('about') }}">About Us</a></li>
                           <li><a href="#">What we do</a>
                              <ul class="submenu">
                                 <li><a href="service.html">All Services</a></li>
                                 <li><a href="{{ route('aibopay.home') }}">AiboPay</a></li>
                              </ul>
                           </li>                           
                           <li><a href="{{ route('contact') }}">Contact US</a></li>
                        </ul>
                     </nav>
                  </div>
               </div>
               <div class="col-xl-3 col-lg-3 col-md-6 col-5">
                  <div class="tp-header__right-two d-flex align-items-center justify-content-end">
                     <a class="tp-btn-blue-square d-none d-md-block" href="{{ route('register') }}"><span>Get Started</span></a>
                     <a class="tp-header__bars tp-menu-bar d-lg-none" href="#"><i class="far fa-bars"></i></a>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- tp-header-area-end -->
   </header>

   <!-- tp-offcanvus-area-start -->
   <div class="tp-offcanvas-area">
      <div class="tpoffcanvas">
         <div class="tpoffcanvas__close-btn">
            <button class="close-btn"><i class="fal fa-times"></i></button>
         </div>
         <div class="tpoffcanvas__logo">
            <a href="index.html">
               <img src="{{ asset('guest/img/logo/logo.png') }}" alt="">
            </a>
         </div>
         <div class="tpoffcanvas__text">
            <p>Suspendisse interdum consectetur libero id. Fermentum leo vel orci porta non. Euismod viverra nibh cras
               pulvinar suspen.</p>
         </div>
         <div class="mobile-menu"></div>
         <div class="tpoffcanvas__info">
            <h3 class="offcanva-title">Get In Touch</h3>
            <div class="tp-info-wrapper mb-20 d-flex align-items-center">
               <div class="tpoffcanvas__info-icon">
                  <a href="#"><i class="fal fa-envelope"></i></a>
               </div>
               <div class="tpoffcanvas__info-address">
                  <span>Email</span>
                  <a href="maito:hello@yourmail.com">hello@yourmail.com</a>
               </div>
            </div>
            <div class="tp-info-wrapper mb-20 d-flex align-items-center">
               <div class="tpoffcanvas__info-icon">
                  <a href="#"><i class="fal fa-phone-alt"></i></a>
               </div>
               <div class="tpoffcanvas__info-address">
                  <span>Phone</span>
                  <a href="tel:(00)45611227890">(00) 456 1122 7890</a>
               </div>
            </div>
            <div class="tp-info-wrapper mb-20 d-flex align-items-center">
               <div class="tpoffcanvas__info-icon">
                  <a href="#"><i class="fas fa-map-marker-alt"></i></a>
               </div>
               <div class="tpoffcanvas__info-address">
                  <span>Location</span>
                  <a href="https://www.google.com/maps/@37.4801311,22.8928877,3z" target="_blank">Riverside 255, San
                     Francisco, USA </a>
               </div>
            </div>
         </div>
         <div class="tpoffcanvas__social">
            <div class="social-icon">
               <a href="#"><i class="fab fa-twitter"></i></a>
               <a href="#"><i class="fab fa-instagram"></i></a>
               <a href="#"><i class="fab fa-facebook-square"></i></a>
               <a href="#"><i class="fab fa-dribbble"></i></a>
            </div>
         </div>
      </div>
   </div>
   <div class="body-overlay"></div>
   <!-- tp-offcanvus-area-end -->

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
       
   <footer>
    <!-- tp-footer-area-start -->
    <div class="tp-footer__area theme-bg pt-0 pb-50">
     
       <div class="tp-footer-bottom__area mt-80">
          <div class="container">
             <div class="tp-footer-bottom__border-top pt-40">
                <div class="row align-items-center">
                   <div class="col-xl-2 col-lg-2 col-md-6 col-12 order-2 order-lg-1 text-center text-md-start">
                      <div class="tp-footer-bottom__logo">
                         <a href="index.html"><img src="{{ asset('guest/img/logo/logo.png') }}" alt=""></a>
                      </div>
                   </div>
                   <div class="col-xl-7 col-lg-7 col-md-12 col-12 order-1 order-lg-2 d-none d-sm-block">
                      <div class="tp-footer-bottom__menu">
                         <ul>
                            <li><a href="#">Features</a></li>
                            <li><a href="#">Riviews</a></li>
                            <li><a href="#">Pricing</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Blog</a></li>
                         </ul>
                      </div>
                   </div>
                   <div class="col-xl-3 col-lg-3 col-md-6 col-12 order-2 order-lg-3 text-center text-md-end">
                      <div class="tp-footer-bottom__social">
                         <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                         </ul>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <!-- tp-footer-area-end -->
 </footer>

 <!-- JS here -->
 <script src="{{ asset("guest/js/jquery.js") }}"></script>
 <script src="{{ asset("guest/js/waypoints.js") }}"></script>
 <script src="{{ asset("guest/js/bootstrap.bundle.min.js") }}"></script>
 <script src="{{ asset("guest/js/swiper-bundle.js") }}"></script>
 <script src="{{ asset("guest/js/slick.js") }}"></script>
 <script src="{{ asset("guest/js/magnific-popup.js") }}"></script>
 <script src="{{ asset("guest/js/counterup.js") }}"></script>
 <script src="{{ asset("guest/js/wow.js") }}"></script>
 <script src="{{ asset("guest/js/nice-select.js") }}"></script>
 <script src="{{ asset("guest/js/meanmenu.js") }}"></script>
 <script src="{{ asset("guest/js/isotope-pkgd.js") }}"></script>
 <script src="{{ asset("guest/js/imagesloaded-pkgd.js") }}"></script>
 <script src="{{ asset("guest/js/ajax-form.js") }}"></script>
 <script src="{{ asset("guest/js/main.js") }}"></script>



</body>

</html>