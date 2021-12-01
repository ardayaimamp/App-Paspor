@extends('layouts.main')

@section('container')
{{-- @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif --}}
            {{-- @if (session()->has('Berhasil'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('Berhasil') }}
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif --}}

<div class="container-fluid">
    <div class="row justify-content-center login-form border border-2 border-nav w-50 mx-auto " style="margin-bottom: 15vh">
        <div class="col-md-6 bg-login ">
            <div class="text-login-form d-flex flex-column text-center justify-content-center text-light">
                <p class="fs-1 fw-bold">Belum terdaftar ?</p>
                <p class="fs-3">Silahkan daftar dahulu</p>
                <a href="/register" class="btn-daftar btn bg-light fs-2 mx-auto ">Daftar Sekarang</a>
            </div>
        </div>
        <div class="col-md-6">
            <main class="form-signin">
                <form action="/login" method="post">
                    @csrf
                  <img class="d-block mx-auto my-4" src="/img/logo-nav.png" alt="" width="150" height="150">
                  <h1 class="h3 mb-3 fw-bold text-center">Silahkan Login</h1>

                  <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="nama@contoh.com" name="email" autofocus>
                    <label for="email">Email address</label>
                    @error('email')
                        {{ $message }}
                    @enderror
                  </div>
                  <div class="form-floating">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password">
                    <label for="password">Password</label>
                    @error('email')
                        {{ $message }}
                    @enderror
                  </div>
                  <button class="w-100 btn btn-lg bg-nav mb-5 text-light mt-5" type="submit">Sign in</button>
                </form>
              </main>
        </div>
    </div>
</div>

{{-- @if (session()->has('Berhasil'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('Berhasil') }}
    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif --}}
{{-- @if(session()->has('Berhasil'))
<script>
    swal("Berhasil !", "{!! Session::get('Berhasil') !!}","success",{
        button: "OK",
    })
</script>
@endif --}}

@endsection
