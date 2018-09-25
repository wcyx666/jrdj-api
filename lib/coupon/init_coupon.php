<?php

	require_once('add_coupon.php');
	

	require_once('../connect_mysql.php');
	

	$uid = "564779a3f25a4e25b6ebe55c393c1d58";	//应用的ID，可在开发者控制台内的短信产品下查看

	$ucpass = new Ucpaas;

   	$data = $ucpass->coupon($uid);
    
    echo $data;