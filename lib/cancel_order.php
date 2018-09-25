<?php
	/**
    维修type类型字段代表
     * 0  家电
     * 1  家具
     * 2  电路开关
     * 3  房屋主体
     * 4  水暖
     */
    require_once('connect_mysql.php');


	if(isset($_POST['orderId'])){

		$orderId = $_POST['orderId'];

		$sql = "UPDATE jr_order SET Identification='4' WHERE orderId='$orderId'";

	    if ($conn->query($sql) === TRUE) { 
            $json_arr = array('success' => 1); // 修改成功
        } else { 
            $json_arr = array('success' => 2); // 修改失败
        }
	}
	
	$login_json = json_encode($json_arr, TRUE); //转化为json数据
	echo $login_json;//发送json数据
    
    


