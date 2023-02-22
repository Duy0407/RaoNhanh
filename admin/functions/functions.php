<?
function convert_string_to_array($string){
	$arrReturn	= array();
	preg_match_all('/\[(.*?)\]/is', $string, $matches);
	if(isset($matches[1])){
		for($i=0; $i<count($matches[1]); $i++){
			$arrReturn[]	= $matches[1][$i];
		}
	}
	return $arrReturn;
}

function convert_string_to_list_id($string){
	$list_id	= 0;
	preg_match_all('/\[(.*?)\]/is', $string, $matches);
	if(isset($matches[1])){
		for($i=0; $i<count($matches[1]); $i++){
			$list_id	.= "," . $matches[1][$i];
		}
	}
	return $list_id;
}

function convert_list_to_list_id($string, $do_not_get_zero_value=0, $limit=0){
	// Bẻ $string để intval lại
	$arrTemp	= explode(",", $string);
	$list_id	= "";
	$i			= 0;
	$arrCheck= array();
	foreach($arrTemp as $key => $value){
		$i++;
		$value	= intval($value);
		if($do_not_get_zero_value == 1 && $value <= 0) continue;
		if(isset($arrCheck[$value])) continue;
		$arrCheck[$value]	= 1;
		$list_id .= "," . $value;
		if($limit > 0 && $i >= $limit) break;
	}
	// Remove dấu , đầu tiên
	if(strlen($list_id) > 0) $list_id = substr($list_id, 1);
	else $list_id	= 0;
	return $list_id;
}

function convert_list_to_array($string, $return_null_array = false, $df_null_value = 0){
	// Bẻ $string để intval lại
	$arrTemp	= explode(",", $string);
	$array_id	= array();
	foreach($arrTemp as $key => $value) $array_id[] = intval($value);

	//Nếu ra array rỗng và !$return_null_array không cho trả lại array rỗng thì gán cho giá trị trả về 1 phần tử df
	if(count($array_id) == 0 && !$return_null_array) $array_id = array($df_null_value);
	return $array_id;
}

function convert_array_to_list($array_input, $key="", $limit=0){
	$string_return	= "0";
	$arrTemp			= array();
	$i					= 0;
	foreach($array_input as $k => $v){
		$i++;
		if($key === true) $arrTemp[]	= intval($k);
		elseif($key == "") $arrTemp[]	= intval($v);
		else $arrTemp[]	= intval(@$v[$key]);
		if($limit > 0 && $i >= $limit) break;
	}
	//Loại bỏ phần tử trùng
	$arrTemp	= array_unique($arrTemp);
	if(count($arrTemp) > 0) $string_return = implode(",", $arrTemp);
	return $string_return;
}

function convert_array_to_string($array_input, $do_not_get_zero_value=1){
	$string_return	= "";
	if(is_array($array_input)){
		foreach($array_input as $value){
			$value	= intval($value);
			if($do_not_get_zero_value == 1 && $value <= 0) continue;
			$string_return .= "[" . $value . "]";
		}
	}
	return $string_return;
}

function str_convert_num_code_to_char($string){
   $string_return = preg_replace_callback('/(&#([0-9]+);)/', create_function(
        '$matches', 'return str_convert_num_to_char(array($matches[2]));'
    ), $string);
    return $string_return;
}

function replaceFCK($string, $type=0){
	$array_fck	= array ("&Agrave;", "&Aacute;", "&Acirc;", "&Atilde;", "&Egrave;", "&Eacute;", "&Ecirc;", "&Igrave;", "&Iacute;", "&Icirc;",
								"&Iuml;", "&ETH;", "&Ograve;", "&Oacute;", "&Ocirc;", "&Otilde;", "&Ugrave;", "&Uacute;", "&Yacute;", "&agrave;",
								"&aacute;", "&acirc;", "&atilde;", "&egrave;", "&eacute;", "&ecirc;", "&igrave;", "&iacute;", "&ograve;", "&oacute;",
								"&ocirc;", "&otilde;", "&ugrave;", "&uacute;", "&ucirc;", "&yacute;",
								);
	$array_text	= array ("À", "Á", "Â", "Ã", "È", "É", "Ê", "Ì", "Í", "Î",
								"Ï", "Ð", "Ò", "Ó", "Ô", "Õ", "Ù", "Ú", "Ý", "à",
								"á", "â", "ã", "è", "é", "ê", "ì", "í", "ò", "ó",
								"ô", "õ", "ù", "ú", "û", "ý",
								);
	if($type == 1) $string = str_replace($array_fck, $array_text, $string);
	else $string = str_replace($array_text, $array_fck, $string);
	return $string;
}

