<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
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
<link href="<?php echo ADDON_PUBLIC_PATH;?>/preview.css" rel="stylesheet" type="text/css">
<style type="text/css">
div{
	display: block;
}
.f_wrapper{
	position: relative;
	width: 100%;
	height: auto;
	overflow-y: auto;
	z-index: 30;
}
.fs_main{
	background-color: #FFFFFF;
	color: #333333;
}
.fs_main{
	width: 750px;
}
.f_main{
	position: relative;
	width: 640px;
	margin: auto;
	margin-top: 20px;
	-webkit-box-shadow: 0px 1px 6px rgba(124, 124, 124, 0.42);
	z-index: 3;
}
.f_body{
	width: 100%;
	padding-bottom: 20px;
}
.f_component{
	padding: 12px 30px 12px 30px;
	margin-top: 10px;
	margin-bottom: 5px;
	-webkit-transition-property: background-color;
	-webkit-transition-duration: 200ms;
		-webkit-transition-timing-function: ease-in-out;
}
.fs_cTitle {
  font-size: 14px;
  line-height: 16px;
}
.f_cTitle {
  font-size: 16px;
  line-height: 25px;
  margin-bottom: 4px;
}
p {
  display: block;
  -webkit-margin-before: 1em;
  -webkit-margin-after: 1em;
  -webkit-margin-start: 0px;
  -webkit-margin-end: 0px;
}
.fs_cValidate {
  color: #333333;
}
.f_cValidate {
  font-size: 12px;
  line-height: 25px;
  margin-left: 5px;
  color: #2976A4;
  white-space: nowrap;
  font-weight: normal;
}
.fs_content {
  font-size: 12px;
}
.medium {
  width: 82%;
}
.input, .date {
  height: 18px;
}
.input, .textarea, .date {
  margin-top: 3px;
  line-height: 18px;
  border: 1px solid #D3D3D3;
  border-radius: 0;
}
input, select, textarea {
  font-size: 12px;
  padding: 5px;
  outline: 0 none;
}
.f_error {
  display: none;
  text-align: center;
  margin-top: 12px;
  color: #666;
}
.f_submit {
  margin-top: 20px;
  padding: 0 30px;
  text-align: center;
}
.f_submitBtn {
  display: inline-block;
  line-height: 28px;
  padding: 2px 24px;
  font-size: 13px;
  text-align: center;
  color: #FFF;
  background: #3E76A7;
  border-radius: 2px;
}
button, a {
  cursor: pointer;
}
ins, a {
  text-decoration: none;
}
</style>
<script type="text/javascript">
$(function(){
    var data = <?php echo ($data_zujian); ?>;
    for(var c_i=0; c_i<data.length;c_i++){
        if(data[c_i].c_name=="id_name"||data[c_i].c_name=="id_address"||data[c_i].c_name=="id_phone"||data[c_i].c_name=="id_single"||data[c_i].c_name=="id_picupload"){
            var c_content = '<div class="f_component" com-name="id_number" name="'+data[c_i].c_name+'" serialnum="0">'+
                    '<p class="f_cTitle fs_cTitle">'+data[c_i].c_title+
                    '<span class="f_cValidate fs_cValidate"></span>'+
            '</p><input type="text" class="input medium number fs_content fs_input" value=""></div>';

            $(".f_body").append(c_content);
        }
        //alert(data[c_i].id+data[c_i].forms_id+data[c_i].c_id+data[c_i].c_name+data[c_i].c_detail);
    }
    var c_submit ='<div class="f_error"></div><div class="f_submit"><a class="f_submitBtn fs_submitBtn validate_submit">提交</a></div>';
    $(".f_body").append(c_submit);
    //alert(data.length);
    //alert(data[0].id+data[0].forms_id+data[0].c_id+data[0].c_name+data[0].c_detail);
//	for(){
		
//	}
});
</script>
<body>

<div></div>
<div class="f_wrapper">
	<div class="f_main fs_main">
		<div class="f_body fs_body">
			<div class="f_component" com-name="id_number" name="com1" serialnum="0">
				<p class="f_cTitle fs_cTitle">数字
					<span class="f_cValidate fs_cValidate">[请输入数字]</span>
				</p>
				<input type="text" class="input medium number fs_content fs_input" value="">
			</div>
		</div>
	</div>
</div>
</body>
</html>