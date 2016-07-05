<html>
<head>
    <title>身份证生成器</title>
    <meta charset="UTF-8">
</head>
<body style="width:410px;margin-left:auto;margin-right:auto;">
<form action="" method="post">
<div style="float: left;width: 100%;border: #000 1px solid;">
    <div style="margin-left:auto;margin-right:auto;width:400px;height:50px;text-align:center;vertical-align:middle;">
    <button type="submit" name="sj" style="margin-top:15px;">随机生成</button>
    <button type="submit" name="zd" style="margin-top:15px;">自定生成</button>
    <button type="submit" name="xr" style="margin-top:15px;">写入数据</button>
    <button type="submit" name="cx" style="margin-top:15px;">查询数据</button>
</div>
<hr>
<div style="margin-bottom:10px;">
<?php
@$pdo = new PDO("mysql:hosts=127.0.0.1;dbname=bean_id","bean","qwer12");
@$sql = $pdo->prepare("select * from addname");
@$sql->execute();
@$cx = $pdo->prepare("select * from webname");
@$cx->execute();
if(isset($_POST['sj'])){
    $i = 0;
    while($i < 5 ){
    $add = mt_rand(0,30);
    include "add.php";
    $date = date("Y") - 18;
    $year = mt_rand(1900,$date);
    $month = mt_rand(1,12);
    include "date.php";
    $ran = mt_rand(100,999);
    include "apply.php"
?>
<div style="font-size:30;margin-left:auto;margin-right:auto;width:80%;"><?php echo $add.$year.$month.$day.$ran.$check."<br>"; ?></div>
<?php
$i++;}
}elseif(isset($_POST['zd'])){
?>
<div style="text-align:center;width:400px;line-height: 50px;">
选择地区：
<select name="add">
<?php foreach($sql->fetchALL() as $row){  ?>
<option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
<?php } ?>
    </select><br>
    输入日期：<input type="text" size="4" name="year">年
    <input type="text" size="2" name="month">月
    <input type="text" size="2" name="day">日 <br>
    <input type="radio" name="six" value="1">男
    <input type="radio" name="six" value="0">女<br>
    <button type="submit" name="sc" style="width:150px;height: 50px;font-size:30px;">生成</button><br>
    <span style="font-size: 14px;color:coral;">*确定键默认为随机生成</span>
</div>
<?php
}elseif(isset($_POST['sc'])){
    $add = $_POST['add'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $six = $_POST['six'];
    ?>
    <div style="text-align:center;width:400px;line-height: 50px;">
        选择地区：
        <select name="add">
            <?php foreach($sql->fetchALL() as $row){  ?>
                <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
            <?php } ?>
        </select><br>
        输入日期：<input type="text" size="4" name="year">年
        <input type="text" size="2" name="month">月
        <input type="text" size="2" name="day">日 <br>
        选择性别：
        <input type="radio" name="six" value="1">男
        <input type="radio" name="six" value="0">女<br>
        <button type="submit" name="sc" style="width:150px;height: 50px;font-size:30px;">生成</button><br>
         <span style="font-size: 14px;color:coral;">
            <?php
            include "if.php";
            include "add.php";
            $b = array(1,3,5,7,9);
            $g = array(2,4,6,8,0);
            ?>
             </span>
             <?php
            $o = 0;
            while($o < 5){
                if($six == 1){
                    $ran = mt_rand(10,99).$b[mt_rand(0,4)];
                }elseif($six == 0){
                    $ran = mt_rand(10,99).$g[mt_rand(0,4)];
                }
            include "apply.php";
            $o++;
            ?>
            <span style="font-size: 14px;color:cornflowerblue;"><?php echo $add.$year.$month.$day.$ran.$check."<br>"; ?>
            </span>
            <?php
        }
        ?>
    </div>
    <?php
}elseif(isset($_POST['xr'])){
    ?>
    <div style="text-align:center;width:400px;line-height: 50px;">
        网络类型：<select name="lx">
            <?php foreach($cx->fetchALL() as $row){  ?>
                <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
            <?php } ?>
        </select><br>
        网络账号：<input type="text" name="zh"><br>
        身份证号：<input type="text" name="hm"><br>
        身份姓名：<input type="text" name="xm"><br>
        <button type="submit" name="zr" style="width:150px;height: 50px;font-size:30px;">植入</button><br>
        <span style="color: darksalmon;font-size: 14px;">*确定键默认为随机生成</span>
    </div>
    <?php
}elseif(isset($_POST['zr'])){
    $lx = $_POST['lx'];
    $zh = $_POST['zh'];
    $hm = $_POST['hm'];
    $xm = $_POST['xm'];
    $in = $pdo->exec("insert into webuser (name,user,idnum,username) values ($lx,'$zh','$hm','$xm')");
    ?>
    <div style="text-align:center;width:400px;line-height: 50px;">
        网络类型：<select name="lx">
                <?php foreach($cx->fetchALL() as $row){  ?>
                    <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                <?php } ?>
            </select><br>
        网络账号：<input type="text" name="zh"><br>
        身份证号：<input type="text" name="hm"><br>
        身份姓名：<input type="text" name="xm"><br>
        <button type="submit" name="zr" style="width:150px;height: 50px;font-size:30px;">植入</button><br>
        <span style="color: darksalmon;font-size: 14px;">
            <?php
                if($in > 0){
                    echo "植入成功，后续可以到查询数据中查询";
                }else{
                    echo "植入失败，请重新植入";
                }
            ?>
        </span>
    </div>
    <?php
}elseif(isset($_POST['cx'])){
    ?>
    <div style="text-align:center;width:400px;line-height: 50px;">
        网络类型：<select name="a1">
            <?php foreach($cx->fetchALL() as $row){  ?>
                <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
            <?php } ?>
        </select><br>
        网络账号：<input type="text" name="a2"><br>
        身份证号：<input type="text"  readonly style="background-color:#CCC;" value="查询成功后显示"><br>
        身份姓名：<input type="text"  readonly style="background-color:#CCC;" value="查询成功后显示"><br>
        <button type="submit" name="go" style="width:150px;height: 50px;font-size:30px;">查询</button><br>
        <span style="color: salmon;font-size: 14px;">*确定键默认为随机生成<br>*选择类型输入账号即可查询
        </span>
    </div>
    <?php
}elseif(isset($_POST['go'])){
    $a1 = $_POST['a1'];
    $a2 = $_POST['a2'];
    $s1 = "查询成功后显示";
    $s2 = "查询成功后显示";
    $s3 = "选择类型输入账号即可查询";
    $go = $pdo->prepare("select * from webuser where name=$a1 and user='$a2'");
    $go ->execute();
    $s = $go->fetch();
    if(count($s) > 1){
        $s1 = $s[3];
        $s2 = $s[4];
    }else{
        $s3 = "类型或账号输入错误，请核对后查询";
    }
    ?>
    <div style="text-align:center;width:400px;line-height: 50px;">
        网络类型：<select name="a1">
            <?php foreach($cx->fetchALL() as $row){  ?>
                <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
            <?php } ?>
        </select><br>
        网络账号：<input type="text" name="a2" value="<?php echo $a2; ?>"><br>
        身份证号：<input type="text"  readonly style="background-color:#CCC;" value=<?php echo $s1; ?>><br>
        身份姓名：<input type="text"  readonly style="background-color:#CCC;" value=<?php echo $s2; ?>><br>
        <button type="submit" name="go" style="width:150px;height: 50px;font-size:30px;">查询</button><br>
        <span style="color: salmon;font-size: 14px;">*确定键默认为随机生成<br>*<?php echo $s3; ?>
        </span>
    </div>
    <?php
}else{
?>
<div style="font-size:30;text-align:center;width:400px;">请选择上面的选项</div>
<?php
}
?>
</div>
</div>
</form>
</body>
</html>