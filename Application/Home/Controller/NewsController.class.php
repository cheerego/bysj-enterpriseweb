<?php
namespace Home\Controller;

use Think\Controller;

class NewsController extends Controller
{
    public function index()
    {


        $News = M('news'); // 实例化User对象
        $count = $News->count();// 查询满足要求的总记录数
        $page = new \Think\Page($count, 8);// 实例化分页类 传入总记录数和每页显示的记录数(25)

        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $res = $News->order('datetime desc')->limit($page->firstRow . ',' . $page->listRows)->select();
        for ($i = 0; $i < sizeof($res); $i++) {
            $res[$i]['url'] = U('News/newsinfo', array('id' => $res[$i]['id']));
        }
        $page->setConfig('header', '共%TOTAL_ROW%条新闻');
        $page->setConfig('theme', '%HEADER%  %FIRST%   %UP_PAGE%   %LINK_PAGE%   %DOWN_PAGE%   %END%  共%TOTAL_PAGE%页');
        $show = $page->show();// 分页显示输出
        $this->assign('news', $res);// 赋值数据集
        $this->assign('page', $show);// 赋值分页输出
        $this->display(); // 输出模板

    }

    public function media()
    {
        //type=1
        $News = M('news'); // 实例化User对象
        $count = $News->where('type=1')->count();// 查询满足要求的总记录数
        $page = new \Think\Page($count, 8);// 实例化分页类 传入总记录数和每页显示的记录数(25)

        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $res = $News->where('type=1')->order('datetime desc')->limit($page->firstRow . ',' . $page->listRows)->select();
        for ($i = 0; $i < sizeof($res); $i++) {
            $res[$i]['url'] = U('News/newsinfo', array('id' => $res[$i]['id']));
        }
        $page->setConfig('header', '共%TOTAL_ROW%条新闻');
        $page->setConfig('theme', '%HEADER%  %FIRST%   %UP_PAGE%   %LINK_PAGE%   %DOWN_PAGE%   %END%  共%TOTAL_PAGE%页');
        $show = $page->show();// 分页显示输出
        $this->assign('news', $res);// 赋值数据集
        $this->assign('page', $show);// 赋值分页输出
        $this->display(); // 输出模板

    }


    public function projects()
    {
//        type=2;
        $News = M('news'); // 实例化User对象
        $count = $News->where('type=2')->count();// 查询满足要求的总记录数
        $page = new \Think\Page($count, 8);// 实例化分页类 传入总记录数和每页显示的记录数(25)

        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $res = $News->where('type=2')->order('datetime desc')->limit($page->firstRow . ',' . $page->listRows)->select();
        for ($i = 0; $i < sizeof($res); $i++) {
            $res[$i]['url'] = U('News/newsinfo', array('id' => $res[$i]['id']));
        }
        $page->setConfig('header', '共%TOTAL_ROW%条新闻');
        $page->setConfig('theme', '%HEADER%  %FIRST%   %UP_PAGE%   %LINK_PAGE%   %DOWN_PAGE%   %END%  共%TOTAL_PAGE%页');
        $show = $page->show();// 分页显示输出
        $this->assign('news', $res);// 赋值数据集
        $this->assign('page', $show);// 赋值分页输出
        $this->display(); // 输出模板

    }

    public function newsinfo($id)
    {
        $res = M('news')->find($id);
        $this->assign('newsinfo', $res);
        $this->display();
    }
}