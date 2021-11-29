@extends('layouts.main')

@section('container')
<div class="container-fluid">
    <div class="row justify-content-center login-form border border-2 border-nav w-50 mx-auto " style="margin-bottom: 15vh">
        <div class="col-md-6 bg-login ">
            <div class="text-login-form d-flex flex-column text-center justify-content-center text-light">
                <p class="fs-1 fw-bold">Belum terdaftar ?</p>
                <p class="fs-3">Silahkan daftar dahulu</p>
                <a href="" class="btn-daftar btn bg-light fs-2 mx-auto ">Daftar Sekarang</a>
            </div>
        </div>
        <div class="col-md-6">
            <main class="form-signin">
                <form>
                  <img class="d-block mx-auto my-4" src="/img/logo-nav.png" alt="" width="150" height="150">
                  <h1 class="h3 mb-3 fw-bold text-center">Silahkan Login</h1>

                  <div class="form-floating">
                    <input type="email" class="form-control" id="email" placeholder="nama@contoh.com" name="email">
                    <label for="email">Email address</label>
                  </div>
                  <div class="form-floating">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    <label for="password">Password</label>
                  </div>
                  <button class="w-100 btn btn-lg bg-nav mb-5 text-light mt-5" type="submit">Sign in</button>
                </form>
              </main>
        </div>
    </div>
</div>
@endsection
