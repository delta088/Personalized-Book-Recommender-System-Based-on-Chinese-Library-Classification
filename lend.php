<?php
//在显示登录界面之前，首先判断是否保存了用户登录信息，如果有，则自动登录
include 'config.php';
session_start();//启动会话
$query="select * from 读者信息表_测试专用 where 读者编号='{$_SESSION['UserName']}' and 登录密码='{$_SESSION['Password']}'";
$result=$con-query($query);
$row=mysqli_fetch_array($result);
if (!$row)
{
    //如果session会话变量用户名与密码不匹配，则自动直接跳转到登录页面
    header("refresh:1;url=http://45.77.97.11/net/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>个性化图书推荐系统</title>
  <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
  <meta name="keyworks" content="虚拟现实,vr">
  <meta name="description" content="虚拟现实社区">
  <meta name="author" content="张浩">
  <script type="text/javascript">
  function return1(){
  	alert("借阅成功");
  }
  </script>
</head>
<body >
<?php
include 'config.php';

//访问此页时,用户进行借阅并记录数据
	if (!empty($_REQUEST['flag'])) {
		$flag = $_REQUEST['flag'];
		$BookId = $_REQUEST['图书编号'];
		$ISBN = $_REQUEST['ISBN'];
		$BookName=$_REQUEST['书籍名称'];
		$Text=$_REQUEST['text'];
		$Text=urlencode($Text);
		$Datetime=date("y-m-d G:i");//借书日期

		if ($flag == lend){
			//进行借阅
			
			$query="insert into 用户行为表_测试专用 (读者编号,ISBN,书籍名称,图书编号,用户行为,借阅日期,所占权重)
 values ('{$_SESSION['UserName']}','$ISBN','$BookName','$BookId','借书','$Datetime','0.250')";
            $result=$con-query($query);
            header("refresh:0;url=http://45.77.97.11/library/net/netgo.php?text=$Text");
			echo "<script type=text/javascript>return1()</script>";
		}

	}

    
?>
</body>
</html>