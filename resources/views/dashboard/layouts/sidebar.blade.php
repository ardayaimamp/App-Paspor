
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><img src="/img/logo-nav.png" class="img-fluid" width="40" height="40" alt="" srcset=""><b class="fw-normal">&nbsp;&nbsp;@can('admin') Admin @endcan{{ auth()->user()->name }}</b></a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    @can('admin')
    @if ($active == $sidebars)
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    @else
    @endif
    @endcan
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="logout nav-link px-3 bg-dark border-0 ">Sign out</button>
        </form>
      </div>
    </div>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
            <h4 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span class="fs-4">USER</span>
                <a class="link-secondary" href="#" aria-label="Add a new report">
                  <span data-feather="plus-circle"></span>
                </a>
              </h4>
          <ul class="nav flex-column mt-3">
            <li class="nav-item">
              <a class="nav-link {{ $active === 'dashboard' ? 'active' : '' }}" aria-current="page" href="/dashboard" style="font-size:20px">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            <hr>
            <li class="nav-item">
              <a class="nav-link {{ $active === 'profil' ? 'active' : '' }}" href="/dashboard/profil" style="font-size:20px">
                <span data-feather="shopping-cart"></span>
                Profil
              </a>
            </li>
            <hr>
            @cannot('admin')
            <li class="nav-item">
              <a class="nav-link {{ $active === 'pengajuan' ? 'active' : '' }}" href="/dashboard/pengajuan" style="font-size:20px">
                <span data-feather="users"></span>
                Pengajuan
              </a>
            </li>
            <hr>
            @endcannot
            @can('admin')
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span class="fs-5">ADMINISTRATOR</span>
                <a class="link-secondary" href="#" aria-label="Add a new report">
                    <span data-feather="plus-circle"></span>
                </a>
            </h6>
            <hr>
            <ul class="nav flex-column mb-2">
                <li class="nav-item">
              <a class="nav-link {{ $active === 'listPemohon' ? 'active' : '' }}" href="/dashboard/listPemohon" style="font-size:20px">
                <span data-feather="file-text"></span>
                List Pemohon
            </a>
        </li>
        <hr>
    </ul>
    @endcan
</div>
</nav>
