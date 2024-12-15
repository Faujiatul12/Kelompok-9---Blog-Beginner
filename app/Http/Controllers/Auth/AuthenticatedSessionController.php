<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Validasi input dari user
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek kredensial (email dan password)
        if (!Auth::attempt($request->only('email', 'password'))) {

            return redirect()->intended(RouteServiceProvider::HOME);
            return back()->withErrors([
                'email' => 'Hanya email yang terdaftar yang dapat login.',
            ]);
        }

        // Regenerasi session untuk keamanan
        $request->session()->regenerate();

        // Redirect ke halaman yang dimaksud atau default ke halaman utama
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Logout user
        Auth::guard('web')->logout();

        // Invalidate session
        $request->session()->invalidate();

        // Regenerate CSRF token
        $request->session()->regenerateToken();

        // Redirect ke halaman utama setelah logout
        return redirect('home');
    }
}