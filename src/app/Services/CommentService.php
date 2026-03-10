<?php

namespace App\Services;

use App\Domain\Comment\CommentRepositoryInterface;
use App\Domain\Post\PostRepositoryInterface;

class CommentService{
    protected $comment_repository;
    protected $post_repository;

    public function __construct(CommentRepositoryInterface $comment_repository, PostRepositoryInterface $post_repository){
        $this->comment_repository = $comment_repository;
        $this->post_repository = $post_repository;
    }

    public function getCommentsByPost(string $post_id){
        $this->post_repository->findById($post_id);

        return $this->comment_repository->getByPostId($post_id);
    }

    public function createComment(array $data, string $user_id){
        $post = $this->post_repository->findById($data['post_id']);

        if ($post->status === 'ARCHIVED') {
            abort(403, 'Não é permitido adicionar comentários em posts arquivados.');
        }

        $data['author_id'] = $user_id;
        return $this->comment_repository->create($data);
    }

    public function getCommentById(string $id){
        return $this->comment_repository->findById($id);
    }

    public function deleteComment(string $id){
        $comment = $this->comment_repository->findById($id);

        return $this->comment_repository->delete($comment);
    }
}
