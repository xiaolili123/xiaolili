<?php
/**
 * Created by PhpStorm.
 * User: hhh
 * Date: 2017/2/22
 * Time: 1:51
 */
header("Content-Type:text/html;charset=utf8");
//获取账号值
$tex=$_GET['tex'];
//echo $tex;
//判断接受重定向回来的值
   if(isset($_GET['a']) && $_GET['a']=='updatesuccess'){
       echo "<script>alert('修改失败');</script>";
   }


//先获取所有的详细信息

$link=mysqli_connect("localhost","root","root","student");

 $sql="select presonId,presonName,presonPad,presonSex,presonAge,nation.nationName
 from preson inner join nation 
  on nation.nationId=preson.presonNation
  where presonId={$tex} ";
//执行
mysqli_query($link,"set names utf8");

$a=mysqli_query($link,$sql);

if($a){
    $b=mysqli_fetch_assoc($a);//返回一条关联数组
    $presonId=$b['presonId'];
    $presonName=$b['presonName'];
    $presonPad=$b['presonPad'];
    $presonSex=$b['presonSex'];
    $presonAge=$b['presonAge'];
    $presonnationName=$b['nationName'];
  //  print_r($b);
}
else{
    echo "语法错误";
}
?>
<html>
 <head></head>
   <body>
     <form action="updatepreProcess.php" method="post">
         编号：<input readonly name="presonId" value="<?php echo $presonId;?>"><br/>
         姓名：<input name="presonName" value="<?php echo $presonName;?>"><br/>
         密码：<input name="presonPad" value="<?php echo $presonPad;?>"><br/>
              <input type="hidden" name="oldpresonPad" value="<?php echo $presonPad;?>">
         性别：<input type="radio" name="presonSex" <?php echo $presonSex=="男" ? "checked": "";?> value="男">男
              <input type="radio" name="presonSex" <?php echo $presonSex=="女" ? "checked": "";?> value="女">女<br/>
         年龄：<input name="presonAge" value="<?php echo $presonAge;?>"><br/>
         民族：<select name="presonNation">
                <option value="0">--选择民族--</option>
               <?php
                  $sql="select * from nation";
                  mysqli_query($link,"set names utf8");
                  $a=mysqli_query($link,$sql);
                  if($a){
                      //一条条获取
                       while($b=mysqli_fetch_row($a))//从结果集中取得一行,并作为枚举数组返回
                       {
                           echo "<option value='{$b['0']}'";
                            if($presonnationName==$b['1'])
                            {
                                echo "selected";}

                           echo ">";
                           echo "{$b[1]}</option>";
                       }

                  }
                  else{
                      echo "语法错误0000";
                  }
               ?>
         </select>
         <br/>
         <input type="submit" name="udt" value="修改">
     </form>

   </body>
</html>
