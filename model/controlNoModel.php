<?
	// SET FMS DB
	$fms_db = new DBConfig;
	$fms_db->setFleetDB();

	// SET CONTROL NO
	$ctrlno = new Table;
	$ctrlno->setSQLType($fms_db->getSQLType());
	$ctrlno->setInstance($fms_db->getInstance());
	$ctrlno->setView("v_controlnomaster");
	$ctrlno->setParam("ORDER BY id");
	$ctrlno->doQuery("query");
	$row_ctrlno = $ctrlno->getLists();

	// CLOSING FMS DB
	$fms_db->DBClose();

	function formatNum($pano,$noOfDigit){
		$length = strlen($pano);
		$dif = $noOfDigit - $length;
		
		$digit = null;
		for($i = 1; $i<=$dif; $i++){
			$digit .= '0';
		}
		
		return $digit.$pano;
	}
	function getNewCtrlNo($type){
		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET CONTROL NO
		$ctrlno = new Table;
		$ctrlno->setSQLType($fms_db->getSQLType());
		$ctrlno->setInstance($fms_db->getInstance());
		$ctrlno->setView("controlnomaster");
		$ctrlno->setParam("WHERE type = '$type' ORDER BY id");
		$ctrlno->doQuery("query");
		$row_ctrlno = $ctrlno->getLists();
		
		// CLOSING FMS DB
		$fms_db->DBClose();

		$noOfDigit = $row_ctrlno[0]['noOfDigit'];
		$ctrlCode = $row_ctrlno[0]['code'];
		$lastseqno = $row_ctrlno[0]['lastDigit'] + 1;

		$newnum = formatNum($lastseqno,$noOfDigit);
		return $ctrlCode.$newnum;
	}
	function UpdateCtrlNo($type){
		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET CONTROL NO
		$upd_ctrlno = new Table;
		$upd_ctrlno->setSQLType($fms_db->getSQLType());
		$upd_ctrlno->setInstance($fms_db->getInstance());
		$upd_ctrlno->setTable("controlnomaster");
		$upd_ctrlno->setValues("lastDigit = (lastDigit + 1)");
		$upd_ctrlno->setParam("WHERE type = '$type'");
		$upd_ctrlno->doQuery("update");
		
		// CLOSING FMS DB
		$fms_db->DBClose();
	}
?>