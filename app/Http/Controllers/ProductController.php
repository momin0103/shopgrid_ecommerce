<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubImage;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    private $categories;
    private $subCategories;
    private $brands;
    private $units;
    private $product;
    private $products;
    private $imageName;
    private $image;
    private $images;
    private $directory;
    private $imageURL;
    private $subImages;
    private $categoryId;


    public function index()
    {
        $this->categories = Category::all();
        $this->subCategories = SubCategory::all();
        $this->brands = Brand::all();
        $this->units = Unit::all();

        return view('admin.product.add', [
            'categories' => $this->categories,
            'sub_categories' => $this->subCategories,
            'brands'        => $this->brands,
            'units'         => $this->units,
        ]);
    }

    public function getSubCategoryByCategory()
    {
        $this->categoryId       = $_GET['id'];
        $this->subCategories    = SubCategory::where('category_id', $this->categoryId)->get();
        return response()->json($this->subCategories);
    }

    public function create(Request $request)
    {

        Product::newProduct($request);
        return redirect('/add-product')->with('message', 'Product info create successfully');
    }

    public function manage()
    {
        $this->products = Product::orderBy('id', 'desc')->get();
        return view('admin.product.manage', ['products' => $this->products]);
    }

    public function edit($id)
    {
        $this->product      = Product::find($id);
        $this->categories   = Category::all();
        $this->subCategories = SubCategory::all();
        $this->brands = Brand::all();
        $this->units = Unit::all();
        $this->subImages = SubImage::where('product_id', $id)->get();

        return view('admin.product.edit', [
            'product' => $this->product,
            'categories' => $this->categories,
            'sub_categories' => $this->subCategories,
            'brands'        => $this->brands,
            'units'         => $this->units,
            'sub_images'    => $this->subImages,
        ]);
    }

    public function update(Request $request, $id)
    {
        Product::updateProduct($request, $id);
        return redirect('/manage-product')->with('message','Product info update successfully');
    }

    public function delete($id)
    {
        Product::deleteProduct($id);
        return redirect('/manage-product')->with('message','Product info delete successfully');
    }
}
