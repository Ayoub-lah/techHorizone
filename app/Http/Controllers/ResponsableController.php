<?php

namespace App\Http\Controllers;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Comment;
use App\Models\Theme;
use App\Models\Subscription;

class ResponsableController extends Controller
{
    /**
     * Display the dashboard page.
     */
    public function dashboard() {
        // Get the authenticated user's theme ID
        $themeId = Theme::where('user_id', Auth::id())->pluck('id')->first();

        // Fetch statistics
        $totalSubscribers = Subscription::where('theme_id', $themeId)->count();
        $totalComments = Comment::whereHas('article', function ($query) use ($themeId) {
            $query->where('theme_id', $themeId);
        })->count();
        $totalArticles = Article::where('theme_id', $themeId)->count();

        // Pass the data to the view
        return view('responsable.dashboard', compact('totalSubscribers', 'totalComments', 'totalArticles'));
    }

    /**
     * Display the subscribers page.
     */
    public function subscriptions()
    {
        $user_id = Auth::user()->id;
        $theme_id = Theme::where('user_id',$user_id)->first()->id;
        $subscriptions = Subscription::where('theme_id',$theme_id)->get();


        return view('responsable.subscriptions',[
            'subscriptions' => $subscriptions,
        ]);
    }

    public function delete_subscription(Request $request)
    {
        $subscription_id = $request->subscription_id;
        Subscription::where('id',$subscription_id)->first()->delete();

        return Redirect::route('responsable.subscriptions');
    }

    public function delete_comment($id) {
        // Find and delete the comment
        $comment = Comment::find($id);
        if ($comment) {
            $comment->delete();
        }

        // Redirect back to the article details page
        return Redirect::route('responsable.post_details', $comment->article_id);
    }
    public function articles()
    {
        $themeId = Theme::where('user_id', Auth::id())->pluck('id')->first();
        $articles = Article::where('theme_id', $themeId)
                        ->where('state', 'en cours')
                        ->get();

        return view('responsable.articles', compact('articles'));
    }
    public function moderation() {
        // Get the authenticated user's theme ID
        $themeId = Theme::where('user_id', Auth::id())->pluck('id')->first();

        // Fetch articles with state 'publié' or 'recomand'
        $articles = Article::where('theme_id', $themeId)
            ->whereIn('state', ['publié', 'recomand'])
            ->get();

        return view('responsable.moderation', compact('articles'));
    }

    public function post_details($id)
 {
     $article = Article::findOrFail($id); // Utilisez findOrFail pour gérer les erreurs si l'article n'existe pas.
     $comments = $article->comments()->orderBy('created_at', 'desc')->get(); // Chargez les commentaires associés
     return view('responsable.post_details', compact('article', 'comments'));
}
        public function lireplus($id)
        {
            $article = Article::findOrFail($id); // Utilisez findOrFail pour gérer les erreurs si l'article n'existe pas.
            return view('responsable.lireplus', compact('article'));
        }



    public function comment_post(Request $request){
        $comment= new Comment();
        $comment->content=$request->comment;
        $comment->article_id=$request->article_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();
        return redirect()->back()->with('success', 'comments ajoutée avec succès');

    }


    public function publish($id)
{
    $article = Article::findOrFail($id);
    $article->state = 'publié';
    $article->save();

    return redirect()->back()->with('success', 'Article publié avec succès');
}
public function reject($id)
{
    $article = Article::findOrFail($id);
    $article->state = 'Refus';
    $article->save();

    return redirect()->back()->with('success', 'Article rejet avec succès');
}

    public function recomand($id)
    {
        $article = Article::findOrFail($id);
        $article->state = 'recomand';
        $article->save();

        return redirect()->back()->with('success', 'Article publié avec succès');
    }

    /**
     * Display the moderation page.
     */




}
