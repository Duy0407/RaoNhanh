<?php
class Cache
{
	static $path='';
	static $time=0;

	/**
	 * Ham khoi tao cache
	 */
	function __construct($cache_file_name, $cache_file_time, $cache_file_extension, $cache_file_path){

		if($cache_file_extension == '')	
			$cache_file_extension = '.cache';
		
		if(!is_dir($cache_file_path)){
			$oldumask = umask(0);
			mkdir($cache_file_path,0777,true);
			umask($oldumask);	
		}		

		Cache::$path = $cache_file_path.'/'.$cache_file_name.$cache_file_extension;
		Cache::$time = $cache_file_time;
		//echo Cache::$path;
		//exit;
	}
	
	/**
	 * Ham kiem tra cache
	 * Xoa file neu nhu het thoi gian cache
	 * Chi tra lai file khi co file va file do chua het thoi gian cache
	 */
	static function is_cache()
	{
		if (file_exists(Cache::$path))
		{
			if(Cache::$time>0)
			{
				$info_file=stat(Cache::$path);
				if(time() > $info_file[9]+Cache::$time)
				{					
					Cache::delete();
					Cache::$time=0;
					return false;	
				}
				else
				{
					return true;
				}
			}
			
		}
		else
		{
			return false;
		}
	} 
	
	/**
	 * Ham lay cache
	 */
	static function get_cache()
	{
		$fr = fopen(Cache::$path,'r');
		$content=fread($fr,filesize(Cache::$path));
		return $content;
	}
	
	
	static function minifyHTML($html)
	{
		return preg_replace(
			array('/<!--(.*)-->/Uis', "/[[:blank:]]+/"),
			array('', ' '),
			str_replace(array("\n", "\r", "\t") , '' , $html)
		);
	}
	
	static function minify_output($buffer){
		$search = array(
			'/\>[^\S ]+/s',
			'/[^\S ]+\</s',
			'/(\s)+/s'
			);
		$replace = array(
			'>',
			'<',
			'\\1'
			);
		if (preg_match("/\<html/i",$buffer) == 1 && preg_match("/\<\/html\>/i",$buffer) == 1) {
			$buffer = preg_replace($search, $replace, $buffer);
		}
		return $buffer;
	}
	
	static function compress($buffer) {
        /* remove comments */
        $buffer = preg_replace("/((?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/)|(?:\/\/.*))/", "", $buffer);
        /* remove tabs, spaces, newlines, etc. */
        $buffer = str_replace(array("\r\n","\r","\t","\n",'  ','    ','     '), '', $buffer);
        /* remove other spaces before/after ) */
        $buffer = preg_replace(array('(( )+\))','(\)( )+)'), ')', $buffer);
        return $buffer;
    }

	/**
	 * Ham ghi cache
	 */
	static function cache($content_cache)
	{
		
		if (!file_exists(Cache::$path))
		{ 

			#+
			#+ Loai bo nhung ki hieu thua
			#+ Neu nhu do la cache cua toan trang thi khong loai bo xuong dong
			if(strpos( (Cache::$path),'all') !== false && strpos( (Cache::$path),'all/pjax') === false){
				$str= array(chr(9));	
			}elseif(strpos( (Cache::$path),'vg/search') !== false){
				$str= array(chr(9),chr(13));
			}else{
				$str= array(chr(9),chr(10),chr(13));
			} // End If
			
			$content_cache = str_replace($str,"",$content_cache);
			$content_cache = str_replace("	"," ",$content_cache);
			$content_cache = str_replace("        "," ",$content_cache);
			
			# $content_cache = preg_replace("/\s+/"," ",$content_cache);
			$content_cache = Cache::minify_output($content_cache);

			#+
			#+ Dua ra cache
			ob_start();
			echo $content_cache;
			$content = ob_get_contents();
			ob_end_clean();
			
			#+
			#+ Ghi cache
			$fr = fopen(Cache::$path,'w+');
			fwrite ($fr,$content);
			fclose($fr);
			
			#+
			#+ Huy bien
			unset($content_cache, $content);
		}
	}
	
	/**
	 * Ham nay xoa cache
	 */
	static function delete()
	{
		
		if (file_exists(Cache::$path))
			unlink(Cache::$path);
				
	}	
}
?>