<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommentService;

class CommentController extends Controller{
    protected $comment_service;

    public function __construct(CommentService $comment_service){
        $this->comment_service = $comment_service;
    }

    public function index($id){
        $comments = $this->comment_service->getCommentsByPost($id);

        return response()->json($comments, 200);
    }

    public function store(Request $request, $id){
        $data = $request->validate([
            'content' => 'required|string'
        ]);

        $data['post_id'] = $id;
        $comment = $this->comment_service->createComment($data, $request->user()->id);

        return response()->json($comment, 201);
    }

    public function destroy($id){
        $comment = $this->comment_service->getCommentById($id);

        $this->authorize('delete', $comment);
        $this->comment_service->delete_comment($id);

        return response()->noContent();
    }
}