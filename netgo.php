<?php
//在显示登录界面之前，首先判断是否保存了用户登录信息，如果有，则自动登录
include 'config.php';
session_start();//启动会话
$query="select * from 读者信息表_测试专用 where 读者编号='{$_SESSION['UserName']}' and 登录密码='{$_SESSION['Password']}'";
$result=$con->query($query);
$row=mysqli_fetch_array($result);
if (!$row)
{
    //如果session会话变量用户名与密码不匹配，则自动直接跳转到登录页面
    header("refresh:1;url=http://45.77.97.11/library/net/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>个性化图书推荐系统</title>
  <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
  <meta name="keyworks" content="个性化,图书推荐">
  <meta name="description" content="图书推荐系统">
  <meta name="author" content="张浩">
</head>

</SCRIPT>
<body >
<div>
  <div style="width:50%;float: left;margin-left: 5%">
      <?php
      include 'config.php';
      //获取用户的登录信息。用户名，密码，是否保存信息
      $text1=$_REQUEST["text"];
      $text2=urldecode($_GET["text"]);
      $$text11=null;
      if(!$text1){
      
        $text11=$text2;
      }
      else{
      
      $text11=$text1;
      }
      
      //查询用户名是否存在
      $query="select * from 书籍信息表 where 书籍名称 like '%".$text11."%'";
      $result=$con->query($query);
      // $row=mysql_fetch_array($result);
      echo "<h1>图书信息列表</h1>";
      echo "<table border='2px' bordercolor='red' cellspacing='0px'>";
          echo "<tr>
      <th style='width:120px;height:20px;font-size:13px'>书籍名称</th>
      <th style='width:120px;height:20px;font-size:13px'>作者</th>
      <th style='width:120px;height:20px;font-size:13px'>图书编号</th>
      <th style='width:150px;height:20px;font-size:13px'>ISBN</th>
      <th style='width:150px;height:20px;font-size:13px'>图书位置</th>
      <th style='width:120px;height:20px;font-size:13px'>操作</th>
      
      </tr>";
      if(mysqli_num_rows($result))
      {
        while($row=mysqli_fetch_array($result))
        {
          //显示所有用户信息(表格的形式)
        
          
            echo "<tr>
      <td style='width:120px;height:20px;text-decoration: none;text-align:center;font-size:13px'>{$row['书籍名称']}</td>
      <td style='width:120px;height:20px;text-decoration: none;text-align:center;font-size:13px'>{$row['作者']}</td>
      <td style='width:120px;height:20px;text-decoration: none;text-align:center;font-size:13px'>{$row['图书编号']}</td>
      <td style='width:120px;height:20px;text-decoration: none;text-align:center;font-size:13px'>{$row['ISBN']}</td>"
      .
      "
        <td style='width:120px;height:20px;text-decoration: none;text-align:center;font-size:13px'>
      <a href='book_area.php?text=$text11&图书编号={$row['图书编号']}&flag=map'>架位导航</a></td>
      <td style='width:120px;height:20px;text-decoration: none;text-align:center;font-size:13px'>
      <a href='lend.php?text=$text1&书籍名称={$row['书籍名称']}&图书编号={$row['图书编号']}&ISBN={$row['ISBN']}&flag=lend'>借阅</a></td>


      </tr>"  ;
        
        }
      }
      
      echo "</table>";
          
      ?>
  </div>
  <div style="float: left;width: 30%;margin-top: 8%; font-size:30px;">
      <a href="net.php">获取推荐列表</a>
  </div>






</div>
</body>
</html>