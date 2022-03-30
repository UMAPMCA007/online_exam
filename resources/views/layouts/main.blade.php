<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('font-awesome/css/fontawesome-all.css') }}" rel="stylesheet">
        <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">


       <!--Style End -->

    </head>
    <body class="pace-done">
            <!-- Page Content -->
              <div id="wrapper">
                  <nav class="navbar-default navbar-static-side" role="navigation">
                      <div class="sidebar-collapse">
                          <ul class="nav metismenu" id="side-menu">
                              <li class="nav-header">
                                  <div class=" profile-element mr-3">
                                      <img alt="image" class=" rounded-circle " src="{{asset('picture/admin.jpg')}}" style="width:100px; height: 100px;margin-left:30px;"/>
                                      <span class="text-md-center"><p style="color:whitesmoke;"></p> </span>
                                  </div>
                                  <div class="logo-element">
                                      IN+
                                  </div>
                              </li>
                              @if($user->user_types=='SUPER ADMIN')
                              <li class="active">
                                  <a href="{{route('dashboard')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
                              </li>

                              <li>
                                  <a href="{{route('students')}}"><i class="fa fa-pie-chart"></i> <span class="nav-label">Students</span>  </a>
                              </li>
                              <li>
                                  <a href="{{route('qs')}}"><i class="fa fa-flask"></i> <span class="nav-label">Question & Answer</span></a>
                              </li>
                              <li>
                                  <a href="{{route('result')}}"><i class="fa fa-laptop"></i> <span class="nav-label">Result</span></a>
                              </li>
                              @endif
                          </ul>

                      </div>
                  </nav>
                  <div id="page-wrapper" class="gray-bg">
                      <div class="row border-bottom">
                          <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                              <div class="navbar-header">
                                  <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                                  <form role="search" class="navbar-form-custom" action="search_results.html">
                                      <div class="form-group">
                                          <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                                      </div>
                                  </form>
                              </div>
                              <ul class="nav navbar-top-links navbar-right">
                                  <li>
                                      <form method="POST"  action="{{ route('logout') }}">
                                          @csrf

                                          <x-jet-dropdown-link href="{{ route('logout') }}"
                                                               onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                              {{ __('Log Out') }}
                                          </x-jet-dropdown-link>
                                      </form>
                                  </li>
                              </ul>

                          </nav>
                      </div>
                      @yield('content')
                      <div class="footer">
                          <div>
                              <strong>Copyright</strong> Example Company © 2014-2018
                          </div>
                      </div>
                  </div>
              </div>
             <!--page content close -->
            <!-- Scripts -->
            <script src="{{asset("js/popper.min.js")}}"></script>
            <script src="{{asset("js/bootstrap.js")}}"></script>
            <!-- Scripts close -->
    </body>

</html>
