<?php
// $Id$

require_once dirname(__FILE__) . '/nusoap.php';
/** 
 * @author datpp
 *
 */
class VMS_Soap_Client {
  public $wsdl;
  
  const DEBUG = FALSE;
  const LOG_FILE_PATH = '../tmp/soap_vms.log';
  const DATA_DIR = '../tmp/store_vms.log';
  private $agent_id;
  private $username;
  private $password;
  private $pin;
  private $session_id;
  private $transid;
  
  private $client;
  
  // block size 
  // hex value
  private static $IV = '0000000000000000';
  private $keyEncrypt;
  
  /**
   * 
   * 
   * 
   * HÃ m getSession
   * 
   * @return string $sessionid
   * 
   */
  private static function getSession() {
    $session_info = file_get_contents(self::DATA_DIR, TRUE);
    $session_info = explode("|", $session_info);
    if ($session_info[1] + 599 < time() )  return FALSE; // 
    $sessionid = self::getDecrypt($session_info[0], 'VdcvNPK#y');
    
    // update láº¡i time cho session
    self::setSession($sessionid);
    return $sessionid;
  }
  
  /**
   * 
   * HÃ m setSession
   * @param string $sid
   */
  private static function setSession($sid) {
    $time_out  = time(); // session time life tren vms la 10 phut neu ko co bat ki truy cap trong khoang thoi gian do.
    $sid       = self::getEncrypt($sid, 'VdcvNPK#y');
    $session_info = "{$sid}|{$time_out}";
    $handle = @fopen(self::DATA_DIR, 'w');
    @fwrite($handle, $session_info);
    @fclose($handle);
  }
  
  /**
   * 
   * @param string $wsdl
   * @param string $username
   * @param string $password
   * @param string $agent_id
   * @param string $pin
   */
  function __construct($wsdl, $username, $password, $agent_id, $pin) {
    $this->wsdl       = $wsdl;
    $this->username   = $username;
    $this->password   = $password;
    $this->agent_id   = $agent_id;
    $this->pin        = $pin;
    
    $sessionid        = self::getSession();
    
    $this->client     = new nusoap_client($this->wsdl, 'wsdl', FALSE, FALSE, FALSE, FALSE, 30, 60);  // phan nay khai bao client goi wa ben a
    $err = $this->client->getError();
    
    if ($err) {
    	self::error_log("Constructor error: {$err}");
    	exit();
    }
    
    if (empty($sessionid)) {
      try {
        $this->doLogin();
      }
      catch (Exception $e) {
        throw new Exception($e->getMessage(), $e->getCode());
      }
    }
    else {
      $this->session_id = $sessionid;
    }
    //$this->keyEncrypt  = pack('H*', $this->session_id);
  }
  
  /**
   * 
   * HÃ m doLogin
   * @throws Exception 
   */  
  private function doLogin() {
    $password = base64_encode(sha1($this->password, TRUE));
    $result   = $this->client->call('logIn', array(
        'arg0' => $this->username, 
        'arg1' => $password, 
        'arg2' => $this->agent_id
      )
    );
    
    $err = $this->client->getError();
    if ($err) {
    	self::error_log("Constructor error: {$err}", 'doLogin');
    	exit();
    }
    
    self::writeLog($result, 'doLogin', $result['return']['sessionid']);
    if(!isset($result['return']['transid']))
    {
      $result['return']['transid'] = '';
    }
    $this->transid = $result['return']['transid'];
    if ($result['return']['status'] != 1) {
      throw new Exception($result['return']['message'], $result['return']['status']);
    }
    
    $this->session_id  = $result['return']['sessionid'];
    
    self::setSession($this->session_id);
    
    if (self::DEBUG) { echo '<pre>'; print_r ($result); }
    
    return TRUE;
  }
  
  /**
   * @return string $transactionid
   */
  public function getLastTransID() {
    return $this->transid;
  }
  
