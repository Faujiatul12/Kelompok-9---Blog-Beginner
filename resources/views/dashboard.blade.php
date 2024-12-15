<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-5xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-3xl font-bold mb-4">Selamat datang, {{ Auth::user()->name }}!</h1>
                    <p class="mb-8">Anda dapat mengakses kategori galeri budaya yang telah disediakan.</p>

                    @if(Auth::user()->is_admin)
                        <div class="mt-4 mb-8">
                            <a href="{{ route('categories.create') }}" class="btn btn-primary px-6 py-3 rounded-full bg-blue-600 text-white hover:bg-blue-700 transition">Tambah Kategori</a>
                        </div>
                    @endif

                    <!-- Daftar Kategori Galeri Budaya -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-6">
                        <!-- Kategori Adat -->
                        <div class="category-card p-4 bg-white rounded-lg shadow-lg hover:shadow-2xl transition-all">
                            <img src="{{ asset('images/images.jpeg') }}" alt="Adat" class="w-full h-48 object-cover rounded-t-lg mb-4">
                            <h3 class="text-xl font-semibold mb-2">Adat</h3>
                            <a href="{{ route('category.adat') }}" class="btn btn-success px-6 py-2 bg-green-600 text-white rounded-full hover:bg-green-700 transition">Lihat Galeri Adat</a>
                        </div>

                        <!-- Kategori Tarian Khas -->
                        <div class="category-card p-4 bg-white rounded-lg shadow-lg hover:shadow-2xl transition-all">
                            <img src="{{ asset('images/tarian.jpeg') }}" alt="Tarian" class="w-full h-48 object-cover rounded-t-lg mb-4">
                            <h3 class="text-xl font-semibold mb-2">Tarian Khas</h3>
                            <a href="{{ route('category.tarian') }}" class="btn btn-success px-6 py-2 bg-green-600 text-white rounded-full hover:bg-green-700 transition">Lihat Galeri Tarian Khas</a>
                        </div>

                        <div class="category-card p-4 bg-white rounded-lg shadow-lg hover:shadow-2xl transition-all">
                            <img src="{{ asset('images/makanan.jpeg') }}" alt="Makanan Khas" class="w-full h-48 object-cover rounded-t-lg mb-4">
                            <h3 class="text-xl font-semibold mb-2">Makanan Khas</h3>
                            <a href="{{ route('category.makanan') }}" class="btn btn-success px-6 py-2 bg-green-600 text-white rounded-full hover:bg-green-700 transition">Lihat Galeri Makanan Khas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CSS -->
    <style>
        .category-card {
            transition: all 0.3s ease;
        }

        .category-card:hover {
            transform: scale(1.05);
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
        }

        .category-card img {
            transition: transform 0.3s ease;
        }

        .category-card img:hover {
            transform: scale(1.1);
        }

        .btn-success {
            background-color: #4CAF50;
            color: white;
            padding: 12px 24px;
            border-radius: 30px;
            text-align: center;
            font-size: 1rem;
            display: inline-block;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-success:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

        .btn-primary {
            background-color: #1D4ED8;
            color: white;
            padding: 12px 24px;
            border-radius: 30px;
            font-size: 1rem;
            text-align: center;
            display: inline-block;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #1E40AF;
            transform: scale(1.05);
        }

        /* Desain grid responsif */
        .grid {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 20px;
        }

        @media screen and (min-width: 640px) {
            .grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media screen and (min-width: 1024px) {
            .grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
    </style>
</x-app-layout>
