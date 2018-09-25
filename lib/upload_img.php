<?php
    
    require_once('connect_mysql.php');

    $imgname = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    $file = $_FILES['file'];//得到传输的数据
    //得到文件名称
    $name = $file['name'];
    $type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
    $allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型

    //判断文件类型是否被允许上传
    if(!in_array($type, $allow_type)){
        //如果不被允许，则直接停止程序运行
        return ;
    }
    //判断是否是通过HTTP POST上传的
    if(!is_uploaded_file($file['tmp_name'])){
        //如果不是通过HTTP POST上传的
        return ;
    }
    $upload_path = "./img/"; //上传文件的存放路径
    //开始移动文件到相应的文件夹
    if(move_uploaded_file($file['tmp_name'],$upload_path.$file['name'])){
        
        $icon_tem = "img/" . $_FILES["file"]["name"];
        $icon_arr = array("$icon_tem");
        $icon = implode($icon_arr);
        $uid = $_POST['uid'];
        $type = $_POST['type'];
        if($type == '0'){ // 故障问题上传
            $sql = "UPDATE jr_order SET img = '$icon' WHERE orderId='$uid'";
            if ($conn->query($sql) === TRUE) { 
                $json_arr = array('success' => 1); // 修改成功
            } else { 
                $json_arr = array('success' => 2); // 修改失败
            }
        }else if($type == '1'){ // 个人头像图片上传
            $sql = "UPDATE jr_user SET icon='$icon' WHERE uid='$uid'";
            if ($conn->query($sql) === TRUE) { 
                $json_arr = array('success' => 1); // 修改成功
            } else { 
                $json_arr = array('success' => 2); // 修改失败
            }
        }
        
    }else{
        echo "Failed!";
    }
    $login_json = json_encode($json_arr, TRUE); //转化为json数据
    echo $login_json;//发送json数据
    

?>
  
