@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="pt-4 d-flex justify-content-end align-items-center">
                <h1 class="h2 mr-auto">
                    Info Foto: {{ $foto->title }}
                </h1>

                <a href="{{ url('/foto/'.$foto->id.'/edit') }}" class="btn btn-primary">
                    Edit
                </a>

                <form action="{{ url('/foto/'.$foto->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-3">Hapus</button>
                </form>
            </div>

            <hr>

            @if(session()->has('pesan'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('pesan') }}
                </div>
            @endif

            <ul>
                <li>Judul Foto: {{ $foto->title }}</li>
                <li>
                    Gambar:
                    <br>
                    <img 
                        src="{{ asset('uploads/'.$foto->image) }}" 
                        alt="{{ $foto->title }}" 
                        width="300"
                        class="img-thumbnail mt-2"
                    >
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection