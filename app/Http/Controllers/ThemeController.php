<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Theme;
use App\Models\Subscription;



class ThemeController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'themes' => 'required|json', // Ensure themes are provided as JSON
        ]);

        // Decode the JSON string
        $themes = json_decode($request->input('themes'), true);

        // Save the selected themes for the authenticated user in the subscriptions table
        foreach ($themes as $themeName) {
            // Find the theme by name
            $theme = Theme::where('name', $themeName)->first();

            if ($theme) {
                // Check if the user is already subscribed to the theme
                $existingSubscription = Subscription::where('user_id', auth()->id())
                                                    ->where('theme_id', $theme->id)
                                                    ->exists();

                // If not already subscribed, create a subscription
                if (!$existingSubscription) {
                    Subscription::create([
                        'user_id' => auth()->id(), // Authenticated user
                        'theme_id' => $theme->id, // Theme ID from the themes table
                    ]);
                }
            }
        }

        // Redirect to the dashboard with a success message
        return redirect()->route('dashboard')->with('success', 'Themes subscribed successfully!');
    }

public function index()
{
    // Récupérer tous les thèmes disponibles
    $themes = Theme::all();

    // Récupérer les IDs des thèmes auxquels l'utilisateur est abonné
    $subscribedThemeIds = Subscription::where('user_id', Auth::id())
        ->pluck('theme_id')
        ->toArray();

    
    return view('abonne.abonnement', compact('themes', 'subscribedThemeIds'));
}

/**
 * Gère l'abonnement ou le désabonnement à un thème.
 */
public function toggleSubscription($themeId)
{
    // Vérifier si l'utilisateur est déjà abonné au thème
    $subscription = Subscription::where('user_id', Auth::id())
        ->where('theme_id', $themeId)
        ->first();

    if ($subscription) {
        // Désabonner l'utilisateur
        $subscription->delete();
    } else {
        // Abonner l'utilisateur
        Subscription::create([
            'user_id' => Auth::id(),
            'theme_id' => $themeId,
        ]);
    }

    // Rediriger l'utilisateur vers la même page
    return redirect()->back();
}
}

    
