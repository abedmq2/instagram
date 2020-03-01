<!--begin: User Bar -->
<div class="kt-header__topbar-item kt-header__topbar-item--user">
    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
        <div class="kt-header__topbar-user">
            <span class="kt-header__topbar-welcome kt-hidden-mobile">{{__('مرحبا')}},</span>
            <span class="kt-header__topbar-username kt-hidden-mobile">{{auth('admin')->user()->name}}</span>
        {{--            <img class="kt-hidden" alt="Pic" src="{{auth('admin')->image}}" />--}}

        <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
            <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">{{auth('admin')->user()->name[0]}}</span>
        </div>
    </div>
    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

        <!--begin: Head -->
        <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x"
             style="background-image: url(panel/assets/media/misc/bg-1.jpg)">
            <div class="kt-user-card__avatar">
                <img class="kt-hidden" alt="Pic" src="panel/assets/media/users/300_25.jpg"/>

                <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">{{auth('admin')->user()->name[0]}}</span>
            </div>
            <div class="kt-user-card__name">
                {{auth('admin')->user()->name}}
            </div>

        </div>

        <!--end: Head -->

        <!--begin: Navigation -->
        <div class="kt-notification">
            <a href="{{route('admin.profile')}}" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-calendar-3 kt-font-success"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title kt-font-bold">
                        {{__('حسابي')}}
                    </div>
                    <div class="kt-notification__item-time">
                        {{__('تعديل بيانات الحساب')}}
                    </div>
                </div>
            </a>
            <div class="kt-notification__custom">
                <a href="{{route('admin.logout')}}" onclick="$('#logout-form').submit();return false" class="btn btn-label-brand btn-sm btn-bold logout">{{__('تسجيل الخروج')}}</a>
            </div>
        </div>

        <!--end: Navigation -->
    </div>
</div>

<!--end: User Bar -->
<style>
    .dropdown-menu.dropdown-menu-xl{
        right: auto!important;
    }
</style>
