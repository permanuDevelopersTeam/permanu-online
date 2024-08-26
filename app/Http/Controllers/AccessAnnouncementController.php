<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccessAnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.informasi.pengumuman.index', compact('announcements'));
    }

    public function create()
    {
        return view('admin.informasi.pengumuman.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "title" => "required|string|max:255",
            "date" => "required|date",
            "file" => 'required|file|mimes:pdf|max:5120',
        ]);

        if ($request->file('file')) {
            $validatedData['file'] = $request->file('file')->store('announcement-files');
        }

        Announcement::create($validatedData);
        return redirect()->route('admin.announcement.index')->with('success', 'Data Berhasil Di Buat!');
    }

    public function show(Announcement $announcement)
    {
        return view('admin.informasi.pengumuman.show', compact('announcement'));
    }

    public function edit(Announcement $announcement)
    {
        return view('admin.informasi.pengumuman.edit', compact('announcement'));
    }
    public function update(Request $request, Announcement $announcement)
    {
        $validatedData = $request->validate([
            "title" => "required|string|max:255",
            "date" => "required|date",
            "file" => 'nullable|file|mimes:pdf|max:5120',
        ]);

        if ($request->file('file')) {
            if ($request->oldFile) {
                Storage::delete($request->oldFile);
            }
            $validatedData['file'] = $request->file('file')->store('announcement-files');
        }

        $announcement->update($validatedData);
        return redirect()->route('admin.announcement.index')->with('success', 'Data Berhasil Di Update!');
    }

    public function destroy(Announcement $announcement)
    {
        if ($announcement->file) {
            Storage::delete($announcement->file);
        }
        $announcement->delete();
        return redirect()->back()->with('success', 'Data Berhasil Di Hapus!');
    }
}
