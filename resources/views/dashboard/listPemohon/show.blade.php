@extends('dashboard.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Profil</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
          <a href="/dashboard/listPemohon/{{ $user->id }}/edit" class="btn btn-sm btn-outline-secondary">Edit Profil</a>
        </div>
      </div>
    </div>
    <div class="row justify-content-center" style="margin-top: 4vh">
        @if ($user->foto_self)
        <img src="/storage/{{ $user->foto_self }}" alt="" class="img-thumbnail rounded-circle" style="width: 10%" srcset="">
        @else
        <img src="/img/user.png" alt="" class="img-thumbnail rounded-circle" style="width: 10%" srcset="">
        @endif
        <h3 class="display-5 text-center">{{ $user->name }}</h3>
        <small class="text-muted text-center fs-5 mb-1">{{ $user->nik }}</small>
        <p>{{ $user->tanggal_lahir }}</p>
        <p class="lead text-center">{{ $user->alamat }}</p>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-md-4">
            <h5 class="text-center">KTP</h5>
            @if (is_null($user->foto_ktp))
            <h1 class="display-h2 text-center mt-5">KTP Kosong</h1>
            <span class="d-block text-center" style='font-size:100px;'>&#129316;</span>
            @else
            <img src="/storage/{{ $user->foto_ktp }}" style="width: 500px" alt="" srcset="">
            @endif
        </div>
        <div class="col-md-4">
            <h5 class="text-center">Kartu Keluarga</h5>
            @if (is_null($user->kartu_keluarga))
            <h1 class="display-h2 text-center mt-5">KK Kosong</h1>
            <span class="d-block text-center" style='font-size:100px;'>&#129316;</span>
            @else
            <img src="/storage/{{ $user->kartu_keluarga }}" style="width: 500px" alt="" srcset="">
            @endif
        </div>
        <div class="col-md-4">
            <h5 class="text-center">Akta Kelahiran</h5>
            @if (is_null($user->akta_kelahiran))
            <h1 class="display-h2 text-center mt-5">Akta Kosong</h1>
            <span class="d-block text-center" style='font-size:100px;'>&#129316;</span>
            @else
            <img src="/storage/{{ $user->akta_kelahiran }}" style="width: 500px" alt="" srcset="">
            @endif
        </div>
    </div>
  </main>
@endsection
