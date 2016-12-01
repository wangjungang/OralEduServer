<?php
namespace Home\Controller;
use Think\Controller;
class NewUserController extends Controller {
	public function NewUser(){
		
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
						
						$data['user_url'] ='http://ww1.sinaimg.cn/crop.0.0.1080.1080.1024/696439b4jw8eezwcm2vdwj20u00u0myu.jpg';
						$data['user_nickname'] =$data['user_moblie'];
						$usert->where($condition)->save($data);
						$result['data']['user_url']='http://ww1.sinaimg.cn/crop.0.0.1080.1080.1024/696439b4jw8eezwcm2vdwj20u00u0myu.jpg';
						$result['data']['user_nickname']=$data['user_moblie'];
						

		}else{
			//数据库内部操作出现错误
			$result['code']='500';
			$result['message']='服务器内部错误';

			}
			
	echo json_encode($result);
	
	
	}

}

	