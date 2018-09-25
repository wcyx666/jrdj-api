<?php
	
    if(isset($_POST['id'])){

    	$id = $_POST['id'];

    	$name = $_POST['name']; // 联系人姓名

    	$mobie = $_POST['mobie']; // 上门联系人

    	$title = $_POST['title']; // 上门联系人

    	$address = $_POST['address']; // 联系人地址

    	$num = $_POST['num']; // 联系人楼号

    	require_once('../connect_mysql.php');

    	$sql = "UPDATE user_local SET name='$name',mobie='$mobie',title='$title',num='$num',address='$address' WHERE id= '$id'";

		if ($conn->query($sql) === TRUE) { 
            $json_arr = array('success' => 1); // 修改成功
        } else { 
            $json_arr = array('success' => 2); // 修改失败
        }
		
		$login_json = json_encode($json_arr, TRUE); //转化为json数据
		echo $login_json;//发送json数据
    }

