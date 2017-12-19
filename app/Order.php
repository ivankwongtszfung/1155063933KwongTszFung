<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;
    protected $table = 'orders';
    protected $fillable = [
    "disgest",
    "salt",
    "tid",
    "user_id"
    ];

    public function saveOrder($data)
    {
    	$salt = str_random(16);
    	bcrypt($password . $salt );
    	$id=$this::insertGetId([
    		"disgest" => $data['disgest'],
    		"salt" => $data['salt'] ,
    		"tid"=> $data['tid'] ,
    		"user_id"=> $data['user_id']
    		]);
        return $id;
    }
}
