<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopgridController extends Controller
{
    private $categories;
    private $trendingProducts;
    private $products;
    private $product;

    public function index()
    {
        $this->categories = Category::orderBy('id', 'desc')->take(12)->get();
        $this->trendingProducts = Product::orderBy('id', 'desc')->take(12)->get();
        return view('front.home.home', [
            'fetured_categories' => $this->categories,
            'trending_products' => $this->trendingProducts
        ]);
    }

    public function categoryProduct($id)
    {
        $this->products = Product::where('category_id', $id)->orderBy('id', 'desc')->get();
        return view('front.category.category-product', ['products' => $this->products]);
    }

    public function subCategoryProduct($id)
    {
        $this->products = Product::where('sub_category_id', $id)->orderBy('id', 'desc')->get();
        return view('front.category.category-product', ['products' => $this->products]);
    }

    public function productDetail($id)
    {
        $this->product = Product::find($id);
        return view('front.product.detail', ['product' => $this->product]);
    }
}
