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
$pdo = null;    //数据库关闭


