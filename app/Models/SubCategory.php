<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class SubCategory extends Model
{
    use HasFactory;

    private static $subCategory;
    private static $image;
    private static $imageName;
    private static $directory;
    private static $imageURL;

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'sub-category-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageURL = self::$directory.self::$imageName;
        return self::$imageURL;
    }

    public static function saveBasicInfo($subCategory, $request, $imageURL)
    {
        $subCategory->category_id = $request->category_id;
        $subCategory->name        = $request->name;
        $subCategory->description = $request->description;
        $subCategory->image       = self::$imageURL;
        $subCategory->save();
    }

    public static function newSubCategory($request)
    {
        SubCategory::saveBasicInfo(new SubCategory(), $request, self::getImageUrl($request) );
    }

    public static function updateSubCategory($request, $id)
    {
        self::$subCategory = SubCategory::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$subCategory->image))
            {
                unlink(self::$subCategory->image);
            }

            self::$imageURL = self::getImageUrl($request);
        }
        else
        {
            self::$imageURL = self::$subCategory->image;
        }
        SubCategory::saveBasicInfo(self::$subCategory, $request, self::$imageURL);
    }

    public static function deleteSubCategory($id)
    {
        self::$subCategory = SubCategory::find($id);
        if (file_exists(self::$subCategory->image))
        {
            unlink(self::$subCategory->image);
        }
        self::$subCategory->delete();
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
