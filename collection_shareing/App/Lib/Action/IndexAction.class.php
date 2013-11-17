<?php

class IndexAction extends PublicAction{
	
	//初始化数据
	public function index(){
		if( isset($_SESSION['name']) ){
	   		echo "欢迎回来：".$_SESSION['name'];
		}else{
	   		echo "未登录";
		}
		$list = M('collection')->order('id DESC')->limit(10)->select();
		$i=0;
		while($i<10 && $list[$i]['cover'])
		{
			$str[$i]="./Uploads/".$list[$i]['cover'];
			$imglist= getimagesize($str[$i]);
			$height=$imglist[1];
			$with=$imglist[0];
			$list[$i]['height']=(int)(200/$with*$height)+38;
			$i=$i+1;
		}
		$this->assign('list', $list);
		$this->display();
	}
	
	//获取下一栏数据
	public function getDbMore(){
		$last_id = $this->_get('last_id');
        $map['id'] = array('lt', $last_id);
        $list = D('collection')->where($map)->order('id DESC')->limit(3)->select();
		$i=0;
		while($i<3 && $list[$i]['cover'])
		{
			$str[$i]="./Uploads/".$list[$i]['cover'];
			$imglist= getimagesize($str[$i]);
			$height=$imglist[1];
			$with=$imglist[0];
			$list[$i]['height']=(int)(200/$with*$height)+38;
			$i=$i+1;
			
		}
        $this->ajaxReturn($list);
	}
	public function tagfind(){
		$tagname = $_REQUEST['altag'];
		if(!$tagname){$this->showmsg_box('系统查找不到该操作，请重试',__APP__,0,3);} 
		$condition['tag'] = $tagname;
		$list = M('collection')->where($condition)->order('id DESC')->limit(10)->select();
		$i=0;
		while($i<10 && $list[$i]['cover'])
		{
			$str[$i]="./Uploads/".$list[$i]['cover'];
			$imglist= getimagesize($str[$i]);
			$height=$imglist[1];
			$with=$imglist[0];
			$list[$i]['height']=(int)(200/$with*$height)+38;
			$i=$i+1;
		}
		$this->assign('list', $list);
		$this->display();
	}
	public function gettagMore(){
		$tagname = $_REQUEST['altag'];
		$last_id = $this->_get('last_id');
		$map['tag'] = $tagname;
        $map['id'] = array('lt', $last_id);
        $list = D('collection')->where($map)->order('id DESC')->limit(3)->select();
		$i=0;
		while($i<3 && $list[$i]['cover'])
		{
			$str[$i]="./Uploads/".$list[$i]['cover'];
			$imglist= getimagesize($str[$i]);
			$height=$imglist[1];
			$with=$imglist[0];
			$list[$i]['height']=(int)(200/$with*$height)+38;
			$i=$i+1;
		}
        $this->ajaxReturn($list);
	}
	public function hits()
	{
		$id=$_REQUEST['id'];
		if($id)
		{
	     $model=M("collection");
		 $isphoto=$model->where("id=$id")->find();
                 if($isphoto)
                 { 
				 $model->where('id='.$id)->setInc("hits",1);
				 }
		}
		//$this->redirect('Index/index');
		$this->showmsg_box('操作成功',__APP__,0,0);
	}
	public function listcollection()
	{
		$id=$_REQUEST['id'];
		$cover=M("collection")->where("id=$id")->select();
		$list=M("picture")->where("cid=$id")->order('id DESC')->select();
		$str="./Uploads/".$cover[0]['cover'];
		$imglist= getimagesize($str);
		$height=$imglist[1];
		$with=$imglist[0];
		$cover[0]['height']=(int)(200/$with*$height);
		$this->assign('cover', $cover);
		$this->assign('listpicture', $list);
		$this->display();
	}
	public function sorthits()
	{
		if( isset($_SESSION['name']) ){
	   		echo "欢迎回来".$_SESSION['name'];
		}else{
	   		echo "未登录";
		}
		$list = M('collection')->order('hits DESC')->limit(10)->select();
		$i=0;
		while($i<10 && $list[$i]['cover'])
		{
			$str[$i]="./Uploads/".$list[$i]['cover'];
			$imglist= getimagesize($str[$i]);
			$height=$imglist[1];
			$with=$imglist[0];
			$list[$i]['height']=(int)(200/$with*$height)+38;
			$i=$i+1;
		}
		$this->assign('list', $list);
		$this->display();
	}
	public function getDbMoresort(){
		$last_id = $this->_get('last_id');
        $map['id'] = array('lt', $last_id);
        $list = D('collection')->where($map)->order('hits DESC')->limit(3)->select();
		$i=0;
		while($i<3 && $list[$i]['cover'])
		{
			$str[$i]="./Uploads/".$list[$i]['cover'];
			$imglist= getimagesize($str[$i]);
			$height=$imglist[1];
			$with=$imglist[0];
			$list[$i]['height']=(int)(200/$with*$height)+38;
			$i=$i+1;
			
		}
        $this->ajaxReturn($list);
	}
}