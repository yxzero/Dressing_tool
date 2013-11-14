<?php

class IndexAction extends Action{
	
	//初始化数据
	public function index(){
		$list = M('collection')->order('id DESC')->limit(10)->select();
		$i=0;
		while($i<10 && $list[$i]['cover'])
		{
			$str[$i]="./Uploads/".$list[$i]['cover'];
			$imglist= getimagesize($str[$i]);
			$height=$imglist[1];
			$with=$imglist[0];
			$list[$i]['height']=(int)(220/$with*$height);
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
			$list[$i]['height']=(int)(220/$with*$height);
			$i=$i+1;
		}
        $this->ajaxReturn($list);
	}
	public function tagfind(){
		$tagname = $_REQUEST['altag'];
		if(!$abname){$this->showmsg_box('系统查找不到该操作，请重试',__APP__,0,3);} 
		$condition['tag'] = $tagname;
		$list = M('collection')->where($condition)->order('id DESC')->limit(10)->select();
		$i=0;
		while($i<10 && $list[$i]['cover'])
		{
			$str[$i]="./Uploads/".$list[$i]['cover'];
			$imglist= getimagesize($str[$i]);
			$height=$imglist[1];
			$with=$imglist[0];
			$list[$i]['height']=(int)(220/$with*$height);
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
			$list[$i]['height']=(int)(220/$with*$height);
			$i=$i+1;
		}
        $this->ajaxReturn($list);
	}
	
}