<?php

	$code = $_POST['code'];

	$appid = 'wx4773aa4010088788';

	$secret = 'b5ef829f3f154a73340c09ba70e13dae';


    $url="https://api.weixin.qq.com/sns/jscode2session?appid=$appid&secret=$secret&js_code=$code&grant_type=authorization_code";
    function getcurl ($url){
            $ch = curl_init();
            curl_setopt ($ch,CURLOPT_URL,$url);
            curl_setopt ($ch,CURLOPT_RETURNTRANSFER,1);
            curl_setopt ($ch,CURLOPT_TIMEOUT,30);
            $content=curl_exec($ch);
            $status=(int)curl_getinfo($ch,CURLINFO_HTTP_CODE );
            if( $status==404)
            {
                return  "";
            }
            curl_close($ch) ;
            return $content;
    }
    //code换取openid
    $res = getcurl($url);

	echo $res;//发送json数据
