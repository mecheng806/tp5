<?php

namespace app\index\model;

use think\Model;
use think\Db;
class Gifts extends Model
 {	//public $gift; 	
 	//public function __construct(){
		//$this->gift = new Gifts();
	//}
    public function list(){
    	//$gift = new Gifts;
    	//$list = $gift->where('id','>',250)->order('totals','desc')->limit(2)->select();
    	$list = Db::table('gifts')->where('id','>',250)->order('remain','desc')->limit(4)->select();
    	return $list;
    }
    public function edit($id){
    	$upd = Db::table('gifts')
    		 ->where('id',$id)
    		 ->update([
    			'remain'=>Db::raw('remain-1')
    		 ]);
    	return $upd;
    }
}
