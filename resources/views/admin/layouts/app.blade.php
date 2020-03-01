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
<html direction="{{__('rtl')}}" dir="{{__('rtl')}}" style="direction: {{__('rtl')}}" lang="{{__('ar')}}">

<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>
    <base href="{{url('')}}">
    <title>{{$title??settings('title')}}</title>
    <meta name="description" content="{{settings('description')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="panel/assets/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>


    <!-- begin::Global Config(global config for global JS sciprts) -->


    <!--begin::Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>


    <!--end::Fonts -->

    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="panel/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css"/>

    <!--end::Page Vendors Styles -->

    <!--begin:: Global Mandatory Vendors -->
    <link href="panel/assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.rtl.css" rel="stylesheet"
          type="text/css"/>

    <!--end:: Global Mandatory Vendors -->

    <!--begin:: Global Optional Vendors -->
    <link href="panel/assets/vendors/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css"/>
    <link href="panel/assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet"
          type="text/css"/>
    <link href="panel/assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css"
          rel="stylesheet" type="text/css"/>
    <link href="panel/assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet"
          type="text/css"/>
    <link href="panel/assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet"
          type="text/css"/>
    <link href="panel/assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet"
          type="text/css"/>
    <link href="panel/assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet"
          type="text/css"/>
    <link href="panel/assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet"
          type="text/css"/>
    <link href="panel/assets/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css"/>
    <link href="panel/assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css"/>
    <link href="panel/assets/vendors/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css"/>
    <link href="panel/assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet"
          type="text/css"/>
    <link href="panel/assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet"
          type="text/css"/>
    <link href="panel/assets/vendors/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css"/>
    <link href="panel/assets/vendors/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css"/>
    <link href="panel/assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="panel/assets/vendors/general/animate.css/animate.css" rel="stylesheet" type="text/css"/>
    <link href="panel/assets/vendors/general/toastr/build/toastr.css" rel="stylesheet" type="text/css"/>
    <link href="panel/assets/vendors/general/morris.js/morris.css" rel="stylesheet" type="text/css"/>
    <link href="panel/assets/vendors/general/socicon/css/socicon.css" rel="stylesheet" type="text/css"/>

    <link href="panel/assets/vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css"/>
    <link href="panel/assets/vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css"/>
    <link href="panel/assets/vendors/custom/vendors/fontawesome5/css/all.min.css" rel="stylesheet" type="text/css"/>
    <link href="panel/assets/vendors/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css"/>
    <link href="panel/assets/vendors/custom/vendors/line-awesome/css/line-awesome.css" rel="stylesheet"/>

    <!--end:: Global Optional Vendors -->

