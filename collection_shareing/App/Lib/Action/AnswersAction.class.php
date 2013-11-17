<?php
class AnswersAction extends Action{
	public function index(){
		$list=M('question')->order('id DESC')->select();
        $this->assign('allquestions', $list);		
		$this->display();
	}
	
	public function que()
	{
		$mydata['owner']=$_SESSION['id'];
		$occasion=$_POST['text_occasion'];
		$style=$_POST['text_style'];
		$mydata['questions']=$occasion.$style;
		if( !$mydata['owner'] )
		{
			$this->error('请先登录',U('Login/index'));
		}
		$Question=M('question');
		if($mydata) {
			$result=$Question->add($mydata);
        }
		if($result ) {
				$this->success('提问成功！');
            }else{
                $this->error('提问失败！');
            } 
	}
	
	public function answersq(){
		$queid=$_REQUEST['queid'];
	   session('queid',$queid);
	   $list=M('answer')->where("queid=$queid")->order('id DESC')->select();
	   $list2=M('question')->where("id=$queid")->order('id DESC')->select();
	   
	  // echo $queid;
	    //echo $list[0]['answers'];
	    //echo $list2[0]['questions'];
		
        $this->assign('allanswers', $list);	
		$this->assign('allquestions', $list2);	
		$this->display();	
	}
	
	public function putanswer()
	{
	
		$id=$_SESSION['id'];
		$queid=$_SESSION['queid'];
	
		if(!$id)
		{
			$this->error('请先登录',U('Login/index'));
		}
		
		$list = D('answer')->where("id=$id")->order('queid DESC')->select();
		
		$i=0;
		while( $i<20 && $list[$i]['queid'] )
		{
        	if($list[$i]['queid']==$queid ) {
            	$this->error('很抱歉,你已经回答过该问题',U('Answers/index'));
        	}
			else $i=$i+1;
		}
	
		
		$mydata['id']=$id;
		$mydata['answers']=$_POST['content'];
	
		$mydata['queid']=$queid;
		
		$Answer=M('answer');
		
		if( $mydata ) {
			$result=$Answer->add($mydata);
        }
		
		if($result) {
				$this->success('回答成功！');
            }else{
                $this->error('回答失败！');
            } 
		
	}
}