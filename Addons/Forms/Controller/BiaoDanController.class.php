<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2015/5/27
 * Time: 13:02
 */

namespace Addons\Forms\Controller;
use Addons\Forms\Controller\BaseController;

class BiaoDanController extends BaseController {
    var $model;
    var $forms_id;
    function _initialize() {
        parent::_initialize();

        $this->model = $this->getModel ( 'forms_zujian' );//待修改

        $param ['forms_id'] = $this->forms_id = intval ( $_REQUEST ['forms_id'] );
        $controller = strtolower (  _ACTION );

        $res ['title'] = '自定义表单';
        $res ['url'] = addons_url ( 'Forms://Forms/lists' );
        $res ['class'] = '';
        $nav [] = $res;

        $res ['title'] = '表单配置';
        $res ['url'] = addons_url ( 'Forms://BiaoDan/lists', $param );
        $res ['class'] = 'current';
        $nav [] = $res;
//        echo $this->forms_id;



        $this->assign ( 'nav', $nav );
    }


    public function lists(){
        $param ['forms_id'] = $this->forms_id;
        $param ['model'] = $this->model ['id'];


       $this->display();
    }
    public function getDataAndShow(){
        $forms_id=intval(I("forms_id"));
        echo $forms_id;

        $url=addons_url("Forms://BiaoDan/lists");
        $this->display($url);
    }
    public function dataPreview(){
        $forms_id=intval(I("forms_id"));
        echo $forms_id;

    }
    public function preview(){
        echo $this->forms_id;
        $this->display();

    }
//    public function getDataAndShow(){
//        echo $this->forms_id;
//
//    }
    public function show(){
        echo $this->forms_id;
        $this->display();

    }

}