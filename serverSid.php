<?php
header('Content-Type:application/json; charset=utf-8'); 
    header("Access-Control-Allow-Origin:http://192.168.17.26:8085");   //跨域
    header('Access-Control-Allow-Credentials:true');
    header('Access-Control-Allow-Methods:GET, POST, OPTIONS');

//载入ucpass类
require_once('lib/Ucpaas.class.php');

//初始化必填
//填写在开发者控制台首页上的Account Sid
$options['accountsid']='d18163019d84277b4f41de856ba3b539';
//填写在开发者控制台首页上的Auth Token
$options['token']='3897e91c3d4cc08cdb1f3df45cb12192';

//初始化 $options必填
$ucpass = new Ucpaas($options);