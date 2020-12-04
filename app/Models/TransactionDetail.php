<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    use Softdeletes;

    protected $fillable = ['id','transactions_id','products_id'];
    
    protected $hidden = [
    
    ];

    public function transaction(){
        return $this->belongsTo(Transaction::class,'transaction_id','id');
    }

    public function product(){
        return $this->belongsTo(Product::class,'products_id','id');
    }
}
