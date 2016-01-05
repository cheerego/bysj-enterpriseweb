<?php
namespace Home\Controller;

use Think\Controller;
use Think\Page;

class ProjectController extends Controller
{
    public function index()
    {
            $count = M('project')->count();
            $page = new Page($count,4);
            $page->setConfig('header', '共%TOTAL_ROW%条');
            $page->setConfig('first', '首页');
            $page->setConfig('last', '共%TOTAL_PAGE%页');
            $page->setConfig('prev', '上一页');
            $page->setConfig('next', '下一页');
            $page->setConfig('theme', '%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
            $show = $page->show();


            if ($res =  M('project')->limit($page->firstRow . ',' . $page->listRows)->select()) {
                for ($i=0;$i<sizeof($res);$i++) {
                    $res[$i]['url'] = U('Project/projectInfo',array('id'=>$res[$i]['id']));
                }
                $this->assign('project', $res);
                $this->assign('page', $show);
            }
        
        $this->display();
    }
    public function projectInfo($id){
        if(empty($id)||!IS_GET){
            $this->error('该页面不存在！','',2);
        }
        if ($res = M('project')->find($id)) {
            $this->assign('project',$res);
        }
        $this->display();
    }


}