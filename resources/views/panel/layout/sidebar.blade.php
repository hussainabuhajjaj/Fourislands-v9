<div class="kt-aside kt-aside--fixed kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

    <div class="kt-aside__brand kt-grid__item" id="kt_aside_brand">
        <div class="kt-aside__brand-logo">
            <a href="{{ route('panel.index') }}">
                <h4 class="kt-aside__brand-full">{{ getSetting('site_name') }}</h4>
                <h4 class="kt-aside__brand-short">{{ substr(getSetting('site_name') ?: config('app.name', 'F'), 0, 1) }}</h4>
            </a>
        </div>
        <div class="kt-aside__brand-tools">
            <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>
        </div>
    </div>

    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="kt-aside-menu" data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
            <ul class="kt-menu__nav">

                <li class="kt-menu__section">
                    <h4 class="kt-menu__section-text">@lang('Panel Users')</h4>
                </li>

                <li class="kt-menu__item" aria-haspopup="true">
                    <a href="{{ route('panel.index') }}" class="kt-menu__link">
                        <i class="kt-menu__link-icon fa fa-home"></i>
                        <span class="kt-menu__link-text">dashboard</span>
                    </a>
                </li>

                @canany(['show_admins' , 'add_admins'])
                <li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon"><i class="fa fa-user-shield"></i></span>
                        <span class="kt-menu__link-text">Admins</span>
                        <i class="kt-menu__ver-arrow fa fa-chevron-down"></i>
                    </a>
                    <div class="kt-menu__submenu">
                        <ul class="kt-menu__subnav">
                            @can('show_admins')
                                <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('panel.admins.index') }}" class="kt-menu__link"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">All</span></a></li>
                            @endcan
                            @can('add_admins')
                                <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('panel.admins.create') }}" class="kt-menu__link"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add</span></a></li>
                            @endcan
                        </ul>
                    </div>
                </li>
                @endcanany

                @canany(['show_promotional-emails' , 'add_promotional-emails'])
                <li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon"><i class="fa fa-envelope-open-text"></i></span>
                        <span class="kt-menu__link-text">Promotional Emails</span>
                        <i class="kt-menu__ver-arrow fa fa-chevron-down"></i>
                    </a>
                    <div class="kt-menu__submenu">
                        <ul class="kt-menu__subnav">
                            @can('show_promotional-emails')
                                <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('panel.promotional-emails.index') }}" class="kt-menu__link"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Inbox</span></a></li>
                            @endcan
                            @can('add_promotional-emails')
                                <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('panel.promotional-emails.create') }}" class="kt-menu__link"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Send</span></a></li>
                            @endcan
                        </ul>
                    </div>
                </li>
                @endcanany

                @can('add_roles')
                    <li class="kt-menu__item" aria-haspopup="true">
                        <a href="{{ route('panel.permission.index') }}" class="kt-menu__link">
                            <i class="kt-menu__link-icon fa fa-lock"></i>
                            <span class="kt-menu__link-text">Permissions</span>
                        </a>
                    </li>
                @endcan

                @canany(['show_users' , 'add_users'])
                    <li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                        <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                            <span class="kt-menu__link-icon"><i class="fa fa-users"></i></span>
                            <span class="kt-menu__link-text">Users</span>
                            <i class="kt-menu__ver-arrow fa fa-chevron-down"></i>
                        </a>
                        <div class="kt-menu__submenu">
                            <ul class="kt-menu__subnav">
                                @can('show_users')
                                    <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('panel.users.index') }}" class="kt-menu__link"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">All</span></a></li>
                                @endcan
                                @can('add_users')
                                    <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('panel.users.create') }}" class="kt-menu__link"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add</span></a></li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcanany

                @canany(['show_products' , 'add_products'])
                    <li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                        <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                            <span class="kt-menu__link-icon"><i class="fa fa-cube"></i></span>
                            <span class="kt-menu__link-text">products</span>
                            <i class="kt-menu__ver-arrow fa fa-chevron-down"></i>
                        </a>
                        <div class="kt-menu__submenu">
                            <ul class="kt-menu__subnav">
                                @can('show_products')
                                    <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('panel.products.index') }}" class="kt-menu__link"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">All</span></a></li>
                                @endcan
                                @can('add_products')
                                    <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('panel.products.create') }}" class="kt-menu__link"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add</span></a></li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcanany

                @canany(['show_sliders' , 'add_sliders'])
                    <li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                        <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                            <span class="kt-menu__link-icon"><i class="fa fa-images"></i></span>
                            <span class="kt-menu__link-text">@lang('Slider')</span>
                            <i class="kt-menu__ver-arrow fa fa-chevron-down"></i>
                        </a>
                        <div class="kt-menu__submenu">
                            <ul class="kt-menu__subnav">
                                @can('add_sliders')
                                    <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('panel.sliders.index') }}" class="kt-menu__link"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">@lang('All')</span></a></li>
                                @endcan
                                @can('show_sliders')
                                    <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('panel.sliders.create') }}" class="kt-menu__link"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">@lang('Add')</span></a></li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcanany

                @canany(['show_services' , 'add_services'])
                    <li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                        <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                            <span class="kt-menu__link-icon"><i class="fa fa-concierge-bell"></i></span>
                            <span class="kt-menu__link-text">services</span>
                            <i class="kt-menu__ver-arrow fa fa-chevron-down"></i>
                        </a>
                        <div class="kt-menu__submenu">
                            <ul class="kt-menu__subnav">
                                @can('show_services')
                                    <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('panel.services.index') }}" class="kt-menu__link"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">All</span></a></li>
                                @endcan
                                @can('add_services')
                                    <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('panel.services.create') }}" class="kt-menu__link"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add</span></a></li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcanany

                @canany(['show_addresses' , 'add_addresses'])
                    <li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                        <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                            <span class="kt-menu__link-icon"><i class="fa fa-map-marked-alt"></i></span>
                            <span class="kt-menu__link-text">Addresses</span>
                            <i class="kt-menu__ver-arrow fa fa-chevron-down"></i>
                        </a>
                        <div class="kt-menu__submenu">
                            <ul class="kt-menu__subnav">
                                @can('show_addresses')
                                    <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('panel.addresses.index') }}" class="kt-menu__link"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">All</span></a></li>
                                @endcan
                                @can('add_addresses')
                                    <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('panel.addresses.create') }}" class="kt-menu__link"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add</span></a></li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcanany

                @canany(['show_partners' , 'add_partners'])
                    <li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                        <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                            <span class="kt-menu__link-icon"><i class="fa fa-handshake"></i></span>
                            <span class="kt-menu__link-text">Partners & Clients</span>
                            <i class="kt-menu__ver-arrow fa fa-chevron-down"></i>
                        </a>
                        <div class="kt-menu__submenu">
                            <ul class="kt-menu__subnav">
                                @can('show_partners')
                                    <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('panel.partners.index') }}" class="kt-menu__link"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">All</span></a></li>
                                @endcan
                                @can('add_partners')
                                    <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('panel.partners.create') }}" class="kt-menu__link"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add</span></a></li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcanany

                <li class="kt-menu__section">
                    <h4 class="kt-menu__section-text">Content</h4>
                </li>

                @can('manage_faqs')
                    <li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                        <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                            <span class="kt-menu__link-icon"><i class="fa fa-question-circle"></i></span>
                            <span class="kt-menu__link-text">FAQ</span>
                            <i class="kt-menu__ver-arrow fa fa-chevron-down"></i>
                        </a>
                        <div class="kt-menu__submenu">
                            <ul class="kt-menu__subnav">
                                <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('panel.faq.index') }}" class="kt-menu__link"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">All</span></a></li>
                                <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('panel.faq.create') }}" class="kt-menu__link"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add</span></a></li>
                            </ul>
                        </div>
                    </li>
                @endcan

                @canany(['show_testimonials', 'add_testimonials'])
                    <li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                        <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                            <span class="kt-menu__link-icon"><i class="fa fa-star"></i></span>
                            <span class="kt-menu__link-text">Testimonials</span>
                            <i class="kt-menu__ver-arrow fa fa-chevron-down"></i>
                        </a>
                        <div class="kt-menu__submenu">
                            <ul class="kt-menu__subnav">
                                @can('show_testimonials')
                                    <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('panel.testimonials.index') }}" class="kt-menu__link"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">All</span></a></li>
                                @endcan
                                @can('add_testimonials')
                                    <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('panel.testimonials.create') }}" class="kt-menu__link"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add</span></a></li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcanany

                @canany(['show_posts', 'add_posts'])
                    <li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                        <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                            <span class="kt-menu__link-icon"><i class="fa fa-newspaper"></i></span>
                            <span class="kt-menu__link-text">Posts</span>
                            <i class="kt-menu__ver-arrow fa fa-chevron-down"></i>
                        </a>
                        <div class="kt-menu__submenu">
                            <ul class="kt-menu__subnav">
                                @can('show_posts')
                                    <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('panel.posts.index') }}" class="kt-menu__link"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">All</span></a></li>
                                @endcan
                                @can('add_posts')
                                    <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('panel.posts.create') }}" class="kt-menu__link"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add</span></a></li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcanany

                @canany(['show_categories', 'add_categories'])
                    <li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                        <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                            <span class="kt-menu__link-icon"><i class="fa fa-tags"></i></span>
                            <span class="kt-menu__link-text">Categories</span>
                            <i class="kt-menu__ver-arrow fa fa-chevron-down"></i>
                        </a>
                        <div class="kt-menu__submenu">
                            <ul class="kt-menu__subnav">
                                @can('show_categories')
                                    <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('panel.categories.index') }}" class="kt-menu__link"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">All</span></a></li>
                                @endcan
                                @can('add_categories')
                                    <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('panel.categories.create') }}" class="kt-menu__link"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add</span></a></li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcanany

                @can('manage_pages')
                    <li class="kt-menu__section">
                        <h4 class="kt-menu__section-text">Site Pages</h4>
                    </li>

                    <li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                        <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                            <span class="kt-menu__link-icon"><i class="fa fa-file"></i></span>
                            <span class="kt-menu__link-text">Site Pages</span>
                            <i class="kt-menu__ver-arrow fa fa-chevron-down"></i>
                        </a>
                        <div class="kt-menu__submenu">
                            <ul class="kt-menu__subnav">
                                <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('panel.pages.create') }}" class="kt-menu__link"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add Page</span></a></li>
                                <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('panel.pages.index') }}" class="kt-menu__link"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">All Pages</span></a></li>
                            </ul>
                        </div>
                    </li>
                @endcan

                @can('show_contacts')
                <li class="kt-menu__section">
                    <h4 class="kt-menu__section-text">Inbox</h4>
                </li>

                <li class="kt-menu__item" aria-haspopup="true">
                    <a href="{{ route('panel.contacts.index') }}" class="kt-menu__link">
                        <i class="kt-menu__link-icon fa fa-inbox"></i>
                        <span class="kt-menu__link-text">Inbox</span>
                        <span class="badge badge-primary badge-pill">{{$contacts_count ?? ''}}</span>
                    </a>
                </li>
                @endcan

                @canany(['show_quote-requests', 'show_subscribers'])
                <li class="kt-menu__section">
                    <h4 class="kt-menu__section-text">Inquiries</h4>
                </li>

                @can('show_quote-requests')
                    <li class="kt-menu__item" aria-haspopup="true">
                        <a href="{{ route('panel.quote-requests.index') }}" class="kt-menu__link">
                            <i class="kt-menu__link-icon fa fa-file-invoice"></i>
                            <span class="kt-menu__link-text">Quote Requests</span>
                        </a>
                    </li>
                @endcan

                @can('show_subscribers')
                    <li class="kt-menu__item" aria-haspopup="true">
                        <a href="{{ route('panel.subscribers.index') }}" class="kt-menu__link">
                            <i class="kt-menu__link-icon fa fa-users"></i>
                            <span class="kt-menu__link-text">Subscribers</span>
                        </a>
                    </li>
                @endcan
                @endcanany

                @can('show_settings')
                <li class="kt-menu__section">
                    <h4 class="kt-menu__section-text">WebSite Page Settings</h4>
                </li>

                <li class="kt-menu__item" aria-haspopup="true">
                    <a href="{{ route('panel.settings.index') }}" class="kt-menu__link">
                        <i class="kt-menu__link-icon fa fa-cogs"></i>
                        <span class="kt-menu__link-text">Settings</span>
                    </a>
                </li>
                @endcan

            </ul>
        </div>
    </div>

</div>
