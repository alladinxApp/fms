<?
	// SEARCH EQUIPMENT MASTER LIST
	$search = null;
	if(isset($_POST['search']) && !empty($_POST['search']) && $_POST['search'] == 1){
		$fromdt = date("Y-m-d 00:00");
		$todt = date("Y-m-d 23:59");
		$search = "";

		if(!empty($_POST['txtAssignee'])){
			$sassignee = $_POST['txtAssignee'];
			$search .= " AND assigneeName LIKE '%$sassignee%'";
		}

		if(!empty($_POST['txtEquipment'])){
			$sequipment = $_POST['txtEquipment'];
			$search .= " AND (conductionSticker LIKE '%$sequipment%' OR plateNo LIKE '%$sequipment%')";
		}
		
		if(!empty($_POST['txtDepartment'])){
			$sdepartment = $_POST['txtDepartment'];
			$search .= " AND departmentName LIKE '%$sdepartment%'";
		}

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET WORK ORDER
		$searchequip = new Table;
		$searchequip->setSQLType($fms_db->getSQLType());
		$searchequip->setInstance($fms_db->getInstance());
		$searchequip->setView("v_equipmentmaster");
		$searchequip->setParam("WHERE 1 $search ORDER BY assigneeName");
		$searchequip->doQuery("query");
		$row_searchequip = $searchequip->getLists();
		$num_searchequip = count($row_searchequip);
		
		// CLOSING FMS DB
		$fms_db->DBClose();
	}
	// END SEARCH EQUIPMENT MASTER LIST
?>