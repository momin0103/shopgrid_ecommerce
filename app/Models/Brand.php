<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    private static $brand;
    private static  $brands;
    private static  $imageName;
    private static  $image;
    private static  $directory;
    private static  $imageURL;

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'brand-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageURL = self::$directory.self::$imageName;
        return self::$imageURL ;
    }

    public static function saveBasicInfo($brand, $request, $imageURL)
    {
        $brand->name           = $request->name;
        $brand->description    = $request->description;
        $brand->image          =  self::$imageURL;
        $brand->save();
    }

    public static function newBrand($request)
    {
        Brand::saveBasicInfo(new Brand(),$request, self::getImageUrl($request));
    }

    public static function updateBrand($request, $id)
    {
        self::$brand = Brand::find($id);

        if($request->file('image'))
        {
            if (file_exists(self::$brand->image))
            {
                unlink(self::$brand->image);
            }

            self::$image = $request->file('image');
            self::$imageName = self::$image->getClientOriginalName();
            self::$directory = 'brand-images/';
            self::$image->move(self::$directory, self::$imageName);

            self::$imageURL = self::$directory.self::$imageName;
        }
        else
        {
            self::$imageURL = self::$brand->image;
        }
      Brand::saveBasicInfo(self::$brand, $request,self::$imageURL);

    }
    public static function deleteBrand($id)
    {
        self::$brand = Brand::find($id);
        if (file_exists(self::$brand->image))
        {
            unlink(self::$brand->image);
        }
        self::$brand->delete();
    }
}
