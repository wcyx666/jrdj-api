<?php
	
    header('Content-Type:application/json; charset=utf-8'); 
    header("Access-Control-Allow-Origin:http://192.168.17.26:8085");   //跨域
    header('Access-Control-Allow-Credentials:true');
    header('Access-Control-Allow-Methods:GET, POST, OPTIONS');

    session_start();    //开启会话

    $phone = $_POST['phone']; // 手机号码

	$psw = $_POST['psw']; // 密码

	$yzm = $_POST['dataYzm']; // 验证码
	
	$sessionYzm = $_SESSION['yzm'];

	if($yzm == $sessionYzm){

		require_once('connect_mysql.php');

		$sql = "SELECT * FROM jr_user WHERE phone = '$phone'";

	    $result = mysqli_query($conn, $sql);    //执行sql语句,返回查询后的结果集

	    $rows = mysqli_num_rows($result); //返回结果集中行的数量

	    if ($rows == 0) {
	    	
	    	$json_arr = array('success' => -1); //手机号码不存在，请注册
			 
	    }else {
	    	$sql_insert = "UPDATE jr_user SET password='$psw' WHERE phone='$phone'";
	       	
	        if ($conn->query($sql_insert) === TRUE) { 
			    $json_arr = array('success' => 1); // 修改成功
	            unset($_SESSION['yzm']);
			} else { 
			    $json_arr = array('success' => 2); // 修改失败
			} 
	    	
	    }
	}else {
		$json_arr = array('success' => -2); //验证码不正确
	}
	
	$login_json = json_encode($json_arr, TRUE); //转化为json数据
	echo $login_json;//发送json数据
    
    


