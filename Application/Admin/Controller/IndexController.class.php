<?php
namespace Admin\Controller;

use Think\Controller;
use Think\Page;

class IndexController extends Controller
{
    public function _initialize()
    {
        if (!isset($_SESSION['admin_id'])) {
            $this->redirect('Login/index');
        }
    }

    public function logout()
    {
        session_destroy();
        $this->redirect('Login/index');
    }

    public function index()
    {
        $this->display();
    }

    public function changeaddr()
    {
        if ($res = M('address')->find('1')) {
            $this->assign('addressinfo', $res);
        }
        $this->display();
    }

    /*
     * 展示ueditor界面
     */
    public function editor()
    {
        $this->display();
    }

    /**
     * editor控制器的editor页面的表单处理
     * 处理ueditor数据 保存到数据库
     */
    public function handle()
    {
        if (!IS_POST) {
            $this->error('页面不存在！', '', 2);
        }

        switch (I('post.type')) {
            case 1:
                $jianjie = M('jianjie');
                $data['content'] = $_POST['content'];
                if ($jianjie->where('id=1')->save($data)) {
                    $this->success('修改成功！');
                } else {
                    $this->error('修改失败', '', 2);
                }
                break;
            case 2:
                $jianjie = M('jianjie_zhici');
                $data['content'] = $_POST['content'];
                if ($jianjie->where('id=1')->save($data)) {
                    $this->success('修改成功！');
                } else {
                    $this->error('修改失败', '', 2);
                }
                break;
            case 3:
                $zhanlue = M('jianjie_zhanlue');
                $data['content'] = $_POST['content'];
                if ($zhanlue->where('id=1')->save($data)) {
                    $this->success('修改成功！');
                } else {
                    $this->error('修改失败', '', 2);
                }
                break;
            case 4:
                $dashi = M('jianjie_dashi');
                $data['content'] = $_POST['content'];
                if ($dashi->where('id=1')->save($data)) {
                    $this->success('修改成功！');
                } else {
                    $this->error('修改失败', '', 2);
                }
                break;

        }
    }


    public function editorgetcontent()
    {
        if (!IS_AJAX) {
            $this->error('页面不存在！');
        }

        switch (I('post.type')) {
            case 1:
                $jianjie = M('jianjie');
                if ($res = $jianjie->find('1')) {
                    echo $res['content'];

                }
                break;
            case 2:
                $zhici = M('jianjie_zhici');
                if ($res = $zhici->find('1')) {
                    echo $res['content'];
                }
                break;
            case 3:
                $zhanlue = M('jianjie_zhanlue');
                if ($res = $zhanlue->find('1')) {
                    echo $res['content'];
                }
                break;
            case 4:
                $dashi = M('jianjie_dashi');
                if ($res = $dashi->find('1')) {
                    echo $res['content'];
                }
                break;

        }
    }


    public function handle_changeaddr()
    {
        if (!IS_POST) {
            $this->error('该页面不存在！', '', 2);
        }
        foreach (I('post.') as $key => $value) {
            $data[$key] = $value;
        }
        if (M('address')->where('id=1')->save($data)) {
            $this->success('修改成功！');
        } else {
            $this->error('修改失败，可能没有更新数据');
        }

    }


    public function newseditor($id = null)
    {
        if (!empty($id)) {
            $this->assign('id', $id);
            $news = M('news');
            if ($res = $news->find($id)) {
                $this->assign('news', $res);
                $this->assign('id', $id);
            } else {
                $this->error('该页面发生了错误', '', 2);
            }
        }

        $this->display();
    }

    public function handle_news()
    {
        if (!IS_POST) {
            $this->error('该页面不存在！', '', 2);
        }


        if (empty(I('post.id'))) {
            //如果id为空说明是添加新闻
            $data = array(
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'type' => $_POST['type'],
                'datetime' => date('Y-m-d H:i:s', time()),
                'author' => '管理员'
            );
            if ($res = M('news')->add($data)) {
                $this->success('新闻添加成功');
            } else {
                $this->error('新闻添加失败', '', 2);
            }
        } else {
            //否者是修改新闻
            $data = array(
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'datetime' => date('Y-m-d H:i:s', time())
            );
            if ($res = M('news')->where('id=' . $_POST['id'])->save($data)) {
                $this->success('新闻修改成功！');
            } else {
                $this->error('新闻修改失败！');
            }
        }
    }


    public function newslist()
    {
        $res = M('news')->join('news_type ON news_type.id = news.type', 'left')->field(
            array('news.id',
                'news.title',
                'news.content',
                'news.datetime',
                'news.author',
                'news_type.type_name',
            ))->order('datetime desc')->select();
        for ($i = 0; $i < sizeof($res); $i++) {
            $res[$i]['content'] = mb_substr($res[$i]['content'], 0, 15);
            $res[$i]['url_d'] = U('Index/newsdelete', array('id' => $res[$i]['id']));
            $res[$i]['url_u'] = U('Index/newseditor', array('id' => 1));
        }
        $this->assign('news', $res);
        $this->display();
    }

