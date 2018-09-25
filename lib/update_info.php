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


	if(isset($_POST['name'])){

		$uid = $_POST['uid'];

		$name = $_POST['name']; // 姓名

	    $phone = $_POST['phone']; // 手机号码

		$local = $_POST['local']; // 地址

		$num = $_POST['num']; // 地址

		

		$sql = "UPDATE jr_user SET name='$name',phone='$phone',local='$local',num='$num' WHERE uid='$uid'";

		//$sql = "INSERT INTO jr_info (name, phone, wechat, local, type, remarks ) VALUES ('$name','$phone','$wechat','$local','$type','$remarks') WHERE uid = '$uid'";

	    if ($conn->query($sql) === TRUE) { 
            $json_arr = array('success' => 1); // 修改成功
        } else { 
            $json_arr = array('success' => 2); // 修改失败
        }
	}
	
	$login_json = json_encode($json_arr, TRUE); //转化为json数据
	echo $login_json;//发送json数据
    
    


