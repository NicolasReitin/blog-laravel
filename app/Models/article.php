<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function writedBy() { // association 1/N avec la table users
        return $this->belongsTo(User::class, 'user_id');
    }

    public function belongToCategory() { // association 1/N avec la table category
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function articleTag() { // association N/N avec table article_tag
        return $this->belongsToMany(Tag::class, 'article_tag', 'article_id', 'tag_id');
    }


//test


}
