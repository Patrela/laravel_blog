<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;
    protected $guarded =['id', 'created_at', 'updated_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
    // change route
    public function getRouteKeyName()
    {
        return 'slug';
    }
    protected function slug(): Attribute

    {
        return Attribute::make(

            get: fn ($value) => $value,

            set: fn ($value) => Str::slug($this->title)

        );

    }

}
