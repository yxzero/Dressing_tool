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
 <script type="text/javascript" src="/pubuliu/public/Js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/pubuliu/public/Js/jquery.masonry.min.js"></script>
<div class="top">
<div name= menu class="menu" style="font-family:'微软雅黑'">
	<li><a href="__APP__"><span>首页</span></li>
  	<li><a href="<?php echo U('Share/index');?>"><span>晒搭配</span></a></li>
  	<li class="photos"><a href="<?php echo U('Login/index');?>"><span>登陆</span></a></li>
  	<li class="setting"><a href="<?php echo U('Answers/index');?>"><span>问答</span></a></li>
	<li class="logout"><a href="<?php echo U('Login/logout');?>"><span>退出</span></a></li>
	
</div>
</div>
<div id="container" class=" container" >
<?php if(is_array($cover)): $i = 0; $__LIST__ = $cover;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="item" style="height:<?php echo ($vo["height"]); ?>px;">
		<img src="__UPLOAD__/<?php echo ($vo["cover"]); ?>"/>
		<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>"/>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>
<?php if(is_array($listpicture)): $i = 0; $__LIST__ = $listpicture;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="itemmain">
		<img src="__UPLOAD__/<?php echo ($vo["name"]); ?>" alt="<?php echo ($vo["tag"]); ?>"/>
		<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>"/>
		<p style="font-family:'微软雅黑'"><?php echo ($vo["tag"]); ?>：<BR>
			价格：<?php echo ($vo["prize"]); ?><BR>
			<a href=<?php echo ($vo["link"]); ?>>去看看</a>
		</p>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>		
</div>
</body>
</html>