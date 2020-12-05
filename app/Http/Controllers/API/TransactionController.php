<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function get($id){
        $product = Transaction::with(['details.product'])->find($id);

        if($product){
            return ResponseFormatter::success($product, 'Data Transaction Berhasil diambil');
        }
        else{
            return ResponseFormatter::error(null, 'Data Transaction tidak ada',404);
        }
    }
}
