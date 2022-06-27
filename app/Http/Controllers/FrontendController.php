<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function home(){
        $posts = Post::orderBy('created_at','DESC')->take(5)->get();

        // Slice
        $firstColPost = $posts->splice(0, 2);
        $middleColPost = $posts->splice(0, 1);
        $lastColPost = $posts->splice(0);

        //return $firstColPost;


        $recentPosts = Post::with('category')->orderBy('created_at','DESC')->paginate(9);
        return view('website.index', compact(['posts', 'recentPosts', 'firstColPost', 'middleColPost', 'lastColPost']));
    }

    
    public function category(){
        return view('website.category');
    }

    
    public function post($slug){
        $post = Post::with('category', 'user')->where('slug', $slug)->first();

        if($post){
            return view('website.post', compact('post'));
        }
        else{
            return redirect('/');
        }
        
    }

}
