<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;


class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::all();
        return view('admin.layout.articles', compact('articles'));
    }

    public function updateMagazine(Request $request, $id)
    {
        // Find the article by ID
        $article = Article::findOrFail($id);
    
        // Update the magazine_id with the value from the form
        $article->magazine_id = $request->input('magazine_id');
    
        // Save the changes to the database
        $article->save();
    
        // Redirect back to the articles list with a success message
        return redirect()->route('admin.articles')->with('success', 'Magazine ID updated successfully!');
    }
    

    public function activate($id)
    {
        $article = Article::findOrFail($id);
        $article->is_public = 'active';
        $article->save();

        return redirect()->route('admin.articles')->with('success', 'Article activated successfully');
    }


    public function deactivate($id)
    {
        $article = Article::findOrFail($id);
        $article->is_public = 'hold';
        $article->save();

        return redirect()->route('admin.articles')->with('success', 'Article deactivated successfully');
    }
}
