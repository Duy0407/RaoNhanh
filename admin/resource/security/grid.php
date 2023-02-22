<?
/*
	Code : dinhtoan1905
	Classs tao listing trong admin
	delete
*/
class fsDataGird
{

	var $stt 					= 0;
	var $arrayField 			= array();
	var $arrayLabel 			= array();
	var $arrayType	 			= array();
	var $arrayAttribute		= array();
	var $arrayShow				= array();
	var $field_id				=  '';
	var $field_name			=  '';
	var $image_path			= '../../resource/images/grid/';
	var $fs_border				= "#C3DAF9";
	var $html					= '';
	var $scriptText			= '';
	var $title					= '';
	var $arraySort				= array();
	var $arraySearch			= array();
	var $arrayAddSearch		= array();
	var $quickEdit 			= true;
	var $total_list			= 0;
	var $total_record			= 0;
	var $page_size				= 30;
	var $edit_ajax				= false;
	var $showid					= true;
	var $arrayFieldLevel		= array();
	var $delete 				= true;
	var $searchKeyword		= false;
	var $sql_keyword 			= '';


	//add cac truong va tieu de vao
	function fsDataGird($field_id, $field_name, $title)
	{
		$this->field_id 	= $field_id;
		$this->field_name	= $field_name;
		$this->title 		= $title;
	}


