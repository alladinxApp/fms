<?
	define(BASE_URL, "http://localhost:81/fms/");
	
	define(INCLUDE_PATH, "include/");
	define(INC_PATH, "inc/");
	define(MODEL_PATH, "model/");
	define(VIEW_PATH, "view/");
	define(CONTROLLER_PATH, "controller/");
	define(FILES_PATH, "files/");
	define(USERPICS, FILES_PATH . "userpics/");
	define(COMPANYPICS, FILES_PATH . "companypics/");
	define(EQUIPMENTPICS, FILES_PATH . "equipmentpics/");
	define(COMPANYLOGOS, COMPANYPICS . "logo/");
	define(COMPANYSIGNATURES, COMPANYPICS . "signature/");
	define(ASSIGNEEATTACHMENTS, FILES_PATH . "assigneeattachment/");
	define(POATTACHMENTS, FILES_PATH . "poattachments/");
	define(MODELS, "_models.php");
	define(VIEWS, "_views.php");
	define(CONTROLLERS, "_controllers.php");
	define(DATABASE, "Database.php");
	define(DBCONFIG, "DBConfig.php");
	define(TABLE, "Table.php");
	define(BROWSER, "Browser.php");
	define(MESSAGEALERT, "MessageAlert.php");
	define(FUNCTIONS, "functions.php");
	define(PHPMAILER, "class.phpmailer.php");
	define(SMTP, "class.smtp.php");

	$today = date("Y-m-d h:i:s");
	$data_animate_time = 400;
	$data_animate_type = 'fadeIn';
?>