<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Symfony\Component\HttpFoundation\Request;

class PostController extends Controller
{

    private $post;
    public function __construct(Post $post){
        $this->post = $post;
    }

    public function index()
    {
        $posts = $this->post->getAllPosts();
        return response()->json($posts);
    }

    public function store(Request $request)
    {
        $input = $request;
        $this->post->createPost($input);
        return response()->json(['msg' => 'oke store']);
    }

    public function show($id)
    {
        $post = $this->post->getPostById($id);
        
        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }
        return response()->json($post);
    }

    public function update(Request $request, $id)
    {
        $input = $request;
        $this->post->updatePost($id, $input);
        return response()->json(['msg' => 'oke update']);
    }

    public function destroy(Post $post)
    {
        $this->post->deletePost($post->id);
        return response()->json(['msg' => 'oke delete']);
    }


}
