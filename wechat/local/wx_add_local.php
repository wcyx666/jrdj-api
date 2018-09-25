<?php
	
    if(isset($_POST['uid'])){

    	$uid = $_POST['uid']; // 用户uid

    	$name = $_POST['name']; // 联系人姓名

    	$mobie = $_POST['mobie']; // 上门联系人

    	$title = $_POST['title']; // 上门联系人

    	$address = $_POST['address']; // 联系人地址

    	$num = $_POST['num']; // 联系人楼号

    	$id = md5(uniqid());

    	require_once('../connect_mysql.php');

	    $sql_insert = "INSERT INTO user_local (uid, mobie, name, address, num, title, id ) VALUES ('$uid', '$mobie', '$name', '$address', '$num', '$title', '$id' )";
	       
        if ($conn->query($sql_insert) === TRUE) { 
		    $json_arr = array(
                'success' => 1
            );
		} else { 
		     $json_arr = array('success' => 2);
		} 
		$local_json = json_encode($json_arr, TRUE); //转化为json数据

		echo $local_json;//发送json数据*/
    }
    	
    
		
   
    
    


