<?php
class User {
	private $dbHost     = "localhost";
    private $dbUsername = "greencub_miraj";
    private $dbPassword = "green123";
    private $dbName     = "greencub_freelancer";
	private $userTbl    = 'register';
	
	function __construct(){
		if(!isset($this->db)){
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
	}
	
	function checkUser($userData = array()){
		if(!empty($userData)){
			//Check whether user data already exists in database
			$prevQuery = "SELECT * FROM ".$this->userTbl." WHERE unique_code = '".$userData['oauth_uid']."'";
			$prevResult = $this->db->query($prevQuery);
			if($prevResult->num_rows > 0){
				//Update user data if already exists
				$query = "UPDATE ".$this->userTbl." SET first_name = '".$userData['first_name']."', last_name = '".$userData['last_name']."', email = '".$userData['email']."', profile_picture = '".$userData['picture']."', register_date = '".date("Y-m-d H:i:s")."' WHERE unique_code = '".$userData['oauth_uid']."'";
				$update = $this->db->query($query);
			}else{
				//Insert user data
				$query = "INSERT INTO ".$this->userTbl." SET first_name = '".$userData['first_name']."', last_name = '".$userData['last_name']."', email = '".$userData['email']."', username='--', password='--', country='', city='', hire='', unique_code = '".$userData['oauth_uid']."', register_date = '".date("Y-m-d H:i:s")."', status='active', profile_picture = '".$userData['picture']."', profile_title='', description='', company='', company_serial_num='', ExperienceYear='', ExperienceMonth='', skills='', company_type='', paypal_Account=''";
				$insert = $this->db->query($query);
			}
			
			//Get user data from the database
			$result = $this->db->query($prevQuery);
			$userData = $result->fetch_assoc();
		}
		
		//Return user data
		return $userData;
	}
}
?>