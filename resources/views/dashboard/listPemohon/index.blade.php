@extends('dashboard.layouts.main')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List Pemohon</h1>
    </div>
    <div class="col-md-8">
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
                    @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td><img src="/storage/{{ $user->foto_self }}" width="50" height="50" style="border-radius:50%" alt="" srcset=""></td>
                        <td>{{ $user->nik }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->alamat }}</td>
                        <td>{{ $user->jenis_kelamin }}</td>
                        <td>{{ $user->email }}</td>
                        <td><button class="btn btn-primary" onclick=" Swal.fire({
                            title: 'Foto KTP {{ $user->name }}',
                            imageUrl: '/storage/{{ $user->foto_ktp }}',
                            imageHeight: 600,
                            imageWidth: 400,
                            imageAlt: 'A tall image',
                                      })"><i class="bi bi-eye"></i></button></td>
                        <td><a href="/dashboard/listPemohon/{{ $user->id }}/edit" class="btn btn-info text-light" ><i class="bi bi-pencil-square"></i></a></td>
                        <td>
                            <form id="delete" action="/dashboard/listPemohon/{{ $user->id }}" method="post"  onclick="confirm('Are you sure ?')">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger">
                                    <i class="bi bi-x-circle"></i>
                                </button>
                            </form></td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
    </main>
</div>
<script>
    function deleteConfirm(){
        event.preventDefault();
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
                document.getElementById('delete');
            }
        })
    }
</script>
@endsection
