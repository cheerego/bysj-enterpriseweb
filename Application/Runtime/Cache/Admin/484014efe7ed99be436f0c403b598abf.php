<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>about us</title>
    <link rel="stylesheet" href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</head>
<body>
<table class="table table-hover">
    <thead>
    <tr>
        <th>编号</th>
        <th>标题</th>
        <th>内容</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php if(is_array($aboutus)): foreach($aboutus as $key=>$v): ?><tr>
            <td><?php echo ($v["aboutus_id"]); ?></td>
            <td><?php echo ($v["aboutus_title_sub"]); ?></td>
            <td><?php echo ($v["aboutus_content_sub"]); ?></td>
            <td><!-- 按钮触发模态框 -->
                <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal<?php echo ($v["aboutus_id"]); ?>">
                    查看
                </a>

                <!-- 模态框（Modal） -->
                <div class="modal fade" id="myModal<?php echo ($v["aboutus_id"]); ?>" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel<?php echo ($v["aboutus_id"]); ?>" aria-hidden="true">
                    <form action="<?php echo U('Index/change_aboutus');?>" method="post">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close"
                                            data-dismiss="modal" aria-hidden="true">
                                        &times;
                                    </button>
                                    <h6 class="modal-title" id="myModalLabel<?php echo ($v["aboutus_id"]); ?>">
                                        <p>Title：<br><input class="form-control" type="text" name="aboutus_title" value="<?php echo ($v["aboutus_title"]); ?>"></p>
                                        <input type="hidden" name="aboutus_id" value="<?php echo ($v["aboutus_id"]); ?>">
                                    </h6>
                                </div>
                                <div class="modal-body">
                                    <h5>Content:<br><textarea class="form-control" name="aboutus_content" id="" cols="30" rows="10" ><?php echo ($v["aboutus_content"]); ?></textarea>
                                    </h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default">修改
                                    </button>
                                    <button type="button" class="btn btn-default"
                                            data-dismiss="modal">关闭
                                    </button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal -->
                    </form>

                </div>
            </td>
        </tr><?php endforeach; endif; ?>
    </tbody>

</table>
</body>
</html>