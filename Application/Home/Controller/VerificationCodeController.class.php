<?php //验证帐号
namespace Home\Controller;
use Think\Controller;
class VerificationCodeController extends Controller {
	public function UserVerification(){
$post_data = array();
$post_data['userid'] = '企业ID';
$post_data['account'] = '用户帐号';
$post_data['password'] = '密码';
$url='http://客户端地址/sms.aspx?action=overage';
$o='';
foreach ($post_data as $k=>$v)
{
    $o.="$k=".urlencode($v).'&';
}
$post_data=substr($o,0,-1);
$ch = curl_init();
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //如果需要将结果直接返回到变量里，那加上这句。
$result = curl_exec($ch);
	}
}
?>