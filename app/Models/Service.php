<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [ 'desc_en','desc_ar','image','title_ar','title_en','show_on_our_service','show_on_recent_work'];

    public function works()
    {
        return $this->hasMany('App\Models\Work', 'service_id');
    }


}