/**
 * Tach chuoi tu khoa thanh cum 2 tu
**/
function gen_keyword_search($string){
   $string  = cut_string($string,50,"");
   $string  = replaceFCK($string,1);
   $text    = str_convert_num_code_to_char($string);    
   $text                  = mb_strtolower($text,"UTF-8"); 
   $code_entities_match   = array('&mdash;',' ','--','&quot;','!','@','#','$','%','^','&','*','(',')','_','+','{','}','|',':','"','<','>','?','[',']','\\',';',"'",',','.','/','*','+','~','`','=', '“','”',"'", '‘', '’', '--'); 
   $code_entities_replace = array('','-','-','','','','','','','','','','','','','','','','','','-','','','','','','', '','','','','','-'); 
   $title = str_replace($code_entities_match, $code_entities_replace, $text); 
   $arr_place  = array("     ","    ","   ","  ");
   $title      = str_replace($arr_place," ",$title);
   $title      = str_replace($arr_place," ",$title);
   $title      = str_replace("-"," ",$title);
   $array_text = explode(" ",$title);
   $arrKey     = array();
   for($i = 0; $i < count($array_text) - 1; $i++){
      $keyword  = $array_text[$i] . " " . $array_text[$i + 1];
      $keyword  = trim($keyword);
      if(strlen($keyword) > 4){
         $arrKey[] = $keyword;
      }      
   }   
   unset($array_text);
   return $arrKey;
}

/* Table Of Contents */
function create_toc( $content ) {
	preg_match_all( '/<h([1-6])(.*)>([^<]+)<\/h[1-6]>/i', $content, $matches, PREG_SET_ORDER );
 
	global $anchors;
 
	$anchors = array();
	$toc 	 = '<ul class="toc">'."\n";
	$i 		 = 0;

	foreach ( $matches as $heading ) {
 
		if ($i == 0)
			$startlvl = $heading[1];
		$lvl 		= $heading[1];
 
		$ret = preg_match( '/id=[\'|"](.*)?[\'|"]/i', stripslashes($heading[2]), $anchor );
		if ( $ret && $anchor[1] != '' ) {
			$anchor = stripslashes( $anchor[1] );
			$add_id = false;
		} else {
			$anchor = preg_replace( '/\s+/', '-', preg_replace('/[^a-z\s]/', '', strtolower( $heading[3] ) ) );
			$add_id = true;
		}
 
		if ( !in_array( $anchor, $anchors ) ) {
			$anchors[] = $anchor;
		} else {
			$orig_anchor = $anchor;
			$i = 2;
			while ( in_array( $anchor, $anchors ) ) {
				$anchor = $orig_anchor.'-'.$i;
				$i++;
			}
			$anchors[] = $anchor;
		}
 
		if ( $add_id ) {
			$content = substr_replace( $content, '<h'.$lvl.' id="'.$anchor.'"'.$heading[2].'>'.$heading[3].'</h'.$lvl.'>', strpos( $content, $heading[0] ), strlen( $heading[0] ) );
		}
 
		$ret = preg_match( '/title=[\'|"](.*)?[\'|"]/i', stripslashes( $heading[2] ), $title );
		if ( $ret && $title[1] != '' )
			$title = stripslashes( $title[1] );
		else	
			$title = $heading[3];
		$title 		= trim( strip_tags( $title ) );
 
		if ($i > 0) {
			if ($prevlvl < $lvl) {
				$toc .= "\n"."<ul>"."\n";
			} else if ($prevlvl > $lvl) {
				$toc .= '</li>'."\n";
				while ($prevlvl > $lvl) {
					$toc .= "</ul>"."\n".'</li>'."\n";
					$prevlvl--;
				}
			} else {
				$toc .= '</li>'."\n";
			}
		}
 
		$j = 0;
		$toc .= '<li><a href="#'.$anchor.'">'.$title.'</a>';
		$prevlvl = $lvl;
 
		$i++;
	}
 
	unset( $anchors );
 
	while ( $lvl > $startlvl ) {
		$toc .= "\n</ul>";
		$lvl--;
	}
 
	$toc .= '</li>'."\n";
	$toc .= '</ul>'."\n";
 
	return array( 
		'toc' => $toc,
		'content' => $content
	);
}

