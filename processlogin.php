<?php
/**
 * Created by PhpStorm.
 * User: hhh
 * Date: 2017/2/21
 * Time: 21:29
 */
header("Content-Type:text/html;charset=utf8");
$tex=$_GET['tex'];
$pas=$_GET['pas'];
//连接数据库
$link=mysqli_connect("localhost","root","root","student")
or die("数据库连接失败".mysqli_error);
//书写sql代码
$sql="SELECT * from preson where presonId='{$tex}' and presonPad=md5('{$pas}');";
//设置sql编码
mysqli_query($link,"set names utf8");
//执行sql
$a=mysqli_query($link,$sql);
//var_dump($a);
if($a){
   // echo "sucess";
    //存在进一步判断  返回值得行数
    $b=mysqli_num_rows($a);
    if($b==1){
        //echo "a";
        header("location:index.php");
    }
    else{
       // echo "av";

            header("location:login.php?t={$tex}&p=error");
    }
}
else {

    echo "数据库语法错误";
}