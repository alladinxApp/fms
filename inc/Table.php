<?
	class Table Extends Database{
		public function __construct(){}

		private $numrowstemp = 0;
		public function setTable($table){
			$this->table = $table;
		}
		public function getTable(){
			return $this->table;
		}
		public function setView($view){
			$this->view = $view;
		}
		public function setSproc($sproc){
			$this->sproc = $sproc;
		}
		public function setSQLType($sqltype){
			$this->sqltype = $sqltype;
		}
		public function setField($field){
			$this->fields = $field;
		}
		public function setValues($values){
			$this->values = $values;
		}
		public function setInstance($ins){
			$this->ins = $ins;
		}
		public function setParam($param){
			if(!empty($param)){
				$this->param = $param;
			}else{
				$this->param = null;
			}
		}
		public function setCol($col){
			$this->col = $col;
			
		}
		public function setSQL($sql){
			$this->sqlquery = $sql;
		}
		public function getSQL(){
			return $this->sqlquery;
		}
		public function doQuery($task){
			$col = $this->col;
			if(empty($col)){
				$this->col = "*";
			}
			$this->cnt = 0;
			$this->task = $task;
			switch($task){				
			
				case "query":
					$this->sql = "SELECT " . $this->col . " FROM " . $this->view . " " . $this->param;
					$this->setSQL($this->sql);
					$this->qry = $this->Query($this->sql);
					$this->setResult($this->qry);
					$this->setNumRows();
					$this->setNumFields();
					$this->setLists();
					break;
					
				case "save":
					$this->sql = "INSERT INTO " . $this->table . " (" . $this->fields . ") VALUES(" . $this->values . ") " . $this->param;
					$this->setSQL($this->sql);
					$this->qry = $this->Query($this->sql);
					break;
					
				case "update":
					$this->sql = "UPDATE " . $this->table . " SET " . $this->values . " " . $this->param;
					$this->setSQL($this->sql);
					$this->qry = $this->Query($this->sql);
					$this->setResult($this->qry);
					break;
					
				case "delete":
					$this->sql = "DELETE FROM " . $this->table . " " . $this->param;
					$this->setSQL($this->sql);
					$this->qry = $this->Query($this->sql);
					break;
					
				case "union":
					$this->qry = $this->Query($this->getSQL());
					$this->setResult($this->qry);
					$this->setNumRows();
					$this->setNumFields();
					$this->setLists();
					break;
					
				default:
					break;
			}
		}
		private function Query($sql){
			$this->err = 0;
			
			switch($this->sqltype){
				case "mysql":
						$this->query = mysql_query($sql,$this->ins);
					break;
				default:
					break;
			}
			if(!$this->query){
				$this->err = 1;
			}
			return $this->query;
		}
		private function QueryExec($sql){
			// INITIALIZE
			$this->err = 0;
			switch($this->sqltype){
				case "mysql":
						$this->query = mysql_query($sql,$this->ins);
					break;
				case "mssql":
						$this->query = mssql_query($sql,$this->ins);
						
					break;
				default:
					break;
			}
			
			$row = mssql_fetch_array($this->query);
			$this->err = $row[0]; //if > 0 success else failed
			
		}	
		public function getError(){
			return $this->err;
		}
		private function setResult($result){
			$this->result = $result;
		}
		public function getResult(){
			return $this->result;
		}
		private function setNumRows(){
			switch($this->sqltype){
				case "mysql":
					$this->numrows = mysql_num_rows($this->result);
					break;
				case "mssql":
					$this->numrows = mssql_num_rows($this->result);
					break;
			}
		}
		private function setNumFields(){
			switch($this->sqltype){
				case "mysql":
					$this->numfields = mysql_num_fields($this->result);
					break;
				case "mssql":
					$this->numfields = mssql_num_fields($this->result);
					break;
			}
		}
		public function getNumRows(){
			return $this->numrows;
		}
		private function setLists(){
			$this->setListMulti();
			/*
			$this->data = array();
			$this->lists = null;
			$this->b = 0;
			switch($this->sqltype){
				case "mysql":
					while($this->row = mysql_fetch_array($this->result)){
						for($this->a=0; $this->a < $this->numfields; $this->a++){
							$this->fld = mysql_field_name($this->result,$this->a);
							$this->data[$this->b][$this->fld] = $this->row[$this->fld];
						}$this->b++;
					}
					break;
				case "mssql":
					while($this->row = mssql_fetch_array($this->result)){
						for($this->a=0; $this->a < $this->numfields; $this->a++){
							$this->fld = mssql_field_name($this->result,$this->a);
							$this->data[$this->b][$this->fld] = $this->row[$this->fld];
						}$this->b++;	
					}
					break;
			}*/
		}
		private function setListMulti(){ //return multi
			$this->data = array();
			$this->lists = null;
			$this->b = 0;
			switch($this->sqltype){
				case "mysql":
					while($this->row = mysql_fetch_array($this->result)){
					
				
						for($this->a=0; $this->a < $this->numfields; $this->a++){
							$this->fld = mysql_field_name($this->result,$this->a);
							$this->data[$this->b][$this->fld] = $this->row[$this->fld];
						}$this->b++;
					}
					break;
					
				case "mssql":
					while($this->row = mssql_fetch_assoc($this->result)){
						 $this->data[] = $this->row ;		
					}
					break;
			}
		}	
		public function getLists(){
			return $this->data;
		}
		public function getNewID(){
			return mysql_insert_id();
		}
	}
?>