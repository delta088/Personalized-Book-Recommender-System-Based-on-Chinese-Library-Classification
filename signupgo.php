:<?php
//用户注册以后的数据处理文件。需要先检查数据合法性，然后写入数据库
include 'config.php';
//获取注册用户提交的数据
$UserName1=$_POST["UserName"];//用户名
$Password1=$_POST["Password"];//密码
$ConfirmPassword1=$_POST["ConfirmPassword"];//确认密码

//判断数据库中用户名是否已经存在
$query="select * from 读者信息表_测试专用 where 读者编号 ='$UserName1'";
$result=$con->query($query);
$row=mysqli_fetch_array($result);
if ($row){
        
        echo "用户名已存在<br>";
        header("refresh:3;url=http://45.77.97.11/library/net/signup.php");
        echo "3秒钟后自动返回到注册页面";
        echo "<br>";
        exit;
		}
    
//如果数据检测都合法，则将用户资料写进数据库表
else
{
   
    $query="insert into 读者信息表_测试专用 (读者编号,登录密码) values ('$UserName1','$Password1')";
    $result=$con->query($query,$conn);
	header("refresh:3;url=http://45.77.97.11/library/net/login.php");
    echo "注册成功，3秒钟后自动返回到登录页面";
    echo "<br>";
    exit;
  
}
?>