<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Skerio - Admin Dashboard </title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="/assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="/assets/css/style.css">
  @yield('css')
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="/assets/css/custom.css">
  <link rel="stylesheet" href="/assets/css/components.css">
  <link rel='shortcut icon' type='image/x-icon' href='/assets/img/favicon.ico' />
    {{-- <style> .error{border :2px solid red}    </style> --}}
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="/assets/img/user.png"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title"> {{ Auth::user()->name }} </div>
                <a href="profile.html" class="dropdown-item has-icon"> <i class="far fa-user"></i> Profile </a>
                <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i> Activities </a>
                <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i> Settings </a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i> Logout </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{route('admin.dashboard')}}"> <img alt="image" src="/assets/img/logo.png" class="header-logo" /> <span
                class="logo-name">Skerio</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Asosiy</li>
            <li class="dropdown {{ request()->is('admin/dashboard*') ? 'active' : ''  }}">
              <a href="{{ Route('admin.dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>

            <li class="dropdown {{ request()->is('admin/homes*') ? 'active' : ''  }}">
              <a href="{{ route('admin.homes.index') }}" ><i class="fas fa-home"></i><span>Home</span></a>
            </li>

            <li class="dropdown {{ request()->is('admin/categories*') ? 'active' : ''  }}">
              <a href="{{ route('admin.categories.index') }}" ><i class="fas fa-align-left"></i><span>Sport Kategoriyasi</span></a>
            </li>

            <li class="dropdown {{ request()->is('admin/news*') ? 'active' : ''  }}">
              <a href="{{ route('admin.news.index') }}" ><i class="far fa-newspaper"></i><span>Yangiliklar</span></a>
            </li>

            <li class="dropdown {{ request()->is('admin/brands*') ? 'active' : ''  }}">
              <a href="{{ route('admin.brands.index') }}" ><i class="fas fa-podcast"></i><span>Brendlar</span></a>
            </li>

            <li class="dropdown {{ request()->is('admin/products*' || 'admin/productCategories*' || 'admin/sizes*') ? 'active' : ''  }}">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user-check"></i><span> Mahsulotlar </span></a>
                <ul class="dropdown-menu">
                  <li class="dropdown {{ request()->is('admin/products*') ? 'active' : ''  }}">
                    <a href="{{ route('admin.products.index') }}" ><i class="far fa-newspaper"></i><span>Mahsulotlar</span></a>
                  </li>
                  <li class="dropdown {{ request()->is('admin/productCategories*') ? 'active' : ''  }}">
                    <a href="{{ route('admin.productCategories.index') }}" ><i class="far fa-newspaper"></i><span>Mahsulot kategoriyasi</span></a>
                  </li>
      
                  <li class="dropdown {{ request()->is('admin/sizes*') ? 'active' : ''  }}">
                    <a href="{{ route('admin.sizes.index') }}" ><i class="far fa-newspaper"></i><span>Mahsulot O'lchamlari</span></a>
                  </li>
                </ul>
            </li>

            <li class="dropdown {{ request()->is('admin/team*') ? 'active' : ''  }}">
              <a href="{{ route('admin.team.index') }}" ><i class="far fa-newspaper"></i><span>Jamoalar</span></a>
            </li>

            {{-- Sport Complexes --}}
            <li class="dropdown {{ request()->is('admin/complexes*') ? 'active' : ''  }}">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user-check"></i><span> Sport majmuolari </span></a>
                <ul class="dropdown-menu">
                  <li class="{{ request()->is('admin/complexes/locations*') ? 'active' : ''  }}">
                      <a href="{{ route('admin.complexes.locations.') }}"> <i class="fas fa-map-marker-alt"></i><span> Joylashuvlar </span></a>
                  </li>
                  <li class="{{ request()->is('admin/complexes/table*') ? 'active' : ''  }}">
                      <a href="{{ route('admin.complexes.table.index') }}"> <i class="fas fa-building"></i><span> Majmualar </span></a>
                  </li>
                </ul>
            </li>

            @can('user')

            @endcan

            @if (Auth::user()->hasAllPermissions(['role-list', 'user-list']))
                <li class="menu-header"> Xavfsizlik </li>
                <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="user-check"></i><span> Administratsiya </span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->is('admin/roles*') ? 'active' : ''  }}">
                        <a href="{{ route('admin.roles.index') }}" > <i class="fas fa-universal-access"></i> Rollar</a>
                    </li>
                    <li class=" {{ request()->is('admin/users*') ? 'active' : ''  }}">
                        <a href="{{ route('admin.users.index') }}" > <i class="fas fa-users-cog"></i><span>Foydalanuvchi&Admin</span></a>
                    </li>
                </ul>
                </li>
            @endif

            {{-- Tickets --}}
            <li class="dropdown {{ request()->is('admin/tickets*') ? 'active' : ''  }}">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user-check"></i><span> Chiptalar bo'limi </span></a>
                <ul class="dropdown-menu">
                  <li class="{{ request()->is('admin/tickets/table*') ? 'active' : ''  }}">
                    <a href="{{ route('admin.tickets.table.index') }}"> <i class="fas fa-building"></i><span> Chiptalar </span></a>
                  </li>
                  <li class="dropdown {{ request()->is('admin/tickets/stadiums*') ? 'active' : ''  }}">
                    <a href="{{ route('admin.tickets.stadiums.table.index') }}" ><i class="far fa-newspaper"></i><span> Stadionlar </span></a>
                  </li>
                </ul>
            </li>

          </ul>
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">

        @yield('content')

        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
            <a href="/" target="_blank">Skerio.uz</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="/assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="/assets/bundles/apexcharts/apexcharts.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="/assets/js/page/index.js"></script>
  <!-- Template JS File -->
  <script src="/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="/assets/js/custom.js"></script>
  <script src="/assets/js/page/ion-icons.js"></script>
  @yield('scripts')
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>


