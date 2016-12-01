<?php
$groupId = $_POST["groupId"];
$groupName = $_POST["groupName"];
$groupName = str_replace("\\", "", $groupName);
$groupName = trimall($groupName);
//echo $groupName;
$groupName = rawurlencode($groupName);
$options = array(
    'client_id' => ' ', //�����Ϣ
    'client_secret' => ' ', //�����Ϣ
    'org_name' => ' ', //�����Ϣ
    'app_name' => ' ', //�����Ϣ
    );
$e = new Easemob($options);

$groupInfo = array(
    'groupname' => $groupName,
    'description' => ' ',
    'maxusers' => 200);


$result = $e->updateGroup($groupId, $groupInfo);
//$result = $e->getUserGroups('11223354');
// $result = $e->getGroupList();
// $result = $e->getGroupDetial("1423734662380237");

//print_r($result);
$aa = array();
$aa = $result["data"];
//print_r($aa);
$ok = $aa["groupname"];
if ($ok == 1) {
    $array = array('code' => 1);
    echo json_encode($array);

} else {

    $array = array('code' => 0);
    echo json_encode($array);

}

function trimall($str) //ɾ���ո�
{
    $qian = array(
        " ",
        "��",
        "\t",
        "\n",
        "\r");
    $hou = array(
        "",
        "",
        "",
        "",
        "");
    return str_replace($qian, $hou, $str);
}

/*
* --------------ǿ��˵��-------------
* ���� ����int ����� String ��groupId 1423734662380237 ,����ʱ��getGroupDetial("1423734662380237");
*/
class Easemob
{


