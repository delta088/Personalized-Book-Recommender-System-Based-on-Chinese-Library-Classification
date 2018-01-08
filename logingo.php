<?php
include 'config.php';
session_start();//启动会话
//获取用户的登录信息。用户名，密码，是否保存信息
$UserName1=$_POST["username"];
$Password1=$_POST["password"];
if($UserName1){
//查询用户名是否存在
$query="select * from 读者信息表_测试专用 where 读者编号='$UserName1'";
$result=$con->query($query);
$row=mysqli_fetch_array($result);
if ($row)
{
    if ($row["登录密码"]==$Password1)
            {
		        //创建会话，保存登录信息
                session_unset();//删除会话
                $_SESSION["Password"]=null;//创建会话变量，保存密码
                $_SESSION["Password"]=$Password1;
                $_SESSION["UserName"]=null;//保存用户名
                $_SESSION["UserName"]=$UserName1;

                //登录成功，页面转到管理页面
                header("refresh:1;url=http://45.77.97.11/library/net/net.php");
                exit;
				}
			else{
                //登录不成功
                header("refresh:5;url=http://45.77.97.11/library/net/login.php");
                echo "密码错误，请重新输入<br>5秒后自动返回";
                exit;

				}
 }
   else
      {
        //用户不存在
          header("refresh:5;url=http://45.77.97.11/library/net/login.php");
          echo "用户不存在，请重新输入<br>5秒后自动返回";
		  exit;

       }
}
else{

//用户名为空
          header("refresh:5;url=http://45.77.97.11/library/net/login.php");
          echo "账户不能为空，请重新输入<br>5秒后自动返回";
		  exit;


}
    
?>

