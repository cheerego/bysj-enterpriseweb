<?php
namespace Admin\Controller;

use Think\Controller;

class LoginController extends Controller
{
    /**
     * 显示登录界面
     */
    public function index()
    {
        $this->display();
    }

    /**
     * 检查账号密码
     * 如果不是post提交过来，就会显示没有改页面
     * 如果成功就跳转到后台首页
     * 更新登录时间和登录ip
     */
    public function checklogin()
    {
        if (!IS_POST) {
            $this->error('该页面不存在<br/>去登陆吧。。。');
        }

        $admin = M('admin');
        $user['username'] = I('post.username');
        $user['password'] = I('post.password');

        if ($res = $admin->where($user)->find()) {
            session('admin_id',$res['id']);
            session('admin_username',$res['username']);
            $this->redirect('Admin/Index/index');
        } else {
            $this->error('用户名或密码错误');
        }
    }
}