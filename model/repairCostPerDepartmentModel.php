<?
	// SET FMS DB
	$fms_db = new DBConfig;
	$fms_db->setFleetDB();
	
	// CLOSING FMS DB 
	$fms_db->DBClose();
?>