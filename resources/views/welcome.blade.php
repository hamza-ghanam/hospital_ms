<!doctype html>
<html>

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Hamza Ghanam">
    <!-- Page Title -->
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Favicon Icon -->
    <link rel="icon" href="{{ asset('imgs/logo.ico') }}">
    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <style>
        @font-face {
            font-family: HeadFont;
            src: url({{ asset('fonts/HeadFont.woff')}});
        }

        @font-face {
            font-family: BodyFont;
            src: url({{ asset('fonts/IndexBody.woff')}});
        }

        body {
            font-family: BodyFont;
        }

        h1, h2, h3, h4, h5, h6, .navbar-brand {
            font-family: HeadFont;
        }

        .nav-link {
            font-size: 20pt;
            font-weight: 800;
        }

        .tm-counter {
            font-family: BodyFont;
        }
    </style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{ asset('js/html5shiv.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/respond.min.js') }}"></script>
    <![endif]-->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.js"></script>
</head>

<body data-spy="scroll" data-target=".tm-primary-nav" class="rtl">

<!-- Start Preloader -->
<div id="tm-preloader">
    <div id="tm-preloader-in">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- End Preloader -->

<!-- Start Site Header Wrap -->
<header>
    <div class="tm-site-header">
        <div class="tm-header-info-wrap">
            <div class="container tm-header-info">
                <a href="#"><i class="fa fa-phone"></i>&nbsp;011-1234567</a>
                <a href="#"><i class="fa fa-envelope"></i>&nbsp;info@abbaseen.com</a>
            </div>
        </div>
        <div class="tm-header-menu">
            <div class="container tm-header-menu-container">
                <div class="tm-site-branding">
                    <!-- For Image Logo -->
                    <a href="{{URL::to("/")}}" class="tm-logo-link">
                        <h4 style="color: white; width: 110%;">
                            {{ config('app.name', 'Laravel') }}
                            <img src="{{ asset('imgs/logo.png') }}" width="65" alt="" class="tm-logo">
                        </h4>
                    </a>
                    <!-- For Site Title -->
                    <!-- <span class="tm-site-title">
                    <a href="index.html">Trustlife</a>
                    </span> -->
                </div>
                <nav class="tm-primary-nav">
                    <ul class="tm-primary-nav-list">
                        <li class="menu-item current-menu-ancestor current-menu-parent">
                            <a href="#home" class="nav-link">الرئيسية</a>
                        </li>
                        <li class="menu-item"><a href="#about" class="nav-link">عن المستشفى</a></li>
                        <li class="menu-item"><a href="#department" class="nav-link">الأقسام</a></li>
                        <li class="menu-item"><a href="#doctor" class="nav-link">الأطباء</a></li>
                        <li class="menu-item"><a href="#price" class="nav-link">الإشعارات</a></li>
                        <li class="menu-item"><a href="#thank" class="nav-link">كلمة شكر</a></li>
                        <li class="menu-item"><a href="#contact" class="nav-link">تواصل معنا</a></li>
                        <li class="menu-item"><a href="cms" class="nav-link">لوحة التحكم</a></li>
                    </ul>
                </nav>
            </div><!-- .tm-header-menu-container -->
        </div><!-- .tm-header-menu -->
    </div><!-- .tm-site-header -->
</header>
<!-- End Site Header Wrap -->

<!-- Start Hero Section -->
<section class="hero" id="home">
    <div class="container">
        <div class="slider-text" dir="rtl">
            <h1 class="tm-headline letters tm-rotate-text">نحرص على تقديم<br>
                أفضل علاج طبي<br>
                لجميع مرضى المستشفى
            </h1>
            <div class="empty-space col-sm-b20 col-xs-b10"></div>
            <p>جودة خدمتنا وكفاءة موظفينا <br>
                السبب الرئيسي لنجاح مستشفى العباسيين.</p>
            <div class="empty-space col-md-b55 col-sm-b35 col-xs-b25"></div>
        </div>
    </div><!-- .container -->
    <div class="tm-hero-slider owl-carousel tm-dots1" id="tm-hero-slider">
        <img src="{{ asset('imgs/index/slide-01.jpg') }}" alt="slide-01">
        <img src="{{ asset('imgs/index/slide-02.jpg') }}" alt="slide-02">
        <img src="{{ asset('imgs/index/slide-03.jpg') }}" alt="slide-03">
    </div>
    <div class="hero-overlay"></div>
    <img src="{{ asset('imgs/index/sweet-shap.png') }}" alt="Sweet Shap" class="sweet-shap">
</section>
<!-- End Hero Section -->

