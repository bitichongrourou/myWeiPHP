<?php

namespace Addons\Forms;
use Common\Controller\Addon;

/**
 * 表单插件
 * @author
 */

    class FormsAddon extends Addon{

        public $info = array(
            'name'=>'Forms',
            'title'=>'自定义表单',
            'description'=>'快捷自由的表单生成与创建，获取用户信息参与活动促销，提高用户粘性',
            'status'=>1,
            'author'=>'廖远贵 王春涛',
            'version'=>'0.1',
            'has_adminlist'=>1,
            'type'=>1         
        );

	public function install() {
		$install_sql = './Addons/Forms/install.sql';
		if (file_exists ( $install_sql )) {
			execute_sql_file ( $install_sql );
		}
		return true;
	}
	public function uninstall() {
		$uninstall_sql = './Addons/Forms/uninstall.sql';
		if (file_exists ( $uninstall_sql )) {
			execute_sql_file ( $uninstall_sql );
		}
		return true;
	}

        //实现的weixin钩子方法
        public function weixin($param){

        }

    }