<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
	public function UserLogin(){
		$user_pwd=I('user_pwd');
		$user_moblie=I('user_moblie');
		$result=array(
			'code'=>'',
			'message'=>'',
			'data'=>'');
		//实例化
		$usert=M('oe_user');
		$condition['user_moblie']=$user_moblie;
		$data=$usert->where($condition)->find();
		if($data !=false){
			//查询成功
				if($data !=null){
					//用户存在
					if($user_pwd !=$data['user_password']){
						//密码错误
						$result['code']='400';
						$result['message']='密码错误';

					}else{
						//合法用户
						$result['code']='200';
						$result['message']='登录成功';
						$result['data']['user_pwd']=$data['user_password'];
						$result['data']['user_moblie']=$data['user_moblie'];

					}

					
				}else{
					//用户不存在
					$result['code']='404';
					$result['message']='用户不存在';

				}

		}else{
			//数据库内部操作出现错误
			$result['code']='500';
			$result['message']='服务器内部错误';

			}
			
	echo json_encode($result);
	
	
	}




	public function UserSignup(){

		$user_pwd=I('user_pwd');
		$user_moblie=I('user_moblie');
		
		$result=array(
			'code'=>'',
			'message'=>'',
			'data'=>'');
		$usert=M('oe_user');
		$condition['user_moblie']=$user_moblie;
		$data=$usert->where($condition)->find();
		var_dump($data);
		if($data ==false){
				
					
						//数据库添加新用户
						$usert = M('oe_user');
        				$dataArr = array();
        				$user_id=create_guid();
        				$dataArr['user_id'] = $user_id;
        				$dataArr['user_moblie'] = $user_moblie;
        				$dataArr['user_password'] = $user_pwd;
        				$dataArr['user_url'] ='http://ww1.sinaimg.cn/crop.0.0.1080.1080.1024/696439b4jw8eezwcm2vdwj20u00u0myu.jpg';
        				$dataArr['user_nickname'] =$user_moblie;
        				$dataArr['user_gender'] ='男';
        				$dataArr['user_address'] ='中国';
        				$dataArr['user_identity'] ='无';
	        			$dataArr['user_introduction'] ='无';

        				$dataArr['user_signed'] ='无';

        				$usert->add($dataArr);

        				$result['data'] = $dataArr;					

		}else{
			//用户存在
						$result['code']='';
						$result['message']='此手机已被注册';

			}
			
	echo json_encode($result);

	}
	
}



function create_guid(){
	if (function_exists('com_create_guid')){
		return com_create_guid();
	}else{
		mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
		$charid = strtoupper(md5(uniqid(rand(), true)));
		$hyphen = chr(45);// "-"
		$uuid = chr(123)// "{"
		.substr($charid, 0, 8).$hyphen
		.substr($charid, 8, 4).$hyphen
		.substr($charid,12, 4).$hyphen
		.substr($charid,16, 4).$hyphen
		.substr($charid,20,12)
		.chr(125);// "}"
		return $uuid;
	}
}