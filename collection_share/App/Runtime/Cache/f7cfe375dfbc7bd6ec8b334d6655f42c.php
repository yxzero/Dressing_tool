<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>穿衣利器登陆</title>
<link href="../Public/Css/login.css" rel="stylesheet" type="text/css" />

</head>
<body>
<div id="box">
  <div id="title"></div>
  <div id="text">
    <ul>
      <li>为了保护个人信息的安全，将国家居民身份证号码<span class="font01">ID登录</span>改成<span class="font">Email账号登录</span></li>
      <li>若出现“<span class="font01">电子邮件或密码错误</span>”的情况，希望您在找回密码后记得及时更改密码设置</li>
      <li>在公共场合或者公用的电脑上请<span class="font">取消勾选</span><span class="font01">“记住密码”选项</span>，谨防他人恶意篡改而导致个人<span class="font01">隐私泄露</span></li>
    </ul>
  </div>
  <div id="bottom">
  
  <script type="text/javascript">
 function login()
 {
   //alert("jjj");
   document.form1.action = "<?php echo U('Login/checkLogin');?>";
	document.form1.submit();
 }
 
  function regisster()
 {	
	document.form1.action = "<?php echo U('Login/checkRegister');?>";
	document.form1.submit();
 }
 $(function(){
        
        $('#form1').ajaxForm({
            beforeSubmit:  checkForm, 
            success:       complete, 
            dataType: 'json'
        });
		
 function checkForm(){
            if( '' == $.trim($('#name').val())){
                alert('用户名不能为空');
                return false;
            }
			
			if( '' == $.trim($('#password').val())){
                alert('密码不能为空');
                return false;
            }
        }
		
		function complete(data){
            if (data.status==1){
                alert('注册成功！');
                window.location.href="<?php echo U('Member/login');?>";
            }else{
                alert(data.info);
            }
        }
		
         $("#name").blur(function(){
            var name=$("#name").val();
            $.post("<?php echo U('Member/checkAccount');?>",{name:name}, function(data){
                   $("#nameerror").html(data['info']);
            });
        });
        $("#password").blur(function(){
            var password=$("#password").val();
            if(password===""){
                $("#passworderror").html("密码不能空！"); 
            }else{
                $("#passworderror").html("*"); 
            }
        });
 
 </script>
  
    <form id="form1" name="form1" method="post" action="<?php echo U('Login/checkLogin');?>">
      <label for="name">
        <span class="font01">
      <input type="image" name="button" id="button" src="../Public/Images/denglu.jpg" />
      用户名</span></label>
      <input name="name" type="text" class="border" id="name" /><span id="nameerror" class="red">*</span>
      <br />
      <label for="password" class="font01">密　码</label>
      <input name="password" type="password" class="border" id="password" /><span id="passworderror" class="red">*</span>
      <br />
      <input type="checkbox" name="check" id="check" />
      <label for="check"></label>
      记住密码<br />
    </form>
	<br />
	<br />
	<form id="form1" name="form1" method="post" action="<?php echo U('Login/checkRegister');?>">
      <label for="name">
        <span class="font01">
      <input type="image" name="button" id="button" src="../Public/Images/zhuce.jpg" />
        用户名</span></label>
      <input name="name" type="text" class="border" id="name" /><span id="nameerror" class="red">*</span>
      <br />
      <label for="password" class="font01">密　码</label>
      <input name="password" type="password" class="border" id="password" /><span id="passworderror" class="red">*</span>
      <br />
    </form>
  </div>
</div>
</body>
</html>