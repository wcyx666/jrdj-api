
<?php
/*登录接口
* date:2018/9/3
*/
    header("Content-type:text/html;charset=utf-8");
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers","x-requested-with,Authorization");
    header('Access-Control-Allow-Methods:GET, POST, PUT,DELETE');

    
    if(isset($_POST['phone'])){

        $phone = $_POST['phone']; // 手机号码

        $psw = $_POST['psw']; // 密码

        //include ("connect_mysql.php");
        require_once('connect_mysql.php');

        //判断用户是否存在
        $sql = "SELECT * FROM jr_user WHERE phone = '$phone'";
        $result = mysqli_query($conn, $sql);    //执行sql语句,返回查询后的结果集
        $rows = mysqli_num_rows($result); //返回结果集中行的数量
        if ($rows > 0) {     
            $sql = "SELECT * FROM jr_user WHERE password = '$psw' AND phone = '$phone'";
            $result = mysqli_query($conn, $sql);
            $rows = mysqli_num_rows($result);
            if ($rows == 1) { //密码正确
                while($data = $result->fetch_assoc()) {
                    $arr['phone'] = $data['phone'];
                    $arr['uid'] = $data['uid'];
                }
                $json_arr = array(
                    'success' => 1,
                    "data"=>$arr
                );
            }
            else {  //密码错误
                $json_arr = array('success' => -2);
            }
        }
        else {
            $json_arr = array('success' => -1);//用户不存在
        }
        $login_json = json_encode($json_arr, TRUE); //转化为json数据
        echo $login_json;//发送json数据
    }
    
    
    


