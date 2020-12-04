<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;


class CategoryController extends Controller
{

    public function index()
    {
        $items = Category::whereNull('deleted_at')->get();
        return view('pages.categories.index')->with(['items' => $items]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.categories.create')->with(['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $post = Category::create($data);

        return redirect()->action([CategoryController::class, 'index']);
    }

    public function edit($id)
    {
        $item = Category::findOrFail($id);
        return view('pages.categories.edit')->with(['item' => $item]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = Category::findOrFail($id);
        $item->update($data);

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $item = Category::findOrFail($id);
        $item->delete();

        return redirect()->route('categories.index');
    }

    public function search(Request $request)
    {
        $data = $request->name;
        $items = Category::where("name", "like", "%" . $data . "%")
            ->whereNull("deleted_at")
            ->get();

        return view('pages.categories.index')->with(['items' => $items]);
    }
}
