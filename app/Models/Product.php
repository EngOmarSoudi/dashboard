<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'title_ar',
        'content_ar',
        'sub_section_id'
    ];

    public function photo(){
        return $this->morphOne('App\Models\Photoable', 'photoable');
    }

    public function subsection(){
        return $this->belongsTo('App\Models\SubSection');
    }
}
