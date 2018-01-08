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
  <meta name="keyworks" content="推荐">
  <meta name="description" content="推荐系统">
  <meta name="author" content="张浩">
  <script type="text/javascript">
  function return1(){
    alert("反馈成功");
  }
  </script>
</head>
<body >

<?php
include 'config.php';
$user_name = $_REQUEST["user_name"];
$book_name = $_REQUEST["text"];
$tag_name = $_REQUEST["图书编号"];
$query="INSERT INTO 用户行为表_测试专用(读者编号,书籍名称,图书编号,用户行为,所占权重) VALUES ('$user_name','$book_name','$tag_name','1',0.05)";
$result=$con->query($query);
if ($result)
{
  header("refresh:0;url=http://45.77.97.11/library/net/net.php");
  echo "<script type=text/javascript>return1()</script>";
}






?>
</body>
</html>