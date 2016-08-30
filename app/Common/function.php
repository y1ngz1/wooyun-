<?php
	
	/**
	 * 浏览器友好的变量输出
	 * @param mixed $var 变量
	 * @param boolean $echo 是否输出 默认为True 如果为false 则返回输出字符串
	 * @param string $label 标签 默认为空
	 * @param boolean $strict 是否严谨 默认为true
	 * @return void|string
	 */
	function obj_dump($var, $echo=true, $label=null, $strict=true) {
	    $label = ($label === null) ? '' : rtrim($label) . ' ';
	    if (!$strict) {
	        if (ini_get('html_errors')) {
	            $output = print_r($var, true);
	            $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
	        } else {
	            $output = $label . print_r($var, true);
	        }
	    } else {
	        ob_start();
	        var_dump($var);
	        $output = ob_get_clean();
	        if (!extension_loaded('xdebug')) {
	            $output = preg_replace('/\]\=\>\n(\s+)/m', '] => ', $output);
	            $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
	        }
	    }
	    if ($echo) {
	        echo($output);
	        return null;
	    }else
	        return $output;
	}

	/**
	 * 格式化打印
	 * @param  [必需] Object 	array 		要打印的对象
	 */
	function p($array){
		obj_dump( $array, 1, '<pre>', 0);
	}
    
	/**
	 * 获取输入参数 支持过滤和默认值
	 * 使用方法:
	 * <code>
	 * I('id',0); 获取id参数 自动判断get或者post
	 * I('post.name','','htmlspecialchars'); 获取$_POST['name']
	 * I('get.'); 获取$_GET
	 * </code>
	 * @param string $name 变量的名称 支持指定类型
	 * @param mixed $default 不存在的时候默认值
	 * @param mixed $filter 参数过滤方法
	 * @param mixed $datas 要获取的额外数据源
	 * @return mixed
	 */
	function I($name,$default='',$filter=null,$datas=null) {
		static $_PUT	=	null;
		if(strpos($name,'/')){ // 指定修饰符
			list($name,$type) 	=	explode('/',$name,2);
		}
	    if(strpos($name,'.')) { // 指定参数来源
	        list($method,$name) =   explode('.',$name,2);
	    }else{ // 默认为自动判断
	        $method =   'param';
	    }
	    switch(strtolower($method)) {
	        case 'get'     :   
	        	$input =& $_GET;
	        	break;
	        case 'post'    :   
	        	$input =& $_POST;
	        	break;
	        case 'put'     :   
	        	if(is_null($_PUT)){
	            	parse_str(file_get_contents('php://input'), $_PUT);
	        	}
	        	$input 	=	$_PUT;        
	        	break;
	        case 'param'   :
	            switch($_SERVER['REQUEST_METHOD']) {
	                case 'POST':
	                    $input  =  $_POST;
	                    break;
	                case 'PUT':
	                	if(is_null($_PUT)){
	                    	parse_str(file_get_contents('php://input'), $_PUT);
	                	}
	                	$input 	=	$_PUT;
	                    break;
	                default:
	                    $input  =  $_GET;
	            }
	            break;
	        case 'path'    :   
	            $input  =   array();
	            if(!empty($_SERVER['PATH_INFO'])){
	                $depr   =   '/';
	                $input  =   explode($depr,trim($_SERVER['PATH_INFO'],$depr));            
	            }
	            break;
	        case 'request' :   
	        	$input =& $_REQUEST;   
	        	break;
	        case 'session' :   
	        	$input =& $_SESSION;   
	        	break;
	        case 'cookie'  :   
	        	$input =& $_COOKIE;    
	        	break;
	        case 'server'  :   
	        	$input =& $_SERVER;    
	        	break;
	        case 'globals' :   
	        	$input =& $GLOBALS;    
	        	break;
	        case 'data'    :   
	        	$input =& $datas;      
	        	break;
	        default:
	            return null;
	    }
	    if(''==$name) { // 获取全部变量
	        $data       =   $input;
	        $filters    =   isset($filter)?$filter:'htmlspecialchars';
	        if($filters) {
	            if(is_string($filters)){
	                $filters    =   explode(',',$filters);
	            }
	            foreach($filters as $filter){
	                $data   =   array_map_recursive($filter,$data); // 参数过滤
	            }
	        }
	    }elseif(isset($input[$name])) { // 取值操作
	        $data       =   $input[$name];
	        $filters    =   isset($filter)?$filter:'htmlspecialchars';
	        if($filters) {
	            if(is_string($filters)){
	                if(0 === strpos($filters,'/') && 1 !== preg_match($filters,(string)$data)){
	                    // 支持正则验证
	                    return   isset($default) ? $default : null;
	                }else{
	                    $filters    =   explode(',',$filters);                    
	                }
	            }elseif(is_int($filters)){
	                $filters    =   array($filters);
	            }
	            
	            if(is_array($filters)){
	                foreach($filters as $filter){
	                    if(function_exists($filter)) {
	                        $data   =   is_array($data) ? array_map_recursive($filter,$data) : $filter($data); // 参数过滤
	                    }else{
	                        $data   =   filter_var($data,is_int($filter) ? $filter : filter_id($filter));
	                        if(false === $data) {
	                            return   isset($default) ? $default : null;
	                        }
	                    }
	                }
	            }
	        }
	        if(!empty($type)){
	        	switch(strtolower($type)){
	        		case 'a':	// 数组
	        			$data 	=	(array)$data;
	        			break;
	        		case 'd':	// 数字
	        			$data 	=	(int)$data;
	        			break;
	        		case 'f':	// 浮点
	        			$data 	=	(float)$data;
	        			break;
	        		case 'b':	// 布尔
	        			$data 	=	(boolean)$data;
	        			break;
	                case 's':   // 字符串
	                default:
	                    $data   =   (string)$data;
	        	}
	        }
	    }else{ // 变量默认值
	        $data       =    isset($default)?$default:null;
	    }
	    is_array($data) && array_walk_recursive($data,'think_filter');
	    return $data;
	}

	/**
	 * 用户名检测
	 */
	function isUsername($username){
	    $n = preg_match ("/^[a-zA-Z0-9_]{4,20}$/", $username);
	    if($n == 0) {
	        return false;
	    }else{
	        return true;
	    }
	}

	/**
	 * 密码检测
	 */
	function isPasswordd($password){
	    $n = preg_match ("/^{6,20}$/", $password);
	    if($n == 0) {
	        return false;
	    }else{
	        return true;
	    }
	}
	
	/**
	 * 判断是否是一个合法的手机号码
	 */
	function isMobile($mobile) {
	    $n = preg_match ( "/(13[0-9]|15[0|1|2|3|5|6|7|8|9]|14[5|7]|17[0|7]|18[0-9])\d{8}/", $mobile);
	    if($n == 0) {
	        return false;
	    }else{
	        return true;
	    }
	}
	
	/**
	 * 邮箱检测
	 */
	function isEmail($email){
  		$preg = '/^(\w{1,25})@(\w{1,16})(\.(\w{1,4})){1,3}$/';
  		if(preg_match($preg, $email)){
  		    return true;
  		}else{
  		    return false;
  		}
	}
	
  	/**
  	 * 计算中文字符串长度
  	 */
	function utf8_strlen($string = null) {
		// 将字符串分解为单元
		preg_match_all('/./us', $string, $match);
		// 返回单元个数
		return count($match[0]);
	}

	/**
	 * 字符串为空检测
     * @author 谢乔敏
	 * @param  [必需] String 	str 		待检测的字符串
	 * @return Boolean  检测结果
	 */
	function isEmpty($str){
		if($str == null || $str == ''){
			return true;
		}else{
			return false;
		}
	}
    
	/**
	 * 生成随机数字(默认是6位)
	 */
	function randnum($num=6){
	    for($i=0;$i<$num;$i++){
	        $randnum .= rand(0,9);
	    }
	    return $randnum;
	}
	
	/**
	 * 生成随机字符串
	 * @param number $len
	 * @return string
	 */
	function random_str($len=6){
	    $chars='ABDEFGHJKLMNPQRSTVWXYabdefghijkmnpqrstvwxy23456789#%*';
	    mt_srand((double)microtime()*1000000*getmypid());
	    $user='';
	    while(strlen($user)<$len)
	        $user.=substr($chars,(mt_rand()%strlen($chars)),1);
	    return $user;
	}
	
	/**
	 * 返回数据
	 * @author 谢乔敏
	 * @param  [必需] String 	result 			结果码[0:成功  -1:失败]
	 * @param  [必需] String 	description 	结果描述
	 * @param  [可选] Object 	data 			数据对象
	 * @param  [可选] Int 		type 			请求验证类型[0:合法  －1:非法]
	 */
	function returnMsg($result,$description,$data=null,$type=0){
		$response = array(
		        'data' => $data,
		        'result' => $result,
		        'description' => $description
		    );
		exit(json_encode($response));
	}

	/**
	 * 生成返回数据
	 * @author 谢乔敏
	 * @param  [必需] String 	result 			结果码[0:成功  -1:失败]
	 * @param  [必需] String 	description 	结果描述
	 * @param  [可选] Object 	data 			数据对象
	 */
	function mkMsg($result,$description,$data=null){
		$response = array(
		        'data' => $data,
		        'result' => $result,
		        'description' => $description
		    );
		return $response;
	}

	/**
	 * 发送邮件
	 */
	function send_email($to,$subject,$content){
		Vendor('PHPMailer.PHPMailerAutoload');
		$email_config = C('EMAIL_CONFIG');
		$mail = new PHPMailer(); //实例化
		$mail->IsSMTP(); // 启用SMTP
		$mail->Host = C('MAIL_HOST'); //smtp服务器的名称（这里以126邮箱为例）
		$mail->SMTPAuth = C('MAIL_SMTPAUTH'); //启用smtp认证
		$mail->Username = C('MAIL_USERNAME'); //你的邮箱名
		$mail->Password = C('MAIL_PASSWORD'); //邮箱密码
		$mail->From = C('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
		$mail->FromName = C('MAIL_FROMNAME'); //发件人姓名
		$mail->AddAddress($to,"name");
		$mail->WordWrap = 50; //设置每行字符长度
		$mail->IsHTML(C('MAIL_ISHTML')); // 是否HTML格式邮件
		$mail->CharSet = C('MAIL_CHARSET'); //设置邮件编码
		$mail->Subject = $subject; //邮件主题
		$mail->Body = $content; //邮件内容
// 		$mail->SMTPDebug = 1; // 启用SMTP调试功能
		$mail->AltBody = "This is the body in plain text for non-HTML mail clients"; //邮件正文不支持HTML的备用显示
		$result = $mail->Send();
		return $result;
	}

	/**
	 * 生成二维码
	 * text:需要生成二维码的数据，默认:http://www.elyt.cn
	 * size:图片每个黑点的像素,默认4
	 * level:纠错等级,默认L
	 * padding:图片外围空白大小，默认2
	 * logo:全地址，默认为false
	 */
	function mkqrcode($text='http://www.elyt.cn',$filename,$size='4',$level='L',$padding=2,$logo=false){
	    $path='/Upload/qrcode/';
	    $QR=$_SERVER['DOCUMENT_ROOT'].'/'.$path.$filename;
	    vendor("phpqrcode.phpqrcode");
	    QRcode::png($text,$QR, $level, $size,$padding);
	    if($logo !== false){
	        $QR = imagecreatefromstring(file_get_contents($QR));
	        $logo = imagecreatefromstring(file_get_contents($logo));
	        $QR_width = imagesx($QR);
	        $QR_height = imagesy($QR);
	        $logo_width = imagesx($logo);
	        $logo_height = imagesy($logo);
	        $logo_qr_width = $QR_width / 5;
	        $scale = $logo_width / $logo_qr_width;
	        $logo_qr_height = $logo_height / $scale;
	        $from_width = ($QR_width - $logo_qr_width) / 2;
	        imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
	    }
	    header("Content-Type:image/jpg");
	    imagepng($QR);
	}
	
    /**
     * 执行shell建站脚本
     * @param unknown $wd_sitedomain_find
     * @param unknown $wd_sitedomains
     * @param unknown $dir_path
     * @param unknown $wd_mysql_dbuser
     * @param unknown $wd_mysql_dbpw
     * @param unknown $wd_mysql_dbname
     */
	function mksite($wd_sitedomain_find,$wd_sitedomains,$dir_path,$wd_mysql_dbuser,$wd_mysql_dbpw,$wd_mysql_dbname){
	    $shell="bash /shell/db/createsite.sh $wd_sitedomain_find $wd_sitedomains $dir_path $wd_mysql_dbuser $wd_mysql_dbpw $wd_mysql_dbname";
	    @system($shell);//这个有返回值
	    #@exec($shell);//这个没有任何的返回
	}
	
	/**
	 * 执行shell更新副域名脚本
	 * @param unknown $wd_sitedomain_find
	 * @param unknown $wd_sitedomains
	 */
	function upsite($wd_sitedomain_find,$wd_sitedomains){
	    $shell="bash /shell/db/domains.sh $wd_sitedomain_find $wd_sitedomains";
	    @system($shell);//这个有返回值
	    #@exec($shell);//这个没有任何的返回
	}
