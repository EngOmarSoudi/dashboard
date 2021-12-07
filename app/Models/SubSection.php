<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSection extends Model
{
    use HasFactory;
    protected $fillable = [
        'section_id',
        'title',
        'title_ar'
    ];

    public function section(){
        return $this->belongsTo('App\Models\Section', 'section_id');
    }

    public function product(){
        return $this->hasMany('App\Models\Product');
    }
    public function subsectionssub(){
        return $this->hasMany('App\Models\SubSectionSub', 'sub_section_id');
    }
}
