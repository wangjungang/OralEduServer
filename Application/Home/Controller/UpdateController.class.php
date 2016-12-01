<?php
namespace Home\Controller;
use Think\Controller;
class UpdateController extends Controller {
	public function FilenameUpdate(){
		
		$user_moblie=I('user_moblie');
		$file_name=I('file_name');
		$file_newname=I('file_newname');
		$result=array(
			'code'=>'',
			'message'=>'',
			'data'=>'');
		//实例化
		$userp=M('oe_pic');
		
		$data=$userp->where("user_moblie={$user_moblie} AND file_name={$file_name}")->find();

		if($data !=false){
			//查询成功
						
			$result['code']='200';
						$result['message']='修改成功';
						
						// 要修改的数据对象属性赋值
						
						$data['file_name'] = $file_newname;

						$userp->where("user_moblie={$user_moblie} AND file_name={$file_name}")->save($data); // 根据条件保存修改的数据

						$result['data']['user_moblie']=$data['user_moblie'];
						$result['data']['file_name']=$data['file_name'];
		}else{
			//数据库内部操作出现错误
			$result['code']='500';
			$result['message']='服务器内部错误';
			}
	echo json_encode($result);	
	}
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
	public function UrlUpdate(){
		
		$user_moblie=I('user_moblie');
		$user_newurl=I('user_newurl');
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
						
						$data['user_url'] = $user_newurl;
						$usert->where($condition)->save($data); // 根据条件保存修改的数据

						$result['data']['user_url']=$data['user_url'];
						$result['data']['user_moblie']=$data['user_moblie'];
		}else{
			//数据库内部操作出现错误
			$result['code']='500';
			$result['message']='服务器内部错误';
			}
	echo json_encode($result);	
	}
	public function SignedUpdate(){
		
		$user_moblie=I('user_moblie');
		$user_newsigned=I('user_newsigned');
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
						
						$data['user_signed'] = $user_newsigned;
						$usert->where($condition)->save($data); // 根据条件保存修改的数据

						$result['data']['user_signed']=$data['user_signed'];
						$result['data']['user_moblie']=$data['user_moblie'];
		}else{
			//数据库内部操作出现错误
			$result['code']='500';
			$result['message']='服务器内部错误';
			}
	echo json_encode($result);	
	}
	public function GenderUpdate(){
		
		$user_moblie=I('user_moblie');
		$user_newgender=I('user_newgender');
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
						
						$data['user_gender'] = $user_newgender;
						$usert->where($condition)->save($data); // 根据条件保存修改的数据

						$result['data']['user_gender']=$data['user_gender'];
						$result['data']['user_moblie']=$data['user_moblie'];
		}else{
			//数据库内部操作出现错误
			$result['code']='500';
			$result['message']='服务器内部错误';
			}
	echo json_encode($result);	
	}
	public function AddressUpdate(){
		
		$user_moblie=I('user_moblie');
		$user_newaddress=I('user_newaddress');
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
						
						$data['user_address'] = $user_newaddress;
						$usert->where($condition)->save($data); // 根据条件保存修改的数据

						$result['data']['user_address']=$data['user_address'];
						$result['data']['user_moblie']=$data['user_moblie'];
		}else{
			//数据库内部操作出现错误
			$result['code']='500';
			$result['message']='服务器内部错误';
			}
	echo json_encode($result);	
	}
	public function IdentityUpdate(){
		
		$user_moblie=I('user_moblie');
		$user_newidentity=I('user_newidentity');
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
						
						$data['user_identity'] = $user_newidentity;
						$usert->where($condition)->save($data); // 根据条件保存修改的数据

						$result['data']['user_identity']=$data['user_identity'];
						$result['data']['user_moblie']=$data['user_moblie'];
		}else{
			//数据库内部操作出现错误
			$result['code']='500';
			$result['message']='服务器内部错误';
			}
	echo json_encode($result);	
	}
	public function IntroductionUpdate(){
		
		$user_moblie=I('user_moblie');
		$user_newintroduction=I('user_newintroduction');
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
						
						$data['user_introduction'] = $user_newintroduction;
						$usert->where($condition)->save($data); // 根据条件保存修改的数据

						$result['data']['user_introduction']=$data['user_introduction'];
						$result['data']['user_moblie']=$data['user_moblie'];
		}else{
			//数据库内部操作出现错误
			$result['code']='500';
			$result['message']='服务器内部错误';
			}
	echo json_encode($result);	
	}
	public function Feedback(){
		
		$user_moblie=I('user_moblie');
		$user_feedback=I('user_feedback');
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
						$result['message']='反馈成功';
						
						// 要修改的数据对象属性赋值
						
						$data['user_feedback'] = $user_feedback;
						$usert->where($condition)->save($data); // 根据条件保存修改的数据

						
		}else{
			//数据库内部操作出现错误
			$result['code']='500';
			$result['message']='服务器内部错误';
			}
	echo json_encode($result);	
	}
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
	public function MobileUpdate(){
		
		$user_moblie=I('user_moblie');
		$user_newmoblie=I('user_newmoblie');
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
					
						//合法用户
						$result['code']='200';
						$result['message']='修改成功';
						
						// 要修改的数据对象属性赋值
						
						$data['user_moblie'] = $user_newmoblie;
						$usert->where($condition)->save($data); // 根据条件保存修改的数据
						$result['data']['user_moblie']=$data['user_moblie'];
					
		}else{
			//数据库内部操作出现错误
			$result['code']='500';
			$result['message']='服务器内部错误';
			}	
	echo json_encode($result);	
	}

}
