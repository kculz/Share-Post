<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
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
        return new JsonResponse([
            "data" => "Kudzai"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        return new JsonResponse([
            "data" => "Kudzai"
        ]);
    }

    /**
     * Display the specified resource.
     * @param Request
     * @param Post
     * @return JsonResponse
     */
    public function show(Post $post)
    {
        return new JsonResponse([
            "data" => "Kudzai"
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request
     * @param Post
     * @return JsonResponse
     */
    public function update(Request $request, Post $post)
    {
        return new JsonResponse([
            "data" => "Kudzai"
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
        return new JsonResponse([
            "data" => "Kudzai"
        ]);
    }
}
