<?php
namespace Home\Controller;
use Think\Controller;
class NicknameUpdateController extends Controller {
	public function NicknameUpdate(){
		
		$user_moblie=I('user_moblie');
		$user_newnickname=I('user_newnickname');
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
						$result['message']='修改成功';
						
						// 要修改的数据对象属性赋值
						
						$data['user_nickname'] = $user_newnickname;
						$usert->where($condition)->save($data); // 根据条件保存修改的数据

						$result['data']['user_nickname']=$data['user_nickname'];
						$result['data']['user_moblie']=$data['user_moblie'];

					

					
				

				

		}else{
			//数据库内部操作出现错误
			$result['code']='500';
			$result['message']='服务器内部错误';

			}
			
	echo json_encode($result);
	
	
	}

}
