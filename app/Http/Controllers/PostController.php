<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Symfony\Component\HttpFoundation\Request;
use OpenApi\Annotations as OA;

class PostController extends Controller
{

    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * @OA\Get(
     *     path="/api/posts",
     *     summary="Get all posts",
     *     tags={"Posts"},
     *     @OA\Response(
     *         response=200,
     *         description="Success"
     *     ),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function index()
    {
        $posts = $this->post->getAllPosts();
        return response()->json($posts);
    }

    /**
     * @OA\Post(
     *     path="/api/posts",
     *     summary="Create a new post",
     *     tags={"Posts"},
     *     @OA\Parameter(
     *         name="title",
     *         in="query",
     *         description="Post title",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="description",
     *         in="query",
     *         description="Post description",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success"
     *     ),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function store(Request $request)
    {
        $input = $request;
        $this->post->createPost($input);
        return response()->json(['msg' => 'Post created successfully']);
    }

    /**
     * @OA\Get(
     *     path="/api/posts/{id}",
     *     summary="Get a specific post",
     *     tags={"Posts"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Post ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Post not found"
     *     ),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function show($id)
    {
        $post = $this->post->getPostById($id);

        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }
        return response()->json($post);
    }

    /**
     * @OA\Put(
     *     path="/api/posts/{id}",
     *     summary="Update a specific post",
     *     tags={"Posts"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Post ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="description",
     *         in="query",
     *         description="Post description",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="title",
     *         in="query",
     *         description="Post title",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success"
     *     ),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function update(Request $request, $id)
    {
        $input = $request;
        $this->post->updatePost($id, $input);
        return response()->json(['msg' => 'Post updated successfully']);
    }

    /**
     * @OA\Delete(
     *     path="/api/posts/{id}",
     *     summary="Delete a specific post",
     *     tags={"Posts"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Post ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success"
     *     ),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function destroy(Post $post)
    {
        $this->post->deletePost($post->id);
        return response()->json(['msg' => 'Post deleted successfully']);
    }
}
