<?php

$APPID="wxcd79416fde69d146";
$APPSECRET="9e70d0e9efdcf88290482a05159583da";

$TOKEN_URL="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$APPID."&secret=".$APPSECRET;

$json=file_get_contents($TOKEN_URL);
$result=json_decode($json,true);
print_r($result);

?>