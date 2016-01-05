<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改公司信息</title>
    <link rel="stylesheet" href="/MyWebSite/Public/bootstrap/bootstrap.min.css">
    <script src="/MyWebSite/Public/bootstrap/jquery.min.js"></script>
    <script src="/MyWebSite/Public/bootstrap/bootstrap.min.js"></script>
    <style>
        * {
            margin: 5px;
        }
    </style>
</head>
<body>
<form action="<?php echo U('Index/handle_changeaddr');?>" method="post" style="width: 30%">
    <p>
        公司中文名：<br/>
        <input name="name" class="form-control" type="text" value="<?php echo ($addressinfo["name"]); ?>" required>
    </p>

    <p>
        MobliePhone：<br/>
        <input name="mobilephone" class="form-control" type="text" value="<?php echo ($addressinfo["mobilephone"]); ?>" required>
    </p>
    <p>
        TelPhone：<br/>
        <input name="telphone" class="form-control" type="text" value="<?php echo ($addressinfo["telphone"]); ?>" required>
    </p>
    <p>
        公司所在城市的街道地址：<br/>
        <input name="address" class="form-control" type="text" value="<?php echo ($addressinfo["address"]); ?>" required>
    </p>

    <p>
        Email：<br/>
        <input name="email" class="form-control" type="text" value="<?php echo ($addressinfo["email"]); ?>" required>
    </p>
    <p>
        邮政编码：<br/>
        <input name="postcode" class="form-control" type="text" value="<?php echo ($addressinfo["postcode"]); ?>" required>
    </p>




    <input class="btn btn-default" type="submit" value="修改" style="float: right;">
</form>
</body>
</html>