<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function commentBy() { // association 1/N avec la table users
        return $this->belongsTo(User::class);
    }

    public function belongToArticle() { // association 1/N avec la table users
        return $this->belongsTo(Article::class);
    }
}