    public function newsdelete($id = null)
    {
        if (empty($id) || !IS_GET) {
            $this->error('该页面不存在！', '', 2);
        } else {
            if (M('news')->delete($id)) {
                $this->success('删除成功！');
            }
        }
    }


    public function feedback()
    {
        $feedback = M('feedback');
        $count = $feedback->count();
        $page = new Page($count, 20);
        $page->setConfig('header', '共%TOTAL_ROW%条');
        $page->setConfig('first', '首页');
        $page->setConfig('last', '共%TOTAL_PAGE%页');
        $page->setConfig('prev', '上一页');
        $page->setConfig('next', '下一页');
        $page->setConfig('theme', '%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $show = $page->show();
        if ($feedbackres = $feedback->order('datetime  desc')->limit($page->firstRow . ',' . $page->listRows)->select()) {
            for ($i = 0; $i < sizeof($feedbackres); $i++) {
                $feedbackres[$i]['datetime'] = explode('.', $feedbackres[$i]['datetime'])[0];
                $feedbackres[$i]['url_d'] = U('Index/feedbackdelete', array('id' => $feedbackres[$i]['id']));
            }
            $this->assign('feedbackres', $feedbackres);
            $this->assign('page', $show);
        }
        $this->display();
    }

    public function feedbackdelete($id)
    {
        if (M('feedback')->delete($id)) {
            $this->success('删除成功！');
        } else {
            $this->error('删除失败！', '', 2);
        }
    }


    public function handlerongyu()
    {
        if (!IS_POST) {
            $this->error('该页面不存在！', '', 2);
        }
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './upload/';
        $upload->savePath = 'rongyu/'; // 设置附件上传（子）目录
        // 上传文件
        //上传单个文件 指定$_FILES['photo']
        $info = $upload->uploadOne($_FILES['photo']);
        if (!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        } else {// 上传成功
            $file = __ROOT__ . '/upload/' . $info['savepath'] . '/' . $info['savename'];
            $img = "<img src={$file}  style=\"height: 90px;\" border=\"0\"/>";
            $data = array(
                'title' => I('post.title'),
                'image' => $img
            );
            if (M('rongyu')->add($data)) {
                $this->success('上传成功！');
            } else {
                $this->error('发生了未知问题！');
            }
        }
    }


    public function rongyulist()
    {
        $res = M("rongyu")->select();
        for ($i = 0; $i < sizeof($res); $i++) {
            $res[$i]['url_d'] = U('Index/rongyudelete', array('id' => $res[$i]['id']));
        }

        $this->assign('rongyu', $res);
        $this->display();
    }

    public function rongyudelete($id = null)
    {
        if (empty($id)) {
            $this->error('该页面不存在！', '', 2);
        }
        if (M('rongyu')->delete($id)) {
            $this->success('荣誉删除成功！');
        } else {
            $this->error('荣誉删除失败！', 2);
        }
    }

    public function addProject()
    {
        $this->display();
    }

    public function handleAddProject()
    {
        if (!IS_POST) {
            $this->error('该页面不存在！');
        }
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './upload/';
        $upload->savePath = 'project/'; // 设置附件上传（子）目录
        // 上传文件
        //上传单个文件 指定$_FILES['photo']
        $info = $upload->uploadOne($_FILES['image']);
        if (!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        } else {// 上传成功
            $file = __ROOT__ . '/upload/' . $info['savepath'] . '/' . $info['savename'];
            $img = "<img src={$file} border=\"0\"/>";
            $img90 = "<img src={$file}  style=\"height: 90px;\" border=\"0\"/>";
            $img120 = "<img src={$file} style=\"height: 120px;\" border=\"0\"/>";
            $img150 = "<img src={$file} style=\"height: 150px;\" border=\"0\"/>";
            $data = array(
                'name' => I('post.name'),
                'contente' => I('post.contente'),
                'contenti' => I('post.contenti'),
                'img'=>$img,
                'img90' => $img90,
                'img120' => $img120,
                'img150' => $img150
            );
            if (M('project')->add($data)) {
                $this->success('上传成功！');
            } else {
                $this->error('发生了未知问题！');
            }
        }
    }


    public function projectlist()
    {

        if ($res = M('project')->order('id desc')->select()) {
            for ($i=0;$i<sizeof($res);$i++) {
                $res[$i]['url_d'] = U('Index/projectdelete',array('id'=>$res[$i]['id']));
            }
            $this->assign('project',$res);

        }
        $this->display();
    }

    public function projectdelete($id)
    {
        if (empty($id)) {
         $this->error('该页面不存在!');
        }

        if (M('project')->delete($id)) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败！','',2);
        }
    }
}

