<?php
namespace Home\Controller;

use Think\Controller;
use Think\Page;

class CompanyController extends Controller
{
    //公司简介  第一个页面
    public function index()
    {

        /**
         * 显示联系方式
         */
        if ($res= M('address')->find('1')) {
            $this->assign('address', $res);
        }


        $jianjie = M('jianjie');
        if ($res = $jianjie->find('1')) {
            $this->assign('jianjie',$res['content']);
        }

        $this->display();
    }

    //公司大事
    public function dashi()
    {
        if ($res= M('address')->find('1')) {
            $this->assign('address', $res);
        }
        $dashi = M('jianjie_dashi');
        if ($res =$dashi->find('1')) {
            $this->assign('dashi',$res['content']);
        }
        $this->display();
    }

    public function zhanlve()
    {
        if ($res= M('address')->find('1')) {
            $this->assign('address', $res);
        }
        $zhici = M('jianjie_zhanlue');
        if ($res = $zhici->find('1')) {
            $this->assign('zhanlue',$res['content']);
        }
        $this->display();
    }

    public function rongyu()
    {
        if ($res= M('address')->find('1')) {
            $this->assign('address', $res);
        }
        if ($res = M('rongyu')->select()) {
            $count = M('rongyu')->count();
            $page = new Page($count,8);
            $page->setConfig('header', '共%TOTAL_ROW%条');
            $page->setConfig('first', '首页');
            $page->setConfig('last', '共%TOTAL_PAGE%页');
            $page->setConfig('prev', '上一页');
            $page->setConfig('next', '下一页');
            $page->setConfig('theme', '%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
            $show = $page->show();


            if ($res =  M('rongyu')->limit($page->firstRow . ',' . $page->listRows)->select()) {
                $this->assign('rongyu', $res);
                $this->assign('page', $show);
            }

        }
        $this->display();
    }


    public function zhici()
    {
        if ($res= M('address')->find('1')) {
            $this->assign('address', $res);
        }
        $zhici = M('jianjie_zhici');
        if ($res = $zhici->find('1')) {
            $this->assign('zhici',$res['content']);
        }

        $this->display();
    }

}