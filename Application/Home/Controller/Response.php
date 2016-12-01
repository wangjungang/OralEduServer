<?php

class Response{
  /**
*按json方式去封装通信方法
*@param integer $code 状态码
*@param string $message 提示信息
*@param array $data 数据
*return string
*/
public static function json($code,$message='',$data=array()){
  if (!is_numeric($code)) {
    return'';
  }
  $result=array(
'code'=>$code,
'message'=>$message,
'data'=>$data

    );
  echo json_encode($result);
  exit;
  }

}


class appUserSigninController extends Controller {
    public function index(){
        
       echo "Welcome To OralEduServer!
       11
       1";
    }



    public function addAUser(){

        
        $user_id = I('user_id');//i函数 获取手机端传入的参数
        $user_name = I('user_name');
        $user_age = I('user_age');

        $result = array(
           
           'code' => '',
           'message'   => '',
           'data'  => array()
               
        	);
      

        $mk_user_info = M('mk_user_info');

        $dataArr = array();

        $dataArr['user_id'] = $user_id;
        $dataArr['user_name'] = $user_name;
        $dataArr['user_age'] = $user_age;

        $mk_user_info->add($dataArr);

        $result['data'] = $dataArr;

 
        echo json_encode($result,JSON_UNESCAPED_UNICODE);



      
      

    }
}

?>