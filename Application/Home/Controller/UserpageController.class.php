<?php
namespace Home\Controller;
use Think\Controller;
class UserpageController extends Controller {
	public function UserpageShow(){
		
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
					
						$result['code']='200';
						$result['message']='查询成功';
						$result['data']['url']=$data['user_url'];
						$result['data']['user_nickname']=$data['user_nickname'];
						$result['data']['user_signed']=$data['user_signed'];
						$result['data']['user_gender']=$data['user_gender'];
						$result['data']['user_address']=$data['user_address'];
						$result['data']['user_identity']=$data['user_identity'];
						$result['data']['user_introduction']=$data['user_introduction'];

		}else{
			//数据库内部操作出现错误
			$result['code']='500';
			$result['message']='服务器内部错误';

			}
			
	echo json_encode($result);
	
	
	}

}

	