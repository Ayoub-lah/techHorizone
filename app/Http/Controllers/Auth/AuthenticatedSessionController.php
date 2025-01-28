<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User; // Import the User model

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

        // Check if the user is blocked before attempting to authenticate
        $user = User::where('email', $request->email)->first();

        if ($user && $user->status === 'bloque') {
            // Redirect back to the login page with an error message
            return redirect()->route('login')->with('error', 'You are blocked.');
        }

        $request->authenticate();

        $request->session()->regenerate();

        $authUserRole=Auth::user()->role ;

        if($authUserRole==0){
            return redirect()->intended(route('admin', absolute: false));
        }elseif($authUserRole==1){
            return redirect()->intended(route('dashboard', absolute: false));
        }else{
            return redirect()->intended(route('dashboard', absolute: false));
        }


    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
