<?php
namespace Home\Controller;
use Think\Controller;
class SearchController extends Controller {
	public function UserSearch(){
		
		$user_nickname=I('user_nickname');
		$result=array(
			'code'=>'',
			'message'=>'',
			'data'=>'');
		//实例化
		$usert=M('oe_user');
		$wher['user_nickname']= array('like',"%{$user_nickname}%");				
		$data=$usert->where($wher)->select();

		
		if($data !=false){
			//查询成功
					if($data !=null){


						for($i=0;$i<count($data);$i++){

							$result['data'][$i]['url']=$data[$i]['user_url'];
							$result['data'][$i]['user_nickname']=$data[$i]['user_nickname'];
							$result['data'][$i]['user_identity']=$data[$i]['user_identity'];
							$result['data'][$i]['user_introduction']=$data[$i]['user_introduction'];
							$result['data'][$i]['user_moblie']=$data[$i]['user_moblie'];
						}	



						$result['code']='200';
						$result['message']='查询成功';
						
						
						
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

}

	