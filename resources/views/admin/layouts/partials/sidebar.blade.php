<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="#">


                                     <h2 class="brand-text"><img src="img/logo.png" alt="" class="img-fluid"></h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                        class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content overflow-hidden">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item {{ request()->routeIs('admin.dashboard*') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('main') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class="menu-title text-truncate" data-i18n="dashboard">
                          Dashboard
                        </span>
                </a>
            </li>


{{--            @canany(['view-role', 'view-admin'])--}}
{{--                <li class="nav-item has-sub @if (request()->is(['admin/roles*', 'admin/admins*'])) sidebar-group-active open @endif">--}}
{{--                    <a href="#" class="d-flex align-items-center">--}}
{{--                        <i class="fas fa-user-circle"></i>--}}
{{--                        <span class="menu-title text-truncate">--}}
{{--                            {{ trans_choice('labels.models.account', 2) }}--}}
{{--                        </span>--}}
{{--                    </a>--}}

{{--                    <ul class="menu-content">--}}

{{--                        @can('view-admin')--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{ route('admin.admins.index') }}"--}}
{{--                                   class="nav-link {{ request()->routeIs('admin.admins*') ? 'active' : '' }}"--}}
{{--                                   data-link="/admin/admins">--}}
{{--                                    <i class="fas fa-users-cog"></i>--}}
{{--                                    <span--}}
{{--                                        class="menu-title text-truncate">{{ trans_choice('labels.models.admin', 2) }}</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endcan--}}

{{--                        @can('view-role')--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{ route('admin.roles.index') }}" data-link="/admin/roles"--}}
{{--                                   class="nav-link {{ request()->routeIs('admin.roles*') ? 'active' : '' }} ">--}}
{{--                                    <i class="fas fa-user-tag"></i>--}}
{{--                                    <span--}}
{{--                                        class="menu-title text-truncate">{{ trans_choice('labels.models.role', 3) }}</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endcan--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--            @endcanany--}}

{{--            @can('view-admin-notification')--}}
{{--                <li class=" nav-item {{ request()->routeIs('admin.notifications*') ? 'active' : '' }}">--}}
{{--                    <a class="d-flex align-items-center" href="{{ route('admin.notifications.index') }}">--}}

{{--                        <i class="fas fa-bell"></i>--}}
{{--                        <span class="menu-title text-truncate">--}}
{{--                            {{ trans_choice('labels.models.notification', 2) }}--}}
{{--                        </span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endcan--}}

{{--            @can('view-section')--}}
{{--                <li class=" nav-item {{ request()->routeIs('admin.sections*') ? 'active' : '' }}">--}}
{{--                    <a class="d-flex align-items-center" href="{{ route('admin.sections.index') }}">--}}

{{--                        <i class="fas fa-flag"></i>--}}
{{--                        <span class="menu-title text-truncate">--}}
{{--                            {{ trans_choice('labels.models.section', 2) }}--}}
{{--                        </span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endcan--}}

{{--            @can('view-category')--}}
{{--                <li class=" nav-item {{ request()->routeIs('admin.categories*') ? 'active' : '' }}">--}}
{{--                    <a class="d-flex align-items-center" href="{{ route('admin.categories.index') }}">--}}

{{--                        <i class="fas fa-check-double "></i>--}}
{{--                        <span class="menu-title text-truncate">--}}
{{--                        {{ trans_choice('labels.models.category', 2) }}--}}
{{--                    </span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endcan--}}

{{--            @can('view-paragraph')--}}
{{--                <li class=" nav-item {{ request()->routeIs('admin.paragraphs*') ? 'active' : '' }}">--}}
{{--                    <a class="d-flex align-items-center" href="{{ route('admin.paragraphs.index') }}">--}}

{{--                        <i class="fas fa-paragraph font-medium-5"></i>--}}
{{--                        <span class="menu-title text-truncate">--}}
{{--                        {{ trans_choice('labels.models.paragraph', 2) }}--}}
{{--                    </span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endcan--}}

{{--            @can('view-section-keyword')--}}
{{--            <li class=" nav-item {{ request()->routeIs('admin.photos*') ? 'active' : '' }}">--}}
{{--                <a class="d-flex align-items-center" href="{{ route('admin.section_keywords.index') }}">--}}
{{--                    <i class="fas fa-file-word"></i>--}}
{{--                    <span class="menu-title text-truncate">--}}
{{--                       {{   __('labels.models.keywords') }}--}}
{{--                    </span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            @endcan--}}

{{--            @can('view-shared-backgrounds')--}}
{{--            <li class=" nav-item {{ request()->routeIs('admin.photos*') ? 'active' : '' }}">--}}
{{--                <a class="d-flex align-items-center" href="{{ route('admin.shared_backgrounds.index') }}">--}}
{{--                    <i class="fas fa-image"></i>--}}
{{--                    <span class="menu-title text-truncate">--}}
{{--                        {{__ ('labels.models.shared_backgrounds') }}--}}
{{--                    </span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            @endcan--}}

{{--            @can('view-language')--}}
{{--                <li class=" nav-item {{ request()->routeIs('admin.languages*') ? 'active' : '' }}">--}}
{{--                    <a class="d-flex align-items-center" href="{{ route('admin.languages.index') }}">--}}
{{--                        <i class="fas fa-language"></i>--}}
{{--                        <span class="menu-title text-truncate">--}}
{{--                        {{ trans_choice('labels.models.language', 2) }}--}}
{{--                    </span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endcan--}}


            <li class="nav-item has-sub @if (request()->is(['admin/main*', 'admin/details*'])) sidebar-group-active open @endif">
                    <a href="#" class="d-flex align-items-center">
                        <i class="fas fa-info"></i>
                        <span class="menu-title text-truncate">
                            About Us
                        </span>
                    </a>

                    <ul class="menu-content">

                            <li class="nav-item">
                                <a href="{{ route('admin.main.index') }}"
                                   class="nav-link {{ request()->routeIs('admin.main*') ? 'active' : '' }}"
                                   data-link="/admin/admins">
                                    <i class="fas fa-users-cog"></i>
                                    <span
                                        class="menu-title text-truncate">Main</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.details.index') }}" data-link="/admin/roles"
                                   class="nav-link {{ request()->routeIs('admin.details*') ? 'active' : '' }} ">
                                    <i class="fas fa-user-tag"></i>
                                    <span class="menu-title text-truncate">
                                        Details
                                    </span>
                                </a>
                            </li>
                    </ul>

            </li>

            <li class="nav-item has-sub @if (request()->is(['admin/app*', 'admin/WEB*'])) sidebar-group-active open @endif">
                    <a href="#" class="d-flex align-items-center">
                        <i class="fas fa-laptop"></i>
                        <span class="menu-title text-truncate">
                            Our Portfolio
                        </span>
                    </a>

                    <ul class="menu-content">


                            <li class="nav-item">
                                <a href="{{ route('admin.app.index') }}"
                                   class="nav-link {{ request()->routeIs('admin.app*') ? 'active' : '' }}"
                                   data-link="/admin/admins">
                                    <i class="fas fa-mobile-alt"></i>
                                    <span
                                        class="menu-title text-truncate">Mobile</span>
                                </a>
                            </li>



                            <li class="nav-item">
                                <a href="{{ route('admin.WEB.index') }}" data-link="/admin/roles"
                                   class="nav-link {{ request()->routeIs('admin.WEB*') ? 'active' : '' }} ">
                                    <i class="fas fa-laptop-code"></i>
                                    <span class="menu-title text-truncate">
                                        web
                                    </span>
                                </a>
                            </li>
                    </ul>
            </li>



            <li class=" nav-item">
                    <a class="d-flex align-items-center" href="{{ route('admin.servces.index') }}">

                        <i class="fas fa-server"></i>
                        <span class="menu-title text-truncate">
                      Services
                    </span>
                    </a>
            </li>



            <li class=" nav-item {{ request()->routeIs('admin.team*') ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{ route('admin.team.index') }}">
                        <i class="fas fa-users"></i>
                        <span class="menu-title text-truncate">
                        Team
                    </span>
                    </a>
            </li>


            <li class=" nav-item {{ request()->routeIs('admin.contact*') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('admin.contact.index') }}">
                    <i class="fas fa-phone-alt"></i>
                    <span class="menu-title text-truncate">
                        Cotact Us
                    </span>
                </a>
            </li>

            <li class=" nav-item {{ request()->routeIs('admin.client*') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('admin.client.index') }}">
                    <i class="fas fa-user-check"></i>
                    <span class="menu-title text-truncate">
                       Our Clients
                    </span>
                </a>
            </li>


            <li class="nav-item has-sub @if (request()->is(['admin/userfeed*', 'admin/adminfeed*'])) sidebar-group-active open @endif">
                <a href="#" class="d-flex align-items-center">
                    <i class="fas fa-envelope"></i>
                    <span class="menu-title text-truncate">
                           Feedbak
                        </span>
                </a>

                <ul class="menu-content">

                    <li class="nav-item">
                        <a href="{{ route('admin.userfeed.index') }}"
                           class="nav-link {{ request()->routeIs('admin.main*') ? 'active' : '' }}"
                           data-link="/admin/admins">
                            <i class="fas fa-users-cog"></i>
                            <span
                                class="menu-title text-truncate">User</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.adminfeed.index') }}" data-link="/admin/roles"
                           class="nav-link {{ request()->routeIs('admin.details*') ? 'active' : '' }} ">
                            <i class="fas fa-user-tag"></i>
                            <span class="menu-title text-truncate">
                                        Admin
                                    </span>
                        </a>
                    </li>
                </ul>

            </li>


            </ul>
         </div>
    </div>
