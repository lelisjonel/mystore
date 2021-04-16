<?php

Class MyStore {
	
	private $server = "mysql:host=localhost;dbname=mystore;";
	private $user = "root";
	private $pass = "walumcrew23";
	private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC);
	protected $con;

	public function openConnection()
	{
		try
		{

			$this->con = new PDO($this->server, $this->user, $this->pass, $this->options);
			return $this->con;

		}catch(PDOExeption $e)
		{
			echo "There is a problem in the connection: " . $e->getMessage();
		}
	}

	public function closeConnection()
	{
		$this->con = null;
	}

	public function getUsers()
	{
		$connection = $this->openConnection();
		$stmt = $connection->prepare("SELECT * FROM members");
		$stmt->execute();
		$users = $stmt->fetchAll();
		$userCount = $stmt->rowCount();


		if ($userCount > 0) {
			return $users;
		} else {
			return 0;
		}


	}

	public function login()
	{
	
		if (isset($_POST['submit'])) {
			 	 
			$password = md5($_POST['password']);
			$username = $_POST['email'];
			
			$connection = $this->openConnection();
			$stmt = $connection->prepare("SELECT * FROM members WHERE email = ? AND password = ?");
			$stmt->execute([$username,$password]);
			$user = $stmt->fetch();
			$total = $stmt->rowCount();

			if ($total > 0) {
				echo "Welcome " . $user['first_name'] . " " . $user['last_name'];
				$this->set_user_data($user);
			} else {
				echo "Login Failed!";
			}
		}
			
	}

	public function set_user_data($array){
		if(!isset($_SESSION)){
			session_start();
		}
		$_SESSION['userdata'] = array(
			"fullname" => $array['first_name']. " " . $array['last_name'], "access" => $array['access']
		);

		return $_SESSION['userdata'];
	}




	public function get_user_data(){

		if (!isset($_SESSION)) {
			session_start();
		}

		if (isset($_SESSION['userdata'])){

			return $_SESSION['userdata'];
		} else {
			return null;
		}
	}




	public function logout(){
		if(!isset($_SESSION)){
			session_start();
		}

		$_SESSION['userdata'] = null;
		unset($_SESSION['userdata']);
	}








	public function check_user_exist($email){
			$connection = $this->openConnection();
			$stmt = $connection->prepare("SELECT * FROM members WHERE email = ?");
			$stmt->execute([$email]);
			$total = $stmt->rowCount();

			return $total;
			
	}

	public function add_user(){
		if (isset($_POST['add'])) {
			$email = $_POST['email'];
			$password = md5($_POST['password']);
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];

			if ($this->check_user_exist($email) == 0) {
				$connection = $this->openConnection();
				$stmt = $connection->prepare("INSERT INTO members (`email`,`password`,`first_name`,`last_name`) VALUES (?,?,?,?)");
				$stmt->execute([$email,$password,$fname,$lname]);
			} else {
				echo "User Already Exists!";
			}

			

		}

	}

}

//calling the class MyStore with variable $store to easy access
$store = new MyStore();
