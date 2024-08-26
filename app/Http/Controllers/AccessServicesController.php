<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;

class AccessServicesController extends Controller
{
    public function index()
    {
        $services = Services::first();
        return view('admin.informasi.services.index', compact('services'));
    }

    public function indexStore(Request $request)
    {
        $services = Services::first();

        if ($services) {
            $services->update($request->all());
        } else {
            Services::create($request->all());
        }

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }
}
