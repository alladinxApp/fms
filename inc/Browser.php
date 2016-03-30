<?
	class Browser{
		public function __construct(){
			$user_agent = $_SERVER['HTTP_USER_AGENT'];
			$browsers = array(
								'Chrome' => array('Google_Chrome','Chrome/(.*)\s'),
								'MSIE' => array('Internet_Explorer','MSIE\s([0-9\.]*)'),
								'Firefox' => array('Mozilla_Firefox', 'Firefox/([0-9\.]*)'),
								'Safari' => array('Safari', 'Version/([0-9\.]*)'),
								'Opera' => array('Opera', 'Version/([0-9\.]*)')
								);
								 
			$browser_details = array();
			 
			foreach ($browsers as $browser => $browser_info){
				if (preg_match('@'.$browser.'@i', $user_agent)){
					$browser_details['name'] = $browser_info[0];
						preg_match('@'.$browser_info[1].'@i', $user_agent, $version);
					$browser_details['version'] = $version[1];
						break;
				} else {
					$browser_details['name'] = 'Unknown';
					$browser_details['version'] = 'Unknown';
				}
			}
			
			$this->setBrowserName($browser_details['name']);
			$this->setBrowserVersion($browser_details['version']);
			
			/*$bver = $browser_details['name'] . ' ' . $browser_details['version'];
			$alert = new MessageAlert;
			$alert->setMessage($bver);
			$alert->setURL(null);
			$alert->Alert();*/
			
			//return 'Browser: '.$browser_details['name'].' Version: '.$browser_details['version'];
			$this->chkBrowser();
		}
		public function setBrowserName($browsername){
			$this->browsername = $browsername;
		}
		public function getBrowserName(){
			return $this->browsername;
		}
		public function setBrowserVersion($browserversion){
			$this->browserversion = $browserversion;
		}
		public function getBrowserVersion(){
			return $this->browserversion;
		}
		public function chkBrowser(){
			if($this->getBrowserName() == 'Internet_Explorer' && $this->getBrowserVersion() <= 9){
				$alert = new MessageAlert;
				$alert->setMessage("You have an outdated version of Internet Explorer. Please upgrade to latest version or you may use other browser such as Mozilla Firefox/Google Chrome.");
				//$alert->setURL("http://windows.microsoft.com/en-us/internet-explorer/download-ie");
				$alert->setURL(BASE_URL . 'download/');
				$alert->Alert();
			}
		}
	}
	$browser = new Browser;
?>