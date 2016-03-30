<?
	class MessageAlert{
		public function __construct(){}
		
		public function setURL($url){
			$this->url = $url;
		}
		public function setMessage($message){
			$this->message = $message;
		}
		public function Alert($confirm = false,$conurl = ''){
			//echo $confirm . ' ' . $conurl;
			if(!empty($this->message)){
				if($confirm == 1){
					echo $this->message;
					echo '<script>confirm("' . $this->message . '");</script>';
					exit();
					//echo '<script>window.open("'. BASE_URL . $conurl . '");</script>';
				}else{
					echo '<script>alert("' . $this->message . '"); window.location="' . $this->url . '";</script>';
				}
			}else{
				echo '<script>window.location="' . $this->url . '";</script>';
			}
			exit();
		}
	}
?>