<?
	if(isset($_GET['assignee_company_add']) && !empty($_GET['assignee_company_add']) && $_GET['assignee_company_add'] == '1'){
		$assigneeid = $_GET['id'];
		$companyid = $_GET['companyid'];


		// NEW NO FOR ASSIGNEE COMPANY
		$newNum = getnewCtrlNo("assignee_company");

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SAVE NEW USER MENU
		$ins_assigneecompany = new Table;
		$ins_assigneecompany->setSQLType($fms_db->getSQLType());
		$ins_assigneecompany->setInstance($fms_db->getInstance());
		$ins_assigneecompany->setTable("assigneemapper");
		$ins_assigneecompany->setField("id,companyID,assigneeID,type,createdBy,createdDate");
		$ins_assigneecompany->setValues("'$newNum','$companyid','$assigneeid','assignee_company','$sys_UserID','$today'");
		$ins_assigneecompany->doQuery("save");
		
		// CLOSING FMS DB
		$fms_db->DBClose();

		// UPDATE CONTROL NO
		UpdateCtrlNo("assignee_company");

		$url = BASE_URL . V_ASSIGNEECOMPANY . "?id=" . $assigneeid;
		$msg = "Company was successfully tagged to Assignee.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	if(isset($_GET['assignee_company_remove']) && !empty($_GET['assignee_company_remove']) && $_GET['assignee_company_remove'] == '1'){
		$assigneeid = $_GET['id'];
		$companyid = $_GET['companyid'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SAVE NEW USER MENU
		$upd_assigneecompany = new Table;
		$upd_assigneecompany->setSQLType($fms_db->getSQLType());
		$upd_assigneecompany->setInstance($fms_db->getInstance());
		$upd_assigneecompany->setTable("assigneemapper");
		$upd_assigneecompany->setParam("WHERE companyID = '$companyid' AND assigneeID = '$assigneeid' AND type = 'assignee_company'");
		$upd_assigneecompany->doQuery("delete");

		// CLOSING FMS DB
		$fms_db->DBClose();

		$url = BASE_URL . V_ASSIGNEECOMPANY . "?id=" . $assigneeid;
		$msg = "Company was successfully untagged to Assignee.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
?>