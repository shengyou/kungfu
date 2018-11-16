<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TerribleProductController extends Controller
{
    
    private function doSomething($request)
    {
        $attributes=[]
        ;
        foreach ($request->all() as $key => $value) {
            $attributes[$key] = $value;
        }return$attributes;
    }

    public function index()
    {
        $products = $this->product->orderBy('created_at', 'DESC')->get();
        $data=['products'=>$products];
        return view('products.index', $data);
    }



    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    protected $product;

    public function create(Category $category)
    {
        $categories =$category->all();
        $data = ['categories'=> $categories];
        return view('products.create', $data);
    }



    public function store(ProductRequest $request)
    {
        $attributes = $this->doSomething($request);
        $this->product->create($attributes);
        return redirect()->route('products.index');
    }
}
