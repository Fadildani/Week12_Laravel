@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-sm-8 col-md-6">
            <h1 class="h2 pt-4">Edit Foto</h1>
            <hr>

            <form action="{{ url('/foto/'.$foto->id) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf

                {{-- Title --}}
                <div class="form-group">
                    <label for="title">Judul Foto</label>
                    <input 
                        type="text"
                        class="form-control @error('title') is-invalid @enderror"
                        id="title" 
                        name="title"
                        value="{{ old('title') ?? $foto->title }}"
                    >
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Preview Gambar Lama --}}
                <div class="form-group mt-3">
                    <label>Gambar Saat Ini</label><br>
                    <img 
                        src="{{ asset('uploads/'.$foto->image) }}" 
                        alt="Foto Lama" 
                        width="200"
                        class="img-thumbnail"
                    >
                </div>

                {{-- Upload Gambar Baru --}}
                <div class="form-group mt-3">
                    <label for="image">Ganti Gambar</label>
                    <input 
                        type="file"
                        class="form-control @error('image') is-invalid @enderror"
                        id="image" 
                        name="image"
                    >
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary my-3">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection