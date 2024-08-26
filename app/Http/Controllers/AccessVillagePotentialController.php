<?php

namespace App\Http\Controllers;

use App\Models\Potential;
use App\Models\TypePotential;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AccessVillagePotentialController extends Controller
{
    public function index()
    {
        $potential = Potential::orderBy('created_at', 'desc')
            ->paginate(15);
        $typePotential = TypePotential::orderBy('created_at', 'desc')->get();
        return view('admin.potensiDesa.index', compact('potential', 'typePotential'));
    }
    public function create()
    {
        $typePotential = TypePotential::orderBy('created_at', 'desc')->get();
        return view('admin.potensiDesa.create', compact('typePotential'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|file|image|mimes:png,jpg,jpeg|max:2048',
            'title' => 'required',
            'body' => 'required',
            'typePotentialUuid' => 'required'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('village-potential-image');
        }
        $validatedData['excerpt'] = Str::words($validatedData['body'], 15);
        Potential::create($validatedData);
        return redirect()->route('admin.potential.index')->with('success', 'Data Berhasil Di Buat!');
    }

    public function edit(Potential $potential)
    {
        $typePotential = $potential->typePotential;
        $typePotentialAll = TypePotential::all();
        return view('admin.potensiDesa.edit', compact('potential', 'typePotentialAll', 'typePotential'));
    }

    public function update(Request $request, Potential $potential)
    {
        $validatedData = $request->validate([
            'image' => 'nullable|file|image|mimes:png,jpg,jpeg|max:2048',
            'title' => 'required',
            'body' => 'required',
            'typePotentialUuid' => 'required'
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('village-potential-image');
        }
        $validatedData['excerpt'] = Str::words($validatedData['body'], 15);
        $potential->update($validatedData);
        return redirect()->route('admin.potential.index')->with('success', 'Data Berhasil Di Buat!');
    }

    public function destroy(Potential $potential)
    {
        $potential->delete();
        if ($potential->image) {
            Storage::delete($potential->image);
        }
        return redirect()->back()->with('success', 'Data Berhasil Di Hapus!');
    }
}
