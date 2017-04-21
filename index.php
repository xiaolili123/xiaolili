<?php
/**
 * Created by PhpStorm.
 * User: hhh
 * Date: 2017/2/21
 * Time: 21:29
 */
?>
<style>
    *{ text-align: center}

</style>

<?php
header("Content-Type:text/html;charset=utf8");
//登录成功，用表格形式显示打印信息
if(isset($_GET['add']) && $_GET['add']=='success'){

     echo "<script>alert('增加成功');</script>";
}

////判断修改信息成功，接受重定向回来的值
 if(isset($_GET['up']) && $_GET['up']=='updatesuccess'){
     echo "<script>alert('修改成功');</script>";

 }

//判断删除信息成功，接受重定向回来的值
if(isset($_GET['del']) && $_GET['del']=='delete'){
    echo "<script>alert('删除成功');</script>";

}

//判断删除信息失败，接受重定向回来的值
if(isset($_GET['notdel']) && $_GET['notdel']=='notdelete'){

    echo "<script>alert('删除失败');</script>";
}
///连接数据库
$link=mysqli_connect("localhost","root","root","student")
or die("数据库连接失败".mysqli_error);
//设置编码
mysqli_query($link,"set names utf8");

   //分页显示查询
    //
   $tatolpage=0;//总页数
   $tatolpagerows=0;//总条数
   $lastpage=0;//上一页
   $nextpage=2;//下一页
   $nowpage=1;//当前页
   $pagesize=5;//每条显示的条数
   $pageindex=0;//每条显示的起始索引
   //计算总的条数
   $resSize=mysqli_query($link,"select count(presonId) as 'zId' from preson; ");
     if($resSize){
         $rowArr=mysqli_fetch_assoc($resSize);//返回关联数组
         $tatolpagerows=$rowArr['zId'];

     }
     else{
         echo "sql语法错误";
     }
     //计算总页数 =总条数/每页显示的条数
  if($tatolpagerows%$pagesize==0){

      $tatolpage=$tatolpagerows/$pagesize;
  }
  else{
      $tatolpage=intval($tatolpagerows/$pagesize)+1;//向下取整

  }
 // echo $tatolpage;
   //$tatolpage=ceil($tatolpagerows/$pagesize);//向上取整
  //计算当前页
  if(isset($_GET['page'])){
      $nowpage=$_GET['page'];//当前页
      $lastpage=$nowpage-1;//上一页
      $nextpage=$nowpage+1;//下一页
      if($nowpage<1){

          $nowpage=1;
          header("location:index.php?page=1");
      }//$tatolpage总页数
      if($nowpage>$tatolpage){
          header("location:index.php?page={$tatolpage}");

      }
      ///计算每页的起始索引
      //每页的起始索引=（当前页-1）*每页显示的条数
      $pageindex=($nowpage-1)*$pagesize;
  }

//sql语句
$sql="select presonId,presonName,presonPad,presonSex,presonAge,nation.nationName
from preson inner join nation
on nation.nationId=preson.presonNation order by presonId desc 
limit $pageindex,$tatolpage
;";

//执行语句
$a=mysqli_query($link,$sql);
if($a){
    //echo "su";
    echo "<table border='1px' align='center' >";
      echo "<tr>
              <th>编号</th>
              <th>姓名</th>
              <th>密码</th>
              <th>性别</th>
              <th>年龄</th>
              <th>民族</th>
              <th colspan='4'>备注</th>
           </tr>";
    while($b=mysqli_fetch_assoc($a))//
    {
         echo "<tr>";
         echo "<td>{$b['presonId']}</td>";

         echo "<td>{$b['presonName']}</td>";

         echo "<td>{$b['presonPad']}</td>";
         echo "<td>{$b['presonSex']}</td>";
         echo "<td>{$b['presonAge']}</td>";
         echo "<td>{$b['nationName']}</td>";
         echo "<td><a href='desc.php?tex={$b['presonId']}'>详细</td>";
         echo "<td><a href='addpreson.php?'>增加</a></td>";
         echo "<td><a href='updatepreson.php?tex={$b['presonId']}'>修改</a></td>";
         echo "<td><a href='deletepreson.php?delId={$b['presonId']}' onclick='return delfun()' >删除</a></td>";
        echo  " </tr>";
    }
    echo "</table>";
}



else{
    echo "语法错误";
}
?>

<script>

      function delfun(){

          return confirm("确认删除吗");
      }
</script>
<?php
echo "<div class='page'>";
echo " <a href='index.php?page=1'>首页</a>";
echo " <a href='index.php?page={$lastpage}'>上一页</a>";
echo "  当前是【{$nowpage}】页 &nbsp;共【{$tatolpage}】页";
echo "  <a href='index.php?page={$nextpage}'>下一页</a>";
echo "<a href='index.php?page={$tatolpage}'>尾页</a>";

echo "</div>";

?>