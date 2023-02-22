<?
    include("config.php");
    if (isset($_COOKIE['UID'])){
        $userid = $_COOKIE['UID'];
        $apply_id = getValue('apply_id', 'int', 'POST', 0);

        $result = new db_query("SELECT id
        FROM apply_new LEFT JOIN new ON apply_new.new_id = new.new_id
        WHERE id = $apply_id AND (uv_id = $userid OR new_user_id = $userid)");

        if (mysql_num_rows($result->result) > 0){
            if ($apply_id > 0){
                $del = new db_query("UPDATE apply_new
                SET is_delete = 1
                WHERE id = $apply_id");
                if ($del->result == true){
                    $kq = [
                        'result' => true,
                        'msg' => "Xóa tin ứng tuyển thành công",
                    ];
                }else{
                    $kq = [
                        'result' => false,
                        'msg' => 'Có lỗi xảy ra'
                    ];
                }
            }else{
                $kq = [
                    'result' => false,
                    'msg' => 'Thông tin không hợp lệ'
                ];
            }
        }else{
            $kq = [
                'result' => false,
                'msg' => 'Tin ứng tuyển không tồn tại'
            ];
        }
        
        echo json_encode($kq);
    }
?>