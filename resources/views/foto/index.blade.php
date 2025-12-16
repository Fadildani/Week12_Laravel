@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-12">

            <div class="py-4 d-flex justify-content-end align-items-center">
                <h1 class="h2 mr-auto">Tabel Foto</h1>
                <a href="{{ route('foto.create') }}" class="btn btn-primary">
                    Tambah Foto
                </a>
            </div>

            @if(session()->has('pesan'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('pesan') }}
                </div>
            @endif

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Judul Foto</th>
                        <th>Gambar</th>
                        <th>Tanggal Upload</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($foto as $foto)
                        <tr>
                            <th>{{ $loop->iteration }}</th>

                            <td>
                                <a href="{{ route('foto.show', $foto->id) }}">
                                    {{ $foto->title }}
                                </a>
                            </td>

                            <td>
                                @php
                                    $path = public_path('uploads/'.$foto->image);
                                @endphp

                                @if(file_exists($path))
                                    <img src="{{ asset('uploads/'.$foto->image) }}"
                                         class="img-thumbnail"
                                         style="max-width: 100px;">
                                @else
                                    <span class="text-danger">File tidak ditemukan</span>
                                @endif
                            </td>

                            <td>{{ $foto->created_at->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <td colspan="6" class="text-center">Tidak ada data...</td>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection