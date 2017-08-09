<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <a href="index.php">点击返回首页</a>
    <h1>搜索页面</h1>
    <pre>
<form action="" method="get">
    <input type="hidden" name="a" value="search">
    <input type="text" name="wd" value="<?php echo $_GET['wd'] ?>"> <input type="submit" value="🔍">
</form>
        </pre>
    <table border="1">
        <tr>
            <td>排序</td>
            <td>内容</td>
        </tr>
        <?php $i = 0 ?>
        <?php foreach ($data['data'] as $v) { ?>
            <?php $i++ ?>
            <tr>
                <td><?php echo $i ?></td>
                <!--            字符替换-->
                <td><?php echo str_replace($_GET['wd'], "<span style='color: red'>{$_GET['wd']}</span>", $v['title']) ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
<!--搜索页面-->
