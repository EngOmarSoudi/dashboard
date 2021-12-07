<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'leadingParagraph',
        'title_ar',
        'leadingParagraph_ar'
    ];
    public function photo(){
    return $this->morphOne('App\Models\Photoable', 'photoable');
}
}
