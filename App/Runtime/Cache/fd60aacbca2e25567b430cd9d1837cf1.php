<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="../Public/Css/style.css" />
<title>问答</title>
</head>

<body>
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
    <p><?php echo ($vo["questions"]); ?></p><a href="<?php echo U('Answers/answersq',array('id'=>$vo['id']));?>">我要回答</a>
</li><?php endforeach; endif; else: echo "" ;endif; ?>

</body>
</html>