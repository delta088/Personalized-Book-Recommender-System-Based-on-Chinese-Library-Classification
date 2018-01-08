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

$BookId=$_REQUEST['bookid'];
$text2 = urldecode($_REQUEST['text']);
//访问此页时,用户进行借阅并记录数据
  if (!empty($_REQUEST['flag'])) 
  {
    $flag = $_REQUEST['flag'];
    if(!$BookId){
      $BookId = $_REQUEST['图书编号'];
    }
    if ($flag == map)
    {
      $length = strlen($BookId);
      while($length>0)
      {
        $tag = substr($BookId,0,$length);
        //echo $ta
        $query_check="SELECT tag_name FROM book_area";
        $result_check=$con->query($query_check);
        while($row_check = mysqli_fetch_array($result_check))
        {
          if($tag == $row_check['tag_name'])
          {
            $query="SELECT * FROM book_area WHERE tag_name = ('$tag')";
            $result=$con->query($query);
            while($row = mysqli_fetch_array($result))
            {
?>
              <div style='background: #F2F2F2;'>
                <div style='float:left;width:25%;margin-top:20%'>
                  <center>
                   索书号：<?php echo "$BookId";?>
                  <p>

                   区域位置：<?php echo "{$row['district']}";?> 
                   <p>
                   <form method = 'post' action = 'netgo.php?text=<?php echo $text2;?>'>
                    <input style='width: 90px; height: 30px; margin-left: -3%;' type='submit' name='submit' value='返回'/>
                        
                   </form>

                  </center>
                </div>
                <div style = 'float:left;width:47%'>
                   <?php echo "<img  src= '{$row['address']}' width='92%' >"; ?>
                </div>
               <div  style = 'float:left;width:24%; margin-top:18%'>
                  <center>
                  &nbsp位置不对？请将书名告知我们，我们会在第一时间做出调整，给您造成的不便敬请谅解
                  <p>
                  <form method='post' action='report_error.php?bookid=<?php echo $BookId ;?>&text2=<?php echo $text2;?>' >
                    <table>
                      <tr><input style='width: 300px; height: 30px;' type='text' id='text' name='text'/> </tr>
                      <p>
                      <tr><input style='width: 90px; height: 30px; margin-left: -3%;' type='submit' name='submit' value='提交'/></tr>
                    </table>
                  </form>
                  </center>
                </div>
              </div>
<?php
              //echo $ta
            }
            $n = 1;
            break;
          }
        }
        if($n == 1)
          break;
        $length = $length - 1;
      }
    }
  }

    
?>
</body>
</html>