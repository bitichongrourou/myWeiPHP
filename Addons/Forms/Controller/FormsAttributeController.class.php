<?php

namespace Addons\Forms\Controller;

use Addons\Forms\Controller\BaseController;

class FormsAttributeController extends BaseController{
	public  $model;
	public  $forms_id;

public	function _initialize() {
		parent::_initialize();
        $param ['forms_id'] = $this->forms_id = intval ( $_REQUEST ['forms_id'] );
		$this->model = $this->getModel ( 'forms_zujian' );

		$res ['title'] = '自定义表单';
		$res ['url'] = addons_url ( 'Forms://Forms/lists' );
		$res ['class'] = '';
		$nav [] = $res;
		
		$res ['title'] = '表单配置';
		$res ['url'] = addons_url ( 'Forms://FormsAttribute/lists', $param );
		$res ['class'] = 'current';
		$nav [] = $res;

		$this->assign ( 'nav', $nav );
	}
//  public function dataPreview(){
//
//
//      $pa[] =$_POST;
//      $param["forms_id"]=$pa[0]["forms_id"];
//      $this->success("提交成功",U('getDataAndShow',$param));
//      $data = $pa[0];
//      $_data;
//      $d_array = array();
//      foreach($data as $key=>$value){
//          $_data = $value;
//      }
//      foreach($_data as $key=>$value) {
//
//          foreach ($value as $_key => $_value) {
//              //获取forms_id
//              if ($_key == "f_id") {
//                  $param["forms_id"] = $_value;
//
//              }
//          }
//      }
//
//
//
//  }


	public function getDataAndShow(){




        if (!isAJAX) {
            halt('请求有误');
        }else{




            $pa[] =$_POST;							//获取post过来的数据
            $data = $pa[0]["records"];
            $param["forms_id"]=$pa[0]["forms_id"];
            $myData["forms_id"]=$param["forms_id"];



            //上传新提交表单前删除之前的
            $where["forms_id"]=$param["forms_id"];
            M("forms_zujian")->where($where)->delete();

            $_data;
            $d_array = array();
            foreach($data as $key=>$value){
                $_data = $value;
                foreach($_data as $_key=>$_value){
                    if($_key=="id"){

                        $myData["c_id"]=$_value;
                    }else if($_key=="name"){
                        $myData["c_name"]=$_value;
                    }else if($_key=="f_id"){
//                        $myData["forms_id"]=$_value;
//                        $param["forms_id"]=$_value;
                    }else if($_key=="detail"){
                        $myData["c_detail"]=$_value;
                    }else if($_key=="title"){
                        $myData["c_title"]=$_value;
                    }else{}

            }



//                foreach($value as $_key=>$_value){
//                    //循环获取组件数据
//                    if($_key=="id"){
//
//                        $myData["c_id"]=$_value;
//                    }else if($_key=="name"){
//                        $myData["c_name"]=$_value;
//                    }else if($_key=="f_id"){
////                        $myData["forms_id"]=$_value;
////                        $param["forms_id"]=$_value;
//                    }else if($_key=="detail"){
//                        $myData["c_detail"]=$_value;
//                    }else if($_key=="title"){
//                        $myData["c_title"]=$_value;
//                    }else{}
//                }
//                //上传数据库
                M("forms_zujian")->order("id")->add($myData);
            }

                //页面跳转
                $this->success("提交成功",U('show',$param));



		}
	}


    //表单
	public function show(){
       $param["forms_id"]=$this->forms_id;
        $where["forms_id"]=$param["forms_id"];
        $data_zujian=M("forms_zujian")->where($where)->order("id")->select();
        $json=json_encode($data_zujian);

        $this->assign("data_zujian",$json);

        $this->display();
    }

	// 通用插件的列表模型
	public function lists() {
		$param ['forms_id'] = $this->forms_id;
		$param ['model'] = $this->model ['id'];


		

        $this->display();
	}
	
	// 通用插件的编辑模型
	public function edit() {
//        echo $this->forms_id;
		$id = I ( 'id' );
		
		if (IS_POST) {
			$Model = D ( parse_name ( get_table_name ( $this->model ['id'] ), 1 ) );
			// 获取模型的字段信息
			$Model = $this->checkAttr ( $Model, $this->model ['id'] );
			if ($Model->create () && $Model->save ()) {
				$this->_saveKeyword ( $this->model, $id );
				
				$param ['forms_id'] = $this->forms_id;
				$param ['model'] = $this->model ['id'];
				$url = U ( 'lists', $param );
				$this->success ( '保存' . $this->model ['title'] . '成功！', $url );
			} else {
				$this->error ( $Model->getError () );
			}
		}
		
		parent::common_edit ( $this->model, $id );
	}
	
	// 通用插件的增加模型
	public function add() {
		if (IS_POST) {
			$Model = D ( parse_name ( get_table_name ( $this->model ['id'] ), 1 ) );
			// 获取模型的字段信息
			$Model = $this->checkAttr ( $Model, $this->model ['id'] );
			if ($Model->create () && $id = $Model->add ()) {
				$this->_saveKeyword ( $this->model, $id );
				
				$param ['forms_id'] = $this->forms_id;
				$param ['model'] = $this->model ['id'];
				$url = U ( 'lists', $param );
				$this->success ( '添加' . $this->model ['title'] . '成功！', $url );
			} else {
				$this->error ( $Model->getError () );
			}
			exit;
		}
		
		
		$normal_tips = '字段类型为单选、多选、下拉选择的参数格式第行一项，每项的值和标题用英文冒号分开。如：<br/>0:男<br/>1:女<br/>2:保密<br/>';
		$normal_tips .= '字段类型为级联的参数格式有两种：
				<br/>一是数据源从数据库取,如： type=db&table=common_category&module=shop_category 
				<br/>二是手工输入，如： type=text&data=[广西[南宁,桂林], 广东[广州, 深圳[福田区, 龙岗区, 宝安区]]]';
		$this->assign ( 'normal_tips', $normal_tips );
		
		parent::common_add ( $this->model );
	}
	
	// 通用插件的删除模型
	public function del() {
		parent::common_del ( $this->model );
	}
}
