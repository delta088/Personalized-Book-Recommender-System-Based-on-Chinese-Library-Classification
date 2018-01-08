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
    alert("提交成功");
  }
  </script>
</head>
<body >

<?php
include 'config.php';

$bookid = $_REQUEST['bookid'];
$text = $_POST["text"];
$text2 = urlencode($_REQUEST["text2"]);
$query="INSERT INTO report_error VALUES ('$text','$bookid')";
$result=$con->query($query);
if ($result)
{
  header("refresh:0;url=http://45.77.97.11/library/net/book_area.php?text=$text2&bookid=$bookid&flag=map");
  echo "<script type=text/javascript>return1()</script>";
}



?>
</body>
</html>