<!-- Start  -->
<section>
    <div class="empty-space col-md-b100 col-xs-b40"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="empty-space col-md-b0 col-xs-b30"></div>
                <div class="tm-icon-box" dir="rtl">
                    <div class="tm-icon"><i class="fa fa-user-md"></i></div>
                    <h2 class="tm-icon-box-title">أطباء ذوي كفاءات</h2>
                    <p class="tm-icon-box-text">يتمتع أطبائنا بمجموعة واسعة من الخبرة السريرية بدءًا من الأطباء
                        المبتدئين المؤهلين حديثًا إلى كبار الاستشاريين.</p>
                </div>
            </div><!-- .col -->
            <div class="col-lg-4">
                <div class="empty-space col-md-b0 col-xs-b30"></div>
                <div class="tm-icon-box" dir="rtl">
                    <div class="tm-icon"><i class="fa fa-ambulance"></i></div>
                    <h2 class="tm-icon-box-title">الرعاية في حالات الطوارئ</h2>
                    <p class="tm-icon-box-text">تقدم مراكزنا رعاية مريحة وعالية الجودة لمجموعة متنوعة من الأمراض
                        والإصابات الشائعة.</p>
                </div>
            </div><!-- .col -->
            <div class="col-lg-4">
                <div class="empty-space col-md-b0 col-xs-b30"></div>
                <div class="tm-icon-box" dir="rtl">
                    <div class="tm-icon"><i class="fa fa-hospital"></i></div>
                    <h2 class="tm-icon-box-title">خدمة على مدار 24 ساعة</h2>
                    <p class="tm-icon-box-text">يتوفر فريقنا الفني على مدار الساعة طوال أيام الأسبوع، ونلبي حالات
                        الطوارئ دائمًا إذ نملك 10 سيارات إسعاف.</p>
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
    </div>
</section>
<!-- Start  -->

<!-- Start About Secton -->
<section id="about">
    <div class="empty-space col-md-b100 col-xs-b70"></div>
    <div class="tm-section-heading text-center">
        <h2>من نحن</h2>
        <div class="tm-section-seperator"><span></span></div>
        <div class="empty-space col-md-b60 col-xs-b40"></div>
    </div>
    <div class="tm-relative">
        <div class="tm-half-section-bg left">
            <img src="{{ asset('imgs/index/about-hafl-bg.jpg') }}" alt="about hafl bg">
        </div>
        <div class="empty-space col-xs-b60"></div>
        <div class="container">
            <div class="row row-md-reverce">
                <div class="col-lg-5">
                    <div class="tm-shedule-wrap">
                        <div class="tm-shedule">
                            <h3 class="tm-shedule-title">أوقات الدوام</h3>
                            <ul class="tm-shedule-list">
                                <li>
                                    <span>Monday - Friday</span>
                                    <span>8:00 - 18:00</span>
                                </li>
                                <li>
                                    <span>Saturday</span>
                                    <span>9.00 - 18.00</span>
                                </li>
                                <li>
                                    <span>Sunday</span>
                                    <span>Closed</span>
                                </li>
                            </ul>
                        </div><!-- .tm-shedule -->
                        <div class="empty-space col-md-b40 col-xs-b30"></div>
                        <div class="tm-shedule">
                            <h3 class="tm-shedule-title">أوقات الزيارة</h3>
                            <ul class="tm-shedule-list">
                                <li>
                                    <span>Monday - Friday</span>
                                    <span>8:00 - 18:00</span>
                                </li>
                                <li>
                                    <span>Saturday</span>
                                    <span>9.00 - 18.00</span>
                                </li>
                                <li>
                                    <span>Sunday</span>
                                    <span>Closed</span>
                                </li>
                            </ul>
                        </div><!-- .tm-shedule -->
                    </div>
                </div><!-- .col -->
                <div class="col-lg-7">
                    <div class="empty-space col-md-b30 col-xs-b0"></div>
                    <div class="tm-about-wrap tm-hf-hide">
                        <div class="tm-about tm-gray-bg wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.1s">
                            <h3 class="tm-about-title">لماذا تختار الناس <span>مستشفى العباسيين</span>؟</h3>
                            <div class="tm-about-text" dir="rtl">
                                <p>نقدم أفضل الخدمات الطبية في دمشق. يختار الناس مستشفانا بسبب المزايا التالية.</p>
                                <p>.لدينا قائمة من الأطباء المرتبطين بالمستشفى، كل الأخصائيين في الأقسام متاحون، مرافق
                                    الإسعاف المتاحة، العناية بالصدمات هي الأفضل كما هو معتاد، صيدليتنا مفتوحة 24/7،
                                    تكلفتنا معقولة.</p>
                            </div>
                            <div class="empty-space col-xs-b25"></div>
                        </div>
                    </div>
                    <div class="empty-space col-xs-b30"></div>
                </div><!-- .col -->
            </div>
        </div>
        <div class="empty-space col-xs-b60"></div>
    </div>
