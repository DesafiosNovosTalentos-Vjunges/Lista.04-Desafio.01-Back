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
}
