@extends('dashboard.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Edit Profil</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <form method="post" action="/dashboard/profil/{{ auth()->user()->id }}" enctype="multipart/form-data">
                @method('put')
                @csrf
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
    <div class="row g-3">
        <div class="col-md-6">
                <div class="mb-3">
                  <label for="nik" class="form-label">NIK</label>
                  <input type="text" class="form-control" id="nik" name="nik" value="{{ auth()->user()->nik }}">
                </div>
                <div class="mb-3">
                  <label for="name" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ auth()->user()->alamat }}">
                  </div>
                  <div class="mb-3">
                      <label for="alamat" class="form-label">Jenis Kelamin</label>
                      <select class="form-select w-50" id="jenis_kelamin" name="jenis_kelamin" required>
                          <option selected disabled value="">Pilih Jenis Kelamin</option>
                          @if(auth()->user()->jenis_kelamin === "Laki-Laki")
                          <option value="Laki-Laki" selected>Laki-Laki</option>
                          <option value="Perempuan">Perempuan</option>
                          @else
                          <option value="Laki-Laki">Laki-Laki</option>
                          <option value="Perempuan" selected>Perempuan</option>
                          @endif
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Email</label>
                        <input type="text" class="form-control w-50" id="email" name="email" value="{{ auth()->user()->email }}">
                      </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <div class="row justify-content-center">
                            <img src="/storage/{{ auth()->user()->foto_ktp }}" class="img-fluid img-preview" style="width: 200px">
                            <label for="" class="d-block text-center">Foto KTP</label>
                        </div>
                        <label for="alamat" class="form-label">Foto KTP</label>
                        <input type="hidden" name="oldImage" value="{{ auth()->user()->foto_ktp }}">
                        <input type="file" class="form-control" id="foto_ktp" name="foto_ktp" onchange="previewImage()">
                    </div>
                    <div class="mb-3">
                        <div class="row justify-content-center">
                            <img src="/storage/{{ auth()->user()->akta_kelahiran }}" class="img-fluid img-preview-ak" style="width: 200px">
                            <label for="" class="d-block text-center">Foto Akta Kelahiran</label>
                        </div>
                        <label for="alamat" class="form-label">Foto Akta Kelahiran</label>
                        <input type="hidden" name="oldImage3" value="{{ auth()->user()->akta_kelahiran }}">
                        <input type="file" class="form-control" id="akta_kelahiran" name="akta_kelahiran" onchange="previewImage3()">
                    </div>
                    <div class="mb-3">
                        <div class="row justify-content-center">
                            <img src="/storage/{{ auth()->user()->kartu_keluarga }}" class="img-fluid img-preview-kk" style="width: 200px">
                            <label for="" class="d-block text-center">Foto Kartu Keluarga</label>
                        </div>
                        <input type="hidden" name="oldImage2" value="{{ auth()->user()->kartu_keluarga }}">
                        <label for="alamat" class="form-label">Foto Kartu Keluarga</label>
                        <input type="file" class="form-control" id="kartu_keluarga" name="kartu_keluarga" onchange="previewImage2()">
                    </form>
            </div>
          </div>
      </div>
    </main>
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
          const image = document.querySelector('#kartu_keluarga');
          const imgPreview = document.querySelector('.img-preview-kk');

          imgPreview.style.display = 'block';

          const oFReader = new FileReader();
          oFReader.readAsDataURL(image.files[0]);

          oFReader.onload = function(oFREvent){
              imgPreview.src = oFREvent.target.result;
          }
          }
          function previewImage3(){
          const image = document.querySelector('#akta_kelahiran');
          const imgPreview = document.querySelector('.img-preview-ak');

          imgPreview.style.display = 'block';

          const oFReader = new FileReader();
          oFReader.readAsDataURL(image.files[0]);

          oFReader.onload = function(oFREvent){
              imgPreview.src = oFREvent.target.result;
          }
          }
  </script>
@endsection
