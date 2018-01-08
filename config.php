<?php 
 $con = new mysqli("localhost", "root", "123456", "library"); 
 $con->query('set names utf8;'); 

 header("Content-Type: text/html; charset=utf-8");
?>