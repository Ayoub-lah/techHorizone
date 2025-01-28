<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Article;
use App\Models\Theme;

use Illuminate\Http\Request;
use App\Models\Post;
use Termwind\Components\Dd;

class articlesController extends Controller
{
 public function user_post(Request $request)
 {
   $theme = new Theme();
        $theme->name = $request->theme;
        $theme->save();



    $post=new Article();
     $post->title= $request->title;
     $post->content= $request->description;
     
        $post->user_id=Auth::user()->id;
        $post->image=$request->image;
        $post->state='en attente';
        $post->theme_id = $theme->id; 

        $post->save();
        return redirect()->back()->with('success','Post created successfully');
 


 }


 public function affichage()
 {
  $post = Article::where('user_id', auth()->id())->get();

     return view('abonne.articles',compact('post'));
 }



} 