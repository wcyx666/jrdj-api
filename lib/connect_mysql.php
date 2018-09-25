<?php
	header('Content-Type:text/html; charset=UTF-8');
    header("Access-Control-Allow-Origin:http://192.168.17.26:8085");   //跨域
    header('Access-Control-Allow-Credentials:true');
    header('Access-Control-Allow-Methods:GET, POST, OPTIONS');

    date_default_timezone_set('PRC');

	$host = 'localhost'; //主机地址
	//$host = '118.89.25.120';
	$database = 'jrdj_admin';   //数据库名
	$username = 'root'; //数据库的用户名
	$password = ''; //数据库的密码

	
	/*
	 连接数据库
	 */
	// 创建连接 
	$conn = mysqli_connect($host, $username, $password, $database); 

	$conn->query("set names utf8");

	// 检测连接 
	if (!$conn) { 
	    die("Connection failed: " . mysqli_connect_error()); 
	}
?>