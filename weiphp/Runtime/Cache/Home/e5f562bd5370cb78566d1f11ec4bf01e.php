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
	
    <div class="span9 page_message">
        <section id="contents">
            <!--自动加载插件标题栏-->
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

            <h3 style="margin-top: 50px;margin-left: 30px">已存规则</h3>
            <select style="margin-top: 50px;margin-left: 30px">
                <option></option>
            </select>





<form method="post">


            <div>
                <h3 style="margin-top: 50px;margin-left: 30px">规则标题</h3>
                <input type="text" name="title" style="margin-top: 30px;margin-left: 30px">
                <!--<textarea style="margin-top: 30px;margin-left: 30px"></textarea>-->
            </div>
            <h3 style="margin-top: 50px;margin-left: 30px">规则类型<a>(默认抽奖券)</a></h3>
            <table style="margin-top: 30px;margin-left: 30px">
                <tr>
                    <td>
                        <!--<input type="radio" class="regular-radio" name="rule_radio" value="全部派券" >-->
                        <!--<label id="rule_button_all" name="rule_radio" value="全部派券">全部派券</label>-->
                        <div class="check-item">
                            <input type="radio" name="rule_radio" id="rule_button_all" checked class="regular-radio" value="全部派券" >
                            <label for="rule_button_all"></label>全部派券
                        </div>

                    </td>
                    <td>
                    <!--<input type="radio" class="regular-radio" name="rule_radio" value="全部派券">-->
                    <!--<label id="rule_button_pai" name="rule_radio" value="全部派券">排名派券</label>-->
                        <div class="check-item">
                            <input type="radio" name="rule_radio" id="rule_button_pai" checked class="regular-radio" value="排名派券" >
                            <label for="rule_button_pai"></label>排名派券
                        </div>

                </td>
                    <td>
                        <!--<input type="radio" class="regular-radio" name="rule_radio" value="全部派券"  style="background-color: #000088">-->
                        <!--<label id="rule_button_chou" name="rule_radio" value="全部派券">抽奖派券</label>-->
                        <div class="check-item">
                            <input type="radio" name="rule_radio" id="rule_button_chou" checked class="regular-radio" value="抽奖派券" >
                            <label for="rule_button_chou"></label>抽奖派券
                        </div>

                    </td>
                </tr>
            </table>
            <!--全部派券-->
            <div id="paiquan_all"  >
                <h4 style="margin-top: 50px;margin-left: 30px">奖品名称</h4>
                <!--优惠券API接口-->
                <select id="quan_all" class="quan">

                </select>
                <h4 style="margin-top: 50px;margin-left: 30px">奖品图片</h4>

                <case>
                    <div style="margin-top: 50px;margin-left: 30px" class="controls">
                        <input type="file" id="upload_picture_num3<?php echo ($field["name"]); ?>">
                        <input type="hidden" name="<?php echo ($field["name"]); ?>" id="cover_id_<?php echo ($field["name"]); ?>" value="<?php echo ($data[$field['name']]); ?>"/>
                        <div class="upload-img-box">
                            <?php if(!empty($data[$field['name']])): ?><div class="upload-pre-item"><img src="/weiphp<?php echo (get_cover($data[$field['name']],'path')); ?>"/></div><?php endif; ?>
                        </div>
                    </div>
                    <script type="text/javascript">
                        //上传图片
                        /* 初始化上传插件 */
                        $("#upload_picture_num3<?php echo ($field["name"]); ?>").uploadify({
                            "height"          : "120",
                            "swf"             : "/weiphp/Public/static/uploadify/uploadify.swf",
                            "fileObjName"     : "download",
                            "buttonText"      : "上传图片",
                            "uploader"        : "<?php echo U('home/File/uploadPicture',array('session_id'=>session_id()));?>",
                            "width"           : 120,
                            'removeTimeout'	  : 1,
                            'fileTypeExts'	  : '*.jpg; *.png; *.gif;',
                            "onUploadSuccess" : uploadPicture<?php echo ($field["name"]); ?>
                        });
                        function uploadPicture<?php echo ($field["name"]); ?>(file, data){
                            var data = $.parseJSON(data);
                            var src = '';
                            if(data.status){
                                $("#cover_id_<?php echo ($field["name"]); ?>").val(data.id);
                                src = data.url || '/weiphp' + data.path;
                                $("#cover_id_<?php echo ($field["name"]); ?>").parent().find('.upload-img-box').html(
                                        '<div class="upload-pre-item"><img src="' + src + '"/></div>'
                                );
                            } else {
                                updateAlert(data.info);
                                setTimeout(function(){
                                    $('#top-alert').find('button').click();
                                    $(that).removeClass('disabled').prop('disabled',false);
                                },1500);
                            }
                        }
                    </script>
                </case>
                <script>


                        $("#paiquan_all").hide();

                </script>



            </div>
            <!--排名派券-->
            <div  id="paiquan_pai">
                <table style="margin-top: 50px;margin-left: 30px" id="table_pai">
                    <tr>
                        <td></td>
                        <td>奖品名称</td>
                        <td>起始名次</td>
                        <td>结束名次</td>

                        <td>奖品图片</td>

                    </tr>
                    <tr>
                        <td>
                            <input type="button" class="radio_pai btn" value="X">
                        </td>
                        <td>
                            <select id="quan_pai1" class="quan">

                            </select>
                        </td>
                        <td>
                            <input type="text" name="from" >
                        </td>
                        <td>
                            <input type="text" name="end" >
                        </td>

                        <td>
                            <case>
                                <div class="controls">
                                    <input type="file" class="upload_picture<?php echo ($field["name"]); ?>">
                                    <input type="hidden" name="<?php echo ($field["name"]); ?>" id="cover_id_<?php echo ($field["name"]); ?>" value="<?php echo ($data[$field['name']]); ?>"/>
                                    <div class="upload-img-box">
                                        <?php if(!empty($data[$field['name']])): ?><div class="upload-pre-item"><img src="/weiphp<?php echo (get_cover($data[$field['name']],'path')); ?>"/></div><?php endif; ?>
                                    </div>
                                </div>
                                <!--<script type="text/javascript">-->
                                    <!--//上传图片-->
                                    <!--/* 初始化上传插件 */-->
                                    <!--$("#upload_picture_num4<?php echo ($field["name"]); ?>").uploadify(<?php echo --> <!--"height" : "50",--> <!--"swf" : "/weiphp/Public/static/uploadify/uploadify.swf",--> <!--"fileObjName" : "download",--> <!--"buttonText" : "上传图片",--> <!--"uploader" : "{:U('home/File/uploadPicture',array('session_id'=>session_id()));?>",--> <!--"width" : 70,--> <!--'removeTimeout' : 1,--> <!--'fileTypeExts' : '*.jpg; *.png; *.gif;',--> <!--"onUploadSuccess" : uploadPicture<?php echo ($field["name"]); ?>-->
                                    <!--});-->
                                    <!--function uploadPicture<?php echo ($field["name"]); ?>(file, data)<?php echo --> <!--var data = $.parseJSON(data);--> <!--var src = '';--> <!--if(data.status){--> <!--$("#cover_id_{$field.name;?>").val(data.id);-->
                                            <!--src = data.url || '/weiphp' + data.path;-->
                                            <!--$("#cover_id_<?php echo ($field["name"]); ?>").parent().find('.upload-img-box').html(-->
                                                    <!--'<div class="upload-pre-item"><img src="' + src + '"/></div>'-->
                                            <!--);-->
                                        <!--} else <?php echo --> <!--updateAlert(data.info);--> <!--setTimeout(function(){--> <!--$('#top-alert').find('button').click();--> <!--$(that).removeClass('disabled').prop('disabled',false);--> <!--;?>,1500);-->
                                        <!--}-->
                                    <!--}-->
                                <!--</script>-->
                            </case>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <input type="button" class="radio_pai btn" value="X">
                        </td>
                        <td>
                            <select id="quan_pai2" class="quan">

                            </select>
                        </td>
                        <td>
                            <input type="text" name="from" >
                        </td>
                        <td>
                            <input type="text" name="end" >
                        </td>

                        <td>
                            <case>
                                <div class="controls">
                                    <input type="file" class="upload_picture<?php echo ($field["name"]); ?>">
                                    <input type="hidden" name="<?php echo ($field["name"]); ?>" id="cover_id_<?php echo ($field["name"]); ?>" value="<?php echo ($data[$field['name']]); ?>"/>
                                    <div class="upload-img-box">
                                        <?php if(!empty($data[$field['name']])): ?><div class="upload-pre-item"><img src="/weiphp<?php echo (get_cover($data[$field['name']],'path')); ?>"/></div><?php endif; ?>
                                    </div>
                                </div>
                                <!--<script type="text/javascript">-->
                                    <!--//上传图片-->
                                    <!--/* 初始化上传插件 */-->
                                    <!--$("#upload_picture_num6<?php echo ($field["name"]); ?>").uploadify(<?php echo --> <!--"height" : "50",--> <!--"swf" : "/weiphp/Public/static/uploadify/uploadify.swf",--> <!--"fileObjName" : "download",--> <!--"buttonText" : "上传图片",--> <!--"uploader" : "{:U('home/File/uploadPicture',array('session_id'=>session_id()));?>",--> <!--"width" : 70,--> <!--'removeTimeout' : 1,--> <!--'fileTypeExts' : '*.jpg; *.png; *.gif;',--> <!--"onUploadSuccess" : uploadPicture<?php echo ($field["name"]); ?>-->
                                    <!--});-->
                                    <!--function uploadPicture<?php echo ($field["name"]); ?>(file, data)<?php echo --> <!--var data = $.parseJSON(data);--> <!--var src = '';--> <!--if(data.status){--> <!--$("#cover_id_{$field.name;?>").val(data.id);-->
                                            <!--src = data.url || '/weiphp' + data.path;-->
                                            <!--$("#cover_id_<?php echo ($field["name"]); ?>").parent().find('.upload-img-box').html(-->
                                                    <!--'<div class="upload-pre-item"><img src="' + src + '"/></div>'-->
                                            <!--);-->
                                        <!--} else <?php echo --> <!--updateAlert(data.info);--> <!--setTimeout(function(){--> <!--$('#top-alert').find('button').click();--> <!--$(that).removeClass('disabled').prop('disabled',false);--> <!--;?>,1500);-->
                                        <!--}-->
                                    <!--}-->
                                <!--</script>-->
                            </case>

                        </td>

                    </tr>
                    <tr>
                        <td>
                            <input type="button" class="radio_pai btn" value="X">
                        </td>
                        <td>
                            <select id="quan_pai3" class="quan">

                            </select>
                        </td>
                        <td>
                            <input type="text" name="from"  >
                        </td>
                        <td>
                            <input type="text" name="end" >
                        </td>

                        <td>
                            <case>
                                <div class="controls">
                                    <input type="file" class="upload_picture<?php echo ($field["name"]); ?>">
                                    <input type="hidden" name="<?php echo ($field["name"]); ?>" id="cover_id_<?php echo ($field["name"]); ?>" value="<?php echo ($data[$field['name']]); ?>"/>
                                    <div class="upload-img-box">
                                        <?php if(!empty($data[$field['name']])): ?><div class="upload-pre-item"><img src="/weiphp<?php echo (get_cover($data[$field['name']],'path')); ?>"/></div><?php endif; ?>
                                    </div>
                                </div>
                                <!--<script type="text/javascript">-->
                                    <!--//上传图片-->
                                    <!--/* 初始化上传插件 */-->
                                    <!--$("#upload_picture_num5<?php echo ($field["name"]); ?>").uploadify(<?php echo --> <!--"height" : "50",--> <!--"swf" : "/weiphp/Public/static/uploadify/uploadify.swf",--> <!--"fileObjName" : "download",--> <!--"buttonText" : "上传图片",--> <!--"uploader" : "{:U('home/File/uploadPicture',array('session_id'=>session_id()));?>",--> <!--"width" : 70,--> <!--'removeTimeout' : 1,--> <!--'fileTypeExts' : '*.jpg; *.png; *.gif;',--> <!--"onUploadSuccess" : uploadPicture<?php echo ($field["name"]); ?>-->
                                    <!--});-->
                                    <!--function uploadPicture<?php echo ($field["name"]); ?>(file, data)<?php echo --> <!--var data = $.parseJSON(data);--> <!--var src = '';--> <!--if(data.status){--> <!--$("#cover_id_{$field.name;?>").val(data.id);-->
                                            <!--src = data.url || '/weiphp' + data.path;-->
                                            <!--$("#cover_id_<?php echo ($field["name"]); ?>").parent().find('.upload-img-box').html(-->
                                                    <!--'<div class="upload-pre-item"><img src="' + src + '"/></div>'-->
                                            <!--);-->
                                        <!--} else <?php echo --> <!--updateAlert(data.info);--> <!--setTimeout(function(){--> <!--$('#top-alert').find('button').click();--> <!--$(that).removeClass('disabled').prop('disabled',false);--> <!--;?>,1500);-->
                                        <!--}-->
                                    <!--}-->
                                <!--</script>-->
                            </case>

                        </td>

                    </tr>




                </table>
                <div style="margin-top: 30px;margin-left: 50px">
                    <button id="button_add_row1" class="btn">增加</button>
                    <!--<input ="button" class="regular-radio">-->
                    <!--<label id="button_add_row1">增 加</label>-->

                    <!--<input type="button" class="regular-radio">-->
                    <!--<label id="button_delete_row1">删 除</label>-->
                </div>
                <script>


                    $("#paiquan_pai").hide();

                </script>

            </div>










            <div id="paiquan_chou" >
                <table style="margin-top: 50px;margin-left: 30px" id="table_chou" >
                    <tr>
                        <td></td>
                        <td>奖品名称</td>
                        <td>奖品份数</td>
                        <td>总人数</td>
                        <td>概率</td>
                        <td>奖品图片</td>

                    </tr>
                    <tr>
                        <td>
                            <input type="button" class="radio_pai btn" value="X">
                        </td>
                        <td>
                            <select id="quan_chou1" class="quan">

                            </select>

                        </td>
                        <td>
                            <input type="text" name="award_num" >
                        </td>
                        <td>
                            <input type="text" name="people_num" >
                        </td>
                        <td>
                            <a></a>

                        </td>
                        <td>
                            <case>
                                <div class="controls">
                                    <input type="file" class="upload_picture<?php echo ($field["name"]); ?>">
                                    <input type="hidden" name="<?php echo ($field["name"]); ?>" id="cover_id_<?php echo ($field["name"]); ?>" value="<?php echo ($data[$field['name']]); ?>"/>
                                    <div class="upload-img-box">
                                        <?php if(!empty($data[$field['name']])): ?><div class="upload-pre-item"><img src="/weiphp<?php echo (get_cover($data[$field['name']],'path')); ?>"/></div><?php endif; ?>
                                    </div>
                                </div>
                                <!--<script type="text/javascript">-->
                                    <!--//上传图片-->
                                    <!--/* 初始化上传插件 */-->
                                    <!--$("#upload_picture_<?php echo ($field["name"]); ?>").uploadify(<?php echo --> <!--"height" : "50",--> <!--"swf" : "/weiphp/Public/static/uploadify/uploadify.swf",--> <!--"fileObjName" : "download",--> <!--"buttonText" : "上传图片",--> <!--"uploader" : "{:U('home/File/uploadPicture',array('session_id'=>session_id()));?>",--> <!--"width" : 70,--> <!--'removeTimeout' : 1,--> <!--'fileTypeExts' : '*.jpg; *.png; *.gif;',--> <!--"onUploadSuccess" : uploadPicture<?php echo ($field["name"]); ?>-->
                                    <!--});-->
                                    <!--function uploadPicture<?php echo ($field["name"]); ?>(file, data)<?php echo --> <!--var data = $.parseJSON(data);--> <!--var src = '';--> <!--if(data.status){--> <!--$("#cover_id_{$field.name;?>").val(data.id);-->
                                            <!--src = data.url || '/weiphp' + data.path;-->
                                            <!--$("#cover_id_<?php echo ($field["name"]); ?>").parent().find('.upload-img-box').html(-->
                                                    <!--'<div class="upload-pre-item"><img src="' + src + '"/></div>'-->
                                            <!--);-->
                                        <!--} else <?php echo --> <!--updateAlert(data.info);--> <!--setTimeout(function(){--> <!--$('#top-alert').find('button').click();--> <!--$(that).removeClass('disabled').prop('disabled',false);--> <!--;?>,1500);-->
                                        <!--}-->
                                    <!--}-->
                                <!--</script>-->
                            </case>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <input type="button" class="radio_pai btn" value="X">
                        </td>
                        <td>
                            <select id="quan_chou2" class="quan">

                            </select>
                        </td>
                        <td>
                            <input type="text" name="award_num" >
                        </td>
                        <td>
                            <input type="text" name="people_num" >
                        </td>
                        <td>
                            <a></a>
                        </td>
                        <td>
                            <case>
                                <div class="controls">
                                    <input type="file" class="upload_picture<?php echo ($field["name"]); ?>">
                                    <input type="hidden" name="<?php echo ($field["name"]); ?>" id="cover_id_<?php echo ($field["name"]); ?>" value="<?php echo ($data[$field['name']]); ?>"/>
                                    <div class="upload-img-box">
                                        <?php if(!empty($data[$field['name']])): ?><div class="upload-pre-item"><img src="/weiphp<?php echo (get_cover($data[$field['name']],'path')); ?>"/></div><?php endif; ?>
                                    </div>
                                </div>
                                <!--<script type="text/javascript">-->
                                    <!--//上传图片-->
                                    <!--/* 初始化上传插件 */-->
                                    <!--$("#upload_picture_num2<?php echo ($field["name"]); ?>").uploadify(<?php echo --> <!--"height" : "50",--> <!--"swf" : "/weiphp/Public/static/uploadify/uploadify.swf",--> <!--"fileObjName" : "download",--> <!--"buttonText" : "上传图片",--> <!--"uploader" : "{:U('home/File/uploadPicture',array('session_id'=>session_id()));?>",--> <!--"width" : 70,--> <!--'removeTimeout' : 1,--> <!--'fileTypeExts' : '*.jpg; *.png; *.gif;',--> <!--"onUploadSuccess" : uploadPicture<?php echo ($field["name"]); ?>-->
                                    <!--});-->
                                    <!--function uploadPicture<?php echo ($field["name"]); ?>(file, data)<?php echo --> <!--var data = $.parseJSON(data);--> <!--var src = '';--> <!--if(data.status){--> <!--$("#cover_id_{$field.name;?>").val(data.id);-->
                                            <!--src = data.url || '/weiphp' + data.path;-->
                                            <!--$("#cover_id_<?php echo ($field["name"]); ?>").parent().find('.upload-img-box').html(-->
                                                    <!--'<div class="upload-pre-item"><img src="' + src + '"/></div>'-->
                                            <!--);-->
                                        <!--} else <?php echo --> <!--updateAlert(data.info);--> <!--setTimeout(function(){--> <!--$('#top-alert').find('button').click();--> <!--$(that).removeClass('disabled').prop('disabled',false);--> <!--;?>,1500);-->
                                        <!--}-->
                                    <!--}-->
                                <!--</script>-->
                            </case>

                        </td>

                    </tr>
                    <tr>
                        <td>
                            <input type="button" class="radio_pai btn" value="X">
                        </td>
                        <td>
                            <select id="quan_chou3" class="quan">

                            </select>
                        </td>
                        <td>
                            <input type="text" name="award_num" >
                        </td>
                        <td>
                            <input type="text" name="people_num" >
                        </td>
                        <td>
                            <a></a>
                        </td>
                        <td>
                            <case>
                                <div class="controls">
                                    <input type="file" class="upload_picture<?php echo ($field["name"]); ?>">
                                    <input type="hidden" name="<?php echo ($field["name"]); ?>" id="cover_id_<?php echo ($field["name"]); ?>" value="<?php echo ($data[$field['name']]); ?>"/>
                                    <div class="upload-img-box">
                                        <?php if(!empty($data[$field['name']])): ?><div class="upload-pre-item"><img src="/weiphp<?php echo (get_cover($data[$field['name']],'path')); ?>"/></div><?php endif; ?>
                                    </div>
                                </div>
                                <!--<script type="text/javascript">-->
                                    <!--//上传图片-->
                                    <!--/* 初始化上传插件 */-->
                                    <!--$("#upload_picture_num1<?php echo ($field["name"]); ?>").uploadify(<?php echo --> <!--"height" : "50",--> <!--"swf" : "/weiphp/Public/static/uploadify/uploadify.swf",--> <!--"fileObjName" : "download",--> <!--"buttonText" : "上传图片",--> <!--"uploader" : "{:U('home/File/uploadPicture',array('session_id'=>session_id()));?>",--> <!--"width" : 70,--> <!--'removeTimeout' : 1,--> <!--'fileTypeExts' : '*.jpg; *.png; *.gif;',--> <!--"onUploadSuccess" : uploadPicture<?php echo ($field["name"]); ?>-->
                                    <!--});-->
                                    <!--function uploadPicture<?php echo ($field["name"]); ?>(file, data)<?php echo --> <!--var data = $.parseJSON(data);--> <!--var src = '';--> <!--if(data.status){--> <!--$("#cover_id_{$field.name;?>").val(data.id);-->
                                            <!--src = data.url || '/weiphp' + data.path;-->
                                            <!--$("#cover_id_<?php echo ($field["name"]); ?>").parent().find('.upload-img-box').html(-->
                                                    <!--'<div class="upload-pre-item"><img src="' + src + '"/></div>'-->
                                            <!--);-->
                                        <!--} else <?php echo --> <!--updateAlert(data.info);--> <!--setTimeout(function(){--> <!--$('#top-alert').find('button').click();--> <!--$(that).removeClass('disabled').prop('disabled',false);--> <!--;?>,1500);-->
                                        <!--}-->
                                    <!--}-->
                                <!--</script>-->
                            </case>

                        </td>

                    </tr>

                </table>
                <div style="margin-top: 30px;margin-left: 50px">
                    <button id="button_add_row2" class="btn">增加</button>
                    <!--<button id="button_delete_row2" class="btn submit-btn">删除</button>-->
                    <!--<input ="button" class="btn submit-btn">-->
                    <!--<label id="button_add_row2">增 加</label>-->

                    <!--<input type="button" class="btn submit-btn">-->
                    <!--<label id="button_delete_row2">删 除</label>-->
                </div>


            </div>




            <div style="margin-top: 50px;margin-left: 30px">

                <input type="submit" class="btn submit-btn" value="确认发布"  >

                <input type="button" class="btn save-btn" value="保存规则" >

                <input type="button" class="btn blue_btn" value="取消">

            </div>