    private $host = 'https://a1.easemob.com';
    private $client_id;
    private $client_secret;
    private $org_name;
    private $app_name;
    private $token = '';
    /*
    * ------------------------
    * ��������             ��ʼ
    * ------------------------
    */
    /**
     * ��ʼ������
     *
     * @param array $options   
     * @param $options['client_id']     
     * @param $options['client_secret'] 
     * @param $options['org_name']      
     * @param $options['app_name']       
     */
    public function __construct($options)
    {
        $this->client_id = $options['client_id'];
        $this->client_secret = $options['client_secret'];
        $this->org_name = $options['org_name'];
        $this->app_name = $options['app_name'];
    }
    private function request($api_name, $data, $method = 'POST')
    {
        //$data = array("name" => "Hagrid", "age" => "36");
        if (isset($data)) {
            $data_string = json_encode($data);
        }
        $ch = curl_init($this->host . "/$this->org_name/$this->app_name/" . $api_name);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        if (strtoupper($method) != 'GET') {

            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        }
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // ����֤֤����Դ�ļ��
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // ��֤���м��SSL�����㷨�Ƿ����
        curl_setopt($ch, CURLOPT_USERAGENT,
            'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0)'); // ģ���û�ʹ�õ������

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
                //'Accept: application/json',
                'Authorization: Bearer ' . $this->getToken()
                // 'Content-Length: ' . strlen($data_string)
                ));
        $result = curl_exec($ch);
        $result = json_decode($result, true);
        curl_close($ch);
        return $result;
    }

    /*
    * ȡ��TOKEN
    */
    public function getToken($reGet = false)
    {
        if (!$this->token || $reGet == true) {
            $path = "/$this->org_name/$this->app_name/token";
            $data = array(
                'grant_type' => 'client_credentials',
                'client_id' => $this->client_id,
                'client_secret' => $this->client_secret);
            $data_string = json_encode($data);

            $ch = curl_init($this->host . $path);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // ����֤֤����Դ�ļ��
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // ��֤���м��SSL�����㷨�Ƿ����
            curl_setopt($ch, CURLOPT_USERAGENT,
                'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0)'); // ģ���û�ʹ�õ������
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            $result = curl_exec($ch);
            $result_arr = json_decode($result, true);
            if (isset($result_arr['error'])) {
                echo $result;
                exit;
            } else {
                $this->token = $result_arr['access_token'];
            }
            return $this->token;
        } else {
            return $this->token;
        }
    }
    /*
    * ------------------------
    * ��������             ����
    * ------------------------
    */

    /*
    * ------------------------------------
    * Ⱥ�鷽��             ��ʼ
    * ------------------------------------
    */
    /*
    * ��ȡapp�����е�Ⱥ��
    */
    public function getGroupList()
    {
        $result = $this->request('chatgroups', '', 'GET');
        return $result;
    }
    /*
    * ��ȡһ�����߶��Ⱥ�������
    * $groupList mix  String or Array  
    *  demo: $groupList = array('1423734662380237', '1423734662380238)
    */
    public function getGroupDetial($groupList)
    {

        if (gettype($groupList) == 'array') {
            $group_list = implode(',', $groupList);
        } else {
            $group_list = $groupList;
        }

        $result = $this->request('chatgroups' . '/' . $group_list, '', 'GET');
        return $result;
    }
    /*
    * 
    * $groupInfo Array Ⱥ��Ϣ��������;
    "groupname":"testrestgrp12", //Ⱥ������, ������Ϊ�����
    "desc":"server create group", //Ⱥ������, ������Ϊ�����
    "public":true, //�Ƿ��ǹ���Ⱥ, ������Ϊ�����
    "maxusers":300, //Ⱥ���Ա�����(����Ⱥ��), ֵΪ��ֵ����,Ĭ��ֵ200,������Ϊ��ѡ��
    "approval":true, //���빫��Ⱥ�Ƿ���Ҫ��׼, û��������ԵĻ�Ĭ����true������ҪȺ����׼��ֱ�Ӽ��룩, ������Ϊ��ѡ��
    "owner":"jma1", //Ⱥ��Ĺ���Ա, ������Ϊ�����
    "members":["jma2","jma3"] //Ⱥ���Ա,������Ϊ��ѡ��,����������˴���,����Ԫ������һ����ע��Ⱥ��jma1����Ҫд�뵽members���棩
    * demo:
    * $groupInfo = array(
    'groupname' => 'leee',
    'desc'       => 'leeff',
    'owner' => 'sy1'
    );
    */
    public function createGroup($groupInfo)
    {
        $groupInfo['public'] = isset($groupInfo['public']) ? $groupInfo['public'] : true; //Ĭ�Ϲ���
        $groupInfo['approval'] = isset($groupInfo['approval']) ? $groupInfo['maxusers'] : false; //Ĭ����Ҫ���

        $result = $this->request('chatgroups', $groupInfo, 'POST');
        return $result;
    }

    /*
    * ����Ⱥ����Ϣ
    * @param $groupId int Ⱥ��id  ����
    * $param $groupInfo array Ⱥ����Ϣ ����
    * ����˵����
    * $groupInfo = array( "groupname":"testrestgrp12", //Ⱥ������ ��ѡ
    "description":"update groupinfo", //Ⱥ������ ��ѡ
    "maxusers":300, //Ⱥ���Ա�����(����Ⱥ��), ֵΪ��ֵ���� ��ѡ
    )
    */

    public function updateGroup($groupId, $groupInfo = array())
    {
        $result = $this->request('chatgroups' . '/' . $groupId, $groupInfo, 'PUT');
        return $result;
    }
    /*
    * Ⱥ��ɾ��
    * @param $groupId ���� Ⱥ��ID Stirng
    */
    public function deleteGroup($groupId)
    {
        $result = $this->request('chatgroups' . '/' . $groupId, '', 'DELETE');
        return $result;
    }
    /*
    * ��ȡȺ���û�
    * @param $groupId ���� Ⱥ��ID Stirng
    */
    public function getGroupUsers($groupId)
    {
        $result = $this->request('chatgroups' . '/' . $groupId . '/users', '', 'GET');
        return $result;
    }
    /*
    * Ⱥ����������
    * @param $groupId ���� Ⱥ��ID Stirng
    * @param $users ����    �û���  mix(String,array)
    */
    public function addGroupUsers($groupId, $users)
    {
        if (gettype($users) != 'array') {
            $users[] = $users;
        }
        $data['usernames'] = $users;
        $result = $this->request('chatgroups' . '/' . $groupId . '/users', $data, 'POST');
        return $result;
    }

    /*
    * Ⱥ����ˣ���Ⱥ���Ƴ�ĳ����Ա��
    * @param $groupId Ⱥ��id ���� String
    * @param $user �û��� ���� String
    */
    public function deleteGroupUser($groupId, $user)
    {
        $result = $this->request('chatgroups' . '/' . $groupId . '/users/' . $user, '',
            'DELETE');
        return $result;
    }
    /*
    * ��ȡһ���û����������Ⱥ��
    * $user String �û��� ����
    */
    public function getUserGroups($user)
    {
        $result = $this->request('users/' . $user . '/joined_chatgroups', '', 'GET');
        return $result;
    }
    /*
    * ------------------------------------
    * Ⱥ�鷽��             ����
    * ------------------------------------
    */

}
