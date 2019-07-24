<?php
//我要连接数据库，在php里面就有好几种方法，mysql扩展，mysqli扩展，PDO扩展。
//我就是想要一个对象用来以后的操作，具体要哪个，视情况而定
//既然你们都是连接数据库的操作，你们就应该拥有相同的功能，建立连接，查询，断开连接...（此处显示接口的重要性）。
//总而言之，这几种方法应该“团结一致，一致对外”

interface Db
{
    public function connect();
}

class TheMysql implements Db
{
    public function connect()
    {
        echo "i'm Mysql connect drive\n";
    }
}

class TheMysqli implements Db
{
    public function connect()
    {
        echo "i'm Mysqli connect drive\n";
    }
}

class ThePdo implements Db
{
    public function connect()
    {
        echo "i'm pdo connect drive\n";
    }
}

class transFactory
{
    //创建保存示例的静态成员变量
    private static $obj;
    public static function factory($transport)
    {
        switch ($transport) {
            case 'mysql':
                self::$obj = new TheMysql();
                break;
            case 'mysqli':
                self::$obj = new TheMysqli();
                break;
            case 'pdo':
                self::$obj = new ThePdo();
                break;
        }
        return self::$obj;
    }
}
$transport = transFactory::factory('pdo');
$transport->connect();

//由工厂类根据参数来决定创建出哪一种产品类的实例
//工厂模式的最主要作用就是对象创建的封装、简化创建对象操作。
//工厂类是指包含了一个专门用来创建其他对象的方法的类。所谓按需分配，传入参数进行选择，返回具体的类
//简单的说，就是调用工厂类的一个方法（传入参数）来得到需要的类;
