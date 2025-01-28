<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Article;

class CommentsController extends Controller
{
    public function comment_post(Request $request)
    {
        $comment = new Comment();
        $comment->content = $request->comment;
        $comment->article_id = $request->article_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();
        return redirect()->back()->with('success', 'Commentaire ajouté avec succès');
    }

    public function reply_post(Request $request, $commentId)
    {
        $request->validate([
            'reply' => 'required|string',
            'article_id' => 'required|exists:articles,id',
            'parent_id' => 'nullable|exists:comments,id',
        ]);
    
        $reply = new Comment();
        $reply->content = $request->reply;
        $reply->article_id = $request->article_id;
        $reply->user_id = Auth::user()->id;
        $reply->parent_id = $commentId; // Le commentaire auquel on répond
        $reply->save();
    
        return back()->with('success', 'Réponse ajoutée avec succès');    }

    public function article_details($id)
    {
        $article = Article::findOrFail($id);
    
    // Charger uniquement les commentaires parents (sans parent_id)
    $comments = $article->comments()
                        ->whereNull('parent_id') // Seuls les commentaires parents
                        ->with('replies') // Charger les réponses associées
                        ->orderBy('created_at', 'desc')
                        ->get();

    return view('abonne.article_details', compact('article', 'comments'));
    }
}