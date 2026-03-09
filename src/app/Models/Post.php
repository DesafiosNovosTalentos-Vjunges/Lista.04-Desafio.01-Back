<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Post extends Model
{
    use HasFactory, HasUuids, softDeletes;

    protected $fillable = [
        'title',
        'content',
        'author_id',
        'status'
    ];

    public function author(){
        return $this->belongsTo(User::class, 'author_id');
    }
}
