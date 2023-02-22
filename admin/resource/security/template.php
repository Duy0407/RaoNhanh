<?
function template_tab($array = array()){
	global $module_id;
	
	$str  = '';
	$str .= '<div class="template2">';
//	$str .= '	<div class="t1">';
foreach($array as $key=>$value){
	$str .= '		<div class="t2"><div class="t3"><a href="' . $value . '">' . $key . '</a></div></div>';
}
//	$str .= '	</div>';
	$str .= '	<div style="clear:both"></div>';
	/*----------..................... Start WEB CONTENT here ....................----------*/
	$str .= '	<div class="t4">';

	return $str;
}

function template_top($title='',$search=''){
	global $module_id;
	
	$str  = '';
	$str .= '<div class="template2">';
//	$str .= '	<div class="t1">';
//	$str .= '		<div class="t2"><div class="t3">' . $title . '</div></div>';
if($search!=''){
	$str .= '		<div class="t5"><div class="t6">' . $search . '</div></div>';
}
//	$str .= '	</div>';
	$str .= '	<div style="clear:both"></div>';
	/*----------..................... Start WEB CONTENT here ....................----------*/
	$str .= '	<div class="t4">';
	
	return $str;
}

function template_bottom(){
	global $module_id;
	
	$str  = '';
	$str .= '	</div>';
	/*----------...................... End WEB CONTENT here .....................----------*/
	$str .= '</div>';
	
	return $str; 
}
?>