<?php
	
    require_once('../connect_mysql.php');


    if(isset($_POST['uid'])){

    	$id = 'WX'. date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT); // 订单号id

    	$uid = $_POST['uid']; // 用户uid

    	$name = $_POST['localName']; // 联系人手机号码

    	$mobie = $_POST['localMobie']; // 上门联系人

    	$title = $_POST['localTitle']; // 小区名称

    	$num = $_POST['localNum']; // 小区楼号

    	$address = $_POST['localAddress']; // 小区地址

    	$wxTypes = $_POST['types']; // 维修/安装类型

    	$proName = $_POST['proName']; // 维修项目

    	$makeData = $_POST['makeData']; // 维修项目

    	$makeTime = $_POST['makeTime']; // 维修项目

    	$placeDate = date('Y-m-d H:i:s'); // 维修下单时间

    	$isCoupon = $_POST['isCoupon']; // 是否使用优惠券

    	$textarea = $_POST['textarea']; // 详情描述

    	$Identification = '0'; // 维修订单标识

		
	    $sql_insert = "INSERT INTO wx_order ( id, uid, name, mobie, title, num, address, wxTypes, proName, makeData, makeTime, placeDate, isCoupon, Identification,textarea ) VALUES ('$id', '$uid', '$name', '$mobie', '$title', '$num', '$address', '$wxTypes', '$proName', '$makeData', '$makeTime', '$placeDate', '$isCoupon', '$Identification','$textarea' )";
	       
        if ($conn->query($sql_insert) === TRUE) { 
		    $json_arr = array(
                'success' => 1,
                "orderId"=>$id
            );
		} else { 
		     $json_arr = array('success' => 2);
		} 
    }
    	
    $login_json = json_encode($json_arr, TRUE); //转化为json数据
	echo $login_json;//发送json数据*/
		
   
    
    


