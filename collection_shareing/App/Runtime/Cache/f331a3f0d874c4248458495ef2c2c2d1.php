<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="../Public/Css/style.css" />
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
<div name= menu class="menu" style="font-family:'微软雅黑'">	
  	<a href="<?php echo U('Index/tagfind',array('altag'=>'面试'));?>">面试</a><BR />
  	<a href="<?php echo U('Index/tagfind',array('altag'=>'约会'));?>">约会</a><BR />
  	<a href="<?php echo U('Index/tagfind',array('altag'=>'晚会'));?>">晚会</a><BR />
 	<a href="<?php echo U('Index/tagfind',array('altag'=>'运动'));?>">运动</a><BR />
	<a href="<?php echo U('Index/tagfind',array('altag'=>'上班'));?>">上班</a><BR />
	<a href="<?php echo U('Index/tagfind',array('altag'=>'家居'));?>">家居</a><BR />	
	</div>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="item" style="height:<?php echo ($vo["height"]); ?>px;">
		<a href="<?php echo U('Index/listcollection',array('id'=>$vo['id']));?>">
		<img src="__UPLOAD__/<?php echo ($vo["cover"]); ?>"  alt="<?php echo ($vo["coll_name"]); ?>"/>
		</a>
		<p style="font-family:'微软雅黑'">
		<a href="<?php echo U('Index/hits',array('id'=>$vo['id']));?>">赞</a>:<?php echo ($vo["hits"]); ?></p>
		<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>"/>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<div id="loading" class="loading-wrap">
	<span class="loading">加载中，请稍后...</span>
</div>
<div class="footer"><center>我是页脚</center></div>
<script type="text/javascript">
$(function(){
    //执行瀑布流
    var $container = $('#container');
	  $container.masonry({
	    itemSelector : '.item',
	    isAnimated: true
	  });

	var loading = $("#loading").data("on", false);
	$(window).scroll(function(){
		if(loading.data("on")) return;
		if($(document).scrollTop() > 
			$(document).height()-$(window).height()-$('.footer').height()){
			//加载更多数据
			loading.data("on", true).fadeIn();
			$.get(
				"<?php echo U('Index/getDbMore');?>", 
				{"last_id" : $("#container>div:last>input").val()},
				function(data){
					var html = "";
					if($.isArray(data)){
						for(i in data){
						<!--	html += "<div class=\"item\" style=\"height:"+data[i]['width']+"px;\"><img src="__UPLOAD__/s_{ $vo.cover}" alt="{ $vo.coll_name}" />";-->
							html += "<div class=\"item\" style=\"height:"+data[i]['height']+"px;\">";
							html += "<a href=\"<?php echo U('Index/listcollection',array('id'=>"+data[i]['id']+"));?>\">";
							html += "<img src=\"__UPLOAD__/"+data[i]['cover']+"\" alt=\""+data[i]['cover']+"\" /></a>";
							html += "<p style=\"font-family:'微软雅黑'\"><a href=\"<?php echo U('Index/hits',array('id'=>"+data[i]['id']+"));?>\">赞</a>:"+data[i]['hits']+"</p>";   
							html += "<input type=\"hidden\" name=\"id\" value=\""+data[i]['id']+"\"/></div>";
						}
						var $newElems = $(html).css({ opacity: 0 }).appendTo($container);
						$newElems.imagesLoaded(function(){
							$newElems.animate({ opacity: 1 });
							$container.masonry( 'appended', $newElems, true ); 
				        });
				        loading.data("on", false);
					}
					loading.fadeOut();
				},
				"json"
			);
		}
	});
});
</script>
</body>
</html>