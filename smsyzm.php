<?php
	header('Content-Type:application/json; charset=utf-8'); 
    header("Access-Control-Allow-Origin:http://192.168.17.26:8085");   //跨域
    header('Access-Control-Allow-Credentials:true');
    header('Access-Control-Allow-Methods:GET, POST, OPTIONS');
	//载入ucpass类
	session_start();    //开启会话

	require_once('lib/Ucpaas.class.php');
	
	require_once('serverSid.php');

	require_once('lib/connect_mysql.php');

	$num = "";
	for($i=0;$i<4;$i++){
		$num .= rand(0,9);
	}

	$appid = "564779a3f25a4e25b6ebe55c393c1d58";	//应用的ID，可在开发者控制台内的短信产品下查看
	$templateid = "368543";    //可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模板ID
	$param = $num; //多个参数使用英文逗号隔开（如：param=“a,b,c”），如为参数则留空
	$mobile = $_POST['yzmtel'];
	$uid = "";

	$_SESSION['yzm']=$num;

   	$data = $ucpass->SendSms($appid,$templateid,$param,$mobile,$uid);
    
    echo $data;