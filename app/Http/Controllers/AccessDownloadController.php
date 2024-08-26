<?php

namespace App\Http\Controllers;

use App\Models\AllFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccessDownloadController extends Controller
{
    public function index()
    {
        $allFiles = AllFiles::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.informasi.downloads.index', compact('allFiles'));
    }

    public function create()
    {
        return view('admin.informasi.downloads.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'file' => 'required|file|mimes:pdf|max:5120',
        ]);
        if ($request->file('file')) {
            $getSize = $request->file('file')->getSize();
            $validatedData['file'] = $request->file('file')->store('download-files');
        }
        $validatedData['size'] = $getSize;
        AllFiles::create($validatedData);
        return redirect()->route('admin.download.index')->with('success', 'Data Berhasil DiBuat!');
    }
    public function edit(AllFiles $allFile)
    {
        return view('admin.informasi.downloads.edit', compact('allFile'));
    }
    public function update(Request $request, AllFiles $allFile)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'file' => 'nullable|file|mimes:pdf|max:5120',
        ]);
        if ($request->file('file')) {
            if ($request->oldFile) {
                Storage::delete($request->oldFile);
            }
            $getSize = $request->file('file')->getSize();
            $validatedData['file'] = $request->file('file')->store('download-files');
            $validatedData['size'] = $getSize;
        }
        $allFile->update($validatedData);
        return redirect()->route('admin.download.index')->with('success', 'Data Berhasil Di Update!');
    }

    public function destroy(AllFiles $allFile)
    {
        if ($allFile->file) {
            Storage::delete($allFile->file);
        }
        $allFile->delete();
        return redirect()->back()->with('success', 'Data Berhasil Di Hapus!');
    }
}
