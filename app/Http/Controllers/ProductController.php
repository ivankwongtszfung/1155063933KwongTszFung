<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Response;
use Validator;

class ProductController extends Controller
{
    public function create(Request $request){
        try {
            $data = $request->all();
            Log::info($data);
            //$validator = Validator::make($data, Product::CREATE_RULES);
            // if ($validator->fails()){
            //     log::error($validator->errors());
            //     return response([
            //         'status' => 'Failed',
            //         'content' => 'E0034011'
            //         ], 401);
            // }
            DB::beginTransaction();

            $product = new Product();

            $productId=$product->createProduct($data);

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
            'productId' => $productId
            ]
            ],200);

    }

    public function allProduct(){
        $product= new Product();
        $result=$product->getProduct();
        return response([
            'status' => 'Success',
            'content' => $result
            ],200);
        
    }

    public function getProductByCatid(Request $request){
        $product= new Product();

        $data = $request->all();

        $result=$product->getProductByCatid($data);

        return response([
            'status' => 'Success',
            'content' => $result
            ],200);
        
    }

    public function getProductByPid(Request $request){
        $product= new Product();

        $data = $request->all();

        $result=$product->getProductByPid($data);

        return response([
            'status' => 'Success',
            'content' => $result
            ],200);
    }

    public function updateProduct(Request $request){
        $product= new Product();

        $data = $request->all();

        $result=$product->updateProduct($data);

        return response([
            'status' => 'Success',
            'content' => $result
            ],200);
    }

    public function deleteProduct(Request $request){
        $product= new Product();

        $data = $request->all();

        $result=$product->deleteProduct($data);

        return response([
            'status' => 'Success',
            'content' => $result
            ],200);
    }


}
