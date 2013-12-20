<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <link rel="stylesheet" type="text/css" href="../Public/Css/style.css" />
 <script type="text/javascript" src="../Public/Js/Jquery/jquery.form.js"></script>
 <script type="text/javascript" src="../Public/Js/Jquery/jquery.min.js"></script>
<title>回答</title>
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

<div class="main">
<?php if(is_array($allquestions)): $i = 0; $__LIST__ = $allquestions;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
    <p>问题：<?php echo ($vo["questions"]); ?></p>
</li><?php endforeach; endif; else: echo "" ;endif; ?>
<h3>所有回答</h3>
<?php if(is_array($allanswers)): $i = 0; $__LIST__ = $allanswers;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="answer" style="微软雅黑">
<li>
	<p><?php echo ($vo["id"]); ?>说道：</p></BR>
    <p><?php echo ($vo["answers"]); ?></p></BR>
</li>
</div><?php endforeach; endif; else: echo "" ;endif; ?>
<h3>回答</h3>

<form id="form1" method='post' action="<?php echo U('Answers/putanswer',array('queid'=>$vo['id']));?>">

   <table cellpadding=2 cellspacing=2>
 
        <tr><td colspan="2"><div id="result" class="result" style="display:none;"></div></td></tr>
		 
        <tr><td >您的建议</td><td><textarea name="content" id="content" rows="5" cols="45"></textarea></td></tr>
		 
		<td><input type="submit"  class="button" value="提交"></td>
		</tr> 
   </table>
</form>

</body>
</html>