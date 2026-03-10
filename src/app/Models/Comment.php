<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends model{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'post_id',
        'author_id',
        'content'
    ];

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'author_id');
    }
}
