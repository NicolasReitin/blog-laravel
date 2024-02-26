<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // protected $guarded = [];

    protected $fillable = [
        'content',
        'user_id',
        'article_id'
    ];

    public function commentBy() { // association 1/N avec la table users
        return $this->belongsTo(User::class, 'user_id');
    }

    public function belongToArticle() { // association 1/N avec la table users
        return $this->belongsTo(Article::class, 'article_id');
    }
}
