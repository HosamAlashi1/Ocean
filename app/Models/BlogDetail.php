<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogDetail extends Model
{
    use HasFactory;
    protected $fillable = ['blog_id', 'url', 'key_url_en', 'key_url_ar'];
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

}
