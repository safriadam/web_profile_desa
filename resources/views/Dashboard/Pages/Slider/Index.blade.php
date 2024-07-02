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
            {{-- <tbody>
                @foreach ($categories as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->name }}</td>
                        <td class="text-end">
                            <a href="/dashboard/kategori/{{ $post->slug }}/edit" class="badge bg-warning"><span
                                    data-feather="edit"></span></a>
                            <form action="/dashboard/kategori/{{ $post->slug }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0"
                                    onclick="return confirm('Apakah Anda yakin menghapus data kategori {{ $post->name }}?')"><span
                                        data-feather="trash"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody> --}}
        </table>
    </div>
@endsection
