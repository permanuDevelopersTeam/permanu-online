<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class VerifyAdminPassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->isMethod('post')) {
            $password = $request->input('password');

            if (Hash::check($password, Auth::user()->password)) {
                $request->session()->put('admin_verified', true);
                return redirect()->route('admin.account.index');
            } else {
                return back()->withErrors(['password' => 'Password salah']);
            }
        }

        if (!$request->session()->get('admin_verified')) {
            return redirect()->route('admin.password.confirm');
        }

        return $next($request);
    }
}
