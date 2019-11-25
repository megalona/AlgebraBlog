<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
   public function index(){


    $posts = Post::all(); //dohvaća sve postove

    return view('posts/index', compact('posts'));

   }

   public function show($id){

    $post = Post::find($id);

    return view('posts/show', compact('post')); //tu je posts/show zato jer f-ja view inace gleda direkt u view folder, a mi tu imamo folder posts

   }
}
