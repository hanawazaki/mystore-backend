<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    use HasFactory;
    use Softdeletes;

    protected $fillable = ['products_id','photo','thumb','is_default'];

    public function product(){
        return $this->belongsTo(Product::class,'products_id','id');
    }

    public function getPhotoAttribute($value){
        return url('storage/' . $value);
    }

    public function getThumbAttribute($value){
        return url('storage/' . $value);
    }
}
