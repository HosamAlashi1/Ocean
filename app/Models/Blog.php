<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [ 'image', 'title_en', 'title_ar','content_ar','by'
        ,'date','desc_en','desc_ar','content_en'];


    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function details()
    {
        return $this->hasMany(BlogDetail::class);
    }

}
