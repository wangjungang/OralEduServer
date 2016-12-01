<?php
namespace Home\Controller;
use Think\Controller;
class FollowController extends Controller {
	


	public function followAdd(){

		
		$user_moblie=I('user_moblie');
		$follow_mobile=I('follow_mobile');
		$result=array(
			'code'=>'',
			'message'=>'',
			'data'=>'');
		$usert=M('oe_follow');
		//$condition['user_moblie']=$user_moblie;
		$data=$usert->where("user_moblie={$user_moblie} AND follow_mobile={$follow_mobile}")->find();
		
		if($data ==false){
				
					
						//数据库添加新用户
						$usert = M('oe_follow');
        				$dataArr = array();
        				
        				$dataArr['user_moblie'] = $user_moblie;
        				$dataArr['follow_mobile'] = $follow_mobile;
        				
        				$result['code']='400';
						$result['message']='添加成功';

        				$usert->add($dataArr);

        				$result['data'] = $dataArr;					

		}else{
			//好友已存在
						$result['code']='200';
						$result['message']='好友已存在';
					
			}
			
	echo json_encode($result);

	}
	
}



