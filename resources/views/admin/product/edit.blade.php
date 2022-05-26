@extends('master.admin.master')

@section('body')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Edit Product Form</h3>
                    </div>
                    <!-- form start -->
                    <form class="form-horizontal" action="{{route('update-product', ['id' => $product->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <p class="text-center text-success">{{Session::get('message')}}</p>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Category Name</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="category_id" onchange="getSubCategory(this.value)">
                                        <option value=""> -- Select Category Name -- </option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Sub Category Name</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="sub_category_id" id="subCategoryId">
                                        <option value=""> -- Select Sub Category Name -- </option>
                                        @foreach($sub_categories as $sub_category)
                                            <option value="{{$sub_category->id}}" {{ $sub_category->id == $product->sub_category_id ? 'selected' : '' }}>{{$sub_category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Brand Name</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="brand_id">
                                        <option> -- Select Brand Name -- </option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}" {{ $brand->id == $product->brand_id ? 'selected' : '' }}>{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Unit Name</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="unit_id">
                                        <option> -- Select Unit Name -- </option>
                                        @foreach($units as $unit)
                                            <option value="{{$unit->id}}" {{ $unit->id == $product->unit_id ? 'selected' : '' }}>{{$unit->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Product Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$product->name}}" name="name" id="inputEmail3" placeholder="Product Name"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Product Code</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$product->code}}" name="code" id="inputEmail3" placeholder="Product Code"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Regular Price</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" value="{{$product->regular_price}}" name="regular_price" id="inputEmail3" placeholder="Regular PRice"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Selling Price</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" value="{{$product->selling_price}}" name="selling_price" id="inputEmail3" placeholder="Selling PRice"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Short Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="inputPassword3" name="short_description" placeholder="Short Description">{{$product->short_description}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Long Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control summernote" name="long_description" placeholder="Long Description">{{$product->long_description}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Product Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control-file" name="image" accept="image/*"/>
                                    <img src="{{asset($product->image)}}" alt="" height="100" width="130"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Product Sub Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control-file" name="sub_image[]" multiple  accept="image/*"/>
                                    @foreach($sub_images as $sub_image)
                                        <img src="{{asset($sub_image->image)}}" alt="" height="100" width="130"/>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer float-right">
                            <button type="submit" class="btn btn-info">Update Product Info</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
