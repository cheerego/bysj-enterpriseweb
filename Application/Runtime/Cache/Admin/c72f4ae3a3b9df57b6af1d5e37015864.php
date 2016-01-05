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
    <tr>
        <th>序号</th>
        <th>作者</th>
        <th>类别</th>
        <th>标题</th>
        <th>内容</th>
        <th>发布时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php if(is_array($news)): foreach($news as $key=>$v): ?><tr>
            <td><?php echo ($v["id"]); ?></td>
            <td><?php echo ($v["author"]); ?></td>
            <td><?php echo ($v["type_name"]); ?></td>
            <td><?php echo ($v["title"]); ?></td>
            <td><?php echo ($v["content"]); ?></td>
            <td><?php echo ($v["datetime"]); ?></td>
            <td><a href="<?php echo ($v["url_d"]); ?>">删除</a>&nbsp;&nbsp;<a href="<?php echo ($v["url_u"]); ?>">编辑</a></td>
        </tr><?php endforeach; endif; ?>
    </tbody>
</table>
</body>
</html>