// Hàm đệ quy để tạo ra danh sách trình đơn đa cấp, $parentId = 0 là Root
function multiLevelSidebarCat($parentId = 0, $arrLists = array(), $arrData = array(), $arrArticle, $arrCountArticle, $lv = 1 ) {
	global $iCat;
	global $iData;
	global $cat_cha;
	global $cat_cha_level_2;
	global $cat_cha_level_3;
	
	$html = '';

	// Nếu tồn tại cấp này
	if(isset($arrLists[$parentId])) {
		
		$class_ul = $parentId == 0 ? '' : '';
		$class_active = $parentId != 0 && in_array($parentId, array($cat_cha, $cat_cha_level_2, $cat_cha_level_3) ) ? ' active' : '';			
		
		$html .= '<ul class="ul_lv' . $lv . $class_active . '">'; // Mở UL

		// Đưa ra tất cả mục của cấp
		foreach ($arrLists[$parentId] as $childId) {
			
			if($arrCountArticle[$childId] < 1) continue;
			
			$name			= htmlspecialchars($arrData[$childId]['cat_name']);
			$level		= $arrData[$childId]['level'] + 1;
			$link 		= 'javascript:;';
			$cls_link 	= '';
			$cat_id 		= $arrData[$childId]['cat_id'];
			$icon			= '<i class="glyphicon glyphicon-chevron-right"></i>';
			$a_active	= $iCat != 0 && $arrData[$childId]['cat_id'] == $iCat ? ' active' : '';			
			$a_active	= $iData != 0 && $arrArticle[$childId]['new_id'] == $iData ? ' active' : $a_active;
			
			if(is_array($arrArticle) && isset($arrArticle[$childId])){
				$link 		= createLink("detail_news", $arrArticle[$childId]);
				$cls_link 	= ' a_link';
				$icon 		= '';
			}
			
			if($arrData[$childId]['parent'] == 0 && $arrCountArticle[$childId] > 1){
				$link 		= createLink("cat", $arrData[$childId]);
				$cls_link 	= ' a_link';
				$icon 		= '';	
			}
	
	      // Mở LI
	      $html .= '<li class="li_lv' . $level . ' li_lv' . $level . '_click"><a class="a_lv' . $level . $cls_link . $a_active . '" href="' . $link . '" title="' . $name . '">' . $name . $icon . '</a>';
			
			$html .= multiLevelSidebarCat($childId, $arrLists, $arrData, $arrArticle, $arrCountArticle, $level + 1); // Gọi lại hàm để tìm tất cả cấp con của mục này
			
			$html .= '</li>'; // Đóng LI
		}
		
		if($parentId != 0){
			$html .= '<li class="li_lv' . ($lv - 1) . '_back"><a class="a_back" href="' . url_javarscript_void() . '">Quay lại<i class="glyphicon glyphicon-arrow-left"></i></a></li>';
		} // End if($parentId != 0)
				
		$html .= '</ul>'; // Đóng UL
	}
	
	return $html;
	
} // End function multiLevelMenuCat

// Hàm đệ quy để tạo ra danh sách trình đơn đa cấp, $parentId = 0 là Root
function multiLevelMenuCat($parentId = 0, $arrLists = array(), $arrData = array() ) {
	$html = '';

	// Nếu tồn tại cấp này
	if(isset($arrLists[$parentId])) {
		
		$class_ul = $parentId == 0 ? 'nav navbar-nav' : 'dropdown-menu';
		
		$html .= '<ul class="' . $class_ul . '">'; // Mở UL

		// Đưa ra tất cả mục của cấp
		foreach ($arrLists[$parentId] as $childId) {
			
			$name		= htmlspecialchars($arrData[$childId]['cat_name']);
			$link 	= createLink("cat", array('dat_id' => $arrData[$childId]['cat_id'], 'dat_rewrite' => $arrData[$childId]['cat_name_rewrite']));
	
	      // Mở LI
	      $html .= '<li><a href="' . $link . '" title="' . $name . '">' . $name . '</a>';
			
			$html .= multiLevelMenuCat($childId, $arrLists, $arrData); // Gọi lại hàm để tìm tất cả cấp con của mục này
			
			$html .= '</li>'; // Đóng LI
		}
		$html .= '</ul>'; // Đóng UL
	}
	
	return $html;
	
} // End function multiLevelMenuCat
// Ham de quy de lay menu theo kieu selectbox
function multiSelectLevelMenuCat($parentId = 0, $arrLists = array(), $arrData = array()){
    $html = '';
    $str = '';
	// Nếu tồn tại cấp này
	if(isset($arrLists[$parentId])) {
		$class_ul = $parentId == 0 ? '' : '';
		$html .= '<ul class="list_mn_vw">'; // Mở UL\
		$link_cat = '';
		$link = '';
      $style = '';
		// Đưa ra tất cả mục của cấp
		foreach ($arrLists[$parentId] as $childId) {
			$name	= htmlspecialchars($arrData[$childId]['cat_name']);
			$str = '';	
         
			if($arrData[$childId]['level'] == 1){
				$str = '<b class="b_bullet"></b>';
            
			}

			// code scrip
			if($arrData[$childId]['level'] == 2){
				$link_cat_cb = createLink("cat_coban",array('dat_id'=> $arrData[$childId]['cat_id'],'dat_rewrite' => $arrData[$childId]['cat_name_rewrite']));
				$link_cat_ht = createLink("cat_hotro",array('dat_id'=> $arrData[$childId]['cat_id'],'dat_rewrite' => $arrData[$childId]['cat_name_rewrite']));
				if($arrData[$childId]['cat_type'] == 'cobanvnp'){
					$link = 'href = "/' . $link_cat_cb . '"';
				}else if($arrData[$childId]['cat_type'] == 'hotrokinhdoanh'){
					$link = 'href = "/' . $link_cat_ht . '"';
				}
            
			}
			else{
				$link = '';
			}
			$html .= '<li class="cat_'.$arrData[$childId]['cat_id'].'">'.$str;
			$html .= '<a '.$link.' title="'. $arrData[$childId]['cat_name'].'">';
			if($arrData[$childId]['level'] == 0){
				$html .= '<h3 class="lef_title">'.$name.'</h3>';	
			}else{
				$html .= $name;
			}
			$html .= '</a>';
		    $html .= multiSelectLevelMenuCat($childId, $arrLists, $arrData); // Gọi lại hàm để tìm tất cả cấp con của mục này
			$html .= '</li>'; // Đóng LI
		}
		$html .= '</ul>'; // Đóng UL
	}
	
	return $html;
}// END function multiSele5ctLevelMenuCat

