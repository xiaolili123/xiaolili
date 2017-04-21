<?php
/**
 * Created by PhpStorm.
 * User: hhh
 * Date: 2017/2/22
 * Time: 2:41
 */
header("Content-Type:text/html;charset=utf8");
$presonId=$_POST['presonId'];
$presonName=$_POST['presonName'];
$presonPad=$_POST['presonPad'];
$presonSex=$_POST['presonSex'];
$presonAge=$_POST['presonAge'];
$presonNation=$_POST['presonNation'];
//echo $presonId;
//连接数据库

$link=mysqli_connect("localhost","root","root","student");
$sql="insert into preson VALUES($presonId,'$presonName',md5('$presonPad'),'$presonSex',$presonAge,$presonNation);";
mysqli_query($link,"set names utf8");

 var_dump($sql) ;
$a=mysqli_query($link,$sql);
if($a){
    $b=mysqli_affected_rows($link);//受影响行数
      if($b==1){
          header("location:index.php?add=success");
      }
   else{
       header("location:addpreson.php?add=1");

   }
}
else
{
    echo "语法错误";
}