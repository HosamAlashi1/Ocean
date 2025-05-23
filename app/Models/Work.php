<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;
    protected $fillable = ['image','service_id' ,'type'];

    public function service()
    {
        return $this->belongsTo('App\Models\Service', 'service_id');
    }


}
