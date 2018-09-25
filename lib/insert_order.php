<?php
	
    header('Content-Type:application/json; charset=utf-8'); 
    header("Access-Control-Allow-Origin:http://192.168.17.26:8085");   //跨域
    header('Access-Control-Allow-Credentials:true');
    header('Access-Control-Allow-Methods:GET, POST, OPTIONS');
    date_default_timezone_set('PRC');
    if(isset($_POST['uid'])){
    	$uid = $_POST['uid']; // 用户uid

    	$phone = $_POST['phone']; // 上门联系人

    	$name = $_POST['name']; // 联系人手机号码

    	$local = $_POST['local']; // 联系人地址

    	$num = $_POST['num']; // 联系人楼号

    	$remarks = $_POST['remarks']; // 故障详情描述

    	$goods = $_POST['goods']; // 维修物品

    	$problem = $_POST['problem']; // 维修物品问题

    	$dates = date('Y-m-d H:i:s'); // 维修订单日期

    	$Identification = '0'; // 维修订单标识

		$orderId = 'WX'. date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT); // 订单号id

		require_once('connect_mysql.php');

	    $sql_insert = "INSERT INTO jr_order (uid, phone, name, local, num, remarks, goods, problem, dates, Identification, orderId ) VALUES ('$uid', '$phone', '$name', '$local', '$num', '$remarks', '$goods', '$problem', '$dates', '$Identification', '$orderId')";
	       
        if ($conn->query($sql_insert) === TRUE) { 
		    $json_arr = array(
                'success' => 1,
                "orderId"=>$orderId
            );
		} else { 
		     $json_arr = array('success' => 2);
		} 
    }
    	
    $login_json = json_encode($json_arr, TRUE); //转化为json数据
	echo $login_json;//发送json数据*/
		
   
    
    


