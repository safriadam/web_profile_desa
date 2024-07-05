@extends('Guest.Layouts.Index')
@section('Pages')
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn"
        style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ asset('assets/img/header.jpg') }}) center center no-repeat; background-size: cover;"
        data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">Sambutan Camat</h1>
        </div>
    </div>
    <div class="container mx-auto text-center">
        <div class="mb-2">
            <img class="rounded-circle" src="{{ asset('assets/img/kepalaportrait.jpeg') }}" alt=""
                style="width: 40vh; height: 40vh;">
        </div>
        <br>
        <h5>SURIAWAN, S.ST., M.T.</h5>
        <p>CAMAT GALING</p>
        <hr>
        <h3>SAMBUTAN CAMAT GALING</h3>
        <br>
        <p style="align-content: stretch;" >Puji dan syukur dipanjatkan kehadirat Allah Subhanahuwa Ta’ala karena berkat limpahan rahmat-Nya jualah sehingga
            kita masih diberikan umur yang panjang lagi berkah</p>
        <p style="align-content: stretch;">Kecamatan Galing merupakan salah satu dari 19 kecamatan di Kabupaten Sambas yang merupakan penyangga (hynterland)
            daerah perbatan beik Paloh maupun Sajingan. Jumlah desa di Kecamatan Galing sebanyak 10 desa yakni, Desa Tri
            Kembang, Desa Ratu Sepudak, Desa Galing, Desa Sungai Palah, Desa Sijang, Desa Tri Gadu, Desa Tempapan Kuala,
            Desa Tempapan Hulu, Desa Teluk Pandan dan Desa Sagu. Di Kecamatan Galing terdapat 23 dusun dengan potensi yang
            ada terdiri dari pertanian, perkebunan dan perdagangan.</p>
        <p style="align-content: stretch;">Jumlah penduduk Kecamatan Galing berdasarkan Laporan dari Dinas Catatan Sipil Kabupaten Sambas Bulan Desember
            2023 berjumlah 26.002 orang dengan mayoritas beragama islam. Mata pencaharian penduduk sebagian besar merupakan
            petani dengan usaha perkebunan dan pertanian yang dominan berupa kelapa sawit, karet, padi. Sedangkan
            buah-buahan yang dominan berupa semangka.</p>
        <p>Galing merupakan kota sejarah. Dimana dahulu kerajaan Sambas pernah terpusat di Kota Lama dengan Rajanya bernama
            Ratu Sepudak. Setelah masa pemerintahan Ratu Sepudak dilanjutkan oleh Ratu Kesuma Yuda, lokasi kerajaan
            berpindah ke Selakau. Selanjutnya setelah Ratu Kesuma Yuda dilanjutkan dengan Raden Sulaiman dengan gelar
            Sulthan Tsafiuddin, barulah ibukota berpidah di Teluk Madung dan setelahnya berpindah di Muara Ulakan atau di
            Kecamatan Sambas saat ini.</p>
        <p>Semoga Website Kecamatan Galing ini bisa memberikan manfaat bagi semua.</p>
        <br><br>
        <p>Galing, 15 Juni 2024</p>
        <p>Camat Galing</p>
        <br><br><br>
        <p class="fw-bold">SURIAWAN, S.ST.,MT</p>
        <p>NIP. 19761222199703 1 004</p>

    </div>
@endsection