</form>







        </section>
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

  <script>


      var quan_serial;//卡券唯一编号
      var quan_num;//卡券库存数
      var quan_title;
      //优惠券的获取
      window.onload=function(){
          $(".quan").append("<option>你妹涅米</option>");
          $(".quan").append("<option>你妹涅米</option>");
          $(".quan").append("<option>你妹涅米</option>");



          $.getJSON(
                  "http://m.test.saofu.cn/saofu-card/yunnex-kq/getactivitykq/10549840601068216320",
                  {"shopSerial":10549840601068216320},

                  function(data){
                      alert(12);
                      //数据处理
                      $.each(data.comments(),function(i,item){
                          $(".quan").append("<option>"+item.title+"</option>");
                          quan_serial[i]=item.serial;
                          quan_title[i]=item.title;
                          quan_num=item.skuQuantity;




                      });



                  }
          );




      }


      //照片上传


      $("#upload_picture<?php echo ($field["name"]); ?>").uploadify({
          "height"          : "50",
          "swf"             : "/weiphp/Public/static/uploadify/uploadify.swf",
          "fileObjName"     : "download",
          "buttonText"      : "上传图片",
          "uploader"        : "<?php echo U('home/File/uploadPicture',array('session_id'=>session_id()));?>",
          "width"           : 70,
          'removeTimeout'	  : 1,
          'fileTypeExts'	  : '*.jpg; *.png; *.gif;',
          "onUploadSuccess" : uploadPicture<?php echo ($field["name"]); ?>
      });
      function uploadPicture<?php echo ($field["name"]); ?>(file, data){
          var data = $.parseJSON(data);
          var src = '';
          if(data.status){
              $("#cover_id_<?php echo ($field["name"]); ?>").val(data.id);
              src = data.url || '/weiphp' + data.path;
              $("#cover_id_<?php echo ($field["name"]); ?>").parent().find('.upload-img-box').html(
                      '<div class="upload-pre-item"><img src="' + src + '"/></div>'
              );
          } else {
              updateAlert(data.info);
              setTimeout(function(){
                  $('#top-alert').find('button').click();
                  $(that).removeClass('disabled').prop('disabled',false);
              },1500);
          }
      }


