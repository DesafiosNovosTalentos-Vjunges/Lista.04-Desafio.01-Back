<?php

namespace App\Infrastructure\Eloquent;

use App\Domain\Comment\CommentRepositoryInterface;
use App\Models\Comment;

class CommentRepository implements CommentRepositoryInterface{
    public function getByPostId(string $post_id){
        return Comment::with('author')->where('post_id', $postId)->get();
    }

    public function create(array $data){
        return Comment::create($data);
    }

    public function findById(string $id): ?Comment {
        return Comment::findOrFail($id);
    }

    
    public function delete(Comment $comment): bool{
        return $comment->delete();
    }
}
