<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryService extends Controller
{
    public static function getAll(){
        return Category::all();
    }
    public static function create($request){
        try{
            DB::beginTransaction();

            $validate = $request->validate([
                "name"=>"required",
                "tenVietTat"=>"required",
                "image"=>"required",
                "createdBy"=>"required",
                "updatedBy"=>"required"
            ]);
            $checkCategory = Category::where("name",$validate["name"])
                                        ->orWhere("tenVietTat",$validate["tenVietTat"])
                                        ->get();
            if(!$checkCategory->isEmpty()) {
                return response(["message"=>["name"=>"Category đã tồn tại"]],400);
            }
    
            $category = new Category();
            $category->name = $validate["name"];
            $category->image = $validate["image"];
            $category->tenVietTat = $validate["tenVietTat"];
            $category->createdBy = $validate["createdBy"];
            $category->updatedBy = $validate["updatedBy"];
            $category->createdAt = Carbon::now();
            $category->updatedAt = Carbon::now();

            $idMax = Category::max("id");
            $category->id = $idMax+1;
            $category->save();
            DB::commit();
            return response(["message"=>"OK"],200);         
        }catch(Exrption $e){
            DB::rollback();
        }
    }
}
