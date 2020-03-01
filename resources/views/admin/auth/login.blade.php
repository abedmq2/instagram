<!DOCTYPE html>

<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 7
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html direction="{{__('rtl')}}" dir="{{__('rtl')}}" style="direction: {{__('rtl')}}"  lang="{{__('ar')}}">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{settings('title')}}</title>
    <base href="{{url('')}}">
    <meta name="description" content="Login control panel">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!--end::Fonts -->

    <!--begin::Page Custom Styles(used by this page) -->
    <link href="panel/assets/app/custom/login/login-v6.default.css" rel="stylesheet" type="text/css" />
    <link href="panel/fonts/style.css" rel="stylesheet" type="text/css" />

    <!--end::Page Custom Styles -->

    <!--begin:: Global Mandatory Vendors -->
    <link href="panel/assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />

    <!--end:: Global Mandatory Vendors -->


    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="panel/assets/demo/default/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles -->

    <link rel="shortcut icon" href="{{settings('icon')}}" />
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

<!-- begin:: Page -->
<div class="kt-grid kt-grid--ver kt-grid--root">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v6 kt-login--signin" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">
            <div class="kt-grid__item  kt-grid__item--order-tablet-and-mobile-2  kt-grid kt-grid--hor kt-login__aside" >
                <div class="kt-login__wrapper">
                    <div class="kt-login__container">
                        <div class="kt-login__body">
                            <div class="kt-login__logo" style="border-radius: 5px">
                                <a href="#">
                                    <img src="{{settings('logo_ft')}}" width="150px">
                                </a>
                            </div>
                            <div class="kt-login__signin">
                                <div class="kt-login__head">
                                    <h3 class="kt-login__title">{{__('تسجيل الدخول | لوحة التحكم')}}</h3>
                                </div>

                                <div>
                                    @if($errors->has('email'))
                                        <div class="alert alert-danger">{{$errors->first('email')}}
                                        </div>
                                    @endif

                                    @if(session()->has('error'))
                                        <div class="alert alert-danger">{{session('error')}}
                                        </div>
                                    @endif

                                </div>

                                <div class="kt-login__form">
                                    <form class="kt-form"action="{{route('admin.login')}}" method="post">
                                        @csrf()
                                        <div class="form-group">
                                            <input class="form-control " value="{{old('email')}}" required type="email"
                                                   placeholder="{{__('البريد الإلكتروني')}}" name="email" autocomplete="off">
                                        </div>

                                        <div class="form-group">
                                            <input class="form-control form-control-last" required minlength="6"
                                                   type="password" placeholder="{{__('كلمة المرور')}}" name="password">
                                        </div>
                                        <div class="kt-login__extra">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="remember"
                                                           id="remember" {{ old('remember') ? 'checked' : '' }} > {{__('تذكرني')}}
                                                    <span></span>
                                                </label>

                                        </div>
                                        <div class="kt-login__actions">
                                            <button id="kt_login_signin_submit"
                                                    class="btn btn-brand btn-pill btn-elevate"
                                                    style="background: #2EC6B7;border-color: #2EC6B7;">{{__('تسجيل الدخول')}}</button>
                                        </div>


                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="kt-grid__item kt-grid__item--fluid kt-grid__item--center kt-grid kt-grid--ver kt-login__content" style="background-image: url(panel/assets/media//bg/bg-4.jpg);">
                <div class="kt-login__section">
                    <div class="kt-login__block">
                        <h3 class="kt-login__title">{{settings('title')}}</h3>
                        <div class="kt-login__desc" style="width: 350px">
                           {{settings('description')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end:: Page -->

<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#5d78ff",
                "dark": "#282a3c",
                "light": "#ffffff",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
            }
        }
    };

</script>

<!-- end::Global Config -->

<!--begin:: Global Mandatory Vendors -->
<script src="panel/assets/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="panel/assets/vendors/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
<script src="panel/assets/vendors/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
<script src="panel/assets/vendors/custom/components/vendors/jquery-validation/init.js" type="text/javascript"></script>

<script src="panel/assets/vendors/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
<script src="panel/assets/vendors/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>

<!--begin::Global Theme Bundle(used by all pages) -->
<script src="panel/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<script>   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    setTimeout(function () {
        window.location.reload();
    },1000*60*30);
</script>
<!--begin::Page Scripts(used by this page) -->
<script src="panel/assets/app/custom/login/login-general.js" type="text/javascript"></script>

<!--end::Page Scripts -->

<!--begin::Global App Bundle(used by all pages) -->
<script src="panel/assets/app/bundle/app.bundle.js" type="text/javascript"></script>

<!--end::Global App Bundle -->
</body>

<!-- end::Body -->
</html>
