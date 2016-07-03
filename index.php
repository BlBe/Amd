<?php
header("charset='utf-8'");
//phpinfo();
$pdo = new PDO("mysql:hosts=192.168.1.112;dbname=bean",'root','qwer12');    //数据库连接
if(!$pdo){
    echo "数据库连接失败<br>";
}
$sql = $pdo->prepare('select * from user'); //使用prepare查询
$sql->execute();                            //获取数值
//$res = $sql->fetchAll();
//print_r($res);
echo "<p> <p> <p> <p> <p> <p> </p></p></p></p></p></p>";
foreach($sql->fetchAll() as $res){      //fetchAll（）    输出
    echo $res[1]."<br>".$res[2]."<hr>";
}
$insert = $pdo->exec("insert into user (user,pass) values ('user','pass')"); //使用exec（）添加数据到数据库，返回影响行数
$delete = $pdo->exec("delete from user where user='user'");                 //使用exec（）从数据库删除数据，返回影响行数
$update = $pdo->exec("update user set pass='pass' where user='000'");       //使用exec（）修改数据库的数据，返回影响行数
echo "<hr>共增加 $insert 条数据<hr>共删除 $delete 条数据<hr>共修改 $update 条数据<hr>";
$pdo = null;    //数据库关闭


