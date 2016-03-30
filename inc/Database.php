<?	
	class Database{
		public function __construct(){}
		
		public function setCon($host,$user,$pass,$db){
			$this->setHost($host);
			$this->setUser($user);
			$this->setPass($pass);
			$this->setDB($db);
		}
		
		private function setHost($host){
			$this->host = $host;
		}
		private function setUser($user){
			$this->user = $user;
		}
		private function setPass($pass){
			$this->pass = $pass;
		}
		private function setDB($db){
			$this->db = $db;
		}
		function setSQLType($sqltype){
			$this->sqltype = $sqltype;
		}
		function getSQLType(){
			return $this->sqltype;
		}
		public function connect(){
			
			switch($this->sqltype){
				case "mysql":
						$this->cn = mysql_connect($this->host,$this->user,$this->pass);
						mysql_select_db($this->db,$this->cn);
					break;
				case "mssql":
						$this->cn = mssql_connect($this->host,$this->user,$this->pass);
						mssql_select_db($this->db,$this->cn);
					break;
				default:
					break;
			}
			
			if(!$this->cn && $this->sqltype == "mssql"){
				header("Location: " . BASE_URL . "maintenance.html");
				exit();
			}
		}
		
		public function getInstance(){
			return $this->cn;
		}
		public function MyDBClose(){
			mysql_close($this->cn);
		}
		public function MSDBClose(){
			mysql_close($this->cn);
		}
		public function DBClose(){
			$this->cn = null;
		}
	}
?>