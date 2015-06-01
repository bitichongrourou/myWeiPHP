<?php

namespace Addons\myTest\Controller;
use Home\Controller\AddonsController;

class myTestController extends AddonsController{
    public function _construct(){
        parent::_construct();
       // $param['id']=$info['id'];
        $param['token']=get_token();
        $param['openid']=get_openid();
    }


}
