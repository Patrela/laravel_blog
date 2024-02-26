<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\User;
use App\Models\Category;

class Article extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at', 'updated_at'];


    public function user() {
        return $this->belongsTo(User::class);
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    //PVR change Key url/:id by url/:slug
    public function getRouteKeyName()  {
        return 'slug';
    }
}
