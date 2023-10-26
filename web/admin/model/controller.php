<?php
//Require config config file
include_once ('config.php');
	$stmt = $mysqli->prepare("SELECT * FROM settings ORDER BY id DESC LIMIT 1");
	$stmt->execute();
	$result = $stmt->get_result();
	$data = $result->fetch_assoc();
	$site_name = $data['site_name'];
	//$site_address = $data['site_address'];
	//$site_phone = $data['site_phone'];
	//$site_mail = $data['site_mail'];
	define('DS', DIRECTORY_SEPARATOR);

	/////site name
	define('SITE_NAME', $site_name);
	// define('SITE_ADDR', $site_address);
	//define('SITE_PHONE', $site_phone);

	/////App Root
	define('APP_ROOT', dirname(dirname(__FILE__)));
	define('URL_ROOT', '/emergency_care');
	define('URL_SUBFOLDER','emergency_care');

    function secure($string){
		$sec = htmlentities($string);
		return $sec;
	}
    function user_exist($username, $email, $table){
		//Require Databse config file
		require 'config.php';

		//Sanitize function variables
		$table = secure($table);

		//Check if email exist
		$stmt = $mysqli->prepare("SELECT * FROM ".$table." WHERE username = ? || email = ?");
		$stmt->bind_param("ss", $username,$email);
		if($stmt->execute()){
			$result = $stmt->get_result();

			if ($result->num_rows >0) {
				return true;
			}else{
				return false;
			}
		}else{
			die($mysqli->error);
		}
	}
	function deleteF($del, $table){
		require 'config.php';
		$stmt = $mysqli->prepare("DELETE FROM ".$table." WHERE id='$del' LIMIT 1");
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		$result = $stmt->get_result();
		return $result;
	}
	function getAdmin(){
		//Require Databse config file
		require 'config.php';
        
		//fetch all user
		$stmt = $mysqli->prepare("SELECT * FROM admin");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
	function fetchrecord(){
		//Require Databse config file
		require 'config.php';
        
		//fetch all user
		$stmt = $mysqli->prepare("SELECT * FROM ".$table."");
		$stmt->execute();
		$result = $stmt->get_result();
 
		return $result;
	}
	function char_tbl($table,$created_at_month,$created_at_year){
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT count(*) AS total FROM ".$table." WHERE date_format(date,'%m') = $created_at_month AND date_format(date,'%Y') = $created_at_year");
		$stmt->execute();
		$res = $stmt->get_result();
		$re = $res->fetch_assoc();
		
		return $re["total"];
	}
	function char_tbl_($table,$created_at_year){
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT count(*) AS total FROM ".$table." WHERE date_format(date,'%Y') = $created_at_year");
		$stmt->execute();
		$res = $stmt->get_result();
		$re = $res->fetch_assoc();
		
		return $re["total"];
	}
    function getAdminUsr($em){
		//Require Databse config file
		require 'config.php';
        
		//fetch all user
		$stmt = $mysqli->prepare("SELECT * FROM admin where email = '$em' || username = '$em'");
		$stmt->execute();
		$result = $stmt->get_result();
		$data = $result->fetch_assoc();
		return $data['username'];
	}
	function getUsr($em){
		//Require Databse config file
		require 'config.php';
        
		//fetch all user
		$stmt = $mysqli->prepare("SELECT * FROM users where email = '$em' || username = '$em'");
		$stmt->execute();
		$result = $stmt->get_result();
		$data = $result->fetch_assoc();
		return $data['username'];
	}
	function getUsrInfo($em){
		//Require Databse config file
		require 'config.php';
        
		//fetch all user
		$stmt = $mysqli->prepare("SELECT * FROM users where email = '$em' || username = '$em'");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
	function getchkAdminUsr($username){
		//Require Databse config file
		require 'config.php';
        
		//fetch all user
		$stmt = $mysqli->prepare("SELECT * FROM admin WHERE username = '$username'");
		$stmt->execute();
		$result = $stmt->get_result();
		$data = $result->fetch_assoc();
		$privilege = $data['access'];
		if($privilege=='1'){
			return true;
		}else{
			return false;
		}
	}
   function getAdminUsrz($username,$email){
		//Require Databse config file
		require 'config.php';
        
		//fetch all user
		$stmt = $mysqli->prepare("SELECT * FROM admin where username = '$username' || email = '$email'");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
	function getUsrz($username,$email){
		//Require Databse config file
		require 'config.php';
        
		//fetch all user
		$stmt = $mysqli->prepare("SELECT * FROM users where username = '$username' || email = '$email'");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
	function getUsrz_exist($username,$email){
		//Require Databse config file
		require 'config.php';
        
		//fetch all user
		$stmt = $mysqli->prepare("SELECT * FROM users where username = '$username' || email = '$email'");
		$stmt->execute();
		$result = $stmt->get_result();
		if(mysqli_num_rows($result) > 0){
			return true;
		}else{
			return false;
		}
	}
	function admin_login($username,$password){
		//Require Databse config file
		require 'config.php';

		//fetch all user
		$stmt = $mysqli->prepare("SELECT * FROM admin WHERE username='$username' AND password = '$password'");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
	function add_admin($username,$pass,$admin_id){
		//Require Databse config file
		require 'config.php';

		//add admin
		$stmt = $mysqli->prepare("INSERT INTO admin(username, password,admin_id) VALUES(?,?,?)");
		$stmt->bind_param("sss",$username,$pass,$admin_id);
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		$result = $stmt->get_result();
		return $result;
	}
	function add_user($username,$email,$phone,$passw,$datejoined){
		//Require Databse config file
		require 'config.php';
		//add user
		$stmt = $mysqli->prepare("INSERT INTO users(username, email, phone, passw, datejoined) VALUES(?,?,?,?,?)");
		$stmt->bind_param("sssss",$username,$email,$phone,$passw,$datejoined);
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		$result = $stmt->get_result();
		return $result;
	}
function add_category($category){
		//Require Databse config file
		require 'config.php';

		//add admin
		$stmt = $mysqli->prepare("INSERT INTO categories(category) VALUES(?)");
		$stmt->bind_param("s",$category);
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		$result = $stmt->get_result();
		return $result;
	}
 function fetch_admin_username($table,$username){
		//Require Databse config file
		require 'config.php';
		//fetch all user
		$stmt = $mysqli->prepare("SELECT * FROM ".$table." WHERE username='$username'");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
///user functions
    function fetch($table){
		//Require Databse config file
		require 'config.php';
		//fetch all user
		$stmt = $mysqli->prepare("SELECT * FROM ".$table." ORDER BY id DESC");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
   function fetch_set($table){
		//Require Databse config file
		require 'config.php';
		//fetch all user
		$stmt = $mysqli->prepare("SELECT * FROM ".$table." ORDER BY id DESC LIMIT 5");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
 function fetch_data($table){
		//Require Databse config file
		require 'config.php';
		//fetch all user
		$stmt = $mysqli->prepare("SELECT * FROM ".$table."");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
/////////////////////the functions to add new hospitals ///////////////////////////////////////

function add_hospital($hospitalname, $description, $doctors, $address, $longitude, $latitude, $nurses, $rooms, $status){
		//Require Databse config file
		require 'config.php';

		//add admin
		$stmt = $mysqli->prepare("INSERT INTO hospitals(hospitalname, description, doctors, address, longitude, latitude, nurses, rooms, status) VALUES(?,?,?,?,?,?,?,?,?)");
		$stmt->bind_param("ssisssiis",$hospitalname, $description, $doctors, $address, $longitude, $latitude, $nurses, $rooms, $status);
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		$result = $stmt->get_result();
		return $result;
	}
function add_new($username,$passw,$pass){
		//Require Databse config file
		require 'config.php';

		//add admin
		$stmt = $mysqli->prepare("INSERT INTO admin(username,password,pass) VALUES(?,?,?)");
		$stmt->bind_param("sss",$username,$passw,$pass);
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		$result = $stmt->get_result();
		return $result;
	}
function complaints($fullname,$phone,$des,$hosp){
	//Require Databse config file
	require 'config.php';

	//add admin
	$stmt = $mysqli->prepare("INSERT INTO complaints(fullname,phone,description,hospital) VALUES(?,?,?,?)");
	$stmt->bind_param("ssss",$fullname,$phone,$des,$hosp);
	if($stmt->execute()){
		return true;
	}else{
		return false;
	}
	$result = $stmt->get_result();
	return $result;
}

function update_addr($longitude, $latitude, $address, $username){
    require 'config.php';
		//fetch all user
		$stmt = $mysqli->prepare("UPDATE users SET longitude = ?, latitude = ?, address = ? WHERE username = ?");
        $stmt->bind_param("ssss",$longitude, $latitude, $address, $username);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
		$result = $stmt->get_result();
		return $result;
}
function fetch_loc($latt,$logg){
		//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("SELECT * , (3956 * 2 * ASIN(SQRT( POWER(SIN(( $latt - latitude) *  pi()/180 / 2), 2) +COS( $latt * pi()/180) * COS(latitude * pi()/180) * POWER(SIN(( $logg - longitude) * pi()/180 / 2), 2) ))) as distance  
		from hospitals having distance <= 10 order by distance");
		//$stmt->bind_param("ss", $latt,$logg);
		$stmt->execute();
		$result_loc = $stmt->get_result();
		return $result_loc;
	}
function fetch_prod($search){
		//Require Databse config file
		require 'config.php';
		//fetch all user
		$stmt = $mysqli->prepare("SELECT * FROM products WHERE productname = '$search' || productid = '$search'");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
function fetch_cmp($eid){
		//Require Databse config file
		require 'config.php';
		//fetch all user
		$stmt = $mysqli->prepare("SELECT * FROM complaints WHERE id = '$eid'");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
function fetch_hist_all(){
		//Require Databse config file
		require 'config.php';
		//fetch all user
		$stmt = $mysqli->prepare("SELECT * FROM pointsale");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
function fetchinf($hid){
		//Require Databse config file
		require 'config.php';
		//fetch all hospital
		$stmt = $mysqli->prepare("SELECT * FROM hospitals WHERE id = '$hid'");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
///////////////////end dunno ///////////////////////////////////////////////
   function fetch_usr($table,$username){
		//Require Databse config file
		require 'config.php';
		//fetch all user
		$stmt = $mysqli->prepare("SELECT * FROM ".$table." WHERE username='$username'");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
function updateStat($pid,$table,$status){
		//Require Databse config file
		require 'config.php';
		//fetch all user
		$stmt = $mysqli->prepare("UPDATE ".$table." SET status = '$status' WHERE id = '$pid'");
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
		$result = $stmt->get_result();
		return $result;
	}
function update_hospital($hid, $hospitalname, $description, $doctors, $address, $longitude, $latitude, $nurses, $rooms){
		//Require Databse config file
		require 'config.php';
		//fetch all user
		$stmt = $mysqli->prepare("UPDATE hospitals SET hospitalname = ?, description = ?, doctors = ?, address = ?, longitude = ?, latitude = ?, nurses = ?, rooms = ? WHERE id = ?");
        $stmt->bind_param("ssisssiii",$hospitalname, $description, $doctors, $address, $longitude, $latitude, $nurses, $rooms, $hid);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
		$result = $stmt->get_result();
		return $result;
	}

	/////site settings
	function fetchsiteset(){
		//Require Databse config file
		require 'config.php';
        
		//fetch all user
		$stmt = $mysqli->prepare("SELECT * FROM settings ORDER BY id DESC LIMIT 1");
		$stmt->execute();
		$result = $stmt->get_result();
 
		return $result;
	}
	function update_site_settings($token,$username){
		//Require Databse config file
		require 'config.php';
		$stmt = $mysqli->prepare("UPDATE settings SET token = '$token' WHERE username = '$username'");
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		$result = $stmt->get_result();
		return $result;
	}
?>