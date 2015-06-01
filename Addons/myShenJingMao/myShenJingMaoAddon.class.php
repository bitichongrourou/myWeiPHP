<?php

namespace Addons\myShenJingMao;
use Common\Controller\Addon;

/**
 * 神经猫插件
 * @author 无名
 */

    class myShenJingMaoAddon extends Addon{

        public $info = array(
            'name'=>'myShenJingMao',
            'title'=>'神经猫',
            'description'=>'自定义神经猫',
            'status'=>1,
            'author'=>'无名',
            'version'=>'0.1',
            'has_adminlist'=>1,
            'type'=>1         
        );

	public function install() {
		$install_sql = './Addons/myShenJingMao/install.sql';
		if (file_exists ( $install_sql )) {
			execute_sql_file ( $install_sql );
		}
		return true;
	}
	public function uninstall() {
		$uninstall_sql = './Addons/myShenJingMao/uninstall.sql';
		if (file_exists ( $uninstall_sql )) {
			execute_sql_file ( $uninstall_sql );
		}
		return true;
	}

        //实现的weixin钩子方法
        public function weixin($param){

        }

    }