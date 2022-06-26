<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function home(){
        $posts = Post::orderBy('created_at','DESC')->take(5)->get();
        $recentPosts = Post::orderBy('created_at','DESC')->paginate(3);
        return view('website.index', compact(['posts', 'recentPosts']));
    }

    
    public function category(){
        return view('website.category');
    }

    
    public function post(){
        return view('website.post');
    }

}
