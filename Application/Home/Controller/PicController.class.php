<?php
namespace Home\Controller;
use Think\Controller;
class PicController extends Controller {

	public function PicAdd(){
	
		$user_moblie=I('user_moblie');
		$file_name=I('file_name');
		$picture_url=I('picture_url');		
		$result=array(
			'code'=>'',
			'message'=>'',
			'data'=>'');
		$usert=M('oe_user');
		$condition['user_moblie']=$user_moblie;
		$data=$usert->where($condition)->find();
		if($data !=false){					
						//数据库添加新图片
						$usert = M('oe_pic');
        				$dataArr = array();
        				$dataArr['picture_url'] = $picture_url;
        				$dataArr['user_moblie'] = $user_moblie;
        				$dataArr['file_name'] = $file_name;
        				$usert->add($dataArr);
        				$result['data'] = $dataArr;					

		}else{
			//数据库内部操作出现错误
			$result['code']='500';
			$result['message']='服务器内部错误';

			}
			
	echo json_encode($result);

	}


	public function PicSearch(){

		
		$user_moblie=I('user_moblie');
		
		
		$result=array(
			'code'=>'',
			'message'=>'',
			'data'=>'');
		$usert=M('oe_pic');
		$condition['user_moblie']=$user_moblie;


		$data=$usert->where($condition)->field('file_name')->distinct(true)->select();

		

		if($data !=false){

				for ($i=0; $i < count($data); $i++) { 
					$need_arr[$i]=$data[$i]['file_name'];
				}
				$result['data']=$need_arr;
        				// $result['data'] = $data;					

		}else{
			//数据库内部操作出现错误
			$result['code']='500';
			$result['message']='服务器内部错误';

			}
			// var_dump($need_arr);
	echo json_encode($result);

	}


	public function FileSearch(){

		
		$user_moblie=I('user_moblie');
		$file_name=I('file_name');
		
		$result=array(
			'code'=>'',
			'message'=>'',
			'data'=>'');
		$usert=M('oe_pic');
		$condition['user_moblie']=$user_moblie;
		$condition['file_name']=$file_name;

		$data=$usert->where($condition)->field('picture_url')->distinct(true)->select();

		

		if($data !=false){
				for ($i=0; $i < count($data); $i++) { 
					$need_arr[$i]=$data[$i]['picture_url'];
				}
				$result['data']=$need_arr;
        								

		}else{
			//数据库内部操作出现错误
			$result['code']='500';
			$result['message']='服务器内部错误';

			}
			
	echo json_encode($result);

	}

	public function FileDelete(){

		
		$user_moblie=I('user_moblie');
		$file_name=I('file_name');
		
		$result=array(
			'code'=>'',
			'message'=>'',
			'data'=>'');
		$usert=M('oe_pic');
		$condition['user_moblie']=$user_moblie;
		$condition['file_name']=$file_name;

		$data=$usert->where($condition)->delete();

		

		if($data !=false){

        				$result['data'] = 'SUCCESS';					

		}else{
			//数据库内部操作出现错误
			$result['code']='500';
			$result['message']='服务器内部错误';

			}
			
	echo json_encode($result);

	}


	public function PicDelete(){

		
		$picture_url=I('picture_url');
		
		
		$result=array(
			'code'=>'',
			'message'=>'',
			'data'=>'');
		$usert=M('oe_pic');
		$condition['picture_url']=$picture_url;
		

		$data=$usert->where($condition)->delete();

		

		if($data !=false){

        				$result['data'] = 'SUCCESS';					

		}else{
			//数据库内部操作出现错误
			$result['code']='500';
			$result['message']='服务器内部错误';

			}
			
	echo json_encode($result);

	}
	public function PicAllDelete(){

		
		$user_moblie=I('user_moblie');
		
		
		$result=array(
			'code'=>'',
			'message'=>'',
			'data'=>'');
		$usert=M('oe_pic');
		$condition['user_moblie']=$user_moblie;
		

		$data=$usert->where($condition)->delete();

		

		if($data !=false){

        	$result['data'] = 'SUCCESS';					

		}else{
			//数据库内部操作出现错误
			$result['code']='500';
			$result['message']='服务器内部错误';

			}
			
	echo json_encode($result);

	}
}



