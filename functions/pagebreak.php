<?
// Function generatePageBar 2.0 (Support Ajax) -- Code Editor: boy_infotech
function generatePageBar($page_prefix, $current_page, $page_size, $total_record, $url, $url_prefix = '&', $normal_class, $selected_class, $previous_class = '', $previous = '<', $next_class = '', $next = '>', $first_class = '', $first = '<<', $last_class = '', $last = '>>', $break_type = 1, $page_rewrite = 0, $page_space = 3, $obj_response = '', $page_name = "page")
{

	$page_query_string	= $url_prefix . $page_name . "=";
	// Nếu dùng ModRewrite thì dùng dấu , để phân trang
	if ($page_rewrite == 1) $page_query_string = ",";

	if ($total_record % $page_size == 0) $num_of_page = $total_record / $page_size;
	else $num_of_page = (int)($total_record / $page_size) + 1;

	$page_space = 3;

	$start_page = $current_page - $page_space;
	if ($start_page <= 0) $start_page = 1;

	$end_page = $current_page + $page_space;
	if ($end_page > $num_of_page) $end_page = $num_of_page;

	// Remove XSS
	$url = str_replace('\"', '"', $url);
	$url = str_replace('"', '', $url);

	if ($break_type < 1) $break_type = 1;
	if ($break_type > 4) $break_type = 4;

	// Pagebreak bar
	$page_bar = "";

	// Write prefix on screen
	if ($page_prefix != "") $page_bar .= '<font class="' . $normal_class . '">' . $page_prefix . '</font> ';

	// Write frist page
	if ($break_type == 1) {
		if (($start_page != 1) && ($num_of_page > 1)) {
			if ($obj_response != '') $href = 'javascript:load_data(\'' . $url . $page_query_string . '1' . '\',\'' . $obj_response . '\')';
			else $href = $url . $page_query_string . '1';
			$page_bar .=  '<a href="' . $href . '"  class="' . $normal_class . ' ' . $first_class . '" title="First page">' . $first . '</a> ';
		}
	}

	// Write previous page
	if ($break_type == 1 || $break_type == 2 || $break_type == 4) {
		if (($current_page > 1) && ($num_of_page > 1)) {
			if ($obj_response != '') $href = 'javascript:load_data(\'' . $url . $page_query_string . ($current_page - 1) . '\',\'' . $obj_response . '\')';
			else $href = $url . $page_query_string . ($current_page - 1);
			$page_bar .= ' <a href="' . $href . '"  class="' . $normal_class . ' ' . $previous_class . '" title="Prev page">' . $previous . '</a> ';
			if (($start_page > 1) && ($break_type == 1 || $break_type == 2)) {
				$page_dot_before = $start_page - 1;
				if ($page_dot_before < 1) $page_dot_before = 1;
				if ($obj_response != '') $href = 'javascript:load_data(\'' . $url . $page_query_string . $page_dot_before . '\',\'' . $obj_response . '\')';
				else $href = $url . $page_query_string . $page_dot_before;
				$page_bar .= '<a href="' . $href . '"  class="' . $normal_class . ' notUndeline">...</a> ';
			}
		}
	}

	// Write page numbers
	if ($break_type == 1 || $break_type == 2 || $break_type == 3) {
		$start_loop = $start_page;
		if ($break_type == 3) $start_loop = 1;
		$end_loop	= $end_page;
		if ($break_type == 3) $end_loop = $num_of_page;
		for ($i = $start_loop; $i <= $end_loop; $i++) {
			if ($i != $current_page) {
				if ($obj_response != '') $href = 'javascript:load_data(\'' . $url . $page_query_string . $i . '\',\'' . $obj_response . '\')';
				else $href = $url . $page_query_string . $i;
				$page_bar .= ' <a href="' . $href . '"  class="' . $normal_class . '">' . $i . '</a> ';
			} else {
				$page_bar .= ' <a class="' . $selected_class . '" >' . $i . '</a> ';
			}
		}
	}

	// Write next page
	if ($break_type == 1 || $break_type == 2 || $break_type == 4) {
		if (($current_page < $num_of_page) && ($num_of_page > 1)) {
			if ($obj_response != '') $href = 'javascript:load_data(\'' . $url . $page_query_string . ($current_page + 1) . '\',\'' . $obj_response . '\')';
			else $href = $url . $page_query_string . ($current_page + 1);
			if (($end_page < $num_of_page) && ($break_type == 1 || $break_type == 2)) {
				$page_dot_after = $end_page + 1;
				if ($page_dot_after > $num_of_page) $page_dot_after = $num_of_page;
				if ($obj_response != '') $href = 'javascript:load_data(\'' . $url . $page_query_string . $page_dot_after . '\',\'' . $obj_response . '\')';
				else $href = $url . $page_query_string . $page_dot_after;
				$page_bar .= '<a href="' . $href . '"  class="' . $normal_class . ' notUndeline">...</a> ';
			}
			$page_bar .= ' <a href="' . $href . '"  class="' . $normal_class . ' ' . $next_class . '" title="Next page">' . $next . '</a> ';
		}
	}

	// Write last page
	if ($break_type == 1) {
		if (($end_page < $num_of_page) && ($num_of_page > 1)) {
			if ($obj_response != '') $href = 'javascript:load_data(\'' . $url . $page_query_string . $num_of_page . '\',\'' . $obj_response . '\')';
			else $href = $url . $page_query_string . $num_of_page;
			$page_bar .= ' <a href="' . $href . '"  class="' . $normal_class . ' ' . $last_class . '" title="Last page">' . $last . '</a>';
		}
	}

	// Return pagebreak bar
	return $page_bar;
}

