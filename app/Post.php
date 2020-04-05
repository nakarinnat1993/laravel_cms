<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    //
    protected $fillable = ['title', 'description', 'content', 'image','category_id','user_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
    public function deleteImage()
    {
        Storage::delete($this->image);
    }
    public function hasTag($tagID){
        return in_array($tagID,$this->tags->pluck('id')->toArray());
    }
}
