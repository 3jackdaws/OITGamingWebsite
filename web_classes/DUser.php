<?php
	include_once("OITDatabase.php");

	class DUser	{
		protected   	$id;
		protected   	$db;
		protected   	$userToken;
		protected   	$userID;
		protected   	$userEmail;
		protected   	$userPassHash;
		protected   	$userPermissions;


		public function __construct($token)
		{
			$this->db = new OITDatabase;
			if($token[0] === "$")
			{
				$this->getUser($token);
			}
		}

		public function __destruct()
		{
			$this->db->close();
		}

		public function Perms()
		{
			return $this->userPermissions;
		}

		public function Email($e = NULL)
		{
			if(!is_null($e))
			{
				$userEmail = $e;
			}
			return $this->userEmail;
		}

		public function ID()
		{
			return $this->userID;
		}

		public function PW()
		{
			return $this->userPassHash;
		}

		public function getUser($token)
		{
			$this->userToken = $token;
			return $this->getUserInfo();
		}

		protected function getUserInfo()
		{
			$this->db->SQLPrepare("SELECT * FROM users WHERE loginToken = ?;");
			$args[] = $this->userToken;
			$this->db->SQLBind("s", $args);
			$results = $this->db->SQLGetResult();
			$this->userID = $results[0];
			$this->userEmail = $results[1];
			$this->userPassHash = $results[2];
			$this->userPermissions = $results[4];
		}

		public function CreateNew($email, $password)
		{
			$this->db->SQLPrepare("SELECT email FROM users WHERE email = ?;");
			$args[] = $email;
			$this->db->SQLBind("s", $args);
			if(!$this->db->SQLGetResult())
			{
				$hash = password_hash($password, PASSWORD_BCRYPT);
				$this->db->SQLPrepare("INSERT INTO users (email, pw) VALUES(?,?);");
				$args = array($email, $hash);
				$this->db->SQLBind("ss", $args);
				$this->db->SQLGetResult();
				$this->GenerateLoginToken();
				$this->PushLoginToken();
			}
			else
			{
				throw new Exception("User already exists");
			}
			return true;
			
		}

		public function Login($user, $password)
		{
			$this->userEmail = $user;
			try{
				$this->db->SQLPrepare("SELECT pw, loginToken FROM users WHERE email = ?;");
				$args[] = $user;
				$this->db->SQLBind("s", $args);
				$results = $this->db->SQLGetResult();
				if(!password_verify($password, $results[0]))
				{
					return false;
				}
			}
			catch(Exception $e){
				error_log($e);
				return false;
			}
			if($result[1][0] !== "$")
			{
				$this->GenerateLoginToken();
				$this->PushLoginToken();
				return $this->userToken;
			}
			else
			{
				return $result[1];
			}

		}

		protected function PushLoginToken()
		{
			
			try{
				$this->db->SQLPrepare("UPDATE users SET loginToken = ? WHERE email = ?");
				$args = array($this->userToken, $this->userEmail);
				$this->db->SQLBind("ss", $args);
				$this->db->SQLGetResult();
			}
			catch(Exception $e){
				error_log($e);
				return false;
			}
			return true;
			
			
		}

		protected function GenerateLoginToken()
		{
			$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 12);
	    	$this->userToken = password_hash($randomString, PASSWORD_BCRYPT);
		}

	}

	
?>