	/*
	1: Ten truong trong bang
	2: Tieu de header
	3: kieu du lieu
	4: co sap xep hay khong, co thi de la 1, khong thi de la 0
	5: co tim kiem hay khong, co thi de la 1, khong thi de la 0
	*/
	function add($field_name, $lable, $type = "string", $sort = 0, $search = 0, $attributes = "", $show = 0)
	{
		if ($sort == 1) $this->arraySort[$this->stt] = $field_name;
		if ($search == 1) $this->arraySearch[$this->stt] = $field_name;

		$this->arrayField[$this->stt] 		= $field_name;
		$this->arrayLabel[$this->stt] 		= $lable;
		$this->arrayType[$this->stt]  		= $type;
		$this->arrayAttribute[$this->stt]  	= $attributes;
		$this->arrayShow[$this->stt]  		= $show;
		$this->stt++;

		if ($type == "array") {
			global $$field_name;
			$arrayList = $$field_name;
			$strdata   = array();
			foreach ($arrayList as $key => $value) {
				$strdata[] = $key . ':' . "'" . str_replace("'", "\'", $value) . "'";
			}
			$strdata = implode(",", $strdata);
			$this->scriptText .= '<script type="text/javascript">';
			$this->scriptText .=  '$(function() {
										  $(".editable_select_' . $field_name . '").editable("listing.php?ajaxedit=1", {
											 indicator : \'<img src="' . $this->image_path . 'indicator.gif">\',
											 tooltip   : "' . translate_text("No selected") . '",
											 data   : "{' . $strdata . '}",
											 type   : "select",
											 submit : "' . translate_text("Save") . '",
											 style  : "inherit",
											 submitdata : function() {
												return {id : $(this).attr("name"),array : \'' . $field_name . '\'};
											 }
										  });
										});';
			$this->scriptText .= '</script>';
		} // End if($type=="array")

	} // End function add

	function showHeader($total_list)
	{

		$str  = '';
		//goi phan template
		$str .= template_top($this->title, $this->urlsearch());

		if ($this->quickEdit) {
			//phan quick edit
			$str .= '<form action="quickedit.php?url=' . base64_encode($_SERVER['REQUEST_URI']) . '" method="post" enctype="multipart/form-data" name="listing">
						<input type="hidden" name="iQuick" value="update">';
		}

		$str .= '	<table id="listing" cellpadding="5" cellspacing="0" border="1" bordercolor="' . $this->fs_border . '" width="100%" class="table">';

		if ($this->showid) {
			$str .= '		<th class="h" width="30">Stt</th>';
		}

		if ($this->delete) {
			$str .= '		<th class="h check"><input type="checkbox" id="check_all" onclick="checkall(' . $total_list . ')"></th>';
		}

		if ($this->quickEdit) {
			//phan quick edit
			$str .= '		<th class="h"><img src="' . $this->image_path . 'save.png" onclick="document.listing.submit()" style="cursor: pointer;" border="0"></th>';
		}

		foreach ($this->arrayLabel as $key => $lable) {
			if ($this->arrayShow[$key] == 0) {
				$str .= '		<th class="h">' . $lable . $this->urlsort($this->arrayField[$key]) . ' </th>';
			}
		}

		return $str;
	} // End function showHeader

	function showFooter($total_list)
	{
		$str = '';

		$str .= '	</table>';

		//goi ham xu ly phan footer ra
		$str .= '<div class="table_footer">' . $this->footer($total_list) . '</div>';

		if ($this->quickEdit) {
			$str .= '</form>';
		}

		//khet thuc phan template
		$str .= template_bottom();

		return $str;
	}

	/*
	Ham hien thi ra listing
	db : ket qua tra ve cua cau lenh query gọi từ class db_query
	*/
	function showTable($db, $multi = 0)
	{

		//phan html help
		$str  = '';
		$str .= $this->showHeader(mysql_num_rows($db->result));

		$i = 0;

		$page = getValue("page");
		if ($page < 1) $page = 1;

		while ($row = mysql_fetch_assoc($db->result)) {
			$i++;
			$str .= '<tbody id="tr_' . $row[$this->field_id] . '">';
			$str .= '	<tr ' . (($i % 2 == 0) ? 'bgcolor="#f7f7f7"' : '') . '>';

			//phan so thu tu
			if ($this->showid) {
				$str .= $this->showId($i, $page);
			}

			//phan checkbok cho tung record
			$str .= $this->showCheck($i, $row[$this->field_id]);

			foreach ($this->arrayField as $key => $field) {

				$str .= $this->checkType($row, $key);
			}

			$str .= '	</tr>';
			$str .= '</tbody>';
		} // End while($row = mysql_fetch_assoc($db->result))

		//phan footer
		$str .= $this->showFooter(mysql_num_rows($db->result));

		return $str;
	} // End function showTable

	function start_tr($i, $record_id, $add_html = "")
	{
		$page = getValue("page");
		if ($page < 1) $page = 1;

		$str	= '';
		$str .= '<tbody id="tr_' . $record_id . '">
						<tr ' . (($i % 2 == 0) ? 'bgcolor="#f7f7f7"' : '') . '>';
		if ($this->showid) {
			$str .= 			$this->showId($i, $page);
		}
		$str .= 			$this->showCheck($i, $record_id);

		return $str;
	}

	function end_tr()
	{
		$str  = '';
		$str .= '	</tr>
					</tbody>';
		return $str;
	}

	function showId($i, $page)
	{
		$str = '<td width=15 align="center"><span style="color:#142E62; font-weight:bold">' . ($i + (($page - 1) * $this->page_size)) . '</span></td>';
		return $str;
	}

	function showCheck($i, $record_id)
	{
		$str = '';
		if ($this->delete) {
			$str .= '<td class="check"><input type="checkbox" class="check" name="record_id[]" id="record_' . $i . '" value="' . $record_id . '"></td>';
		}
		if ($this->quickEdit) {
			//phan quick edit
			$str .= '<td width=15><img src="' . $this->image_path . 'save.png" style="cursor: pointer;" onclick="document.getElementById(\'record_' . $i . '\').checked = true; document.listing.submit()" border="0"></td>';
		}
		return $str;
	}
	// tin mua không ghim
	function showGhim($record_id)
	{
		return '<td width="10" align="center"><a class="edit"  rel="tooltip" title="' . translate_text("Bạn muốn chỉnh sửa ghim tin") . '" href="editGhim.php?record_id=' .  $record_id . '&url=' . base64_encode($_SERVER['REQUEST_URI']) . '"><img src="' . $this->image_path . 'edit.png" border="0"></a></td>';
	}
	function showEdit($record_id)
	{
		return '<td width="10" align="center"><a class="edit"  rel="tooltip" title="' . translate_text("Bạn muốn sửa bản ghi") . '" href="edit.php?record_id=' .  $record_id . '&url=' . base64_encode($_SERVER['REQUEST_URI']) . '"><img src="' . $this->image_path . 'edit.png" border="0"></a></td>';
	}
	function showDelete($record_id)
	{
		return '<td width="10"  align="center"><a class="delete" href="#" onclick="if (confirm(\''  . str_replace("'", "\'", translate_text("Bạn muốn xóa bản ghi?")) . '\')){ deleteone(' . $record_id . '); }"><img src="' . $this->image_path . 'delete.gif" border="0"></a></td>';
	}
	function showCopy($record_id)
	{
		return '<td width="10" align="center"><a class="edit"  rel="tooltip"  title="' . translate_text("Copy thêm một bản ghi mới") . '" href="copy.php?record_id=' .  $record_id . '&url=' . base64_encode($_SERVER['REQUEST_URI']) . '"><img src="' . $this->image_path . 'copy.gif" border="0"></a></td>';
	}
	function addAttr($i, $name, $id = "", $class = "form_control")
	{
		if ($id == "") $id = $name;
		return ' class="form_control" name="' . $name . '" id="' . $id . '" onkeyup="check_edit(\'record_' . $i . '\')"';
	}
	function showCheckbox($field, $value, $record_id)
	{
		return '<td width="10" align="center"><a class="edit" onclick="update_check(this); return false" href="active.php?ajax=1&field=' . $field . '&checkbox=1&record_id=' .  $record_id . '&url=' . base64_encode($_SERVER['REQUEST_URI']) . '"><img src="' . $this->image_path . 'check_' . $value . '.gif" border="0"></a></td>';
	}
	function showEditPic($record_id)
	{
		return '<td width="10" align="center"><a class="edit"  rel="tooltip" title="' . translate_text("Bạn muốn sửa bản ghi") . '" href="edit_picture.php?record_id=' .  $record_id . '&url=' . base64_encode($_SERVER['REQUEST_URI']) . '"><img src="' . $this->image_path . 'edit.png" border="0"></a></td>';
	}
	/*
	Ham xu ly type hien thi
	xử lý các kiểu hiển thị trong listing
	row  : truyền array row gọi từ mysql_fetch_assoc ra
	key  : thứ tự trường add vào
	*/

	function checkType($row, $key)
	{
		$level = "";
		if (isset($this->arrayFieldLevel[$this->arrayField[$key]])) {
			for ($i = 0; $i < $row["level"]; $i++) {
				$level .= $this->arrayFieldLevel[$this->arrayField[$key]];
			}
		}
		switch ($this->arrayType[$key]) {

				//kiểu tiền tệ VNĐ
			case "vnd":
				return '<td ' . $this->arrayAttribute[$key] . '><span class="clickedit vnd" style="display:inline" id="' . $this->arrayField[$key] . ',' . $row[$this->field_id] . ',3">' .  formatNumber($row[$this->arrayField[$key]]) . '</span></td>';
				break;

				//kiểu tiền tệ USD
			case "usd":
				return '<td ' . $this->arrayAttribute[$key] . '><span class="clickedit vnd" style="display:inline" id="' . $this->arrayField[$key] . ',' . $row[$this->field_id] . ',3">' .  $row[$this->arrayField[$key]] . '</span></td>';
				break;

				//kiểu ngày tháng
			case "date":
				return '<td class="date" align="center" ' . $this->arrayAttribute[$key] . '>' .  date("d/m/Y", $row[$this->arrayField[$key]]) . '</td>';
				break;

				//kiểu hình ảnh
			case "picture":
				if ($row[$this->arrayField[$key]] != '') {
					global $fs_filepath;
					return '<td width="30" align="center" style="padding:1px;" ><a rel="tooltip"  title="<img src=\'' . $fs_filepath . "small/small_" . $row[$this->arrayField[$key]] . '\' border=\'0\'>" href="#"><img src="' . $fs_filepath . "/small/small_" . $row[$this->arrayField[$key]] . '" width=30 height="20" border="0"></a></td>';
				} else {
					return '<td width="30">&nbsp;</td>';
				}
				break;

				//kiểu mãng dùng cho combobox có thể edit
			case "array":
				$field = $this->arrayField[$key];
				global $$field;
				$arrayList = $$field;
				$value = isset($arrayList[$row[$this->arrayField[$key]]]) ? $arrayList[$row[$this->arrayField[$key]]] : '';
				return '<td ' . $this->arrayAttribute[$key] . '  class="tooltip"  title="' . translate_text("Click sửa đổi sau đó chọn save") . '"><span class="editable_select_' . $this->arrayField[$key] . '" style="display:inline" id="select_2" name="' . $this->arrayField[$key] . ',' . $row[$this->field_id] . ',0">' . str_replace("-", "", $value)  . '</span></td>';
				break;

				//kiểu mãng chỉ hiển thị không edit được
			case "arraytext":
				$field = $this->arrayField[$key];
				global $$field;
				$arrayList = $$field;
				$value = isset($arrayList[$row[$this->arrayField[$key]]]) ? $arrayList[$row[$this->arrayField[$key]]] : '';
				return '<td ' . $this->arrayAttribute[$key] . '>' . str_replace("-", "", $value)  . '</td>';
				break;

				//kiểu copy bản ghi
			case "copy":
				return '<td width="10" align="center"><a class="edit"  rel="tooltip"  title="' . translate_text("Nhân bản thêm 1 bản ghi mới") . '" href="copy.php?record_id=' .  $row[$this->field_id] . '&url=' . base64_encode($_SERVER['REQUEST_URI']) . '"><img src="' . $this->image_path . 'copy.gif" border="0"></a></td>';
				break;

				//kiểu check box giá trị là 0 hoặc 1
			case "checkbox":
				return '<td width="10" align="center"><a class="edit" onclick="update_check(this); return false" href="listing.php?field=' . $this->arrayField[$key] . '&checkbox=1&record_id=' .  $row[$this->field_id] . '&url=' . base64_encode($_SERVER['REQUEST_URI']) . '"><img src="' . $this->image_path . 'check_' . $row[$this->arrayField[$key]] . '.gif" border="0"></a></td>';
				break;

				//kiểu hiển thị nút edit
			case "edit":
				return '<td width="10" align="center"><a class="edit"  rel="tooltip" title="' . translate_text("Bạn muốn sửa đổi bản ghi") . '" href="edit.php?record_id=' .  $row[$this->field_id] . '&url=' . base64_encode($_SERVER['REQUEST_URI']) . '"><img src="' . $this->image_path . 'edit.png" border="0"></a></td>';
				break;

				//kểu hiện thị nút xóa
			case "delete":
				if ($this->delete) {
					return '<td width="10"  align="center"><a class="delete" href="#" onclick="if (confirm(\''  . str_replace("'", "\'", translate_text("Bạn muốn xóa bản ghi?") . ': ' . $row[$this->field_name])  . '\')){ deleteone(' . $row[$this->field_id] . '); }"><img src="' . $this->image_path . 'delete.gif" border="0"></a></td>';
				} else {
					return '';
				}
				break;

			case "view":
				return '<td width="10" align="center"><a class="view"  rel="tooltip" title="' . translate_text("Bạn muốn xem bản ghi") . '" href="view.php?record_id=' .  $row[$this->field_id] . '&url=' . base64_encode($_SERVER['REQUEST_URI']) . '"><img src="' . $this->image_path . 'view.gif" border="0"></a></td>';
				break;

				//kểu hiện thị nút xem toàn bộ phá giá của doanh nghiệp
			case "view_phagia":
				return '<td width="80" align="center"><a class="edit"  rel="tooltip" title="' . translate_text("Xem toàn bộ phá giá") . '" href="../phagia/listing.php?iBus=' .  $row[$this->field_id] . '&url=' . base64_encode($_SERVER['REQUEST_URI']) . '"><img src="' . $this->image_path . 'view.gif" border="0"></a></td>';
				break;

				//kiểu hiển thị text có sửa đổi
			case "string":
				return '<td ' . $this->arrayAttribute[$key] . ' class="tooltip"  title="' . translate_text("Click vào để sửa đổi sau đó enter để lưu lại") . '">' . $level . '<span class="clickedit" style="display:inline" id="' . $this->arrayField[$key] . ',' . $row[$this->field_id] . ',0">' .  $row[$this->arrayField[$key]] . '</span></td>';
				break;

				//kiểu hiện thị text không sửa đổi
			case "text":
				return '<td ' . $this->arrayAttribute[$key] . '>'  .  $row[$this->arrayField[$key]] . '</td>';
				break;

				//kiểu hiển thị số có sửa đổi
			case "number":
				return '<td ' . $this->arrayAttribute[$key] . ' class="tooltip"  title="' . translate_text("Click vào để sửa đổi sau đó enter để lưu lại") . '" align="center" width="10%" nowrap="nowrap">' . $level . '<span class="clickedit" style="display:inline" id="' . $this->arrayField[$key] . ',' . $row[$this->field_id] . ',0">' .  $row[$this->arrayField[$key]] . '</span></td>';
				break;

				//kiểu hiển thị số ko sửa đổi
			case "numbernotedit":
				return '<td ' . $this->arrayAttribute[$key] . ' align="center" width="10%" nowrap="nowrap">' . $level .  $row[$this->arrayField[$key]] . '</td>';
				break;

				//kiểu hiện nút reset
			case "resetpass":
				return '<td width="10"  align="center"><a href="#" onclick="if (confirm(\''  . str_replace("'", "\'", translate_text("Bạn muốn reset lại password của user này không?") . ': ' . $row[$this->field_name])  . '\')){ resetpass(' . $row[$this->field_id] . '); }"><img src="' . $this->image_path . 'reset.gif" border="0"></a></td>';
				break;

				//kểu hiện thị nút gui email
			case "sent_email":
				return '<td width="80" align="center"><a class="edit" href="#"  rel="tooltip" title="' . translate_text("Gửi email thông báo tới thành viên") . '" onclick="sent_email(\'' . $row[$this->field_id] . '\')"><img src="' . $this->image_path . 'send.gif" border="0"></a></td>';
				break;

				//dạng mặc định
			default:
				return '<td ' . $this->arrayAttribute[$key] . '>' .  $row[$this->arrayField[$key]] . '</td>';
				break;
		}
	}

	/*
	ham format kieu so
	*/
	function formatNumber($number)
	{
		$number = number_format(round($number / 1000) * 1000, 0, "", ".");
		return $number;
	}

	/*
	phan header javascript
	*/

	function headerScript()
	{
		$this->scriptText .= '<script type="text/javascript">';
		//phan script edit nhanh text box
		$this->scriptText .= '$(function() {

									  $(".clickedit").editable("listing.php?ajaxedit=1", {
											indicator : "<img src=\'../../resource/images/grid/indicator.gif\'>",
											tooltip   : "' . translate_text("Click to edit...") . '",
											style  : "inherit"
									  });
									});
									';


		//phan javascript hover vao cac tr
		$this->scriptText .= "$( function(){
											var bg = '';
											$('table#listing tr').hover( function(){
												bg = $(this).css('background-color');
												$(this).css('background-color', '#FFFFCC');
											},
											function(){
												$(this).css('background-color', bg);
											});

									});";
		$this->scriptText .= '</script>';
		$this->scriptText .= '<script language="javascript" src="../../resource/js/grid.js"></script>';

		return $this->scriptText;
	}

	/*
	ham tao ra nut sap xep
	field : tên trường
	*/
	function urlsort($field)
	{
		$str 	= '';

		if (in_array($field, $this->arraySort)) {

			$url 			= getURL(0, 1, 1, 1, "sort|sortname");
			$sort 		= getValue("sort", "str", "GET", "");
			$sortname 	= getValue("sortname", "str", "GET", "");
			$img			= 'sort.gif';
			if ($sortname != $field) $sort = "";
			switch ($sort) {
				case "asc":
					$url 	= $url . "&sort=desc";
					$img	= 'sort-asc.gif';
					break;
				case "desc":
					$url 	= $url . "&sort=asc";
					$img	= 'sort-desc.gif';
					break;
				default:
					$url 	= $url . "&sort=asc";
					$img	= 'sort.gif';
					break;
			}

			$url 	= $url . "&sortname=" . $field;

			$str = '&nbsp;<span><a href="' . $url . '"  rel="tooltip"  title="' . translate_text("Sort A->Z or Z->A") . '" onclick="loadpage(this); return false" ><img src="' . $this->image_path . $img . '" align="absmiddle" border="0"></a></span>';
		}

		return $str;
	}

	/*
	ham tao cau lanh sql sort
	hàm sinh ra câu lênh query sort tương ứng
	*/

	function sqlSort()
	{
		$sort 		= getValue("sort", "str", "GET", "");
		$field	 	= getValue("sortname", "str", "GET", "");
		$str 			= '';
		if (in_array($field, $this->arraySort) && ($sort == "asc" || $sort == "desc")) {
			$str 		= $field . ' ' . $sort . ',';
		}
		return $str;
	}
	/*
	ham add them cac truong search
	name : tiêu đề
	field : tên trường
	type : kiểu search
	value : giá trị nếu kiểu array thì truyền vào một array
	default: giá trị mặc định
	*/
	function addSearch($name, $field, $type, $value = '', $default = "")
	{
		$str = '';
		switch ($type) {
				//kiểu array
			case "array":
				$str .= '<select name="' . $field . '" id="' . $field . '" class="textbox">';
				foreach ($value as $id => $text) {
					$str .= '<option value="' . $id . '" ' . (($default == $id) ? 'selected' : '') . '>' . $text . '</option>';
				}
				$str .= '</select>';
				break;

				//kiểu ngày tháng
			case "date":
				$value = getValue($field, "str", "GET", "dd/mm/yyyy");
				$str .= '<input type="text"  class="textbox" name="' . $field . '" id="' . $field . '" style="width:90px;"  onKeyPress="displayDatePicker(\'' . $field . '\', this);" onClick="displayDatePicker(\'' . $field . '\', this);" onfocus="if(this.value==\'' . translate_text("Enter date") . '\') this.value=\'\'" onblur="if(this.value==\'\') this.value=\'' . translate_text("Enter date")  . '\'" value="' . $value . '">';
				break;

				//kiểu text box
			case "text":
				$value = getValue($field, "str", "GET", ($value != '' ? $value : translate_text("Enter keyword")));
				$str .= '<input type="text"  class="textbox" name="' . $field . '" id="' . $field . '" style="width:130px;"  onfocus="if(this.value==\'' . translate_text("Enter keyword") . '\') this.value=\'\'" onblur="if(this.value==\'\') this.value=\'' . translate_text("Enter keyword")  . '\'" value="' . $value . '">';
				break;
		}
		$this->arrayAddSearch[] = array($str, $field, $name);
	}
	/*
	ham tao form search
	*/
	function urlsearch()
	{
		$str  = '';
		$str .= '<form action="' . $_SERVER['SCRIPT_NAME'] . '" methor="get" name="form_search" onsubmit="check_form_submit(this); return false">';
		$str .= '<input type="hidden" name="search" id="search" value="1" />';
		$str .= '<table cellpadding="0" cellspacing="0" border="0"><tr>';
		if ($this->searchKeyword) {
			$label = translate_text("Nhập từ khóa");
			$value = getValue("keyword", "str", "GET", $label);
			$str .= '<td><input type="text" class="textbox" name="keyword" id="keyword" onfocus="if(this.value==\'' . $label . '\') this.value=\'\'" onblur="if(this.value==\'\') this.value=\'' . $label . '\'" value="' . $value . '"></td>';
		}
		foreach ($this->arraySearch as $key => $field) {

			switch ($this->arrayType[$key]) {

				case "string":
				case "text":
				case "numbernotedit":
				case "number":
					$value = getValue($field, "str", "GET", $this->arrayLabel[$key]);
					$str .= '<td><input type="text" class="textbox" name="' . $field . '" id="' . $field . '" onfocus="if(this.value==\'' . $this->arrayLabel[$key] . '\') this.value=\'\'" onblur="if(this.value==\'\') this.value=\'' . $this->arrayLabel[$key] . '\'" value="' . $value . '"></td>';
					break;
				case "hidden":
					$value = getValue($field, "str", "GET", $this->arrayLabel[$key]);
					$str .= '<td><input type="hidden" class="textbox" name="' . $field . '" id="' . $field . '" onfocus="if(this.value==\'' . $this->arrayLabel[$key] . '\') this.value=\'\'" onblur="if(this.value==\'\') this.value=\'' . $this->arrayLabel[$key] . '\'" value="' . $value . '"></td>';
					break;
				case "date":
					$value = getValue($field, "str", "GET", $this->arrayLabel[$key]);
					$str .= '<td>&nbsp;<input type="text" class="textbox" name="' . $field . '" id="' . $field . '" style="width:70px;"  onKeyPress="displayDatePicker(\'' . $field . '\', this);" onClick="displayDatePicker(\'' . $field . '\', this);" onfocus="if(this.value==\'' . translate_text("Enter") . ' ' . $this->arrayLabel[$key] . '\') this.value=\'\'" onblur="if(this.value==\'\') this.value=\'' . translate_text("Enter") . ' ' . $this->arrayLabel[$key] . '\'" value="' . $value . '"></td>';
					break;
				case "array":
				case "arraytext":
					$field = $this->arrayField[$key];
					global $$field;
					$arrayList = $$field;
					$str 			.= '<td>&nbsp;<select class="textbox" name="' . $field . '" id="' . $field . '">';
					$str 			.= '<option value="-1">' . $this->arrayLabel[$key] . '</option>';
					$selected 		= getValue($field, "str", "GET", -1);
					foreach ($arrayList as $key => $value) {
						$str 		.= '<option value="' . $key . '" ' . (($selected == $key) ? 'selected' : '') . '>' . $value . '</option>';
					}
					$str .= '</select></td>';
					break;
			}
		}
		foreach ($this->arrayAddSearch as $key => $value) {

			if ($value[2] != "") {
				$str .= "<td>&nbsp;";
				$str .= $value[2];
				$str .= "&nbsp;:&nbsp;</td>";
			}

			$str .= "<td>";
			$str .= $value[0];
			$str .= "</td>";
		}

		$str .= '<td>&nbsp;<input type="submit" class="bottom" value="' . translate_text("Tìm kiếm") . '"></td>';
		$str .= '</tr></table>';
		$str .= '</form>';

		//phần check javascript cho form tìm kiếm
		$str .= '<script type="text/javascript">';
		$str .= 'function check_form_submit(obj){';
		foreach ($this->arraySearch as $key => $field) {
			switch ($this->arrayType[$key]) {
				case "string":
					$str .= 'if(document.getElementById("' . $field . '").value == \'' . translate_text("Enter") . ' ' . $this->arrayLabel[$key] . '\'){document.getElementById("' . $field . '").value = \'\'}';
					break;
			}
		}
		$str .= 'document.form_search.submit(); ';
		$str .= '};';
		$str .= '</script>';

		return $str;
	}

	/*
	ham tao ra cau lenh sql search
	*/
	function sqlSearch()
	{

		$search		= getValue("search", "int", "GET", 0);
		$str 			= '';
		if ($search == 1) {
			foreach ($this->arraySearch as $key => $field) {
				$keyword		= getValue($field, "str", "GET", "");
				if ($keyword == $this->arrayLabel[$key]) $keyword = "";
				$keyword		= str_replace(" ", "%", $keyword);
				$keyword		= str_replace("\'", "'", $keyword);
				$keyword		= str_replace("'", "''", $keyword);
				switch ($this->arrayType[$key]) {
					case "string":
					case "text":
						if (trim($keyword) != '') $str 		.= " AND " . $field . " LIKE '%" . $keyword . "%'";
						break;
					case "numbernotedit":
					case "number":
						if (intval($keyword) > 0) $str 		.= " AND " . $field . " = " . intval($keyword);
						break;
					case "array":
					case "arraytext":
						if (intval($keyword) > -1) $str 		.= " AND " . $field . "=" . intval($keyword) . "";
						break;
				}
			}
		}
		return $str;
	}

	function searchKeyword($list_field = "")
	{
		$array = explode(",", $list_field);
		$str 	 = '';
		$keyword				= getValue("keyword", "str", "GET", translate_text("Nhập từ khóa"));
		$keyword_sql		= str_replace(" ", "%", $keyword);
		$keyword_sql		= str_replace("\'", "'", $keyword_sql);
		$keyword_sql		= str_replace("'", "''", $keyword_sql);

		if (count($array) > 0) {
			$this->searchKeyword = true;
			if ($keyword != '' && $keyword != translate_text("Nhập từ khóa")) {
				foreach ($array as $key => $field) {
					$str 		.= " AND " . $field . " LIKE '%" . $keyword_sql . "%'";
				}
			}
		}

		return $str;
	}

	//ham xu ly phan footer

	function footer($total_list = 0)
	{
		$str = '<table cellpadding="5" cellspacing="0" width="100%" class="page"><tr>';
		if ($this->delete) {
			$str .= '<td width="150">';
			$str .= '	<a href="#" onclick="if (confirm(\''  . str_replace("'", "\'", translate_text("Do you want to delete the product you've selected ?"))  . '\')){ deleteall(' . $total_list . '); }">' . translate_text("Delete all selected") . '</a>';
			$str .= '	<img src="' . $this->image_path . 'delete.gif" border="0" align="absmiddle" />';
			$str .= '</td>';
		}
		$str .= '<td width="150">' . translate_text("Total record") . ' : <span id="total_footer">' . $this->total_record . '</span></td>';
		$str .= '<td>' . $this->generate_page() . '</td>';
		$str .= '</tr></table>';
		return $str;
	}

	//ham phan trang

	function generate_page()
	{
		$str = '';
		if ($this->total_record > $this->page_size) {

			$total_page 	= $this->total_record / $this->page_size;
			$page			   = getValue("page", "int", "GET", 1);
			if ($page < 1) $page = 1;
			$str 				.= '<a href="' . getURL(0, 1, 1, 1, "page") . '&page=1"><img src="' . $this->image_path . 'first.gif" border="0" align="absmiddle" /></a>';
			if ($page > 1) $str 	.= '<a href="' . getURL(0, 1, 1, 1, "page") . '&page=' . ($page - 1) . '" onclick="loadpage(this); return false;"><img src="' . $this->image_path . 'prev.gif" border="0" align="absmiddle" /></a>';

			$start = $page - 5;
			if ($start < 1) $start = 1;

			$end = $page + 5;
			if ($page < 5) $end = $end + (5 - $page);

			if ($end > $total_page) $end = intval($total_page);
			if ($end < $total_page) $end++;

			for ($i = $start; $i <= $end; $i++) {
				$str 			.= '<a href="' . getURL(0, 1, 1, 1, "page") . '&page=' . $i . '">' . (($i == $page) ? '<span class="s">[' . $i . ']</span>' : '<span>' . $i . '</span>') . '</a>';
			}

			if ($page < $total_page) $str 	.= '<a href="' . getURL(0, 1, 1, 1, "page") . '&page=' . ($page + 1) . '"><img src="' . $this->image_path . 'next.gif" border="0" align="absmiddle" /></a>';
			$str 				.= '<a href="' . getURL(0, 1, 1, 1, "page") . '&page=' . $total_page . '"><img src="' . $this->image_path . 'last.gif" border="0" align="absmiddle" /></a>';
		}

		return $str;
	}

	//ham tao linmit

	function limit($total_record)
	{
		$this->total_record = $total_record;
		$page			   = getValue("page", "int", "GET", 1);
		if ($page < 1) $page = 1;
		$str = "LIMIT " . ($page - 1) * $this->page_size . "," . $this->page_size;
		return $str;
	}


	//ham sua nhanh bang ajax

	function ajaxedit($fs_table)
	{

		$this->edit_ajax = true;

		//nếu truong hợp checkbox thì chỉ thay đổi giá trị 0 và 1 thôi

		$checkbox 	= getValue("checkbox", "int", "GET", 0);
		if ($checkbox == 1) {
			$record_id 	= getValue("record_id", "int", "GET", 0);
			$field 		= getValue("field", "str", "GET", "dfsfdsfdddddddddddddddd");
			if (trim($field) != '' && in_array($field, $this->arrayField)) {
				$db_query = new db_query("SELECT " . $field . " FROM " . $fs_table . " WHERE " . $this->field_id . "=" . $record_id);
				if ($row = mysql_fetch_assoc($db_query->result)) {
					$value = ($row[$field] == 1) ? 0 : 1;
					$db_update	= new db_execute("UPDATE " . $fs_table . " SET " . $field . " = " . $value . " WHERE " . $this->field_id . "=" . $record_id);
					unset($db_update);
					echo '<img src="' . $this->image_path . 'check_' . $value . '.gif" border="0">';
				}
				unset($db_query);
			}
			exit();
		}
		//phần sửa đổi giá trị  từng trường
		$ajaxedit 	= getValue("ajaxedit", "int", "GET", 0);
		$id 	 		= getValue("id", "str", "POST", "");
		$value 	 	= getValue("value", "str", "POST", "");
		$array 	 	= trim(getValue("array", "str", "POST", ""));

		if ($ajaxedit == 1) {

			$arr 		= explode(",", $id);
			$id  		= isset($arr[1]) ? intval($arr[1]) : 0;
			$field  	= isset($arr[0]) ? strval($arr[0]) : '';
			$type  	= isset($arr[2]) ? intval($arr[2]) : 0;
			if ($type == 3) $_POST["value"] = str_replace(array("."), "", $value);

			//print_r($_POST);
			if ($id != 0 && in_array($field, $this->arrayField)) {

				$myform = new generate_form();
				$myform->removeHTML(0);
				$myform->add($field, "value", $type, 0, "", 0, "", 0, "");

				$myform->addTable($fs_table);
				$errorMsg = $myform->checkdata();

				if ($errorMsg == "") {
					$db_ex = new db_execute($myform->generate_update_SQL($this->field_id, $id));
				}
			}

			if ($array != '') {
				if (in_array($array, $this->arrayField)) {
					global $$array;
					$arr = $$array;
					$value = isset($arr[$value]) ? $arr[$value] : 'error';
				}
			}
			echo $value;
			exit();
		}
	}
}
