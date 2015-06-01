<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2015/5/15
 * Time: 17:32
 */
namespace Addons\Forms\Controller;

use Addons\Forms\Controller\BaseController;
class ZhongJiangController extends BaseController {
    var $model;
    var $forms_id;
    function _initialize() {
        parent::_initialize();

        $this->model = $this->getModel ( 'forms_zhongjiang' );//待修改

        $param ['forms_id'] = $this->forms_id = intval ( $_REQUEST ['forms_id'] );
        $controller = strtolower (  _ACTION );

        $res ['title'] = '自定义表单';
        $res ['url'] = addons_url ( 'Forms://Forms/lists' );
        $res ['class'] = '';
        $nav [] = $res;

        $res ['title'] = '中奖名单';
        $res ['url'] = addons_url ( 'Forms://ZhongJiang/lists', $param );
        $res ['class'] = $controller == 'lists' ? 'current' : '';
        $nav [] = $res;

        $res ['title'] = '派奖规则';
        $res ['url'] = addons_url ( 'Forms://ZhongJiang/rule', $param );
        $res ['class'] = $controller == 'rule' ? 'current' : '';
        $nav [] = $res;



        $this->assign ( 'nav', $nav );
    }
    public function lists(){
        $param ['forms_id'] = $this->forms_id;
        $param ['model'] = $this->model ['zhongjiang_id'];
        $add_url = U ( 'add', $param );
        $this->assign ( 'add_url', $add_url );

        parent::common_lists ( $this->model, 0, '', 'zhongjiang_id asc' );

    // $this->display ();
    }

    //补发优惠券
    function bufa() {             //待修改
        $param ['forms_id'] = I ( 'id', 0, 'intval' );
        $param['open_id']=I("openid");
        $param["quan"]=I("quan");
        $param["state"]=I("state");
        //补发优惠券操作

//
    }



    public function rule(){

        $myData["forms_id"]=$this->forms_id;
        echo $this->forms_id;




        if(IS_GET){
            //标题,派券类型的获取
            $title=I("title");
            $type=I("rule_radio");
            $row=I("row");

            //排名派券数据获取
            $award_pai=I("award_pai");
            $from=I("from");
            $end=I("end");

            //抽奖派券数据获取
            $award_chou=I("award_chou");
            $people_num=I("people_num");
            $award_num=I("award_num");

            //失败！！！！

            if($type=="排名派券"){
                if($award_pai!=null&&$from!=null&&$end!=null&&$award_pai!=0&&$from!=0&&$end!=0){
                    $data_pai[$row-1]["title"]=$title;
                    $data_pai[$row-1]["award"]=$award_pai;
                    $data_pai[$row-1]["from"]=$from;
                    $data_pai[$row-1]["end"]=$end;
                    $data_pai[$row-1]["award_img"]="暂未上传";

                }

                //失败！！！！！

            }elseif($type=="抽奖派券"){
                if($award_chou!=null&&$people_num!=null&&$award_num!=null&&$award_chou!=0&&$people_num!=0&&$award_num!=0){
                    $data_chou[$row-1]["title"]=$title;
                    $data_chou[$row-1]["award"]=$award_chou;
                    $data_chou[$row-1]["people_num"]=$people_num;
                    $data_chou[$row-1]["award_num"]=$award_num;
                    $data_chou[$row-1]["award_img"]="暂未上传";

                }

            }


        }


        $table_data=array();
        $table_data[$row-1]['award_num']=$award_num;
        $this->assign("table_data",$table_data);
        $data_pai=array(
            array(
                "title"=>"rbber",
                "award"=>"rtviwr",
                "from"=>1,
                "end"=>2,
                "award_img"=>"vtwt "
            ),
            array( "title"=>"rbber",
                "award"=>"rtviwr",
                "from"=>3,
                "end"=>4,
                "award_img"=>"vtwt ")
        );
        $data_chou=array(
            array(
                "title"=>"rbber",
                "award"=>"rtviwr",
                "people_num"=>1,
                "award_num"=>2,
                "award_img"=>"vtwt "
            ),
            array(  "title"=>"rbber",
                "award"=>"rtviwr",
                "people_num"=>1,
                "award_num"=>2,
                "award_img"=>"vtwt ")
        );
        $this->assign("data_pai",$data_pai);
        if(IS_POST){
            $data["title"]=I("title");
            $data["type"]=I("rule_radio");
            $data['forms_id']=$this->forms_id;
            $my=M("forms_rule")->add($data);
            if($data["type"]=="全部派券"){
                $data_all["title"]=$data["title"];
                $data_all["award"]=I("award");
                $data_all["award_img"]="暂未上传";
                M("forms_rule_all")->add($data_all);
            }elseif($data["type"]=="排名派券"){
                M("forms_rule_pai")->addAll($data_pai);





            }elseif($data["type"]=="抽奖派券"){
                M("forms_rule_chou")->addAll($data_chou);

            }

            if($my){
                $this->success("成功",addons_url("Forms://Forms/lists"));
            }else{
                $this->error("失败");
            }

        }









        $this->display ( );

    }


}