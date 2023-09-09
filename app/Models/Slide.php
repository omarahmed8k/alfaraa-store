<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;

    protected $fillable = [
      
        'title_ar', 'title_en','spantitle_ar','spantitle_en','description_ar','description_en','image',
    ];
}
