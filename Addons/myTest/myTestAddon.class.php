<?php

namespace Addons\myTest;
use Common\Controller\Addon;

/**
 * 上传图片插件
 * @author 王春涛
 */

    class myTestAddon extends Addon{

        public $info = array(
            'name'=>'myTest',
            'title'=>'上传图片',
            'description'=>'用户上传图片到服务器',
            'status'=>1,
            'author'=>'王春涛',
            'version'=>'0.1',
            'has_adminlist'=>1,
            'type'=>1         
        );

	public function install() {
		$install_sql = './Addons/myTest/install.sql';
		if (file_exists ( $install_sql )) {
			execute_sql_file ( $install_sql );
		}
		return true;
	}
	public function uninstall() {
		$uninstall_sql = './Addons/myTest/uninstall.sql';
		if (file_exists ( $uninstall_sql )) {
			execute_sql_file ( $uninstall_sql );
		}
		return true;
	}

        //实现的weixin钩子方法
        public function weixin($param){

        }

    }