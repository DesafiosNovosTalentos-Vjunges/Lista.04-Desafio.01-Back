<?php

namespace App\Infrastructure\Eloquent;

use App\Domain\Post\PostRepositoryInterface;
use App\Models\Post;

class PostRepository implements PostRepositoryInterface{
    public function create(array $data){
        return Post::create($data);
    }

    public function getAllPublished(){
        return Post::with('author')->where('status', 'PUBLISHED')->get();
    }

    public function findById(string $id): ?Post {
        return Post::with('author')->findOrFail($id);
    }

    public function update(Post $post, array $data): Post {
        $post->update($data);
        return $post;
    }

    public function delete(Post $post): bool {
        return $post->delete();
    }
}