@if(isRTL())
    <!--begin::Global Theme Styles(used by all pages) -->
        <link href="panel/assets/demo/default/base/style.bundle.rtl.min.css" rel="stylesheet" type="text/css"/>

        <!--end::Global Theme Styles -->

        <!--begin::Layout Skins(used by all pages) -->
        <link href="panel/assets/demo/default/skins/header/base/light.rtl.css" rel="stylesheet" type="text/css"/>
        <link href="panel/assets/demo/default/skins/header/menu/light.rtl.css" rel="stylesheet" type="text/css"/>
        <link href="panel/assets/demo/default/skins/brand/dark.rtl.css" rel="stylesheet" type="text/css"/>
        <link href="panel/assets/demo/default/skins/aside/dark.rtl.css" rel="stylesheet" type="text/css"/>
        {{--    <link rel="stylesheet" href="panel/css/site.css">--}}
    @else
    <!--begin::Global Theme Styles(used by all pages) -->
        <link href="panel/assets/demo/default/base/style.bundle.min.css" rel="stylesheet" type="text/css"/>

        <!--end::Global Theme Styles -->

        <!--begin::Layout Skins(used by all pages) -->
        <link href="panel/assets/demo/default/skins/header/base/light.css" rel="stylesheet" type="text/css"/>
        <link href="panel/assets/demo/default/skins/header/menu/light.css" rel="stylesheet" type="text/css"/>
        <link href="panel/assets/demo/default/skins/brand/dark.css" rel="stylesheet" type="text/css"/>
        <link href="panel/assets/demo/default/skins/aside/dark.css" rel="stylesheet" type="text/css"/>

    @endif

    <link href="panel/fonts/style.css" rel="stylesheet" type="text/css"/>

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="{{settings('icon')}}"/>

    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
    <style>
        label.error {
            color: red !important;
        }

        table .kt-checkbox {
            margin-bottom: 10px !important;
        }

        .note-editor.note-frame .panel-heading.note-toolbar {
            z-index: 9;
        }

        .sticky-fix .kt-portlet__head {
            position: fixed;
            top: 65px;
            height: 70px;
            left: 15px;
            min-height: 70px;
            -webkit-transition: left 0.3s, right 0.3s, height 0.3s;
            transition: left 0.3s, right 0.3s, height 0.3s;
            position: fixed;
            -webkit-box-shadow: 0px 1px 15px 1px rgba(69, 65, 78, 0.1);
            box-shadow: 0px 1px 15px 1px rgba(69, 65, 78, 0.1);
            z-index: 101;
            background: #fff;
        }

        .blah {
            width: 150px;
            height: 150px;
            display: block;
            border: 1px dashed #e5e5e5;
            cursor: pointer;

        }

        [type="file"] ~ label {
            content: '';
        }

        [type="file"] {
            display: none;
        }

        .dataTables_wrapper .child .dtr-details {
            display: block;
            width: 100%;
        }

        .dataTables_wrapper .child .dtr-details > li {
            display: block !important;
            width: 100%;
        }

        .dataTables_wrapper .child .dtr-details > li .dtr-title {
            width: 100%;
            display: block;
            border-bottom: none;
        }

        .dataTables_wrapper .child .dtr-details > li .dtr-data {
            display: block;
            width: 100%;
        }

        .dataTables_length, .dataTables_info {
            width: 200px;
            float: right;
        }

        .custom-select {
            width: 100px;
            margin-right: 15px;
        }

        #kt_table_1 tr {
            cursor: pointer;
        }

        @font-face {
            font-family: 'DIN Next LT Arabic Bold';
            font-style: Bold;
            font-weight: 400;
            src: url('panel/fonts/DIN_NEXT_ARABIC_BOLD.otf') format('otf')
        }

    </style>

</head>

<!-- end::Head -->

<!-- begin::Body -->
<body
    class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

<!-- begin:: Page -->

<!-- begin:: Header Mobile -->
<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
    <div class="kt-header-mobile__logo">
        <a href="/">
            <img alt="Logo" src="{{settings('logo')}}" style="    width: 100px;margin-right: 18px;"/>
        </a>
    </div>
    <div class="kt-header-mobile__toolbar">
        <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler">
            <span></span></button>
        <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i
                class="flaticon-more"></i></button>
    </div>
</div>

