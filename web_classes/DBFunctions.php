<?php
	include("OITDatabase.php");

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
			$this->getUser($token);
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



	}

	
?>