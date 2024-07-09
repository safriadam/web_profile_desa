@extends('Dashboard.Layouts.Index')
@section('Pages')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>
    <div class="col-lg-8">
        <form method="POST" action="/dashboard/slider/upload" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Pilih Gambar</label>
                <input type="file" class="form-control @error('name') is-invalid @enderror" id="name" name="image" required>
                <label for="ket" class="form-label">Keterangan</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="ket" name="keterangan" required>
                {{-- @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror --}}
            </div>
            {{-- <input hidden type="text" class="form-control" id="slug" name="slug" required value="{{ old('slug') }}"> --}}

            <a href="/dashboard/slider" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    {{-- <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', function() {
            fetch('/dashboard/kategori/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script> --}}
@endsection
