<?
function generatePageBar($prefix, $current_page, $page_size, $total_record, $url, $normal_class, $selected_class, $query_string = '', $pageType = "page", $previous = "&nbsp;&lt;&lt; ", $next = " &gt;&gt;&nbsp;"){
	
	if ($total_record % $page_size == 0){
		$num_of_page = $total_record / $page_size;
	}else{
		$num_of_page = (int)($total_record / $page_size) + 1;
	} // End if ($total_record % $page_size == 0){

	$page_num = 3;
	
	$start_page = $current_page - $page_num;
	if($start_page <= 0) $start_page = 1;
	
	if($current_page == 1){
		$end_page = $current_page + $page_num+2;
		if($end_page > $num_of_page) $end_page = $num_of_page;
	}elseif($current_page == 2){
		$end_page = $current_page + $page_num+1;
		if($end_page > $num_of_page) $end_page = $num_of_page;
	}else{
		$end_page = $current_page + $page_num;
		if($end_page > $num_of_page) $end_page = $num_of_page;	
	} // End if($current_page == 1){
	
	$str = '';
	// Trang truoc
	if(($current_page > 1) && ($num_of_page > 1)){
		$str  .= '<li class="' . $normal_class . '"><a title="Previous page" href="' . $url . '1' . $query_string . '">' . $previous . '</a></li>';
		if($start_page !=1) $str  .= '  ';
	}
	
	// Trang
	for($i=$start_page; $i<=$end_page; $i++){
		if($i != $current_page){
			$str  .= '<li class="' . $normal_class . '"><a title="Page ' . $i . '" href="' . $url . $i . $query_string . '">' . $i . '</a></li>';
		}
		else{
			$str  .= '<li class="' . $selected_class . '"><a title="Page ' . $i . '">' . $i . '</a></li>';
		} // End if($i != $current_page){
	} // End for($i=$start_page; $i<=$end_page; $i++){
	
	// Trang sau
	if(($current_page < $num_of_page) && ($num_of_page > 1)){
		if($end_page < $num_of_page) $str  .= '  ';
		$str  .= '<li class="' . $normal_class . '"><a title="Next page" href="' . $url . ($num_of_page) . $query_string . '">' . $next . '</a></li>';
	} // End if(($current_page < $num_of_page) && ($num_of_page > 1)){
	
	return $str;
} // End function generatePageBar
?>