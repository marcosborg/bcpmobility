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
                    <li class="nav-item has-treeview {{ request()->is("admin/menus*") ? "menu-open" : "" }} {{ request()->is("admin/heroes*") ? "menu-open" : "" }} {{ request()->is("admin/brands*") ? "menu-open" : "" }} {{ request()->is("admin/options*") ? "menu-open" : "" }} {{ request()->is("admin/abouts*") ? "menu-open" : "" }} {{ request()->is("admin/slides*") ? "menu-open" : "" }} {{ request()->is("admin/cta*") ? "menu-open" : "" }} {{ request()->is("admin/contacts*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/menus*") ? "active" : "" }} {{ request()->is("admin/heroes*") ? "active" : "" }} {{ request()->is("admin/brands*") ? "active" : "" }} {{ request()->is("admin/options*") ? "active" : "" }} {{ request()->is("admin/abouts*") ? "active" : "" }} {{ request()->is("admin/slides*") ? "active" : "" }} {{ request()->is("admin/cta*") ? "active" : "" }} {{ request()->is("admin/contacts*") ? "active" : "" }}" href="#">
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
                            @can('about_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.abouts.index") }}" class="nav-link {{ request()->is("admin/abouts") || request()->is("admin/abouts/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-building">

                                        </i>
                                        <p>
                                            {{ trans('cruds.about.title') }}
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
                @can('cars_menu_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/car-brands*") ? "menu-open" : "" }} {{ request()->is("admin/car-models*") ? "menu-open" : "" }} {{ request()->is("admin/car-items*") ? "menu-open" : "" }} {{ request()->is("admin/carmanagements*") ? "menu-open" : "" }} {{ request()->is("admin/damages*") ? "menu-open" : "" }} {{ request()->is("admin/vehicle-expenses*") ? "menu-open" : "" }} {{ request()->is("admin/vehicle-maintenances*") ? "menu-open" : "" }} {{ request()->is("admin/vehicle-documents*") ? "menu-open" : "" }} {{ request()->is("admin/maintenances*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/car-brands*") ? "active" : "" }} {{ request()->is("admin/car-models*") ? "active" : "" }} {{ request()->is("admin/car-items*") ? "active" : "" }} {{ request()->is("admin/carmanagements*") ? "active" : "" }} {{ request()->is("admin/damages*") ? "active" : "" }} {{ request()->is("admin/vehicle-expenses*") ? "active" : "" }} {{ request()->is("admin/vehicle-maintenances*") ? "active" : "" }} {{ request()->is("admin/vehicle-documents*") ? "active" : "" }} {{ request()->is("admin/maintenances*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-car">

                            </i>
                            <p>
                                {{ trans('cruds.carsMenu.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('car_brand_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.car-brands.index") }}" class="nav-link {{ request()->is("admin/car-brands") || request()->is("admin/car-brands/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-car">

                                        </i>
                                        <p>
                                            {{ trans('cruds.carBrand.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('car_model_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.car-models.index") }}" class="nav-link {{ request()->is("admin/car-models") || request()->is("admin/car-models/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-circle">

                                        </i>
                                        <p>
                                            {{ trans('cruds.carModel.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('car_item_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.car-items.index") }}" class="nav-link {{ request()->is("admin/car-items") || request()->is("admin/car-items/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-car">

                                        </i>
                                        <p>
                                            {{ trans('cruds.carItem.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('carmanagement_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.carmanagements.index") }}" class="nav-link {{ request()->is("admin/carmanagements") || request()->is("admin/carmanagements/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-calendar-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.carmanagement.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('damage_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.damages.index") }}" class="nav-link {{ request()->is("admin/damages") || request()->is("admin/damages/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-car">

                                        </i>
                                        <p>
                                            {{ trans('cruds.damage.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('vehicle_expense_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.vehicle-expenses.index") }}" class="nav-link {{ request()->is("admin/vehicle-expenses") || request()->is("admin/vehicle-expenses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-euro-sign">

                                        </i>
                                        <p>
                                            {{ trans('cruds.vehicleExpense.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('vehicle_maintenance_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.vehicle-maintenances.index") }}" class="nav-link {{ request()->is("admin/vehicle-maintenances") || request()->is("admin/vehicle-maintenances/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-wrench">

                                        </i>
                                        <p>
                                            {{ trans('cruds.vehicleMaintenance.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('vehicle_document_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.vehicle-documents.index") }}" class="nav-link {{ request()->is("admin/vehicle-documents") || request()->is("admin/vehicle-documents/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-file">

                                        </i>
                                        <p>
                                            {{ trans('cruds.vehicleDocument.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('maintenance_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.maintenances.index") }}" class="nav-link {{ request()->is("admin/maintenances") || request()->is("admin/maintenances/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-car">

                                        </i>
                                        <p>
                                            {{ trans('cruds.maintenance.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('tvde_menu_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/*") ? "menu-open" : "" }} {{ request()->is("admin/*") ? "menu-open" : "" }} {{ request()->is("admin/activities*") ? "menu-open" : "" }} {{ request()->is("admin/rentals*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/*") ? "active" : "" }} {{ request()->is("admin/*") ? "active" : "" }} {{ request()->is("admin/activities*") ? "active" : "" }} {{ request()->is("admin/rentals*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-bars">

                            </i>
                            <p>
                                {{ trans('cruds.tvdeMenu.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('week_management_access')
                                <li class="nav-item has-treeview {{ request()->is("admin/years*") ? "menu-open" : "" }} {{ request()->is("admin/months*") ? "menu-open" : "" }} {{ request()->is("admin/weeks*") ? "menu-open" : "" }}">
                                    <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/years*") ? "active" : "" }} {{ request()->is("admin/months*") ? "active" : "" }} {{ request()->is("admin/weeks*") ? "active" : "" }}" href="#">
                                        <i class="fa-fw nav-icon far fa-calendar-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.weekManagement.title') }}
                                            <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('year_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.years.index") }}" class="nav-link {{ request()->is("admin/years") || request()->is("admin/years/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon far fa-calendar-alt">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.year.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('month_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.months.index") }}" class="nav-link {{ request()->is("admin/months") || request()->is("admin/months/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon far fa-calendar-alt">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.month.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('week_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.weeks.index") }}" class="nav-link {{ request()->is("admin/weeks") || request()->is("admin/weeks/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon far fa-calendar-alt">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.week.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan
                            @can('setting_access')
                                <li class="nav-item has-treeview {{ request()->is("admin/seasons*") ? "menu-open" : "" }}">
                                    <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/seasons*") ? "active" : "" }}" href="#">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.setting.title') }}
                                            <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('season_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.seasons.index") }}" class="nav-link {{ request()->is("admin/seasons") || request()->is("admin/seasons/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-calendar">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.season.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan
                            @can('activity_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.activities.index") }}" class="nav-link {{ request()->is("admin/activities") || request()->is("admin/activities/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-calendar-check">

                                        </i>
                                        <p>
                                            {{ trans('cruds.activity.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('rental_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.rentals.index") }}" class="nav-link {{ request()->is("admin/rentals") || request()->is("admin/rentals/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-car">

                                        </i>
                                        <p>
                                            {{ trans('cruds.rental.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('driver_menu_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/drivers*") ? "menu-open" : "" }} {{ request()->is("admin/parking-tickets*") ? "menu-open" : "" }} {{ request()->is("admin/fuel-cards*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/drivers*") ? "active" : "" }} {{ request()->is("admin/parking-tickets*") ? "active" : "" }} {{ request()->is("admin/fuel-cards*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-user">

                            </i>
                            <p>
                                {{ trans('cruds.driverMenu.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('driver_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.drivers.index") }}" class="nav-link {{ request()->is("admin/drivers") || request()->is("admin/drivers/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-address-card">

                                        </i>
                                        <p>
                                            {{ trans('cruds.driver.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('parking_ticket_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.parking-tickets.index") }}" class="nav-link {{ request()->is("admin/parking-tickets") || request()->is("admin/parking-tickets/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-signature">

                                        </i>
                                        <p>
                                            {{ trans('cruds.parkingTicket.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('fuel_card_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.fuel-cards.index") }}" class="nav-link {{ request()->is("admin/fuel-cards") || request()->is("admin/fuel-cards/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-burn">

                                        </i>
                                        <p>
                                            {{ trans('cruds.fuelCard.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('content_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/content-categories*") ? "menu-open" : "" }} {{ request()->is("admin/content-tags*") ? "menu-open" : "" }} {{ request()->is("admin/content-pages*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/content-categories*") ? "active" : "" }} {{ request()->is("admin/content-tags*") ? "active" : "" }} {{ request()->is("admin/content-pages*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-book">

                            </i>
                            <p>
                                {{ trans('cruds.contentManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('content_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.content-categories.index") }}" class="nav-link {{ request()->is("admin/content-categories") || request()->is("admin/content-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-folder">

                                        </i>
                                        <p>
                                            {{ trans('cruds.contentCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('content_tag_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.content-tags.index") }}" class="nav-link {{ request()->is("admin/content-tags") || request()->is("admin/content-tags/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-tags">

                                        </i>
                                        <p>
                                            {{ trans('cruds.contentTag.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('content_page_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.content-pages.index") }}" class="nav-link {{ request()->is("admin/content-pages") || request()->is("admin/content-pages/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file">

                                        </i>
                                        <p>
                                            {{ trans('cruds.contentPage.title') }}
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