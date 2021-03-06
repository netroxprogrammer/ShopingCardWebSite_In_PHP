<?php
class Database{
	
	public $host = DB_HOST;
	public $databaseName = DB_NAME;
	public $userName = DB_USER;
	public $password = DB_PASS;

	public $link;
	public $error;
	
	/**
	 * @contructor call
	 */
	
	public function __construct(){
	
		$this->connect();
	}
	
	/**
	 *  Create Database Connnection function
	 */
	
	private function  connect(){
		$this->link= new mysqli($this->host, $this->userName, $this->password, $this->databaseName);
		if($this->link){
			$this->error="Connection Error ".$this->link->error;
		}
	}
	
	/**
	 * @Function Search  Email and  password for  login
	 */
	public function loginUser($query){
		$result = $this->link->query($query) or die("Sorry error. ".$this->link->errno. __LINE__);
		if($result->num_rows>0){
			return $result;
		}
		else{
			return false;
		}
	}
	
	/**
	 * @Function get User Profile Form Database
	 */
	public function userProfile($query){
		$result = $this->link->query($query) or die("Sorry error. ".$this->link->errno. __LINE__);
		if($result->num_rows>0){
			return $result;
		}
		else{
			return false;
		}
	}
	
	/**
	 * @Insert Products
	 */
	
	public function uploaddProduct($query){
		$result = $this->link->query($query) or die($this->link->error.__LINE__);
		if($result){
			return true;
		}
		else{
			return false;
		}
	}
	
	/**
	 * @ShowProducts
	 */
	
	public function showProducts($query){
		$result = $this->link->query($query) or die("Sorry error. ".$this->link->errno. __LINE__);
		if($result->num_rows>0){
			return $result;
		}
		else{
			return false;
		}
	}
}
?>