  /**
   * 
   * HÃ m doLogout
   * @throws Exception
   */
  public function doLogout() {
    $result = $this->client->call('logOut', array(
      'arg0' => $this->username,
      'arg1' => $this->agent_id,
    	'arg2' => $this->session_id
    ));
    
    $err = $this->client->getError();
    if ($err) {
    	self::error_log("Constructor error: {$err}", 'doLogout');
    	exit();
    }
    
    self::writeLog($result, 'doLogout');
    
    $this->transid = $result['return']['transid'];
    if ($result['return']['status'] != 1) {
      throw new Exception($result['return']['message'], $result['return']['status']);
    }
    else {
      self::setSession('');
    }
    
    if (self::DEBUG) { echo '<pre>'; print_r ($result); }
    
    return TRUE;
  }
  
  /**
   * 
   * HÃ m changePass
   * @param string $oldPass
   * @param string $newPass
   * 
   * @throws Exception
   */
  public function changePass($oldPass, $newPass) {
    if ($oldPass != $this->password) throw new Exception('Mat khau cu khong dung', 1);
    
    $oldPass  = base64_encode(sha1($this->password, TRUE));
    $newPass  = base64_encode(sha1($newPass, TRUE));
    
    $result   = $this->client->call('ChangePassword', array(
        'arg0' => $this->username, 
        'arg1' => $this->agent_id, 
        'arg2' => $oldPass,
        'arg3' => $newPass
      )
    );
    
    $err = $this->client->getError();
    if ($err) {
    	self::error_log("Constructor error: {$err}", 'changePass');
    	exit();
    }
    
    self::writeLog($result, 'changePass');
    
    $this->transid = $result['return']['transid'];
    if ($result['return']['status'] !=1 ) {
      throw new Exception($result['return']['message'], $result['return']['status']);
    }
    else {
      self::setSession('');
    }
    
    if (self::DEBUG) { echo '<pre>'; print_r ($result); }
    
    return TRUE;
  }
  
  /**
   * 
   * HÃ m changePIn
   * @param string $oldPIN
   * @param string $newPIN
   * 
   * @throws Exception
   */
  public function changePIN($oldPIN, $newPIN) {
    if (empty($this->session_id)) throw new Exception('Ban chua login', 1);
    
    //$oldPIN = $this->standardData($oldPIN);
    if ($oldPIN != $this->pin) throw new Exception('MÃ£ PIN cÅ© khÃ´ng Ä‘Ãºng', 1);
    
    $oldPIN = $this->getEncrypt($this->pin, $this->session_id);
    $newPIN = $this->getEncrypt($newPIN, $this->session_id);
    //$newPIN = mcrypt_cbc(MCRYPT_TRIPLEDES, $this->session_id, $newPIN, MCRYPT_ENCRYPT);
    
    $result   = $this->client->call('ChangeMPIN', array(
        'arg0' => $this->username, 
        'arg1' => $this->agent_id, 
        'arg2' => $oldPIN,
        'arg3' => $newPIN
      )
    );
    
    $err = $this->client->getError();
    if ($err) {
    	self::error_log("Constructor error: {$err}", 'changePIN');
    	exit();
    }
    
    self::writeLog($result, 'changePIN');
    
    $this->transid = $result['return']['transid'];
    if ($result['return']['status'] != 1) {
      throw new Exception($result['return']['message'], $result['return']['status']);
    }
    
    if (self::DEBUG) { echo '<pre>'; print_r ($result); }
    
    return TRUE;
  }
    
