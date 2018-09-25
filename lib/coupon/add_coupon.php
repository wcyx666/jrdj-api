
<?php
	require_once('../connect_mysql.php');

	function make_coupon_card() {
        $code = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $rand = $code[rand(0,25)]
	        .strtoupper(dechex(date('m')))
	        .date('d').substr(time(),-5)
	        .substr(microtime(),2,5)
	        .sprintf('%02d',rand(0,99));
	    for(
	        $a = md5( $rand, true ),
	        $s = '0123456789ABCDEFGHIJKLMNOPQRSTUV',
	        $d = '',
	        $f = 0;
	        $f < 8;
	        $g = ord( $a[ $f ] ),
	        $d .= $s[ ( $g ^ ord( $a[ $f + 8 ] ) ) - $g & 0x1F ],
	        $f++
	    );
	    return $d;
    }
    if( isset($_POST['phone']) ){

    	$phone = $_POST['phone'];

		$type = '0';

		$moneys = '50';

		$start_time = date('Y-m-d H:i:s',time());

		$end_time = date("Y-m-d H:i:s",strtotime("+1months",strtotime($start_time)));

		$coupon_id = make_coupon_card();

		$is_use = '0'; //0 未使用 1 使用 2 已过期

	    $sql_insert = "INSERT INTO jr_coupon (phone, type, moneys, start_time, end_time, is_use, coupon_id) VALUES ('$phone', '$type', '$moneys','$start_time', '$end_time', '$is_use', '$coupon_id')";

	    if ($conn->query($sql_insert) === TRUE) { 

		    $json_arr = array('success' => 1);

		} else { 
		     $json_arr = array('success' => 2);
		}
    }
     
    $login_json = json_encode($json_arr, TRUE); //转化为json数据
	echo $login_json;//发送json数据

/*
public function format_date($start,$end)
	{
		$start_time = strtotime($start);                              //获取当前时间
		$end_time = strtotime($end); 

		$sub = ceil(($end_time-$start_time)/3600); 

		return $sub;      
	}
*/