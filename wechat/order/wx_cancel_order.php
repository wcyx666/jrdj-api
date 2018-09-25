<?php
	
    require_once('../connect_mysql.php');

    if(isset($_POST['id'])){

    	$id = $_POST['id'];

    	$Identification = '4';

		$sql = "UPDATE wx_order SET Identification='$Identification' WHERE id='$id'";

		//$sql = "INSERT INTO jr_info (name, phone, wechat, local, type, remarks ) VALUES ('$name','$phone','$wechat','$local','$type','$remarks') WHERE uid = '$uid'";

	    if ($conn->query($sql) === TRUE) { 
            $json_arr = array('success' => 1); // 修改成功
        } else { 
            $json_arr = array('success' => 2); // 修改失败
        }
		
		$login_json = json_encode($json_arr, TRUE); //转化为json数据
		echo $login_json;//发送json数据
    }

   
    
    


