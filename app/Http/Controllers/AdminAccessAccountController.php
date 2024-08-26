<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAccessAccountController extends Controller
{

    public function verify()
    {
        return view('admin.account.verify');
    }
    public function verifyConfirm(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $password = $request->input('password');

        if (Hash::check($password, Auth::user()->password)) {
            $request->session()->put('admin_verified', true);
            return redirect()->route('admin.account.index');
        } else {
            return redirect()->back()->with('error', 'Password salah');
        }
    }

    public function index()
    {
        return view('admin.account.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'old_password' => 'nullable|min:8',
            'new_password' => 'nullable|min:8|confirmed',
        ]);

        $admin = User::first();

        if ($request->filled('old_password')) {
            if (!Hash::check($request->input('old_password'), $admin->password)) {
                return back()->with('error', 'Password lama salah!');
            }

            if ($request->filled('new_password')) {
                $admin->password = Hash::make($request->input('new_password'));
            }
        }
        $admin->username = $request->input('username');
        $admin->save();

        return redirect()->back()->with('success', 'Data Berhasil Di Update!');
    }
}
