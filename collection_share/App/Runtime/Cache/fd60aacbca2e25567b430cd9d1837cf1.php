<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="../Public/Css/style.css" />
<title>问答</title>
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

<form id="form1" name="form1" method="post" action="<?php echo U('Answers/que');?>">
  <label>场合
  <input name="text_occasion" type="text" size="30" maxlength="20" />
  </label>
  <label>风格/类型
  <input name="text_style" type="text" size="30" maxlength="20" />
  </label>
  <input type="submit" name="submit" value="提问" class="button" />
</form>
<h4>全部问题</h4>
<?php if(is_array($allquestions)): $i = 0; $__LIST__ = $allquestions;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
    <p style="微软雅黑"><?php echo ($vo["questions"]); ?>	<a href="<?php echo U('Answers/answersq',array('queid'=>$vo['id']));?>">我要回答</a></p>
</li><?php endforeach; endif; else: echo "" ;endif; ?>

</body>
</html>