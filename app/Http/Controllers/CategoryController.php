<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        // Hanya admin yang bisa mengakses route ini
        $this->middleware('auth');
        $this->middleware('can:admin'); 
    }

    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image',
        ]);

        $image = $request->file('image')->store('category_images');

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => str_slug($request->name),
            'image' => $image,
        ]);

        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index');
    }

    public function show($slug)
{
    // Cari kategori berdasarkan slug
    $category = Category::where('slug', $slug)->first();
    return view('category.show', compact('category'));

    if (!$category) {
        // Jika kategori tidak ditemukan, kembalikan 404
        abort(404, 'Kategori tidak ditemukan.');
    }

    $galleries = $category->galleries; 
   
    return view('categories.show', compact('category', 'galleries'));
}


    public function adat()
    {
        // Logika untuk menampilkan galeri adat
        return view('category.adat');
    }

    public function tarian()
    {
        // Logika untuk menampilkan galeri tarian khas
        return view('category.tarian');
    }

    public function makanan()
    {
        // Logika untuk menampilkan galeri makanan khas
        return view('category.makanan');
    }
}