<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

        @include('admin.layouts.aside')

        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

            <!-- begin:: Header -->
            <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
                <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
                    <div id="kt_header_menu"
                         class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">

                        <ul class="kt-menu__nav ">


                            <li class="kt-menu__item"><a href="{{url('')}}" target="_blank" class="kt-menu__link ">

                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                         class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect id="bound" x="0" y="0" width="24" height="24"/>
                                            <polygon id="Combined-Shape" fill="#000000" opacity="0.3"
                                                     points="6 7 6 15 18 15 18 7"/>
                                            <path
                                                d="M11,19 L11,16 C11,15.4477153 11.4477153,15 12,15 C12.5522847,15 13,15.4477153 13,16 L13,19 L14.5,19 C14.7761424,19 15,19.2238576 15,19.5 C15,19.7761424 14.7761424,20 14.5,20 L9.5,20 C9.22385763,20 9,19.7761424 9,19.5 C9,19.2238576 9.22385763,19 9.5,19 L11,19 Z"
                                                id="Combined-Shape" fill="#000000" opacity="0.3"/>
                                            <path
                                                d="M6,7 L6,15 L18,15 L18,7 L6,7 Z M6,5 L18,5 C19.1045695,5 20,5.8954305 20,7 L20,15 C20,16.1045695 19.1045695,17 18,17 L6,17 C4.8954305,17 4,16.1045695 4,15 L4,7 C4,5.8954305 4.8954305,5 6,5 Z"
                                                id="Combined-Shape" fill="#000000" fill-rule="nonzero"/>
                                        </g>
                                    </svg>

                                    <span class="kt-menu__link-text">{{__('معاينة الموقع')}}</span>

                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- begin:: Header Menu -->
                <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i
                        class="la la-close"></i></button>
                <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">

                </div>

                <!-- end:: Header Menu -->

                <!-- begin:: Header Topbar -->
                <div class="kt-header__topbar">

                    <!--begin: Search -->

                {{--                    @include('admin.layouts.components.search')--}}
                <!--end: Search -->

                    @include('admin.layouts.components.notification')

                    @include('admin.layouts.components.user_bar')

                </div>

                <!-- end:: Header Topbar -->
            </div>

            <!-- end:: Header -->
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

                <!-- begin:: Subheader -->
                <div class="kt-subheader   kt-grid__item" id="kt_subheader">

                    <div class="kt-subheader__main">
                        <h3 class="kt-subheader__title">
                            {{__('الرئيسية')}} </h3>
                        <span class="kt-subheader__separator kt-hidden"></span>
                        <div class="kt-subheader__breadcrumbs">
                            <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                            <span class="kt-subheader__breadcrumbs-separator"></span>
                            <a href="javascript:;" class="kt-subheader__breadcrumbs-link">
                                {{$title??""}}</a>
                            <span class="kt-subheader__breadcrumbs-separator"></span>
                            <a href="" class="kt-subheader__breadcrumbs-link">
                                {{$subTitle??''}} </a>

                            <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
                        </div>
                    </div>


                    @if(isset($filter))

                        <div class="kt-subheader__toolbar">
                            <div class="kt-subheader__wrapper">
                                <a href="{{route('admin.dashboard.filter','today')}}"
                                   class="btn kt-subheader__btn-secondary {{request('type')=='today'?"active":""}}">اليوم</a>
                                <a href="{{route('admin.dashboard.filter','month')}}"
                                   class="btn kt-subheader__btn-secondary {{request('type')=='month'?"active":""}}">الشهر</a>
                                <a href="{{route('admin.dashboard.filter','year')}}"
                                   class="btn kt-subheader__btn-secondary {{request('type')=='year'?"active":""}}">السنة</a>
                                <a href="javascript:;" class="btn kt-subheader__btn-daterange"
                                   id="kt_dashboard_daterangepicker" data-toggle="kt-tooltip" title=""
                                   data-placement="left" data-original-title="Select dashboard daterange">
                                        <span class="kt-subheader__btn-daterange-title"
                                              id="kt_dashboard_daterangepicker_title">{{dilterDisplay($type)}}</span>&nbsp;

                                </a>
                                <div class="dropdown dropdown-inline" data-toggle="kt-tooltip" title=""
                                     data-placement="left" data-original-title="Quick actions">
                                    <a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             width="24px" height="24px"
                                             viewBox="0 0 24 24" version="1.1"
                                             class="kt-svg-icon kt-svg-icon--success kt-svg-icon--md">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon>
                                                <path
                                                    d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z"
                                                    id="Combined-Shape" fill="#000000" fill-rule="nonzero"
                                                    opacity="0.3"></path>
                                                <path
                                                    d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z"
                                                    id="Combined-Shape" fill="#000000"></path>
                                            </g>
                                        </svg>

                                        <!--<i class="flaticon2-plus"></i>-->
                                    </a>

                                </div>
                            </div>
                        </div>

                    @else

                    @endif
                </div>

                <!-- end:: Subheader -->
                <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
                    <div class="row">

                        <!-- begin:: Content -->
                    @yield('content')
                    <!-- end:: Content -->
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
                        <!--begin::Global Theme Bundle(used by all pages) -->
                        <script src="panel/assets/demo/default/base/scripts.bundle.min.js"
                                type="text/javascript"></script>

                        <!--end::Global Theme Bundle -->

                        <script src="panel/assets/vendors/custom/datatables/datatables.bundle.min.js"
                                type="text/javascript"></script>
                        @stack('headerjs')
                    </div>
                </div>
                <!-- begin:: Footer -->
                <div class="kt-footer kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop">
                    <div class="kt-footer__copyright">
                        {{settings('copyright')}}
                    </div>

                </div>

                <!-- end:: Footer -->
            </div>
        </div>
    </div>
