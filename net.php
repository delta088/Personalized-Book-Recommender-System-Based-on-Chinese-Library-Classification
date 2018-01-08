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
	<meta name="keyworks" content="虚拟现实,vr">
	<meta name="description" content="虚拟现实社区">
	<!-- <link rel="stylesheet" type="text/css" href="normalize.css" />
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="demo.css" />
	<link rel="stylesheet" type="text/css" href="component.css" />
	<style type="text/css">
	</style> -->
	<meta name="author" content="张浩">
</head>
<body >
	<div>
		<div >
			<img src="../photo/library666.jpg" height="250px;" width="100%"/> 

		</div>

		<div style="background: #F2F2F2;">
			<div style="float: left; width: 33%;">
				<table style="line-height:40px; text-align: left;">
					<tr><th><img src="../photo/library_circular.jpg" style="width:90%" /></th></tr>
					<tr><th><a style="margin-left: 15%" href="http://lib.tjut.edu.cn/NewsDetail.aspx?NewsID=898" targe_blank">图书馆喜迎2016级新生</a></th></tr>
					<tr><th><a style="margin-left: 15%" href="http://lib.tjut.edu.cn/NewsDetail.aspx?NewsID=897" targe_blank">2016年中秋节期间开馆时间调整</a></th></tr>
					<tr><th><a style="margin-left: 15%" href="http://lib.tjut.edu.cn/NewsDetail.aspx?NewsID=896" targe_blank">致图书馆新读者</a></th></tr>
					<tr><th><a style="margin-left: 15%" href="http://lib.tjut.edu.cn/NewsDetail.aspx?NewsID=895" targe_blank">图书馆2016年暑假期间开馆安排</a></th></tr>
					<tr><th><a style="margin-left: 15%" href="http://lib.tjut.edu.cn/NewsDetail.aspx?NewsID=894" targe_blank">图书馆临时停电通知</a></th></tr>
					<tr><th><a style="margin-left: 15%" href="http://lib.tjut.edu.cn/NewsDetail.aspx?NewsID=893" targe_blank">关于2016天津夏季达沃斯论坛青年...</a></th></tr>
				</table>
			</div>	

			<div style="float: left; width: 33%; margin-top: 8%;">
				<form method="post" action="netgo.php" >
						
                    <div style="margin-left: 9%;">图书检索：</div>
                    <div >
                      	<ul>		
                      		<li style="list-style-type:none;">
                      			<!-- 检索输入框 -->
                      			<input style="width: 300px; height: 30px;" type="text" id="text" name="text"/>               
                      		</li>


							<li style="list-style-type:none; margin-top: 20px;">
							<!-- 检索按钮 -->

		                          <div><input style="width: 90px; height: 30px; margin-left: 28%;" type="submit" name="submit" value="检索"/></div>
		                        
	                        </li>
								
                      	</ul>

                    </div>
                      
                     
				</form>

			</div>

						
			<div style="float: left; width: 32%;">
				<img src="../photo/library_hao.jpg" height="300px;" width="auto"/>
					<ul>
         				<li style="margin-left: 45%;"><a href="http://45.77.97.11/library/net/login_off.php">退出登录</a></li>
        			</ul>

			</div>
		</div>

	<div style="width: auto; height: 255px; margin-top:15px;">
		<div style="float: left; width: 40%; margin-left: 10%;">
			<h style="font-family: 微软雅黑; font-size: 30px; margin-left: 10%"  >我的历史浏览记录:</h>
			<?php
		include 'config.php';
		// $myfile = fopen("python_php.txt","w") or die("unable to open file");
		// $txt = $_SESSION['UserName'];
		// fwrite($myfile,$txt);

		$str1 = "../python/python user_insterest_model.py ".$_SESSION['UserName'];
		$str2 = "../python/python command.py " .$_SESSION['UserName'];
		exec($str1);
		exec($str2);
		// system("python user_insterest_model.py");
		// system("python command.py");

		//查询用户名是否存在
		$query="select * from 用户行为表_测试专用 where 读者编号='{$_SESSION['UserName']}' ";
		$result=$con->query($query);
		echo "<p>";
		echo "<table border='2px' bordercolor='red' cellspacing='0px'>";
		    echo "<tr>
		<th style='width:120px;height:20px;font-size:13px'>读者编号</th>
		<th style='width:120px;height:20px;font-size:13px'>书籍名称</th>
		<th style='width:120px;height:20px;font-size:13px'>借阅日期</th>
		</tr>";
		if(mysqli_num_rows($result))
		{
		  while($row=mysqli_fetch_array($result))
		  {
		    //显示所有用户信息(表格的形式)
		
		      echo "<tr>
		<td style='width:120px;height:20px;text-decoration: none;text-align:center;font-size:13px'>{$row['读者编号']}</td>
		<td style='width:120px;height:20px;text-decoration: none;text-align:center;font-size:13px'>{$row['书籍名称']}</td>
		<td style='width:120px;height:20px;text-decoration: none;text-align:center;font-size:13px'>{$row['借阅日期']}</td>";

		  
		  }
		}
		
		echo "</table>";
		    
		?>
		</div>
		<div style="float: right; width: 40%; margin-left: 10%">
			<h style="font-family: 微软雅黑; font-size: 30px; margin-left: 10%"  >为你推荐:</h>
			<?php
		include 'config.php';
		//查询用户名是否存在
		$query="select * from command_list_测试专用 where user_id='{$_SESSION['UserName']}' ";
		$result=$con->query($query);
		echo "<p>";
		echo "<table border='2px' bordercolor='red' cellspacing='0px'>";
		    echo "<tr>
		<th style='width:120px;height:20px;font-size:13px'>读者编号</th>
		<th style='width:120px;height:20px;font-size:13px'>图书名称</th>
		<th style='width:120px;height:20px;font-size:13px'>作者</th>
		<th style='width:120px;height:20px;font-size:13px'>用户反馈</th>
		</tr>";
		if(mysqli_num_rows($result))
		{
		  while($row=mysqli_fetch_array($result))
		  {
		    //显示所有用户信息(表格的形式)
			//$tag_name = {$row['tag_name']};
		      echo "<tr>
		<td style='width:120px;height:20px;text-decoration: none;text-align:center;font-size:13px'>{$row['user_id']}</td>
		<td style='width:120px;height:20px;text-decoration: none;text-align:center;font-size:13px'>{$row['command_book']}</td>
		<td style='width:120px;height:20px;text-decoration: none;text-align:center;font-size:13px'>{$row['author']}</td>"
		 .
      "
        <td style='width:120px;height:20px;text-decoration: none;text-align:center;font-size:13px'>
      <a href='love.php?user_name={$row['user_id']}&text={$row['command_book']}&图书编号={$row['tag_name']}'>喜爱</a>/<a href='dontlove.php?user_name={$row['user_id']}&text={$row['command_book']}&图书编号={$row['tag_name']}'>不喜欢</a></td>
      </tr>";

		}
		}
		
		echo "</table>";
		    
		?>
		</div>
	</div>
</body>
</html>