//
      $("#rule_button_all").click(function(){
          $("#paiquan_pai").hide();
          $("#paiquan_chou").hide();
          $("#paiquan_all").show();





      });
      $("#rule_button_pai").click(function(){
          $("#paiquan_all").hide();
          $("#paiquan_chou").hide();
          $("#paiquan_pai").show();


      });
      $("#rule_button_chou").click(function(){
          $("#paiquan_pai").hide();
          $("#paiquan_all").hide();
          $("#paiquan_chou").show();


      });


      $("#button_add_row1").click(function(){
              var myTable=document.getElementById("table_pai");

              var newTr=myTable.insertRow(myTable.rows.length);
              var newTd1=newTr.insertCell(0);
              newTd1.innerHTML="<input type='button'class='radio_pai' onclick='deleteRow()'>";
              var newTd2=newTr.insertCell(1);
              newTd2.innerHTML="<input type='text' name='award_pai'>";
              var newTd3=newTr.insertCell(2);
              newTd3.innerHTML="<input type='text' name='from'>";
              var newTd4=newTr.insertCell(3);
              newTd4.innerHTML="<input type='text' name='end'>";
              var newTd5=newTr.insertCell(4);

              newTd5.innerHTML="<input type='file'>"







          });




      $("#button_add_row2").click(function(){
          var myTable=document.getElementById("table_chou");

          var newTr=myTable.insertRow(myTable.rows.length);
          var newTd1=newTr.insertCell(0);
          newTd1.innerHTML="<input type='button'class='radio_chou' onclick='deleteRow()'>";
          var newTd2=newTr.insertCell(1);
          newTd2.innerHTML="<textarea></textarea>";
          var newTd3=newTr.insertCell(2);
          newTd3.innerHTML="<textarea></textarea>";
          var newTd4=newTr.insertCell(3);
          newTd4.innerHTML="<textarea></textarea>";
          var newTd5=newTr.insertCell(4);
          newTd5.innerHTML="";
          var newTd6=newTr.insertCell(5);

          newTd6.innerHTML="<input type='file'>"




      });