  /**
   * 
   * HÃ m doCardCharge
   * @param string $target
   * @param string $pincard
   * @throws Exception
   */
  public function doCardCharge($target, $pincard, $target_email, $target_mobile) {
    if (empty($this->session_id)) throw new Exception('ban chua login', 1);
	$data = split(":",$pincard);
	$datalength = count($data);
	if($datalength<2){
		throw new Exception('sai dinh dang card', 1);
	}
	$dataCard = $data[0];
    $_pincard = $dataCard;
    //$pincard  = $pincard . ':VMS'; //
    $pincard  = $this->getEncrypt($pincard, $this->session_id);
    $agentPIN = $this->getEncrypt($this->pin, $this->session_id);
    
    $result   = $this->client->call('CardCharge', array(
        'arg0' => $this->username, 
        'arg1' => $this->agent_id, 
        'arg2' => $agentPIN,
        'arg3' => $pincard,
    	'arg4' => $target,
		'arg5' => $target_email,
		'arg6' => $target_mobile
      )
    );
   
    $err = $this->client->getError();
    if ($err) {
    	self::error_log("Constructor error: {$err}", 'doCardCharge');
    	exit();
    }
    
    $result['return']['DRemainAmount'] = $this->getDecrypt($result['return']['DRemainAmount'], $this->session_id);
    self::writeLog($result, 'doCardCharge', "Target: {$target} | PINCard: {$_pincard} | Result_Amount: {$result['return']['DRemainAmount']}");
    
    $this->transid = $result['return']['transid'];
	
	/*
    if ($result['return']['status'] != 1) {
      throw new Exception($result['return']['message'], $result['return']['status']);
    }
    */
    if (self::DEBUG) { echo '<pre>'; print_r ($result); }
    
    return $result['return'];//array('amount' => $result['return']['DRemainAmount'], 'serial' => $result['return']['SSerialNumber']);
  }
  
  /**
   * 
   * 
   * @param string $input
   * @param string $key_seed
   */
  static function getEncrypt($input, $key_seed){  
    $input    = trim($input);  
    $block    = mcrypt_get_block_size('tripledes', 'ecb');  
    $len      = strlen($input);  
    $padding  = $block - ($len % $block);  
    
    $input   .= str_repeat(chr($padding),$padding);    
    
    // generate a 24 byte key from the md5 of the seed  
    $key = substr(md5($key_seed),0,24);  
    
    $iv_size  = mcrypt_get_iv_size(MCRYPT_TRIPLEDES, MCRYPT_MODE_ECB);  
    $iv       = mcrypt_create_iv($iv_size, MCRYPT_RAND);  
    
    // encrypt  
    $encrypted_data = mcrypt_encrypt(MCRYPT_TRIPLEDES, $key, $input, MCRYPT_MODE_ECB, $iv);  
    // clean up output and return base64 encoded  
    
    return base64_encode($encrypted_data);  
  } //end function Encrypt() 
  
  /**
   * 
   * @param string $input
   * @param string $key_seed
   */
  function getDecrypt($input, $key_seed) {  
    $input  = base64_decode($input);  
    $key    = substr(md5($key_seed),0,24);  
    $text   = mcrypt_decrypt(MCRYPT_TRIPLEDES, $key, $input, MCRYPT_MODE_ECB,'12345678');  
    $block  = mcrypt_get_block_size('tripledes', 'ecb');
      
    $packing = ord($text{strlen($text) - 1});  
    if($packing and ($packing < $block)){  
      for($P = strlen($text) - 1; $P >= strlen($text) - $packing; $P--){  
        if(ord($text{$P}) != $packing){  
          $packing = 0;  
        }  
      }  
    }  
    
    $text = substr($text,0,strlen($text) - $packing);  
    return $text;  
  }  
  
  /**
   * @param unknown_type $result
   * @param unknown_type $function
   * @param unknown_type $ext_msg
   */
  public static function writeLog($result, $function, $ext_msg = '') {
    if(!isset($result['return']['transid']))
    {
      $result['return']['transid'] = '';
    }
    $msg = " [ {$result['return']['transid']} ] [ {$result['return']['status']} ] [ {$result['return']['message']} ] [ {$ext_msg} ]";
    self::error_log($msg, $function, 'soap', 3, self::LOG_FILE_PATH);
  }
  
  public static function error_log($message, $function, $type = "error", $level = 0, $destination = '') {
    $msg = date("[D M d H:i:s Y]") . " [{$function}] [{$type}] [client " . $_SERVER['REMOTE_ADDR'] . " ] {$message} \n";
    error_log($msg, $level, $destination);
  }
}