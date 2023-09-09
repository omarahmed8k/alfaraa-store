<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'path',
    ];

    protected $appends = ['path_url'];

    public function Product()
    {
        return $this->belongsTo('App\Models\Product','product_id');
    }

    public function setPathAttribute($file)
    {
        $this->attributes['path'] = uploadFile($file, 'products_images', $this->path);
    }

    public function getPathUrlAttribute()
    {
        return filePath($this->path);
    }

}
