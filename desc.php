<?php
/**
 * Created by PhpStorm.
 * User: hhh
 * Date: 2017/2/22
 * Time: 11:12
 */
header("Content-Type:text/html;charset=utf8");

$tex=$_GET['tex'];
//echo $tex;
//连接数据库
$link=mysqli_connect("localhost","root","root","student")
or die("数据库连接失败".mysqli_error);
//sql语句
$sql="select presonId,presonName,presonPad,presonSex,presonAge,nation.nationName
from preson inner join nation
on nation.nationId=preson.presonNation
where presonId={$tex}";
//var_dump($sql);
//print_r($sql) ;
//设置sql编码
mysqli_query($link,"set names utf8");
//执行sql
$a=mysqli_query($link,$sql);
if($a){
    //echo "s";
    $b=mysqli_fetch_assoc($a);//返回关联数组
        $presonId=$b['presonId'];
        $presonName=$b['presonName'];
        $presonPad=$b['presonPad'];
        $presonSex=$b['presonSex'];
        $presonAge=$b['presonAge'];
        $presonnationName=$b['nationName'];
        //echo $presonnationName;
}
else {

    echo "数据库语法错误";
}
?>
<html>
 <head></head>
  <body>
    <form>
         编号：<input readonly value="<?php echo $presonId;?>"><br/>
         姓名：<input readonly value="<?php echo $presonName;?>"><br/>
         密码：<input readonly value="<?php echo $presonPad;?>"><br/>
         性别：<input readonly value="<?php echo $presonSex;?>"><br/>
         年龄：<input readonly value="<?php echo $presonAge;?>"><br/>
         民族：<input readonly value="<?php echo $presonnationName;?>"><br/>
    </form>
     <a href="index.php">返回主页</a>
  </body>
</html>