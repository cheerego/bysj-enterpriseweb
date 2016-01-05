<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改公司荣誉</title>
    <link rel="stylesheet" href="/MyWebSite/Public/bootstrap/bootstrap.min.css">
    <script src="/MyWebSite/Public/bootstrap/jquery.min.js"></script>
    <script src="/MyWebSite/Public/bootstrap/bootstrap.min.js"></script>
</head>
<body>
<form action="<?php echo U('Index/handlerongyu');?>" enctype="multipart/form-data" method="post" style="width: 50%">
    <input class="form-control" type="text" name="title" placeholder="荣誉名称" required/>
    <input type="file" name="photo"/>
    <input class="btn btn-success"type="submit" value="提交">
</form>
</body>
</html>