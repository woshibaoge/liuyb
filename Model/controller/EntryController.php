<?php

class EntryController extends Controller
{
//默认首页
    public function index()
    {
//        当用户点击了添加
        if (IS_POST) {
            //一次录入多条数据
            $sql = "INSERT INTO arc (title) values ('{$_POST['title']}')";
            Model::e($sql);
            echo <<<str
<script>
alert('添加成功');
location.href = './index.php';
</script>
str;
            exit;
        }
        // 静态调用 get里面的方法
        $arcData = Model::get('arc');
        // 静态调用 get里面的方法
//        $tagData = Model::get('tag');
//        $this->display(['arc' => $arcData, 'tag' => $tagData]);
        $this->display(['arc' => $arcData]);
    }

//删除
    public function removeArc()
    {
//删除对应的id
        $sql = "DELETE FROM arc WHERE aid=" . $_GET['aid'];
//有内容在执行删除功能
        if (Model::e($sql)) {
            echo <<<str
<script>
alert('删除成功');
location.href = './index.php';
</script>
str;
            exit;
        } else {
            echo <<<str
<script>
alert('删除成功');
location.href = './index.php';
</script>
str;
            exit;
        }
    }

//    修改功能  去建修改页面并到页面添加修改标签
    public function update()
    {
//     把要删掉的id存到$aid里面
        $aid = $_GET['aid'];
//  如果用户点击了删除
        if (IS_POST) {
//      执行  mysql 语句
            $sql = "UPDATE arc SET title='{$_POST['title']}' WHERE aid=$aid";
//           执行有结果集的
            Model::e($sql);
//            提示的
            echo <<<str
<script>
alert('修改成功');
location.href = './index.php';
</script>
str;
            exit;
        }


//        查看表中id所对应的数据
//        $sql = "select * from arc where aid=$aid";
        $sql = "SELECT * FROM arc WHERE aid=$aid";
//        静态调用方法
        $data = Model::q($sql);
//        current() 二维数组转一维
//        把$data 里面的数组转为一维
        $oldData = current($data);
        //compact('oldData')相当于 ['oldData'=>$oldData], $this->display(['oldData'=>'$oldData']);
//        把参数个$data  display($data) 方法
        $this->display(compact('oldData'));

    }

//    搜索功能


    public function search()
    {
        $wd = $_GET['wd'];
//        转义 （用户输入的特殊字符)
        $wd = addslashes($wd);
//        mysql 语句
//        $sql="select * from arc where title like '%{$wd}%'";
        $sql = "SELECT * FROM arc WHERE title LIKE '%{$wd}%'";
//        把结果传给q方法
        $data = Model::q($sql);
//        把参数个$data  display($data) 方法  ( $this->display(['oldData'=>'$oldData']))
        $this->display(compact('data'));


    }


//    类结束标签
}
