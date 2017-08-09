<?php

class Base
{

    private static $pdo = NULL;

    public function __construct()
    {
//        数据库方法
        $this->connect();
    }

//    链接数据库

    private function connect()
    {
        //如果构造方法多次执行，那么此方法也会多次执行，用静态属性可以把对象保存起来不丢失，
        //第一次self::$pdo为null，那么就正常链接数据库
        //第二次self::$pdo已经保存了pdo对象，不为NULL了，这样不用再次链接mysql了。

        if (is_null(self::$pdo)) {
            try {
                //  地址
                $dsn = 'mysql:host=127.0.0.1;dbname=c83';
//    传入地址，用户名，密码
//    /使用PDO连接数据库，如果有异常错误，就会被catch捕捉到
                $pdo = new PDO($dsn, 'root', 'root');
                //设置错误属性，要设置成异常错误，因为需要被catch捕获
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //exec执行没有结果集的操作,update,delete,insert..
                $pdo->exec("SET NAMES UTF8");
                //把PDO对象放入到静态属性中
                self::$pdo = $pdo;
            } catch (PDOException $e) {
                exit($e->getMessage());
            }
        }
    }
//   获取全部数据
    public function get($table){
        $sql="SELECT * FROM {$table}"; //select *from $table
        $result= self::$pdo->query($sql);
        //获得关联数组
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
//  执行没有结果集的操作
    public function e($sql){
        self::$pdo->exec($sql);
    }



//    只有有结果集的操作  （修改功能)

    public function q( $sql ) {
        try {
            $result = self::$pdo->query( $sql );

            return $result->fetchAll( PDO::FETCH_ASSOC );
        } catch ( PDOException $e ) {
            exit( "SQL错误le：" . $e->getMessage() );
        }
    }


//类结束
}
