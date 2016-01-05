<?php
namespace Home\Controller;

use Think\Controller;

class ServiceController extends Controller
{
    public function index()
    {
        $this->redirect('Service/feedback');
    }



    public function feedback()
    {
        if ($res = M('address')->find('1')) {
            $this->assign('address', $res);
        }
        $this->display();
    }

    public function handlefeedback()
    {
        if (!IS_POST) {
            $this->error('该页面不存在');
        }
        $_validate = array(
            array('title', 'require', '标题不能为空！'),
            array('contact', 'require', '联系方式不能为空！'),
            array('content', 'require', '内容不能为空！'),
            array('address', 'require', '地址不能为空！'),
        );
        $feedback = M('feedback');
        if (!$feedback->validate($_validate)->create(I('post.'))) {
            $this->error($feedback->getError(), '', '2');
        } else {
            $data = I('post.');
            $data['datetime']=date('Y-m-d H:i:s');
            if ($feedback->add($data)) {
                $this->success('发送成功，感谢您的反馈！');
            } else {
                $this->error('发送回馈失败！','',2);
            }
        }
    }
}