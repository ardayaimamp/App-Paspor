@extends('dashboard.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Hi, @can('admin') <b>Admin</b> @endcan {{ auth()->user()->name }}</h1>
  </div>
  <p class="lead">Pengajuan di tanggal {{ $now->format('d F Y') }}</p>
  <div class="row mt-5">
      <div class="col-md-12">
          <div id="accordion">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn btn-nav text-decoration-none" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    <h3 class="heading-3">Anda sedang memiliki pengajuan yang masih pending</h3>
                  </button>
                </h5>
              </div>
              <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                 <div class="card-body">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Foto</th>
            <th scope="col">NIK</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Deskripsi Kehilangan</th>
            <th scope="col">Dokumen Pendukung</th>
            <th scope="col" style="text-transform:uppercase">Status</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($pengajuan_user as $p)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td><img src="/storage/{{ $p->pemohon->foto_self }}" width="50" height="50" style="border-radius:50%" alt="" srcset=""></td>
                <td>{{ $p->pemohon->nik}}</td>
                <td>{{ $p->pemohon->name}}</td>
                <td>{{ $p->pemohon->alamat}}</td>
                <td>{{ $p->deskripsi}}</td>
                <td><details>
                    <summary class="summary">Lihat Data</summary>
                    <div class="row">
                        <div class="col-md-3">
                            <a href="/storage/{{ $p->pemohon->foto_ktp }}" data-lightbox="foto_ktp" data-toggle="tooltip" title="Foto KTP">
                                <img src="/storage/{{ $p->pemohon->foto_ktp }}" class="img-fluid" alt="" srcset="">
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="/storage/{{ $p->pemohon->kartu_keluarga }}" data-lightbox="kartu_keluarga" data-toggle="tooltip" title="Foto Kartu Keluarga">
                                <img src="/storage/{{ $p->pemohon->kartu_keluarga }}" class="img-fluid" alt="" srcset="">
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="/storage/{{ $p->pemohon->akta_kelahiran }}" data-lightbox="akta_kelahiran" data-toggle="tooltip" title="Foto Akta Kelahiran">
                                <img src="/storage/{{ $p->pemohon->akta_kelahiran }}" class="img-fluid" alt="" srcset="">
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="/storage/{{ $p->surat_kehilangan }}" data-lightbox="surat_kehilangan" data-toggle="tooltip" title="Foto Surat Kehilangan">
                                <img src="/storage/{{ $p->surat_kehilangan }}" class="img-fluid" alt="" srcset="">
                            </a>
                        </div>
                    </div>
                  </details></td>
                  <td class="fw-bold" style="text-transform:uppercase;">{{ $p->status}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
              </div>
        </div>
       </div>

@endsection
