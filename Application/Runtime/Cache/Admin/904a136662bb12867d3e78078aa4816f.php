<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/MyWebSite/Public/bootstrap/bootstrap.min.css">
    <script src="/MyWebSite/Public/bootstrap/jquery.min.js"></script>
    <script src="/MyWebSite/Public/bootstrap/bootstrap.min.js"></script>
</head>
<body>
<table class="table table-hover">
    <thead>
    <tr>
        <th>编号</th>
        <th>标题</th>
        <th>内容</th>
        <th>时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php if(is_array($feedbackres)): foreach($feedbackres as $key=>$v): ?><tr>
            <td><?php echo ($v["id"]); ?></td>
            <td><?php echo ($v["title"]); ?></td>
            <td><?php echo ($v["content"]); ?></td>
            <td><?php echo ($v["datetime"]); ?></td>
            <td><!-- 按钮触发模态框 -->
                <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal<?php echo ($v["id"]); ?>">
                    查看
                </a>
                <a href="<?php echo ($v["url_d"]); ?>">删除</a>

                <!-- 模态框（Modal） -->
                <div class="modal fade" id="myModal<?php echo ($v["id"]); ?>" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel<?php echo ($v["id"]); ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close"
                                        data-dismiss="modal" aria-hidden="true">
                                    &times;
                                </button>
                                <h6 class="modal-title" id="myModalLabel<?php echo ($v["id"]); ?>">
                                    <p>Address：<?php echo ($v["address"]); ?></p>
                                    <p>Date：<?php echo ($v["datetime"]); ?></p>
                                    <p>Contact：<?php echo ($v["contact"]); ?></p>
                                </h6>
                            </div>
                            <div class="modal-body">
                                <h5><?php echo ($v["content"]); ?></h5>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default"
                                        data-dismiss="modal">关闭
                                </button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal -->
                </div>
            </td>
        </tr><?php endforeach; endif; ?>
    </tbody>

</table>
<div style="text-align: center"><?php echo ($page); ?></div>
</body>
</html>