<?
	function dateFormat($date,$format){
		$newdate = null;
		if(empty($date) || $date == '0000-00-00 00:00:00'){
			$newdate = null;
		}else{
			$newdate = date($format,strtotime($date));
		}
		
		return $newdate;
	}
	function genRandomString($length) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$string = '';    

		for ($p = 0; $p < $length; $p++) {
			$string .= $characters[mt_rand(0, strlen($characters))];
		}

		return date("YmdHi") . $string;
	}
	function exportRowData($data,$headertype,$filename){
		header("Content-type: application/octet-stream");
		
		switch($headertype){
			case "excel":
				header("Content-type: application/vnd.ms-excel");
				break;
			default:
				break;
		}
		
		header( "Content-disposition: filename=" . $filename );
		print "$data";
	}
?>