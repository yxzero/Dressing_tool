<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <link rel="stylesheet" type="text/css" href="../Public/Css/style.css" />
 <script type="text/javascript" src="../Public/Js/Jquery/jquery.form.js"></script>
 <script type="text/javascript" src="../Public/Js/Jquery/jquery.min.js"></script>
  <title>穿衣利器</title>
 </head>
 <body>
<div id="container" class=" container" >
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="item" >
		<img src="__UPLOAD__/<?php echo ($vo["cover"]); ?>"  alt="<?php echo ($vo["coll_name"]); ?>"/>
		<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>"/>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>
<voilist name="listpicture" id="vo">
		<div class="itemmain">
		<img src="__UPLOAD__/<?php echo ($vo["name"]); ?>"/>
		<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>"/>
	</div>
</volist>		
</div>
</body>
</html>