function isIPdebug(){

	$arrayIP = array("118.70.233.71","118.70.177.93","118.70.80.56");
	$myip = $_SERVER["REMOTE_ADDR"];
	$debug = isset($_GET["bug"]) ? intval($_GET["bug"]) : 0;
	if(in_array($myip, $arrayIP)){
		return true;
	}else{
		return false;
	}
}

/**
Dumplog
*/
function dump_log($log_data, $log_type = "SQL_LOG"){
	//Lấy thư mục ipstore
	$ipstore_dir = str_replace("functions", "ipstore", dirname(__FILE__));
	switch($log_type){
		case "ID_VG"							: $log_file = $ipstore_dir . "/dump_ajax_login_access_code.cfn"; break;
		default									: $log_file = $ipstore_dir . "/dump_sql_log.cfn"; break;
	}

	$handle = @fopen($log_file, "a");
	//Nếu handle chưa có mở thêm ../
	if ($handle){
		@fwrite($handle, date("d/m/Y h:i:s A") . " \n" . $log_data . " \n ---------------------- \n");
		@fclose($handle);
	}
}

/**
 * Ham check co login bang sso hay khong
 * phai include inc_config moi co tac dung
 */
function checkIsLoginSSO(){
	//golbal cac bien config
	global $con_sso_on;
	global $con_ssp_ip_experiment;
	global $con_sso_experiment;
	if(!isset($con_sso_on)) $con_sso_on = 0;
	if(!isset($con_ssp_ip_experiment)) $con_ssp_ip_experiment = "";
	if(!isset($con_sso_experiment)) $con_sso_experiment = 0;
	//nếu trường hợp tắt sso thì return false luôn
	if($con_sso_on != 1){
		return false;
	}
	//kiểm tra 1 số ip thử nghiệm
	$arrIp = explode(",", $con_ssp_ip_experiment);
	$my_ip = @$_SERVER["REMOTE_ADDR"];
	if(in_array($my_ip, $arrIp)){
		//trong truong hop da cau hinh 100% dung id.vatgia.com thi nhung ip test nay lai co tac dung dang nhap ko qua id.vatgia.com
		if(intval($con_sso_experiment) >= 100){
			return false;
		}
		return true;
	}

	//lấy ra random phần trăm thử nghiệm
	$rand = rand(0,100);
	if($con_sso_experiment){
		if($rand <= $con_sso_experiment){
			return true;
		}
	}
	return false;
}

/**
Function check xem code đang chạy ở Server hay Localhost. true: server, false: localhost
*/
function checkServerOrLocal(){
	$return		= true;
	$serverName	= @$_SERVER["SERVER_NAME"];
	if($serverName == "localhost" || $serverName == "127.0.0.1" || $serverName == "192.168.1.218" || $serverName == "192.168.0.218"){
		$return	= false;
	}
	return $return;
}

# Lay du lieu tu bang static - co dung them video
function getStatic($iData){
	$string = '';
	$db_static = new db_query("SELECT sta_description FROM statics_multi WHERE sta_id = ".intval($iData));
	if($row = mysql_fetch_assoc($db_static->result)){
		$string = $row["sta_description"];
	}
	unset($db_static);

	return $string;

}

function url_javarscript_void(){
   $url = "javascript: void(0)";
   return $url;
}

function url_search($keyword){
   $url  = "/search/?keyword=" . $keyword;
   return $url;
}

function url_news_detail($new_id,$new_title){  
   $url  =  "/" . $new_title . "-n" . $new_id . "/";
   return $url;	
}

