<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <!-- <img alt="image" class="rounded-circle" src="/images/user.jpg"/> -->
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold"></span>
                        <span class="text-muted text-xs block">
                            {{ Auth::user()->name }}
                            <!-- <b class="caret"></b> -->
                        </span>
                    </a>
                    <!-- <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item"
                               href=""></a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href=""></a>
                        </li>
                    </ul> -->
                </div>
                <div class="logo-element">
                    {{ config('app.name', 'Laravel') }}
                </div>
            </li>

            <li class="">
                <a href="{{ route('admin.settings.users.edit', Auth::user()->id) }}">
                    <i class="fa fa-user"></i>
                    <span class="nav-label">{{ __('admin.profile') }}</span>
                </a>
            </li>
            {{-- <li class="">
                <a href="{{ route('admin.index') }}">
                    <i class="fa fa-home"></i>
                    <span class="nav-label">{{ __('admin.index') }}</span>
                </a>
            </li> --}}
            @can('manageSiteSettings')
                <li class="{{ Request::is('admin/sitesettings') ? 'mm-active' : '' }}">
                    <a href="#">
                        <i class="fas fa-tools"></i>
                        <span class="nav-label">{{ __('admin.menu-sitesettings') }}</span>
                        <span class="fa arrow"></span>
                    </a>

                    <ul class="nav nav-second-level collapse">
                        <li class="{{ Request::is('admin/sitesettings/') ? 'mm-active' : '' }}">
                            <a href="{{ route('admin.sitesettings.index') }}">
                                <i class="fas fa-tools"></i>
                                <span class="nav-label">{{ __('admin.menu-sitesettings-common') }}</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('admin/sitesettings/mainpagebanner') ? 'mm-active' : '' }}">
                            <a href="{{ route('admin.sitesettings.mainpagebanner') }}">
                                <i class="fas fa-certificate"></i>
                                <span class="nav-label"> {{ __('admin.menu-sitesettings-banner') }}</span>
                            </a>
                        </li>

                        <li class="{{ Request::is('admin/special/offers/category*') ? 'mm-active' : '' }}">
                            <a href="{{ route('admin.category.offers.list') }}">
                                <i class="fas fa-certificate"></i>
                                <span class="nav-label"> {{ __('admin.menu-categories') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan

            @can('manageItemActivity')
                <li class="">
                    <a href="{{ route('admin.items.index', ['active' => 0]) }}">
                        <i class="fas fa-building"></i>
                        <span class="nav-label">{{ __('admin.menu-objects-moderate') }}</span>
                    </a>
                </li>
            @endcan

            @can('view', 'App\Models\Item')
                <li class="{{ Request::is('admin/items*') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.items.index') }}">
                        <i class="fas fa-building"></i>
                        <span class="nav-label">{{ __('admin.menu-objects') }}</span>
                    </a>
                </li>
            @endcan

            @can('view', 'App\Models\Item')
                <li class="ml-2">
                    <a href="{{ route('admin.items.index', ['type_id' => 25]) }}">
                        <i class="fas fa-building"></i>
                        <span class="nav-label">{{ __('admin.menu-objects-novostroiki') }}</span>
                    </a>
                </li>
            @endcan

            @can('view', 'App\Models\Item')
                <li class="ml-2">
                    <a href="{{ route('admin.items.index', ['type_id' => 26]) }}">
                        <i class="fas fa-building"></i>
                        <span class="nav-label">{{ __('admin.menu-objects-poselki') }}</span>
                    </a>
                </li>
            @endcan

            @can('view', 'App\Models\Item')
                <li class="ml-2">
                    <a href="{{ route('admin.items.index', ['type_id' => 2]) }}">
                        <i class="fas fa-building"></i>
                        <span class="nav-label">{{ __('admin.menu-objects-vtorichka') }}</span>
                    </a>
                </li>
            @endcan

            @can('manageSpecialOffer')
                <li class="{{ Request::is('admin/special/offers*') ? 'mm-active' : '' }}">
                    <a href="#">
                        <i class="fas fa-certificate"></i>
                        <span class="nav-label">{{ __('admin.menu-offers') }}</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level collapse">
                        <li class="{{ Request::is('admin/special/offers/items*') ? 'mm-active' : '' }}">
                            <a href="{{ route('admin.items.offers.list') }}">
                                <i class="fas fa-certificate"></i>
                                <span class="nav-label"> {{ __('admin.menu-objects') }}</span>
                            </a>
                        </li>

                        <li class="{{ Request::is('admin/special/offers/category*') ? 'mm-active' : '' }}">
                            <a href="{{ route('admin.category.offers.list') }}">
                                <i class="fas fa-certificate"></i>
                                <span class="nav-label"> {{ __('admin.menu-categories') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan

            @can('view', 'App\Models\Type')
                <li class="{{ Request::is('admin/type*') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.type.index') }}">
                        <i class="fa fa-filter"></i>
                        <span class="nav-label">{{ __('admin.menu-types') }}</span>
                    </a>
                </li>
            @endcan

            @can('view', 'App\Models\Option')
                <li class="{{ Request::is('admin/options*') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.options.index') }}">
                        <i class="fas fa-boxes"></i>
                        <span class="nav-label">{{ __('admin.menu-options') }}</span>
                    </a>
                </li>
            @endcan

            @can('view', 'App\Models\Area')
                <li class="{{ Request::is('admin/areas*') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.areas.index') }}">
                        <i class="fas fa-share-alt"></i>
                        <span class="nav-label">{{ __('admin.menu-areas') }}</span>
                    </a>
                </li>
            @endcan

            @can('view', 'App\Models\Category')
                <li class="{{ Request::is('admin/categories*') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.categories.index') }}">
                        <i class="fas fa-align-justify"></i>
                        <span class="nav-label">{{ __('admin.menu-categories') }}</span>
                    </a>
                </li>
            @endcan

            @can('view', 'App\Models\ResidenceCategory')
                <li class="{{ Request::is('admin/rescategories*') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.rescategories.index') }}">
                        <i class="fas fa-align-justify"></i>
                        <span class="nav-label">{{ __('admin.menu-rescategories') }}</span>
                    </a>
                </li>
            @endcan

            @can('view', 'App\Models\Residence')
                <li class="{{ Request::is('admin/residences*') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.residences.index') }}">
                        <i class="fas fa-city"></i>
                        <span class="nav-label">{{ __('admin.menu-complex') }}</span>
                    </a>
                </li>
            @endcan

            @can('view', 'App\Models\Page')
                <li class="{{ Request::is('admin/pages*') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.pages.index') }}">
                        <i class="fas fa-columns"></i>
                        <span class="nav-label">{{ __('admin.menu-pages') }}</span>
                    </a>
                </li>
            @endcan

            @can('manageUsers')
                <li class="{{ Request::is('admin/settings/users*') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.settings.users.list') }}">
                        <i class="fas fa-user"></i>
                        <span class="nav-label">{{ __('admin.menu-settings-user') }}</span>
                    </a>
                </li>


                <li class="{{ Request::is('admin/settings/clients*') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.settings.clients.list') }}">
                        <i class="fas fa-user"></i>
                        <span class="nav-label">{{ __('admin.menu-settings-clients') }}</span>
                    </a>
                </li>
            @endcan

        </ul>

    </div>
</nav>
