<?php


    require_once('connect_mysql.php');

    if(isset($_POST['repair_name'])){

    	$repair_name = $_POST['repair_name'];

		$sql = "SELECT repair_problem FROM jr_repair_type WHERE repair_name LIKE '$repair_name'";

		$result = $conn->query($sql);

		$dataarr = array(); 

		if ($result->num_rows > 0) {
		    // 输出每行数据
		    while($data = $result->fetch_assoc()) {
		    	$arr = explode(",",$data['repair_problem']);
		        $json_arr = array(
	                'success' => 1,
	                "data"=>$arr
	            );
		    }
		} else {
 
		    $json_arr = array('error' => 1); // 修改失败
		}
		
		$login_json = json_encode($json_arr, TRUE); //转化为json数据
		echo $login_json;//发送json数据
    }

   
    
    


