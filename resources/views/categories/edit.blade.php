@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Kategori</h1>

    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') 
        <div class="form-group">
            <label for="name">Nama Kategori</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description', $category->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Gambar Kategori</label>
            <input type="file" name="image" id="image" class="form-control">
            <!-- Tampilkan gambar yang ada jika ada -->
            @if($category->image)
                <img src="{{ asset('storage/'.$category->image) }}" alt="current image" class="img-fluid mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