</section>
<!-- End About Secton -->

<!-- Start Department Section -->
<section class="tm-gray-bg" id="department">
    <div class="empty-space col-md-b100 col-xs-b70"></div>
    <div class="tm-section-heading text-center">
        <h2>أقسام المستشفى</h2>
        <div class="tm-section-seperator"><span></span></div>
        <div class="empty-space col-md-b60 col-xs-b40"></div>
    </div>
    <div class="container">
        <div class="tm-tab-wrap">
            <div class="tm-tabs-wrap">
                <ul class="tabs">
                    <li><i class="icofont icofont-tooth"></i>العناية بالأسنان</li>
                    <li><i class="icofont icofont-brain"></i>طب الأمراض العصبية</li>
                    <li><i class="icofont icofont-crutches"></i>ركائز</li>
                    <li><i class="icofont icofont-pulse"></i>طب الأمراض القلبية</li>
                    <li><i class="icofont icofont-lungs"></i>طب الأمراض الرئوية</li>
                    <li><i class="icofont icofont-xray"></i>الأشعة السينية</li>
                </ul> <!-- .tabs -->
            </div>
            <div class="empty-space col-md-b60 col-xs-b40"></div>
            <div class="tm-tab-content">
                <div class="tm-tabs-item">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="tm-dept-img"><img src="{{ asset('imgs/index/1.dental.jpg') }}" alt=""></div>
                        </div><!-- .col -->
                        <div class="col-lg-6">
                            <div class="tm-dept-details-wrap">
                                <div class="tm-about tm-gray-bg">
                                    <h3 class="tm-about-title">أهلاً بكم في قسم <span>العناية بالأسنان</span></h3>
                                    <div class="tm-about-text" dir="rtl">
                                        <p>منذ أكثر من 15 عامًا، عمل مركز العناية الصحية بالأسنان على هدف واحد: ضمان
                                            حصول المرضى على مستوى عالٍ من صحة الفم بأكبر قدر ممكن من الراحة.</p>
                                        <p>نحن لا نقدم فقط طب أسنان رائع فحسب، بل نتأكد من فهمك لجميع جوانب صحة فمك.</p>
                                    </div>
                                    <div class="empty-space col-xs-b25"></div>
                                </div>
                            </div>
                        </div><!-- .col -->
                    </div>
                </div> <!-- .tabs_item -->
                <div class="tm-tabs-item">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="tm-dept-img"><img src="{{ asset('imgs/index/2.neurology.jpg') }}" alt=""></div>
                        </div><!-- .col -->
                        <div class="col-lg-6">
                            <div class="tm-dept-details-wrap">
                                <div class="tm-about tm-gray-bg">
                                    <h3 class="tm-about-title">أهلاً بكم في قسم <span>طب الأمراض العصبية</span></h3>
                                    <div class="tm-about-text" dir="rtl">
                                        <p>يعد قسم الأمراض العصبية في مستشفى العباسيين بمثابة نقطة الاستقبال لأكثر
                                            المصابين إصابة من جميع أنحاء البلاد ويعالج المرضى الذين يعانون من الدماغ
                                            والعمود الفقري.</p>
                                        <p>بالإضافة إلى كونه مركزًا للتميز، يهدف قسم الأعصاب إلى أن يكون رصيدًا
                                            للمجتمعات الوطنية والدولية.</p>
                                    </div>
                                    <div class="empty-space col-xs-b25"></div>
                                </div>
                            </div>
                        </div><!-- .col -->
                    </div>
                </div> <!-- .tabs_item -->
                <div class="tm-tabs-item">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="tm-dept-img"><img src="{{ asset('imgs/index/3.crutches.jpg') }}" alt=""></div>
                        </div><!-- .col -->
                        <div class="col-lg-6">
                            <div class="tm-dept-details-wrap">
                                <div class="tm-about tm-gray-bg">
                                    <h3 class="tm-about-title">أهلاً بكم في قسم <span>الركائز</span></h3>
                                    <div class="tm-about-text" dir="rtl">
                                        <p>من المهم أن تبدأ المشي بأسرع ما يمكن بعد الجراحة. لكنك ستحتاج إلى دعم للمشي
                                            أثناء شفاء ساقك. قد تكون مستشفى العباسيين اختيارًا جيدًا بعد إصابة الساق أو
                                            الجراحة إذا كنت بحاجة إلى القليل من المساعدة في تحقيق التوازن
                                            والاستقرار. </p>
                                        <p>العكازات مفيدة أيضًا عندما تكون ساقك ضعيفة أو مؤلمة قليلاً.</p>
                                    </div>
                                    <div class="empty-space col-xs-b25"></div>
                                </div>
                            </div>
                        </div><!-- .col -->
                    </div>
                </div> <!-- .tabs_item -->
                <div class="tm-tabs-item">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="tm-dept-img"><img src="{{ asset('imgs/index/4.cardiology.jpg') }}" alt=""></div>
                        </div><!-- .col -->
                        <div class="col-lg-6">
                            <div class="tm-dept-details-wrap">
                                <div class="tm-about tm-gray-bg">
                                    <h3 class="tm-about-title">أهلاً بكم في قسم <span>طب الأمراض القلبية</span></h3>
                                    <div class="tm-about-text" dir="rtl">
                                        <p>يُخدّم قسم أمراض القلب المرضى بشكل دقيق على مدار الساعة طوال أيام الأسبوع وهو
                                            المستشفى الوحيد في سوريا حيث يمكن إجراء جراحة رأب الأوعية الدموية في حالات
                                            الطوارئ على مدار الساعة.</p>
                                        <p>يملك قسم أمراض القلب فريق قوي ومتفاني مكون من عددٍ من أطباء أمراض القلب،
                                            ولديهم أكثر من 20 عامًا من الخبرة.</p>
                                    </div>
                                    <div class="empty-space col-xs-b25"></div>
                                </div>
                            </div>
                        </div><!-- .col -->
                    </div>
                </div> <!-- .tabs_item -->
                <div class="tm-tabs-item">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="tm-dept-img"><img src="{{ asset('imgs/index/5.pulmones.jpg') }}" alt=""></div>
                        </div><!-- .col -->
                        <div class="col-lg-6">
                            <div class="tm-dept-details-wrap">
                                <div class="tm-about tm-gray-bg">
                                    <h3 class="tm-about-title">أهلاً بكم في قسم <span>طب الأمراض الرئوية</span></h3>
                                    <div class="tm-about-text" dir="rtl">
                                        <p>منذ أكثر من 15 عامًا، ابتكرنا أول مستشفيات في سوريا تتخصص في علاج الرئة، حتى
                                            تشعر بالثقة عندما يكون أحد أفراد أسرتك تحت رعايتنا.</p>
                                        <p>اليوم، لا تزال خبرتنا في إدارة الأمراض الرئوية وتوفير علاج جيد تَعتمد على
                                            أحدث البروتوكولات. </p>
                                    </div>
                                    <div class="empty-space col-xs-b25"></div>
                                </div>
                            </div>
                        </div><!-- .col -->
                    </div>
                </div> <!-- .tabs_item -->
                <div class="tm-tabs-item">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="tm-dept-img"><img src="{{ asset('imgs/index/6.xray.jpg') }}" alt=""></div>
                        </div><!-- .col -->
                        <div class="col-lg-6">
                            <div class="tm-dept-details-wrap">
                                <div class="tm-about tm-gray-bg">
                                    <h3 class="tm-about-title">أهلاً بكم في قسم <span>الأشعة السينية</span></h3>
                                    <div class="tm-about-text" dir="rtl">
                                        <p>لدينا جهاز أشعة سينية عالي الجودة وتقنيتنا لها خبرة كبيرة. إذ نقدم تقرير
                                            الأشعة السينية في غضون ساعة واحدة.</p>
                                        <p>بعد تسليم تقرير الأشعة السينية، نقترح عليك الطبيب ذي الخبرة.</p>
                                    </div>
                                    <div class="empty-space col-xs-b25"></div>
                                </div>
                            </div>
                        </div><!-- .col -->
                    </div>
                </div> <!-- .tabs_item -->

            </div> <!-- .tm-tab-content -->
        </div> <!-- .tab -->
    </div>
    <div class="empty-space col-md-b100 col-xs-b70"></div>
</section>
<!-- End Department Section -->

<!-- Start Team Member -->
<section id="doctor">
    <div class="empty-space col-md-b100 col-xs-b70"></div>
    <div class="tm-section-heading text-center">
        <h2>أطباؤنا ذوو الخبرة</h2>
        <div class="tm-section-seperator"><span></span></div>
        <div class="empty-space col-md-b60 col-xs-b40"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tm-member-carousel owl-carousel tm-nam-tm-style1  tm-dots1">
                    <div class="tm-team-member">
                        <div class="tm-member-hover">
                            <a href="#" class="tm-member-thumb">
                                <img src="{{ asset('imgs/index/doctor-01.jpg') }}" alt="">
                            </a>
                            <div class="tm-member-social-btn-wrap">
                                <div class="tm-member-socila-btn">
                                    <a href="#" class="tm-social-btn white">
                                        <i class="fab fa-facebook-square"></i>
                                        <i class="fab fa-facebook-square"></i>
                                    </a>
                                </div>
                                <div class="tm-member-socila-btn">
                                    <a href="#" class="tm-social-btn white">
                                        <i class="fab fa-twitter-square"></i>
                                        <i class="fab fa-twitter-square"></i>
                                    </a>
                                </div>
                                <div class="tm-member-socila-btn">
                                    <a href="#" class="tm-social-btn white">
                                        <i class="fab fa-skype"></i>
                                        <i class="fab fa-skype"></i>
                                    </a>
                                </div>
                            </div><!-- .tm-member-social-btn-wrap -->
                        </div>
                        <div class="tm-member-meta tm-gray-bg text-center">
                            <h3 class="tm-member-name"><a href="#">د. فاتن فاتن</a>
                            </h3>
                            <span class="tm-member-speciality">طبيبة أمراض قلبية</span>
                        </div>
                    </div><!-- .tm-team-member -->
                    <div class="tm-team-member">
                        <div class="tm-member-hover">
                            <a href="#" class="tm-member-thumb">
                                <img src="{{ asset('imgs/index/doctor-02.jpg') }}" alt="">
                            </a>
                            <div class="tm-member-social-btn-wrap">
                                <div class="tm-member-socila-btn">
                                    <a href="#" class="tm-social-btn white">
                                        <i class="fab fa-facebook-square"></i>
                                        <i class="fab fa-facebook-square"></i>
                                    </a>
                                </div>
                                <div class="tm-member-socila-btn">
                                    <a href="#" class="tm-social-btn white">
                                        <i class="fab fa-twitter-square"></i>
                                        <i class="fab fa-twitter-square"></i>
                                    </a>
                                </div>
                                <div class="tm-member-socila-btn">
                                    <a href="#" class="tm-social-btn white">
                                        <i class="fab fa-skype"></i>
                                        <i class="fab fa-skype"></i>
                                    </a>
                                </div>
                            </div><!-- .tm-member-social-btn-wrap -->
                        </div>
                        <div class="tm-member-meta tm-gray-bg text-center">
                            <h3 class="tm-member-name"><a href="#">د. محمد محمد</a></h3>
                            <span class="tm-member-speciality">دكتور امراض نسائية</span>
                        </div>
                    </div><!-- .tm-team-member -->
                    <div class="tm-team-member">
                        <div class="tm-member-hover">
                            <a href="#" class="tm-member-thumb">
                                <img src="{{ asset('imgs/index/doctor-03.jpg') }}" alt="">
                            </a>
                            <div class="tm-member-social-btn-wrap">
                                <div class="tm-member-socila-btn">
                                    <a href="#" class="tm-social-btn white">
                                        <i class="fab fa-facebook-square"></i>
                                        <i class="fab fa-facebook-square"></i>
                                    </a>
                                </div>
                                <div class="tm-member-socila-btn">
                                    <a href="#" class="tm-social-btn white">
                                        <i class="fab fa-twitter-square"></i>
                                        <i class="fab fa-twitter-square"></i>
                                    </a>
                                </div>
                                <div class="tm-member-socila-btn">
                                    <a href="#" class="tm-social-btn white">
                                        <i class="fab fa-skype"></i>
                                        <i class="fab fa-skype"></i>
                                    </a>
                                </div>
                            </div><!-- .tm-member-social-btn-wrap -->
                        </div>
                        <div class="tm-member-meta tm-gray-bg text-center">
                            <h3 class="tm-member-name"><a href="#">د. حسن الحسن</a></h3>
                            <span class="tm-member-speciality">طبيب أمراض عصبية</span>
                        </div>
                    </div><!-- .tm-team-member -->
                    <div class="tm-team-member">
                        <div class="tm-member-hover">
                            <a href="#" class="tm-member-thumb">
                                <img src="{{ asset('imgs/index/doctor-04.jpg') }}" alt="">
                            </a>
                            <div class="tm-member-social-btn-wrap">
                                <div class="tm-member-socila-btn">
                                    <a href="#" class="tm-social-btn white">
                                        <i class="fab fa-facebook-square"></i>
                                        <i class="fab fa-facebook-square"></i>
                                    </a>
                                </div>
                                <div class="tm-member-socila-btn">
                                    <a href="#" class="tm-social-btn white">
                                        <i class="fab fa-twitter-square"></i>
                                        <i class="fab fa-twitter-square"></i>
                                    </a>
                                </div>
                                <div class="tm-member-socila-btn">
                                    <a href="#" class="tm-social-btn white">
                                        <i class="fab fa-skype"></i>
                                        <i class="fab fa-skype"></i>
                                    </a>
                                </div>
                            </div><!-- .tm-member-social-btn-wrap -->
                        </div>
                        <div class="tm-member-meta tm-gray-bg text-center">
                            <h3 class="tm-member-name"><a href="#">د. حسناء حسن</a></h3>
                            <span class="tm-member-speciality">طبيب تشخيص</span>
                        </div>
                    </div><!-- .tm-team-member -->
                    <div class="tm-team-member">
                        <div class="tm-member-hover">
                            <a href="#" class="tm-member-thumb">
                                <img src="{{ asset('imgs/index/doctor-02.jpg') }}" alt="">
                            </a>
                            <div class="tm-member-social-btn-wrap">
                                <div class="tm-member-socila-btn">
                                    <a href="#" class="tm-social-btn white">
                                        <i class="fab fa-facebook-square"></i>
                                        <i class="fab fa-facebook-square"></i>
                                    </a>
                                </div>
                                <div class="tm-member-socila-btn">
                                    <a href="#" class="tm-social-btn white">
                                        <i class="fab fa-twitter-square"></i>
                                        <i class="fab fa-twitter-square"></i>
                                    </a>
                                </div>
                                <div class="tm-member-socila-btn">
                                    <a href="#" class="tm-social-btn white">
                                        <i class="fab fa-skype"></i>
                                        <i class="fab fa-skype"></i>
                                    </a>
                                </div>
                            </div><!-- .tm-member-social-btn-wrap -->
                        </div>
                        <div class="tm-member-meta tm-gray-bg text-center">
                            <h3 class="tm-member-name"><a href="#">د. وليام وليام</a></h3>
                            <span class="tm-member-speciality">طبيب عظمية</span>
                        </div>
                    </div><!-- .tm-team-member -->
                </div><!-- .member-carousel -->
            </div><!-- .col -->
        </div>
    </div>
    <div class="empty-space col-md-b100 col-xs-b70"></div>
</section>
<!-- End Team Member -->

<!-- Start Before & After Section -->
<section class="tm-gray-bg">
    <div class="empty-space col-md-b100 col-xs-b70"></div>
    <div class="tm-section-heading text-center">
        <h2 dir="rtl">صور "قبل/بعد"</h2>
        <div class="tm-section-seperator"><span></span></div>
        <div class="empty-space col-md-b60 col-xs-b40"></div>
    </div>
    <div class="container">
        <div class="before-after-gallery-slider owl-carousel tm-nam-tm-style1">
            <div class="teeth-beforeafter">
                <img src="{{ asset('imgs/index/teeth-before-image.jpg') }}" alt="teeth before">
                <img src="{{ asset('imgs/index/teeth-after-image.jpg') }}" alt="teeth after">
            </div>
            <div class="teeth-beforeafter">
                <img src="{{ asset('imgs/index/face-before-image.jpg') }}" alt="teeth before">
                <img src="{{ asset('imgs/index/face-after-image.jpg') }}" alt="teeth after">
            </div>
            <div class="teeth-beforeafter">
                <img src="{{ asset('imgs/index/teeth-before-image.jpg') }}" alt="teeth before">
                <img src="{{ asset('imgs/index/teeth-after-image.jpg') }}" alt="teeth after">
            </div>
            <div class="teeth-beforeafter">
                <img src="{{ asset('imgs/index/face-before-image.jpg') }}" alt="teeth before">
                <img src="{{ asset('imgs/index/face-after-image.jpg') }}" alt="teeth after">
            </div>
        </div>
    </div>
    <div class="empty-space col-md-b100 col-xs-b70"></div>
</section>
<!-- End Before & After Section -->

<!-- Start Fun Fact Section -->
<section class="tm-fun-fact-wrap tm-bg">
    <div class="empty-space col-md-b100 col-xs-b70"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="tm-fun-fact text-center">
                    <i class="icofont icofont-briefcase-alt-2 wow fadeInDown" data-wow-delay="0.2s"
                       data-wow-duration="2s"></i>
                    <h2 class="tm-counter">25</h2>
                    <h3>سنة من الخبرة</h3>
                </div>
                <div class="empty-space col-xs-b30"></div>
            </div><!-- .col -->
            <div class="col-lg-3 col-md-6">
                <div class="tm-fun-fact text-center">
                    <i class="icofont icofont-emo-simple-smile wow fadeInDown" data-wow-delay="0.4s"
                       data-wow-duration="2s"></i>
                    <h2 class="tm-counter">2500</h2>
                    <h3>مريض مسرور</h3>
                </div>
                <div class="empty-space col-xs-b30"></div>
            </div><!-- .col -->
            <div class="col-lg-3 col-md-6">
                <div class="tm-fun-fact text-center">
                    <i class="icofont icofont-doctor wow fadeInDown" data-wow-delay="0.6s" data-wow-duration="2s"></i>
                    <h2 class="tm-counter">150</h2>
                    <h3>طبيب مختصّ</h3>
                </div>
                <div class="empty-space col-xs-b30"></div>
            </div><!-- .col -->
            <div class="col-lg-3 col-md-6">
                <div class="tm-fun-fact text-center">
                    <i class="icofont icofont-users-social wow fadeInDown" data-wow-delay="0.8s"
                       data-wow-duration="2s"></i>
                    <h2 class="tm-counter">250</h2>
                    <h3>شخص في طاقمنا</h3>
                </div>
                <div class="empty-space col-xs-b30"></div>
            </div><!-- .col -->
        </div>
    </div>
    <div class="empty-space col-lg-b70 col-xs-b40"></div>
