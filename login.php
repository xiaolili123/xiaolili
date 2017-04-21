<?php
/**
 * Created by PhpStorm.
 * User: hhh
 * Date: 2017/2/21
 * Time: 21:29
 */
//mysqli_num_rows();//返回结果集中行的数量
/*//mysqli_fetch_row();//从结果集中取得行*/

//mysqli_fetch_rows();//索引数组
//mysqli_fetch_assoc();//返回关联数组  从结果集中取得一行作为关联数组。
//mysqli_affected_rows();//从不同的查询中输出所影响受影响行数：//增删改
///mysqli_fetch_array();//返回关联和索引数组
// 释放结果集合
//mysqli_free_result($result);
//ceil()//向上取整
//intval()//向下取整

header("Content-Type:text/html;charset=utf8");
if(isset($_GET['p']) && $_GET['p']=="error"){

echo "<script>alert('密码或用户错误');</script>";

}
?>
<html>
<head></head>
<script>
    function fun(){
        var tex=document.getElementById("tex").value;
        var pas=document.getElementById("pas").value;
        if(tex==""){
            alert("账号不能为空,必须为数字");
            return false;//阻止运行以下程序
        }
        else if(pas==""){
            alert("密码不能为空");
        }
    }
</script>
<body>

<form action="processlogin.php" method="get" onsubmit="return fun()">
    账号：<input name="tex" id="tex" value=""/><br/>
    密码：<input type="password" id="pas" name="pas"/><br>
    <input  type="submit" name="total" value="登录"/>
</form>

</body>

</html>

