<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $res = M('news')->field(array('id','title','datetime'))->order('datetime desc')->limit(5)->select();
        for ($i=0;$i<sizeof($res);$i++) {
            $res[$i]['url'] = U('News/newsinfo',array('id'=>$res[$i]['id']));
        }
        $this->assign('news', $res);
        //项目新闻
        $res = M('news')->field(array('id','title','datetime'))->where('type=2')->order('datetime desc')->limit(5)->select();
        for ($i=0;$i<sizeof($res);$i++) {
            $res[$i]['url'] = U('News/newsinfo',array('id'=>$res[$i]['id']));
        }
        $this->assign('projectnews', $res);
        //首页中间上面的图片
        $res = M('project')->order('id desc')->limit(3)->select();
        for ($i=0;$i<sizeof($res);$i++) {
            $res[$i]['url']=U('Project/projectInfo',array('id'=>$res[$i]['id']));
        }
        $this->assign('project',$res);
        //首页中间下面的图片 history
        $res = M('project')->order('id asc')->limit(4)->select();
        for ($i=0;$i<sizeof($res);$i++) {
            $res[$i]['url']=U('Project/projectInfo',array('id'=>$res[$i]['id']));
        }

        $this->assign('history',$res);
        $this->display();
    }

}