<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use HasFactory;
    use Softdeletes;

    protected $fillable = ['id', 'name'];

    public function products()
    {
        return $this->hasMany('App\Models\Product','category_id');
    }
}
