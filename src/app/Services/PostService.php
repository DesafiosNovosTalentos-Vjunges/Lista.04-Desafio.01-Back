<?php

namespace App\Services;

use App\Domain\Post\PostRepositoryInterface;

class PostService {
    protected $post_repository;

    public function __construct(PostRepositoryInterface $post_repository){
        $this->post_repository = $post_repository;
    }

    public function createPost(array $data, string $user_id){
        $data['author_id'] = $user_id;
        $data['status'] = $data['status'] ?? 'Draft';

        return $this->post_repository->create($data);
    }

    public function getAllPublishedPosts(){
        return $this->post_repository->getAllPublished();
    }
}
