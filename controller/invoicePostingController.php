<?
	// INVOICE POSTING
	if(isset($_GET['post']) && !empty($_GET['post'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// UPDATE INVOICE
		$upd_invoice = new Table;
		$upd_invoice->setSQLType($fms_db->getSQLType());
		$upd_invoice->setInstance($fms_db->getInstance());
		$upd_invoice->setTable("workordermaster");
		$upd_invoice->setValues("status = '6'");
		$upd_invoice->setParam("WHERE invoiceReferenceNo = '$id'");
		$upd_invoice->doQuery("update");
		
		// CLOSING FMS DB
		$fms_db->DBClose();

		$url = BASE_URL . "invoicing.php";
		$msg = "Invoice was successfully posted.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
?>