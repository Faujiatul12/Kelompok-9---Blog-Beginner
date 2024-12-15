@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Kategori</h1>

    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nama Kategori</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="image">Gambar Kategori</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
