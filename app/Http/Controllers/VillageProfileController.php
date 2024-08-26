<?php

namespace App\Http\Controllers;

use App\Models\TotalPopulation;
use App\Models\VillageHistory;
use App\Models\VisiAndMisi;
use Illuminate\Http\Request;

class VillageProfileController extends Controller
{
    public function index()
    {
        $visiMisi = VisiAndMisi::first();
        $villageHistory = VillageHistory::first();
        $demografi = TotalPopulation::first();
        return view('profileDesa.index', compact('visiMisi', 'villageHistory', 'demografi'));
    }

    public function history()
    {
        $villageHistory = VillageHistory::first();
        return view('profileDesa.history', compact('villageHistory'));
    }
}
