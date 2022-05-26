<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $brand;
    public $brands;


    public function index()
    {
        return view('admin.brand.add');
    }

    public function create(Request $request)
    {
        Brand::newBrand($request);
        return redirect('/add-brand')->with('message', 'Brand info create successfully');
    }

    public function manage()
    {
        $this->brands = Brand::orderBy('id', 'desc')->get();
        return view('admin.brand.manage', ['brands' => $this->brands]);
    }

    public function edit($id)
    {
        $this->brand = Brand::find($id);
        return view('admin.brand.edit', ['brand' => $this->brand]);
    }

    public function update(Request $request, $id)
    {
        Brand::updateBrand($request, $id);
        return redirect('/manage-brand')->with('message','Brand info update successfully');
    }

    public function delete($id)
    {
       Brand::deleteBrand($id);
       return redirect('/manage-brand')->with('message','Brand info delete successfully');
    }
}