</div>

<!-- end:: Page -->

{{--@include('admin.layouts.quick_panel')--}}

<!-- begin::Scrolltop -->
<div id="kt_scrolltop" class="kt-scrolltop">
    <i class="fa fa-arrow-up"></i>
</div>

<!-- end::Scrolltop -->


<style>
    .kt-header.kt-header--fixed {
        z-index: 700;
    }

    .toast-message {
        margin-right: 35px;
    }

    /*#kt_table_1 {*/
    /*    display: none;*/
    /*}*/
</style>
<!-- end::Global Config -->

<!--begin:: Global Mandatory Vendors -->
<script src="panel/assets/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
<script src="panel/assets/vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="panel/assets/vendors/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
<script src="panel/assets/vendors/general/moment/min/moment.min.js" type="text/javascript"></script>
<script src="panel/assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
<script src="panel/assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js"
        type="text/javascript"></script>
<script src="panel/assets/vendors/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
<script src="panel/assets/vendors/general/wnumb/wNumb.js" type="text/javascript"></script>

<!--end:: Global Mandatory Vendors -->


<!--begin:: Global Optional Vendors -->
<script src="panel/assets/vendors/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
<script src="panel/assets/vendors/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
<script src="panel/assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"
        type="text/javascript"></script>
<script src="panel/assets/vendors/custom/components/vendors/bootstrap-datepicker/init.js"
        type="text/javascript"></script>
<script src="panel/assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js"
        type="text/javascript"></script>
<script src="panel/assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js"
        type="text/javascript"></script>
<script src="panel/assets/vendors/custom/components/vendors/bootstrap-timepicker/init.js"
        type="text/javascript"></script>
<script src="panel/assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js"
        type="text/javascript"></script>
<script src="panel/assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js"
        type="text/javascript"></script>
<script src="panel/assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js"
        type="text/javascript"></script>
<script src="panel/assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js"
        type="text/javascript"></script>
<script src="panel/assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js"
        type="text/javascript"></script>
<script src="panel/assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js"
        type="text/javascript"></script>
<script src="panel/assets/vendors/custom/components/vendors/bootstrap-switch/init.js"
        type="text/javascript"></script>
<script src="panel/assets/vendors/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
<script src="panel/assets/vendors/general/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
<script src="panel/assets/vendors/general/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
<script src="panel/assets/vendors/general/handlebars/dist/handlebars.js" type="text/javascript"></script>
<script src="panel/assets/vendors/general/inputmask/dist/jquery.inputmask.bundle.js"
        type="text/javascript"></script>
<script src="panel/assets/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js"
        type="text/javascript"></script>
<script src="panel/assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js"
        type="text/javascript"></script>
<script src="panel/assets/vendors/general/nouislider/distribute/nouislider.js" type="text/javascript"></script>
<script src="panel/assets/vendors/general/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
<script src="panel/assets/vendors/general/autosize/dist/autosize.js" type="text/javascript"></script>
<script src="panel/assets/vendors/general/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
<script src="panel/assets/vendors/general/dropzone/dist/dropzone.js" type="text/javascript"></script>
<script src="panel/assets/vendors/general/summernote/dist/summernote.js" type="text/javascript"></script>
<script src="panel/assets/vendors/general/markdown/lib/markdown.js" type="text/javascript"></script>
<script src="panel/assets/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js"
        type="text/javascript"></script>
<script src="panel/assets/vendors/custom/components/vendors/bootstrap-markdown/init.js"
        type="text/javascript"></script>
