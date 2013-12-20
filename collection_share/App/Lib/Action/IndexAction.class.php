<?php
header('Content-Type: text/html; charset=UTF-8');

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
            $s=new SaeStorage();
			$str[$i]=$s->getUrl('public','/upload/'.$list[$i]['cover']);//获得图片地址，filepath为图片在storage中的路径
            //$str[$i]="./public/upload/".$list[$i]['cover'];
			$imglist= getimagesize($str[$i]);
			$height=$imglist[1];
			$with=$imglist[0];
			$list[$i]['height']=(int)(235/$with*$height)+38;
			$i=$i+1;
		}
		$this->assign('list', $list);
		$this->display();
	}
	
	//获取下一栏数据
	public function getDbMore(){
        //$last_id = $this->_get('last_id');
        $last_id = I('get.last_id');
        $map['id'] = array('lt', $last_id);
        $list = D('collection')->where($map)->order('id DESC')->limit(3)->select();
		$i=0;
		while($i<3 && $list[$i]['cover'])
		{
			$s=new SaeStorage();
			$str[$i]=$s->getUrl('public','/upload/'.$list[$i]['cover']);//获得图片地址，filepath为图片在storage中的路径
			$imglist= getimagesize($str[$i]);
			$height=$imglist[1];
			$with=$imglist[0];
			$list[$i]['height']=(int)(235/$with*$height)+38;
			$i=$i+1;
			
		}
        $this->ajaxReturn($list);
	}
	public function tagfind(){
        if( isset($_SESSION['name']) ){
	   		echo "欢迎回来：".$_SESSION['name'];
		}else{
	   		echo "未登录";
		}
		$tagname = $_REQUEST['altag'];
		if(!$tagname){$this->showmsg_box('系统查找不到该操作，请重试',__APP__,0,3);} 
		$condition['tag'] = $tagname;
		$list = M('collection')->where($condition)->order('id DESC')->limit(10)->select();
		$i=0;
		while($i<10 && $list[$i]['cover'])
		{
			$s=new SaeStorage();
			$str[$i]=$s->getUrl('public','/upload/'.$list[$i]['cover']);//获得图片地址，filepath为图片在storage中的路径
			$imglist= getimagesize($str[$i]);
			$height=$imglist[1];
			$with=$imglist[0];
			$list[$i]['height']=(int)(235/$with*$height)+38;
			$i=$i+1;
		}
		$this->assign('list', $list);
		$this->display();
	}
	public function gettagMore(){
		$last_id = I('get.last_id');
        $lasthit=M('collection')->where("id=$last_id")->select();
        $tagname=$lasthit[0]['tag'];
        $map['tag&id'] =array( $tagname,array('lt', $last_id),'_multi'=>true);
        $list = D('collection')->where($map)->order('id DESC')->limit(3)->select();
		$i=0;
		while($i<3 && $list[$i]['cover'])
		{
			$s=new SaeStorage();
			$str[$i]=$s->getUrl('public','/upload/'.$list[$i]['cover']);//获得图片地址，filepath为图片在storage中的路径
			$imglist= getimagesize($str[$i]);
			$height=$imglist[1];
			$with=$imglist[0];
			$list[$i]['height']=(int)(235/$with*$height)+38;
			$i=$i+1;
		}
        $this->ajaxReturn($list);
	}
	public function hits()
	{
		$id=$_GET['id'];
		if($id)
		{
	     $model=M("collection");
		 $isphoto=$model->where("id=$id")->find();
                 if($isphoto)
                 { 
				 $model->where('id='.$id)->setInc("hits",1);
				 }
		}
		$this->success('操作成功！');
	}
	public function listcollection()
	{
        if( isset($_SESSION['name']) ){
	   		echo "欢迎回来：".$_SESSION['name'];
		}else{
	   		echo "未登录";
		}
		$id=$_GET['id'];
        echo $id;
		$cover=M("collection")->where("id=$id")->select();
		$listpicture=M("picture")->where("cid=$id")->order('id DESC')->select();
		$s=new SaeStorage();
		$str=$s->getUrl('public','/upload/'.$cover[0]['cover']);//获得图片地址，filepath为图片在storage中的路径
		$imglist= getimagesize($str);
		$height=$imglist[1];
		$with=$imglist[0];
		$cover[0]['height']=(int)(235/$with*$height);
        
        
        session('reviewid',$id);
        
        
        $Model = new Model();//实例化一个model对象 没有对应任何数据表
        import('@.ORG.Page');// 导入分页类
        $count=$Model->query("select count(*) from think_reviews where cid=$id");
        $Page = new Page($count[0]['count(*)'],5);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
		$list = $Model->query("select b.id,a.usrname,b.review from think_usrinfo as a, think_reviews as b where a.id=b.uid and b.cid=$id LIMIT $Page->firstRow,$Page->listRows");
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出

        
        
        
		$this->assign('cover', $cover);
		$this->assign('listpicture', $listpicture);
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
			$s=new SaeStorage();
			$str[$i]=$s->getUrl('public','/upload/'.$list[$i]['cover']);//获得图片地址，filepath为图片在storage中的路径
			$imglist= getimagesize($str[$i]);
			$height=$imglist[1];
			$with=$imglist[0];
			$list[$i]['height']=(int)(235/$with*$height)+38;
			$i=$i+1;
		}
		$this->assign('list', $list);
		$this->display();
	}
	public function getDbMoresort(){
		$last_id = I('get.last_id');
        $lasthit=M('collection')->where("id=$last_id")->select();
        $hit=$lasthit[0]['hits'];
        /*$map['id&hits']=array(array('lt', $last_id),array('elt',$hit),'_multi'=>true);
        $list = D('collection')->where($map)->order('hits DESC')->limit(3)->select();*/
        
        
        $Model = new Model();
        $list=$Model->query("SELECT * FROM think_collection WHERE (hits <$hit) OR (hits =$hit AND id <$last_id) ORDER BY hits DESC LIMIT 3");
        
        
		$i=0;
		while($i<3 && $list[$i]['cover'])
		{
			$s=new SaeStorage();
			$str[$i]=$s->getUrl('public','/upload/'.$list[$i]['cover']);//获得图片地址，filepath为图片在storage中的路径
			$imglist= getimagesize($str[$i]);
			$height=$imglist[1];
			$with=$imglist[0];
			$list[$i]['height']=(int)(235/$with*$height)+38;
			$i=$i+1;
			
		}
        $this->ajaxReturn($list);
	}
    public function putreview()
    {
        $uid=$_SESSION['id'];
        $cid=$_SESSION['reviewid'];
        if(!$uid)
		{
			$this->error('请先登录',U('Login/index'));
		}
		$map['uid&cid']=array($uid,$cid,'_multi'=>true);
		$list = M('reviews')->where($map)->select();
       	if($list) {
            $this->error('很抱歉,你已经评论过了',U('Index/listcollection'));
        }
	
		
		$mydata['review']=$_POST['content'];
	
		$mydata['cid']=$cid;
        $mydata['uid']=$uid;
		
		
		if( $mydata ) {
			$result=M('reviews')->add($mydata);
        }
		
		if($result) {
				$this->success('回答成功！');
            }else{
                $this->error('回答失败！');
            } 
    }
}