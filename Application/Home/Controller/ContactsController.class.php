<?php
namespace Home\Controller;
use Think\Controller;
class ContactsController extends Controller {
	


	public function contactsAdd(){

		
		$user_moblie=I('user_moblie');
		$user_contacts=I('user_contacts');
		$result=array(
			'code'=>'',
			'message'=>'',
			'data'=>'');
		$usert=M('oe_contacts');
		//$condition['user_moblie']=$user_moblie;
		$data=$usert->where("user_moblie={$user_moblie} AND user_contacts={$user_contacts}")->find();
		
		if($data ==false){
				
					
						//数据库添加新用户
						$usert = M('oe_contacts');
        				$dataArr = array();
        				
        				$dataArr['user_moblie'] = $user_moblie;
        				$dataArr['user_contacts'] = $user_contacts;
        				$dataArr['last_time'] = '无';
        				


        				$usert->add($dataArr);
						$result['code']='300';
        				$result['data'] = $dataArr;					

		}else{
			//好友已存在
						$result['code']='200';
						$result['message']='好友已存在';

			}
			
	echo json_encode($result);

	}
	public function contactsDelete(){

		
		$user_moblie=I('user_moblie');
		$user_contacts=I('user_contacts');
		$result=array(
			'code'=>'',
			'message'=>'',
			'data'=>'');
		$usert=M('oe_contacts');
		
		$data=$usert->where("user_moblie={$user_moblie} AND user_contacts={$user_contacts}")->delete();
		
		if($data !=false){
				
					
						$result['code']='';
						$result['message']='删除成功';
										

		}else{
			//好友不存在
						$result['code']='';
						$result['message']='好友不存在';

			}
			
	echo json_encode($result);

	}
	
}



