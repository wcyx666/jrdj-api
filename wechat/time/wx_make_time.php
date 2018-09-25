<?php  
	
	require_once('../connect_mysql.php');

	function get_weeks($time = '', $format='Y-m-d'){
	  $time = $time != '' ? $time : time();
	  //组合数据
	  $dateArr = [];
	  for ($i=0; $i<5; $i++){
	  	$json_arr = array(
            'date' => date($format ,strtotime( '+' . $i .' days', $time)),
            "time"=>['08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00'],
            "week" => get_week(date($format ,strtotime( '+' . $i .' days', $time)))
        );
	    $dateArr[$i] = $json_arr;
	    
	  }
	  return $dateArr;
	}

	function get_week($date){
        //强制转换日期格式
        $date_str=date('Y-m-d',strtotime($date));
    
        //封装成数组
        $arr=explode("-", $date_str);
         
        //参数赋值
        //年
        $year=$arr[0];
         
        //月，输出2位整型，不够2位右对齐
        $month=sprintf('%02d',$arr[1]);
         
        //日，输出2位整型，不够2位右对齐
        $day=sprintf('%02d',$arr[2]);
         
        //时分秒默认赋值为0；
        $hour = $minute = $second = 0;   
         
        //转换成时间戳
        $strap = mktime($hour,$minute,$second,$month,$day,$year);
         
        //获取数字型星期几
        $number_wk=date("w",$strap);
         
        //自定义星期数组
        $weekArr=array("周日","周一","周二","周三","周四","周五","周六");
         
        //获取数字对应的星期
        return $weekArr[$number_wk];
    }

	$login_json = json_encode(get_weeks(), TRUE); //转化为json数据
	echo $login_json;//发送json数据
?>