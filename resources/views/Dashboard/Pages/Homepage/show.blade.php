@extends('Dashboard.Layouts.Index')
@section('Pages')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>

    <div class="modal fade" id="updateData" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Atur Visi</h6>
                    <button class="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form action="/dashboard/updateData" method="post">
                        @csrf
                        <label for="addVisi" class="form-label">Sejak Tahun</label>
                        <input class="form-control" type="number" name="tahun" required value="{{ $tahun }}">
                        <label for="addVisi" class="form-label">Jumlah Desa</label>
                        <input class="form-control" type="number" name="desa" required value="{{ $desa }}">
                        <label for="addVisi" class="form-label">Jumlah Penduduk</label>
                        <input class="form-control" type="number" name="penduduk" required value="{{ $penduduk }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalVisi" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Atur Visi</h6>
                    <button class="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form action="/dashboard/updateVisi" method="post">
                        @csrf
                        <label for="addVisi" class="form-label">Visi</label>
                        <textarea name="addVisi" class="form-control" rows="3">{{ $visi ?? '' }}</textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="namaCamat" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Atur Visi</h6>
                    <button class="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form action="/dashboard/updateNamaCamat" method="post">
                        @csrf
                        <label for="camat" class="form-label">Nama Camat</label>
                        <input type="text" class="form-control" name="namaCamat" value="{{ $camat ?? '' }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="fotoCamat" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Atur Visi</h6>
                    <button class="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form action="/dashboard/updateFotoCamat" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="camat" class="form-label">Foto Camat</label>
                        <input type="file" class="form-control" name="fotoCamat" value="{{ $fotoCamat ?? '' }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="fotoPengurus" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Atur Visi</h6>
                    <button class="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form action="/dashboard/updateFotoPengurus" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="camat" class="form-label">Foto Pengurus</label>
                        <input type="file" class="form-control" name="fotoPengurus" value="{{ $fotoPengurus ?? '' }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="mb-3">
            <div class="mb-2">
                <label for="tahun" class="form-label">Sejak Tahun</label>
                <div class="d-flex mb-2">
                    <input type="number" readonly class="form-control bg-white @error('misi') is-invalid @enderror"
                        id="misi" name="tahun" required autofocus value="{{ $tahun }}">

                </div>
            </div>
            <div class="mb-2">
                <label for="tahun" class="form-label">Jumlah Desa</label>
                <div class="d-flex mb-2">
                    <input type="number" readonly class="form-control bg-white @error('misi') is-invalid @enderror"
                        required autofocus value="{{ $desa }}">

                </div>
            </div>
            <div class="mb-2">
                <label for="tahun" class="form-label">Jumlah Penduduk</label>
                <div class="d-flex mb-2">
                    <input type="number" readonly class="form-control bg-white @error('misi') is-invalid @enderror"
                        required autofocus value="{{ $penduduk }}">

                </div>
            </div>
        </div>
        <button class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#updateData">
            <span data-feather="edit"></span>
        </button>
        <hr>
        {{-- AREA KERJA --}}
        <div class="mb-3">
            <div class="mb-2">
                <label for="tahun" class="form-label">Nama Camat</label>
                <div class="d-flex mb-2">
                    <input type="text" readonly class="form-control bg-white @error('misi') is-invalid @enderror"
                        id="misi" name="namaCamat" required autofocus value="{{ $camat }}">
                    <button class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#namaCamat">
                        <span data-feather="edit"></span>
                    </button>
                </div>
            </div>
            <div class="mb-2">
                <label for="tahun" class="form-label">Foto Camat <span><i>(Gambar Persegi)</i></span></label>
                <div class="d-flex mb-2">
                    <img src="{{ asset('assets/homepage/' . $fotoCamat) }}" alt="Foto Camat" class="w-25">
                    <button class="btn btn-primary mx-2 align-self-center" data-bs-toggle="modal"
                        data-bs-target="#fotoCamat">
                        <span data-feather="edit"></span>
                    </button>
                </div>
            </div>
            <div class="mb-2">
                <label for="tahun" class="form-label">Foto Pengurus <span><i>(Gambar Landscape)</i></span></label>
                <div class="d-flex mb-2">
                    <img src="{{ asset('assets/homepage/' . $fotoPengurus) }}" alt="Foto Camat" class="w-50">
                    <button class="btn btn-primary mx-2 align-self-center" data-bs-toggle="modal"
                        data-bs-target="#fotoPengurus">
                        <span data-feather="edit"></span>
                    </button>
                </div>
            </div>
            {{-- <div class="mb-2">
                <label for="tahun" class="form-label">Foto Pengurus</label>
                <div class="d-flex mb-2">
                    <input type="text" readonly class="form-control bg-white @error('misi') is-invalid @enderror"
                        id="misi" name="tahun" required autofocus value="{{$desa}}">
                    <button class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#updateDesa}">
                        <span data-feather="edit"></span>
                    </button>
                </div>
            </div>
            <div class="mb-2">
                <label for="tahun" class="form-label">Foto Camat</label>
                <div class="d-flex mb-2">
                    <input type="text" readonly class="form-control bg-white @error('misi') is-invalid @enderror"
                        id="misi" name="tahun" required autofocus value="{{$penduduk}}">
                    <button class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#updatePenduduk">
                        <span data-feather="edit"></span>
                    </button>
                </div>
            </div> --}}
        </div>
        <hr>
        {{-- AREA KERJA --}}
        <div class="mb-3">
            <div class="mb-2">
                <label for="visi" class="form-label">Visi</label>
                <textarea class="form-control bg-white" rows="3" readonly>{{ $visi ?? '' }}</textarea>
            </div>
            <div class="d-flex">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalVisi">
                    <span data-feather="edit"></span>
                </button>
                <a href="/dashboard/deleteVisi" class="btn btn-danger mx-2"><span data-feather="trash-2"></span></a>
            </div>
        </div>
        <div id="input-container">
            <div class="mb-3">
                <label for="misi" class="form-label">Misi</label>
                @if ($misi->isEmpty())
                    <h6>Misi tidak tersedia</h6>
                @else
                    @foreach ($misi as $item)
                        <div class="d-flex mb-2">
                            <input type="text" readonly
                                class="form-control bg-white @error('misi') is-invalid @enderror" id="misi"
                                name="misi" required autofocus value="{{ $item->value }}">
                            <button class="btn btn-primary mx-2" data-bs-toggle="modal"
                                data-bs-target="#updateMisi{{ $item->id }}">
                                <span data-feather="edit"></span>
                            </button>
                            <a href="/dashboard/deleteMisi/{{ $item->id }}" class="btn btn-danger"><span
                                    data-feather="trash-2"></span></a>
                        </div>
                        <div class="modal fade" id="updateMisi{{ $item->id }}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title">Update Misi</h6>
                                        <button class="btn-close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/dashboard/updateMisi/{{ $item->id }}" method="post">
                                            @csrf
                                            <label for="updateMisi" class="form-label">Misi</label>
                                            <input type="text" class="form-control" name="updateMisi"
                                                value="{{ $item->value }}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <button type="button" id="tambah_misi" class="btn btn-success mb-3" data-bs-toggle="modal"
                data-bs-target="#modalMisi">
                <span data-feather="plus-circle"></span> Tambah Misi
            </button>
        </div>
        <input hidden type="text" class="form-control" id="slug" name="slug" required
            value="{{ old('slug') }}">
    </div>
    <div class="modal fade" id="modalMisi" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Tambah Misi</h6>
                    <button class="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form action="/dashboard/addMisi" method="post">
                        @csrf
                        <label for="addMisi" class="form-label">Misi</label>
                        <input type="text" class="form-control" name="addMisi">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', function() {
            fetch('/dashboard/kategori/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
@endsection
