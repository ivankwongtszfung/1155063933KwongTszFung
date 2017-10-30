<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Product extends Model
{
    public $timestamps = false;
    protected $table = 'product';
    protected $fillable = [
    "Catid",
    "Sku",
    "Name",
    "Description",
    "Cost",
    "MarkedPrice",
    "SellingPrice",
    "Barcode",
    "Quanity"
    ];
    const CREATE_RULES = [
    "Catid" => "required",
    "Sku" =>  "required",
    "Name"=> "required" ,
    "Description"=> "required",
    "Cost"=> "required",
    "MarkedPrice"=> "required",
    "SellingPrice"=> "required",
    "Barcode"=> "required",
    "Quanity"=> "required"
    ];

    const UPDATE_RULES = [
    "Pid"  =>  "required",
    "Catid" => "required",
    "Sku" =>  "required",
    "Name"=> "required" ,
    "Description"=> "required",
    "Cost"=> "required",
    "MarkedPrice"=> "required",
    "SellingPrice"=> "required",
    "Barcode"=> "required",
    "Quanity"=> "required"
    ];
    

    const DELETE_RULES = [
    "Pid"  =>  "required"
    ];

    public function getProduct(){
    	return $this->all();
    }

    public function getProductByCatid($data){
    	return $this->where('Catid',$data['Catid'])->get();
    }

    public function getProductByPid($data){
    	return $this->where('Pid',$data['Pid'])->get();
    }

    public function createProduct($data){
    	$id=$this::insertGetId([
    		"Catid" => $data['Catid'],
    		"Sku" => $data['Sku'] ,
    		"Name"=> $data['Name'] ,
    		"Description"=> $data['Description'],
    		"Cost"=> $data['Cost'],
    		"MarkedPrice"=> $data['MarkedPrice'],
    		"SellingPrice"=> $data['SellingPrice'],
    		"Barcode"=> $data['Barcode'],
    		"Quanity"=> $data['Quanity']
    		]);
        return $id;
    }

    public function updateProduct($data){
        $id=$data['Pid'];
        $this->where('Pid', $id)
        ->update([
            "Catid" => $data['Catid'],
            "Sku" => $data['Sku'] ,
            "Name"=> $data['Name'] ,
            "Description"=> $data['Description'],
            "Cost"=> $data['Cost'],
            "MarkedPrice"=> $data['MarkedPrice'],
            "SellingPrice"=> $data['SellingPrice'],
            "Barcode"=> $data['Barcode'],
            "Quanity"=> $data['Quanity']
            ]);
        return true;
    }

    public function deleteProduct($data){
        $id=$data['Pid'];
        $status=$this->where('Pid', $id)->delete();
        return $status;
    }


}