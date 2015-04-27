<?php
// +----------------------------------------------------------------------
// | Author: sham <shampeak@gmail.com>
// 系统级通用函数
// +----------------------------------------------------------------------
// html_entity_decode —— htmlentities ()	函数的反函数，将HTML实体转换为字符
// saddslashes - stripslashes
// getarr	-	getstr
// Fs - Fr

class Fun {
	/*
    +----------------------------------------------------------
    * 获得时间戳
    +----------------------------------------------------------
    * 参数:无
    +----------------------------------------------------------
    */
	public static function T(){
		list($usec, $sec) = explode(" ",microtime());
		$num = ((float)$usec + (float)$sec);
		return $num;
	}


	/*
    +----------------------------------------------------------
    * //对数组反序列化
    +----------------------------------------------------------
    * 参数:无
    +----------------------------------------------------------
    */
	public static function U($str){
		if (empty($str)) return array();
		$arr = unserialize($str);
		if($arr == false){
			throw new Exception("CommonFunction : U / Unserialize Error  _ $str");
		}
		$arr = array();
		return $arr;
	}







	/*
	+----------------------------------------------------------
	* 字符转化为数组
	+----------------------------------------------------------
	* 参数:$str 需要转化的字符串 $flit 是否排重 $bl 分割字符
	+----------------------------------------------------------
	*/
	function getarr($str,$bl = ",",$flit='0'){
		$arr = array();
		if(empty($str)) return $arr;
		//================================================
		$arr_ = explode($bl,$str);
		if($flit) $arr_ = array_unique($arr_);
		foreach($arr_ as $key=>$value){
			$value = trim($value);
			!empty($value) && array_push($arr,$value);					//  $arr[] = trim($value);
		}
		return $arr;
	}

	/*
	+----------------------------------------------------------
	* 数组转化为数组
	+----------------------------------------------------------
	* 参数:$arr 需要转化的数组 $flit 是否排重 $bl 分割字符
	+----------------------------------------------------------
	*/
	function getstr($arr,$bl = ",",$flit='0'){
		if(empty($arr)) return '';
		//================================================
		$arr_ = array();
		if($flit) $arr = array_unique($arr);
		foreach($arr as $key=>$value){
			$value = trim($value);
			!empty($value) && array_push($arr_,$value);
		}
		$str = !empty($arr_)?implode($bl,$arr_):'';
		return $str;
	}

	/**
	+----------------------------------------------------------
	* // 保存文件
	+----------------------------------------------------------
	* 参数:filename 路径文件名 / text:内容
	+----------------------------------------------------------
	*/
	function Fs($fileName, $text) {
		if( ! $fileName ) throw new Exception("CommonFunction : Fs / Filename Error  _ $fileName empty");
		if( $fp = @fopen( $fileName, "wb" ) ) {
			if( @fwrite( $fp, $text ) ) {
				fclose($fp);
				return true;
			}else {
				fclose($fp);
				return false;
			}
		}
		return false;
	}

	/**
	+----------------------------------------------------------
	* // 读取文件
	+----------------------------------------------------------
	* 参数:filename 路径文件名
	+----------------------------------------------------------
	*/
	function Fr($filename){
		if( is_file( $filename ) ){
			 $cn = file_get_contents( $filename );
			return $cn;
		}else{
			return '';
		}
	}

	/**
	+----------------------------------------------------------
	 * // 魔术转义
	+----------------------------------------------------------
	 * 参数:string 需要转义的内容   反函数 stripslashes
	+----------------------------------------------------------
	 */
	function saddslashes($string) {
		if (is_array($string)) {
			foreach ($string as $key => $val) {
				$string[$key] = saddslashes($val);
			}
		} else {
			$string = addslashes($string);
		}
		return $string;
	}


	/**
	+----------------------------------------------------------
	 * //sql转换
	+----------------------------------------------------------
	 */
	function strip_sql($string) {
		$pattern_arr = array("/ union /i", "/ select /i", "/ update /i", "/ outfile /i", "/ and /i", "/ or /i");
		$replace_arr = array('&nbsp;union&nbsp;', '&nbsp;select&nbsp;', '&nbsp;update&nbsp;', '&nbsp;outfile&nbsp;', '&nbsp;and&nbsp;', '&nbsp;or&nbsp;');
		return is_array($string) ? array_map('strip_sql', $string) : preg_replace($pattern_arr, $replace_arr, $string);
	}

	/**
	+----------------------------------------------------------
	 * // html实体转义
	+----------------------------------------------------------
	 * 参数:string 需要转义的内容   反函数 html_entity_decode
	+----------------------------------------------------------
	 */
	function shtmlspecialchars($string) {
		if (is_array($string)) {
			foreach ($string as $key => $val) {
				$string[$key] = shtmlspecialchars($val);
			}
		} else {
			$string = htmlspecialchars(strip_sql($string), ENT_QUOTES);
		}
		return $string;
	}

	/**
	+----------------------------------------------------------
	 * //判断字符串是否存在
	+----------------------------------------------------------
	 */
	function strexists($haystack, $needle) {
		return !(strpos($haystack, $needle) === FALSE);
	}

