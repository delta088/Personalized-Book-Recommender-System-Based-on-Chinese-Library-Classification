<!DOCTYPE html>
<html>
<head>
	<title>超级图书馆_用户注册</title>
	<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
	<meta name="keyworks" content="虚拟现实,vr">
	<meta name="description" content="虚拟现实社区">
	<style type="text/css">
	</style>
	<meta name="author" content="张浩">
</head>
<body bgcolor="#F7F7F7">
	<form action="signupgo.php" method="post">
		<table align="center" width="700px">
			<tr>
				<td>
					<img src="../图片资源/vr徽标.png" width="100px" height="100px">
					<img src="../图片资源/一个从未到过的世界（下）.png" width="200px" height="130px">
				</td>
				<td align="right">
					<style>
						a:link {color: #858585; text-decoration:none;}
						a:hover{color: red;}
						a:visited{color: #858585}
					</style>
					<!-- <a href="#">首页 </a> | -->
					<a href="login.php">登陆 </a>| 
					<a href="#">新用户注册</a>
				</td>
			</tr>
			<tr><td colspan="2"></td></tr>
			<tr><td colspan="2"><hr /></td></tr>
		</table>

		<table  align="center">
			<tr>
				<td>账号</td>
				<td width="70px"><input type="text"  name="UserName" required></input></td>
				<td>*</td>
			</tr>
			
			<tr height="3"></tr>
			<tr >
				<td>密码</td>
				<td><input type="password" name="Password" required></input></td>
				<td>*</td>
			</tr>
			
			<tr >
				<td></td>
				<td colspan="2" align="left" style="font-size: 13; color:#666666;">最少4个字符</td>
			</tr>
			<tr height="3"></tr>
			<tr >
				<td>确认密码</td>
				<td><input type="password" name="ConfirmPassword" required></input></td>
				<td>*</td>
			</tr>
			<tr height="3"></tr>
			<tr height="3"></tr>
			<tr><td colspan="3" align="center">点击以下注册按钮则视为您同意<a href="#">超级图书馆用户条款</a ></td></tr>
			<tr><td colspan="3" align="center">
				
				<input type="image" src="../图片资源/申请.png" width="100px" height="30px" ></input></td></tr>
		</table>
		
	</form>
	<center><p style="font-size: 13; color:#666666;">已经有帐号了？<a href="登陆界面.html">登陆</a>超级图书馆</p ></center>
	<hr />
	

</body>
</html>