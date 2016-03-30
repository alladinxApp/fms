<?
	$sql = "SELECT 
                assigneemaster.assigneeID id, CONCAT(assigneemaster.firstname,' ',assigneemaster.lastname) NAME
                ,assigneemaster.expirationDate,DATEDIFF(assigneemaster.expirationDate,CURDATE()) age, 'ASSIGNEE' TYPE
                ,CONCAT('assignee_edit.php?edit=1&id=',assigneemaster.assigneeID) url
            FROM assigneemaster
            WHERE (DATEDIFF(assigneemaster.expirationDate,CURDATE()) <= 0)

            UNION

            SELECT companymaster.companyID id,companymaster.companyName NAME,companymaster.insuranceExpirationDate expirationDate
            	,DATEDIFF(companymaster.insuranceExpirationDate,CURDATE()) age, 'COMPANY' TYPE
            	,CONCAT('company_edit.php?edit=1&id=',companymaster.companyID) url
            FROM companymaster
            WHERE (DATEDIFF(companymaster.insuranceExpirationDate,CURDATE()) <= daysOfNotification)

            UNION

            SELECT equipmentmaster.equipmentID id,equipmentmaster.plateNo NAME,equipmentmaster.registrationExpiryDate expirationDate
            	,DATEDIFF(equipmentmaster.registrationExpiryDate,CURDATE()) age,'EQUIPMENT' TYPE
            	,CONCAT('equipment_edit.php?edit=1&id=',equipmentmaster.equipmentID) url
            FROM equipmentmaster
            WHERE (DATEDIFF(equipmentmaster.registrationExpiryDate,CURDATE()) <= equipmentmaster.insuranceReminderInDays)";

	// SET FMS DB
	$fms_db = new DBConfig;
	$fms_db->setFleetDB();

	// SET NOTIFICATION
	$notificationmst = new Table;
	$notificationmst->setSQLType($fms_db->getSQLType());
	$notificationmst->setInstance($fms_db->getInstance());
	$notificationmst->setSQL($sql);
	$notificationmst->doQuery("union");
	$row_notificationmst = $notificationmst->getLists();
	$num_notificationmst = $notificationmst->getNumRows();

	// CLOSING FMS DB 
	$fms_db->DBClose();
?>