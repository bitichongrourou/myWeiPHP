<?php

namespace Addons\Forms\Controller;

use Home\Controller\AddonsController;

class FormsController extends AddonsController {

    //表单配置
    function my_biaodan(){
        $param ['forms_id'] = I ( 'id', 0, 'intval' );
        $url = addons_url ( 'Forms://BiaoDan/lists', $param );
        // dump($url);
        redirect ( $url );

    }
	function forms_attribute() {
//        $param['forms_id']=I()
		$param ['forms_id'] = I ( 'id', 0, 'intval' );
		$url = addons_url ( 'Forms://FormsAttribute/lists', $param );
		// dump($url);
		redirect ( $url );
	}

    //报名管理
	function forms_value() {
		$param ['forms_id'] = I ( 'id', 0, 'intval' );
		$url = addons_url ( 'Forms://FormsValue/lists', $param );
		// dump($url);
		redirect ( $url );
	}
	function forms_export() {
	}

    //预览
	function preview() {
		$param ['forms_id'] = I ( 'id', 0, 'intval' );
		$url = addons_url ( 'Forms://FormsAttribute/show', $param );
		// dump($url);
		redirect ( $url );
	}

    //中奖管理
    function zhongjiang() {
        $param ['forms_id'] = I ( 'id', 0, 'intval' );
        $url = addons_url ( 'Forms://ZhongJiang/lists', $param );
        // dump($url);
        redirect ( $url );
    }

    //复制链接
    function copy_url() {             //待修改
        $param ['forms_id'] = I ( 'id', 0, 'intval' );
        $url = addons_url ( 'Forms://FormsCopyUrl/copy_url', $param );


//        $this->assign ( 'url', $url );
//        $this->display();

        //待开发;
        // dump($url);
        redirect ( $url );
    }





}
