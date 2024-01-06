<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organizer;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Util\UtilService;

class OrganizerService extends Controller
{
    public static function getAll(){
        return Organizer::orderByDesc("id")->get();
    }

    public static function create($request){
        try{
            DB::beginTransaction();

            $validate = $request->validate([
                "name"=>"required",
                "tenVietTat"=>"required",
                "avartar"=>"required",
                "createdBy"=>"required",
                "updatedBy"=>"required"
            ]);
            $checkCategory = Organizer::where("name",$validate["name"])
                                        ->orWhere("tenVietTat",$validate["tenVietTat"])
                                        ->get();
            if(!$checkCategory->isEmpty()) {
                return response("Organizer đã tồn tại",400);
            }
            $avartar = $request->file("avartar");

            $category = new Organizer();
            $category->name = $validate["name"];
            $category->image = UtilService::upload($avartar);
            $category->tenVietTat = $validate["tenVietTat"];
            $category->createdBy = $validate["createdBy"];
            $category->updatedBy = $validate["updatedBy"];
            $category->createdAt = Carbon::now();
            $category->updatedAt = Carbon::now();

            $idMax = Organizer::max("id");
            $category->id = $idMax+1;
            $category->save();
            DB::commit();
            return response($category,200);         
        }catch(Exrption $e){
            return response("Lỗi server",500);
            DB::rollback();
        }
    }

    public static function getById($id){
        $category = Organizer::where("id",$id)
                            ->first();
        if(!$category) return response("Category không tồn tại", 400);
        return response($category,200);
    }

    public static function update($request){
        try{
            DB::beginTransaction();
            $validate = $request->validate([
                "id"=>"required",
                "name"=>"required",
                "tenVietTat"=>"required",
                "updatedBy"=>"required"
            ]);
            $checkCategory = Organizer::where("name",$request->input("name"))
                                      ->where("id", "<>", $request->input("id"))
                                      ->get();
            if(!$checkCategory->isEmpty()){
                return response("Tên category đã tồn tại",400);
            }
            $category = Organizer::where("id",$request->input("id"))
                                ->first();
            if(!$category) return response("Tên category không tồn tại",400);
            $avartar = $request->file("avartar");

            $category->name = $request->input("name");
            $category->tenVietTat = $request->input("tenVietTat");
            $category->updatedBy = $request->input("updatedBy");
            $category->updatedAt = Carbon::now();
            if($avartar) {
                $image = $category->image;
                UtilService::deleteFile($image);
                $category->image = UtilService::upload($avartar);
            }
            $category->save();
            DB::commit();
        }catch(Exeption $e){
            return response("Lỗi server",500);
            DB::rollback();
        }
    }
}
