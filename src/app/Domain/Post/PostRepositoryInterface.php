<?php

namespace App\Domain\Post;

interface PostRepositoryInterface{
    public function create(array $data);

    public function getAllPublished();
}
