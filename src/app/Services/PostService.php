<?php

namespace App\Services;

use App\Models\Post;

class PostService {

    public function creatPost(array $data, int $user_id){

        return Post::creat ([
            'user_id' => $user_id,
            'title'   => $data['title'],
            'content' => $data['content'],
            'status'  => $data['status'] ?? 'PUBLISHED',
        ]);
    }
}
