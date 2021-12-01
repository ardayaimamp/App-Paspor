@extends('layouts.main')

@section('container')
<div class="container" style="margin-top:6vh; ">
    <div class="row justify-content-center mt-lg-5">
        <div class="col-md-7">
            <h1 class="display-3">Website Pendaftaran Paspor Hilang</h1>
            <p class="lead mt-4 fs-3">Pendaftaran Pengajuan tanpa antri <b>Walk-In</b></p>
            <a href="#syarat" class="btn bg-nav fs-3 text-light px-5 fw-bold py-3">Lihat Caranya</a>
        </div>
        <div class="col-md-5 big-paspor ">
        <img src="/img/paspor-big.png" class="img-fluid" alt="">
        </div>
    </div>
</div>
<div class="container-fluid bg-sec2 pb-5">
    <div class="row mt-5 mb-4">
        <h1 class="display-5 fs-2 text-center pt-5">Kenapa Harus Pakai Website ini ?</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-3 d-flex flex-column align-items-center">
            <div style="width: 150px; height:150px; background-color:#053742"></div>
            <p class="lead mt-2 text-decoration-underline">Tanpa harus Walk-in</p>
            <p class="text-center">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi, sapiente dicta eos nulla ex dolore nisi! Nam deleniti omnis assumenda!</p>
        </div>
        <div class="col-md-3 d-flex flex-column align-items-center">
            <div style="width: 150px; height:150px; background-color:#053742"></div>
            <p class="lead mt-2 text-decoration-underline">Menghindari Calo</p>
            <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, doloremque voluptas asperiores nulla tempore ratione. Voluptate hic incidunt accusamus eius.</p>
        </div>
        <div class="col-md-3 d-flex flex-column align-items-center">
            <div style="width: 150px; height:150px; background-color:#053742"></div>
            <p class="lead mt-2 text-decoration-underline">Tanpa Capek Antri</p>
            <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, aliquid quas vel ratione nulla quam aspernatur accusantium eligendi necessitatibus! Aliquid.</p>
        </div>
        <div class="col-md-3 d-flex flex-column align-items-center">
            <div style="width: 150px; height:150px; background-color:#053742"></div>
            <p class="lead mt-2 text-decoration-underline">Jadwal Teorganisir</p>
            <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt nihil, totam aliquid possimus beatae ipsa omnis expedita natus maiores ipsam.</p>
        </div>
    </div>
</div>
<div id="syarat" class="container">
    <div class="row mt-5 mb-5 justify-content-center ">
        <h1 class="text-center display-5">Syarat & Ketentuan</h1>
        <hr class="w-50 mt-4">
        <ul>
            <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam, quod. Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste error minima delectus earum numquam animi eligendi ex corrupti distinctio explicabo!</li>
            <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam, quod. Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate optio accusantium voluptatem quod accusamus non odio natus, harum ratione voluptates.</li>
            <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam, quod. Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel saepe cum tenetur culpa provident voluptate assumenda ipsum, veniam sit dolore libero possimus? Culpa, molestias nihil ad aspernatur sint ipsum! Maiores!</li>
            <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam, quod. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Impedit voluptate, nihil delectus itaque doloremque ipsa numquam tempore laborum, atque assumenda accusamus ut ea recusandae dicta odit. Excepturi quis veniam delectus?</li>
            <dl>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores dolorum, labore quidem totam natus itaque.</dl>
            <dl>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores dolorum, labore quidem totam natus itaque.</dl>
            <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam, quod.</li>
            <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam, quod.</li>
            <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam, quod.</li>
        </ul>
    </div>
</div>
<div id="kontak" class="container-fluid bg-nav">
    <div class="row py-5">
        <h1 class="text-center text-light fw-bold display-5">Kontak Kami</h1>
        <center><hr class="w-50 mt-4 border border-2 border-light"></center>
        <div class="col-md-6 d-flex flex-column align-items-center">
            <div class="mb-3 w-75 text-light">
                <label for="exampleFormControlInput1" class="form-label">Nama anda</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Silahkan isi nama anda">
              </div>
              <div class="mb-3 w-75 text-light">
                <label for="exampleFormControlTextarea1" class="form-label">Isi pesan anda</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="10"></textarea>
              </div>
              <div class="mb-3 w-75">
                <button type="submit" class="btn btn-light" onclick="Swal.fire(
                    'Berhasil!',
                    'Pesan sudah terkirim!',
                    'success'
                  )">Kirim</button>
              </div>
        </div>
        <div class="col-md-6">
            <iframe class=" mt-4" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.32168856015!2d106.82930861521075!3d-6.221244095496498!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3f0d24e5313%3A0x52e2d048218aa52c!2sDirektorat%20Jenderal%20Imigrasi!5e0!3m2!1sen!2sid!4v1638211502200!5m2!1sen!2sid" width="800" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</div>

@endsection
