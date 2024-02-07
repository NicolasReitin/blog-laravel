<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleTag extends Model
{
    protected $table = 'article_tags';

    protected $primaryKey = ['article_id', 'tag_id'];

    public $incrementing = false;

    protected $fillable = [
        'article_id',
        'tag_id',
    ];

    public $timestamps = false;

    // public function articleTag() { // association N/N avec table article_tag
    //     return $this->belongsToMany(Tag::class, 'article_tag', 'article_id', 'tag_id');
    // }

    // public function tagArticle() { // association N/N avec table article_tag
    //     return $this->belongsToMany(Article::class, 'article_tag', 'tag_id', 'article_id');
    // }
}
