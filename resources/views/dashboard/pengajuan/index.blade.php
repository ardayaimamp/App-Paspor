@extends('dashboard.layouts.main')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pengajuan</h1>
      </div>
      <div class="col-md-6">
          <form>
            <div class="mb-3">
              <label for="tanggal_pengajuan" class="form-label">Tanggal Pengajuan</label>
              <input type="date" class="form-control" id="tanggal_pengajuan" name="tanggal_pengajuan">
            </div>
            <div class="mb-3">
              <label for="pemohon" class="form-label">Pemohon</label>
              <input type="text" class="form-control" id="pemohon" name="pemohon" value={{ auth()->user()->name }} disabled>
            </div>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Berikan deskripsi kehilangan..." id="deskripsi" name="deskripsi" style="height: 100px"></textarea>
                <label for="deskripsi">Deskripsi</label>
              </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
          </form>
      </div>
    </main>
@endsection
