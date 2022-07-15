@extends('dashboard.layouts.main')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pengajuan</h1>
      </div>
      <div class="col-md-6">
          <form method="post" action="/dashboard/pengajuan" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="tanggal_pengajuan" class="form-label">Tanggal Pengajuan</label>
              <input type="date" class="form-control @error('tanggal_pengajuan') is-invalid @enderror" id="tanggal_pengajuan" value="{{ old('tanggal_pengajuan') }}" name="tanggal_pengajuan" min="{{ $now->format('Y-m-d') }}">
            </div>
            @error('tanggal_pengajuan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            <div class="mb-3">
              <label for="pemohon" class="form-label">Pemohon</label>
              <input type="text" class="form-control" value={{ auth()->user()->name }} disabled>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Foto Surat Kehilangan</label>
                <input class="form-control  @error('surat_kehilangan') is-invalid @enderror" type="file" id="surat_kehilangan" name="surat_kehilangan">
              </div>
              @error('surat_kehilangan')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            <div class="form-floating">
                <textarea class="form-control  @error('deskripsi') is-invalid @enderror" placeholder="Berikan deskripsi kehilangan..." id="deskripsi" name="deskripsi" style="height: 100px">{{ old('deskripsi') }}</textarea>
                <label for="deskripsi">Deskripsi</label>
                @error('deskripsi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
          </form>
      </div>
    </main>

@endsection
