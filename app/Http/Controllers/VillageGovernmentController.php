<?php

namespace App\Http\Controllers;

use App\Models\PemerintahanDesa;
use App\Models\Sotk;
use Illuminate\Http\Request;

class VillageGovernmentController extends Controller
{
    public function index()
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
        return view('pemerintahan.pemdes', compact('kades', 'sekdes', 'kasiPemerintahan', 'kasiPelayanan', 'kasiKesejahteraan', 'kaurKeuangan', 'kaurPerencanaan', 'kaurTataUsaha', 'kDsnLowok', 'kDsnTunggul', 'kDsnKrajan', 'kDsnBlau'));
    }
    public function sotk()
    {
        $sotk = Sotk::first();
        return view('pemerintahan.sotk', compact('sotk'));
    }
}
