<?php
/**
 * Created by PhpStorm.
 * User: hhh
 * Date: 2017/2/20
 * Time: 23:50
 */

header("Content-Type:text/html;charset=utf8");
$tex=$_GET['tex'];
$pas=$_GET['pas'];
//echo $tex;
//连接数据库
//mysqli_connect打开一个到 MySQL 服务器的新的连接
$link=mysqli_connect("localhost","root","root","0220d")
or die("数据库连接失败".mysqli_errno());
//书写数据库语句
$sql="select * from dou where dId={$tex} and dPas='{$pas}';";
//设置数据库执行的编码
mysqli_query($link,"set names utf8");
//执行数据库语句  mysqli_query执行一条 MySQL 查询
$a=mysqli_query($link,$sql);
if ($a){
    //echo "数据库语法正确";
    //正确后判断账号密码是否存在
    //mysqli_num_rows:向查询结果中返回行数
    $b=mysqli_num_rows($a);
    if($b==1){
        //echo "sc";
        header("location:processlogn.php");
    }
    else{
        //echo "error";
        header("location:login.php?t={$tex}&p=error");

    }
}
else{
    echo "数据库语法错误";
}
