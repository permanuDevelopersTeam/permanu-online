<?php

namespace App\Http\Controllers;

use App\Models\TypePotential;
use Illuminate\Http\Request;

class TypePotentialController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate(['type' => 'required']);
        TypePotential::create($validatedData);
        return redirect()->back()->with('success', 'Data Tipe Berhasil Di Buat!');
    }

    public function edit(TypePotential $typePotential)
    {
        return view('admin.potensiDesa.editType', compact('typePotential'));
    }
    public function update(Request $request, TypePotential $typePotential)
    {
        $validatedData = $request->validate(['type' => 'required']);
        $typePotential->update($validatedData);
        return redirect()->route('admin.potential.index')->with('success', 'Data Tipe Berhasil Di Buat!');
    }

    public function destroy(TypePotential $typePotential)
    {
        $typePotential->delete();
        return redirect()->back()->with('success', 'Data Berhasil Di Hapus!');
    }
}
