<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function tagArticle() { // association N/N avec table article_tag
        return $this->belongsToMany(Article::class, 'article_tag', 'tag_id', 'article_id');
    }
}
