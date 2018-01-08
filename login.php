<!DOCTYPE html>
<html>
<head>
	<title>超级图书馆_用户登录</title>
	<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
	<meta name="keyworks" content="虚拟现实,vr">
	<meta name="description" content="虚拟现实社区">
	<style type="text/css">
	</style>
	<meta name="author" content="张浩">
</head>
<body bgcolor="#F7F7F7">
	<table align="center" width="700px">
		<tr>
			<td>
				<img src="../photo/vr_logo.jpg" width="100px" height="100px">
				<img src="../photo/the world.jpg" width="200px" height="130px">
			</td>
			
			<td align="right">
				<style>
					a:link {color: #858585; text-decoration:none;}
					a:hover{color: red;}
					a:visited{color: #858585}
				</style>
				<a href="net.php">首页 |</a> 
				<a href="login.php">登陆 |</a> 
				<a href="signup.php">新用户注册 </a>
			</td>
		</tr>
		<tr><td colspan="2"></td></tr>
		<tr><td colspan="2"></td></tr>
	</table>
	<hr />
	<div style="float: left; margin-left: 5%; padding-top: 1%;">
		<img src="../photo/the cat.jpg">
	</div>
	<div style="float: right; margin-right: 15%; padding-top: 5%;">
		<p style="font-size: 10; color:#666666;">请填写6-15位账户名或手机号</p>
		<form action="logingo.php" method="post">
			<p><input style="width: 300px; height: 30px;" type="text"  name="username" placeholder="账号/手机" /></p>
            <p><input style="width: 300px; height: 30px;" type="password"  name="password" placeholder="密码" /></p>
            <!-- <p><input style="width: 150px; height: 30px;" type="text"  name="username" placeholder="输入验证码" /></p> -->
			<style>
				a:link {color: #858585; text-decoration:none;}
				a:hover{color: red;}
				a:visited {color: #858585}
			</style>
			<span ><a href="">忘记密码 </a></span>
			<span ><a href="signup.php"> 注册新账号</a></span>
			<p></p>
			<input type="image" src="../photo/login in.jpg" width="100px" height="30px" ></input>
		</form>
	</div>
