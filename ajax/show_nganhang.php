<?
include("config.php");
   if(isset($_COOKIE['UID']))
        {
         $userid   = $_COOKIE['UID'];
         $userpass = $_COOKIE['PHPSESPASS'];
         $usertype = $_COOKIE['UT'];

         $db_qr8    = new db_query("SELECT * FROM user WHERE usc_id = ".$userid." AND usc_pass  = '".$userpass."'");
         $login = mysql_num_rows($db_qr8->result);
            if($login > 0){
             $row8 = mysql_fetch_assoc($db_qr8->result);
            }
        }
   if(empty($row8['usc_id'])){?>
        <div class="form_control3">
            <div class="contr3"></div>
            <div class="contr4">Lỗi</div>
        </div>
   <?}else{
   $id_nh = getValue("id","int","POST",0);
   $id_nh = (int)$id_nh;
   
    if($row8['usc_name'] != ""){
        $name = $row8['usc_store_name'];
    }else{
        $name = $row8['usc_name'];
    }
    $name = str_replace("     ", " ", $name);
    $name = str_replace("    ", " ", $name);
    $name = str_replace("   ", " ", $name);
    $name = str_replace("  ", " ", $name);
    $name = str_replace(" ", "", $name);
    $name = removeAccent(trim($name));
    
  if($id_nh == 0){?>
    <div class="form_control3">
        <div class="contr3"></div>
        <div class="contr4">Xin chọn ngân hàng cần chuyển khoản</div>
    </div>
<?  }else if($id_nh == 1){?>
    <div class="form_control3">
        <div class="contr3"></div>
        <div class="contr4">
            <table class="table_shownh">
                <tr>
                    <td>Tên chủ tài khoản:</td>
                    <td>DUONG THI MINH TUYEN</td>
                </tr>
                <tr>
                    <td>Số tài khoản:</td>
                    <td>030.1000.383.905</td>
                </tr>
                <tr>
                    <td>Chi nhánh:</td>
                    <td>Chi nhánh Hoàn Kiếm, Hà Nội</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="form_control3">
        <div class="contr3"></div>
        <div class="contr4 cuphap_nt"><?=$name.'_'.$row8['usc_id'].'_'.'NapTienRAONHANH365'?></div>
    </div> 
    
   <?}else if($id_nh == 2){?>
    <div class="form_control3">
        <div class="contr3"></div>
        <div class="contr4">
            <table class="table_shownh">
                <tr>
                    <td>Tên chủ tài khoản:</td>
                    <td>DUONG THI MINH TUYEN</td>
                </tr>
                <tr>
                    <td>Số tài khoản:</td>
                    <td>216.1000.0462.781</td>
                </tr>
                <tr>
                    <td>Chi nhánh:</td>
                    <td>Chi nhánh Đống Đa, Hà Nội.</</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="form_control3">
        <div class="contr3"></div>
        <div class="contr4 cuphap_nt"><?=$name.'_'.$row8['usc_id'].'_'.'NapTienRAONHANH365'?></div>
    </div> 
    
   <?}else if($id_nh == 3){?>
    <div class="form_control3">
        <div class="contr3"></div>
        <div class="contr4">
            <table class="table_shownh">
                <tr>
                    <td>Tên chủ tài khoản:</td>
                    <td>DUONG THI MINH TUYEN</td>
                </tr>
                <tr>
                    <td>Số tài khoản:</td>
                    <td>190.317.0702.2012</td>
                </tr>
                <tr>
                    <td>Chi nhánh:</td>
                    <td>Chi nhánh Nam Hà Nội.</</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="form_control3">
        <div class="contr3"></div>
        <div class="contr4 cuphap_nt"><?=$name.'_'.$row8['usc_id'].'_'.'NapTienRAONHANH365'?></div>
    </div> 
    
   <?}else if($id_nh == 4){?>
    <div class="form_control3">
        <div class="contr3"></div>
        <div class="contr4">
            <table class="table_shownh">
                <tr>
                    <td>Tên chủ tài khoản:</td>
                    <td>DUONG THI MINH TUYEN</td>
                </tr>
                <tr>
                    <td>Số tài khoản:</td>
                    <td>103.867.423.326</td>
                </tr>
                <tr>
                    <td>Chi nhánh:</td>
                    <td>Chi nhánh: Thanh Xuân, Hà Nội.</</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="form_control3">
        <div class="contr3"></div>
        <div class="contr4 cuphap_nt"><?=$name.'_'.$row8['usc_id'].'_'.'NapTienRAONHANH365'?></div>
    </div> 
    
   <?}
   else if($id_nh == 5){?>
    <div class="form_control3">
        <div class="contr3"></div>
        <div class="contr4">
            <table class="table_shownh">
                <tr>
                    <td>Tên chủ tài khoản:</td>
                    <td>DUONG THI MINH TUYEN</td>
                </tr>
                <tr>
                    <td>Số tài khoản:</td>
                    <td>1300.206.354.722</td>
                </tr>
                <tr>
                    <td>Chi nhánh:</td>
                    <td>Chi nhánh Thăng Long, Hà Nội.</</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="form_control3">
        <div class="contr3"></div>
        <div class="contr4 cuphap_nt"><?=$name.'_'.$row8['usc_id'].'_'.'NapTienRAONHANH365'?></div>
    </div> 
    
   <?}else if($id_nh == 6){?>
    <div class="form_control3">
        <div class="contr3"></div>
        <div class="contr4">
            <table class="table_shownh">
                <tr>
                    <td>Tên chủ tài khoản:</td>
                    <td>DUONG THI MINH TUYEN</td>
                </tr>
                <tr>
                    <td>Số tài khoản:</td>
                    <td>035.010.1397.6108</td>
                </tr>
                <tr>
                    <td>Chi nhánh:</td>
                    <td>Chi nhánh Nam Hà Nội.</</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="form_control3">
        <div class="contr3"></div>
        <div class="contr4 cuphap_nt"><?=$name.'_'.$row8['usc_id'].'_'.'NapTienRAONHANH365'?></div>
    </div> 
    
   <?}else if($id_nh == 7){?>
    <div class="form_control3">
        <div class="contr3"></div>
        <div class="contr4">
            <table class="table_shownh">
                <tr>
                    <td>Tên chủ tài khoản:</td>
                    <td>DUONG THI MINH TUYEN</td>
                </tr>
                <tr>
                    <td>Số tài khoản:</td>
                    <td>245.415.299</td>
                </tr>
                <tr>
                    <td>Chi nhánh:</td>
                    <td>Chi nhánh Hà Nội.</</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="form_control3">
        <div class="contr3"></div>
        <div class="contr4 cuphap_nt"><?=$name.'_'.$row8['usc_id'].'_'.'NapTienRAONHANH365'?></div>
    </div> 
    
   <?}
   else if($id_nh == 8){?>
    <div class="form_control3">
        <div class="contr3"></div>
        <div class="contr4">
            <table class="table_shownh">
                <tr>
                    <td>Tên chủ tài khoản:</td>
                    <td>DUONG THI MINH TUYEN</td>
                </tr>
                <tr>
                    <td>Số tài khoản:</td>
                    <td>018.18.446.301</td>
                </tr>
                <tr>
                    <td>Chi nhánh:</td>
                    <td>Chi nhánh Thanh Xuân, Hà Nội.</</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="form_control3">
        <div class="contr3"></div>
        <div class="contr4 cuphap_nt"><?=$name.'_'.$row8['usc_id'].'_'.'NapTienRAONHANH365'?></div>
    </div> 
    
   <?}else if($id_nh == 9){?>
    <div class="form_control3">
        <div class="contr3"></div>
        <div class="contr4">
            <table class="table_shownh">
                <tr>
                    <td>Tên chủ tài khoản:</td>
                    <td>DUONG THI MINH TUYEN</td>
                </tr>
                <tr>
                    <td>Số tài khoản:</td>
                    <td>068.011.7278.008</td>
                </tr>
                <tr>
                    <td>Chi nhánh:</td>
                    <td>Chi nhánh Hà Nội.</</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="form_control3">
        <div class="contr3"></div>
        <div class="contr4 cuphap_nt"><?=$name.'_'.$row8['usc_id'].'_'.'NapTienRAONHANH365'?></div>
    </div> 
    
   <?}else if($id_nh == 10){?>
    <div class="form_control3">
        <div class="contr3"></div>
        <div class="contr4">
            <table class="table_shownh">
                <tr>
                    <td>Tên chủ tài khoản:</td>
                    <td>TRUONG VAN TRAC</td>
                </tr>
                <tr>
                    <td>Số tài khoản:</td>
                    <td>1300.206.317.568</td>
                </tr>
                <tr>
                    <td>Chi nhánh:</td>
                    <td>Chi nhánh Hà Nội.</</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="form_control3">
        <div class="contr3"></div>
        <div class="contr4 cuphap_nt"><?=$name.'_'.$row8['usc_id'].'_'.'NapTienRAONHANH365'?></div>
    </div> 
    
   <?}else if($id_nh == 11){?>
    <div class="form_control3">
        <div class="contr3"></div>
        <div class="contr4">
            <table class="table_shownh">
                <tr>
                    <td>Tên chủ tài khoản:</td>
                    <td>NGUYEN THI QUYEN</td>
                </tr>
                <tr>
                    <td>Số tài khoản:</td>
                    <td>711a91262109</td>
                </tr>
                <tr>
                    <td>Chi nhánh:</td>
                    <td>Chi nhánh Hà Nội.</</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="form_control3">
        <div class="contr3"></div>
        <div class="contr4 cuphap_nt"><?=$name.'_'.$row8['usc_id'].'_'.'NapTienRAONHANH365'?></div>
    </div> 
    
   <?}
   
   
}unset($db_qr8,$row8);
?>

