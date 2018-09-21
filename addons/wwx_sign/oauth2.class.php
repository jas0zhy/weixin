<?php
class Oauth2
{
    public static $SCOPE_BASE = "snsapi_base";
    public static $SCOPE_USERINFO = "snsapi_userinfo";
    private $appid = "";
    private $secret = "";
    function __construct($appid, $secret)
    {
        $this->appid = $appid;
        $this->secret = $secret;
    }

    public function authorization_code($redirect_uri, $scope, $state)
    {
        $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . $this->appid . "&redirect_uri=" . urlencode($redirect_uri) . "&response_type=code&scope=" . $scope . "&state=" . $state . "#wechat_redirect";
        header("location: $url");
    }

    public function  getOauthAccessToke($code)
    {
        $oauth2_code = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . $this->appid . "&secret=" . $this->secret . "&code=" . $code . "&grant_type=authorization_code";
        $content = ihttp_get($oauth2_code);
        $token = @json_decode($content['content'], true);

        if (empty($token) || !is_array($token) || empty($token['access_token']) || empty($token['openid'])) {
            echo '<h1>获取微信公众号授权' . $code . '失败[无法取得token以及openid], 请稍后重试！ 公众平台返回原始数据为: <br />' . $content['meta'] . '<h1>';
            exit();
        }
        return $token;
    }





/**
* 获取用户信息
*/
    public function getOauthUserInfo($openid, $accessToken)
    {
        $tokenUrl = "https://api.weixin.qq.com/sns/userinfo?access_token=" . $accessToken . "&openid=" . $openid . "&lang=zh_CN";
        $content = ihttp_get($tokenUrl);
        $userInfo = @json_decode($content['content'], true);
        return $userInfo;
    }


    public function  getUserInfo($access_token, $openid)
    {
        $api_url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=" . $access_token . "&openid=" . $openid . "&lang=zh_CN";
        $content = ihttp_get($api_url);
        $userInfo = @json_decode($content['content'], true);
        return $userInfo;
    }
}