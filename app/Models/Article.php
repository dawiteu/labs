<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function tags(){
        return $this->belongsToMany(Tag::class, 'article_tag', 'article_id'); 
    }

    public function comments(){
        return $this->hasMany(Comment::class)->where('valide', 1)->where('deleted', 0); //jamais trop sûr. 
    }

    public function categorie(){
        return $this->belongsTo(Categorie::class); 
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
