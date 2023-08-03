<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index()
    {
        $users = User::query()->get();

        return new JsonResponse([
            "data" => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $createdUser = User::query()->create([
            'name' => $request->name,
            'email' => $request->email
        ]);
        return new JsonResponse([
            "data" => $createdUser
        ]);
    }

    /**
     * Display the specified resource.
     * @param Request
     * @return JsonResponse
     */
    public function show(User $user)
    {
        return new JsonResponse([
            "data" => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request
     * @param User
     * @return JsonResponse
     * 
     */
    public function update(Request $request, User $user)
    {
       return new JsonResponse([
        "data" => "updated"
       ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param Request
     * @param User
     * @return JsonResponse
     */
    public function destroy(User $user)
    {
        return new JsonResponse([
            "data" => "deleted"
        ]);
    }
}
