<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon Icon -->
    <link rel="icon" href="{{ asset('imgs/logo.ico') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/all.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();

            $("#menu-toggle").click(function (e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });

            $(window).resize(function (e) {
                if ($(window).width() <= 768) {
                    $("#wrapper").removeClass("toggled");
                } else {
                    $("#wrapper").addClass("toggled");
                }
            });

            $("input[name='msg_type']").click(function () {
                var radioValue = $("input[name='msg_type']:checked").val();

                if (radioValue == 'custom') {
                    $('#recipients').removeAttr('hidden');
                } else {
                    $('#recipients').attr('hidden', 'hidden');
                }
            });
        });

    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Favicon Icon -->
    <link rel="icon" href="{{ asset('imgs/logo.ico') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/tempusdominus-bootstrap-4.min.css') }}">

    <style>
        @font-face {
            font-family: HeadFont;
            src: url({{ asset('fonts/HeadFont.woff')}});
        }

        @font-face {
            font-family: BodyFont;
            src: url({{ asset('fonts/DUBAI-MEDIUM.woff')}});
        }

        @font-face {
            font-family: SideFont;
            src: url({{ asset('fonts/BodyFont.woff')}});
        }

        @font-face {
            font-family: numsOnly;
            src: local("Arial");
            unicode-range: U+30-39;
        }

        #sidebar-wrapper, .nav-item {
            font-family: SideFont;
        }


        body {
            font-family: BodyFont;
        }

        .date {
            font-family: numsOnly;
            font-size: 11pt;
        }

        h1, h2, h3, h4, h5, h6, .navbar-brand {
            font-family: HeadFont;
        }

        .badge {
            font-size: 10pt !important;
            width: 65px;
        }

        .badge, small, .page-link {
            font-family: Arial !important;
        }

        .nav-item {
            font-size: 13pt;
            font-weight: 800;
        }

        .bootstrap-datetimepicker-widget {
            direction: ltr;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('css/myStyle.css') }}">

</head>
<body>
<div id="app">
    <nav class="navbar fixed-top navbar-dark bg-primary navbar-expand-md shadow-sm">
        <div class="container">
            @auth()
                <a href="#menu-toggle" id="menu-toggle" class="navbar-brand">
                    <span class="navbar-toggler-icon"></span>
                </a>
            @endauth
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02"
                    aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="{{URL::to("cms")}}">
                <img src="{{asset('imgs/logo.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">تسجيل الدخول</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ URL::to('/password/reset') }}">
                                    إعادة تعيين كلمة المرور
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    تسجيل الخروج
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    @auth
        <div id="wrapper" class="toggled">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    @auth
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('surgeries') }}">
                                <i class="fas fa-syringe"></i>&nbsp;
                                العمليات
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('contacts') }}">
                                <i class="fas fa-id-card"></i>&nbsp;
                                جهات الاتصال
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('messages') }}">
                                <i class="fas fa-envelope"></i>&nbsp;
                                الرسائل
                                @if($user_msg_count > 0 && $user_msg_count < 99)
                                    <span style="display: inline; width: 10px"
                                          class="badge badge-pill badge-warning">{{$user_msg_count}}</span>
                                @elseif($user_msg_count >= 99)
                                    <span style="display: inline; width: 10px"
                                          class="badge badge-pill badge-warning">+99</span>
                                @endif
                            </a>
                        </li>

                        @can('manage user')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ URL::to('users') }}">
                                    <i class="fas fa-user"></i>&nbsp;
                                    الموظفون
                                </a>
                            </li>
                        @endcan
                        @can('list thank_msg')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ URL::to('thank_msgs') }}">
                                    <i class="fas fa-envelope-open"></i>&nbsp;
                                    رسائل شكر الصفحة الرئيسية
                                </a>
                            </li>
                        @endcan
                        @can('list notification')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ URL::to('notifications') }}">
                                    <i class="fas fa-sticky-note"></i>&nbsp;
                                    إشعارات الصفحة الرئيسية
                                </a>
                            </li>
                        @endcan
                    @endauth
                </ul>
            </div> <!-- /#sidebar-wrapper -->
            <!-- Page Content -->
            @endauth
            <br/><br/>
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <main class="py-4">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
</div>
</body>
</html>
