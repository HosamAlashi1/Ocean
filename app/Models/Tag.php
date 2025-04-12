<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['title_ar', 'title_en'];
    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }

}
