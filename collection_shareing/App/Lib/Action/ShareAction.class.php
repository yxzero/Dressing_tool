<?php
/*
*功能：php完美实现下载远程图片保存到本地
*参数：文件url,保存文件目录,保存文件名称，使用的下载方式
*当保存文件名称为空时则使用远程文件原来的名称
*/
function getImage($url,$save_dir='',$filename='',$type=0){
    if(trim($url)==''){
		return array('file_name'=>'','save_path'=>'','error'=>1);
	}
	if(trim($save_dir)==''){
		$save_dir='./';
	}
    if(trim($filename)==''){//保存文件名
        $ext=strrchr($url,'.');
        if($ext!='.gif'&&$ext!='.jpg'){
			return array('file_name'=>'','save_path'=>'','error'=>3);
		}
        $filename=time().$ext;
    }
	if(0!==strrpos($save_dir,'/')){
		$save_dir.='/';
	}
	//创建保存目录
	if(!file_exists($save_dir)&&!mkdir($save_dir,0777,true)){
		return array('file_name'=>'','save_path'=>'','error'=>5);
	}
    //获取远程文件所采用的方法 
    if($type){
		$ch=curl_init();
		$timeout=5;
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
		$img=curl_exec($ch);
		curl_close($ch);
    }else{
	    ob_start(); 
	    readfile($url);
	    $img=ob_get_contents(); 
	    ob_end_clean(); 
    }
    //$size=strlen($img);
    //文件大小 
    $fp2=@fopen($save_dir.$filename,'a');
    fwrite($fp2,$img);
    fclose($fp2);
	unset($img,$url);
	return $filename;
	//echo $filename;
    //return array('file_name'=>$filename,'save_path'=>$save_dir.$filename,'error'=>0);
}
?>

<?php 
function geturl($url)
{
	$text=file_get_contents($url); //将url地址上页面内容保存进$text
	$flag=1;
	//获取商品主图
	if(preg_match('*taobao*',$text,$matches))
	{//淘宝商品
		$flag=0;
	}
	if(preg_match('*tmall*',$text,$matches))
	{//天猫商品
		$flag=1;;
	}
	//运用正则抓取img标签中id为J_ImgBooth的img，$img[0]为该500图img标签，$img[1]为500图的图片地址；
	if($flag==0)
	{
		preg_match('/<img[^>]*id="J_ImgBooth"[^r]*rc=\"([^"]*)\"[^>]*>/', $text, $img);
	}
	else
	{
		preg_match('/<span[^>]*id="J_ImgBooth"[^r]*rc=\"([^"]*)\"[^>]*>/', $text, $img);
	}
	//获取商品名称
	preg_match('/<title>([^<>]*)<\/title>/', $text, $title);
	//因为正文中的商品名称标签没有特殊class或id正则不好抓取，就抓<title>   标签中的内容了，一般来说title中内容就是商品名称了（实际有些出入），$title[0]整个title标签 $title[1]标签中内容；
	$filename=getImage($img[1],'./Uploads','',0); 
	//preg_match('/&lt;strong id="J_StrPrice" &gt;\d+.\d{2}/',$text,$price); //正则表示获取包含价格的 HTML 标签
   // preg_match('/\d+.\d{2}/',$price[0],$price); 

	return array($title[1],$url,$filename);
}
?>
<?php

class ShareAction extends Action {

    public function index() {
        $Photo  =   M('Picture');
        $data   =   $Photo->order('create_time desc')->find();
        $this->assign('data', $data);
        $this->display();
    }

    public function upload() {
        if (!empty($_FILES)) {
            //如果有文件上传 上传附件
            $this->_upload();
        }
    }

