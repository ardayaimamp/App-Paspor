@extends('dashboard.layouts.main')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Hi, {{ auth()->user()->name }}</h1>
    </div>
    <p class="lead">Inilah sekilas di tanggal {{ $now->format('d F Y') }}</p>
    <div class="row mt-5">
        <div class="col-md-9">
            <div id="accordion">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-nav text-decoration-none" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <h3 class="heading-3">Terdapat Pemohon baru sebanyak 1 orang</h3>
                      </button>
                    </h5>
                  </div>
                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                     <div class="card-body">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Foto</th>
                <th scope="col">NIK</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td><img src="/storage/{{ $users->foto_self }}" width="50" height="50" style="border-radius:50%" alt="" srcset=""></td>
                    <td>{{ $users->nik }}</td>
                    <td>{{ $users->name }}</td>
                    <td>{{ $users->alamat }}</td>
                    <td>{{ $users->jenis_kelamin }}</td>
                    <td>{{ $users->email }}</td>
                    <td><button class="btn btn-primary" onclick=" Swal.fire({
                        title: 'Foto KTP {{ $users->name }}',
                        imageUrl: '/storage/{{ $users->foto_ktp }}',
                        imageHeight: 600,
                        imageWidth: 400,
                        imageAlt: 'A tall image',
                                  })"><i class="bi bi-x-circle"></i></button></td>
                    <td><a class="btn btn-info text-light"><i class="bi bi-pencil-square"></i></a></td>
                    <td><button class="btn btn-danger" onclick="deleteConfirm()"><i class="bi bi-x-circle"></i></button></td>
                </tr>
            </tbody>
          </table>
    </div>
                  </div>
                </div>
               </div>
        </div>
    </main>

  </div>
</div>
<script>
    function deleteConfirm(){
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
        })
    }
</script>
@endsection
