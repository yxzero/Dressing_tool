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
 <h2>上传搭配封面</h2>

<form id="upload" method='post' action="__URL__/upload/" enctype="multipart/form-data">
<div class="result" >上传允许文件类型：gif png jpg 图像文件</div>
<p>搭配名称：
    <input name="title" type="text" id="title" size="33">
</p>
<p>搭配主图：
  <input name="image" id="image" type="file" />
  </p>
<p>搭配标签:
  <label for="c_tag"></label>
  <select name="c_tag" id="c_tag">
    <option value="面试">面试</option>
    <option value="约会">约会</option>
    <option value="晚会">晚会</option>
    <option value="运动">运动</option>
    <option value="上班">上班</option>
    <option value="家居">家居</option>
    <option value="0" selected>选择标签</option>
  </select>
</p>
<p>搭配描述：</p>
<p>
  <textarea name="content" id="content" rows="5" cols="79"></textarea>
  <input type="submit" value="提交" class="button" >
</p>
</form> 
</div>  
<div class="main">
<h2>上传商品细节</h2>
<form id="form1" method='post' action="__URL__/insert">
   <table cellpadding=2 cellspacing=2>
        <tr><td colspan="2"><div id="result" class="result" style="display:none;"></div></td></tr>

	 	<tr><td width="101"><input type="hidden" name="ajax" value="1"></td>
		<tr>
		  <td >商品1url</td><td width="767" ><input name="item1" type="text" id="item1" size="90">
		    <label for="tag1"></label>
		    <select name="tag1" id="tag1">
		      <option value="上衣">上衣</option>
		      <option value="裤装">裤装</option>
		      <option value="裙装">裙装</option>
		      <option value="鞋子">鞋子</option>
		      <option value="配饰">配饰</option>
		      <option value="其他">其他</option>
		      <option value="0" selected>选择tag</option>
	        </select></td></tr>
		<tr>
		  <td >商品2url</td><td ><input name="item2" type="text" id="item2" size="90">
		    <select name="tag2" id="tag2">
		      <option value="上衣">上衣</option>
		      <option value="裤装">裤装</option>
		      <option value="裙装">裙装</option>
		      <option value="鞋子">鞋子</option>
		      <option value="配饰">配饰</option>
		      <option value="其他">其他</option>
		      <option value="0" selected>选择tag</option>
	        </select></td></tr>
		<tr>
		  <td >商品3url</td><td ><input name="item3" type="text" id="item3" size="90">
		    <select name="tag3" id="tag3">
		      <option value="上衣">上衣</option>
		      <option value="裤装">裤装</option>
		      <option value="裙装">裙装</option>
		      <option value="鞋子">鞋子</option>
		      <option value="配饰">配饰</option>
		      <option value="其他">其他</option>
		      <option value="0" selected>选择tag</option>
	        </select></td></tr>
		<tr>
		  <td >商品4url</td><td ><input name="item4" type="text" id="item4" size="90">
		    <select name="tag4" id="tag4">
		      <option value="上衣">上衣</option>
		      <option value="裤装">裤装</option>
		      <option value="裙装">裙装</option>
		      <option value="鞋子">鞋子</option>
		      <option value="配饰">配饰</option>
		      <option value="其他">其他</option>
		      <option value="0" selected>选择tag</option>
	        </select></td></tr>
		<tr>
		  <td >商品5url</td><td ><input name="item5" type="text" id="item5" size="90">
		    <select name="tag5" id="tag5">
		      <option value="上衣">上衣</option>
		      <option value="裤装">裤装</option>
		      <option value="裙装">裙装</option>
		      <option value="鞋子">鞋子</option>
		      <option value="配饰">配饰</option>
		      <option value="其他">其他</option>
		      <option value="0" selected>选择tag</option>
	        </select></td></tr>
		<tr>
		  <td >商品6url</td><td ><input name="item6" type="text" id="item6" size="90">
		    <select name="tag6" id="tag6">
		      <option value="上衣">上衣</option>
		      <option value="裤装">裤装</option>
		      <option value="裙装">裙装</option>
		      <option value="鞋子">鞋子</option>
		      <option value="配饰">配饰</option>
		      <option value="其他">其他</option>
		      <option value="0" selected>选择tag</option>
	        </select></td></tr>
		<td><td align="right" >   <input type="submit"  class="button" value="提交"></td>
        </tr> 
   </table>
</form>
</div>
</body>
</html>