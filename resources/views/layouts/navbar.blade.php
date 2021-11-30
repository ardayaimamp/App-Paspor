<nav class="navbar navbar-expand-lg navbar-dark bg-nav fs-5">
    <div class="container">
      <a class="navbar-brand" href="#"><img src="/img/logo-nav.png"  width="60" height="60" class="d-inline-block align-text-top" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav">
                <li><a class="nav-link active" href="/">Home</a></li>
                <li><a class="nav-link active" href="#syarat">Syarat & Ketentuan</a></li>
                <li> <a class="nav-link active" href="#kontak">Kontak Kami</a></li>
            </ul>
            @auth
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Hi, {{ auth()->user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="#">Dashboard</a>
                      <form action="/logout" method="post">
                        @csrf
                        <button class="dropdown-item" type="submit">Logout</button>
                    </form>
                    </div>
                  </li>
            </ul>

            @else
            <ul class="navbar-nav ms-auto">
                <li><a class="nav-link active" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a></li>
            </ul>
            @endauth
      </div>
    </div>
  </nav>
