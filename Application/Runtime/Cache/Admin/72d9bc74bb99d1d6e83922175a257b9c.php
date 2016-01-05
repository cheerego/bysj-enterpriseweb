<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加新项目</title>
    <link rel="stylesheet" href="/MyWebSite/Public/bootstrap/bootstrap.min.css">
    <script src="/MyWebSite/Public/bootstrap/jquery.min.js"></script>
    <script src="/MyWebSite/Public/bootstrap/bootstrap.min.js"></script>
    <style>
        .mar{
            margin-top: 5px;
        }

    </style>
</head>
<body>
    <div style="width:30%;">
        <form action="<?php echo U('Index/handleAddProject');?>" method="post" enctype="multipart/form-data">
            <input class="form-control mar" type="file" name="image" placeholder="项目图片" required>
            <input class="form-control mar" type="text" name="name" placeholder="项目名" required>
            <input class="form-control mar" type="text" name="contente" placeholder="简单介绍" required>
            <textarea class="form-control mar" name="contenti"  cols="30" rows="10" placeholder="详细介绍"></textarea>
            <input class="btn btn-success mar" type="submit"  value="提交">
        </form>

    </div>
</body>
</html>