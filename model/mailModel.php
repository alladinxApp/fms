<?
	class MailHandler{
		public function setMailFrom($from){
			$this->fromname = $from['name'];
			$this->fromemail = $from['email'];
		}
		public function setMailTo($to){
			$this->toemail = $to['email'];
			$this->toname = $to['name'];
		}
		public function setMailMessage($message){
			$this->css = '<style type="text/css">';
			$this->css .= '*{ font-family: tahoma,georgia,arial,verdana; font-size: 12px; }';
			$this->css .= 'h2{ padding: 0; margin: 0; clear: both; font-size: 20px; font-weight: bold; }';
			$this->css .= 'b{ font-size: 13px; font-weight: bold; }';
			$this->css .= 'br{ padding: 0; margin: 0; clear: both; }';
			$this->css .= '</style>';
			
			$this->message = $this->css;
			$this->message .= $message;
		}
		public function getMailMessage(){
			return $this->message;
		}
		public function setMailSubject($subject){
			$this->subject = $subject;
		}
		public function sendMail(){			
			$mail = new PHPMailer(true); 				// New instance, with exceptions enabled
			$mail->IsSMTP(); 							// telling the class to use SMTP
			$mail->SMTPAuth   = true;					// enable SMTP authentication
			$mail->Host       = "mail.fastgroup.biz"; 	// SMTP server
			$mail->Port       = 25;						// set the SMTP port 
			$mail->Username   = "flc";  				// username
			$mail->Password   = "flc213";				// password
			
			$mail->AddAddress($this->toemail, $this->toname);
			$mail->SetFrom($this->fromemail, $this->fromname);
			$mail->Subject = $this->subject;
			$mail->MsgHTML($this->message);
			$mail->Send();
		}
		public function setWO($wo){
			$this->wo = null;
			$this->wo .= '<br /><br /><table width="1000px">';
			$this->wo .= '<tr><td width="150"><b>WO Reference No: </b></td><td width="800">' . $wo['woReferenceNo'] . '</td></tr>';
			$this->wo .= '<tr><td><b>WO Transaction Date: </b></td><td>' . dateFormat($wo['woTransactionDate'],"F d, Y h:i") . '</td></tr>';
			$this->wo .= '<tr><td><b>Service Type: </b></td><td>' . $wo['serviceType'] . '</td></tr>';
			$this->wo .= '<tr><td><b>Plate No: </b></td><td>' . $wo['plateNo'] . '</td></tr>';
			$this->wo .= '<tr><td><b>Assignee: </b></td><td>' . $wo['assignee'] . '</td></tr>';
			$this->wo .= '<tr><td><b>Meter: </b></td><td>' . $wo['meter'] . '</td></tr>';
			$this->wo .= '<tr><td><b>Remarks: </b></td><td>' . $wo['remarks'] . '</td></tr>';
			$this->wo .= '<tr><td><b>Is Warranty: </b></td><td>' . $wo['isWarrantyDesc'] . '</td></tr>';
			$this->wo .= '<tr><td><b>Is Back Job: </b></td><td>' . $wo['isBackJobDesc'] . '</td></tr>';
			$this->wo .= '<tr><td colspan="2">&nbsp;</td><td>';
			$this->wo .= '<tr><td><b>Labor: </b></td><td>' . number_format($wo['labor'],2) . '</td></tr>';
			$this->wo .= '<tr><td><b>Miscellaneous: </b></td><td>' . number_format($wo['miscellaneous'],2) . '</td></tr>';
			$this->wo .= '<tr><td><b>Parts: </b></td><td>' . number_format($wo['parts'],2) . '</td></tr>';
			$this->wo .= '<tr><td><b>Discount: </b></td><td>' . number_format($wo['discount'],2) . '</td></tr>';
			$this->wo .= '<tr><td><b>Tax(12%): </b></td><td>' . number_format($wo['tax'],2) . '</td></tr>';
			$this->wo .= '<tr><td colspan="2">&nbsp;</td><td>';
			$this->wo .= '<tr><td><b>Total Cost: </b></td><td>' . number_format($wo['totalCost'],2) . '</td></tr>';
			$this->wo .= '</table>';
		}
		private function getWO(){
			return $this->wo;
		}
		public function setWONotification($wo){
			$this->woNotificationMsge = null;
			$this->woNotificationMsge .= '<br />Dear Sir/Maam,';
			$this->woNotificationMsge .= '<br /><br />We send you a notification of Work Order made by <i>' . $wo['createdByName'] . '</i> for your approval.';
			
			$this->woNotificationMsge .= $this->getWO();
			
			$this->woNotificationMsge .= '<br /><br />Please click <a href="' . BASE_URL . V_WORKORDERFORAPPROVAL . '?q=' . $wo['url'] . '|' . $wo['woReferenceNo'] . '"><< HERE >></a> to see the details.';
			
			// SET MAIL MESSAGE
			$this->setMailMessage($this->woNotificationMsge);

			if(empty($this->subject)){
				// SET MAIL SUBJECT
				$this->setMailSubject("FMS - Work Order Notification (" . $wo['createdByName'] . ")");
			}
		}
	}
?>