//hàm tạo link khi cần thiết chuyển sang mod rewrite
function createLink($type="detail",$url=array(),$path="",$con_extenstion='html',$rewrite = 1){
	global $lang_name;
	global $lang_path;
	global $root_path;

	//
	$menuReturn = '';
	$keyReplace = '/';
	$path		= "/";

	if($rewrite == 0){
		$menuReturn = $path . $type . ".php?";
		foreach($url as $key=>$value){
			if($key == "module") $value = strtolower($value);
			if($key != "title"){
				$menuReturn .= $key . "=" . $value . "&";
			}
		}
		$menuReturn = substr($menuReturn,0, strrpos($menuReturn, "&"));
		//tra ve url ko rewrite
		return $menuReturn;
	}

	switch($type){
		case "cat":
			$dat_id = isset($url['dat_id']) ? $url['dat_id'] : $url['cat_id'];
			$dat_rewrite = isset($url['dat_rewrite']) ? $url['dat_rewrite'] : $url['cat_name_rewrite'];
			$menuReturn = '/' . $dat_rewrite . '-c' . $dat_id;
			break;
      	case "detail_news":
      		$dat_id = isset($url['dat_id']) ? $url['dat_id'] : $url['new_id'];
			$dat_rewrite = isset($url['dat_rewrite']) ? $url['dat_rewrite'] : $url['new_title_rewrite'];
			$menuReturn = '/tin-tuc/' . $dat_rewrite .'-tt' . $dat_id .  '.html';
			break;
		case "detail_pros":
			$dat_id = isset($url['dat_id']) ? $url['dat_id'] : $url['pro_id'];
			$dat_rewrite = isset($url['dat_rewrite']) ? $url['dat_rewrite'] : $url['pro_title_rewrite'];
			$menuReturn = '/san-pham/' . $dat_rewrite . '-sp' . $dat_id . '.html';
			break;
   		case "detail_sev":
			$dat_id = isset($url['dat_id']) ? $url['dat_id'] : $url['sev_id'];
			$dat_rewrite = isset($url['dat_rewrite']) ? $url['dat_rewrite'] : $url['sev_name_rewrite'];
			$menuReturn = '/dich-vu/' . $dat_rewrite . '-dv' . $dat_id . '.html';
			break;
	}
	return $menuReturn;

}

# Lay du lieu va chuyen thanh 1 array
function getArray($sql,$field_id = ''){
	$db_query = new db_query($sql);
	$arrayReturn = array();
	$i=0;
	while($row=mysql_fetch_assoc($db_query->result)){
		if($field_id!=''){
			$arrayReturn[$row[$field_id]] = $row;
		}else{
			$i++;
			$arrayReturn[$i] = $row;

		}
	}
	unset($db_query);
	return $arrayReturn;
}

# Loai bo dau va bien space thanh '-'
function removeTitle($string,$keyReplace){
	$string		= html_entity_decode($string, ENT_COMPAT, 'UTF-8');
	$string		= mb_strtolower($string, 'UTF-8');
	$string		= removeAccent($string);
	//neu muon de co dau
	//$string 	=  trim(preg_replace("/[^A-Za-z0-9àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸ]/i"," ",$string));

	$string 	= trim(preg_replace("/[^A-Za-z0-9]/i"," ",$string)); // khong dau
	$string 	= str_replace(" ","-",$string);
	$string		= str_replace("--","-",$string);
	$string		= str_replace("--","-",$string);
	$string		= str_replace("--","-",$string);
	$string		= str_replace($keyReplace,"-",$string);
	return $string;
}

function base64_url_encode($input){
	return strtr(base64_encode($input), '+/=', '_,-');
}

function base64_url_decode($input) {
	return base64_decode(strtr($input, '_,-', '+/='));
}

function array_currency(){
	$arrReturn	= array(0 => "USD", 1 => "EUR");
	return $arrReturn;
}

function array_language(){
	$db_language	= new db_query("SELECT * FROM languages ORDER BY lang_id ASC");
	$arrReturn		= array();
	while($row = mysql_fetch_array($db_language->result)){
		$arrReturn[$row["lang_id"]] = array($row["lang_code"], $row["lang_name"]);
	}
	return $arrReturn;
}

function removeQueryString($url){
	# $url = substr( $url, 0, strrpos( $url, "?"));
    $url = strtok($url, '?');
    return $url;
}

function callback($buffer){
	$str		= array(chr(9), chr(10));
	$buffer	= str_replace($str, "", $buffer);
	return $buffer;
}

/**
 * Hàm kiểm tra email
*/
function check_email_address($email) {
	//First, we check that there's one @ symbol, and that the lengths are right
	if(!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)){
		//Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
		return false;
	}
	//Split it into sections to make life easier
	$email_array = explode("@", $email);
	$local_array = explode(".", $email_array[0]);
	for($i = 0; $i < sizeof($local_array); $i++){
		if(!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])){
			return false;
		}
	}
	if(!ereg("^\[?[0-9\.]+\]?$", $email_array[1])){
	//Check if domain is IP. If not, it should be valid domain name
		$domain_array = explode(".", $email_array[1]);
		if(sizeof($domain_array) < 2){
			return false; // Not enough parts to domain
		}
		for($i = 0; $i < sizeof($domain_array); $i++){
			if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])){
				return false;
			}
		}
	}
	return true;
}

function check_session_security($security_code){
	$return = 1;
	if(!isset($_SESSION["session_security_code"])) $_SESSION["session_security_code"] = generate_security_code();
	if($security_code != $_SESSION["session_security_code"]){
		$return = 0;
	}
	// Reset lại session security code
	$_SESSION["session_security_code"] = generate_security_code();
	return $return;
}

