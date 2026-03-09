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

    public function index(){
        $posts = $this->post_service->getAllPublishedPosts();

        return response()->json($posts, 200);
    }

    public function show($id){
        $post = $this->post_service->getPostById($id);
        return response()->json($post, 200);
    }

    public function update(Request $request, $id){
        $post = $this->post_service->getPostById($id);

        $this->authorize('update', $post);

        $data = $request->validate([
            'title' => 'sometimes|required|string',
            'content' => 'sometimes|required|string',
            'status' => 'sometimes|in:DRAFT,PUBLISHED,ARCHIVED'
        ]);

        $updated_post = $this->post_service->updatePost($id, $data);
        return response()->json($updated_post, 200);
    }

    public function destroy($id){
        $post = $this->post_service->getPostById($id);

        $this->authorize('delete', $post);
        $this->post_service->deletePost($id);

        return response()->noContent();
    }

    public function archive($id){
        $post = $this->post_service->getPostById($id);

        $this->authorize('archive', $post);
        $this->post_service->archivePost($id);

        return response()->json(['message' => 'Post enviado com sucesso!'], 200);
    }
}
