<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'key_id',
        'value',
        'type_ar',
        'type_en',
        'title_en',
        'title_ar',
        'set_group',
        'is_object'
    ];
}
