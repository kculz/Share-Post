<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return JsonResponse
     */
    public function index()
    {
        $post = Post::query()->get();
        return new JsonResponse([
            "data" => $post
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param StorePostRequest
     * @return JsonResponse
     */
    public function store(StorePostRequest $request)
    {
        $created = Post::query()->create([
            'title' => $request->title,
            'body' => $request->body,
        ]);
        return new JsonResponse([
            "data" =>$created
        ]);
    }

    /**
     * Display the specified resource.
     * @param Post
     * @return JsonResponse
     */
    public function show(Post $post)
    {
        return new JsonResponse([
            "data" => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request
     * @param Post
     * @return JsonResponse
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        // $post->update($request->only(['title', 'body']));
        $updated = $post->update([
            'title' => $request->title ?? $post->title,
            'body' => $request->body ?? $post->body,
        ]);

        if(!$updated){
            return new JsonResponse([
                'errors' => [
                    'Failed to update the model'
                ]
                ],400);
        }
         
        return new JsonResponse([
            "data" => $post
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param Request
     * @param Post
     * @return JsonResponse
     */
    public function destroy(Post $post)
    {
        $deleted = $post->forceDelete();

        if(!$deleted){
            return new JsonResponse([
                "errors" => [
                    "Could not delete resourse"
                ]
                ],400);
        }
        return new JsonResponse([
            "data" => "success"
        ]);
    }
}
