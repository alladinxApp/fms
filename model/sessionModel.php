<?
	if(isset($_SESSION['SYS_USERID']) && !empty($_SESSION['SYS_USERID'])){
		$sys_UserID = $_SESSION['SYS_USERID'];
	}else{
		$alert = new MessageAlert;
        $alert->setURL(BASE_URL . "login.php");
        $alert->setMessage(null);
        $alert->Alert();
	}
?>