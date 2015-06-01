<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/weiphp/Public/Home/css/font-awesome.css?v=<?php echo SITE_VERSION;?>" media="all">
	<link rel="stylesheet" type="text/css" href="/weiphp/Public/Home/css/mobile_module.css?v=<?php echo SITE_VERSION;?>" media="all">
    <script type="text/javascript" src="/weiphp/Public/static/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="/weiphp/Public/Home/js/prefixfree.min.js"></script>
    <script type="text/javascript" src="/weiphp/Public/Home/js/m/dialog.js?v=<?php echo SITE_VERSION;?>"></script>
    <script type="text/javascript" src="/weiphp/Public/Home/js/m/flipsnap.min.js"></script>
    <script type="text/javascript" src="/weiphp/Public/Home/js/m/mobile_module.js?v=<?php echo SITE_VERSION;?>"></script>
    <script type="text/javascript" src="/weiphp/Public/Home/js/admin_common.js?v=<?php echo SITE_VERSION;?>"></script>
	<title><?php echo empty($page_title) ? C('WEB_SITE_TITLE') : $page_title; ?></title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
    <meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
    <meta content="no-cache" http-equiv="pragma">
    <meta content="0" http-equiv="expires">
    <meta content="telephone=no, address=no" name="format-detection">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="shortcut icon" href="<?php echo SITE_URL;?>/favicon.ico">
</head>	
<body>
	<div id="container" class="container body">
            <div class="top_relative">
            <img src="/weiphp/Addons/Forms/View/default/Public/background.png"/>            <p>gsgs </p>
            </div>
                 	
        
            	<div class="block_content_bg m_10"> 
            <div class="block_content_top_min">
                <center>请填写以下信息</center>
            </div>
        <!-- 表单 -->
        <form id="form" action="http://localhost/weiphp/index.php?s=/addon/Forms/FormsValue/add/model/71.html" method="post" class="form-horizontal p_10">
          <!-- 基础文档模型 -->
          <div id="tab1" class="tab-pane in              tab1">
              <input type="hidden" class="text input-large" name="forms_id" value="15">                                    <div id="top-alert" class="fixed alert alert-error" style="display: none;">
  <button class="close fixed" style="margin-top: 4px;">&times;</button>
  <div class="alert-content"></div>
  </div>
          	<div class="form-item cf">
            <input type="hidden" name="id" value="">
            <button class="home_btn submit-btn mb_10 mt_10" id="submit" type="button" target-form="form-horizontal">确 定</button>            </div>
        </form>

      </div>
  </div>
 <block name="script">
 <link href="/weiphp/Public/static/datetimepicker/css/datetimepicker.css?v=20141202" rel="stylesheet" type="text/css">
    <link href="/weiphp/Public/static/datetimepicker/css/dropdown.css?v=20141202" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="/weiphp/Public/static/datetimepicker/js/bootstrap-datetimepicker.min.js"></script> 
  <script type="text/javascript" src="/weiphp/Public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js?v=20141202" charset="UTF-8"></script>
<script type="text/javascript">
$('#submit').click(function(){
   // $('#form').submit();
   $.Dialog.loading();
   $.ajax({
	   url:'http://localhost/weiphp/index.php?s=/addon/Forms/FormsValue/add/model/71.html',
	   type:'post',
	   data:$('#form').serializeArray(),
	   dataType:'json',
	   success:function(json){
		    //$.Dialog.close();
			if(json.status==1){
			   		
			   		$.Dialog.success(json.info);
					//alert('2');
			   }else{
				   	$.Dialog.fail(json.info);
					//alert('3');
				   }
		   if(json.url!=""){
			   setTimeout(function(){
				   window.location.href=json.url;
				   },2000);
			   }
   		},
		error:function(){
				$.Dialog.close();
			 //$.Dialog.fail();
			}
	   });
});

$(function(){
       $('.time').datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        language:"zh-CN",
        minView:0,
        autoclose:true
    });

});
</script> 
</body>
</html>