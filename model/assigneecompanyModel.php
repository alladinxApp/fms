<?
	if(isset($_GET['id']) && !empty($_GET['id'])){
		$id = $_GET['id'];
	}else{
		$id = $_SESSION['SYS_ASSIGNEE'];
	}

	// SET FMS DB
	$fms_db = new DBConfig;
	$fms_db->setFleetDB();

	// SET ASSIGNEE COMPANY
	$assigneecompany = new Table;
	$assigneecompany->setSQLType($fms_db->getSQLType());
	$assigneecompany->setInstance($fms_db->getInstance());
	$assigneecompany->setView("v_assigneecompanymapper");
	$assigneecompany->setParam("WHERE assigneeID = '$id'");
	$assigneecompany->doQuery("query");
	$row_assigneecompany = $assigneecompany->getLists();
	$num_assigneecompany = $assigneecompany->getNumRows();

	// SET COMPANY
	$companymst = new Table;
	$companymst->setSQLType($fms_db->getSQLType());
	$companymst->setInstance($fms_db->getInstance());
	$companymst->setView("v_companymaster");
	$companymst->setParam("WHERE companyID NOT IN(SELECT companyID FROM v_assigneecompanymapper WHERE assigneeID = '$id')");
	$companymst->doQuery("query");
	$row_companymst = $companymst->getLists();

	// CLOSING FMS DB 
	$fms_db->DBClose();

	if(!isset($_GET['id']) && empty($_GET['id'])){
	    // SET COMPANIES ARRAY TO NULL
	    $companies = array();

	    // GET ARRAY OF COMPANIES
	    for($i=0;$i<count($row_assigneecompany);$i++){
	        $companies[] = $row_assigneecompany[$i]['companyID']; 
	    }
	    
	    // SET ARRAY OF COMPANIES TO SESSION
	    $_SESSION['SYS_ASSIGNEECOMPANIES'] = $companies;
	}
?>