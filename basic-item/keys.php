<?php
header("content-type:text/html;charset=utf-8");
$config = array(
    'config' => 'D:\phpStudy\Apache\conf\openssl.cnf',
    'private_keys_bits'=>1024
);
$res=openssl_pkey_new($config);
openssl_pkey_export_to_file($res,'./priv.txt',NULL,$config);
file_put_contents('./pub.txt',openssl_pkey_get_details($res)['key']);
//取出私钥
$priv_key=openssl_get_privatekey(file_get_contents("./priv.txt"));
//var_dump($priv_key);
//取出公钥
$pub_key=openssl_get_publickey(file_get_contents("./pub.txt"));
//var_dump($pub_key);
$data="王敏";
//加密
openssl_public_encrypt($data,$key,$pub_key);
var_dump(base64_encode($key));
//解密
openssl_private_decrypt($key,$keys,$priv_key);
var_dump($keys);
?>