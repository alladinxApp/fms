<?
	class DBConfig Extends Database{
		function __construct(){}
		
		// WEB PORTAL DB
		public function setFleetDB(){
			$this->DBHost = 'localhost';
			$this->DBUser = 'root';
			$this->DBPass = '';
			$this->DBName = 'fleet';
			$this->sqltype = 'mysql';
			
			$db = new Database;
			$db->setCon($this->DBHost,$this->DBUser,$this->DBPass,$this->DBName);
			$db->setSQLType($this->sqltype);
			$db->connect();
			$this->cn = $db->getInstance();
		}
		
		public function getInstance(){
			return $this->cn;
		}
		public function getSQLType(){
			return $this->sqltype;
		}
		public function DBClose(){
			switch($this->sqltype){
				case 'mysql':
					mysql_close();
					break;
				case 'mssql':
					mssql_close();
					break;
				default:
					break;
			}
			$this->cn = null;
		}
	}
?>