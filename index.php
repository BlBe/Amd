<?php
header("charset='utf-8'");      //设置网页编码为UTF-8
//phpinfo();
/*
 *  PDO是什么？
 *  pdo是PHP Data Objects的简写意思为php数据处理对象，在php5.1已经发布php数据库连接层即pdo，
 *  以后php6.0将默认开启pdo，pdo支持各种数据库，只要换个驱动即可。
 *
 *  如何安装PDO？
 *  在PHP程序中的EXT文件夹中把需要的PDO_数据库类型.dll文件复制到PHP程序的根目录下（可能本来就
 *  存在，也可能路径不同）,然后再PHP.INI文件中找到PDO_数据库类型.dll，将前面的冒号删除即可！
 *
 *  如何检查安装成功？
 *  重启PHP服务后，使用phpinfo();函数来查看PDO这个选项，如果有你需要的数据库类型，则成功
 */
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


