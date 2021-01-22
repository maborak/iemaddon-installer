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
$username   = 'maborak';
$password   = '6ed30f81a62da53a27c0e9f299a63541e7d3a075';
$url        = 'http://release.618.iem.maborak.net/xml.php';

$params = array(
    'username'=>$username,
    'password'=>$password,
    'process' =>'version'
);
$result = sock($url,$params);
$data = ($result)?json_decode($result):array();
print_r($data);
$iem_version = $data->data->iem;
print_r($iem_version);