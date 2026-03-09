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
        $data['status'] = $data['status'] ?? 'DRAFT';

        return $this->post_repository->create($data);
    }

    public function getAllPublishedPosts(){
        return $this->post_repository->getAllPublished();
    }

    public function getPostById(string $id){
        return $this->post_repository->findById($id);
    }

    public function updatePost(string $id, array $data){
        $post = $this->post_repository->findById($id);

        if($post->status === 'ARCHIVED'){
            abort(403, 'Não é possível alterar um post arquivado!');
        }

        return $this->post_repository->update($post, $data);
    }

    public  function deletePost(string $id){
        $post = $this->post_repository->findById($id);
        return $this->post_repository->delete($post);
    }

    public function archivePost(string $id){
        $post = $this->post_repository->findById($id);
        return $this->post_repository->update($post, ['status' => 'ARCHIVED']);
    }
}