//删除表格


$(".radio_pai").click(function(){
    var myTable=document.getElementById("table_pai");
    if(true){
        $(this).closest('tr').remove();
    }

});


//标题的获取
$('input[name="title"]').blur(function(){
    var title=$(this).val();


    $.get('',{'title':title},function(award_num){
//        alert(award_num);
    });
});

    //派券规则的获取
    $('input[name="rule_radio"]').blur(function(){
        var type=$(this).val();
        var row=$(this).closest("tr").index();
        var cell=$(this).closest("td").index();

        $.get('',{'rule_radio':type},function(award_num){
//        alert(award_num);
        });
    });
//排名派券的数据获取
$('input[name="award_pai"]').blur(function(){
    var award_pai=$(this).val();
    var row=$(this).closest("tr").index();
    var cell=$(this).closest("td").index();

    $.get('',{'award_pai':award_pai,'row':row},function(award_num){
//        alert(award_num);
    });


});

$('input[name="from"]').blur(function(){
    var from=$(this).val();
    var row=$(this).closest("tr").index();
    var cell=$(this).closest("td").index();

    $.get('',{'from':from,'row':row},function(award_num){
//        alert(award_num);
    });


});

$('input[name="end"]').blur(function(){
    var end=$(this).val();
    var row=$(this).closest("tr").index();
    var cell=$(this).closest("td").index();

    $.get('',{'end':end,'row':row},function(award_num){
//        alert(award_num);
    });


});


