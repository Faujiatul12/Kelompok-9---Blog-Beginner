<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Budaya di {{ $city }}</title>
</head>
<body>
    <h1>Galeri Budaya di {{ $city }}</h1>
    
    @foreach ($galleries as $gallery)
        <div>
            <h3>{{ $gallery->title }}</h3>
            <p>{{ $gallery->description }}</p>
            <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}">
        </div>
    @endforeach
</body>
</html>
