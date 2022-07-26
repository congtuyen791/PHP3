<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::select('id', 'name', 'price', 'thumbnail_url', 'status')
            ->orderBy('id', 'desc')
            ->paginate(5);
        return view('product.list', ['product_list' => $products]);
    }
    public function delete(Product $product)
    {
        if ($product->delete()) {
            return redirect()->back();
        }
    }
    public function create()
    {
        return view('product.add');
    }
    public function store(Request $request)
    {
        $product = new Product();
        $product->fill($request->all());
        if ($request->hasFile('avatar')) {
            $avatar = $request->avatar;
            $avatarName = $avatar->hashName();
            $avatarName = $request->username . '_' . $avatarName;
            $product->thumbnail_url = $avatar->storeAs('images/products', $avatarName);
        } else {
            $product->thumbnail_url = '';
        }
        $product->save();
        return redirect()->route('products.list');
    }
    public function status(Product $product, $status)
    {
        // dd($product, $status);
        if ($product->status == 1) {
            $product->update(['status' => 0]);
            return redirect()->back();
        } else {
            $product->update(['status' => 1]);
            return redirect()->back();
        }
    }
    public function search(Request $request)
    {
        if($key = $request->key) {
            $products = Product::where('name', 'like', '%' . $key . '%')->get();
            // dd($products);
            return view('product.search', ['product_list' => $products]);
        }
    }
}
