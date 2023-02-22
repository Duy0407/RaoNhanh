<? include("config.php");
//$index = "index, follow,noodp";
$index = "noindex, nofollow";
$title = "Rao vặt|Rao vặt miễn phí|Mạng xã hội rao vặt lớn nhất Việt Nam";
$keyword = "rao vặt, rao vặt miễn phí, rao vat, rao vat mien phi";
$description = "Mạng xã hội rao vặt, rao vặt miễn phí trên mọi lĩnh vực. Cập nhật hàng ngàn tin tức rao vặt mỗi ngày tại Raonhanh365.vn";
$canonical = "http://raonhanh365.vn/";
$url_image = "/";
?>
<!DOCTYPE html>
<html>
<head>
    <!--link meta seo-->
    <?php include "../includes/common/inc_header_link.php"?>

   <link rel="stylesheet" type="text/css" href="/css/detail-slider.css"/>
   <script src="/js/jquery-1.11.3.min.js" type="text/javascript"></script>
   <script src="/js/jssor.slider-26.3.0.min.js" type="text/javascript"></script>
   <script src="/js/info.js" type="text/javascript"></script>
   <link rel="stylesheet" href="/css/quanly_danhmuc.css">
   
</head>
<body>
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01"/>
</div>
<? include("../includes/common/inc_header.php") ?>
<section>
<? include("../includes/info/inc_bread_crumb.php") ?>
<div class="main_cate">
    <div class="container">
      <? 
        if(empty($row4['usc_type'])){
          redirect("/");
        }else{
        if($row4['usc_type']==5){
             include("../includes/info/inc_left_info_doanhnghiep.php");
//             Thêm danh mục sản phẩm
             $check = getValue("add_menu","str","POST","");
                if($check != '')
                {
                   $dm_name = getValue("name_product","str","POST","");
                   $dm_name = trim($dm_name);
                   $dm_name = replaceMQ($dm_name);

                   $dm_order = getValue("stt","str","POST","");
                   $dm_order = trim($dm_order);
                   $dm_order = replaceMQ($dm_order);

                   $dm_active = getValue("check_tc","str","POST",0);
                   $dm_active = trim($dm_active);
                   $dm_active = replaceMQ($dm_active);

                   $dm_cate = getValue("cate","str","POST","0");
                   $dm_cate = trim($dm_cate);
                   $dm_cate = replaceMQ($dm_cate);
                   
                   $dm_md5 = getValue("dm_name","str","POST","");
                   $dm_md5 = removeAccent(trim($dm_name));
                   $dm_md5 = mb_strtolower($dm_md5,'UTF-8');
                   $dm_md5 = md5($dm_md5);

                   if($dm_name != '' && $dm_cate != '')
                   {
                         $db_check_dm = new db_query("SELECT dm_id FROM danhmuc_dn WHERE dm_md5 = '".$dm_md5."'LIMIT 1");
                         if(mysql_num_rows($db_check_dm->result) == 0){
                            $query5 = new db_execute("INSERT INTO danhmuc_dn(dm_cate,dm_name,dm_md5,dm_usc_id,dm_order,dm_active)
                                                 VALUES ('".$dm_cate."','".$dm_name."','".$dm_md5."','".$row4['usc_id']."','".$dm_order."','".$dm_active."')");
                         }
                   }
                   unset($dm_name,$check,$dm_order,$dm_active,$dm_cate,$dm_md5,$query5,$db_check_dm);
                }
//            End        
        } else {
            redirect("/");
        }
      }
        ?>
      <div class="detail-main">
         <h1>QUẢN LÝ DANH MỤC</h1>
         <div class="main_info">
            <div class="add_edit_menu">
                <div class="add_menu">
                <form method="POST" action="/doanh-nghiep/quan-ly-danh-muc" onsubmit="return checkpost();">
                   <table>
                     <tr>
                       <td><p>Nhóm sản phẩm:</p></td>
                       <td><input type="text" name="name_product" onblur="myNameDm_cha(<?=$row4['usc_id']?>)" id="name_product" value="" placeholder="Microsoft Mouse"></td>
                     </tr>
                     <tr>
                       <td><p>Thứ tự:</p></td>
                       <td>
                           <input type="text" name="stt" class="numbersOnly" value="" maxlength="3">
                         <span class="text_after">Hiển thị lên trang chủ:</span>
                         <div class="check_box_ct check_active" status = "checked">
                               
                         </div>
                         <input type="checkbox" name="check_tc" class="check_tc" checked value="1" style="display: none"> 
                         <div class="clear">

                         </div>
                       </td>
                       <div class="clear">

                       </div>
                     </tr>
                     <tr>
                       <td><p>Thuộc lĩnh vực:</p></td>
                       <td>
                           <select class="category" id="dm_cate" name="cate">
                                <option value="0">Chọn danh mục</option>
                                    <?
                                    $db_qr = new db_query("SELECT * FROM category WHERE cat_parent_id = 0 ORDER BY cat_id ASC");
                                    While($row = mysql_fetch_assoc($db_qr->result))
                                    {
                                    ?>
                                    <option  value="<?= $row['cat_id'] ?>"><?= $row['cat_name'] ?></option>
                                    <?
                                    $db_qrs = new db_query("SELECT * FROM category WHERE cat_parent_id = ".$row['cat_id']." ORDER BY cat_id ASC");
                                    While($rows = mysql_fetch_assoc($db_qrs->result))
                                    {
                                    ?>
                                    <option value="<?= $rows['cat_id'] ?>">--- <?= $rows['cat_name'] ?></option>
                                    <?
                                    }
                                    unset($rows);
                                    }
                                    unset($row,$db_qr);
                                    ?>
                            </select>
                       </td>
                     </tr>
                     <tr>
                       <td colspan="3">
                           <input type="submit" class="btn_dangky btn btn_submit" name="add_menu" value="Thêm danh mục" />
                       </td>
                     </tr>
                   </table>
                </form>
                </div>
<!--                <div class="edit_menu">
                    <input type="submit" class="btn_dangky btn btn_submit" name="edit" value="Sửa danh mục" />
                    <input type="submit" class="btn_dangky btn btn_submit" name="add_child" value="Thêm danh mục con" />
                </div>-->
            </div>
            <div class="clear">

            </div>
            <div class="table_product">
               <table>

                  <tbody>
                     <tr>
                       <td>Tên nhóm sản phẩm</td>
                       <td>Thuộc lĩnh vực</td>
                       <td>Thứ tự</td>
                       <td>Link truy cập</td>
                       <td>Hiển thị gian hàng</td>
                       <td>Thao tác</td>
                     </tr>
                     
                     <?
                        $db_dm = new db_query("SELECT * FROM danhmuc_dn WHERE dm_parent_id= '0' AND dm_usc_id = ".$row4['usc_id']);
                        While($row_dm = mysql_fetch_assoc($db_dm->result)){ ?>
                     <tr id="delete_tr_<?=$row_dm['dm_id']?>">
                       
                        <td id="dm_name_<?=$row_dm['dm_id']?>">
                           <span class="dm_name_gh"><?=$row_dm['dm_name']?></span>
                           <input class="group_name_product hidden" id="dm_name" type="text" name="" value="<?=$row_dm['dm_name']?>" placeholder="">
                       </td>
                       <td id="dm_cate_<?=$row_dm['dm_id']?>">
                           <?
                                $db_cate = new db_query("SELECT cat_name FROM category WHERE cat_id =".$row_dm['dm_cate']);
                                $row_cate = mysql_fetch_assoc($db_cate->result);
                           ?>
                           <span class="dm_name_gh"><?=$row_cate['cat_name'];unset($row_cate,$db_cate);?></span>
                           <select class="category hidden">
                                <option value="0">Chọn danh mục</option>
                                    <?
                                    $db_qr = new db_query("SELECT * FROM category WHERE cat_parent_id = 0 ORDER BY cat_id ASC");
                                    While($row = mysql_fetch_assoc($db_qr->result))
                                    {
                                    ?>
                                    <option id="cate_<?=$row_dm['dm_id']."_"?><?= $row['cat_id'] ?>" value="<?= $row['cat_id'] ?>" <?=($row['cat_id'] == $row_dm['dm_cate'])?"selected='selected'":""?>><?= $row['cat_name'] ?></option>
                                    <?
                                    $db_qrs = new db_query("SELECT * FROM category WHERE cat_parent_id = ".$row['cat_id']." ORDER BY cat_id ASC");
                                    While($rows = mysql_fetch_assoc($db_qrs->result))
                                    {
                                    ?>
                                    <option id="cate_<?=$row_dm['dm_id']."_"?><?= $rows['cat_id'] ?>" value="<?= $rows['cat_id'] ?>" <?=($rows['cat_id'] == $row_dm['dm_cate'])?"selected='selected'":''?>>--- <?= $rows['cat_name'] ?></option>
                                    <?
                                    }
                                    unset($db_qrs,$rows);
                                    }
                                    unset($row,$db_qr);
                                    ?>
                            </select>
                       </td>
                       <td id="dm_order_<?=$row_dm['dm_id']?>">
                           <div class="stt_group"><?=$row_dm['dm_order']?></div>
                           <input type="text" class="stt_input hidden" value="<?=$row_dm['dm_order']?>">
                       </td>
                       <td><a href="#" class="link_to_group">Truy cập</a></td>
                       <td id="dm_active_<?=$row_dm['dm_id']?>">
                           <div dm_active="<?=$row_dm['dm_active']?>" dm_check_1="<?=$row_dm['dm_id']?>" id="dm_check_1_<?=$row_dm['dm_id']?>" class="check_box_ct hidden <?=($row_dm['dm_active']==1)?'checked_true':"checked_false"?> " status="<?=($row_dm['dm_active']==1)?'checked':" ";?>" >    
                           </div>
                           
                           <div dm_check_2="<?=$row_dm['dm_id']?>" id="dm_check_2_<?=$row_dm['dm_id']?>" class="<?=($row_dm['dm_active']==1)?'checked_true':"checked_false"?> " status="<?=($row_dm['dm_active']==1)?'checked':" ";?>" >    
                           </div>
                       </td>
                        <td>
                            <input type="button" class="edit_dm" name="" value="Sửa" id="edit_<?=$row_dm['dm_id']?>" edit="<?=$row_dm['dm_id']?>"/>
                            <input type="button" name="" value="Lưu" id="save_<?=$row_dm['dm_id']?>" save="<?=$row_dm['dm_id']?>" class="save_dm hidden"/>
                            <input type="button" name="" value="Hủy" id="cancel_<?=$row_dm['dm_id']?>" cancel="<?=$row_dm['dm_id']?>" class="cancel_dm hidden" />
                            <input type="button"  name="" value="Xóa" id="delete_<?=$row_dm['dm_id']?>" delete="<?=$row_dm['dm_id']?>" class="delete_dm"/>
                        </td>

                     </tr>
                     <?
                        }
                        unset($row_dm,$db_dm)
                     ?>
                     
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
</section>
<? include("../includes/common/inc_footer.php") ?>
</body>
<script type="text/javascript">
   $(document).ready(function() {
      $("div.check_box_ct").click(function(){
        var status = $(this).attr("status");
        var id = $(this).attr("dm_check_1");
        if(status == "checked"){
          $(this).attr("dm_active","0");
          $(this).removeClass("checked_true");
          $("#dm_check_2_"+id).removeClass("checked_true");
          $("#dm_check_2_"+id).addClass("checked_false");
          $(this).addClass("checked_false");
          $(this).attr("status","");
          $('.check_tc').attr('checked',false);
        }else{
          $(this).attr("dm_active","1");
          $(this).removeClass('checked_false');
          $("#dm_check_2_"+id).removeClass("checked_false");
          $("#dm_check_2_"+id).addClass("checked_true");
          $(this).addClass("checked_true");
          $(this).attr("status","checked");
          $('.check_tc').attr('checked',true);
        }
      });
   });
   
   $(".qltrv .qldm").addClass("open_menu");
   $(".qltrv").addClass("selected");
   $(".qltrv a:first").addClass("menu-a");
   
   
//   check tên danh mục


jQuery(".numbersOnly").keyup(function () {
  this.value = this.value.replace(/[^0-9]/g, '');
  $('.numbersOnly').val( $('.numbersOnly').val().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") );
});
jQuery(".numbersOnly2").keyup(function () {
  this.value = this.value.replace(/[^0-9]/g, '');
});
function checkpost()
{
    $(".noti-error").remove();
    $("#name_product").removeClass('error');
    $("#dm_cate").removeClass('error');
    var returndata = false;
    if($("#name_product").val() == '')
    {
        $("#name_product").focus();
        $("#name_product").addClass('error');
        $("#name_product").after("<div class='noti-error'>Bạn chưa nhập nhóm sản phẩm</div>");
        returndata = false;
    }
    else if($("#dm_cate").val() == '0')
    {
        $("#dm_cate").focus();
        $("#dm_cate").addClass('error');
        $("#dm_cate").after("<div class='noti-error'>Bạn chưa chọn lĩnh vực kinh doanh</div>");
        returndata = false;
    }
   else
   {
   returndata = true;   
   }
   return returndata;
}

//edit table
    
    $(".edit_dm").click(function (){
        var id = $(this).attr("edit");
        $(this).addClass("hidden");
        
        $("#dm_name_"+id+" span").addClass("hidden");
        $("#dm_name_"+id+" input").removeClass("hidden");
        
        $("#dm_cate_"+id+" span").addClass("hidden");
        $("#dm_cate_"+id+" select").removeClass("hidden");
        
        $("#dm_order_"+id+" div").addClass("hidden");
        $("#dm_order_"+id+" input").removeClass("hidden");
        
        $("#dm_check_2_"+id).addClass("hidden");
        $("#dm_check_1_"+id).removeClass("hidden");
        
        $("#save_"+id).removeClass("hidden");
        $("#cancel_"+id).removeClass("hidden");
        $("#delete_"+id).addClass("hidden");
    });
    $(".cancel_dm").click(function (){
        var id = $(this).attr("cancel");
        $(this).addClass("hidden");
        
        $("#dm_name_"+id+" span").removeClass("hidden");
        $("#dm_name_"+id+" input").addClass("hidden");
        
        $("#dm_cate_"+id+" span").removeClass("hidden");
        $("#dm_cate_"+id+" select").addClass("hidden");
        
        $("#dm_order_"+id+" div").removeClass("hidden");
        $("#dm_order_"+id+" input").addClass("hidden");
        
        $("#dm_check_1_"+id).addClass("hidden");
        $("#dm_check_2_"+id).removeClass("hidden");
        
        $("#edit_"+id).removeClass("hidden");
        $("#save_"+id).addClass("hidden");
        $("#delete_"+id).removeClass("hidden");
    });
    $(".save_dm").click(function (){
        var id = $(this).attr("save");
        $(this).addClass("hidden");
        
        $("#dm_name_"+id+" span").removeClass("hidden");
        $("#dm_name_"+id+" input").addClass("hidden");
        
        $("#dm_cate_"+id+" span").removeClass("hidden");
        $("#dm_cate_"+id+" select").addClass("hidden");
        
        $("#dm_order_"+id+" div").removeClass("hidden");
        $("#dm_order_"+id+" input").addClass("hidden");
        
        $("#dm_check_1_"+id).addClass("hidden");
        $("#dm_check_2_"+id).removeClass("hidden");
        
        $("#edit_"+id).removeClass("hidden");
        $("#cancel_"+id).addClass("hidden");
        $("#delete_"+id).removeClass("hidden");
        
        $.ajax({
            url: "../ajax/add_danhmuc_dh.php",
            type: "POST",
            data: {
            'dm_id':id,
            'dm_name': $("#dm_name_"+id+" input").val(),
            'dm_cate': $("#dm_cate_"+id+" select").val(),
            'dm_order':$("#dm_order_"+id+" input").val(),
            'dm_active':$("#dm_check_1_"+id).attr("dm_active")
            },
            success: function(data){
               $("#dm_name_"+data+" span").text($("#dm_name_"+data+" input").val());
               $("#dm_order_"+data+" div").text($("#dm_order_"+data+" input").val());
               $("#dm_order_"+data+" div").text($("#dm_order_"+data+" input").val());
               var cate = $("#dm_cate_"+data+" select").val();
               var cate_name = $("#cate_"+data+"_"+cate).text();
               cate_name = cate_name.replace("--- ","");
               $("#dm_cate_"+data+" span").text(cate_name);
               
            }
        });
    });
    
    $(".delete_dm").click(function (){
        var id = $(this).attr("delete");
        var dm_name = $("#dm_name_"+id+" span").text();
        var ok = confirm("Bạn có đồng ý xóa danh mục: "+dm_name);
        if(ok == true){
            $.ajax({
                url: "/ajax/delete_danhmuc_dn.php",
                type: "POST",
                data: {
                'dm_id':id
                },
                success: function(data){
                   $("#delete_tr_"+data).remove();
                }
            });
        }
    });
    
    function myNameDm_cha(id){
       valEmail = $("#name_product");
       $(".noti-error").remove();
       if(valEmail.val().length > 0)
       {
        $("#name_product").removeClass('error');
        $(".noti-error").remove();
          $.ajax({
             type: "POST",
             url: '../ajax/check_dm_danhmuc.php',
             data: {
                 dm_name:$("#name_product").val(),
                 usc_id:id
             },
             success: function(data) {
                if(data == 1)
                {
                      $("#name_product").addClass('error');
                      $("#name_product").after("<div class='noti-error'>Tên nhóm sản phẩm đã tồn tại</div>");
                }
                else if(data == 0){ 
                   $("#name_product").removeClass('error');
                   $(".noti-error").remove();
                }
             }
          }); 
       }
       else{
        $("#name_product").addClass('error');
        $("#name_product").after("<div class='noti-error'>Tên nhóm sản phẩm không được để chống</div>");
       }

     };
</script>
</html>
