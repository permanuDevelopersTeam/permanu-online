<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccessNewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.informasi.berita.index', compact('news'));
    }
    public function create()
    {
        return view('admin.informasi.berita.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "title" => "required",
            "body" => "required",
            'date' => 'required|date',
            "images" => 'required|file|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        $validatedData['author'] = 'Pengurus';

        if ($request->file('images')) {
            $validatedData['images'] = $request->file('images')->store('news-images');
        }
        News::create($validatedData);
        return redirect()->route('admin.news.index')->with('success', 'Data Berhasil Di Buat!');
    }

    public function edit(News $news)
    {
        return view('admin.informasi.berita.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validatedData = $request->validate([
            "title" => "required",
            "body" => "required",
            'date' => 'required|date',
            "images" => 'nullable|file|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        $validatedData['author'] = 'Pengurus';

        if ($request->file('images')) {
            if ($request->oldImages) {
                Storage::delete($request->oldImages);
            }
            $validatedData['images'] = $request->file('images')->store('news-images');
        }
        News::where('uuid', $news->uuid)->first()->update($validatedData);
        return redirect()->route('admin.news.index')->with('success', 'Data Berhasil Di Update!');
    }

    public function destroy(News $news)
    {
        $news->delete();
        if ($news->images) {
            Storage::delete($news->images);
        }

        return redirect()->back()->with('success', 'Data Berhasil Di Hapus!');
    }
}
