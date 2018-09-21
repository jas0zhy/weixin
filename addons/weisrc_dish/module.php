<?php
/**
 * 淘宝搜索 @百川信科
 *
 * 作者:Caesar
 *
 * qq : 1039012648
 */
defined('IN_IA') or exit('Access Denied');

class weisrc_dishModule extends WeModule
{
    public $name = 'weisrc_dishModule';

    public function fieldsFormDisplay($rid = 0)
    {
        global $_W;
    }

    public function fieldsFormSubmit($rid = 0)
    {
        global $_GPC, $_W;
    }
}