<?php

namespace app\Infrastructure\Eloquent;

use app\Domain\Post\PostRepositoryInterface;
use app\Models\Post;

class PostRepository implements PostRepositoryInterface{
    public function creat(array $data){
        return Post::create($data);
    }
}
