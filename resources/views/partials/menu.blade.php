<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("admin.home") ? "active" : "" }}" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/permissions*") ? "active" : "" }} {{ request()->is("admin/roles*") ? "active" : "" }} {{ request()->is("admin/users*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('lang_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.langs.index") }}" class="nav-link {{ request()->is("admin/langs") || request()->is("admin/langs/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-globe">

                            </i>
                            <p>
                                {{ trans('cruds.lang.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('website_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/menus*") ? "menu-open" : "" }} {{ request()->is("admin/heroes*") ? "menu-open" : "" }} {{ request()->is("admin/brands*") ? "menu-open" : "" }} {{ request()->is("admin/options*") ? "menu-open" : "" }} {{ request()->is("admin/services*") ? "menu-open" : "" }} {{ request()->is("admin/slides*") ? "menu-open" : "" }} {{ request()->is("admin/cta*") ? "menu-open" : "" }} {{ request()->is("admin/contacts*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/menus*") ? "active" : "" }} {{ request()->is("admin/heroes*") ? "active" : "" }} {{ request()->is("admin/brands*") ? "active" : "" }} {{ request()->is("admin/options*") ? "active" : "" }} {{ request()->is("admin/services*") ? "active" : "" }} {{ request()->is("admin/slides*") ? "active" : "" }} {{ request()->is("admin/cta*") ? "active" : "" }} {{ request()->is("admin/contacts*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-sitemap">

                            </i>
                            <p>
                                {{ trans('cruds.website.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('menu_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.menus.index") }}" class="nav-link {{ request()->is("admin/menus") || request()->is("admin/menus/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-bars">

                                        </i>
                                        <p>
                                            {{ trans('cruds.menu.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('hero_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.heroes.index") }}" class="nav-link {{ request()->is("admin/heroes") || request()->is("admin/heroes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-slideshare">

                                        </i>
                                        <p>
                                            {{ trans('cruds.hero.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('brand_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.brands.index") }}" class="nav-link {{ request()->is("admin/brands") || request()->is("admin/brands/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-circle">

                                        </i>
                                        <p>
                                            {{ trans('cruds.brand.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('option_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.options.index") }}" class="nav-link {{ request()->is("admin/options") || request()->is("admin/options/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-concierge-bell">

                                        </i>
                                        <p>
                                            {{ trans('cruds.option.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('service_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.services.index") }}" class="nav-link {{ request()->is("admin/services") || request()->is("admin/services/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-concierge-bell">

                                        </i>
                                        <p>
                                            {{ trans('cruds.service.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('slide_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.slides.index") }}" class="nav-link {{ request()->is("admin/slides") || request()->is("admin/slides/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-slideshare">

                                        </i>
                                        <p>
                                            {{ trans('cruds.slide.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('ctum_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.cta.index") }}" class="nav-link {{ request()->is("admin/cta") || request()->is("admin/cta/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-bullhorn">

                                        </i>
                                        <p>
                                            {{ trans('cruds.ctum.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('contact_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.contacts.index") }}" class="nav-link {{ request()->is("admin/contacts") || request()->is("admin/contacts/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-address-card">

                                        </i>
                                        <p>
                                            {{ trans('cruds.contact.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="{{ route("admin.systemCalendar") }}" class="nav-link {{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "active" : "" }}">
                        <i class="fas fa-fw fa-calendar nav-icon">

                        </i>
                        <p>
                            {{ trans('global.systemCalendar') }}
                        </p>
                    </a>
                </li>
                @php($unread = \App\Models\QaTopic::unreadCount())
                    <li class="nav-item">
                        <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "active" : "" }} nav-link">
                            <i class="fa-fw fa fa-envelope nav-icon">

                            </i>
                            <p>{{ trans('global.messages') }}</p>
                            @if($unread > 0)
                                <strong>( {{ $unread }} )</strong>
                            @endif

                        </a>
                    </li>
                    @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                        @can('profile_password_edit')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                    <i class="fa-fw fas fa-key nav-icon">
                                    </i>
                                    <p>
                                        {{ trans('global.change_password') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                    @endif
                    <li class="nav-item">
                        <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                            <p>
                                <i class="fas fa-fw fa-sign-out-alt nav-icon">

                                </i>
                                <p>{{ trans('global.logout') }}</p>
                            </p>
                        </a>
                    </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>