<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return Post::paginate(10);
    }
    public function createPost(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'min:3'],
            'content' => ['required', 'string', 'max:5000'],
            'user_id' => ['required', 'exists:users,id'],

        ]);
        $newPost = Post::Create($data);

        //enviar mail al author del nou post creat. 
        
        return $newPost;
    }
}
