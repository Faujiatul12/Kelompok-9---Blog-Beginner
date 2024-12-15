@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $category->name }}</h1>
    <p>{{ $category->description }}</p>

    <div class="gallery">
        @foreach($galleries as $gallery)
            <div>
                <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}">
                <h3>{{ $gallery->title }}</h3>
            </div>
        @endforeach
    </div>
</div>
@endsection
