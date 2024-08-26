<?php

namespace App\Http\Controllers;

use App\Models\TotalPopulation;
use App\Models\VillageHistory;
use App\Models\VisiAndMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AccessProfileController extends Controller
{
    public function visiMisi()
    {
        $visiMisi = VisiAndMisi::first();
        return view('admin.villageProfile.visiMisi', compact('visiMisi'));
    }
    public function visiMisiUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'visi' => 'required',
            'misi' => 'required',
        ]);
        if (!VisiAndMisi::all()->count()) {
            VisiAndMisi::create($validatedData);
            return redirect()->back()->with('success', 'Data Berhasil Di Buat!');
        }
        VisiAndMisi::first()->update($validatedData);
        return redirect()->back()->with('success', 'Data Berhasil Di Update!');
    }

    public function villageHistory()
    {
        $villageHistory = VillageHistory::first();
        return view('admin.villageProfile.villageHistory', compact('villageHistory'));
    }

    public function VillageHistoryStore(Request $request)
    {
        $validatedData = $request->validate([
            'body' => 'required',
            'image' => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('profile-image');
        }
        $validatedData['excerpt'] = Str::words($validatedData['body'], 80);

        VillageHistory::create($validatedData);
        return redirect()->back()->with('success', 'Data Berhasil Di Buat!');
    }

    public function VillageHistoryUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'body' => 'required',
            'image' => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('profile-image');
        }
        $validatedData['excerpt'] = Str::words($validatedData['body'], 80);
        VillageHistory::first()->update($validatedData);
        return redirect()->back()->with('success', 'Data Berhasil Di Update!');
    }

    public function demografi()
    {
        $totalPopulation = TotalPopulation::first();
        return view('admin.villageProfile.demografi', compact('totalPopulation'));
    }

    public function demografiStore(Request $request)
    {
        $validatedData = $request->validate([
            "j0_12b" => "required|numeric",
            "j1_5t" => "required|numeric",
            "j6_14t" => "required|numeric",
            "j15_25t" => "required|numeric",
            "j26_55t" => "required|numeric",
            "jp55t" => "required|numeric",
        ]);
        $validatedData['total'] = $validatedData['j0_12b'] + $validatedData['j1_5t'] + $validatedData['j6_14t'] + $validatedData['j15_25t'] + $validatedData['j26_55t'] + $validatedData['jp55t'];

        TotalPopulation::create($validatedData);
        return redirect()->back()->with('success', 'Data Berhasil Di Buat!');
    }
    public function demografiUpdate(Request $request)
    {
        $validatedData = $request->validate([
            "j0_12b" => "required|numeric",
            "j1_5t" => "required|numeric",
            "j6_14t" => "required|numeric",
            "j15_25t" => "required|numeric",
            "j26_55t" => "required|numeric",
            "jp55t" => "required|numeric",
        ]);
        $validatedData['total'] = $validatedData['j0_12b'] + $validatedData['j1_5t'] + $validatedData['j6_14t'] + $validatedData['j15_25t'] + $validatedData['j26_55t'] + $validatedData['jp55t'];

        TotalPopulation::first()->update($validatedData);
        return redirect()->back()->with('success', 'Data Berhasil Di Update!');
    }
}
