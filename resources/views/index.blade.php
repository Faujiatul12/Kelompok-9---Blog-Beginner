@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Selamat datang di Galeri Budaya Indonesia</h1>
    <h2>Pilih Kategori untuk melihat Galeri Budaya</h2>

    <div class="category-cards">
        @foreach($categories as $category)
            <div class="category-card">
                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="category-image">
                <h3>{{ $category->name }}</h3>
                <p>{{ $category->description }}</p>
                <a href="{{ route('gallery.category', $category->slug) }}" class="btn btn-success">Lihat Galeri {{ $category->name }}</a>
            </div>
        @endforeach
    </div>

    @can('admin')
        <div class="mt-4">
            <a href="{{ route('categories.create') }}" class="btn btn-primary">Tambah Kategori</a>
        </div>
    @endcan
</div>
@endsection
