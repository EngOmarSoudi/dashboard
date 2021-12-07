<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSectionSub extends Model
{
    use HasFactory;
    protected $fillable = [
        'sub_section_id',
        'title',
        'title_ar'
    ];

    public function sections(){
        return $this->belongsTo('App\Models\SubSectionSub', 'sub_section_id');
    }
    public function product(){
        return $this->hasMany('App\Models\Product');
    }
}
