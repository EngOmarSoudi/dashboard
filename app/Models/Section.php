<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function photo(){
        return $this->morphOne('App\Models\Photoable', 'photoable');
    }

    public function subsections(){
        return $this->hasMany('App\Models\SubSection', 'section_id');
    }


    public function subsectionssub(){
        return $this->hasMany('App\Models\SubSectionSub', 'sub_section_id');
    }
}
