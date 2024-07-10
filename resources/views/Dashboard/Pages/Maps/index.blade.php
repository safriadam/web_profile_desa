<style>
    iframe {
        width: 100%;
        height: 50%;
    }
</style>
@extends('Dashboard.Layouts.Index')
@section('Pages')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>
    <div class="modal fade" id="editAlamat" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Atur Alamat</h6>
                    <button class="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form action="/dashboard/updateAlamat" method="post">
                        @csrf
                        <label for="addVisi" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="{{ $alamat ?? '' }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editTelp" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Atur Telepon</h6>
                    <button class="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form action="/dashboard/updateTelp" method="post">
                        @csrf
                        <label for="camat" class="form-label">Telepon</label>
                        <input type="number" class="form-control" name="telp" value="{{ $hp ?? '' }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editEmail" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Atur Email</h6>
                    <button class="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form action="/dashboard/updateEmail" method="post">
                        @csrf
                        <label for="camat" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $email ?? '' }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editMap" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Atur Visi</h6>
                    <button class="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form action="/dashboard/updateMap" method="post">
                        @csrf
                        <label for="camat" class="form-label">Atur Posisi</label>
                        <Textarea name="map" class="form-control">{{$maps}}</Textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <div class="col-lg-6 mb-3">
            <div class="mb-3">
                <div class="mb-2">
                    <label for="tahun" class="form-label">Lokasi Peta</label>
                    <div class="d-flex mb-2">
                            <textarea name="map" readonly id="" class="form-control" cols="30" rows="1">{{ $maps }}</textarea>
                        <button data-bs-toggle="modal" data-bs-target="#editMap" class="btn btn-primary ms-2">
                            <span data-feather="edit"></span>
                        </button>
                    </div>
                    {!! $maps !!}
                </div>
            </div>
            <div class="mb-3">
                <div class="mb-2">
                    <label for="tahun" class="form-label">Alamat</label>
                    <div class="d-flex mb-2">
                        <input type="text" class="form-control" name="alamat" value="{{$alamat}}">
                        <button data-bs-toggle="modal" data-bs-target="#editAlamat" class="btn btn-primary ms-2">
                            <span data-feather="edit"></span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="mb-2">
                    <label for="tahun" class="form-label">Telepon</label>
                    <div class="d-flex mb-2">
                        <input type="number" class="form-control" name="telepon" value="{{$hp}}">
                        <button data-bs-toggle="modal" data-bs-target="#editTelp" class="btn btn-primary ms-2">
                            <span data-feather="edit"></span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="mb-2">
                    <label for="tahun" class="form-label">Email</label>
                    <div class="d-flex mb-2">
                        <input type="email" class="form-control" name="email" value="{{$email}}">
                        <button data-bs-toggle="modal" data-bs-target="#editEmail" class="btn btn-primary ms-2">
                            <span data-feather="edit"></span>
                        </button>
                    </div>
                </div>
            </div>
            <input hidden type="text" class="form-control" id="slug" name="slug" required
                value="{{ old('slug') }}">
        </div>
    </div>
    <br>
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
