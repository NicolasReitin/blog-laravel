<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article_tag extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function articleTag() { // association N/N avec table article_tag
        return $this->belongsToMany(Tag::class, 'article_tag', 'article_id', 'tag_id');
    }

    
    public function tagArticle() { // association N/N avec table article_tag
        return $this->belongsToMany(Article::class, 'article_tag', 'tag_id', 'article_id');
    }
}