function generatePageBar2($page_prefix, $current_page, $page_size, $total_record, $url, $url_prefix = '&', $normal_class, $selected_class, $previous_class = '', $previous = '<', $next_class = '', $next = '>', $first_class = '', $first = '<<', $last_class = '', $last = '>>', $break_type = 1, $page_rewrite = 0, $page_space = 3, $obj_response = '', $page_name = "page=")
{

	$page_query_string	= $url_prefix . $page_name;
	// Nếu dùng ModRewrite thì dùng dấu , để phân trang
	if ($page_rewrite == 1) $page_query_string = ",";

	if ($total_record % $page_size == 0) $num_of_page = $total_record / $page_size;
	else $num_of_page = (int)($total_record / $page_size) + 1;

	$page_space = 3;

	$start_page = $current_page - $page_space;
	if ($start_page <= 0) $start_page = 1;

	$end_page = $current_page + $page_space;
	if ($end_page > $num_of_page) $end_page = $num_of_page;

	// Remove XSS
	$url = str_replace('\"', '"', $url);
	$url = str_replace('"', '', $url);

	if ($break_type < 1) $break_type = 1;
	if ($break_type > 4) $break_type = 4;

	// Pagebreak bar
	$page_bar = "";

	// Write prefix on screen
	if ($page_prefix != "") $page_bar .= '<font class="' . $normal_class . '">' . $page_prefix . '</font> ';

	// Write frist page
	if ($break_type == 1) {
		if (($start_page != 1) && ($num_of_page > 1)) {
			if ($obj_response != '') $href = 'javascript:load_data(\'' . $url . $page_query_string . '1' . '\',\'' . $obj_response . '\')';
			else $href = $url . $page_query_string . '1';
			$page_bar .=  '<a href="' . $href . '"  class="' . $normal_class . ' ' . $first_class . '" title="First page">' . $first . '</a> ';
		}
	}

	// Write previous page
	if ($break_type == 1 || $break_type == 2 || $break_type == 4) {
		if (($current_page > 1) && ($num_of_page > 1)) {
			if ($obj_response != '') $href = 'javascript:load_data(\'' . $url . $page_query_string . ($current_page - 1) . '\',\'' . $obj_response . '\')';
			else $href = $url . $page_query_string . ($current_page - 1);
			$page_bar .= ' <a href="' . $href . '"  class="' . $normal_class . ' ' . $previous_class . '" title="Prev page">' . $previous . '</a> ';
			if (($start_page > 1) && ($break_type == 1 || $break_type == 2)) {
				$page_dot_before = $start_page - 1;
				if ($page_dot_before < 1) $page_dot_before = 1;
				if ($obj_response != '') $href = 'javascript:load_data(\'' . $url . $page_query_string . $page_dot_before . '\',\'' . $obj_response . '\')';
				else $href = $url . $page_query_string . $page_dot_before;
				$page_bar .= '<a href="' . $href . '" class="' . $normal_class . ' notUndeline">...</a> ';
			}
		}
	}

	// Write page numbers
	if ($break_type == 1 || $break_type == 2 || $break_type == 3) {
		$start_loop = $start_page;
		if ($break_type == 3) $start_loop = 1;
		$end_loop	= $end_page;
		if ($break_type == 3) $end_loop = $num_of_page;
		for ($i = $start_loop; $i <= $end_loop; $i++) {
			if ($i != $current_page) {
				if ($obj_response != '') $href = 'javascript:load_data(\'' . $url . $page_query_string . $i . '\',\'' . $obj_response . '\')';
				else $href = $url . $page_query_string . $i;
				$page_bar .= ' <a href="' . $href . '"  class="' . $normal_class . '">' . $i . '</a> ';
			} else {
				$page_bar .= ' <a class="' . $selected_class . '" >' . $i . '</a> ';
			}
		}
	}

	// Write next page
	if ($break_type == 1 || $break_type == 2 || $break_type == 4) {
		if (($current_page < $num_of_page) && ($num_of_page > 1)) {
			if ($obj_response != '') $href = 'javascript:load_data(\'' . $url . $page_query_string . ($current_page + 1) . '\',\'' . $obj_response . '\')';
			else $href = $url . $page_query_string . ($current_page + 1);
			$page_bar .= ' <a href="' . $href . '"  class="' . $normal_class . ' ' . $next_class . '" title="Next page">' . $next . '</a> ';
			if (($end_page < $num_of_page) && ($break_type == 1 || $break_type == 2)) {
				$page_dot_after = $end_page + 1;
				if ($page_dot_after > $num_of_page) $page_dot_after = 1;
				if ($obj_response != '') $href = 'javascript:load_data(\'' . $url . $page_query_string . $page_dot_after . '\',\'' . $obj_response . '\')';
				else $href = $url . $page_query_string . $page_dot_after;
				$page_bar .= '<a href="' . $href . '"  class="' . $normal_class . ' notUndeline">...</a> ';
			}
		}
	}

	// Write last page
	if ($break_type == 1) {
		if (($end_page < $num_of_page) && ($num_of_page > 1)) {
			if ($obj_response != '') $href = 'javascript:load_data(\'' . $url . $page_query_string . $num_of_page . '\',\'' . $obj_response . '\')';
			else $href = $url . $page_query_string . $num_of_page;
			$page_bar .= ' <a href="' . $href . '"  class="' . $normal_class . ' ' . $last_class . '" title="Last page">' . $last . '</a>';
		}
	}

	// Return pagebreak bar
	return $page_bar;
}
function generatePageBar3($page_prefix, $current_page, $page_size, $total_record, $url, $url_prefix = '&', $normal_class, $selected_class, $previous_class = '', $previous = '<', $next_class = '', $next = '>', $first_class = '', $first = '<<', $last_class = '', $last = '>>', $break_type = 1, $page_rewrite = 0, $page_space = 3, $obj_response = '', $page_name = "page=")
{

	$page_query_string	= $url_prefix . $page_name;
	// Nếu dùng ModRewrite thì dùng dấu , để phân trang
	if ($page_rewrite == 1) $page_query_string = ",";

	if ($total_record % $page_size == 0) $num_of_page = $total_record / $page_size;
	else $num_of_page = (int)($total_record / $page_size) + 1;

	$page_space = 3;

	$start_page = $current_page - $page_space;
	if ($start_page <= 0) $start_page = 1;

	$end_page = $current_page + $page_space;
	if ($end_page > $num_of_page) $end_page = $num_of_page;

	// Remove XSS
	$url = str_replace('\"', '"', $url);
	$url = str_replace('"', '', $url);

	if ($break_type < 1) $break_type = 1;
	if ($break_type > 4) $break_type = 4;

	// Pagebreak bar
	$page_bar = "";

	// Write prefix on screen
	if ($page_prefix != "") $page_bar .= '<font class="' . $normal_class . '">' . $page_prefix . '</font> ';

	// Write frist page
	// if ($break_type == 1) {
	// 	if (($start_page != 1) && ($num_of_page > 1)) {
	// 		if ($obj_response != '') $href = 'javascript:load_data(\'' . $url . $page_query_string . '1' . '\',\'' . $obj_response . '\')';
	// 		else $href = $url . $page_query_string . '1';
	// 		$page_bar .=  '<li><a rel="nofollow" href="' . $href . '"  class="' . $normal_class . ' ' . $first_class . '" title="First page">' . $first . '</a></li>';
	// 	}
	// }

	// Write previous page
	if ($break_type == 1 || $break_type == 2 || $break_type == 4) {
		if (($current_page > 1) && ($num_of_page > 1)) {
			if ($obj_response != '') $href = 'javascript:load_data(\'' . $url . $page_query_string . ($current_page - 1) . '\',\'' . $obj_response . '\')';
			else $href = $url . $page_query_string . ($current_page - 1);
			$page_bar .= '<li><a rel="nofollow" href="' . $href . '"  class="' . $normal_class . ' ' . $previous_class . '" title="Prev page">' . $previous . '</a></li>';
			// if(($start_page > 1) && ($break_type == 1 || $break_type == 2)){
			// 	$page_dot_before = $start_page - 1;
			// 	if($page_dot_before < 1) $page_dot_before = 1;
			// 	if($obj_response != '') $href = 'javascript:load_data(\'' . $url . $page_query_string . $page_dot_before . '\',\'' . $obj_response . '\')';
			// 	else $href = $url . $page_query_string . $page_dot_before;
			// 	$page_bar .= '<li><a rel="nofollow" href="' . $href . '" class="' . $normal_class . ' notUndeline">...</a></li>';
			// }
		}
	}

	// Write page numbers
	if ($break_type == 1 || $break_type == 2 || $break_type == 3) {
		$start_loop = $start_page;
		if ($break_type == 3) $start_loop = 1;
		$end_loop	= $end_page;
		if ($break_type == 3) $end_loop = $num_of_page;
		for ($i = $start_loop; $i <= $end_loop; $i++) {
			if ($i != $current_page) {
				if ($obj_response != '') $href = 'javascript:load_data(\'' . $url . $page_query_string . $i . '\',\'' . $obj_response . '\')';
				else $href = $url . $page_query_string . $i;
				$page_bar .= '<li><a rel="nofollow" href="' . $href . '"  class="' . $normal_class . '">' . $i . '</a></li>';
			} else {
				$page_bar .= '<li class="' . $selected_class . '"><a rel="nofollow"  >' . $i . '</a></li>';
			}
		}
	}

	// Write next page
	if ($break_type == 1 || $break_type == 2 || $break_type == 4) {
		if (($current_page < $num_of_page) && ($num_of_page > 1)) {
			if ($obj_response != '') $href = 'javascript:load_data(\'' . $url . $page_query_string . ($current_page + 1) . '\',\'' . $obj_response . '\')';
			else $href = $url . $page_query_string . ($current_page + 1);
			$page_bar .= '<li><a rel="nofollow" href="' . $href . '"  class="' . $normal_class . ' ' . $next_class . '" title="Next page">' . $next . '</a></li>';
			//  if(($end_page < $num_of_page) && ($break_type == 1 || $break_type == 2)){
			// 		$page_dot_after = $end_page + 1;
			// 		if($page_dot_after > $num_of_page) $page_dot_after = 1;
			// 		if($obj_response != '') $href = 'javascript:load_data(\'' . $url . $page_query_string . $page_dot_after . '\',\'' . $obj_response . '\')';
			// 		else $href = $url . $page_query_string . $page_dot_after;
			// 		$page_bar .= '<li><a rel="nofollow" href="' . $href . '"  class="' . $normal_class . ' notUndeline">...</a></li>';
			// 	}
		}
	}

	// Write last page
	// if($break_type == 1){
	// 	if(($end_page < $num_of_page) && ($num_of_page > 1)){
	// 		if($obj_response != '') $href = 'javascript:load_data(\'' . $url . $page_query_string . $num_of_page . '\',\'' . $obj_response . '\')';
	// 		else $href = $url . $page_query_string . $num_of_page;
	// 		$page_bar .= '<li><a rel="nofollow"  href="' . $href . '"  class="' . $normal_class . ' '.$last_class.'" title="Last page">' . $last . '</a></li>';
	// 	}
	// }

	// Return pagebreak bar
	return $page_bar;
}