/**
 * Hàm đếm số người online
*/
function count_online(){
	$visited_timeout		= 10 * 60;
	$last_visited_time	= time();
	//Kiem tra co session_id hay ko, neu co
	if(session_id() != ""){
		$db_exec	= new db_execute("REPLACE INTO active_users(au_session_id, au_last_visit) VALUES('" . session_id() . "', " . $last_visited_time . ")");
		unset($db_exec);
	}
	// Delete timeout
	$db_exec	= new db_execute("DELETE FROM active_users WHERE au_last_visit < " . ($last_visited_time - $visited_timeout));
	unset($db_exec);
	// Select Count
	$db_count= new db_query("SELECT count(*) AS count FROM active_users");
	$row		= mysql_fetch_array($db_count->result);
	unset($db_count);
	// Return value
	return $row["count"];
}

/**
 * Hàm đếm số lượt xem
*/
function count_visited(){
	$db_count	= new db_query("SELECT vis_counter FROM visited");
	$row = mysql_fetch_array($db_count->result);
	unset($db_count);
	return $row["vis_counter"];
}

/**
 * Hàm cắt chuỗi
*/
function cut_string($str, $length, $char=" ..."){
	//Nếu chuỗi cần cắt nhỏ hơn $length thì return luôn
	$strlen	= mb_strlen($str, "UTF-8");
	if($strlen <= $length) return $str;

	//Cắt chiều dài chuỗi $str tới đoạn cần lấy
	$substr	= mb_substr($str, 0, $length, "UTF-8");
	if(mb_substr($str, $length, 1, "UTF-8") == " ") return $substr . $char;

	//Xác định dấu " " cuối cùng trong chuỗi $substr vừa cắt
	$strPoint= mb_strrpos($substr, " ", "UTF-8");

	//Return string
	if($strPoint < $length - 20) return $substr . $char;
	else return mb_substr($substr, 0, $strPoint, "UTF-8") . $char;
}

function format_number($number, $edit=0){
	if($edit == 0){
		$return	= number_format($number, 2, ".", ",");
		if(intval(substr($return, -2, 2)) == 0) $return = number_format($number, 0, ".", ",");
		elseif(intval(substr($return, -1, 1)) == 0) $return = number_format($number, 1, ".", ",");
		return $return;
	}
	else{
		$return	= number_format($number, 2, ".", "");
		if(intval(substr($return, -2, 2)) == 0) $return = number_format($number, 0, ".", "");
		return $return;
	}
}
 
function format_currency($value = ""){
	$str		=	$value;
	if($value != ""){
		$str		=	number_format(round($value/1000)*1000,0,"",",");
	}
	return $str;
}

function generate_array_variable($variable){
	$list			= tdt($variable);
	$arrTemp		= explode("{-break-}", $list);
	$arrReturn	= array();
	for($i=0; $i<count($arrTemp); $i++) $arrReturn[$i] = trim($arrTemp[$i]);
	return $arrReturn;
}

function generate_security_code(){
	$code	= rand(1000, 9999);
	return $code;
}

function generate_sort($type, $sort, $current_sort, $image_path){
	if($type == "asc"){
		$title = tdt("Tang_dan");
		if($sort != $current_sort) $image_sort = "sortasc.gif";
		else $image_sort = "sortasc_selected.gif";
	}
	else{
		$title = tdt("Giam_dan");
		if($sort != $current_sort) $image_sort = "sortdesc.gif";
		else $image_sort = "sortdesc_selected.gif";
	}
	return '<a title="' . $title . '" href="' . getURL(0,0,1,1,"sort") . '&sort=' . $sort . '"><img border="0" src="' . $image_path . $image_sort . '" style="margin-top:3px" /></a>';
}

function getURL($serverName=0, $scriptName=0, $fileName=1, $queryString=1, $varDenied=''){
	$url	 = '';
	$slash = '/';
	if($scriptName != 0)$slash	= "";
	if($serverName != 0){
		if(isset($_SERVER['SERVER_NAME'])){
			$url .= 'http://' . $_SERVER['SERVER_NAME'];
			if(isset($_SERVER['SERVER_PORT'])) $url .= ":" . $_SERVER['SERVER_PORT'];
			$url .= $slash;
		}
	}
	if($scriptName != 0){
		if(isset($_SERVER['SCRIPT_NAME']))	$url .= substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/') + 1);
	}
	if($fileName	!= 0){
		if(isset($_SERVER['SCRIPT_NAME']))	$url .= substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], '/') + 1);
	}
	if($queryString!= 0){
		$url .= '?';
		reset($_GET);
		$i = 0;
		if($varDenied != ''){
			$arrVarDenied = explode('|', $varDenied);
			while(list($k, $v) = each($_GET)){
				if(array_search($k, $arrVarDenied) === false){
					$i++;
					if($i > 1) $url .= '&' . $k . '=' . @urlencode($v);
					else $url .= $k . '=' . @urlencode($v);
				}
			}
		}
		else{
			while(list($k, $v) = each($_GET)){
				$i++;
				if($i > 1) $url .= '&' . $k . '=' . @urlencode($v);
				else $url .= $k . '=' . @urlencode($v);
			}
		}
	}
	$url = str_replace('"', '&quot;', strval($url));
	return $url;
}

