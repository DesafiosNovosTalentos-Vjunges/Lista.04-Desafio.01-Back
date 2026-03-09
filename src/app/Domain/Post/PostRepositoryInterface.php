<?php

namespace app\Domain\Post;

interface PostRepositoryInterface{
    public function create(array $data);
}
