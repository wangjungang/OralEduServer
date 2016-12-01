<?php
namespace Home\Controller;
use Think\Controller;
class ContactController extends Controller {
	public function UserContact(){
		
		$user_moblie=I('user_moblie');
		$result=array(
			'code'=>'',
			'message'=>'',
			'data'=>'');
		//实例化
		$usert=M('oe_contacts');
		$condition['user_moblie']=$user_moblie;			
		$data=$usert->where($condition)->select();

		
		if($data !=false){
			//查询成功
					


						for($i=0;$i<count($data);$i++){

							$result['data'][$i]['user_moblie']=$data[$i]['user_contacts'];
							$result['data'][$i]['last_time']=$data[$i]['last_time'];
							$useru=M('oe_user');
							$conditionu['user_moblie']=$result['data'][$i]['user_moblie'];
							$datau=$useru->where($conditionu)->find();
							$result['data'][$i]['user_nickname']=$datau['user_nickname'];
							$result['data'][$i]['user_url']=$datau['user_url'];
							$result['data'][$i]['user_introduction']=$datau['user_introduction'];
							

						}



						$result['code']='200';
						$result['message']='查询成功';
						
						
						
						

		}else{
			//数据库内部操作出现错误
			$result['code']='500';
			$result['message']='服务器内部错误';

			}
			
	echo json_encode($result);
	
	
	}

}

	