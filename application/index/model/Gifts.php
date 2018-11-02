<?php

namespace app\index\model;

use think\Model;

class Gifts extends Model
 {	//public $gift; 	
 	//public function __construct(){
		//$this->gift = new Gifts();
	//}
    public function list(){
    	$gift = new Gifts;
    	$list = $gift->where('id','>',250)->order('totals','desc')->limit(2)->select();
    	return $list;
    }
}
