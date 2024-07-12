<style>
    .wrap {
    width: 100%; /* Menentukan lebar maksimal elemen */
    word-wrap: break-word; /* Membungkus kata-kata panjang */
    white-space: pre-wrap; /* Menjaga spasi dan baris baru */
    }
</style>
@extends('Guest.Layouts.Index')
@section('Pages')
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn"
        style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ asset('assets/img/'. $header) }}) center center no-repeat; background-size: cover;"
        data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">Sambutan Camat</h1>
        </div>
    </div>
    <div class="container mx-auto text-center">
        <h3>SAMBUTAN CAMAT</h3>
        <br>
        <br>
        <div class="mb-2">
            <img class="rounded-circle" src="{{ asset('assets/homepage/' . $fotoCamat) }}" alt=""
                style="width: 40vh; height: 40vh;">
        </div>
        <br>
        <h5>{{ $camat }}</h5>
        <p>CAMAT GALING</p>
        <div class="px-5">
            <p class="wrap" style="text-align: justify">       {{$sambutan}}</p>
        </div>
        <br><br>
        <p>Galing, {{$tanggal}}</p>
        <p>Camat Galing</p>
        <br><br><br>
        <p class="fw-bold">{{ $camat }}</p>
        <p>NIP. {{$nip}}</p>

    </div>
@endsection