	/**
	+----------------------------------------------------------
	 * //页面跳转
	+----------------------------------------------------------
	 */
	function R($url, $time=0, $msg='') {
		$url = str_replace(array("\n", "\r"), '', $url);
		if (empty($msg))	$msg = "系统将在{$time}秒之后自动跳转到{$url}！";
		if (!headers_sent()) {
			// redirect
			if (0 === $time) {
				header('Location: ' . $url);
			} else {
				header("refresh:{$time};url={$url}");
				echo($msg);
			}
			exit();
		} else {
			$str = "<meta http-equiv='Refresh' content='{$time};URL={$url}'>";
			if ($time != 0) 	$str .= $msg;
			exit($str);
		}
	}

	/**
	+----------------------------------------------------------
	 * // 内容截取$strr = cut('i','z',$str);
	+----------------------------------------------------------
	 * 参数
	+----------------------------------------------------------
	 */
	function Cut($startstr="",$endstr="",$str){
		$outstr="";
		if(empty($startstr) || empty($endstr) || empty($str))return $outstr;
		if(!empty($str) && strpos($str,$startstr)!==false && strpos($str,$endstr)!==false){
			$startpos	= strpos($str,$startstr);
			$str		= substr($str,($startpos+strlen($startstr)),strlen($str));
			$endpos		= strpos($str,$endstr);
			$outstr		= substr($str,0,$endpos);
		}
		return $outstr;
	}


	/*
	 * 加密解密示例
	 * * $key    	= "11223";
	 * $iv         	= "dlQO014ftNjSgj/XNdLmz29MtqB1wK1usdfafssdfsdfj32";		//>32位长度
	 * $str 		= 'abcdefgh';
	 * $ivs =  encrypt($str,$key,$iv);
	 * echo $ivs.'<br>';
	 * echo decrypt($ivs,$key,$iv);
	 * */
	/**
	 * Encrypt data	//可逆向的数据加密
	 * @param  string $data     The unencrypted data
	 * @param  string $key      The encryption key
	 * @param  string $iv       The encryption initialization vector
	 * @param  array  $settings Optional key-value array with custom algorithm and mode
	 * @return string
	 */
	function encrypt($data, $key, $iv, $settings = array())
	{
		if ($data === '' || !extension_loaded('mcrypt')) {
			return $data;
		}
		//Merge settings with defaults
		$defaults = array(
			'algorithm' => MCRYPT_RIJNDAEL_256,
			'mode' => MCRYPT_MODE_CBC
		);
		$settings = array_merge($defaults, $settings);
		//Get module
		$module = mcrypt_module_open($settings['algorithm'], '', $settings['mode'], '');
		//Validate IV
		$ivSize = mcrypt_enc_get_iv_size($module);
		if (strlen($iv) > $ivSize) {
			$iv = substr($iv, 0, $ivSize);
		}
		//Validate key
		$keySize = mcrypt_enc_get_key_size($module);
		if (strlen($key) > $keySize) {
			$key = substr($key, 0, $keySize);
		}
		//Encrypt value
		mcrypt_generic_init($module, $key, $iv);
		$res = @mcrypt_generic($module, $data);
		mcrypt_generic_deinit($module);
		return $res;
	}

    /**
	 * Decrypt data
	 * Decrypt data	//数据解密
	 * @param  string $data     The encrypted data
	 * @param  string $key      The encryption key
	 * @param  string $iv       The encryption initialization vector
	 * @param  array  $settings Optional key-value array with custom algorithm and mode
	 * @return string
	 */
	function decrypt($data, $key, $iv, $settings = array()){
		if ($data === '' || !extension_loaded('mcrypt')) {
			return $data;
		}
		//Merge settings with defaults
		$defaults = array(
		'algorithm' => MCRYPT_RIJNDAEL_256,
		'mode' => MCRYPT_MODE_CBC
		);
		$settings = array_merge($defaults, $settings);
		//Get module
		$module = mcrypt_module_open($settings['algorithm'], '', $settings['mode'], '');
		//Validate IV
		$ivSize = mcrypt_enc_get_iv_size($module);
		if (strlen($iv) > $ivSize) {
			$iv = substr($iv, 0, $ivSize);
		}
		//Validate key
		$keySize = mcrypt_enc_get_key_size($module);
		if (strlen($key) > $keySize) {
			$key = substr($key, 0, $keySize);
		}
		//Decrypt value
		mcrypt_generic_init($module, $key, $iv);
		$decryptedData = @mdecrypt_generic($module, $data);
		$res = rtrim($decryptedData, "\0");
		mcrypt_generic_deinit($module);
		return $res;
	}

//	//=============================================================
//	//读取缓存
//	function Cr($file, $dir = '') {
//		$cachefile = CACHE_PATH . 'data/' . ($dir ? $dir . '/' : '') . $file . '.ca';
//		if (!is_file($cachefile)) {
//			return array();
//		}
//		return include $cachefile;
//	}
//
//	//写入缓存
//	function Cw($file, $array, $dir = '') {
//		//------------------------------------------
//		//不存在->创建
//		$_path = RHCACHE .'data/'.($dir ? $dir . '/' : '');
//		!is_dir($_path) && mkdir($_path, 0777);
//		//------------------------------------------
//		$cachefile = $_path . $file . '.ca';
//		$array = "<?php\nreturn " . var_export($array, true) . ";\n? >";
//		$strlen = @file_put_contents($cachefile, $array);
//		@chmod($cachefile, 0777);
//		return $strlen;
////	}
//
//	//删除缓存
//	function Cd($file, $dir = '') {
//		$cachefile = RHCACHE .'data/'. ($dir ? $dir . '/' : '') . $file;
//		return @unlink($cachefile);
//	}

}