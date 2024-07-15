<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request) {
        $productsQuery = Product::orderBy('id');

        if ($request->filter) {
            $productsQuery->where('name', 'like', "%{$request->filter}%")
                          ->orWhere('description', 'like', "%{$request->filter}%");
        }

        $products = $productsQuery->get();

        return view('templates._products-list-for-create', ['products' => $products]);
    }

public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'image' => 'required|image|max:2048',
    ]);

    if ($validator->fails()) {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('templates._create-products-error', [
            'errors' => $validator->errors()->all(),
            'products' => $products,
        ]);
    }

    // Store the image
    $imagePath = $request->file('image')->store('product_images', 'public');

    // Create the product
    $product = Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'quantity' => $request->quantity,
        'image' => Storage::url($imagePath),
    ]);

    // Retrieve the updated list of products
    $products = Product::orderBy('created_at', 'desc')->get();

    // Render the product list view and append the success message
    return view('templates._products-list-for-create', ['products' => $products]);
}




    public function open() {
        return view('templates._create');
    }




    public function error(){
        $html = '';

        $html .= '
            <div id="error" class="bg-red-200 text-center m-2 rounded">
                Product Error!
            </div>
        ';
        return $html;
    }

    public function delete(Product $product) {

        $product->delete();
        return "";
    }
}