//抽奖派券的数据获取
$('input[name="award_chou"]').blur(function(){
    var award_chou=$(this).val();
    var row=$(this).closest("tr").index();
    var cell=$(this).closest("td").index();

    $.get('',{'award_chou':award_chou,'row':row},function(award_num){
//        alert(award_num);
    });


});
var award_num
$('input[name="award_num"]').blur(function(){
    award_num=$(this).val();
    var row=$(this).closest("tr").index();
    var cell=$(this).closest("td").index();

    $.get('',{'award_num':award_num,'row':row,'cell':cell},function(award_num){
//        alert(award_num);
    });


});

//概率的自动计算
$('input[name="people_num"]').blur(function(){
    var people_num=$(this).val();
    var row=$(this).closest("tr").index();
    var cell=$(this).closest("td").index();

//    $("#table_chou").rows[row].cells[cell].innerText("miao");
    var table= document.getElementById("table_chou");
    if(people_num!=null&&award_num!=null&&people_num!=0&&award_num!=0){
        table.rows[row].cells[cell+1].innerText=(award_num/people_num*100).toFixed(4)+"%";

    }else{
        table.rows[row].cells[cell+1].innerText="请输入..(●'◡'●)";
    }

    $.get('',{'people_num':people_num,'row':row},function(award_num){
//     alert(award_num);
    });


});
$('input[name="ef_num"]').blur(function(){
    var people_num=$(this).val();

    var row=$(this).closest("tr").index();

    var cell=$(this).closest("td").index();
    var table= document.getElementById("table_chou");
    table.rows[row].cells[cell+1].innerHTML("<a>people_num*award_num</a>");
    $.get('',{'people_num':people_num,'row':row},function(award_num){
        alert(award_num);
    });


});
function myGaiLv(thisObj,id){
//    alert(id+"你妹");
//    var tr=thisObj.parent('tr').child('td');
//    alert(tr.eq(2));
}

