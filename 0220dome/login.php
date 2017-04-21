<?php
/**
 * Created by PhpStorm.
 * User: hhh
 * Date: 2017/2/20
 * Time: 22:53
 */
header("Content-Type:text/html;charset=utf8");
//判断登录错误重定向回来的数据
if(isset($_GET['p']) && $_GET['a']=="error")
{
   echo "<script>alert('密码或用户错误');</script>";
}

?>
<html>
<head></head>
<script>
       function fun(){
           document.getElementById("tex").value;
           document.getElementById("pas").value;
             if(tex==""){
                 alert("账号不能为空");
                 return false;//阻止运行以下程序
             }
             else if(pas==""){
                 alert("密码不能为空");

             }
       }

</script>
<body>

 <form action="process.php" method="get" onsubmit="return fun()">
     账号：<input name="tex" id="tex" value="<?php if(isset($t)){ echo $t;} ?>"/><br/>
     密码：<input type="password" id="pas" name="pas"/><br>
     <input  type="submit" name="total" value="登录"/>
 </form>

</body>

</html>
