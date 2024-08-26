<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccessEventsController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.informasi.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.informasi.events.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "image1" => 'required|file|image|mimes:png,jpg,jpeg|max:2048',
            "title" => 'required|string|max:225',
            "start_event" => 'required|date',
            "end_event" => 'required|date',
            "body" => "required",
        ]);

        if ($request->file('image1')) {
            $validatedData['image1'] = $request->file('image1')->store('event-images');
        }
        $validatedData['author'] = 'Pengurus';
        $validatedData['status'] = 'ongoing';
        Event::create($validatedData);
        return redirect()->route('admin.event.index')->with('success', 'Data Berhasil Di Buat!');
    }

    public function edit(Event $event)
    {
        return view('admin.informasi.events.edit', compact('event'));
    }
    public function update(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            "image1" => 'nullable|file|image|mimes:png,jpg,jpeg|max:2048',
            "title" => 'required|string|max:225',
            "start_event" => 'required|date',
            "end_event" => 'required|date',
            "body" => "required",
        ]);

        if ($request->file('image1')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image1'] = $request->file('image1')->store('event-images');
        }
        $validatedData['author'] = 'Pengurus';
        $validatedData['status'] = 'ongoing';
        $event->update($validatedData);
        return redirect()->route('admin.event.index')->with('success', 'Data Berhasil Di Update!');
    }

    public function destroy(Event $event)
    {
        if ($event->image1) {
            Storage::delete($event->image1);
        }
        $event->delete();
        return redirect()->back()->with('success', 'Data Berhasil Di Hapus!');
    }
}