<script src="panel/assets/vendors/general/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
<script src="panel/assets/vendors/custom/components/vendors/bootstrap-notify/init.js"
        type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>


<script src="panel/assets/vendors/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
<script src="panel/assets/vendors/custom/components/vendors/jquery-validation/init.js" type="text/javascript"></script>
<script src="panel/assets/vendors/general/toastr/build/toastr.min.js" type="text/javascript"></script>
<script src="panel/assets/vendors/general/raphael/raphael.js" type="text/javascript"></script>
<script src="panel/assets/vendors/general/morris.js/morris.js" type="text/javascript"></script>
<script src="panel/assets/vendors/general/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
<script src="panel/assets/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js"
        type="text/javascript"></script>
<script src="panel/assets/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js"
        type="text/javascript"></script>
<script src="panel/assets/vendors/general/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
<script src="panel/assets/vendors/general/counterup/jquery.counterup.js" type="text/javascript"></script>
<script src="panel/assets/vendors/general/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>

<script src="panel/assets/vendors/general/jquery.repeater/src/lib.js" type="text/javascript"></script>
<script src="panel/assets/vendors/general/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
<script src="panel/assets/vendors/general/jquery.repeater/src/repeater.js" type="text/javascript"></script>
<script src="panel/assets/vendors/general/dompurify/dist/purify.js" type="text/javascript"></script>
<script src="panel/assets/vendors/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
<script src="panel/assets/vendors/custom/components/vendors/sweetalert2/init.js" type="text/javascript"></script>


<!--end:: Global Optional Vendors -->


<!--begin::Page Vendors(used by this page) -->
<script src="panel/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM"
        type="text/javascript"></script>
<script src="panel/assets/vendors/custom/gmaps/gmaps.js" type="text/javascript"></script>

<!--end::Page Vendors -->


{{--<script src="panel/js/app.min.js"></script>--}}
<script src="panel/js/messages_ar.js"></script>
<script src="panel/js/custom.js"></script>


<!--begin::Page Scripts(used by this page) -->
{{--<script src="panel/assets/app/custom/general/dashboard.js" type="text/javascript"></script>--}}

<!--end::Page Scripts -->

<form action="" method="post" id="destroy-form">
    {{csrf_field()}}
    {{method_field('DELETE')}}
</form>
<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>

<!--begin::Global App Bundle(used by all pages) -->
<script src="panel/assets/app/bundle/app.bundle.js" type="text/javascript"></script>
<script src="panel/js/editor/editor.js"></script>
<link rel="stylesheet" href="panel/js/editor/editor.css">

<!--end::Global App Bundle -->

