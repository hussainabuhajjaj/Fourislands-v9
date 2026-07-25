<div id="kt_header" class="kt-header kt-grid__item kt-header--fixed">

    <div class="kt-header__topbar">
        <div class="kt-header__topbar-item kt-header__topbar-item--user ml-auto">
            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                <div class="kt-header__topbar-user">
                    <span class="kt-header__topbar-welcome kt-hidden-mobile">مرحبا,</span>
                    <span class="kt-header__topbar-username kt-hidden-mobile">{{ auth()->user()->name }}</span>
                    <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">
                        <img src="{{ asset('panelAssets/media/users/default.jpg') }}" alt="">
                    </span>
                </div>
            </div>
            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl dropdown-menu-right-align">

                <div class="kt-notification">
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title kt-font-bold">
                                الملف الشخصي
                            </div>
                        </div>
                    </a>

                    <div class="kt-notification__custom kt-space-between">
                        <a href="{{ route('panel.logout') }}" class="btn btn-label btn-sm btn-bold">تسجيل الخروج</a>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>