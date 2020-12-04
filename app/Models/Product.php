<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory;
    use Softdeletes;

    protected $fillable = ['id', 'name', 'category_id', 'slug', 'price', 'quantity', 'description'];

    protected $hidden = [];

    public function categories()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }
    

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'products_id');
    }

}
