<?php
function sock($url="",$post=array(),$username=false,$password=false)
{
    $query_build=http_build_query($post);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$query_build);
    //curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: multipart/form-data"));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
    if ($username) {
        curl_setopt($ch, CURLOPT_USERPWD, "{$username}:{$password}");
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    }
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec ($ch);
    curl_close ($ch);
    return $result;
}
/**
 * XML API Credentials
 */
$username   = 'admin';
$password   = '0b137ba9d17bdb6c0ea122be9540c5d052a5e7c6';
$url        = 'http://release.618.iem.maborak.net/xml.php';


$listid     = 34;
$emailaddress = 'some@some.com';
$params=array(
    'username'=>$username,
    'password'=>$password,
    'process'=>'subscriber_add',
    'params'=>array(
        'listid'=>$listid,
        'emailaddress'=>$emailaddress
    )
);
var_dump(sock($url,$params));
?>