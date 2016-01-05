<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>项目列表</title>
    <link rel="stylesheet" href="/MyWebSite/Public/bootstrap/bootstrap.min.css">
    <script src="/MyWebSite/Public/bootstrap/jquery.min.js"></script>
    <script src="/MyWebSite/Public/bootstrap/bootstrap.min.js"></script>
</head>
<body>
<table class="table table-hover">
    <tr>
        <th>序号</th>
        <th>项目名称</th>
        <th>简述内容</th>
        <th>详细内容</th>
        <th>图片</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php if(is_array($project)): foreach($project as $key=>$v): ?><tr>
            <td><?php echo ($v["id"]); ?></td>
            <td><?php echo ($v["name"]); ?></td>
            <td><?php echo ($v["contente"]); ?></td>
            <td><?php echo ($v["contenti"]); ?></td>
            <td><?php echo ($v["img"]); ?></td>
            <td><a href="<?php echo ($v["url_d"]); ?>">删除</a></td>
        </tr><?php endforeach; endif; ?>
    </tbody>
</table>
</body>
</html>