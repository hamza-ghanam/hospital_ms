<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
        });
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/tempusdominus-bootstrap-4.min.css')}}"/>

    <style>
        @font-face {
            font-family: HeadFont;
            src: url({{ asset('fonts/HeadFont.woff')}});
        }

        @font-face {
            font-family: BodyFont;
            src: url({{ asset('fonts/BodyFont.woff')}});
        }

        @font-face {
            font-family: numsOnly;
            src: local("Arial Lihavoitu");
            unicode-range: U+30-39;
        }

        body {
            font-family: BodyFont;
        }

        .date {
            font-family: numsOnly;
        }

        h1, h2, h3, h4, h5, h6, .navbar-brand {
            font-family: HeadFont;
        }

        .badge {
            font-size: 10pt !important;
            width: 65px;
        }

        .nav-item {
            font-size: 13pt;
            font-weight: 800;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('css/myStyle.css') }}">

</head>

<body>
<div id="app">
    <nav class="navbar fixed-top navbar-dark bg-primary navbar-expand-md shadow-sm">
        <div class="container">
            <a href="#menu-toggle" id="menu-toggle" class="navbar-brand">
                <span class="navbar-toggler-icon"></span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02"
                    aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="{{asset('imgs/logo.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

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
    <div id="wrapper" class="toggled">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                @guest
                    <li></li>
                @else
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
                @endguest
            </ul>
        </div> <!-- /#sidebar-wrapper -->
        <!-- Page Content -->
        <br/><br/>
    <main class="py-4">
        <div class="container">
            @if (isset($message) && !empty($message))
                <div class="alert alert-danger">{{$message}}</div>
                <br/>
            @endif
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <h4 class="card-header">تعديل عمليّة</h4>
                        <div class="card-body">
                            <form method="POST" action="{{URL::to("/surgeries/$surgery->id")}}">
                                @csrf
                                @method("PUT")
                                <label for="name" class="col-sm-2 col-form-label">اسم العمليّة</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-file-medical-alt"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="name" name="name" value="{{$surgery->name}}"
                                               required="required"/>

                                    </div>
                                </div>
                                <label for="date_" class="col-sm-8 col-form-label">تاريخ العملية</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                        <input type="date" class="date form-control" dir="ltr" name="date_" id="date_" value="{{$surgery->date_}}"/>
                                    </div>
                                </div>
                                <label for="time_" class="col-sm-8 col-form-label">توقيت العملية</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                        </div>
                                        <input type="time" class="date timepicker form-control" dir="ltr" name="time_" id="time_" value="{{$surgery->time_}}"/>
                                    </div>
                                </div>
                                <label for="spec" class="col-sm-2 col-form-label">التخصّص</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-stethoscope"></i></div>
                                        </div>
                                        <select name="spec" id="spec" class="form-control" required="required">
                                            <option {{$surgery->specialization == 'الجراحة الأذنية' ? 'selected' : ''}} value="الجراحة الأذنية">الجراحة الأذنية</option>
                                            <option {{$surgery->specialization == 'الجراحة البولية' ? 'selected' : ''}} value="الجراحة البولية">الجراحة البولية</option>
                                            <option {{$surgery->specialization == 'الجراحة الصدرية' ? 'selected' : ''}} value="الجراحة الصدرية">الجراحة الصدرية</option>
                                            <option {{$surgery->specialization == 'الجراحة العامة' ? 'selected' : ''}} value="الجراحة العامة">الجراحة العامة</option>
                                            <option {{$surgery->specialization == 'الجراحة العصبية' ? 'selected' : ''}} value="الجراحة العصبية">الجراحة العصبية</option>
                                            <option {{$surgery->specialization == 'الجراحة العظمية' ? 'selected' : ''}} value="الجراحة العظمية">الجراحة العظمية</option>
                                            <option {{$surgery->specialization == 'الجراحة الفكية' ? 'selected' : ''}} value="الجراحة الفكية">الجراحة الفكية</option>
                                            <option {{$surgery->specialization == 'جراحة الأوعية' ? 'selected' : ''}} value="جراحة الأوعية">جراحة الأوعية</option>
                                            <option {{$surgery->specialization == 'جراحة التجميل' ? 'selected' : ''}} value="جراحة التجميل">جراحة التجميل</option>
                                            <option {{$surgery->specialization == 'الجراحة العينية' ? 'selected' : ''}} value="الجراحة العينية">الجراحة العينية</option>
                                            <option {{$surgery->specialization == 'التنظير الهضمي' ? 'selected' : ''}} value="التنظير الهضمي">التنظير الهضمي</option>
                                            <option {{$surgery->specialization == 'التنظير القصبي' ? 'selected' : ''}} value="التنظير القصبي">التنظير القصبي</option>
                                            <option {{$surgery->specialization == 'التنظير البولي' ? 'selected' : ''}} value="التنظير البولي">التنظير البولي</option>
                                            <option {{$surgery->specialization == 'عمليات النساء والتوليد' ? 'selected' : ''}} value="عمليات النساء والتوليد">عمليات النساء والتوليد</option>
                                            <option {{$surgery->specialization == 'القثطرة القلبية' ? 'selected' : ''}} value="القثطرة القلبية">القثطرة القلبية</option>
                                            <option {{$surgery->specialization == 'الجراحة القلبية' ? 'selected' : ''}} value="الجراحة القلبية">الجراحة القلبية</option>
                                        </select>
                                    </div>
                                </div>
                                <label for="doctor" class="col-sm-2 col-form-label">اسم الطبيب</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-user-md"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="doctor" name="doctor" value="{{$surgery->doctor_name}}"
                                               required="required"/>

                                    </div>
                                </div>
                                <label for="state" class="col-sm-2 col-form-label">الحالة</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-pager"></i></div>
                                        </div>
                                        <select name="state" required="required" class="form-control">
                                            <option value="waiting" {{ $surgery->status == 'waiting' ? 'selected' : ''}}>قيد الانتظار</option>
                                            <option value="in_progress" {{ $surgery->status == 'in_progress' ? 'selected' : ''}}>قيد التنفيذ</option>
                                            <option value="finished" {{ $surgery->status == 'finished' ? 'selected' : ''}}>منفّذة</option>
                                            <option value="canceled" {{ $surgery->status == 'canceled' ? 'selected' : ''}}>ملغاة</option>
                                        </select>

                                    </div>
                                </div>
                                <label for="hall" class="col-sm-2 col-form-label">القاعة</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-person-booth"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="hall" name="hall" value="{{$surgery->hall}}"
                                               required="required"/>

                                    </div>
                                </div>
                                <label for="patient" class="col-sm-2 col-form-label">اسم المريض</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-procedures"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="patient" name="patient" value="{{$surgery->patient_name }}"/>
                                    </div>
                                </div>
                                <br/>
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(function () {
                    $('#datetimepicker1').datetimepicker();
                });
            </script>
        </div>
    </main>
</div>
</body>
</html>