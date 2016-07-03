<?php
/**
 * Created by PhpStorm.
 * User: Bean
 * Date: 2016/7/3
 * Time: 17:12
 */
header("charset='utf-8'");
$pdo = new PDO("mysql:hosts=192.168.1.112;dbname=bean",'root','qwer12');
if(!$pdo){
    echo "数据库连接失败<br>";
    $pdo = null;
    exit();
}
$fun = $_GET['fun'];
$func = $_GET["func"];
if($fun == '1'){
    $funname = '登陆';
}elseif($fun == '2'){
    $funname = "注册";
}else{
    $funname = "首页";
}
?>
<html>
<head>
    <title><?php echo $funname; ?></title>
</head>
<body>
<?php
if($func == '1'){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $select = $pdo->query("select * from user where user='$user' and pass='$pass'");
    $select = $select->fetchall();
    if(!$select){
        echo "登陆失败";
    }else{
        echo "登陆成功,".$select[0][1];
    }
}
if($func == '2'){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $insert = $pdo->exec("insert into user (user,pass) values ('$user','$pass')");
    if($insert>0){
        echo "注册成功";
    }else{
        echo "注册失败";
    }
}
if($fun == '1') {
    ?>
    <form action="index.php?func=1" method="post">
        用户名：<input type="text" name="user"><br>
        密　码:<input type="password" name="pass"><br>
        <input type="submit" value="登陆">
    </form>
    <?php
}elseif($fun == '2') {
    ?>
    <form action="index.php?func=2" method="post">
        用户名：<input type="text" name="user"><br>
        密　码：<input type="password" name="pass"><br>
        <input type="submit" value="注册">
    </form>
    <?php
}else {
    ?>
    <a href="index.php?fun=1"><button>登陆</button></a>
    <a href="index.php?fun=2"><button>注册</button></a>
    <?php
}
?>
</body>
</html>