function OnInput(event,elementId){
//    var myTable=document.getElementById("table_chou");
//    var value=event.target.value;
//    var tr=elementId.parent('tr').child('td');
//    alert(tr.eq(2).value());




}
function OnPropChanged (event) {

    var value=event.srcElement.value

}




//
//function deleteRow(){
//    var myTable=document.getElementById("table_pai");
//
//
//
//
//    $(this).closest('tr').remove();
//
//
//
//
//
//
//
//}

      $("#button_delete_row2").click(function(){



      });


//上传图片

$(".upload_picture_num1<?php echo ($field["name"]); ?>").uploadify({
    "height"          : "50",
    "swf"             : "/weiphp/Public/static/uploadify/uploadify.swf",
    "fileObjName"     : "download",
    "buttonText"      : "上传图片",
    "uploader"        : "<?php echo U('home/File/uploadPicture',array('session_id'=>session_id()));?>",
    "width"           : 70,
    'removeTimeout'	  : 1,
    'fileTypeExts'	  : '*.jpg; *.png; *.gif;',
    "onUploadSuccess" : uploadPicture<?php echo ($field["name"]); ?>
});
function uploadPicture<?php echo ($field["name"]); ?>(file, data){
    var data = $.parseJSON(data);
    var src = '';
    if(data.status){
        $("#cover_id_<?php echo ($field["name"]); ?>").val(data.id);
        src = data.url || '/weiphp' + data.path;
        $("#cover_id_<?php echo ($field["name"]); ?>").parent().find('.upload-img-box').html(
                '<div class="upload-pre-item"><img src="' + src + '"/></div>'
        );
    } else {
        updateAlert(data.info);
        setTimeout(function(){
            $('#top-alert').find('button').click();
            $(that).removeClass('disabled').prop('disabled',false);
        },1500);
    }
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