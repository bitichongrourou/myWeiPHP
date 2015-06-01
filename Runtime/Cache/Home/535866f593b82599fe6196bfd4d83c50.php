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
<link href="<?php echo ADDON_PUBLIC_PATH;?>/css.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
<body>
<div id="container" class="container">
  <div class="top"></div>
  
  <div class="lead_box">
    <h6><?php echo ($question["title"]); ?></h6>
    <div class="lead_content">
      <div class="intro">
        <p class="w_tips"><?php echo ($question["intro"]); ?></p>
        <form id="form" action="<?php echo U('test?test_id='.$_GET['test_id']);?>" method="post">
          <input name="next_id" id="next_id" value="<?php echo ($next_id); ?>" type="hidden">
          <input name="question_id" id="question_id" value="<?php echo ($question["id"]); ?>" type="hidden">
          <input name="score" id="score" value="0" type="hidden">
          <?php if(is_array($extra)): $i = 0; $__LIST__ = $extra;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="form-item cf">
              <label class="radio">
                <input type="radio" value="<?php echo ($key); ?>" name="answer" onClick="doPost(this)" score="<?php echo (intval($vo["score"])); ?>" rel="<?php echo ($vo["next_id"]); ?>">
                <?php echo ($vo["title"]); ?> </label>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </form>
      </div>
    </div>
  </div>
  <div class="rotate"></div>
  <div class="bottom">
    <p class="copyright"><?php echo ($system_copy_right); ?></p>
  </div>
</div>
<script type="text/javascript">
function doPost(obj){
	$('#next_id').val($(obj).attr('rel'));
	$('#score').val($(obj).attr('score'));
	
	$('#form').submit();
}
</script>
</body>
</html>