function getValue($value_name, $data_type = "int", $method = "GET", $default_value = 0, $advance = 0){
	$value = $default_value;
	switch($method){
		case "GET": if(isset($_GET[$value_name])) $value = $_GET[$value_name]; break;
		case "POST": if(isset($_POST[$value_name])) $value = $_POST[$value_name]; break;
		case "COOKIE": if(isset($_COOKIE[$value_name])) $value = $_COOKIE[$value_name]; break;
		case "SESSION": if(isset($_SESSION[$value_name])) $value = $_SESSION[$value_name]; break;
		default: if(isset($_GET[$value_name])) $value = $_GET[$value_name]; break;
	}
	@$valueArray	= array("int" => intval($value), "str" => trim(strval($value)), "flo" => floatval($value), "dbl" => doubleval($value), "arr" => $value);
	foreach($valueArray as $key => $returnValue){
		if($data_type == $key){
			if($advance != 0){
				switch($advance){
					case 1:
						$returnValue = replaceMQ($returnValue);
						break;
					case 2:
						$returnValue = htmlspecialbo($returnValue);
						break;
				}
			}
			//Do số quá lớn nên phải kiểm tra trước khi trả về giá trị
			if((@strval($returnValue) == "INF") && (@$data_type != "str")) return 0;
			return $returnValue;
			break;
		}
	}
	return (intval($value));
}

function htmlspecialbo($str){
	$arrDenied	= array('<', '>', '\"', '"');
	$arrReplace	= array('&lt;', '&gt;', '&quot;', '&quot;');
	$str = str_replace($arrDenied, $arrReplace, $str);
	return $str;
}

function microtime_float(){
   list($usec, $sec) = explode(" ", microtime());
   return ((float)$usec + (float)$sec);
}

function random(){
	$rand_value = "";
	$rand_value.= rand(1000,9999);
	$rand_value.= chr(rand(65,90));
	$rand_value.= rand(1000,9999);
	$rand_value.= chr(rand(97,122));
	$rand_value.= rand(1000,9999);
	$rand_value.= chr(rand(97,122));
	$rand_value.= rand(1000,9999);
	return $rand_value;
}

function redirect($url){
	$url	= htmlspecialbo($url);
	echo '<script type="text/javascript">window.location.href = "' . $url . '";</script>';
	exit();
}

function removeAccent($mystring){
	$marTViet=array(
		// Chữ thường
		"à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă","ằ","ắ","ặ","ẳ","ẵ",
		"è","é","ẹ","ẻ","ẽ","ê","ề","ế","ệ","ể","ễ",
		"ì","í","ị","ỉ","ĩ",
		"ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ","ờ","ớ","ợ","ở","ỡ",
		"ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
		"ỳ","ý","ỵ","ỷ","ỹ",
		"đ","Đ","'",
		// Chữ hoa
		"À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă","Ằ","Ắ","Ặ","Ẳ","Ẵ",
		"È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
		"Ì","Í","Ị","Ỉ","Ĩ",
		"Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ","Ờ","Ớ","Ợ","Ở","Ỡ",
		"Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
		"Ỳ","Ý","Ỵ","Ỷ","Ỹ",
		"Đ","Đ","'"
		);
	$marKoDau=array(
		/// Chữ thường
		"a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a",
		"e","e","e","e","e","e","e","e","e","e","e",
		"i","i","i","i","i",
		"o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o",
		"u","u","u","u","u","u","u","u","u","u","u",
		"y","y","y","y","y",
		"d","D","",
		//Chữ hoa
		"A","A","A","A","A","A","A","A","A","A","A","A","A","A","A","A","A",
		"E","E","E","E","E","E","E","E","E","E","E",
		"I","I","I","I","I",
		"O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O",
		"U","U","U","U","U","U","U","U","U","U","U",
		"Y","Y","Y","Y","Y",
		"D","D","",
		);
	return str_replace($marTViet, $marKoDau, $mystring);
}

function removeHTML($string){
	$string = preg_replace ('/<script.*?\>.*?<\/script>/si', ' ', $string);
	$string = preg_replace ('/<style.*?\>.*?<\/style>/si', ' ', $string);
	$string = preg_replace ('/<.*?\>/si', ' ', $string);
	$string = str_replace ('&nbsp;', ' ', $string);
	$string = mb_convert_encoding($string, "UTF-8", "UTF-8");
	$string = str_replace (array(chr(9),chr(10),chr(13)), ' ', $string);
	for($i = 0; $i <= 5; $i++) $string = str_replace ('  ', ' ', $string);
	return $string;
}

function removeLink($string){
	$string = preg_replace ('/<a.*?\>/si', '', $string);
	$string = preg_replace ('/<\/a>/si', '', $string);
	return $string;
}

function replaceMQ($str){
	$str	= str_replace("\'", "'", $str);
	$str	= str_replace("'", "''", $str);
    $str	= str_replace('\"', '"', $str);
	$str	= str_replace('"', '""', $str);
	$str	= str_replace("\\", "", $str);
	return $str;
}

