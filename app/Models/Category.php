<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class Category extends Model
{
    use HasFactory;

    private static $category;
    private static $imageName;
    private static $image;
    private static $directory;
    private static $imageURL;

    public static function getImageUrl($request)
    {
        self::$image            = $request->file('image');
        self::$imageName        = self::$image->getClientOriginalName();
        self::$directory        = 'category-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageURL          = self::$directory.self::$imageName;
        return self::$imageURL;
    }

    public static function saveBasicInfo($category, $request, $imageURL)
    {
        $category->name           = $request->name;
        $category->description    = $request->description;
        $category->image          =  self::$imageURL;
        $category->save();
    }

    public static function newCategory($request)
    {
       Category::saveBasicInfo(new Category(), $request, self::getImageUrl($request));
    }

    public static function updateCategory($request, $id)
    {
        self::$category = Category::find($id);
        if($request->file('image'))
        {
            if (file_exists(self::$category->image))
            {
                unlink(self::$category->image);
            }


            self::$imageURL = self::getImageUrl($request);
        }
        else
        {
            self::$imageURL = self::$category->image;
        }
        Category::saveBasicInfo(self::$category, $request, self::$imageURL);
    }

    public static function deleteCategory($id)
    {
        self::$category = Category::find($id);
        if (file_exists(self::$category->image))
        {
            unlink(self::$category->image);
        }
        self::$category->delete();
    }

    public function subCategory()
    {
        return $this->hasMany('App\Models\SubCategory');
    }
}
