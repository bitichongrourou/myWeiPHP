<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
<meta content="遵循Apache2开源协议,免费提供使用,微信功能插件化开发,多公众号管理,配置简单" name="keywords"/>
<meta content="weiphp 简洁强大开源的微信公众平台开发框架微信功能插件化开发,多公众号管理,配置简单" name="description"/>
<link rel="shortcut icon" href="<?php echo SITE_URL;?>/favicon.ico">
<title><?php echo empty($page_title) ? C('WEB_SITE_TITLE') : $page_title; ?></title>
<link href="/weiphp/Public/static/font-awesome/css/font-awesome.min.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/weiphp/Public/Home/css/base.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/weiphp/Public/Home/css/module.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/weiphp/Public/Home/css/weiphp.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="/weiphp/Public/static/bootstrap/js/html5shiv.js?v=<?php echo SITE_VERSION;?>"></script>
<![endif]-->

<!--[if lt IE 9]>
<script type="text/javascript" src="/weiphp/Public/static/jquery-1.10.2.min.js"></script>
<![endif]-->
<!---蓝锂002适配修改 QQ:125682133--->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="/weiphp/Public/static/jquery-2.0.3.min.js"></script>
<!--<![endif]-->
<script type="text/javascript" src="/weiphp/Public/static/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/weiphp/Public/static/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="/weiphp/Public/Home/js/dialog.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/weiphp/Public/Home/js/admin_common.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/weiphp/Public/Home/js/admin_image.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript">
var  STATIC = "/weiphp/Public/static";
var  ROOT = "/weiphp";
</script>
<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<?php echo hook('pageHeader');?>

</head>
<body>
	<!-- 头部 -->
	<!-- 提示 -->
<div id="top-alert" class="top-alert-tips alert-error" style="display: none;">
  <a class="close" href="javascript:;"><b class="fa fa-times-circle"></b></a>
  <div class="alert-content">这是内容</div>
</div>
<!-- 导航条
================================================== -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
       <a class="brand" title="<?php echo C('WEB_SITE_TITLE');?>" href="<?php echo U('index/index');?>"><img height="45" src="<?php if(C('SYSTEM_LOGO')) { echo C('SYSTEM_LOGO'); }else{ ?>/weiphp/Public/Home/images/top_logo.png?v=<?php echo SITE_VERSION;?> <?php } ?>" title="<?php echo C('WEB_SITE_TITLE');?>"/></a>
            
            
            <div class="top_nav">
                <?php if(is_login()): ?><ul class="nav" style="margin-right:0">
                    	<li class="dropdown">						     
                             <!-- 显示代码bug修改 -->
							 <?php if($mp_ids_list > 0): if(!empty($$member_public["public_name"])): ?><a href="<?php echo U('home/MemberPublic/lists');?>" class="dropdown-toggle login-nav" data-toggle="dropdown" title="公众号管理">公众号管理								
									  <b class="pl_5 fa fa-sort-down"></b></a><?php endif; ?>							
								  <?php if(empty($$member_public["public_name"])): ?><a href="#" class="dropdown-toggle login-nav" data-toggle="dropdown" title="<?php echo ($member_public["public_name"]); ?>"><?php echo (msubstr_local($member_public["public_name"],0,5,'utf-8')); ?><b class="pl_5 fa fa-sort-down"></b></a><?php endif; ?>		
							 <?php else: ?>
							     <a href="#" class="dropdown-toggle login-nav" data-toggle="dropdown" title="未设置公众号"><font color="red">未设置公众号</font>						
									  <b class="pl_5 fa fa-sort-down"></b></a><?php endif; ?>
                            <ul class="dropdown-menu" style="display:none">
							    <!-- 显示代码bug修改 	
								  <li><a href="<?php echo U('home/MemberPublic/lists');?>">公众号管理</a></li>	
								-->									
                                <?php if(is_array($member_public_list)): $i = 0; $__LIST__ = $member_public_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('home/MemberPublic/changPublic','id='.$vo['id']);?>" title="<?php echo ($vo["public_name"]); ?>"><?php echo (msubstr_local($vo["public_name"],0,5,'utf-8')); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </li>
                        <li class="dropdown admin_nav">
                            <a href="#" class="dropdown-toggle login-nav" data-toggle="dropdown" style=""><?php echo get_username();?> <b class="pl_5 fa fa-sort-down"></b></a>
                            <ul class="dropdown-menu" style="display:none">
                                <li><a href="<?php echo U('Admin/index/index');?>">后台管理</a></li>
                                <li><a href="<?php echo U('User/profile');?>">修改密码</a></li>
                                <li><a href="<?php echo U('User/logout');?>">退出</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php else: ?>
                    <ul class="nav" style="margin-right:0">
                    	<li style="padding-right:20px">你好!欢迎来到<?php echo C('WEB_SITE_TITLE');?></li>
                        <li>
                            <a href="<?php echo U('User/login');?>">登录</a>
                        </li>
                        <li>
                            <a href="<?php echo U('User/register');?>">注册</a>
                        </li>
                        <li>
                            <a href="<?php echo U('admin/index/index');?>" style="padding-right:0">后台入口</a>
                        </li>
                    </ul><?php endif; ?>
            </div>
        </div>
