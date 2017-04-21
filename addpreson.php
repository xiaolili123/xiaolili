<?php
/**
 * Created by PhpStorm.
 * User: hhh
 * Date: 2017/2/22
 * Time: 1:20
 */
header("Content-Type:text/html;charset=utf8");
//接收重定向回来的值
//注册失败
if(isset($_GET['p']) && $_GET['p']==1)
{
    echo "<script>alert('注册失败');</script>";
}
?>
<html>
  <head></head>
    <body>
      <form action="addprePrccess.php" method="post">
          编号：<input name="presonId"><br/>
          姓名：<input name="presonName"><br/>
          密码：<input type="password" name="presonPad"><br/>
          性别：<input type="radio" name="presonSex" value="男" >男
               <input type="radio" name="presonSex" value="女">女<br/>
          年龄：<input name="presonAge"><br/>
          民族：<select name="presonNation">
                  <option value="0">--请选择民族--</option>
                   <?php
                      $link=mysqli_connect("localhost","root","root","student");
                      $sql="select * from nation";
                      mysqli_query($link,"set names utf8");
                     $a=mysqli_query($link,$sql);
                   if($a){
                       while($b=mysqli_fetch_row($a)){
                           echo "<option value='{$b[0]}'>{$b[1]}</option>";
                       }
                   }
                   else{
                       echo "语法错误";
                   }
                   ?>
          </select><br/>
          <input type="submit" value="注册" name="totalOK">

      </form>
    </body>
</html>
