<?php
require_once("inc_security.php");
include("../../functions/rewrite_functions.php");
//gọi class DataGird
$startdate      = getValue("startdate", "str", "GET", "dd/mm/yyyy");
$enddate         = getValue("enddate", "str", "GET", "dd/mm/yyyy");
$list = new fsDataGird($field_id, $field_name, translate_text("Listing"));
/*
1: Ten truong trong bang
2: Tieu de header
3: kieu du lieu ( vnd 	: kiểu tiền VNĐ, usd : kiểu USD, date : kiểu ngày tháng, picture : kiểu hình ảnh,
				array : kiểu combobox có thể edit, arraytext : kiểu combobox ko edit,
				copy : kieu copy, checkbox : kieu check box, edit : kiểu edit, delete : kiểu delete, string : kiểu text có thể edit,
				number : kiểu số, text : kiểu text không edit
4: co sap xep hay khong, co thi de la 1, khong thi de la 0
5: co tim kiem hay khong, co thi de la 1, khong thi de la 0
*/
//$list->add("thi_picture","Image","picture",0,0);
$list->add("usc_id", "ID", "string", 1, 0, 'width="60"');
$list->add("usc_name", "Tên tài khoản", "string", 0, 1);
$list->add("usc_cmt", "Số CMND/CCCD", "string", 0, 1);
$list->add("anh_cmt_mtr", "Ảnh CMND/CCCD mặt trước", "string", 1, 0);
$list->add("anh_cmt_ms", "Ảnh CMND/CCCD mặt sau", "string", 1, 0);
$list->add("ten_nganhang", "Tên ngân hàng", "string", 0, 0);
$list->add("so_taikhoan", "Số tài khoản", "string", 0, 0);
$list->add("chu_taikhoan", "Chủ tài khoản", "string", 0, 0);
$list->add("tgian_xacthuc", "Thời gian", "string", 1, 0);
$list->add("xacthuc_lket", "Active", "checkbox", 0, 0);
$list->quickEdit    = false;
$list->ajaxedit($fs_table);
$list->addSearch("Từ", "startdate", "date", $startdate, "dd/mm/yyyy");
$list->addSearch("Đến", "enddate", "date", $enddate, "dd/mm/yyyy");
$sql =   $list->sqlSearch();
if ($startdate != "dd/mm/yyyy") {
   $intdate      =   convertDateTime($startdate, "0:0:0");
   $sql         .= " AND tgian_xacthuc >= " . $intdate;
}
if ($enddate != "dd/mm/yyyy") {
   $intdate      =   convertDateTime($enddate, "23:59:59");
   $sql         .= " AND tgian_xacthuc <= " . $intdate;
}
$total      = new db_count("SELECT count(*) AS count
									 FROM " . $fs_table . " WHERE (`xacthuc_lket` = 1 OR `xacthuc_lket` = 2) " . $sql);

$total_row = $total->total;

$db_listing = new db_query("SELECT * FROM " . $fs_table . "
                           WHERE (`xacthuc_lket` = 1 OR `xacthuc_lket` = 2) " . $sql . "
                           ORDER BY " . $list->sqlSort() . " tgian_xacthuc DESC " .
   $list->limit($total_row));

?>
<!DOCTYPE html>

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <?= $load_header ?>
   <?= $list->headerScript() ?>
</head>

<body>
   <div id="listing">
      <?= $list->showHeader($total_row) ?>
      <?
      $i = 0;
      while ($row = mysql_fetch_assoc($db_listing->result)) {
         $i++;
      ?>
         <?= $list->start_tr($i, $row[$id_field]); ?>
         <td width="100" align="center"><?= $row['usc_id'] ?></td>
         <td width="150" align="center"><a><?= $row['usc_name'] ?></a></td>
         <td width="150" align="center"><a><?= $row['usc_cmt'] ?></a></td>
         <td align="center">
            <img onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png';" src="<?= $row["anh_cmt_mtr"] ?>" height="100" width="100" class="anh_xacthuc_to" />
         </td>
         <td align="center">
            <img onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png';" src="<?= $row["anh_cmt_ms"] ?>" height="100" width="100" class="anh_xacthuc_to" />
         </td>
         <td align="center"><?= $row['ten_nganhang'] ?></td>
         <td align="center"><?= $row['so_taikhoan'] ?></td>
         <td align="center"><?= $row['chu_taikhoan'] ?></td>
         <td align="center"><?= date("d/m/Y", $row['tgian_xacthuc']) ?></td>
         <td align="center">
            <select name="xac_thuc" class="xac_thuc" onchange="chon_xac_thuc(this)" data1="<?= $row['usc_id'] ?>">
               <option value="">Chọn</option>
               <option value="1" <?= ($row['xacthuc_lket'] == 1) ? "selected" : "" ?>>Xác thực</option>
               <option value="2" <?= ($row['xacthuc_lket'] == 2) ? "selected" : "" ?>>Chờ xác thực</option>
               <option value="0">Xóa xác thực</option>
            </select>
         </td>
         <?= $list->end_tr(); ?>
      <?
      }
      ?>
      <?= $list->showFooter($total_row) ?>
   </div>
   <div class="modal popup_dathang">
      <div class="modal-content">
         <div class="huydon-header">
            <p>Xác nhận</p>
            <span class="close" onclick="dong_pop()">&times;</span>
         </div>
         <div class="huydon-content">
            <p class="text-modal-trahang">Vui lòng gửi lại hàng cho người bán và cho biết lý do bạn trả hàng.</p>
         </div>
         <div class="huydon-footer">
            <button type="button" class="modal-btn-huy" onclick="dong_pop()">Hủy bỏ</button>
            <button type="button" class="modal-btn-xacnhan" id="xacnhan_huydon" data="" data1="" onclick="xac_nhan(this)">Xác nhận</button>
         </div>
      </div>
   </div>
</body>
<script type="text/javascript">
   function dong_pop() {
      $(".popup_dathang").hide();
   }


   function chon_xac_thuc(el) {
      var id = $(el).val();
      var us_id = $(el).attr("data1");
      if (id != "") {
         if (id == 1) {
            var text = "Xác nhận thanh toán đảm bảo";
         } else if (id == 2) {
            var text = "Hủy xác nhận thanh toán đảm bảo";
         } else {
            var text = "Xóa thanh toán đảm bảo";
         }
         $(".popup_dathang .text-modal-trahang").text(text);
         $(".popup_dathang #xacnhan_huydon").attr("data", id);
         $(".popup_dathang #xacnhan_huydon").attr("data1", us_id);
         $(".popup_dathang").show();
      }
   }

   function xac_nhan(el) {
      var xn = $(el).attr("data");
      var us_id = $(el).attr("data1");
      console.log(us_id);
      console.log(xn);
      if (xn != "" && us_id != "") {
         $.ajax({
            url: '../xacnhan_ttdb/xac_nhan.php',
            type: 'POST',
            data: {
               xn: xn,
               us_id: us_id,
            },
            success: function(data) {
               if (data == "") {
                  window.location.reload();
               } else{
                  alert(data);
               }
            }
         })
      }
   }
</script>

</html>