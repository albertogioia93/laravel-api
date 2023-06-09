<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Brick\Math\BigInteger;

class ProjectController extends Controller
{
    public function index(){

        // $posts = Post::all(); //metodo posts per prendere i dati dalla tabella posts del database su phpmyadmin
        $posts = Post::with('type', 'technologies')->paginate(6);
        return response()->json([
            'success' => true,
            'results' => $posts
        ]);

        //oppure: return response()->json($posts);
    }

    public function show(string $slug)
    {

        try {
            $post = Post::where('slug', $slug)->with('type', 'technologies', 'comments')->first();

            if ($post) {
                return response()->json([
                    'success' => true,
                    'results' => $post
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'results' => null
                ], 404);
            }
        } catch (\Throwable $th) {

            return response()->json([
                'success' => false,
                'results' => null
            ], 500);

        }
    
    }
}