function remove_magic_quote($str){
	$str = str_replace("\'", "'", $str);
	$str = str_replace("\&quot;", "&quot;", $str);
	$str = str_replace("\\\\", "\\", $str);
	return $str;
}
function checkLoginUser($username, $password){
	$username	= replaceMQ($username);
	$password	= replaceMQ($password);
	$adm_id		= 0;
	$db_check	= new db_query("SELECT use_id 
	FROM user_test
	WHERE use_logname = '" . $username . "' AND use_password = '" . md5($password) . "' AND use_active = 1");
	if(mysql_num_rows($db_check->result) > 0){
		$check	= mysql_fetch_array($db_check->result);
		$adm_id	= $check["use_id"];
		$db_check->close();
		unset($db_check);
		return $adm_id;
	}
	else{
	  ?>
      <script>
         $(function(){
            $('#error').css('display','block');
         });
      </script>
   <?
		$db_check->close();
		unset($db_check);
		return 0;
	}
}
function changePass($username,$password){
	$username	= replaceMQ($username);
	$password	= replaceMQ($password);
	$user_id		= 0;
	$db_check	= new db_query("SELECT use_id 
										 FROM user_test
										 WHERE use_logname = '" . $username . "' AND use_password = '" . md5($password) . "' AND use_active = 1");
	if(mysql_num_rows($db_check->result) > 0){
		$check	= mysql_fetch_array($db_check->result);
		$user_id	= $check["use_id"];
		$db_check->close();
		unset($db_check);
		return $user_id;
	}
	else{
        ?>
        <script>
            alert('Bạn đã khai báo tên truy cập hoặc mật mã không đúng.');
        </script>
        <?
		$db_check->close();
		unset($db_check);
		return false;
	}
}

function forgetPass($email){
	$email	= replaceMQ($email);
	$user_id		= 0;
	$db_check	= new db_query("SELECT use_id 
										 FROM user_test
										 WHERE use_email = '" . $email . "' AND use_active = 1");
	if(mysql_num_rows($db_check->result) > 0){
		$check	= mysql_fetch_array($db_check->result);
		$user_id	= $check["use_id"];
		$db_check->close();
		unset($db_check);
		return $user_id;
	}
	else{
        ?>
        <script>
            alert('Bạn đã khai báo tên truy cập hoặc email không đúng.');
        </script>
        <?
		$db_check->close();
		unset($db_check);
		return false;
	}
}
function video_image($url) {
   $image_url = parse_url($url);
   if ($image_url['host'] == 'www.youtube.com' || $image_url['host'] == 'youtube.com') {
      $array = explode("&", $image_url['query']);
      return "http://img.youtube.com/vi/" . substr($array[0], 2) . "/0.jpg";
   } else if ($image_url['host'] == 'www.vimeo.com' || $image_url['host'] == 'vimeo.com') {
      $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/" . substr($image_url['path'], 1) . ".php"));
      return $hash[0]["thumbnail_small"];
   }
}
function check_user_test($queg_id){
	$check_time = time();
	if($queg_id != "" || $queg_id > 0){
		$list_user_id = "";
		$list_user_done = "";
		$arr = "";
		$db_user = new db_query("SELECT use_id FROM user_test WHERE use_active = 1");
		while($row = mysql_fetch_array($db_user->result)){
			$list_user_id .= $row['use_id'].",";
	    }
	    $list_user_id = substr($list_user_id, 0,-1);
	    $arr_id = explode(',',$list_user_id);
	    $check_time = time();
	      
	    $db_user_done = new db_query("SELECT done_user_id FROM test_done WHERE done_ques_group = ".$queg_id."");
	    while($row_user_done = mysql_fetch_array($db_user_done->result)){
	   		$list_user_done .= $row_user_done['done_user_id'].",";
	    }
	    $list_user_done = substr($list_user_done, 0,-1);
		$arr_done = explode(',',$list_user_done);

		$list = array_diff($arr_id, $arr_done);
		if(sizeof($list) > 0 || sizeof($list) != ""){
			$list = array_values($list);
			for($i=0;$i<sizeof($list);$i++){
				$db_insert = new db_query("INSERT INTO test_done( done_mark,done_messenger, done_write_status, done_date, done_user_id, done_ques_group) VALUES (0,1,0,".$check_time.",".$list[$i].",".$queg_id.")");
				unset($db_insert);
			}
		}
		unset($db_user_done);
	    unset($db_user);
	}
}
function show_room($list_id){
	$list_id = substr($list_id, 0,-1);
	$i = 1;
	$db = new db_query("SELECT roo_name FROM room WHERE roo_id IN (".$list_id.")");
	$count = mysql_num_rows($db->result);
	while($row = mysql_fetch_array($db->result)){
		if($i == $count){
			echo $row['roo_name'];
		}else{
			echo $row['roo_name']." </br> ";
		}
		$i++;
    }
    unset($db);
}
?>