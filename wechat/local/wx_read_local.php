<?php
	
    if(isset($_POST['uid'])){

    	$uid = $_POST['uid'];

    	require_once('../connect_mysql.php');

		$sql = "SELECT * FROM user_local WHERE uid = '$uid'";

		$result = $conn->query($sql);

		$dataarr = array(); 

		if ($result->num_rows > 0) {
		    // 输出每行数据
		    while($data = $result->fetch_assoc()) {
		    	$dataarr[]=$data;
		        $json_arr = array(
	                'success' => 1,
	                "data"=>$dataarr
	            );
		    }
		} else {
		    $json_arr = array(
                'success' => 1,
                "data"=>$dataarr
            );
		}
		
		$login_json = json_encode($json_arr, TRUE); //转化为json数据
		echo $login_json;//发送json数据
    }

