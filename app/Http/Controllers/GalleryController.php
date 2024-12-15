<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $categories = Category::all();  
        return view('home', compact('categories')); 
    }

    public function showCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();

    if (!$category) {
        abort(404); 
    }
    return view('gallery.category', compact('category'));
    return view('categories.show', ['category' => $category]);

    $galleries = Gallery::where('kategori', $slug)->get();
    return view('categories.index', compact('galleries'));
       }

   public function show($slug)
{
    $category = Category::where('slug', $slug)->first();
    return view('gallery.show', compact('category'));
}

    public function createGallery($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        return view('admin.add-gallery', compact('category'));
    }

    public function storeGallery(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);

        $imagePath = $request->file('image')->store('galleries', 'public');

        $gallery = new Gallery([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        $category->galleries()->save($gallery);

        return redirect()->route('category', ['category' => $slug])->with('success', 'Gallery added successfully!');
    }

    public function editGallery($slug, $id)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $gallery = Gallery::findOrFail($id);
        return view('admin.edit-gallery', compact('category', 'gallery'));
    }

    public function updateGallery(Request $request, $slug, $id)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('galleries', 'public');
            $gallery->image = $imagePath;
        }

        $gallery->name = $request->name;
        $gallery->description = $request->description;
        $gallery->save();

        return redirect()->route('category', ['category' => $slug])->with('success', 'Gallery updated successfully!');
    }

    public function deleteGallery($slug, $id)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $gallery = Gallery::findOrFail($id);

        $gallery->delete();

        return redirect()->route('category', ['category' => $slug])->with('success', 'Gallery deleted successfully!');
    }
}
