<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductGallery;

class ProductController extends Controller
{
    public function all(Request $request){
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $slug = $request->input('slug');
        $type = $request->input('type');
        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        if($id){
            $product=Product::with('galleries')->find($id);

            if($product)
                return ResponseFormatter::success($product,'Data produk berhasil diambil');
            else
                return ResponseFormatter::error(null,'Data produk tidak ada',404);
                
        }

        if($slug){
            $product=Product::with('galleries')->where('slug',$slug)->first();

            if($product)
                return ResponseFormatter::success($product,'Data produk berhasil diambil');
            else
                return ResponseFormatter::error(null,'Data produk tidak ada',404);
                
        }

        $product = Product::with('galleries');

        if($name)
            $product->where('name','like','%'. $name .'%');

        if($type)
            $product->where('type','like','%'. $type .'%');
        
        if($price_from)
            $product->where('price','>=' , $price_from);
        
        if($price_to)
            $product->where('price','<=' , $price_to);

        return ResponseFormatter::success(
            $product->paginate($limit),
            'Data List Produk berhasil diambil'
        );
    }

    public function postItem(Request $request){
        $data = $request->all();
        $post = Product::create($data);

        if($post)
            return ResponseFormatter::success($post,'Data produk berhasil disimpan');
        else
            return ResponseFormatter::error(null,'Data produk tidak ada',404);
    }

    public function updateItem(Request $request,$id){
        $data = $request->all();

        $item = Product::findOrFail($id);
        $item->update($data);

        if($data)
            return ResponseFormatter::success($item,'Data produk berhasil disimpan');
        else
            return ResponseFormatter::error(null,'Data produk tidak ada',404);
    }

    public function deleteItem($id){
        $item = Product::findOrFail($id);
        $item->delete();

        ProductGallery::where('products_id',$id)->delete();

        if($item)
            return ResponseFormatter::success($item,'Data produk berhasil dihapus');
        else
            return ResponseFormatter::error(null,'Data produk tidak ada',404);
    }
}
