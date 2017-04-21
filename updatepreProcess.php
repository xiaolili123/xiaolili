<?php
/**
 * Created by PhpStorm.
 * User: hhh
 * Date: 2017/2/22
 * Time: 13:00
 */
//echo "nihao";

header("Content-Type:text/html;charset=utf8");

//print_r($_POST['presonSex']);
$presonId=$_POST['presonId'];
$presonName=$_POST['presonName'];
$newpresonPad=$_POST['presonPad'];
$presonSex=$_POST['presonSex'];
$presonAge=$_POST['presonAge'];
$presonNation=$_POST['presonNation'];
//echo "$presonSex";
//判断旧密码
$oldpresonPad=$_POST['oldpresonPad'];

$link=mysqli_connect("localhost","root","root","student");

if($newpresonPad==$oldpresonPad){
    $sql="update preson set presonName='{$presonName}',presonSex='{$presonSex}',presonAge={$presonAge},presonNation={$presonNation}
    where presonId={$presonId};";
    //var_dump("$sql");
}
else{
    $sql="update preson set presonName='{$presonName}',presonPad=md5('{$newpresonPad}'),presonSex='{$presonSex}',presonAge={$presonAge},presonNation={$presonNation}
    where presonId={$presonId};";
}

mysqli_query($link,"set names utf8");
$a=mysqli_query($link,$sql);

//var_dump($sql);

if($a)
{
    //echo "sss";
   $b=mysqli_affected_rows($link);//从不同的查询中输出所影响记录行数：
       if($b==1){
           //echo "suss";
           header("location:index.php?up=updatesuccess");
       }
       else{
          // echo "error";
           header("location:updatepreson.php?up=updatesuccess");
       }


}
else{
    echo "语法错误cccc";
}

