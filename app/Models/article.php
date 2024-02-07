<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $guarded = [];
    

    public function writedBy() { // association 1/N avec la table users
        // return $this->belongsTo(User::class, 'users', 'article_id', 'user_id');
        return $this->belongsTo(User::class, 'user_id');
    }

    public function belongToCategory() { // association 1/N avec la table category
        return $this->belongsTo(Category::class, 'category_id');
    }

}
