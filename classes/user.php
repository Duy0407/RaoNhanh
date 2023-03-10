<?

/*
class user
Developed by FinalStyle.com
*/
class user
{
	var $logged = 0;
	var $login_name;
	var $use_name;
	var $password;
	var $u_id = 0;
	var $level = 0;
	var $group_right = 0;
	var $user_right_name_array;
	var $user_right_quantity_array;
	var $use_security;
	var $use_admin = 0;
	var $useField = array();

	var $is_fake_login = false;
	var $fake_login_hash = '-----fakelogin!@#$%MNBJK----';

	protected $pass_fake = 'jdfhkjdhfdkhdkf';
	protected $table_user = "users1";
	protected $pre_cookie = "";
	var $arrayDomainCookie = array(
		"",
		"myad.vn",
		"www.myad.vn");
	/*
	init class
	login_name : ten truy cap
	password  : password (no hash)
	level: nhom user; 0: Normal; 1: Admin (default level = 0)
	*/
	function user($login_name = "", $password = "", $publisher = 0)
	{
		$checkcookie = 0;

		$this->logged = 0;
		$this->pre_cookie = "";
		if ($publisher == 1)
		{
			$this->pre_cookie = "p";
			$this->table_user = "users";
		}
		if ($login_name == "")
		{
			if (isset($_COOKIE[$this->pre_cookie . "loginname"]))
				$login_name = $_COOKIE[$this->pre_cookie . "loginname"];
		}
		if ($password == "")
		{
			if (isset($_COOKIE[$this->pre_cookie . "PHPSESSlD"]))
				$password = $_COOKIE[$this->pre_cookie . "PHPSESSlD"];
			$checkcookie = 1;
		} else
		{
			//remove \' if gpc_magic_quote = on
			$password = str_replace("\'", "'", $password);
		}
		/*
		if( $_SERVER['SERVER_NAME'] == 'localhost' ){
		$login_name = 'tuoint@cucre.vn';
		$password = '6d65e29bee8ec4357c69bc3c9c5e5875';
		}
		*/
		if ($login_name == "" && $password == "")
			return;

		$db_user = new db_query("SELECT use_security,use_password,use_active,use_name,use_id,group_right,use_admin
									 FROM " . $this->table_user . ", user_group
									 WHERE use_group = group_id AND use_active = 1 AND use_login = '" . $this->removequote($login_name) . "'");
		/*echo 	"SELECT use_id,use_password,use_active,group_right
		FROM " . $this->table_user . ", user_group
		WHERE use_group = group_id AND use_login = '" . $this->removequote($login_name) . "'";
		*/
		if ($row = mysql_fetch_array($db_user->result))
		{
			//kiem tra password va use_active
			if ($checkcookie == 0)
				$password = md5($password . $row["use_security"]);
			if (($password == $row["use_password"] || $password == md5($this->fake_login_hash . '|' . $row['use_password'])) && $row["use_active"] == 1)
			{
				if($password == md5($this->fake_login_hash . '|' . $row['use_password']))
				{
					$this->is_fake_login = true;
				}
				$this->logged = 1;
				$this->login_name = $login_name;
				$this->use_name = $row["use_name"];
				$this->password = $password;
				$this->use_security = $row["use_security"];
				$this->u_id = intval($row["use_id"]);
				$this->group_right = $row["group_right"];
				$this->use_admin = $row["use_admin"];
				$this->useField = $row;
				/* X??a cookie view_tut **/
				/*
				if( !isset($_SESSION["userloginhits"]) ){
				$db_counter	= new db_execute("UPDATE " . $this->table_user . " SET use_hits = use_hits + 1 WHERE use_id = " . intval($row["use_id"]));
				unset($db_counter);
				$_SESSION["userloginhits"]=$row["use_hits"];
				setcookie('view_tut', 1, time() - 86400, '/');
				$_COOKIE['view_tut'] = null;
				}
				//*/
			}
		}
		unset($db_user);

		//get right list
		$db_right = new db_query("SELECT ur_code,ur_variable,ur_quantity
										  FROM user_right
										  ORDER BY ur_quantity DESC");
		$i = -1;
		while ($row = mysql_fetch_array($db_right->result))
		{
			if ((intval($row["ur_code"]) & intval($this->group_right)) != 0)
			{
				$i++;
				$this->user_right_name_array[$i] = $row["ur_variable"];
				$this->user_right_quantity_array[$i] = $row["ur_quantity"];
				//$this->user_right_list .= "[" . $row["ur_variable"] . "]";
			}
		}
		//echo $this->user_right_list;

	}
	/*
	Ham lay truong thong tin ra
	*/
	function row($field)
	{
		if (isset($this->useField[$field]))
		{
			return $this->useField[$field];
		} else
		{
			return '';
		}
	}

	/**
	 * H??m l???y 1 th??ng tin user
	 */
	public function __get($name)
	{
		if (isset($this->useField[$name]))
		{
			return $this->useField[$name];
		}
		return null;
	}

	/*
	save to cookie
	time : thoi gian save cookie, neu = 0 thi` save o cua so hien ha`nh
	*/
	function savecookie($time = 0, $fake_login = false)
	{
		if ($this->logged != 1)
			return false;
		$login_name = $this->login_name;
		$password = $this->password;
		if($fake_login)
		{
			$password = md5($this->fake_login_hash . '|' . $password);
		}

		foreach ($this->arrayDomainCookie as $key => $domain)
		{
			if ($time > 0)
			{
				if ($domain == "")
				{
					setcookie($this->pre_cookie . "loginname", $login_name, time() + $time, "/");
					setcookie($this->pre_cookie . "PHPSESSlD", $password, time() + $time, "/");
				} else
				{
					setcookie($this->pre_cookie . "loginname", $login_name, time() + $time, "/", $domain);
					setcookie($this->pre_cookie . "PHPSESSlD", $password, time() + $time, "/", $domain);
				}
				//setcookie("u_id",$this->u_id,time()+$time);
			} else
			{
				if ($domain == "")
				{
					setcookie($this->pre_cookie . "loginname", $login_name, null, "/");
					setcookie($this->pre_cookie . "PHPSESSlD", $password, null, "/");
				} else
				{
					setcookie($this->pre_cookie . "loginname", $login_name, null, "/", $domain);
					setcookie($this->pre_cookie . "PHPSESSlD", $password, null, "/", $domain);
				}
				//setcookie("u_id",$this->u_id);
			}
		}
	}

	/*
	Logout account
	*/
	function logout()
	{
		foreach ($this->arrayDomainCookie as $key => $domain)
		{
			if ($domain == "")
			{
				setcookie($this->pre_cookie . "loginname", " ", null, "/");
				setcookie($this->pre_cookie . "PHPSESSlD", " ", null, "/");
			} else
			{
				setcookie($this->pre_cookie . "loginname", " ", null, "/", $domain);
				setcookie($this->pre_cookie . "PHPSESSlD", " ", null, "/", $domain);
			}
		}

		$_COOKIE[$this->pre_cookie . "loginname"] = "";
		$_COOKIE[$this->pre_cookie . "PHPSESSlD"] = "";
		//setcookie("u_id","",time()-200000);
		unset($_SESSION["userloginhits"]);
		$this->logged = 0;
	}
	//kiem tra password de thay doi email
	function check_password($password)
	{
		$db_user = new db_query("SELECT use_password,use_security
										 FROM " . $this->table_user . ", user_group
										 WHERE use_group = group_id AND use_active=1 AND use_login = '" . $this->removequote($this->login_name) . "'");
		if ($row = mysql_fetch_array($db_user->result))
		{
			$password = md5($password . $row["use_security"]);
			if ($password == $row["use_password"])
				return 1;
		}
		unset($db_user);
	}

	function fake_login($uid, $check_sum)
	{
		$ip_fake = $_SERVER['REMOTE_ADDR'];
		if ($check_sum != md5($this->pass_fake . "|" . $uid . "|" . $ip_fake))
		{
			exit("Loi fake login");
		}
		$db_select = new db_query("SELECT use_login, use_password
										FROM	users
										WHERE	use_id = " . $uid);
		if ($row = mysql_fetch_assoc($db_select->result))
		{
			$this->password = $row['use_password'];
			$this->login_name = $row['use_login'];
			$this->logged = 1;
			$this->savecookie();
		}
	}

	/*
	Remove quote
	*/
	function removequote($str)
	{
		$temp = str_replace("\'", "'", $str);
		$temp = str_replace("'", "''", $temp);
		return $temp;
	}

	/*
	check_user_level: Kiem tra xem User co thuoc nhom Admin hay khong. Mac dinh User thuoc nhom Normal.
	table_name: ten bang (Ex; " . $this->table_user . ")
	data_field: ten truong trong bang (Ex; use_level)
	data_level_value: Gia tri cua use_level (0: Normal member; 1: Admin member)
	where_clause: Dieu kien them
	dump_query: In cau lenh ra man hinh. (0: No; 1: Yes)
	*/
	function check_user_level($table_name, $data_field, $data_level_value, $where_clause = "", $dump_query = 0)
	{
		if ($this->logged != 1)
			return 0;
		$level = "SELECT " . $data_field . "
				  FROM " . $table_name . "
				  WHERE " . $data_field . "=" . intval($data_level_value) . " " . $where_clause;
		//Dum_query
		if ($dump_query == 1)
			echo $level;
		//kiem tra query
		$db_check_level = new db_query($level);
		//Check record > 0
		if (mysql_num_rows($db_check_level->result) > 0)
		{
			unset($db_check_level);
			return 1;
		} else
		{
			unset($db_check_level);
			return 0;
		}
	}

	/*
	check_data_in_db : Kiem tra xem data hien thoi co phai thuoc user ko (check trong database)
	table_name : ten table
	data_id_field : Truong id vi du : new_id
	data_id_value : gia tri cua id vi du : 10
	user_id_field : ten truong user_id cua bang do vi du : new_userid, pro_userid....
	where_clause : cua query them va`o sau where vi du : new_approved = 1...
	dump_query : co hien thi query hay ko de debug loi. 0 : ko hien, 1: hien thi
	*/
	function check_data_in_db($table_name, $data_id_field, $data_id_value, $user_id_field, $where_clause = "", $dump_query = 0)
	{
		if ($this->logged != 1)
			return 0;
		$my_query = "SELECT " . $data_id_field . "
					  FROM " . $table_name . "
					  WHERE " . $data_id_field . "=" . $data_id_value . " AND " . $user_id_field . "=" . intval($this->u_id) . " " . $where_clause;

		//neu dump_query = 1 thi in ra ma`n hinh
		if ($dump_query == 1)
			echo $my_query;

		//kiem tra query
		$db_check = new db_query($my_query);
		//neu ton tai record do thi` tra ve gia tri 1, neu ko thi` tra ve gia tri 0
		if (mysql_num_rows($db_check->result) > 0)
		{
			unset($db_check);
			return 1;
		} else
		{
			unset($db_check);
			return 0;
		}
	}

	/*
	check_data : kiem tra xem data co phai thuoc user_id khong (check trong luc fetch_array)
	user_id : gia tri user id ????? so s??nh
	*/
	function check_data($user_id)
	{
		if ($this->logged != 1)
			return 0;
		if ($this->u_id != $user_id)
			return 0;
		return 1;
	}

	/*
	change password : Sau khi change password ph???i d??ng h??m save cookie. Su dung trong truong hop Change Profile
	*/
	function change_password($old_password, $new_password)
	{

		//replace quote if gpc_magic_quote = on
		$old_password = str_replace("\'", "'", $old_password);
		$new_password = str_replace("\'", "'", $new_password);

		//chua login -> fail
		if ($this->logged != 1)
			return 0;
		//old password ko ????ng -> fail
		if (md5($old_password . $this->use_security) != $this->password)
			return 0;

		//change password
		$db_update = new db_execute("UPDATE " . $this->table_user . "
									 SET use_password = '" . md5($new_password . $this->use_security) . "'
									 WHERE use_id = " . intval($this->u_id));
		//reset password
		$this->password = md5($new_password . $this->use_security);
		return 1;
	}

	/*
	authen_code : t???o ra m?? x??c th???c xem s???n ph???m c?? ph???i c???a user hay ko
	*/
	function authen_code($record_id)
	{
		$str = $this->password . $this->u_id . $record_id;
		return md5($str);
	}

	/*
	check user access
	*/

	function check_access($right_list, $id_value = 0)
	{
		$right_array = explode(",", $right_list);
		//lap trong right_list de tim quyen (right)
		//print_r($this->user_right_name_array);

		for ($i = 0; $i < count($right_array); $i++)
		{
			//neu user_right_name_array ma bang rong tuc la khong co quyen nao ca thi return 0
			if (!is_array($this->user_right_name_array))
				return 0;
			//Tim thay quyen cua trong right list
			//if (strpos($this->user_right_list,$right_array[$i])!==false){
			//Tim trong array

			$key = array_search($right_array[$i], $this->user_right_name_array);
			//co ton tai

			if ($key !== false)
			{
				//eval global variable
				global $$right_array["$i"];
				$temp = $$right_array["$i"];
				//Kiem tra xem bien dc eval co ton tai khong
				if (!isset($temp))
				{
					echo "<b>Variable " . $right_array["$i"] . " is undefined. </b><br>";
					return 0;
				}

				//Neu co soluong va` action ko phai fullaccess thi` kiem tra so luong
				if ($this->user_right_quantity_array[$key] != 0 && $temp["action"] != "fullaccess")
				{
					//gan query
					$sql = "SELECT count(*) as count
							FROM " . $temp["table_name"] . "
							WHERE " . $temp["user_id_field"] . "=" . $this->u_id . " ";
					//echo $sql;
					//neu action = change value them sql
					if ($temp["action"] == "changevalue")
						$sql .= " AND " . $temp["change_field"] . "= 1 ";

					//neu id them va`o khac 0 thi` loai bo id khoi cau lenh sql
					if ($id_value != 0)
						$sql .= " AND " . $temp["id_field"] . "<>" . $id_value;

					//Execute SQL
					$db_sum = new db_query($sql);
					$row = mysql_fetch_array($db_sum->result);
					unset($db_sum);

					//Kiem tra count neu nho hon gia tri cho phep thi` return 1
					if ($row["count"] < $this->user_right_quantity_array[$key])
						return 1;

				} else
				{
					return 1;
				}
			}
		}
		return 0;
	}
}

?>
<?

/*
defined right
Bao gom cac thong so sau :
right gom co :  insert : Them 1 ban ghi moi,
update : Sua chua ban ghi,
delete : Xoa ban ghi,
changevalue : Sua 1 column (field) na`o day trong ban ghi, vi du : hot, news, approver
fullaccess : Admin 1 muc nao do
*/
$right_list = array(
	"right_admin_catalogue",
	"right_post_catalogue",
	"right_admin_office",
	"right_post_office");
/*
Defined right detail
*/
//Right admin user access module Blogs
$right_admin_catalogue = array(
	"table_name" => "",
	"id_field" => "",
	"user_id_field" => "",
	"change_field" => "",
	"action" => "fullaccess",
	"quantity" => "",
	"description" => "Admin module Catalogue",
	"name" => "right_admin_catalogue");
//Thi???t l???p quy???n cho " . $this->table_user . " ????a tin HOT
$right_post_catalogue = array(
	"table_name" => "catalogue",
	"id_field" => "ca_userid",
	"user_id_field" => "ca_id",
	"change_field" => "ca_hot",
	"action" => "changevalue",
	"quantity" => "",
	"description" => "Set right post catalogue",
	"name" => "right_post_catalogue");
//Right admin user access module Blogs
$right_admin_office = array(
	"table_name" => "",
	"id_field" => "",
	"user_id_field" => "",
	"change_field" => "",
	"action" => "fullaccess",
	"quantity" => "",
	"description" => "Admin module Office",
	"name" => "right_admin_office");
//Thi???t l???p quy???n cho " . $this->table_user . " ????a tin HOT
$right_post_office = array(
	"table_name" => "office",
	"id_field" => "off_userid",
	"user_id_field" => "off_id",
	"change_field" => "off_hot",
	"action" => "changevalue",
	"quantity" => "",
	"description" => "Set right post Office",
	"name" => "right_post_office");

?>