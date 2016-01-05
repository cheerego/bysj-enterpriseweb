<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>删除荣誉</title>
    <link rel="stylesheet" href="/MyWebSite/Public/bootstrap/bootstrap.min.css">
    <script src="/MyWebSite/Public/bootstrap/jquery.min.js"></script>
    <script src="/MyWebSite/Public/bootstrap/bootstrap.min.js"></script>
</head>
<body>
<table class="table table-hover">
    <tr>
        <th>序号</th>
        <th>标题</th>
        <th>图片</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php if(is_array($rongyu)): foreach($rongyu as $key=>$v): ?><tr>
            <td><?php echo ($v["id"]); ?></td>
            <td><?php echo ($v["title"]); ?></td>
            <td><?php echo ($v["image"]); ?></td>
            <td><a href="<?php echo ($v["url_d"]); ?>">删除</a></td>
        </tr><?php endforeach; endif; ?>
    </tbody>
</table>
</body>
</html>