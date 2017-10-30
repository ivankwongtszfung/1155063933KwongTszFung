<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $table = 'category';
    protected $fillable = [
        'Catname'
    ];
    public function getCategory(){

        return $this->all();
    }

    public function insertCategory($data){

      $id=$this::insertGetId([
          "Catname" => $data['Catname'] 
          ]);
      return $id;

    }

    public function updateCategory($data){
      $id=$data['Catid'];
      $status=$this->where('Catid', $id)
      ->update([
         "Catname"=>$data['Catname']
         ]);
      return $status;
    }


    public function deleteCategory($data){
      $id=$data['Catid'];
      $status=$this->where('Catid', $id)->delete();
      return $status;
    }
}
