@extends('dashboard.layouts.main')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Hi, @can('admin') <b>Admin</b> @endcan {{ auth()->user()->name }}</h1>
    </div>
    <p class="lead">Inilah sekilas di tanggal {{ $now->format('d F Y') }}</p>
    <div class="row mt-5">
        <div class="col-md-12">
            @cannot('admin')
            @if ($hitungBaris_user)
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
            @endif
            @if ($userTerima)
            <div id="accordion">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-nav text-decoration-none" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <h3 class="heading-3">Anda memiliki {{ $userTerima_count }} pengajuan yang diterima</h3>
                      </button>
                    </h5>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                     <div class="card-body">
        <table class="table" style="color:green; font-style:italic;">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Foto</th>
                <th scope="col">NIK</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Tanggal Pengajuan</th>
                <th scope="col">Deskripsi Kehilangan</th>
                <th scope="col">Tiket Antri</th>
                <th scope="col" style="text-transform:uppercase">Status</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($userTerima as $p)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td><img src="/storage/{{ $p->pemohon->foto_self }}" width="50" height="50" style="border-radius:50%" alt="" srcset=""></td>
                    <td>{{ $p->pemohon->nik}}</td>
                    <td>{{ $p->pemohon->name}}</td>
                    <td>{{ $p->pemohon->alamat}}</td>
                    <td>{{ date('d F Y', strtotime($p->tanggal_pengajuan)); }}</td>
                    <td>{{ $p->deskripsi}}</td>
                    <td><details>
                        <summary class="summary">Lihat Data</summary>
                        <div class="card text-white bg-info mb-3 text-center" style="max-width: 18rem;">
                            <div class="card-header">Tiket Antrian</div>
                            <div class="card-body">
                                <p class="">Tiket ini diberikan kepada</p>
                              <h4 class="card-title">{{ $p->pemohon->name }}</h4>
                              <p class="card-text">Silahkan anda datang pada tanggal {{ date('d F Y', strtotime($p->tanggal_pengajuan)); }} <br> <b>Shift {{ $p->shift->shift }}</b></p>
                              <small>{{ $p->shift->jam_masuk }} -> {{ $p->shift->jam_keluar }}</small>
                            </div>
                          </div>
                      </details></td>
                      <td>{{ $p->status}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
                  </div>
            </div>
           </div>
            @endif
            @if ($userTolak)
            <div id="accordion">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-nav text-decoration-none" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <h3 class="heading-3">Anda memiliki {{ $userTolak_count }} pengajuan yang ditolak</h3>
                      </button>
                    </h5>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                     <div class="card-body">
        <table class="table" style="color:red; font-style:italic;">
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
                @foreach ($userTolak as $p)
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
            @endif
            @endcan
                  @can('admin')
                  @if ($hitungBaris)

                  <div id="accordion">
                    <div class="card">
                      <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                          <button class="btn btn-nav text-decoration-none" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <h3 class="heading-3">Terdapat Pengajuan baru sebanyak {{ $hitungBaris }} orang</h3>
                          </button>
                        </h5>
                      </div>
                      <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
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
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($pengajuan as $p)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        @if ($p->pemohon->foto_self)
                        <td><img src="/storage/{{ $p->pemohon->foto_self }}" width="50" height="50" style="border-radius:50%" alt="" srcset=""></td>
                        @else
                        <td><img src="/img/user.png" width="50" height="50" style="border-radius:50%" alt="" srcset=""></td>
                        @endif
                        <td>{{ $p->pemohon->nik}}</td>
                        <td>{{ $p->pemohon->name}}</td>
                        <td>{{ $p->pemohon->alamat}}</td>
                        <td>{{ $p->deskripsi}}</td>
                        <td><details>
                            <summary class="summary">Lihat Data</summary>
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="/storage/{{ $p->pemohon->foto_ktp }}" data-lightbox="foto_ktp">
                                        <img src="/storage/{{ $p->pemohon->foto_ktp }}" class="img-fluid" alt="" srcset="">
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/storage/{{ $p->pemohon->kartu_keluarga }}" data-lightbox="kartu_keluarga">
                                        <img src="/storage/{{ $p->pemohon->kartu_keluarga }}" class="img-fluid" alt="" srcset="">
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/storage/{{ $p->pemohon->akta_kelahiran }}" data-lightbox="akta_kelahiran">
                                        <img src="/storage/{{ $p->pemohon->akta_kelahiran }}" class="img-fluid" alt="" srcset="">
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/storage/{{ $p->surat_kehilangan }}" data-lightbox="surat_kehilangan">
                                        <img src="/storage/{{ $p->surat_kehilangan }}" class="img-fluid" alt="" srcset="">
                                    </a>
                                </div>
                            </div>
                          </details></td>
                          <form action="/dashboard/{{ $p->id }}" method="post">
                              @method('put')
                              @csrf
                        <td><select name="shift_id" id="shift_id">
                            <option value="">Pilih Shift</option>
                            @foreach ($shift as $s)
                                <option value="{{ $s->id }}">Shift {{ $s->shift }}</option>
                            @endforeach

                        </select></td>
                        <td><button class="btn btn-success" type="submit"><i class="bi bi-check-circle"></i></button></td>
                    </form>
                        <form action="/dashboard/tolak-pengajuan/{{ $p->id }}" method="POST">
                            @csrf
                            @method('put')
                            <td><button class="btn btn-danger" type="submit" onclick="confirm('Apakah anda yakin ?')"><i class="bi bi-x-circle"></i></button></td>
                          </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @error('shift_id')
<p class="text-center text-danger">{{ $message }}</p>
                  @enderror
        </div>
                      </div>
                </div>
               </div>


               @endif
               @if ($adminTerima)
               @if (!$hitungBaris)
               <div class="d-flex flex-column justify-content-center align-items-center quote_tengah">
                <h1 class="display-5">Hari ini tidak ada pengajuan yang harus di konfirmasi &#128526;</h1>
                <p class="lead fs-3">Bring you coffee, keep focus on your work!</p>
            </div>
               @endif
               <div id="accordion">
                   <div class="card">
                     <div class="card-header" id="headingOne">
                       <h5 class="mb-0">
                         <button class="btn btn-nav text-decoration-none" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                           <h3 class="heading-3">Anda memiliki {{ $adminTerima_count }} pengajuan yang diterima</h3>
                         </button>
                       </h5>
                     </div>
                     <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
           <table class="table" style="color:green; font-style:italic;">
               <thead>
                 <tr>
                   <th scope="col">#</th>
                   <th scope="col">Foto</th>
                   <th scope="col">NIK</th>
                   <th scope="col">Nama</th>
                   <th scope="col">Alamat</th>
                   <th scope="col">Tanggal Pengajuan</th>
                   <th scope="col">Deskripsi Kehilangan</th>
                   <th scope="col">Tiket Antri</th>
                   <th scope="col" style="text-transform:uppercase">Status</th>
                 </tr>
               </thead>
               <tbody>
                   @foreach ($adminTerima as $p)
                   <tr>
                       <th scope="row">{{ $loop->iteration }}</th>
                       <td><img src="/storage/{{ $p->pemohon->foto_self }}" width="50" height="50" style="border-radius:50%" alt="" srcset=""></td>
                       <td>{{ $p->pemohon->nik}}</td>
                       <td>{{ $p->pemohon->name}}</td>
                       <td>{{ $p->pemohon->alamat}}</td>
                       <td>{{ date('d F Y', strtotime($p->tanggal_pengajuan)); }}</td>
                       <td>{{ $p->deskripsi}}</td>
                       <td><details>
                           <summary class="summary">Lihat Data</summary>
                           <div class="card text-white bg-info mb-3 text-center" style="max-width: 18rem;">
                               <div class="card-header">Tiket Antrian</div>
                               <div class="card-body">
                                   <p class="">Tiket ini diberikan kepada</p>
                                 <h4 class="card-title">{{ $p->pemohon->name }}</h4>
                                 <p class="card-text">Silahkan anda datang pada tanggal {{ date('d F Y', strtotime($p->tanggal_pengajuan)); }} <br> <b>Shift {{ $p->shift->shift }}</b></p>
                                 <small>{{ $p->shift->jam_masuk }} -> {{ $p->shift->jam_keluar }}</small>
                               </div>
                             </div>
                         </details></td>
                         <td>{{ $p->status}}</td>
                   </tr>
                   @endforeach
               </tbody>
           </table>
       </div>
                     </div>
               </div>
              </div>
               @endif
               @if ($adminTolak)
               <div id="accordion">
                   <div class="card">
                     <div class="card-header" id="headingFive">
                       <h5 class="mb-0">
                         <button class="btn btn-nav text-decoration-none" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                           <h3 class="heading-3">Anda memiliki {{ $adminTolak_count }} pengajuan yang ditolak</h3>
                         </button>
                       </h5>
                     </div>
                     <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                        <div class="card-body">
           <table class="table" style="color:red; font-style:italic;">
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
                   @foreach ($adminTolak as $p)
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
               @endif
                  @endcan
        </div>
    </main>

  </div>
</div>
<script>
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
            $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
@endsection
