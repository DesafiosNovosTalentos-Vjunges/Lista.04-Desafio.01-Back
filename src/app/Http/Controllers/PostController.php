<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PostService;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    protected $post_service;

    public function __construct(PostService $post_service){
        $this->post_service = $post_service;
    }

    public function store(StorePostRequest $request){
        $validated_data = $request->validated();
        $user_id = $request->user()->id;
        $new_post = $this->post_service->createPost($validated_data, $user_id);

        return response()->json($new_post, 201);
    }
}
