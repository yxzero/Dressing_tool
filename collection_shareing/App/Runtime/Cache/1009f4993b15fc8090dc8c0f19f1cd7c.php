<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <link rel="stylesheet" type="text/css" href="../Public/Css/style.css" />
 <script type="text/javascript" src="../Public/Js/Jquery/jquery.form.js"></script>
 <script type="text/javascript" src="../Public/Js/Jquery/jquery.min.js"></script>
  <title>晒搭配</title>
 </head>
 <body>
 <div class="main">
 <h2>上传搭配封面</h2>
<?php if(!empty($data)): ?><img src="__UPLOAD__/m_<?php echo ($data["image"]); ?>" /> <img src="__UPLOAD__/s_<?php echo ($data["image"]); ?>" /><?php endif; ?>
<form id="upload" method='post' action="__URL__/upload/" enctype="multipart/form-data">
<div class="result" >上传允许文件类型：gif png jpg 图像文件，并生成2张缩略图，其中大图带水印，生成后会删除原图。</div>
<input name="image" id="image" type="file" />
<input type="submit" value="提交" class="button" >
</form> 
</div>  
<div class="main">
<h2>说说</h2>
<form id="form1" method='post' action="__URL__/insert">
   <table cellpadding=2 cellspacing=2>
        <tr><td colspan="2"><div id="result" class="result" style="display:none;"></div></td></tr>
        <tr><td >搭配名</td><td ><input type="text" name="title" id="title"></td></tr>
	    <tr><td >搭配描述</td><td><textarea name="content" id="content" rows="5" cols="25"></textarea></td></tr>
	 	<tr><td><input type="hidden" name="ajax" value="1"></td>
		<tr><td >帽子</td><td ><input type="text" name="hat" id="hat"></td></tr>
		<tr><td >上衣</td><td ><input type="text" name="	jacket" id="jacket"></td></tr>
		<tr><td >裤子</td><td ><input type="text" name="pants" id="pants"></td></tr>
		<tr><td >鞋子</td><td ><input type="text" name="shoes" id="shoes"></td></tr>
		<tr><td >裙子</td><td ><input type="text" name="skirt" id="skirt"></td></tr>
		<tr><td >配饰</td><td ><input type="text" name="accessories" id="accessories"></td></tr>
		<td><input type="submit"  class="button" value="提交"></td>
        </tr> 
   </table>
</form>
</div>
</body>
</html>