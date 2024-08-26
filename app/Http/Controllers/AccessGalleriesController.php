<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccessGalleriesController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.informasi.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.informasi.gallery.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "title" => "required|string|max:225",
            "date" => "required|date",
            "image1" => 'required|file|image|mimes:png,jpg,jpeg|max:1024',
            "image2" => 'nullable|file|image|mimes:png,jpg,jpeg|max:1024',
            "image3" => 'nullable|file|image|mimes:png,jpg,jpeg|max:1024',
            "image4" => 'nullable|file|image|mimes:png,jpg,jpeg|max:1024',
            "image5" => 'nullable|file|image|mimes:png,jpg,jpeg|max:1024',
            "image6" => 'nullable|file|image|mimes:png,jpg,jpeg|max:1024',
            "image7" => 'nullable|file|image|mimes:png,jpg,jpeg|max:1024',
            "image8" => 'nullable|file|image|mimes:png,jpg,jpeg|max:1024',
            "image9" => 'nullable|file|image|mimes:png,jpg,jpeg|max:1024',
        ]);
        if ($request->file('image1')) {
            $validatedData['image1'] = $request->file('image1')->store('gallery-images');
        }

        for ($i = 2; $i <= 9; $i++) {
            if ($request->file("image$i")) {
                $validatedData["image$i"] = $request->file("image$i")->store('gallery-images');
            }
        }
        Gallery::create($validatedData);
        return redirect()->route('admin.gallery.index')->with('success', 'Data Berhasil DiBuat!');
    }
    public function show(Gallery $gallery)
    {
        return view('admin.informasi.gallery.show', compact('gallery'));
    }
    public function edit(Gallery $gallery)
    {
        return view('admin.informasi.gallery.edit', compact('gallery'));
    }
    public function update(Request $request, Gallery $gallery)
    {
        $validatedData = $request->validate([
            "title" => "required|string|max:225",
            "date" => "required|date",
            "image1" => 'nullable|file|image|mimes:png,jpg,jpeg|max:1024',
            "image2" => 'nullable|file|image|mimes:png,jpg,jpeg|max:1024',
            "image3" => 'nullable|file|image|mimes:png,jpg,jpeg|max:1024',
            "image4" => 'nullable|file|image|mimes:png,jpg,jpeg|max:1024',
            "image5" => 'nullable|file|image|mimes:png,jpg,jpeg|max:1024',
            "image6" => 'nullable|file|image|mimes:png,jpg,jpeg|max:1024',
            "image7" => 'nullable|file|image|mimes:png,jpg,jpeg|max:1024',
            "image8" => 'nullable|file|image|mimes:png,jpg,jpeg|max:1024',
            "image9" => 'nullable|file|image|mimes:png,jpg,jpeg|max:1024',
        ]);

        for ($i = 1; $i <= 9; $i++) {
            if ($request->file("image$i")) {
                if ($request->{'oldImage' . $i}) {
                    Storage::delete($request->{'oldImage' . $i});
                }
                $validatedData["image$i"] = $request->file("image$i")->store('gallery-images');
            }
        }
        $gallery->update($validatedData);
        return redirect()->route('admin.gallery.index')->with('success', 'Data Berhasil DiUpdate!');
    }

    public function destroy(Gallery $gallery)
    {
        for ($i = 1; $i <= 9; $i++) {
            if ($gallery->{'image' . $i}) {
                Storage::delete($gallery->{'image' . $i});
            }
        }
        $gallery->delete();
        return redirect()->back()->with('success', 'Data Berhasil Di Hapus');
    }
}
