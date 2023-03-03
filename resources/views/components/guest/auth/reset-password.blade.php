
      <!-- breadcrumb area start -->
      <div class="breadcrumb__area breadcrumb-height p-relative grey-bg"
         data-background="{{ asset('guest/img/breadcrumb/breadcrumb.jpg') }}">
         <div class="breadcrumb__scroll-bottom smooth">
            <a href="#login">
               <i class="far fa-arrow-down"></i>
            </a>
         </div>
         <div class="container">
            <div class="row">
               <div class="col-xxl-12">
                  <div class="breadcrumb__content text-center">
                     <h3 class="breadcrumb__title">Login Page</h3>
                     <div class="breadcrumb__list">
                        <span><a href="#">Home</a></span>
                        <span class="dvdr"><i class="fa fa-angle-right"></i></span>
                        <span>Lets work together</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- breadcrumb area end -->

        <!--login-area-start -->
      <div class="tp-login-area">
         <div class="container-fluid p-0">
            <div class="row gx-0 align-items-center">
               <div class="col-xl-6 col-lg-6 col-12">
                  <div class="tp-login-thumb login-space sky-bg d-flex justify-content-center">
                     <img src="{{ asset('guest/img/contact/login.jpg') }}" alt="">
                  </div>
               </div>
               <div class="col-xl-6 col-lg-6 col-12">
                  <div class="tp-login-wrapper login-space d-flex justify-content-center">
                     <div id="login" class="tplogin">
                        <div class="tplogin__title">
                           <h3 class="tp-login-title">Login your Account</h3>
                        </div>
                        <div class="tplogin__form">
                           <form action="{{ route('password.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                              <div class="tp-mail">
                                 <label for="mail">Enter your Email</label>
                                 <input type="email" placeholder="Enter your Mail" id="mail" name="email">
                                 @if($errors->any('email'))
                                    <p style="color: red; font-size: medium">{{$errors->first('email')}}</p>
                                 @endif
                              </div>
                              <div class="tp-password">
                                 <label for="Password">Enter Password</label>
                                 <input type="password" placeholder="Enter your password" id="Password" name="password">
                                 @if($errors->any('password'))
                                 <p style="color: red; font-size: medium">{{$errors->first('password')}}</p>
                             @endif
                              </div>
                              <div class="tp-password">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" placeholder="Confirm password" id="password_confirmation" name="password_confirmation">
                               @if($errors->any('password_confirmation'))
                                    <p style="color: red; font-size: medium">{{$errors->first('password_confirmation')}}</p>
                               @endif
                             </div>
                              
                              <div class="tp-login-button">
                                 <button class="tp-btn-blue-square w-100" type="submit"><span>Save Password</span></button>
                              </div>
                              
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- login-area-end -->