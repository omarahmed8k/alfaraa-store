<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'name_ar', 'name_en', 'dese_ar','dese_en','nickname_st','nickname_num',
        'nickname_main','extra_data','image','category_id','price','status','feature'
    ];

    protected $casts = [
        'extra_data' => 'array',
    ];

    public function setExtraDataAttribute($value)
    {
        $properties = [];

        foreach ($value as $array_item) {
            if ( !is_null($array_item['key']) && !is_null($array_item['value']) ) {
                $properties[] = $array_item;
            }
        }

        $this->attributes['extra_data'] = empty($properties) ? null : json_encode($properties);
    }

    public function Category()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function images()
    {
        return $this->hasMany('App\Models\ProductImages','product_id');
    }

    public function creatManyImage($images= [])
    {
        $files = [];
        foreach($images??[] as $image){
            $files[]['path'] = $image;
        }
        $this->images()->createMany($files);
    }

    public function updatManyImage($images= [])
    {

        if( isset($this->images) && ($this->images->count() > 0) ){
            foreach($this->images as $img){
                @unlink(storage_path('app/public/').$img->path);
                $img->delete();
            }
        }

        $files = [];
        foreach($images??[] as $image){
            $files[]['path'] = $image;
        }
        $this->images()->createMany($files);
    }

}
