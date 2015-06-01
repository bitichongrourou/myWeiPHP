<?php

namespace Addons\Forms\Controller;

use Home\Controller\AddonsController;

 function get_forms_id()
 {
     return $_REQUEST ['forms_id'];
 }

// function get_json(){
//     return $_REQUEST['myjson'];
// }



class BaseController extends AddonsController {

//    public  $forms_id;
//    public function  set_forms_id($data){
//        $this->forms_id=$data;
//    }
//    public function  get_forms_id(){
//        return $this->forms_id;
//    }

}
