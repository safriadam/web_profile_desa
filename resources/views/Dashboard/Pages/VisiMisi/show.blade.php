@extends('Dashboard.Layouts.Index')
@section('Pages')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
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
    <div class="col-lg-8">
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
        <hr>
        <div id="input-container">
            <div class="mb-3">
                <label for="misi" class="form-label">Misi</label>
                @if ($misi->isEmpty())
                    <h6>Misi tidak tersedia</h6>
                @else
                    @foreach ($misi as $item)
                        <div class="d-flex mb-2">
                            <input type="text" readonly class="form-control bg-white @error('misi') is-invalid @enderror"
                                id="misi" name="misi" required autofocus value="{{$item->value}}">
                            <button class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#updateMisi{{$item->id}}">
                                <span data-feather="edit"></span>
                            </button>
                            <a href="/dashboard/deleteMisi/{{$item->id}}" class="btn btn-danger"><span data-feather="trash-2"></span></a>
                        </div>
                        <div class="modal fade" id="updateMisi{{$item->id}}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title">Update Misi</h6>
                                        <button class="btn-close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/dashboard/updateMisi/{{$item->id}}" method="post">
                                            @csrf
                                            <label for="updateMisi" class="form-label">Misi</label>
                                            <input type="text" class="form-control" name="updateMisi" value="{{$item->value}}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
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
