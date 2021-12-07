<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agencies extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'name_ar',
        'url'
    ];

    public function photo(){
        return $this->morphOne('App\Models\Photoable', 'photoable');
    }
}
