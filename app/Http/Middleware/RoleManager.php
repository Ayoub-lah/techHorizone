<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Get the authenticated user's role
        $authUserRole = Auth::user()->role;

        // Check if the user has the required role
        switch ($role) {
            case 'admin':
                if ($authUserRole == 0) {
                    return $next($request);
                }
                break;
            case 'responsable':
                if ($authUserRole == 1) {
                    return $next($request);
                }
                break;
            case 'customer':
                if ($authUserRole == 2) {
                    return $next($request);
                }
                break;
            default:
                // If the role is not recognized, redirect to login
                return redirect()->route('login');
        }

        // If the user does not have the required role, redirect them based on their current role
        switch ($authUserRole) {
            case 0:
                return redirect()->route('admin.dashboard'); // Assuming 'admin.dashboard' is the route for admin
            case 1:
                return redirect()->route('responsable.dashboard'); // Assuming 'responsable.dashboard' is the route for responsable
            case 2:
                return redirect()->route('dashboard'); // Assuming 'dashboard' is the route for customer
            default:
                return redirect()->route('login');
        }
    }
}
