<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Response;
use Validator;

class CategoryController extends Controller
{

    public function create(Request $request){
        try {
            $data = $request->all();
            Log::info($data);
            //$validator = Validator::make($data, Category::CREATE_RULES);
            // if ($validator->fails()){
            //     log::error($validator->errors());
            //     return response([
            //         'status' => 'Failed',
            //         'content' => 'E0034011'
            //         ], 401);
            // }
            DB::beginTransaction();

            $category = new Category();

            $categoryId=$category->insertCategory($data);

            //Log::info($orderId);

            DB::commit();
        }
        catch(\InvalidArgumentException $e){
            Log::error($e);
            DB::rollBack();
            return response([
                'status' => 'Failed',
                'content' => 'E0034041'
                ], 404);
        }
        catch(\Exception $e) {
            Log::error($e);
            DB::rollBack();
            return response([
                'status' => 'Failed',
                'content' => 'E0035001'
                ], 500);
        }
        
        return response([
            'status' => 'Success',
            'content' => [
            'categoryId' => $categoryId
            ]
            ],200);

    }


    public function getCategory(Request $request){
        $category= new Category();

        $data = $request->all();

        $result=$category->getCategory($data);

        return response([
            'status' => 'Success',
            'content' => $result
            ],200);
    }


    public function updateCategory(Request $request){
        $category= new Category();

        $data = $request->all();

        $result=$category->updateCategory($data);

        return response([
            'status' => 'Success',
            'content' => $result
            ],200);
    }

    public function deleteCategory(Request $request){
        $category= new Category();

        $data = $request->all();

        $result=$category->deleteCategory($data);

        return response([
            'status' => 'Success',
            'content' => $result
            ],200);
    }
    
}

