<?php
namespace Home\Controller;
use Think\Controller;
class PasswordUpdateController extends Controller {
	public function PasswordUpdate(){
		$user_pwd=I('user_pwd');
		$user_newpwd=I('user_newpwd');
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
				
					if($user_pwd !=$data['user_password']){
						//密码错误
						$result['code']='400';
						$result['message']='密码错误';

					}else{
						//合法用户
						$result['code']='200';
						$result['message']='修改成功';
						
						// 要修改的数据对象属性赋值
						
						$data['user_password'] = $user_newpwd;
						$usert->where($condition)->save($data); // 根据条件保存修改的数据

						$result['data']['user_pwd']=$data['user_password'];
						$result['data']['user_moblie']=$data['user_moblie'];

					}

					
				

				

		}else{
			//数据库内部操作出现错误
			$result['code']='500';
			$result['message']='服务器内部错误';

			}
			
	echo json_encode($result);
	
	
	}

}
