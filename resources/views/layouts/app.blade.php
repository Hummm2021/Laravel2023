<!DOCTYPE html>
<html
  lang="fr"
  data-footer="true"
  {{-- data-override='"showSettings":false}' --}}
  {{-- data-override='{"attributes": {"placement": "horizontal","layout": "boxed" }, "showSettings":false, "storagePrefix": "starter-project"}' --}}
  {{-- data-placement="horizontal" data-behaviour="pinned" data-layout="fluid" data-radius="rounded" data-color="light-green" data-navcolor="light-green" data-show="true" data-dimension="mobile" --}}
>

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="An empty page with a boxed horizontal layout." />
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
    {{-- <meta name="application-name" content="&nbsp;" /> --}}
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
    @if(request()->route()->getName() === 'admin.home')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['2023', 'Reçues', 'résolues'],
          ['Avril', {{ $avril }}, {{ $avrilR }}],
          ['Mai', {{ $mai }}, {{ $maiR }}],
          ['Juin', {{ $juin }}, {{ $juinR }}],
          ['Juillet', {{ $juillet }}, {{ $juilletR }}],
          ['Aout', {{ $aout }}, {{ $aoutR }}],
          ['Septembre', {{$septembre}}, {{$septembreR}}],
          ['Octobre', {{$octobre}}, {{$octobreR}}],
          ['Novembre', {{$novembre}}, {{$novembreR}}],
          ['Decembre', {{$decembre}}, {{$decembreR}}]
        ]);

        var options = {
          chart: {
            title: 'Demandes Support technique',
            subtitle: 'Reçues  et résolues: Avril-Décembre 2023',
          },bars: 'vertical',
            vAxis: {format: 'decimal'},
            height: 300,
            colors: ['#d95f02', '#1b9e77']
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
        
      }

      


      //       google.charts.load('current', {'packages':['bar']});
      // google.charts.setOnLoadCallback(drawChart);

      // function drawChart() {
      //   var data = google.visualization.arrayToDataTable([
      //     ['Year', 'Sales', 'Expenses', 'Profit'],
      //     ['2014', 1000, 400, 200],
      //     ['2015', 1170, 460, 250],
      //     ['2016', 660, 1120, 300],
      //     ['2017', 1030, 540, 350]
      //   ]);

      //   var options = {
      //     chart: {
      //       title: 'Company Performance',
      //       subtitle: 'Sales, Expenses, and Profit: 2014-2017',
      //     },
      //     bars: 'vertical',
      //     vAxis: {format: 'decimal'},
      //     height: 400,
      //     colors: ['#1b9e77', '#d95f02', '#7570b3']
      //   };

      //   var chart = new google.charts.Bar(document.getElementById('chart_div'));

      //   chart.draw(data, google.charts.Bar.convertOptions(options));

      //   var btns = document.getElementById('btn-group');

      //   btns.onclick = function (e) {

      //     if (e.target.tagName === 'BUTTON') {
      //       options.vAxis.format = e.target.id === 'none' ? '' : e.target.id;
      //       chart.draw(data, google.charts.Bar.convertOptions(options));
      //     }
      //   }
      // }
    </script>
    @endif
    
  </head>

  <body>
    <div id="root">
      <div id="nav" class="nav-container d-flex">
        <div class="nav-content d-flex">
          <!-- Logo Start -->
          <div class="logo position-relative">
            <a href="#">
              <!-- Logo can be added directly -->
              <img src="{{asset('acorn/img/logo/image-removebg-preview.png')}}" alt="logo" />

              <!-- Or added via css to provide different ones for different color themes -->
              {{-- <div class="img"></div> --}}
            </a>
          </div>
          <!-- Logo End -->

          <!-- Language Switch Start -->
          {{-- <div class="language-switch-container">
            <button class="btn btn-empty language-button dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">EN</button>
            <div class="dropdown-menu">
              <a href="#" class="dropdown-item">DE</a>
              <a href="#" class="dropdown-item active">EN</a>
              <a href="#" class="dropdown-item">ES</a>
            </div>
          </div> --}}
          <!-- Language Switch End -->

          <!-- User Menu Start -->
          <div class="user-container d-flex">
            <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="profile" alt="profile" src="{{asset('acorn/img/profile/profile-9.webp')}}" />
              {{-- <div class="name">name</div> --}}
              <div class="name">{{Auth::guard('admin')->user()->name}}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-end user-menu wide">
              <div class="row mb-3 ms-0 me-0">
                <div class="col-12 ps-1 mb-2">
                  <div class="text-extra-small text-primary">COMPTE</div>
                </div>
                <div class="col-6 ps-1 pe-1">
                  <ul class="list-unstyled">
                    <li>
                      <a href="#">Profile</a>
                      {{-- <a href="{{route('user.profile', Auth::guard('web')->user()->id)}}">Profile</a> --}}
                    </li>
                    <li>
                      <a href="#">Calendrier</a>
                    </li>
                  </ul>
                </div>
                <div class="col-6 pe-1 ps-1">
                  <ul class="list-unstyled">
                    <li>
                      <a href="#">Securité</a>
                    </li>
                    {{-- <li>
                      <a href="#">Billing</a>
                    </li> --}}
                  </ul>
                </div>
              </div>
              <div class="row mb-1 ms-0 me-0">
                <div class="col-12 p-1 mb-2 pt-2">
                  <div class="text-extra-small text-primary">APPLICATION</div>
                </div>
                <div class="col-6 ps-1 pe-1">
                  <ul class="list-unstyled">
                    <li>
                      <a href="#">Thèmes</a>
                    </li>
                    <li>
                      <a href="#">Langue</a>
                    </li>
                  </ul>
                </div>
                <div class="col-6 pe-1 ps-1">
                  <ul class="list-unstyled">
                    <li>
                      <a href="#">Appareil</a>
                    </li>
                    {{-- <li>
                      <a href="#">Storage</a>
                    </li> --}}
                  </ul>
                </div>
              </div>
              <div class="row mb-1 ms-0 me-0">
                <div class="col-12 p-1 mb-3 pt-3">
                  <div class="separator-light"></div>
                </div>
                <div class="col-6 ps-1 pe-1">
                  <ul class="list-unstyled">
                    <li>
                      <a href="#">
                        <i data-acorn-icon="help" class="me-2" data-acorn-size="17"></i>
                        <span class="align-middle">Aide</span>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i data-acorn-icon="file-text" class="me-2" data-acorn-size="17"></i>
                        <span class="align-middle">FAQ</span>
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="col-6 pe-1 ps-1">
                  <ul class="list-unstyled">
                    <li>
                      <a href="#">
                        <i data-acorn-icon="gear" class="me-2" data-acorn-size="17"></i>
                        <span class="align-middle text-medium">Réglage</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{ route('admin.logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
                        <span class="align-middle text-medium">Quitter</span>
                      </a>
                      <form action="{{route('admin.logout')}}" method="POST" class="d-none" id="logout-form">@csrf</form>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- User Menu End -->

          <!-- Icons Menu Start -->
          <ul class="list-unstyled list-inline text-center menu-icons">
            <li class="list-inline-item">
              <a href="#" data-bs-toggle="modal" data-bs-target="#searchPagesModal">
                <i data-acorn-icon="search" data-acorn-size="18"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#" id="pinButton" class="pin-button">
                <i data-acorn-icon="lock-on" class="unpin" data-acorn-size="18"></i>
                <i data-acorn-icon="lock-off" class="pin" data-acorn-size="18"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#" id="colorButton">
                <i data-acorn-icon="light-on" class="light" data-acorn-size="18"></i>
                <i data-acorn-icon="light-off" class="dark" data-acorn-size="18"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#" data-bs-toggle="dropdown" data-bs-target="#notifications" aria-haspopup="true" aria-expanded="false" class="notification-button">
                <div class="position-relative d-inline-flex">
                  <i data-acorn-icon="bell" data-acorn-size="18"></i>
                  <span class="position-absolute notification-dot rounded-xl"></span>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end wide notification-dropdown scroll-out" id="notifications">
                <div class="scroll">
                  <ul class="list-unstyled border-last-none">
                    <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                      <img src="img/profile/profile-1.webp" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                      <div class="align-self-center">
                        <a href="#">Joisse Kaycee just sent a new comment!</a>
                      </div>
                    </li>
                    <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                      <img src="img/profile/profile-2.webp" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                      <div class="align-self-center">
                        <a href="#">New order received! It is total $147,20.</a>
                      </div>
                    </li>
                    <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                      <img src="img/profile/profile-3.webp" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                      <div class="align-self-center">
                        <a href="#">3 items just added to wish list by a user!</a>
                      </div>
                    </li>
                    <li class="pb-3 pb-3 border-bottom border-separator-light d-flex">
                      <img src="img/profile/profile-6.webp" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                      <div class="align-self-center">
                        <a href="#">Kirby Peters just sent a new message!</a>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
          </ul>
          <!-- Icons Menu End -->

          <!-- Menu Start -->
          <div class="menu-container flex-grow-1">
            <ul id="menu" class="menu">
                <li>
                    <a href="{{ route('admin.home') }}" >
                        <i data-acorn-icon="screen" class="icon" data-acorn-size="18"></i>
                        <span class="label">Accueil</span>
                    </a>
                </li>
              <li>                
                <a href="{{ route('admin.demande')}}">
                  <i data-acorn-icon="file-text" class="icon" data-acorn-size="18"></i>
                  <span class="label">Demandes</span>
                </a>
              </li>
              <li>
                <a href="{{ route('admin.intervention')}}">
                  <i data-acorn-icon="trend-up" class="icon" data-acorn-size="18"></i>
                  <span class="label">Interventions</span>
                </a>
              </li>
              <li>
                <a href="{{ route('admin.reglages') }}">
                  <i data-acorn-icon="gear" class="icon" data-acorn-size="18"></i>
                  <span class="label">Réglages</span>
                </a>                
              </li>              
            </ul>
          </div>
          <!-- Menu End -->

          

          <!-- Mobile Buttons Start -->
          <div class="mobile-buttons-container">
            <!-- Scrollspy Mobile Button Start -->
            <a href="#" id="scrollSpyButton" class="spy-button" data-bs-toggle="dropdown">
              <i data-acorn-icon="menu-dropdown"></i>
            </a>
            <!-- Scrollspy Mobile Button End -->

            <!-- Scrollspy Mobile Dropdown Start -->
            <div class="dropdown-menu dropdown-menu-end" id="scrollSpyDropdown"></div>
            <!-- Scrollspy Mobile Dropdown End -->

            <!-- Menu Button Start -->
            <a href="#" id="mobileMenuButton" class="menu-button">
              <i data-acorn-icon="menu"></i>
            </a>
            <!-- Menu Button End -->
          </div>
          <!-- Mobile Buttons End -->
        </div>
        <div class="nav-shadow"></div>
      </div>

      <main>
        <div class="container">
            @yield('navbar')
        </div>
      </main>      
    </div>

    <!-- Theme Settings Modal Start -->
<div
class="modal fade modal-right scroll-out-negative"
id="settings"
data-bs-backdrop="true"
tabindex="-1"
role="dialog"
aria-labelledby="settings"
aria-hidden="true"
>
<div class="modal-dialog modal-dialog-scrollable full" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">Theme Settings</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <div class="modal-body">
      <div class="scroll-track-visible">
        <div class="mb-5" id="color">
          <label class="mb-3 d-inline-block form-label">Color</label>
          <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
            <a href="#" class="flex-grow-1 w-50 option col" data-value="light-blue" data-parent="color">
              <div class="card rounded-md p-3 mb-1 no-shadow color">
                <div class="blue-light"></div>
              </div>
              <div class="text-muted text-part">
                <span class="text-extra-small align-middle">LIGHT BLUE</span>
              </div>
            </a>
            <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-blue" data-parent="color">
              <div class="card rounded-md p-3 mb-1 no-shadow color">
                <div class="blue-dark"></div>
              </div>
              <div class="text-muted text-part">
                <span class="text-extra-small align-middle">DARK BLUE</span>
              </div>
            </a>
          </div>
          
          <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
            <a href="#" class="flex-grow-1 w-50 option col" data-value="light-green" data-parent="color">
              <div class="card rounded-md p-3 mb-1 no-shadow color">
                <div class="green-light"></div>
              </div>
              <div class="text-muted text-part">
                <span class="text-extra-small align-middle">LIGHT GREEN</span>
              </div>
            </a>
            <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-green" data-parent="color">
              <div class="card rounded-md p-3 mb-1 no-shadow color">
                <div class="green-dark"></div>
              </div>
              <div class="text-muted text-part">
                <span class="text-extra-small align-middle">DARK GREEN</span>
              </div>
            </a>
          </div>

          
        </div>

        <div class="mb-5" id="navcolor">
          <label class="mb-3 d-inline-block form-label">Override Nav Palette</label>
          <div class="row d-flex g-3 justify-content-between flex-wrap">
            <a href="#" class="flex-grow-1 w-33 option col" data-value="default" data-parent="navcolor">
              <div class="card rounded-md p-3 mb-1 no-shadow">
                <div class="figure figure-primary top"></div>
                <div class="figure figure-secondary bottom"></div>
              </div>
              <div class="text-muted text-part">
                <span class="text-extra-small align-middle">DEFAULT</span>
              </div>
            </a>
            <a href="#" class="flex-grow-1 w-33 option col" data-value="light" data-parent="navcolor">
              <div class="card rounded-md p-3 mb-1 no-shadow">
                <div class="figure figure-secondary figure-light top"></div>
                <div class="figure figure-secondary bottom"></div>
              </div>
              <div class="text-muted text-part">
                <span class="text-extra-small align-middle">LIGHT</span>
              </div>
            </a>
            <a href="#" class="flex-grow-1 w-33 option col" data-value="dark" data-parent="navcolor">
              <div class="card rounded-md p-3 mb-1 no-shadow">
                <div class="figure figure-muted figure-dark top"></div>
                <div class="figure figure-secondary bottom"></div>
              </div>
              <div class="text-muted text-part">
                <span class="text-extra-small align-middle">DARK</span>
              </div>
            </a>
          </div>
        </div>

        <div class="mb-5" id="placement">
          <label class="mb-3 d-inline-block form-label">Menu Placement</label>
          <div class="row d-flex g-3 justify-content-between flex-wrap">
            <a href="#" class="flex-grow-1 w-50 option col" data-value="horizontal" data-parent="placement">
              <div class="card rounded-md p-3 mb-1 no-shadow">
                <div class="figure figure-primary top"></div>
                <div class="figure figure-secondary bottom"></div>
              </div>
              <div class="text-muted text-part">
                <span class="text-extra-small align-middle">HORIZONTAL</span>
              </div>
            </a>
            <a href="#" class="flex-grow-1 w-50 option col" data-value="vertical" data-parent="placement">
              <div class="card rounded-md p-3 mb-1 no-shadow">
                <div class="figure figure-primary left"></div>
                <div class="figure figure-secondary right"></div>
              </div>
              <div class="text-muted text-part">
                <span class="text-extra-small align-middle">VERTICAL</span>
              </div>
            </a>
          </div>
        </div>

        <div class="mb-5" id="behaviour">
          <label class="mb-3 d-inline-block form-label">Menu Behaviour</label>
          <div class="row d-flex g-3 justify-content-between flex-wrap">
            <a href="#" class="flex-grow-1 w-50 option col" data-value="pinned" data-parent="behaviour">
              <div class="card rounded-md p-3 mb-1 no-shadow">
                <div class="figure figure-primary left large"></div>
                <div class="figure figure-secondary right small"></div>
              </div>
              <div class="text-muted text-part">
                <span class="text-extra-small align-middle">PINNED</span>
              </div>
            </a>
            <a href="#" class="flex-grow-1 w-50 option col" data-value="unpinned" data-parent="behaviour">
              <div class="card rounded-md p-3 mb-1 no-shadow">
                <div class="figure figure-primary left"></div>
                <div class="figure figure-secondary right"></div>
              </div>
              <div class="text-muted text-part">
                <span class="text-extra-small align-middle">UNPINNED</span>
              </div>
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
</div>
<!-- Theme Settings Modal End -->

  <!-- Theme Settings Button Start -->
  {{-- <div class="settings-buttons-container">
  <button type="button" class="btn settings-button btn-primary p-0" data-bs-toggle="modal" data-bs-target="#settings" id="settingsButton">
    <span class="d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="left" title="Settings">
      <i data-acorn-icon="paint-roller" class="position-relative"></i>
    </span>
  </button>
  </div> --}}
  <!-- Theme Settings Button End -->


    <!-- Search Modal Start -->
    <div class="modal fade modal-under-nav modal-search modal-close-out" id="searchPagesModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header border-0 p-0">
            <button type="button" class="btn-close btn btn-icon btn-icon-only btn-foreground" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body ps-5 pe-5 pb-0 border-0">
            <input id="searchPagesInput" class="form-control form-control-xl borderless ps-0 pe-0 mb-1 auto-complete" type="text" autocomplete="off" />
          </div>
          <div class="modal-footer border-top justify-content-start ps-5 pe-5 pb-3 pt-3 border-0">
            <span class="text-alternate d-inline-block m-0 me-3">
              <i data-acorn-icon="arrow-bottom" data-acorn-size="15" class="text-alternate align-middle me-1"></i>
              <span class="align-middle text-medium">Navigate</span>
            </span>
            <span class="text-alternate d-inline-block m-0 me-3">
              <i data-acorn-icon="arrow-bottom-left" data-acorn-size="15" class="text-alternate align-middle me-1"></i>
              <span class="align-middle text-medium">Select</span>
            </span>
          </div>
        </div>
      </div>
    </div>
    <!-- Search Modal End -->
    

  <!-- Theme Settings Button Start -->
  {{-- <div class="settings-buttons-container">
  <button type="button" class="btn settings-button btn-primary p-0" data-bs-toggle="modal" data-bs-target="#settings" id="settingsButton">
    <span class="d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="left" title="Settings">
      <i data-acorn-icon="paint-roller" class="position-relative"></i>
    </span>
  </button>
  </div> --}}
  <!-- Theme Settings Button End -->



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
