<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改公司信息</title>
    <link rel="stylesheet" href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <style>
        * {
            margin: 5px;
        }
    </style>
</head>
<body>
<form action="<?php echo U('Index/change_company');?>" method="post" style="width: 30%">
    <p>
        公司中文名：<br/>
        <input name="name_zh" class="form-control" type="text" value="<?php echo ($company["name_zh"]); ?>">
    </p>

    <p>
        公司英文名：<br/>
        <input name="name_en" class="form-control" type="text" value="<?php echo ($company["name_en"]); ?>">
    </p>

    <p>
        公司所在城市：<br/>
        <input name="city" class="form-control" type="text" value="<?php echo ($company["city"]); ?>">
    </p>

    <p>
        公司所在城市的街道地址：<br/>
        <input  name="street" class="form-control" type="text" value="<?php echo ($company["street"]); ?>">
    </p>


    <p>
        邮政编码：<br/>
        <input name="postcode" class="form-control" type="text" value="<?php echo ($company["postcode"]); ?>">
    </p>

    <p>
        Email：<br/>
        <input name="email" class="form-control" type="text" value="<?php echo ($company["email"]); ?>">
    </p>

    <p>
        Phone：<br/>
        <input name="phone" class="form-control" type="text" value="<?php echo ($company["phone"]); ?>">
    </p>
    <input class="btn btn-default" type="submit" value="修改" style="float: right;">
</form>
</body>
</html>