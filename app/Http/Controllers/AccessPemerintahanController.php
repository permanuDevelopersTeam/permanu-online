<?php

namespace App\Http\Controllers;

use App\Models\PemerintahanDesa;
use App\Models\Sotk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccessPemerintahanController extends Controller
{
    public function pemerintahanDesa()
    {
        $pemerintahanDesa = PemerintahanDesa::all();
        $kades = $pemerintahanDesa->where('status', 'Kepala Desa')->first();
        $sekdes = $pemerintahanDesa->where('status', 'Sekertaris Desa')->first();
        $kasiPemerintahan = $pemerintahanDesa->where('status', 'Kasi Pemerintahan')->first();
        $kasiPelayanan = $pemerintahanDesa->where('status', 'Kasi Pelayanan')->first();
        $kasiKesejahteraan = $pemerintahanDesa->where('status', 'Kasi Kesejahteraan')->first();
        $kaurKeuangan = $pemerintahanDesa->where('status', 'Kaur Keuangan')->first();
        $kaurPerencanaan = $pemerintahanDesa->where('status', 'Kaur Perencanaan')->first();
        $kaurTataUsaha = $pemerintahanDesa->where('status', 'Kaur Tata Usaha & Umum')->first();
        $kDsnLowok = $pemerintahanDesa->where('status', 'Kepala Dusun Lowok')->first();
        $kDsnTunggul = $pemerintahanDesa->where('status', 'Kepala Dusun Tunggul')->first();
        $kDsnKrajan = $pemerintahanDesa->where('status', 'Kepala Dusun Krajan Permanu')->first();
        $kDsnBlau = $pemerintahanDesa->where('status', 'Kepala Dusun Blau')->first();

        return view('admin.pemerintahan.pemerintahanDesa', compact('kades', 'sekdes', 'kasiPemerintahan', 'kasiPelayanan', 'kasiKesejahteraan', 'kaurKeuangan', 'kaurPerencanaan', 'kaurTataUsaha', 'kDsnLowok', 'kDsnTunggul', 'kDsnKrajan', 'kDsnBlau'));
    }
    public function pemerintahanDesaStore(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required",
            "status" => "required",
            "image" => "nullable|file|image|mimes:jpeg,png,jpg|max:2048",
        ]);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('pemerintahanDesa-image');
        }

        if (PemerintahanDesa::where('status', $request->status)->first()) {
            return redirect()->back()->with('error', 'Masing-masing Jabatan Hanya bisa Untuk 1 Orang Saja, Silahkan Pilih Jabatan lain!');
        }

        PemerintahanDesa::create($validatedData);
        return redirect()->back()->with('success', 'Data Berhasil DiBuat!');
    }

    public function pemerintahanEdit(PemerintahanDesa $pemerintahanDesa)
    {
        return view('admin.pemerintahan.editPemerintahan', compact('pemerintahanDesa'));
    }
    public function pemerintahanUpdate(Request $request, PemerintahanDesa $pemerintahanDesa)
    {
        $validatedData = $request->validate([
            "name" => "required",
            "status" => "nullable",
            "image" => "nullable|file|image|mimes:jpeg,png,jpg|max:2048",
        ]);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('pemerintahanDesa-image');
        }

        PemerintahanDesa::where('uuid', $pemerintahanDesa->uuid)->first()->update($validatedData);
        return redirect()->route('pemerintahan')->with('success', 'Data Berhasil Di Update!');
    }

    public function sotk()
    {
        $sotk = Sotk::first();
        return view('admin.pemerintahan.sotk', compact('sotk'));
    }

    public function sotkStore(Request $request)
    {
        $validatedData = $request->validate([
            "body" => "required",
            "image" => 'required|file|image|mimes:png,jpg,jpeg|max:2048',
            'image2' => 'required|file|image|mimes:png,jpg,jpeg|max:2048',
        ], [
            'body.required' => 'Description field has required',
            'image.required' => 'Team Image field has required',
            'image2.required' => 'SOTK Image field has required',
        ]);

        if ($request->file('image') && $request->file('image2')) {
            $validatedData['image'] = $request->file('image')->store('pemerintahanDesa-image');
            $validatedData['image2'] = $request->file('image2')->store('pemerintahanDesa-image');
        }

        Sotk::create($validatedData);
        return redirect()->back()->with('success', 'Data Berhasil Di Buat!');
    }

    public function sotkUpdate(Request $request)
    {
        $validatedData = $request->validate([
            "body" => "required",
            "image" => 'nullable|file|image|mimes:png,jpg,jpeg|max:2048',
            'image2' => 'nullable|file|image|mimes:png,jpg,jpeg|max:2048',
        ], [
            'body.required' => 'Description field has required.',
            'image.max' => 'The image field must not be greater than 2048 kilobytes.',
            'image2.max' => 'The image field must not be greater than 2048 kilobytes.',
        ]);

        if ($request->file('image') && $request->file('image2')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            if ($request->oldImage2) {
                Storage::delete($request->oldImage2);
            }
            $validatedData['image'] = $request->file('image')->store('pemerintahanDesa-image');
            $validatedData['image2'] = $request->file('image2')->store('pemerintahanDesa-image');
        }

        Sotk::first()->update($validatedData);
        return redirect()->back()->with('success', 'Data Berhasil Di Update!');
    }
}