</div>
	<!-- /头部 -->
	
	<!-- 主体 -->
	
<?php if(!is_login()){ Cookie ( '__forward__', $_SERVER ['REQUEST_URI'] ); redirect(U('home/user/login')); } if(isset($_GET['sidenav'])){ $navClass[$_GET['sidenav']] = 'active'; }else{ $m = strtolower(MODULE_NAME); $c = strtolower(CONTROLLER_NAME); $a = strtolower(ACTION_NAME); $navClass[$m] = $navClass[$m.'_'.$c] = $navClass[$m.'_'.$c.'_'.$a] = 'active'; $ad = ucfirst ( parse_name ( $_REQUEST['_addons'], 1 ) ); $cl = ucfirst ( parse_name ( $_REQUEST['_controller'], 1 ) ); $navClass[$ad] = $navClass[$ad.'_'.$cl] = 'active'; } $addonList = D ( 'Addons' )->getWeixinList (false, array(), true); $categorys = M ( 'addon_category' )->order ( 'sort asc, id desc' )->select (); foreach($categorys as &$cate){ foreach($addonList as $k=>$a){ if($cate['id']==intval($a['cate_id'])){ $cate['addons'][] = $a; unset($addonList[$k]); } } } ?>
<div id="main-container" class="container">
	<div class="sidebar">
    	<ul class="sidenav">
          <li>
              <a class="sidenav_parent" href="javascript:;"><b class="ficon fa fa-plus-square"></b>帐号管理</a>
              <ul class="sidenav_sub" style="display:none">
                  <li class="<?php echo ($navClass['home_memberpublic']); ?>"> <a href="<?php echo U('Home/MemberPublic/lists');?>">公众号管理 </a> <b class="active_arrow"></b></li>
                  <li class="<?php echo ($navClass['home_index_main']); ?>"> <a href="<?php echo U('Home/Index/main');?>">插件管理 </a> <b class="active_arrow"></b></li>
                  <li class="<?php echo ($navClass['home_creditconfig_lists']); ?>"> <a href="<?php echo U('Home/CreditConfig/lists');?>">积分配置 </a> <b class="active_arrow"></b></li>
                  <li class="<?php echo ($navClass['home_keyword']); ?>"> <a href="<?php echo U('Home/Keyword/lists');?>">关键词维护 </a> <b class="active_arrow"></b></li>
                  <li class="<?php echo ($navClass['home_cascade']); ?>"> <a href="<?php echo U('Home/Cascade/lists');?>">级联数据管理 </a> <b class="active_arrow"></b></li>
             </ul>
          </li>
          
          <?php if(is_array($categorys)): $i = 0; $__LIST__ = $categorys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ca): $mod = ($i % 2 );++$i;?><li>
              <a class="sidenav_parent" href="javascript:;"><b class="ficon fa fa-plus-square"></b><?php echo ($ca["title"]); ?></a>
              <ul class="sidenav_sub" style="display:none">
                  <?php if(is_array($ca["addons"])): $i = 0; $__LIST__ = $ca["addons"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($navClass[$vo[name]]); ?>"> <a href="<?php echo ($vo[addons_url]); ?>" title="<?php echo ($vo["description"]); ?>"> 
                      <i class="icon-chevron-right"><?php if(!empty($vo['icon'])) { ?> <img src="<?php echo ($vo["icon"]); ?>" /> <?php } ?> </i>
                      <?php echo ($vo["title"]); ?> </a><b class="active_arrow"></b></li><?php endforeach; endif; else: echo "" ;endif; ?>
             </ul>
          </li><?php endforeach; endif; else: echo "" ;endif; ?>
          
          <li>
              <a class="sidenav_parent" href="javascript:;"><b class="ficon fa fa-plus-square "></b>其它功能</a>
              <ul class="sidenav_sub" style="display:none">
              <?php if(is_array($addonList)): $i = 0; $__LIST__ = $addonList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($navClass[$vo[name]]); ?>"> <a href="<?php echo ($vo[addons_url]); ?>" title="<?php echo ($vo["description"]); ?>"> 
              <i class="icon-chevron-right"><?php if(!empty($vo['icon'])) { ?> <img src="<?php echo ($vo["icon"]); ?>" /> <?php } ?> </i>
              <?php echo ($vo["title"]); ?> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
              </ul>
          </li>
        </ul>
  </div>
<div class="main_body">
	
	  <style type="text/css">
		.Form_main{
			margin-top: -10px;
		}
		.com_button{
			margin-top: -540px;
			margin-left: 650px;
		}
		.com_button_once{
			margin-top: 35px;
			margin-left: 650px;
		}
		div.upload-img-box{
			height:120px;
			width:120px;
			margin-top:350px;
			margin-left: 960px;
			border-style: solid; border-width:1px;
		}
		.controls{
			height:50px;
			width:200px;	
			margin-top:20px;
			border-style: solid; border-width:1px;
		}
		.Form_field{
			height:500px;
			width:600px;
			margin-left: 8px;
			overflow-y:auto;
			overFlow-x:hidden;
			border-style: solid; border-width:1px;
		}
		.com_broder{
			margin-top:5px;
			height:32px;
			width:200px;
			border-style: solid; 
			border-width:1px;
		}
		
		.mybtn {
			display: inline-block;
			padding: 6px 12px;
			font-size: 14px;
			line-height: 20px;
			width: 80px;
			color: #fff;
			text-align: center;
			vertical-align: middle;
			cursor: pointer;
			background: #1fce02;
			border: none;
			-moz-transition: color .25s linear, background-color .25s linear;
			-webkit-transition: color .25s linear, background-color .25s linear;
			transition: color .25s linear, background-color .25s linear;
		}
		
		.ui-draggable{
			padding-top: 15px;
			margin-left: 8px;
		}
			
		hr{
			height: 1px;
			border: none;
			border-top: 1px solid #CCCCCC;
		}
		.pcontrol{
			margin-top: -36px;
			margin-left: 80px;
		}
		.pcontrol1{
			margin-top: -36px;
			margin-left: 100px;
		}
		.deleteButton{
			font-size:12px;
			color:#CCCCCC;
			width: 30px;
			height: 30px;
			margin-top: 2px;
			margin-right: 2px;
			padding: 0 5px;
			background: url('<?php echo ADDON_PUBLIC_PATH;?>/delete.png') no-repeat;
			float: right;
			}
	  </style>
	  <script type="text/javascript">
		//alert(hre);
		function getPicup(_id){
			$("#upload_picture"+_id).uploadify({
					    "height"          : 50,
						"swf"             : "/weiphp/Public/static/uploadify/uploadify.swf",
				        "fileObjName"     : "download",
				        "buttonText"      : "上传图片",
				        "uploader"        : "<?php echo U('home/File/uploadPicture',array('session_id'=>session_id()));?>",
				        "width"           : 50,
				        'removeTimeout'	  : 1,
				        'fileTypeExts'	  : '*.jpg; *.png; *.gif;',
				        "onUploadSuccess" : uploadPicture
				    });
					function uploadPicture(file, data){
					   	var data = $.parseJSON(data);
					   	var src = '';
							if(data.status){
					       	$("#cover_id").val(data.id);
							src = data.url || '/weiphp' + data.path;
										
							count = count+1;
							var insertLi = '<li class="ui-draggable" id="com'+count+'" name="id_piconly"  title="点击可修改" style="list-style-type:none;" onmouseover="showDel('+count+
									')" onmouseout="cancleDel('+count+')"><div class="deleteButton" id="deleteButton'+count+'" style="display: none;" onclick="onClickDel('+count+')"></div>'
									+'<div class="img_title"><img class="img_block" src="' + src + '"/></div>'+'</li>';
							$("ul.form_component").append(insertLi);
							      //$("#cover_id").parent().find('.upload-img-box').html(
							      //	'<div class="upload-pre-item"><img src="' + src + '"/></div>'
							      //);
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
	  <div class="span9 page_message">
		<section id="contents"> 
		  <ul class="tab-nav nav">
  <?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($vo["class"]); ?>"><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["title"]); ?><span class="arrow fa fa-sort-up"></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
<?php if(!empty($sub_nav)): ?><div class="sub-tab-nav">
       <ul class="sub_tab">
       <?php if(is_array($sub_nav)): $i = 0; $__LIST__ = $sub_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a class="<?php echo ($vo["class"]); ?>" href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["title"]); ?><span class="arrow fa fa-sort-up"></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
<!--          <li><a class="cur" href="<?php echo addons_url('WeiSite://footer/lists');?>">底部菜单配置</a></li>
          <li><a href="<?php echo addons_url('WeiSite://footer/template');?>">底部菜单模板</a></li>-->
      </ul>
</div><?php endif; ?>
<?php if(!empty($normal_tips)): ?><p class="normal_tips"><b class="fa fa-info-circle"></b> <?php echo ($normal_tips); ?></p><?php endif; ?> 
		  <?php if($add_button || $del_button || $search_button || !empty($top_more_button)): endif; ?>
		  <!-- 数据列表 -->
		  <div class="page"> <?php echo ((isset($_page) && ($_page !== ""))?($_page):''); ?> </div>
		</section>
	  </div>
	  <div class="Form_main">		
		<div class="formBuilder_example">
			<div scroll="no" class="Form_field">
				<div class="formBuilder_example_form">
					<div class = "formBuilder_main">
						<div class="">	
							<div class="formLogo" style="display:none;">
							<img id="face" border alt src style="display: none;"></div>
							
							<ul class="form_component ui-sortable">
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="formBuilder_example_use">
				<a class="btn btn-primary btn_example_preview" target="_blank" style="margin-left:250px;">预览表单</a>
				<a class="btn btn-primary btn_example_generate" style="margin-left:170px;" target="_blank">
					<span>生成表单</span>
				</a>
			</div>	
		</div>
		<div class="com_button">
			<p style="font-size:16px;color=#fff">组件<span style="margin-left:15px;font-size:12px;color=#B3B3B3">用于表单静态页面</span></p>
			<hr>
			<div class="com_broder">
				<button class="mybtn" id="id_single">单行文本</button><span style="margin-left:5px;">单行文本描述</span>
			</div>
			<div class="com_broder">
				<button class="mybtn" id="id_section">描述</button><span style="margin-left:5px;">对表单进行描述</span>
			</div>
			<div class="controls">
				<input type="file" id="upload_picture1">
				<input type="hidden" name="" id="cover_id" value=""/>
				<p class="pcontrol1">纯图片</p>
			<div class="upload-pre-item" ></div>
            </div>
			<script type="text/javascript">
				getPicup(1);
			</script>
            <div class="controls">
				<input type="file" id="upload_picture">
				<input type="hidden" name="" id="cover_id" value=""/>
				<p class="pcontrol">图片加文字描述</p>
			<div class="upload-pre-item" ></div>
            </div>
            <script type="text/javascript">
					//上传图片
					/* 初始化上传插件 */
					$("#upload_picture").uploadify({
					    "height"          : 50,
						"swf"             : "/weiphp/Public/static/uploadify/uploadify.swf",
				        "fileObjName"     : "download",
				        "buttonText"      : "上传图片",
					//	"folder"		  : '/Upload/Picture/Forms/',
				        "uploader"        : "<?php echo U('home/File/uploadPicture',array('session_id'=>session_id()));?>",
				        "width"           : 50,
				        'removeTimeout'	  : 1,
				        'fileTypeExts'	  : '*.jpg; *.png; *.gif;',
				        "onUploadSuccess" : uploadPicture
				    });
					function uploadPicture(file, data){
					   	var data = $.parseJSON(data);
					   	var src = '';
							if(data.status){
					       	$("#cover_id").val(data.id);
							src = data.url || '/weiphp' + data.path;
										
							count = count+1;
							var insertLi = '<li class="ui-draggable" id="com'+count+'" name="id_controls"  title="点击可修改" style="list-style-type:none;" onmouseover="showDel('+count+
									')" onmouseout="cancleDel('+count+')"><div class="deleteButton" id="deleteButton'+count+'" style="display: none;" onclick="onClickDel('+count+')"></div>'
									+'<div class="img_title"><img class="img_block" src="' + src + '"/></div>'
									+'<div class="subtitle" id="subtitle'+count+'" ><label class="title" onclick="subTitleClick('+count+')">'+'这里是图片，请写下描述，可为空'+'</label></div>'+'</li>';
							$("ul.form_component").append(insertLi);
							      //$("#cover_id").parent().find('.upload-img-box').html(
							      //	'<div class="upload-pre-item"><img src="' + src + '"/></div>'
							      //);
							} else {
							    updateAlert(data.info);
							    etTimeout(function(){
									$('#top-alert').find('button').click();
							        $(that).removeClass('disabled').prop('disabled',false);
							        },1500);
							}
					}
			</script> 
		</div>
		
		<div class="com_button_once">
			<hr>
			<p style="font-size:16px;color=#fff">用户组件<span style="margin-left:15px;font-size:12px;color=#B3B3B3">用于可给用户填写的表单组件</span></p>
			<div style="margin-top:20px;">
				<button class="mybtn" id="id_picupload">图片上传</button>
				<button class="mybtn" id="id_name" style="margin-left:20px;">姓名</button>
				<button class="mybtn" id="id_phone" style="margin-left:20px;">手机</button>
				<button class="mybtn" id="id_address" style="margin-left:20px;">地址</button>
			</div>
			<div style="margin-top:20px;">
				<button class="mybtn" id="id_name" >姓名</button>
				<button class="mybtn" id="id_name" style="margin-left:20px;">姓名</button>
				<button class="mybtn" style="margin-left:20px;">单行文本</button>
				<button class="mybtn" style="margin-left:20px;">单行文本</button>
			</div>
		</div>
		</div>
	</div>

</div>
</div>
	<!-- /主体 -->

	<!-- 底部 -->
	
    <!-- 底部
    ================================================== -->
<footer class="footer">
      <div class="container">
          <p>
          	<a href="<?php echo U('Home/Index/about');?>" target="_blank">关于我们</a>  |  
            <a href="<?php echo U('home/index/help');?>" target="_blank">使用说明</a>   |   
            本系统由<a href="http://www.weiphp.cn" target="_blank">weiphp</a>强力驱动
            </p>
      </div>
</footer>

<script type="text/javascript">
(function(){
	var ThinkPHP = window.Think = {
		"ROOT"   : "/weiphp", //当前网站地址
		"APP"    : "/weiphp/index.php?s=", //当前项目地址
		"PUBLIC" : "/weiphp/Public", //项目公共目录地址
		"DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
		"MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
		"VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
	}
})();
</script>
 
<script type="text/javascript" src="<?php echo ADDON_PUBLIC_PATH;?>/test.js" ></script>
<script type="text/javascript" src="<?php echo ADDON_PUBLIC_PATH;?>/jquery-2.1.4.min.js"  ></script>
<script type="text/javascript">
var count=0;
$(function(){	
	
	var isMust = "*";
	$("button#id_single").click(function(){
		$("button#id_single").attr("disabled",true);
		$("button#id_single").css("background","#DDDDDD");//#90F94B
		count = count+1;
		var insertLi = '<li class="ui-draggable" id="com'+count+'" name="id_single"  title="点击可修改" style="list-style-type:none;" onmouseover="showDel('+count+
				')" onmouseout="cancleDel('+count+')"><div class="deleteButton" id="deleteButton'+count+'" style="display: none;" onclick="onClickDel('+count+')"></div>'
				+'<span class="title_field" id="com'+count+'" ><label class="title" onclick="titleClick('+count+')">'+'单行文本'+'</label><span class="com_required">'+''+'</span></span>'
				+'<div><input type="text" class = "'+''+'" '+''+' /></div>'+'</li>';
		$("ul.form_component").append(insertLi);
		//$("li")
	});
	$("button#id_name").click(function(){
		$("button#id_name").attr("disabled",true);
		$("button#id_name").css("background","#DDDDDD");
		count = count+1;
		var insertLi = '<li class="ui-draggable" id="com'+count+'" name="id_name"  title="点击可修改" style="list-style-type:none;" onmouseover="showDel('+count+
				')" onmouseout="cancleDel('+count+')"><div class="deleteButton" id="deleteButton'+count+'" style="display: none;" onclick="onClickDel('+count+')"></div>'
				+'<span class="title_field" id="com'+count+'" ><label class="title" onclick="titleClick('+count+')">'+'姓名'+'</label><span class="com_required">'+''+'</span></span>'
				+'<div><input type="text" class = "'+''+'" '+''+' /></div>'+'</li>';
		$("ul.form_component").append(insertLi);
		//$("li")
	});
	$("button#id_address").click(function(){
		$("button#id_address").attr("disabled",true);
		$("button#id_address").css("background","#DDDDDD");
		count = count+1;
		var insertLi = '<li class="ui-draggable" id="com'+count+'" name="id_address"  title="点击可修改" style="list-style-type:none;" onmouseover="showDel('+count+
				')" onmouseout="cancleDel('+count+')"><div class="deleteButton" id="deleteButton'+count+'" style="display: none;" onclick="onClickDel('+count+')"></div>'
				+'<span class="title_field" id="com'+count+'" ><label class="title" onclick="titleClick('+count+')">'+'地址'+'</label><span class="com_required">'+''+'</span></span>'
				+'<div><input type="text" class = "'+''+'" '+''+' /></div>'+'</li>';
		$("ul.form_component").append(insertLi);
		//$("li")
	});
	$("button#id_phone").click(function(){
		$("button#id_phone").attr("disabled",true);
		$("button#id_phone").css("background","#DDDDDD");
		count = count+1;
		var insertLi = '<li class="ui-draggable" id="com'+count+'" name="id_phone"  title="点击可修改" style="list-style-type:none;" onmouseover="showDel('+count+
				')" onmouseout="cancleDel('+count+')"><div class="deleteButton" id="deleteButton'+count+'" style="display: none;" onclick="onClickDel('+count+')"></div>'
				+'<span class="title_field" id="com'+count+'" ><label class="title" onclick="titleClick('+count+')">'+'手机'+'</label><span class="com_required">'+''+'</span></span>'
				+'<div><input type="text" class = "'+''+'" '+''+' /></div>'+'</li>';
		$("ul.form_component").append(insertLi);
		//$("li")
	});
	
	$("button#id_section").click(function(){
		count = count+1;
		var insertLi = '<li class="ui-draggable" id="com'+count+'" name="id_section"  title="点击可修改" style="list-style-type:none;" onmouseover="showDel('+count+
				')" onmouseout="cancleDel('+count+')"><div class="deleteButton" id="deleteButton'+count+'" style="display: none;" onclick="onClickDel('+count+')"></div>'
				+'<span class="title_field" id="com'+count+'" ><label class="title" onclick="titleClick('+count+')">'+'单行文本'+'</label>'
				+''+'</span><hr class="sectionLine">'
				+'<div class="subtitle" id="subtitle'+count+'" ><label class="title" onclick="subTitleClick('+count+')">'+'点击进行修改'+'</label></div>'+'</li>';
		$("ul.form_component").append(insertLi);
	});
	
	$("button#id_picupload").click(function(){
		$("button#id_picupload").attr("disabled",true);
		$("button#id_picupload").css("background","#DDDDDD");
		count = count+1;
		var insertLi = '<li class="ui-draggable" id="com'+count+'" name="id_picupload"  title="点击可修改" style="list-style-type:none;" onmouseover="showDel('+count+
				')" onmouseout="cancleDel('+count+')"><div class="deleteButton" id="deleteButton'+count+'" style="display: none;" onclick="onClickDel('+count+')"></div>'
				+'<span class="title_field" id="com'+count+'" ><label class="title" onclick="titleClick('+count+')">'+'请选择文件上传'+'</label>'+'</span><hr class="sectionLine">'
				+'<div class="title_field img_title"><input type="file" id="picupload"'+count
				+'" class="input_file" name="_FILE_" name="files[]"><p>请选择小于2M的JPG、PNG、JPEG文件进行上传</p></div>'+'</li>';
		$("ul.form_component").append(insertLi);
	});
	
	$(".btn_example_preview").click(function(){
		var hre ='<?php echo ADDON_PUBLIC_PATH;?>'.replace("Public", "FormsAttribute");
		sendData2Php("POST", '/weiphp/index.php?s=/addon/Forms/FormsAttribute/dataPreview', function(data){
			window.open(data.url);
		}, '');
        $.get('',{'forms_id':getUrlPara()},function(award_num){
//        alert(award_num);
        });
		//$("a.btn_example_generate").href=hre+"/"+"datapreview.html";
		//window.open(hre+"/"+"datapreview.html");
	});
	
	$(".btn_example_generate").click(function(){
		var hre ='<?php echo ADDON_PUBLIC_PATH;?>'.replace("Public", "FormsAttribute");
		sendData2Php("POST", '/weiphp/index.php?s=/addon/Forms/FormsAttribute/getDataAndShow/'+getUrlPara(), function(data){
			window.open(data.url);
		}, '');
        $.get('',{'forms_id':getUrlPara()},function(award_num){
//        alert(award_num);
        });
		//window.open(hre+"/"+"getdataandshow.html");
	});
});

function getUrlPara(){  
		var sUrl  =  location.href;
		sUrl = sUrl.replace("http://","");
		var arr = sUrl.split("/");
		var cont = arr[arr.length-1];
		return cont.replace(".html",""); 
	} 
function sendData2Php(s_type, s_url, s_success, s_error){
		var datas = {records: []};
		var row = {};
		$("ul.form_component").find("li.ui-draggable").each(function(){
			var c_id = this.id;
			var f_id = getUrlPara();
			var c_name = $(this).attr("name");
			
			var c_title,c_detail = "";
			if(c_name=="id_single"||c_name=="id_address"||c_name=="id_name"||c_name=="id_phone"||c_name=="id_picupload"){
				c_title = $(this).find("span.title_field").text();
				c_detail = "";
				
				
				datas.records.push({"id":c_id, "f_id":f_id, "name":c_name, "title":c_title, "detail":c_detail});
			}else if(c_name=="id_section"){
				c_title = $(this).find("span.title_field").text();
				c_detail = $(this).find("div.subtitle").text();
				
				
				datas.records.push({"id":c_id, "f_id":f_id, "name":c_name, "title":c_title, "detail":c_detail});
			}else if(c_name=="id_controls"||c_name=="id_piconly"){
				c_title = $(this).find("img.img_block").attr("src");
				c_detail = $(this).find("div.subtitle").text();
				
				datas.records.push({"id":c_id, "f_id":f_id, "name":c_name, "title":c_title, "detail":c_detail});
			}else{	
				
				datas.records.push({"id":c_id, "f_id":f_id, "name":c_name, "title":c_title, "detail":c_detail});
			}	
		});
		
		$.ajax({
		  type: s_type,//'POST',
		  url: s_url,//'/weiphp/index.php?s=/addon/Forms/FormsAttribute/getDataAndShow',
		  dataType: 'json',
		  data: datas,
		  success: s_success
		});
}
function onClickDel(del_id){
	var cont_com = $("li#com"+del_id).attr("name");
	$("button#"+cont_com).removeAttr("disabled");//alert(cont_com);
	$("button#"+cont_com).css("background","#1fce02");
	$("li#com"+del_id).remove();
}

function showDel(del_id){ 
	$("div#deleteButton"+del_id).show();
	//$("div.Delshow").html("<a><image src='<?php echo ADDON_PUBLIC_PATH;?>/delete.png'></a>");
}

function cancleDel(del_id){
	//$("div.Delshow").html("");
	$("div#deleteButton"+del_id).hide();
	//$("div#deleteButton"+del_id).html("删除");
}

function titleClick(id_count){
		//var clickfunction = this;
		var lab = $("span#com"+id_count);
		var text = lab.text();
		lab.html("");
		
		//建立一个文本框
		var input = $("<input id=content"+id_count+">");
		//input.attr("value",text);
		lab.append(input);
		input.focus();
		input.blur(function(){
			var inputnode = $("input#content"+id_count);
				//获取当前文本框的内容
				var inputext = inputnode.val();
				if(inputext != text && inputext!=""){
					lab.html("");
					var labelcont = $('<label class="title" onclick="titleClick('+id_count+')">'+inputext+'</label>');
					lab.append(labelcont);
				}else{
					lab.html("");
					var labelcont = $('<label class="title" onclick="titleClick('+id_count+')">'+text+'</label>');
					lab.append(labelcont);
				}
		});
		input.keyup(function(event){
			var kcode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
			if(kcode == 13){
				var inputnode = $("input#content"+id_count);
				//获取当前文本框的内容
				var inputext = inputnode.val();
				if(inputext != text && inputext!=""){
					lab.html("");
					var labelcont = $('<label class="title" onclick="titleClick('+id_count+')">'+inputext+'</label>');
					lab.append(labelcont);
				}else{
					lab.html("");
					var labelcont = $('<label class="title" onclick="titleClick('+id_count+')">'+text+'</label>');
					lab.append(labelcont);
				}
			}
			//需要清楚span上的点击事件
			lab.unbind("click");
		});
		
	}
function subTitleClick(id_count){
		var content = "";
		var lab = $("div#subtitle"+id_count);
		var text = lab.text().replace(/\r?\n/gi, "<br />");
		lab.html("");
		
		//建立一个文本框
		var input = $("<textarea id=content"+id_count+">");
		input.attr("value",text);
		lab.append(input);
		input.focus();
		input.blur(function(){			
				//获取当前文本框的内容
				var inputnode = $("textarea#content"+id_count);
				var inputext = inputnode.val().replace(/\r?\n/gi, "<br />");
				if(inputext != text && inputext!=""){
					lab.html("");
					//alert(content);
					//lab.append($("<div>"+inputext+content+"</div>"));
					var labelcont = $('<label class="title" onclick="subTitleClick('+id_count+')">'+inputext+'</label>');
					lab.append(labelcont);
				}else{
					lab.html("");
					var labelcont = $('<label class="title" onclick="subTitleClick('+id_count+')">'+text+'</label>');
					lab.append(labelcont);
				}
		});
	}
</script> 
 <!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<?php echo hook('pageFooter', 'widget');?>
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
	
</div>

	<!-- /底部 -->
</body>
</html>