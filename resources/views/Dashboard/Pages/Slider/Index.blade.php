@extends('Dashboard.Layouts.Index')
@section('Pages')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
        <a href="/dashboard/slider/create" class="badge bg-success"><span data-feather="plus"></span></a>
    </div>
    <div class="table-responsive col-12">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">Gambar</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gambar as $item)
                    <tr>
                        <td>
                            <img src="{{url('assets/slider/'. $item->nama_gambar)}}" style="max-width: 250px; width: 100%;">
                        </td>
                        <td>{{$item->keterangan}}</td>
                        <td>
                            <div class="d-flex">
                                {{-- <a href="" class="btn btn-success"> <span data-feather="edit"></span></a> --}}
                                <a href="slider/delete/{{$item->id}}" class="btn btn-danger mx-2"><span data-feather="trash-2"></span></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <hr>
    <h4>Gambar Utama</h4>
    <div class="mb-2">
        <label for="tahun" class="form-label">Gambar Utama <span><i>(Gambar Landscape)</i></span></label>
        <div class="d-flex mb-2">
            <img src="{{ asset('assets/img/' . $banner) ?? 'banner.png' }}" alt="Banner" class="w-50">
            <button class="btn btn-primary mx-2 align-self-center" data-bs-toggle="modal"
                data-bs-target="#mainPict">
                <span data-feather="edit"></span>
            </button>
        </div>
    </div>
    <hr>
    <h4>Gambar Tema</h4>
    <div class="mb-2">
        <label for="tahun" class="form-label">Gambar Tema <span><i>(Gambar Landscape)</i></span></label>
        <div class="d-flex mb-2">
            <img src="{{ asset('assets/img/' . $tema) ?? 'header.jpg' }}" alt="Tema" class="w-50">
            <button class="btn btn-primary mx-2 align-self-center" data-bs-toggle="modal"
                data-bs-target="#mainTema">
                <span data-feather="edit"></span>
            </button>
        </div>
    </div>
    <div class="modal fade" id="mainPict" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Atur Gambar Utama</h6>
                    <button class="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form action="/dashboard/updateBanner" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="camat" class="form-label">Atur Gambar Utama</label>
                        <input type="file" class="form-control" name="banner" value="{{ $banner->value ?? '' }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="mainTema" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Atur Gambar Tema</h6>
                    <button class="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form action="/dashboard/updateTema" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="camat" class="form-label">Atur Gambar Tema</label>
                        <input type="file" class="form-control" name="tema" value="{{ $tema->value ?? '' }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
