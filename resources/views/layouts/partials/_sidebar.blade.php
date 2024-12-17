    <nav id="sidebar">
      <!-- Sidebar Content -->
      <div class="sidebar-content">
        <!-- Side Header -->
        <div class="content-header justify-content-lg-center">
          <!-- Logo -->
          <div>
            <span class="smini-visible fw-bold tracking-wide fs-lg">
              c<span class="text-primary">b</span>
            </span>
            <a class="mx-auto" href="{{route('admin.home')}}">
              <span class="smini-hidden">
                <img src="{{asset('logo/'.config('mail.from.app_logo'))}}" alt="" class="img-thumbnail">
              </span>
            </a>
          </div>
          <!-- END Logo -->

          <!-- Options -->
          <div>
            <!-- Close Sidebar, Visible only on mobile screens -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-sm btn-alt-danger d-lg-none" data-toggle="layout" data-action="sidebar_close">
              <i class="fa fa-fw fa-times"></i>
            </button>
            <!-- END Close Sidebar -->
          </div>
          <!-- END Options -->
        </div>
        <!-- END Side Header -->

        <!-- Sidebar Scrolling -->
        <div class="js-sidebar-scroll">
          <!-- Side User -->
          <div class="content-side content-side-user px-0 py-0">
            <!-- Visible only in mini mode -->
            <div class="smini-visible-block animated fadeIn px-3">
              <img class="img-avatar img-avatar32" src="{{asset('logo/'.config('mail.from.app_logo'))}}" alt="">
            </div>
            <!-- END Visible only in mini mode -->

            <!-- Visible only in normal mode -->
            <div class="smini-hidden text-center mx-auto">
              <a class="img-link" href="javascript:void(0)">
                  @if (Auth::user()->avatar != '')
                      <img class="img-avatar" src="{{ URL::to('avatar/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->avatar }}" />
                  @else
                    <img class="img-avatar" src="{{ asset('media/avatars/avatar15.jpg') }}" alt="">
                  @endif
              </a>
              <ul class="list-inline mt-3 mb-0">
                <li class="list-inline-item">
                  <a class="link-fx text-dual fs-sm fw-semibold text-uppercase" href="javascript:void(0)">{{ Auth::user()->name }}</a>
                </li>
              </ul>
            </div>
            <!-- END Visible only in normal mode -->
          </div>
          <!-- END Side User -->

          <!-- Side Navigation -->
          <div class="content-side content-side-full">
            <ul class="nav-main">
              
        
              <li class="nav-main-item{{ request()->is(['home']) ? ' open' : '' }}">
                <a class="nav-main-link"  aria-haspopup="true" aria-expanded="true" href="{{ route('admin.home') }}">
                  <i class="nav-main-link-icon fa fa-house-user"></i>
                  <span class="nav-main-link-name">Dashboard</span>
                </a>
              </li>
              {{-- @canany(['users-list', 'roles-list',]) --}}
              <li class="nav-main-item{{ request()->is(['blog', 'blog/*', 'category-blog', 'category-blog/*']) ? ' open' : '' }}">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                  <i class="nav-main-link-icon fa fa-user"></i>
                  <span class="nav-main-link-name">Manage Blogs</span>
                </a>
                <ul class="nav-main-submenu">
                  {{-- @can('users-view') --}}
                    <li class="nav-main-item">
                      <a class="nav-main-link{{ request()->is(['category-blog', 'category-blog/*']) ? ' active' : '' }}" href="{{ route('category-blog.index') }}">
                        <span class="nav-main-link-name">Category</span>
                      </a>
                    </li>
                  {{-- @endcan --}}
                  {{-- @can('roles-view') --}}
                    <li class="nav-main-item">
                      <a class="nav-main-link{{ request()->is(['blog', 'blog/*']) ? ' active' : '' }}" href="{{ route('blog.index') }}">
                        <span class="nav-main-link-name">Blogs</span>
                      </a>
                    </li>
                  {{-- @endcan --}}
                </ul>
              </li>
            {{-- @endcan --}}
              {{-- system --}}
              @canany(['users-list', 'roles-list',])
                <li class="nav-main-heading">Configuration</li>
                <li class="nav-main-item{{ request()->is(['users', 'users/*', 'roles', 'roles/*', 'permission', 'permission/*']) ? ' open' : '' }}">
                  <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                    <i class="nav-main-link-icon fa fa-user"></i>
                    <span class="nav-main-link-name">Manage User</span>
                  </a>
                  <ul class="nav-main-submenu">
                    @can('users-view')
                      <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is(['users', 'users/*']) ? ' active' : '' }}" href="{{ route('users.index') }}">
                          <span class="nav-main-link-name">Users</span>
                        </a>
                      </li>
                    @endcan
                    @can('roles-view')
                      <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is(['roles', 'roles/*']) ? ' active' : '' }}" href="{{ route('roles.index') }}">
                          <span class="nav-main-link-name">Roles</span>
                        </a>
                      </li>
                      <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is(['permission', 'permission/*']) ? ' active' : '' }}" href="{{ route('permission.index') }}">
                          <span class="nav-main-link-name">Permission</span>
                        </a>
                      </li>
                    @endcan
                  </ul>
                </li>
              @endcan
              @canany(['setting-general', 'setting-config'])
                <li class="nav-main-item{{ request()->is(['settings', 'settings/*', 'config', 'config/*']) ? ' open' : '' }}">
                  <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                    <i class="nav-main-link-icon fa fa-cogs"></i>
                    <span class="nav-main-link-name">Setting</span>
                  </a>
                  <ul class="nav-main-submenu">
                  @can('setting-general')
                    <li class="nav-main-item">
                      <a class="nav-main-link{{ request()->is(['settings', 'settings/*']) ? ' active' : '' }}" href="{{ route('settings.index') }}">
                        <span class="nav-main-link-name">General</span>
                      </a>
                    </li>
                  @endcan
                  </ul>
                  <ul class="nav-main-submenu">
                  @can('setting-config')
                    <li class="nav-main-item">
                      <a class="nav-main-link{{ request()->is(['config', 'config/*']) ? ' active' : '' }}" href="{{ route('config.index') }}">
                        <span class="nav-main-link-name">Config</span>
                      </a>
                    </li>
                  @endcan
                  </ul>
                </li>
              @endcan
            </ul>
          </div>
          <!-- END Side Navigation -->
        </div>
        <!-- END Sidebar Scrolling -->
      </div>
      <!-- Sidebar Content -->
    </nav>