<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductGalleryRequest;
use App\Models\Product;
use App\Models\ProductGallery;
use Image;

class ProductGalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = ProductGallery::with('product')->get();

        return view('pages.product-galleries.index')->with(['items' => $items]);
    }

    public function create()
    {
        $products = Product::all();
        return view('pages.product-galleries.create')->with(['products' => $products]);
    }

    public function store(ProductGalleryRequest $request)
    {
        $data = $request->all();
        $image = $request->file('photo');

        $input['imagename'] = time().'.'.$image->extension();
        
        $destinationPath = public_path('storage/assets/product/thumbnails');
        $img = Image::make($image->path());
        $img->resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);
   
        $destinationPath = public_path('storage/assets/product');
        $image->move($destinationPath, $input['imagename']);
        // 
        $data['photo'] = 'assets/product/'.$input['imagename'];
        $data['thumb'] = 'assets/product/thumbnails/'.$input['imagename'];

        // dd($data);
        // exit();

        ProductGallery::create($data);
        return redirect()->route('product-galleries.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $item = ProductGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('product-galleries.index');
    }

    public function gallery(Request $request, $id){
        $product = Product::findOrFail($id);
        $items = ProductGallery::with('product')
                                ->where('product_id',$id)
                                ->get();

        return view('pages.products.gallery')->with([
            'product' => $product,
            'items' => $items
        ]);
    }
}
