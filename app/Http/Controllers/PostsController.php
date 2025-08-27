<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display list of posts
     */
    public function index()
    {
        // Call external API
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');

        if ($response->successful()) {
            return response()->json([
                'status' => true,
                'data' => $response->json()
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Failed to fetch posts'
        ], $response->status());
    }

}
