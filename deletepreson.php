<?php
/**
 * Created by PhpStorm.
 * User: hhh
 * Date: 2017/2/22
 * Time: 20:53
 */

header("Content-Type:text/html;charset=utf8");
$delId=$_GET['delId'];
// echo "$delId";
$link=mysqli_connect("localhost","root","root","student")
or die("连接失败".mysqli_error());

$sql="delete from preson where presonId='{$delId}';";

mysqli_query($link,"set names utf8");

$a=mysqli_query($link,$sql);

if($a){
   // echo "a";
    $b=mysqli_affected_rows($link);
      if($b==1){
          header("location:index.php?del=delete");
      }
      else{
          header("location:index.php?notdel=notdelete");
      }
}
else{

    echo "语法错误。。。。";
}


?>