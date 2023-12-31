<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="Login Page" />
    <!-- Favicon Tags Start -->
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="{{asset('acorn/img/favicon/apple-touch-icon-57x57.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('acorn/img/favicon/apple-touch-icon-114x114.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('acorn/img/favicon/apple-touch-icon-72x72.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('acorn/img/favicon/apple-touch-icon-144x144.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="{{asset('acorn/img/favicon/apple-touch-icon-60x60.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="{{asset('acorn/img/favicon/apple-touch-icon-120x120.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="{{asset('acorn/img/favicon/apple-touch-icon-76x76.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{asset('acorn/img/favicon/apple-touch-icon-152x152.png')}}" />
    <link rel="icon" type="image/png" href="{{asset('acorn/img/favicon/favicon-196x196.png')}}" sizes="196x196" />
    <link rel="icon" type="image/png" href="{{asset('acorn/img/favicon/favicon-96x96.png')}}" sizes="96x96" />
    <link rel="icon" type="image/png" href="{{asset('acorn/img/favicon/favicon-32x32.png')}}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{asset('acorn/img/favicon/favicon-16x16.png')}}" sizes="16x16" />
    <link rel="icon" type="image/png" href="{{asset('acorn/img/favicon/favicon-128.png')}}" sizes="128x128" />
    <meta name="application-name" content="&nbsp;" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="{{asset('acorn/img/favicon/mstile-144x144.png')}}" />
    <meta name="msapplication-square70x70logo" content="{{asset('acorn/img/favicon/mstile-70x70.png')}}" />
    <meta name="msapplication-square150x150logo" content="{{asset('acorn/img/favicon/mstile-150x150.png')}}" />
    <meta name="msapplication-wide310x150logo" content="{{asset('acorn/img/favicon/mstile-310x150.png')}}" />
    <meta name="msapplication-square310x310logo" content="{{asset('acorn/img/favicon/mstile-310x310.png')}}" />
    <!-- Favicon Tags End -->
    <!-- Font Tags Start -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('acorn/font/CS-Interface/style.css')}}" />
    <!-- Font Tags End -->
    <!-- Vendor Styles Start -->
    <link rel="stylesheet" href="{{asset('acorn/css/vendor/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('acorn/css/vendor/OverlayScrollbars.min.css')}}" />

    <!-- Vendor Styles End -->
    <!-- Template Base Styles Start -->
    <link rel="stylesheet" href="{{asset('acorn/css/styles.css')}}" />
    <!-- Template Base Styles End -->

    <link rel="stylesheet" href="{{asset('acorn/css/main.css')}}" />
    <script src="{{asset('acorn/js/base/loader.js')}}"></script>
  </head>

  <body class="h-100">
    <div id="root" class="h-100">
      <!-- Background Start -->
      <div class="fixed-background"></div>
      <!-- Background End -->

      <div class="container-fluid p-0 h-100 position-relative">
        <div class="row g-0 h-100">
          <!-- Left Side Start -->
          <div class="offset-0 col-12 d-none d-lg-flex offset-md-1 col-lg h-lg-100">
            <div class="min-h-100 d-flex align-items-center">
              <div class="w-100 w-lg-75 w-xxl-50">
                <div>
                  
                </div>
              </div>
            </div>
          </div>
          <!-- Left Side End -->

          <!-- Right Side Start -->
          @yield('content')
          <!-- Right Side End -->
        </div>
      </div>
    </div>    


    <!-- Vendor Scripts Start -->
    <script src="{{asset('acorn/js/vendor/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('acorn/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('acorn/js/vendor/OverlayScrollbars.min.js')}}"></script>
    <script src="{{asset('acorn/js/vendor/autoComplete.min.js')}}"></script>
    <script src="{{asset('acorn/js/vendor/clamp.min.js')}}"></script>

    <script src="{{asset('acorn/icon/acorn-icons.js')}}"></script>
    <script src="{{asset('acorn/icon/acorn-icons-interface.js')}}"></script>

    <script src="{{asset('acorn/js/vendor/jquery.validate/jquery.validate.min.js')}}"></script>

    <script src="{{asset('acorn/js/vendor/jquery.validate/additional-methods.min.js')}}"></script>

    <!-- Vendor Scripts End -->

    <!-- Template Base Scripts Start -->
    <script src="{{asset('acorn/js/base/helpers.js')}}"></script>
    <script src="{{asset('acorn/js/base/globals.js')}}"></script>
    <script src="{{asset('acorn/js/base/nav.js')}}"></script>
    <script src="{{asset('acorn/js/base/search.js')}}"></script>
    <script src="{{asset('acorn/js/base/settings.js')}}"></script>
    <!-- Template Base Scripts End -->
    <!-- Page Specific Scripts Start -->

    <script src="{{asset('acorn/js/pages/auth.login.js')}}"></script>

    <script src="{{asset('acorn/js/common.js')}}"></script>
    <script src="{{asset('acorn/js/scripts.js')}}"></script>
    <!-- Page Specific Scripts End -->
  </body>
</html>
