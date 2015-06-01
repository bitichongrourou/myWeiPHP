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

<script type="text/javascript" src="/weiphp/Public/static/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/weiphp/Public/static/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="/weiphp/Public/Home/js/dialog.js?v=20141202"></script>
<script type="text/javascript" src="/weiphp/Public/Home/js/admin_image.js?v=20141202"></script>

<link href="<?php echo ADDON_PUBLIC_PATH;?>/preview.css" rel="stylesheet" type="text/css">
<link href="/weiphp/Public/Home/css/module.css?v=20141202" rel="stylesheet">
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
	padding-bottom: 0px;
}
.f_component{
	padding: 1px 10px 1px 10px;
	margin-top: 4px;
	margin-bottom: 0px;
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
	line-height: 16px;
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
	height: 25px;
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
.fs_sectionDescribe, .fs_imgDescribe {
	color: #333333;
}
.f_imgDescribe {
	line-height: 20px;
	color: #444;
}
hr{
	height: 1px;
	border: none;
	border-top: 1px solid #CCCCCC;
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
        if(data[c_i].c_name=="id_name"||data[c_i].c_name=="id_address"||data[c_i].c_name=="id_phone"||data[c_i].c_name=="id_single"){
            var c_content = '<div class="f_component" com-name="id_number" name="'+data[c_i].c_name+'" serialnum="'+c_i+'" id="'+c_i+'">'+
                    '<p class="f_cTitle fs_cTitle">'+data[c_i].c_title+
                    '<span class="f_cValidate fs_cValidate"></span>'+
            '</p><input type="text" class="input medium number fs_content fs_input" name="'+data[c_i].c_name+'"></div>';

            $(".f_body").append(c_content);
        }else if(data[c_i].c_name=="id_controls"||data[c_i].c_name=="id_piconly"){
			var c_content = '<div class="f_component" com-name="id_number" name="'+data[c_i].c_name+'" serialnum="'+c_i+'" id="'+c_i+'">'+
					'<a class="f_pictureImg" style="cursor:dufault;text-align:center"><img src='+data[c_i].c_title+' border="none" style="max-width:100%"></a>'+
                    '<p class="f_imgDescribe fs_imgDescribe" style="text-align:left">'+data[c_i].c_detail+'</p></div>';

            $(".f_body").append(c_content);
		}else if(data[c_i].c_name=="id_picupload"){
			var c_content = '<div class="f_component" com-name="id_number" name="'+data[c_i].c_name+'" serialnum="'+c_i+'" id="'+c_i+'">'+
					'<p class="f_imgDescribe fs_imgDescribe" style="text-align:left">'+data[c_i].c_title+'</p><hr class="sectionLine">'+
					'<input type="file" id="upload_picture'+c_i+'" ><input type="hidden" id="cover_id" />'+
					'</div><script type="text/javascript">getPicup('+c_i+');'+
					'<'+'/'+'script'+'>';
            $(".f_body").append(c_content);
		}else if(data[c_i].c_name=="id_section"){
			var c_content = '<div class="f_component" com-name="id_number" name="'+data[c_i].c_name+'" serialnum="'+c_i+'" id="'+c_i+'">'+
                    '<p class="f_cTitle fs_cTitle">'+data[c_i].c_title+
                    '<span class="f_cValidate fs_cValidate"></span>'+
					'</p><p class="f_des" style="font-size: 14px;line-height: 14px;">'+data[c_i].c_detail+'</p></div>';

            $(".f_body").append(c_content);
		}
        
    }
    var c_submit ='<div class="f_error"></div><div class="f_submit"><a class="f_submitBtn fs_submitBtn validate_submit">提交</a></div>';
    $(".f_body").append(c_submit);   
	
	/*$(".fs_submitBtn").click(function(){
		
		var jsonuserinfo = $('#f_form').serialize();
			alert(jsonuserinfo);
        $.ajax({
			type:'post',
			url:'/weiphp/index.php?s=/addon/Forms/FormsValue/get_forms_data',
			dataType: 'json',
			data: jsonuserinfo,
			success:function(){
				alert();
			}
		});
	});*/
});

function getPicup(_id){
			$("#upload_picture"+_id).uploadify({
					    "height"          : 20,
						"swf"             : "/weiphp/Public/static/uploadify/uploadify.swf",
				        "fileObjName"     : "download",
				        "buttonText"      : "上传图片",
						'folder'		  : '/Uploads/Picture/Forms',
				        "uploader"        : "<?php echo U('home/File/uploadPicture',array('session_id'=>session_id()));?>",
				        "width"           : 45,
				        'removeTimeout'	  : 1,
						'uploadLimit'       : 1, //允许上传的最多张数
				        'fileTypeExts'	  : '*.jpg; *.png; *.gif;',
				        "onUploadSuccess" : uploadPicture
				    });
					function uploadPicture(file, data){
					   	var data = $.parseJSON(data);
						//$("#uploadify").uploadifySettings('folder','/Uploads');
					   	var src = '';
							if(data.status){
					       	$("#cover_id").val(data.id);
							src = data.url || '/weiphp' + data.path;
							$("div#"+_id).append('<input type="hidden" name="id_picupload" value="'+src+'">');	
							//alert(_id);
							} else {
							    updateAlert(data.info);
							    etTimeout(function(){
									$('#top-alert').find('button').click();
							        $(that).removeClass('disabled').prop('disabled',false);
							        },1500);
							}
					}
			}
</script>
<body>

<div></div>
<div class="f_wrapper">
	<div class="f_main fs_main">
		<form id="f_form">
		<div class="f_body fs_body">
		</div></form>
	</div>
</div>
</body>
</html>