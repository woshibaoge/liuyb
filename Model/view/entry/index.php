<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<style>
    div{
        width: 400px;
        /*height: 50px;*/
        /*border: 1px solid red;*/
        margin: auto;
    }
</style>
<!--连接 搜索页面-->
<body>
<div><form action="" method="get">关键词搜索：<input type="hidden" name="a" value="search"><input type="text" name="wd"><input type="submit" value="🔍">
    </form>
</div>
<!--搜索页面结束-->
<pre>
<table border="1" class="table table-striped">
    <tr bgcolor="#7fffd4">
        <td>ID</td>
        <td>内容</td>
        <td>操作</td>
    </tr>
    <?php $i=0 ?>
    <?php foreach ($data['arc'] as $a): ?>
        <?php $i++ ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $a['title'] ?></td>
            <td>
                <a href="?a=removeArc&aid=<?php echo $a['aid'] ?>">删除</a>
                <a href="?a=update&aid=<?php echo $a['aid'] ?>">编辑</a>
            </td>
        </tr>
    <?php endforeach ?>
</table>
<form action="" method="post">标题：<input type="text" name="title" id=""> <input type="submit" value="添加" class="btn btn-default"></form>
<hr>
</pre>

</body>
</html>