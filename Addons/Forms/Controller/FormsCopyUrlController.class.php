<?php

namespace Addons\Forms\Controller;

use Addons\Forms\Controller\BaseController;

class FormsCopyUrlController extends BaseController
{

    var $forms_id;

    function _initialize()
    {
        parent::_initialize();


        $param ['forms_id'] = $this->forms_id = intval($_REQUEST ['forms_id']);

        $res ['title'] = '自定义表单';
        $res ['url'] = addons_url('Forms://Forms/lists');
        $res ['class'] = '';
        $nav [] = $res;

        $res ['title'] = '复制链接';
        $res ['url'] = addons_url('Forms://FormsCopyUrl/copy_url', $param);
        $res ['class'] = 'current';
        $nav [] = $res;

        $this->assign('nav', $nav);
    }

    // 通用插件的列表模型
    public function copy_url()
    {
        $param ['forms_id'] = $this->forms_id;
        $url=addons_url("Forms://FormsAttribute/show",$param);
        $this->assign("url",$url);


       $this->display();
    }

}
