<?php
/**
 * Created by PhpStorm.
 * User: Bean
 * Date: 2016/7/2
 * Time: 23:43
 */
$pdo = new PDO('mysql:hosts=127.0.0.1,dbname=bean','root','qwer12',array(PDO::ATTR_AUTOCOMMIT=>true));
//创建持续性PDO数据库连接

$sql = $pdo->query("select * from user");
//执行查询语句，返回数组
while($row = $sql->fetchAll()){
    echo $row['user']."<br>";
    echo $row['pass']."<hr>";
}
//将SQL数组使用while循环输出

$get = $pdo->exec("insert into user (user,pass) VALUES ('user','pass')");
echo "加入$get条数据";
//执行插入语句返回影响行数

$del = $pdo->exec("delete from user where user='user'");
echo "删除$del条数据";
//执行删除语句返回影响条数

$pdo = null ;
//关闭数据库连接