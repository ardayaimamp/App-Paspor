@extends('dashboard.layouts.main')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit User {{ $user->name }}</h1>
      </div>
      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <main class="form-signin">
                    <form class="row g-3" method="post" action="/dashboard/listPemohon/{{ $user->id }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="col-md-6">
                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">NIK</label>
                                <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik" value="{{ old('nik',$user->nik) }}" required>
                              @error('nik')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                              @enderror
                              </div>
                              <div class="col-md-6">
                                <label for="validationDefault02" class="form-label">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name',$user->name) }}" required>
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                  @enderror
                              </div>
                              <div class="col-md-12">
                                <label for="validationDefaultUsername" class="form-label">Email</label>
                                <div class="input-group w-50">
                                  <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                  @error('email')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                              @enderror
                                </div>
                              </div>
                              <div class="col-12">
                                <label for="validationDefault03" class="form-label">Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat',$user->alamat) }}" required>
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                              </div>
                              <div class="col-12">
                                <label for="validationDefault04" class="form-label">Jenis Kelamin</label>
                                <select class="form-select w-50" id="jenis_kelamin" name="jenis_kelamin" required>
                                  <option selected disabled value="">Pilih Jenis Kelamin</option>
                                  @if($user->jenis_kelamin === "Laki-Laki")
                                  <option value="Laki-Laki" selected>Laki-Laki</option>
                                  <option value="Perempuan">Perempuan</option>
                                  @else
                                  <option value="Laki-Laki">Laki-Laki</option>
                                  <option value="Perempuan" selected>Perempuan</option>
                                  @endif
                                </select>
                                @error('jenis_kelamin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                              </div>
                              <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir',$user->tanggal_lahir) }}" required>
                              @error('tanggal_lahir')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                              @enderror
                              </div>
                              <div class="col-12">
                                <button class="btn btn-primary mb-5 mt-3" type="submit">Edit Data</button>
                              </div>
                        </div>
                        <div class="col-md-6">
                                <div class="row justify-content-center">
                                    <input type="hidden" name="oldImage" value="{{ $user->foto_ktp }}">
                                    @if ($user->foto_ktp)
                                    <img class="img-preview img-fluid" style="width: 200px" src="{{ asset('storage/'. $user->foto_ktp) }}" >
                                    @else
                                    <img class="img-preview img-fluid mb-3 col-sm-5" >
                                    @endif
                                    <label for="formFile" class="form-label">Foto KTP</label>
                                    <input class="form-control @error('file_ktp') is-invalid @enderror"  type="file" id="foto_ktp" name="foto_ktp" onchange="previewImage()">
                                    @error('foto_ktp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                                <div class="row justify-content-center mt-5">
                                    <input type="hidden" name="oldImage2" value="{{ $user->foto_self }}">
                                    @if ($user->foto_self)
                                    <img class="img-preview-self img-fluid" style="width: 200px" src="{{ asset('storage/'. $user->foto_self) }}" >
                                    @else
                                    <img class="img-preview img-fluid" >
                                    @endif
                                    <label for="formFile" class="form-label">Foto Selfie</label>
                                    <input class="form-control @error('foto_self') is-invalid @enderror" type="file" id="foto_self" name="foto_self" onchange="previewImage2()">
                                    @error('foto_self')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                            </div>
                        </div>

                      </form>
                  </main>
            </div>
        </div>
    </div>
    <script>
          function previewImage(){
            const image = document.querySelector('#foto_ktp');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
            }
            function previewImage2(){
            const image = document.querySelector('#foto_self');
            const imgPreview = document.querySelector('.img-preview-self');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
            }
    </script>
    </main>
@endsection
