<?php
header('Content-Type: text/html; charset=UTF-8');

import('ORG.Util.Session');

class LoginAction extends PublicAction{
	public function index(){
		$this->display();
	}
	
	  //登录验证
    public function checkLogin() {
        
        //生成认证条件
        $map=array();
        // 支持使用绑定帐号登录
        $map['usrname']	= $_REQUEST['name'];
        //$map["status"] = array('eq',1);
		$password=$_REQUEST['password'];
        
        $Member=M('usrinfo');
		
        $authInfo=$Member->where($map)->select();
        
        //使用用户名、密码和状态的方式进行认证
        if(!$authInfo[0]['usrname']) {
            $this->error('用户名不存在！');
			
        }else {
            if($authInfo[0]['password'] != $password ) {
                $this->error('用户名或密码错误！');
				
            }
			$id=$authInfo[0]['id'];
			$name=$authInfo[0]['usrname'];
			//echo $name;
            //$_SESSION['id']=$authInfo[0]['id'];
            //$_SESSION['name']=$authInfo[0]['name'];
            //Session::set(C('USER_AUTH_KEY'),$name);
			 //$_SESSION[C('USER_AUTH_KEY')]=$name;  
			//Session::set('id',$id);  
            //保存登录信息
			session('name',$name);
			session('id',$id);
            $User=M('usrinfo');
            $ip=get_client_ip();
            $data = array();
            $data['id']=$authInfo[0]['id'];
            $User->save($data);
			$this->redirect('Index/index');
            //$this->success('登录成功！',U('Index/index'));
            /*if(session('?_curUrl_')){
                $this->success('登录成功！', session('_curUrl_'));
            }//else{
               // $this->success('登录成功！', Cookie::get('_curUrl_'));
           // }*/
            
        }
    }
	
	//会员退出
    public function logout() {
        if(isset($_SESSION['name'])) {
            unset($_SESSION['name']);
			unset($_SESSION['id']);
            $this->redirect('Index/index');
        }else {
            $this->error('已经退出！');
        }
    }
	
	  //会员注册
    public function register() {
        if(session('?name')) {
            $this->redirect('Login/index');
        }else{
            $this->seo('会员注册', '', '', $positioin);
            $this->display();
        }
    }

    //用户注册验证
    public function checkRegister() {

        if(!preg_match('/^[a-zA-Z0-9_]{3,30}$/i',$_REQUEST['name'])) {
            $this->error( '用户名必须是字母,数字组成，且3位以上');
        }
				
        $User = M("usrinfo");
        //检测用户名是否冲突
        $name = $_REQUEST['name'];
        $temp = "select * from think_usrinfo where usrname=$name";
		$result = $User->query($temp);
        
        if($result) {
            $this->error('很抱歉，用户名已经存在！');
        }
		
        // 创建数据对象
        $User=M("usrinfo");
		$password=$_POST['password'];
		
		$mydata['usrname']=$name;
        $mydata['password']=$password;
		if($mydata) {
			$result=$User->add($mydata);
        }
			if($result ) {
				$this->success('注册成功！');
            }else{
                $this->error('注册失败！');
            }               	
    }
	
    //验证登录状态
    protected function checkUser() {
        if(!session('?name')) {
            $this->assign('jumpUrl','Member/login');
            $this->error('没有登录');
        }
    }
}
?>