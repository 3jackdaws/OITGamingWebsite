<?php
	include_once("/var/www/confidential/sql_credentials.php");
	
	class OITDatabase{

		
		#Data Members
		private $db_name = "oitgaming";
		private $db_user = SQL_USER;
		private $db_pass = SQL_PASS;
		public $db_connection = NULL;
		private $db_bind_param_num = 0;
		private $db_prepared_stmt;

		public function __construct()
		{
			$this->connect("localhost");
		}

		public function __destruct()
		{
			if($this->db_connection != NULL)
			{
				$this->close();
			}
		}

		public function connect($server_name)
		{
		
			if(!$this->db_connection)
			{
				$this->db_connection = new mysqli($server_name, $this->db_user, $this->db_pass, $this->db_name);
			}
		}

		public function close()
		{
			$this->db_connection->close();
			$this->db_connection = NULL;
		}

		public function SQLPrepare($query)
		{
			if(!($this->db_prepared_stmt = $this->db_connection->prepare($query)))
			{
				throw new Exception("OITDatabase error: SQLPrepare Errors on '" . $query . "'");
			}
			return $this->db_prepared_stmt;
			
			
			
		}

		public function SQLBind($types, $args)
		{
			
			switch(count($args))
			{
				case 1:
				{
					error_log("case 1");
					if(!$this->db_prepared_stmt->bind_param($types, $args[0]))
					{
						throw new Exception("OITDatabase error: SQLBind Error on single argument bind: " . $types . " " . $args[0]);
					}
					break;
				}
				case 2:
				{
					error_log("case 2");
					if(!$this->db_prepared_stmt->bind_param($types, $args[0], $args[1]))
					{
						throw new Exception("OITDatabase error: SQLBind Error on double argument bind: " . $types . " " . $args[0] . " " . $arg[1]);
					}
					break;
				}
				case 3:
				{
					error_log("case 3");
					if(!$this->db_prepared_stmt->bind_param($types, $args[0], $args[1], $args[2]))
					{
						throw new Exception("OITDatabase error: SQLBind Error on triple argument bind: " . $types . " " . $args[0] . $args[1] . $args[2]);
					}
					break;
				}
			}
			
			
		}

		public function SQLGetResult()
		{
			if(!$this->db_prepared_stmt->execute())
			{
				throw new Exception("OITDatabase error: SQLExecute error");
			}
			$result = $this->db_prepared_stmt->get_result();
    		$row = mysqli_fetch_row($result);
    		return $row;
		}
	}
?>