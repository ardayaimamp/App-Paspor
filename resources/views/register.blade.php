@extends('layouts.main')

@section('container')
<div class="container">
    <div class="row justify-content-center mt-4">
        <img src="/img/logo-nav.png" class="img-fluid img-register" style="width:10%"  alt="" srcset="">
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <main class="form-signin">
                <form method="post" action="/register" enctype="multipart/form-data">
                    @csrf
                  <h1 class="display-5 fs-2 text-center my-3 fw-normal">Silahkan isi Form Berikut</h1>
                  <div class="form-floating">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" name="name" placeholder="Nama anda..." autofocus>
                    <label for="floatingInput">Nama</label>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-floating">
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}" id="nik" name="nik" placeholder="32xxxxxxxxxxxxxx" maxlength="16">
                    <label for="floatingInput">NIK</label>
                    @error('nik')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-floating">
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" id="alamat" name="alamat" placeholder="Jl.xxx">
                    <label for="floatingInput">Alamat</label>
                    @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <select class="form-select @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                  @error('jenis_kelamin')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  <div class="my-3">
                      <label for="formFile" class="form-label">Foto KTP</label>
                      <img class="img-preview img-fluid mb-3 col-sm-5" >
                      <input class="form-control  @error('foto_ktp') is-invalid @enderror" value="{{ old('foto_ktp') }}" type="file" id="foto_ktp" name="foto_ktp" onchange="previewImage()">
                      @error('foto_ktp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    </div>
                  <div class="my-3">
                      <label for="formFile" class="form-label">Foto Profil</label>
                      <img class="img-preview-self img-fluid mb-3 col-sm-4 rounded-circle" >
                      <input class="form-control  @error('foto_self') is-invalid @enderror" value="{{ old('foto_self') }}" type="file" id="foto_self" name="foto_self" onchange="previewImage2()">
                      @error('foto_self')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    </div>
                    <div class="form-floating">
                      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" name="email" placeholder="name@example.com">
                      <label for="floatingInput">Email</label>
                      @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    </div>
                  <div class="form-floating">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <button class="w-100 mt-5 mb-5 btn btn-lg bg-nav text-light" type="submit">Sign in</button>
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
@endsection
