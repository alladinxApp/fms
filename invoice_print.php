<?
	session_start();
	
	if(isset($_GET['id']) || !empty($_GET['id'])){
		$_SESSION['invoiceno'] = $_GET['id'];
		$url = 'print_invoice.php';
	}else{
		echo '<script>alert("Invalid URL!");</script>';
		echo '<script>window.close();"</script>';
	}
	echo '<script>window.location="' . $url . '"</script>';
?>