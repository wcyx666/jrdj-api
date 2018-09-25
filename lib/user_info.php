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

    if(isset($_POST['uid'])){

    	$uid = $_POST['uid'];

		$sql = "SELECT uid, name, icon, phone, local, num FROM jr_user WHERE uid='$uid'";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // 输出每行数据
		    while($data = $result->fetch_assoc()) {
		        $json_arr = array(
	                'success' => 1,
	                "data"=>$data
	            );
		    }
		} else {
		    $json_arr = array('error' => 1); // 修改失败
		}
		
		$login_json = json_encode($json_arr, TRUE); //转化为json数据
		echo $login_json;//发送json数据
    }

   
    
    


