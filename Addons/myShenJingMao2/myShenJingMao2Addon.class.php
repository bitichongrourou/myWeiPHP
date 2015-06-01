<?php

namespace Addons\myShenJingMao2;
use Common\Controller\Addon;

/**
 * 神经猫插件
 * @author 王春涛
 */

    class myShenJingMao2Addon extends Addon{

        public $info = array(
            'name'=>'myShenJingMao2',
            'title'=>'神经猫',
            'description'=>'我的神经猫HTML5游戏',
            'status'=>1,
            'author'=>'王春涛',
            'version'=>'0.1',
            'has_adminlist'=>1,
            'type'=>1         
        );

	public function install() {
		$install_sql = './Addons/myShenJingMao2/install.sql';
		if (file_exists ( $install_sql )) {
			execute_sql_file ( $install_sql );
		}
		return true;
	}
	public function uninstall() {
		$uninstall_sql = './Addons/myShenJingMao2/uninstall.sql';
		if (file_exists ( $uninstall_sql )) {
			execute_sql_file ( $uninstall_sql );
		}
		return true;
	}

        //实现的weixin钩子方法
        public function weixin($param){

        }

    }