    // 文件上传
    protected function _upload() {
        import('@.ORG.UploadFile');
        //导入上传类
        $upload = new UploadFile();
        //设置上传文件大小
        $upload->maxSize            = 3292200;
        //设置上传文件类型
        $upload->allowExts          = explode(',', 'jpg,gif,png,jpeg');
        //设置附件上传目录
        $upload->savePath           = './Uploads/';
        //设置需要生成缩略图，仅对图像文件有效
        $upload->thumb              = true;
        // 设置引用图片类库包路径
        $upload->imageClassPath     = '@.ORG.Image';
        //设置需要生成缩略图的文件后缀
        $upload->thumbPrefix        = 'm_,s_';  //生产2张缩略图
        //设置缩略图最大宽度
        $upload->thumbMaxWidth      = '1500,1000';
        //设置缩略图最大高度
        $upload->thumbMaxHeight     = '1500,1000';
        //设置上传文件规则
        $upload->saveRule           = 'uniqid';
        //删除原图
        $upload->thumbRemoveOrigin  = true;
        if (!$upload->upload()) {
            //捕获上传异常
            $this->error($upload->getErrorMsg());
        } else {
            //取得成功上传的文件信息
            $uploadList = $upload->getUploadFileInfo();
            import('@.ORG.Image');
            //给m_缩略图添加水印, Image::water('原文件名','水印图片地址')
            Image::water($uploadList[0]['savepath'] . 'm_' . $uploadList[0]['savename'], APP_PATH.'Tpl/Public/Images/logo.png');
            $_POST['image'] = $uploadList[0]['savename'];
        }
        $model  = M('collection');
        //保存当前数据对象
		$my_cover="m_".$_POST['image'];
        $data['cover']          = "m_".$_POST['image'];
        $data['create_time']    = NOW_TIME;
		$data['hits']=0;
		$data['coll_name']=$_POST['title'];
		$data['tag']=$_POST['c_tag'];
		$data['ownert']=$_SESSION['id'];
        $list   = $model->add($data);
		$temp="select id from think_collection where cover='$my_cover'";
		$c_id = $model->query($temp);
		session('col_id',$c_id[0]['id']);
 		$this->redirect('Share/index');
    }
	//处理表单数据
	 public function insert() {
		if($_POST['tag1']!='0'){
			$result1=geturl($_POST['item1']);
			$model  = M('picture');
        //保存当前数据对象
        	$data['name']          = $result1[2];
        	$data['create_time']    = NOW_TIME;
			$data['tag']=$_POST['tag1'];
			$data['link']=$result1[1];
			$data['cid']=$_SESSION['col_id'];
        	$list   = $model->add($data);
		}
		if($_POST['tag2']!='0'){
			echo "xx";
			$result2=geturl($_POST['item2']);
			$model  = M('picture');
        //保存当前数据对象
        	$data['name']          = $result2[2];
        	$data['create_time']    = NOW_TIME;
			$data['tag']=$_POST['tag2'];
			$data['link']=$result2[1];
			$data['cid']=$_SESSION['col_id'];
        	$list   = $model->add($data);
		}
		if($_POST['tag3']!='0'){
			$result3=geturl($_POST['item3']);
			$model  = M('picture');
        //保存当前数据对象
        	$data['name']          = $result3[2];
        	$data['create_time']    = NOW_TIME;
			$data['tag']=$_POST['tag3'];
			$data['link']=$result3[1];
			$data['cid']=$_SESSION['col_id'];
        	$list   = $model->add($data);
		}
		if($_POST['tag4']!='0'){
			$result4=geturl($_POST['item4']);
			$model  = M('picture');
        //保存当前数据对象
        	$data['name']          = $result4[2];
        	$data['create_time']    = NOW_TIME;
			$data['tag']=$_POST['tag4'];
			$data['link']=$result4[1];
			$data['cid']=$_SESSION['col_id'];
        	$list   = $model->add($data);
		}
		if($_POST['tag5']!='0'){
			$result5=geturl($_POST['item5']);
			$model  = M('picture');
        //保存当前数据对象
        	$data['name']          = $result5[2];
        	$data['create_time']    = NOW_TIME;
			$data['tag']=$_POST['tag5'];
			$data['link']=$result5[1];
			$data['cid']=$_SESSION['col_id'];
        	$list   = $model->add($data);
		}
		if($_POST['tag6']!='0'){
			$result6=geturl($_POST['item6']);
			$model  = M('picture');
        //保存当前数据对象
        	$data['name']          = $result6[2];
        	$data['create_time']    = NOW_TIME;
			$data['tag']=$_POST['tag6'];
			$data['link']=$result6[1];
			$data['cid']=$_SESSION['col_id'];
        	$list   = $model->add($data);
		}
		unset($_SESSION['col_id']);
		$this->redirect('Share/index');
    }
}
?>
