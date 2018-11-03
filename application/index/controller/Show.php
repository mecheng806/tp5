<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\Gifts;
use think\cache\driver\Redis;
use libs\RedisPage;
class Show extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        
        $gift = new Gifts();
        $list = $gift->list();
        $this->assign('list',$list);
        return $this->fetch('index');
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        $redis = new Redis();
        $redis->set('tp5_test_key1','tp5');
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($page)
    {   
        $limit = 10;
        $list = new RedisPage($page,$limit);
        echo $list->page;
        //return 1111;
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($gift_id)
    {
        $gift = new Gifts();
        $upd = $gift->edit($gift_id);
        if($upd>0){
            return ['status'=>1,'msg'=>'update is ok'];
        }else{
            return ['status'=>0,'msg'=>'update is fail'];
        }
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
