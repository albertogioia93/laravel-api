<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class ProjectController extends Controller
{
    public function index(){

        $posts = Post::all(); //metodo posts per prendere i dati dalla tabella posts del database su phpmyadmin
        // $posts = Post::with('type', 'technologies');
        return response()->json([
            'success' => true,
            'results' => $posts
        ]);

        //oppure: return response()->json($posts);
    }
}