</section>
<!-- End Fun Fact Section -->

<!-- Start Pricing Seciton -->
<section id="price">
    <div class="empty-space col-md-b100 col-xs-b70"></div>
    <div class="tm-section-heading text-center">
        <h2>التنبيهات</h2>
        <div class="tm-section-seperator"><span></span></div>
        <div class="empty-space col-md-b60 col-xs-b40"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tm-pricing-carousel owl-carousel tm-nam-tm-style1 tm-dots1">
                    @foreach($notifs as $notif)
                        <div class="tm-price-list tm-gray-bg">
                            <div class="tm-price">
                                <h3>تنبيه</h3>
                            </div>
                            <h2 class="tm-pricing-heading">{{$notif->title}}</h2>
                            <p>
                                {{$notif->body}}
                            </p>
                            <small>{{date("d/m/Y h:i:s a", strtotime($notif->created_at))}}</small>
                        </div><!-- .tm-price-list -->
                    @endforeach
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
    </div>
    <div class="empty-space col-md-b100 col-xs-b70"></div>
</section>
<!-- End Pricing Seciton -->


<!-- Start Testimonial Section -->
<section id="thank">
    <div class="empty-space col-md-b100 col-xs-b70"></div>
    <div class="tm-section-heading text-center">
        <h2>كلمة شكر</h2>
        <div class="tm-section-seperator"><span></span></div>
        <div class="empty-space col-md-b60 col-xs-b40"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="owl-carousel tm-testimonial tm-testimonial-1 tm-dots1">
                    @foreach ($thankMsgs as $thankMsg)
                        <div class="tm-single-testimonial">
                            <div class="tm-testimonial-text">
                                <p style="font-size: 15pt; direction: rtl;">{{$thankMsg->body}}
                                </p>
                                <small>{{date("d/m/Y", strtotime($thankMsg->created_at))}}</small>
                                <br/>
                                <div class="tm-testimonial-meta">
                                    <h5>إدارة مشفى العباسيّين</h5>
                                </div>
                            </div>
                        </div><!-- testimonail slide -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="empty-space col-md-b100 col-xs-b70"></div>
</section>
<!-- End Testimonial Section -->

