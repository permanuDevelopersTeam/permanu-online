<?php

namespace App\Http\Controllers;

use App\Models\Potential;
use App\Models\TypePotential;
use Illuminate\Http\Request;

class VillagePotentialController extends Controller
{
    public function index()
    {
        $typePotentialAll = TypePotential::all();
        return view('potensiDesa.index', compact('typePotentialAll'));
    }

    public function detail(TypePotential $typePotential)
    {
        $typePotentialAll = TypePotential::all();
        $potential = Potential::where('typePotentialUuid', $typePotential->uuid)->get();
        return view('potensiDesa.detail', compact('potential', 'typePotentialAll', 'typePotential'));
    }

    public function show(Potential $potential)
    {
        $typePotentialAll = TypePotential::all();
        return view('potensiDesa.show', compact('potential', 'typePotentialAll'));
    }
}
