@extends('Guest.Layouts.Index')
@section('Pages')
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn"
        style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ asset('assets/img/header.jpg') }}) center center no-repeat; background-size: cover;"
        data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-3">{{ $title }}</h1>
        </div>
    </div>
    <div class="container">
        <div class="card p-5">
            <h3>Tentang Kecamatan Galing</h3>
            <p class="fst-italic text-dark">"{{$deskripsi->value ?? ''}}"</p>
        </div>
        <div class="card p-5 mt-5">
            <h3>Visi</h3>
            <p class="fst-italic text-dark">"{{$visi->value ?? ''}}"</p>
        </div>

        <div class="card p-5 mt-5">
            <h3>Misi</h3>
            <ol>
                @foreach ($misi as $item)
                    <li class="text-dark">{{$item->value}}</li>
                @endforeach
            </ol>
        </div>
    </div>
@endsection
