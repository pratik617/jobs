<!DOCTYPE html>
<html lang="en" >
   <!--begin::Head-->
   <head>
      <meta charset="utf-8"/>
      <title>{{ config('app.name', 'Jobs') }}</title>
      <meta name="description" content="Updates and statistics"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <!--begin::Fonts-->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
      <!--end::Fonts-->

      @include('admin.inc._css')

      @stack('styles')

      <script>
         var APP_URL = {!! json_encode(url('/')) !!};

         window.Laravel = <?php echo json_encode([
               'csrfToken' => csrf_token(),
         ]); ?>
      </script>

   </head>
   <!--end::Head-->

   <!--begin::Body-->
   <body  id="kt_body"  class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading"  >
      <!--begin::Main-->
		<div id="lds-roller">
			<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
		</div>

      @include('admin.inc._header-mob')

      <div class="d-flex flex-column flex-root" id="app">
         <!--begin::Page-->
         <div class="d-flex flex-row flex-column-fluid page">
            
            @include('admin.inc._aside')
            
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                
                @include('admin.inc.header')
                <!--begin::Content-->
                <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
                    @yield('content')
                </div>
                <!--end::Content-->

                @include('admin.inc.footer')

            </div>
            <!--end::Wrapper-->
         </div>
         <!--end::Page-->
      </div>
      <!--end::Main-->

      <!-- begin::User Panel-->
      <div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
         
         <!--begin::Header-->
         
         <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
            <h3 class="font-weight-bold m-0">
               {{ Auth::user()->name }}
               <!-- <small class="text-muted font-size-sm ml-2">12 messages</small> -->
            </h3>
            <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
            <i class="ki ki-close icon-xs text-muted"></i>
            </a>
         </div>
         
         <!--end::Header-->
         <!--begin::Content-->
         <div class="offcanvas-content pr-5 mr-n5">
            <!--begin::Header-->
            <div class="d-flex align-items-center">
               <!-- <div class="symbol symbol-100 mr-5">
                  <div class="symbol-label" style="background-image:url('assets/media/users/300_21.jpg')"></div>
                  <i class="symbol-badge bg-success"></i>
               </div> -->
               <div class="d-flex flex-column">
                  <div class="text-muted mt-1">
                     +91 {{ Auth::user()->mobile }}
                  </div>
                  <div class="navi mt-2">
                  
                     <a href="#" class="navi-item">
                        <span class="navi-link p-0 pb-2">
                           <span class="navi-icon mr-1">
                              <span class="svg-icon svg-icon-lg svg-icon-primary">
                                 <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
                                 <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                       <rect x="0" y="0" width="24" height="24"/>
                                       <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000"/>
                                       <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5"/>
                                    </g>
                                 </svg>
                                 <!--end::Svg Icon-->
                              </span>
                           </span>
                           <span class="navi-text text-muted text-hover-primary">{{ Auth::user()->email }}</span>
                        </span>
                        
                     </a>
                     <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Sign Out</a>

                     <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                     </form>

                  </div>
               </div>
            </div>
            <!--end::Header-->
            
         </div>
         <!--end::Content-->
      </div>
      <!-- end::User Panel-->

      <!--begin::Scrolltop-->
      <div id="kt_scrolltop" class="scrolltop">
         <span class="svg-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
               <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <polygon points="0 0 24 0 24 24 0 24"/>
                  <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1"/>
                  <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero"/>
               </g>
            </svg>
            <!--end::Svg Icon-->
         </span>
      </div>
      <!--end::Scrolltop-->

      <script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
      <!--begin::Global Config(global config for global JS scripts)-->
      <script>
         var KTAppSettings = {
         "breakpoints": {
         "sm": 576,
         "md": 768,
         "lg": 992,
         "xl": 1200,
         "xxl": 1400
         },
         "colors": {
         "theme": {
         "base": {
             "white": "#ffffff",
             "primary": "#3699FF",
             "secondary": "#E5EAEE",
             "success": "#1BC5BD",
             "info": "#8950FC",
             "warning": "#FFA800",
             "danger": "#F64E60",
             "light": "#E4E6EF",
             "dark": "#181C32"
         },
         "light": {
             "white": "#ffffff",
             "primary": "#E1F0FF",
             "secondary": "#EBEDF3",
             "success": "#C9F7F5",
             "info": "#EEE5FF",
             "warning": "#FFF4DE",
             "danger": "#FFE2E5",
             "light": "#F3F6F9",
             "dark": "#D6D6E0"
         },
         "inverse": {
             "white": "#ffffff",
             "primary": "#ffffff",
             "secondary": "#3F4254",
             "success": "#ffffff",
             "info": "#ffffff",
             "warning": "#ffffff",
             "danger": "#ffffff",
             "light": "#464E5F",
             "dark": "#ffffff"
         }
         },
         "gray": {
         "gray-100": "#F3F6F9",
         "gray-200": "#EBEDF3",
         "gray-300": "#E4E6EF",
         "gray-400": "#D1D3E0",
         "gray-500": "#B5B5C3",
         "gray-600": "#7E8299",
         "gray-700": "#5E6278",
         "gray-800": "#3F4254",
         "gray-900": "#181C32"
         }
         },
         "font-family": "Poppins"
         };
      </script>
      <!--end::Global Config-->
      
      @include('admin.inc._js')
      
      @stack('footer_scripts')
   </body>
   <!--end::Body-->
</html>