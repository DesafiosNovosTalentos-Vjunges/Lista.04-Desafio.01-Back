<?php

namespace App\Domain\Post;

use App\Models\Post;

interface PostRepositoryInterface{
    public function create(array $data);
    public function getAllPublished();
    public function findById(string $id): ?Post;
    public function update(Post $post, array $data): Post;
    public function delete(Post $post): bool;
}