<script>

    $("body").on('click', '.destroy', function (e) {
        e.preventDefault();
        obj = $(this);

        swal.fire({
            title: "{{__('هل أنت متأكد؟')}}",
            text: "{{__('من حذف هذا العنصر بشكل نهائي')}}",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "{{__('نعم, احذف !')}}",
            cancelButtonText: "{{__('لا,الغاء !')}}",
            reverseButtons: !0
        }).then(function (e) {
            if (e.value) {

                obj.find('i').attr('class', 'fa fa-spin fa-spinner');
                obj.attr('disabled', true);

                $.ajax({
                    url: obj.attr('href'),
                    method: 'delete',
                    type: 'JSON'
                }).done(function (data) {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': data.csrf
                        }
                    });

                    if (data.status == 'success') {
                        toastr.success(data.msg);
                        datatable_table.ajax.reload(null, false);

                    } else {
                        toastr.error(data.msg);

                    }
                }).fail(function (data) {
                    ajaxFail(data);
                }).always(function () {
                    obj.find('i').attr('class', 'fa fa-times');
                    obj.attr('disabled', false);

                })
            }
        });
    });

    $("body").on('click', '.confirm', function (e) {
        e.preventDefault();
        obj = $(this);
        swal.fire({
            title: "{{__('هل أنت متأكد؟')}}",
            text: "{{__('هل انت متأكد من العملية')}}",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "{{__('نعم')}}",
            cancelButtonText: "{{__('لا,الغاء !')}}",
            reverseButtons: !0
        }).then(function (e) {
            if (e.value) {
                window.location = obj.attr('href');
            } else {
                obj = null;
            }
        })
    });
    $(".confirm-button").click(function (e) {
        e.preventDefault();
        // obj = $(this);
        if (!$('#action').val()) {
            swal.fire({
                title: "{{__('خطأ')}}",
                text: "{{__('الرجاء اختر الأمر المراد تنفيذه')}}",
                type: "warning",
            });
            return;
        }
        swal.fire({
            title: "{{__('هل أنت متأكد؟')}}",
            text: "{{__('هل انت متأكد من العملية')}}",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "{{__('نعم')}}",
            cancelButtonText: "{{__('لا,الغاء !')}}",
            reverseButtons: !0
        }).then(function (e) {
            if (e.value) {
                $(".confirmForm").submit();
            } else {
                obj = null;
            }
        })
    });


    $('#validate').validate();
    $('.select2').select2();
    $('.summernote').summernote({height: 150})

    $("[type='file']").change(function () {
        readURL(this, $(this));
    });

    function readURL(input, obj) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                obj.parent().find('.blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


    $('body').on('change', '.check-all', function () {
        $('.single-check').attr('checked', $(this).attr('checked'));
    });

</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-left",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "4000",
        "extendedTimeOut": "0",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };


    (function ($) {
        $.fn.datepicker.dates['ar'] = {
            days: ["الأحد", "الاثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة", "السبت", "الأحد"],
            daysShort: ["أحد", "اثنين", "ثلاثاء", "أربعاء", "خميس", "جمعة", "سبت", "أحد"],
            daysMin: ["أح", "إث", "ثل", "أر", "خم", "جم", "سب", "أح"],
            months: ["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"],
            monthsShort: ["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"],
            today: "هذا اليوم",
            rtl: {{isRTL()?1:0}}
        };
    }(jQuery));

    var status = {

        "Success": {'title': 'مفعل', 'class': ' kt-badge--success'},
        "Danger": {'title': 'غير مفعل', 'class': ' kt-badge--danger'},
    };

    $('.blah').click(function () {
        $(this).parent().find('input').click();
    });
    $('[type="file"]').attr('accept', 'image/*');

    function ajaxFail(data) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': data.csrf
            }
        });
        if (data.status == 422) {
            var html = '<ul style="    list-style: circle;">';
            responseJSON = JSON.parse(data.responseText);
            $.each(responseJSON.errors, function (index, value) {
                html += "<li style='font-size: 13px;text-align:right;padding-bottom: 5px'>" + value + "</li>";
            });
            html += "</ul";

            toastr.error('{{__('خطأ في البيانات المدخلة')}}');


        } else {
            toastr.error('{{__('خطأ غير معروف')}}');
        }
    }

    $('.ajaxForm').submit(function (e) {

        e.preventDefault();

        if (!$(this).valid()) {
            toastr.error('خطأ في البيانات المدخلة');
            return false;
        }

        obj = $(this);
        obj.find('.loader').show();
        obj.find('[type=submit]').attr('disabled', true);

        e.preventDefault();

        $.ajax({
            url: obj.attr('action'),
            method: obj.attr('method'),
            data: obj.serialize(),
            type: 'JSON'
        }).done(function (data) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': data.csrf
                }
            });

            if (data.status == 'success') {
                toastr.success(data.msg);
                obj.find('input').val('');

                $('#kt_portlet_tools_1').removeClass('kt-portlet--collapsed');
                datatable_table.ajax.reload(null, false);

            } else {
                toastr.error(data.msg);

            }
        }).fail(function (data) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': data.csrf
                }
            });
            if (data.status == 422) {
                var html = '<ul style="    list-style: circle;">';
                responseJSON = JSON.parse(data.responseText);
                $.each(responseJSON.errors, function (index, value) {
                    html += "<li style='font-size: 13px;text-align:right;padding-bottom: 5px'>" + value + "</li>";
                });
                html += "</ul";
                swal.fire('{{__('خطأ في البيانات المدخلة')}}', html, 'error');


            } else {
                toastr.error('{{__('خطأ غير معروف')}}');


            }
            //

        }).always(function () {
            obj.find('.loader').hide();
            obj.find('[type=submit]').attr('disabled', false);
        })

        return false;
    })

    $('body').on('click', '.ajaxUrl', function (e) {

        e.preventDefault();

        obj = $(this);
        obj.find('.loader').show();
        obj.find('[type=submit]').attr('disabled', true);

        e.preventDefault();
        $.ajax({
            url: obj.attr('href'),
            method: "GET",
            type: 'JSON'
        }).done(function (data) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': data.csrf
                }
            });

            if (data.status == 'success') {
                toastr.success(data.msg);

                datatable_table.ajax.reload(null, false);

            } else {
                toastr.error(data.msg);

            }
        }).fail(function (data) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': data.csrf
                }
            });
            if (data.status == 422) {
                var html = '<ul style="    list-style: circle;">';
                responseJSON = JSON.parse(data.responseText);
                $.each(responseJSON.errors, function (index, value) {
                    html += "<li style='font-size: 13px;text-align:right;padding-bottom: 5px'>" + value + "</li>";
                });
                html += "</ul";
                swal.fire('{{__('خطأ في البيانات المدخلة')}}', html, 'error');


            } else {
                toastr.error('{{__('خطأ غير معروف')}}');


            }
            //

        }).always(function () {
            obj.find('.loader').hide();
            obj.find('[type=submit]').attr('disabled', false);
        })

        return false;
    })


    $('.modal-form').click(function (e) {
        e.preventDefault();
        $('#validate-modal').attr('action', $(this).data('href'));
        $('#validate-modal').validate();
        $('#modal-title').text('اضافة');
        $('#modal-label').text($(this).data('label'));
        $('#modal-input').val();
        $('#modal-method').remove();
        $('#singleModal').modal('show');

    });
    $(document).on('click', '.modal-edit', function (e) {
        e.preventDefault();
        $('#validate-modal').attr('action', $(this).attr('href'));
        $('#validate-modal').validate();
        $('#modal-title').text('تعديل');
        $('#modal-label').text($(this).data('label'));
        $('#modal-input').val($(this).data('val'));
        $('#validate-modal').append('<input type="hidden" id="modal-method" name="_method" value="put"/>');
        $('#singleModal').modal('show');

    });


    $('body').on('click', '.changeStatus', function (e) {
        obj = $(this);

        $.ajax({
            url: 'admin/{{get_constant_route('controller')}}/' + obj.data('id') + "/change-status",
            data: 'status=' + (obj.is(':checked') ? "Published" : "draft"),
            method: "put",
        }).done(function (data) {
            if (data.status == 'success') {
                toastr.success('تم التعديل');
            }
            if (obj.is(":checked")) {
                obj.parent().next().text(data.msg);
                obj.parent().removeClass('kt-checkbox--danger');
                obj.parent().addClass('kt-checkbox--success');
            } else {
                obj.parent().removeClass('kt-checkbox--success');
                obj.parent().addClass('kt-checkbox--danger');
                obj.parent().next().text(data.msg);
            }
        }).fail(function (data) {
            ajaxFail(data);
        });
    });


    @if(session()->has('msg'))
    toastr.success('{{session()->get('msg')}}');
    @endif


    @if(session()->has('error1'))
    toastr.error('{{session()->get('error')}}');
        @endif

    var portlet = new KTPortlet('kt_portlet_tools_1');
    $('body').on('click', '.edit-btn,.btn-edit', function (e) {
        e.preventDefault();
        $('#id-inline-form').val($(this).data('id'));
        $('#name-inline-form').val($(this).data('name'));
        $('#kt_portlet_tools_1').removeClass('kt-portlet--collapsed');
    });

    setTimeout(function () {
        window.location.reload();
    }, 1000 * 60 * 30);
</script>

@stack('scripts')
</body>

<!-- end::Body -->
</html>
