<?php

namespace App\Domain\Comment;

use App\Models\Comment;

interface CommentRepositoryInterface{
    public function getByPostId(string $post_id);
    public function create(array $data);
    public function findById(string $id): ?Comment;
    public function delete(Comment $comment): bool;
}
