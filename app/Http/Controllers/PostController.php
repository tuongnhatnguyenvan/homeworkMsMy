<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use GuzzleHttp\Psr7\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $posts;
    public function __construct(Post $posts)
    {
        $this->posts = $posts;
    }

    public function index()
    {
        $posts = $this->posts->getAllPosts();
        dd($posts);
    }
    public function getPostById($id)
    {
        $post = $this->posts->getOnePost($id);
        return view('updatePost', ['post' => $post]);
        // dd($post);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
    }


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $request = request();
        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ];
        $this->posts->updatePost($id, $data);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->posts->deletePost($id);
    }

    public function createPost()
    {
        $request = request();
        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ];
        $this->posts->addPost($data);
    }
}
