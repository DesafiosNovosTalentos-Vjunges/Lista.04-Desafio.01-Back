<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

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