<!-- Start Contact Section -->
<section id="contact">
    <div class="empty-space col-md-b100 col-xs-b70"></div>
    <div class="tm-section-heading text-center">
        <h2>تواصل معنا</h2>
        <div class="tm-section-seperator"><span></span></div>
        <div class="empty-space col-md-b60 col-xs-b40"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div id="tm-alert"></div>
                <form action="alert('Done')"
                      class="row tm-contact-form" method="post" id="contact-form">
                    <div class="col-lg-6">
                        <div class="tm-form-field">
                            <input type="text" id="name" name="name" required>
                            <label>الاسم الكامل</label>
                        </div>
                    </div><!-- .col -->
                    <div class="col-lg-6">
                        <div class="tm-form-field">
                            <input type="text" id="email" name="email" required>
                            <label>البريد الإلكتروني</label>
                        </div>
                    </div><!-- .col -->
                    <div class="col-lg-6">
                        <div class="tm-form-field">
                            <input type="text" id="subject" name="subject" required>
                            <label>الموضوع</label>
                        </div>
                    </div><!-- .col -->
                    <div class="col-lg-6">
                        <div class="tm-form-field">
                            <input type="text" id="phone" name="phone" required>
                            <label>الهاتف</label>
                        </div>
                    </div><!-- .col -->
                    <div class="col-lg-12">
                        <div class="tm-form-field">
                            <textarea cols="30" rows="10" id="msg" name="msg" required></textarea>
                            <label>اكتب رسالتك هنا..</label>
                        </div>
                    </div><!-- .col -->
                    <div class="col-lg-12">
                        <button class="tm-btn1" type="submit" id="submit" name="submit"><span>إرسال</span>
                        </button>
                        <div class="empty-space col-lg-b30"></div>
                    </div><!-- .col -->
                </form>
            </div><!-- .col -->
            <div class="col-lg-4">
                <div class="empty-space col-md-b0 col-xs-b40"></div>
                <div class="tm-contact-info">
                    <div class="tm-single-contact">
                        <i class="fa fa-map-marker"></i>
                        <h3>العنوان</h3>
                        <p>سوريا، دمشق، ساحة العباسيين</p>
                    </div>
                    <div class="empty-space col-xs-b25"></div>
                    <div class="tm-single-contact">
                        <i class="fa fa-phone"></i>
                        <h3>الهاتف</h3>
                        <p>011-1234567 <br>
                            011-1234568</p>
                    </div>
                    <div class="empty-space col-xs-b25"></div>
                    <div class="tm-single-contact">
                        <i class="fa fa-envelope"></i>
                        <h3>البريد الإلكتروني</h3>
                        <p>info@abbaseen.com</p>
                    </div>
                    <div class="empty-space col-xs-b25"></div>
                </div>
            </div><!-- .col -->
        </div>
    </div>
    <div class="empty-space col-md-b70 col-xs-b40"></div>
</section>
<!-- End Contact Section -->

<!-- Start Map Section -->
<div id="tm-map"></div>
<!-- End Map Section -->

<!-- Start Clients Section -->
<div class="tm-clients-wrap">
    <div class="empty-space col-md-b100 col-xs-b70"></div>
    <div class="container">
        <div class="tm-clients-curosor owl-carousel">
            <div class="tm-client"><img src="{{ asset('imgs/index/client-logo-01.png') }}" alt=""></div>
            <div class="tm-client"><img src="{{ asset('imgs/index/client-logo-02.png') }}" alt=""></div>
            <div class="tm-client"><img src="{{ asset('imgs/index/client-logo-03.png') }}" alt=""></div>
            <div class="tm-client"><img src="{{ asset('imgs/index/client-logo-04.png') }}" alt=""></div>
            <div class="tm-client"><img src="{{ asset('imgs/index/client-logo-05.png') }}" alt=""></div>
            <div class="tm-client"><img src="{{ asset('imgs/index/client-logo-06.png') }}" alt=""></div>
        </div>
    </div>
    <div class="empty-space col-md-b100 col-xs-b70"></div>
</div>
<!-- End Clients Section -->

<!-- Start Footer -->
<footer class="tm-overflow-hidden">
    <div class="tm-gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="tm-footer-social">
                        <h2>تابعنا</h2>
                        <div class="tm-footer-social-list">
                            <a href="#" class="tm-social-btn blue">
                                <i class="fab fa-facebook-square"></i>
                                <i class="fab fa-facebook-square"></i>
                            </a>
                            <a href="#" class="tm-social-btn blue">
                                <i class="fab fa-google-plus-square"></i>
                                <i class="fab fa-google-plus-square"></i>
                            </a>
                            <a href="#" class="tm-social-btn blue">
                                <i class="fab fa-twitter-square"></i>
                                <i class="fab fa-twitter-square"></i>
                            </a>
                            <a href="#" class="tm-social-btn blue">
                                <i class="fab fa-skype"></i>
                                <i class="fab fa-skype"></i>
                            </a>
                        </div>
                    </div>
                </div><!-- .col -->
            </div>
        </div>
    </div>
    <div class="tm-site-footer">
        <div class="container"><!-- row-md-reverce -->
            <div class="row row-sm-reverce">
                <div class="col-md-7 col-lg-8">
                    <p class="tm-copyright">جميع الحقوق محفوظة © 2018 مستشفى العباسيين في دمشق </p>
                </div><!-- .col -->
                <div class="col-md-5 col-lg-4">
                    <div class="tm-footer-hotline">
                        <div class="tm-footer-hotline-in">
                            <div class="tm-phone-icon"><i class="fa fa-mobile-alt"></i></div>
                            <h3>الخط الساخن</h3>
                            <p>011-1234567</p>
                        </div>
                    </div>
                </div><!-- .col -->
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->

<!-- Scroll Up -->
<div id='scrollup'></div>

<!-- Scripts -->
<script src="{{ asset('js/modernizr-3.5.0.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgwgIuDRkO7HlxvpWN-vPePnGVWss5r5g"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>

</html>