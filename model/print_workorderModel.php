<?
	class printWorkOrder extends FPDF{

		public function setHeaderInfo($comp){
			$this->companyaddr = $comp['compaddr'];
			$this->companytelno = $comp['comptelno'];
		}
		public function setWorkOrder($wo){

		}
		public function setEquipment($eq){
			$this->plateNo = $eq['plateNo'];
			$this->conductionSticker = $eq['conductionSticker'];
			$this->categoryName = $eq['categoryName'];
			$this->makeName = $eq['makeName'];
			$this->modelName = $eq['modelName'];
			$this->modelID = $eq['modelID'];
			$this->color = $eq['color'];
			$this->year = $eq['year'];
			$this->engineNo = $eq['engineNo'];
			$this->chassisNo = $eq['chassisNo'];
			$this->serialNo = $eq['serialNo'];
			$this->insuranceAppliedDate = $eq['insuranceAppliedDate'];
			$this->insuranceExpirationDate = $eq['insuranceExpirationDate'];
		}
		public function setCompany($co){
			$this->companyName = $co['companyName'];
			$this->companyAddress = $co['companyAddress'];
			$this->companyContactNo = $co['companyContactNo'];
		}
		public function setAssignee($as){
			$this->assigneeName = $as['assigneeName'];
			$asGender = $as['gender'];
			switch($asGender){
				case 'M': $assigneeGender = 'Male'; break;
				case 'F': $assigneeGender = 'Female'; break;
				default: break;
			}
			$this->assigneeCostCenter = $as['costCenter'];
			$this->assigneeAge = $as['age'];
			$this->assigneecontactNo = $as['contactNo1'] . ' / ' . $as['contactNo2'];
			$this->assigneeAddress = $as['address'];
			$this->assigneeLicenseNo = $as['licenseNo'];
			$this->licenseExpirationDate = dateFormat($as['expirationDate'],"F d, Y");
		}
		public function Header(){
			$this->Image('imgs/fms_logo.png', 80, 5, 50);
			
			$this->Ln(5);
			$this->SetFont('Courier','',8);
			$this->Cell(190,5,$this->companyaddr,0,0,'C');
			$this->Ln();
			$this->Cell(190,5,'Tel No. ' . $this->companytelno,0,0,'C');
			$this->Ln();
		}
		public function ImprovedTable(){
			$this->SetFont('Courier','B',8);
			$this->Cell(30,5,'Company Name:','TRLB',0,'L');
			$this->SetFont('Courier','',8);
			$this->Cell(160,5,$this->companyName,'TRB',0,'L');
			$this->Ln();
			$this->SetFont('Courier','B',8);
			$this->Cell(30,5,'Company Address:','LRB',0,'L');
			$this->SetFont('Courier','',8);
			$this->Cell(65,5,$this->companyAddress,'RB',0,'L');
			$this->SetFont('Courier','B',8);
			$this->Cell(30,5,'Contact No:','RB',0,'L');
			$this->SetFont('Courier','',8);
			$this->Cell(65,5,$this->companyContactNo,'RB',0,'L');
			$this->Ln();

			$this->SetFont('Courier','B',8);
			$this->Cell(30,5,'Category:','RLB',0,'L');
			$this->SetFont('Courier','',8);
			$this->Cell(40,5,$this->categoryName,'RB',0,'L');
			$this->SetFont('Courier','B',8);
			$this->Cell(25,5,'Plate No:','RB',0,'L');
			$this->SetFont('Courier','',8);
			$this->Cell(25,5,$this->plateNo,'RB',0,'L');
			$this->SetFont('Courier','B',8);
			$this->Cell(40,5,'Conduction Sticker:','RB',0,'L');
			$this->SetFont('Courier','',8);
			$this->Cell(30,5,$this->conductionSticker,'RB',0,'L');
			$this->Ln();

			$this->SetFont('Courier','B',8);
			$this->Cell(30,5,'Make / Model:','RLB',0,'L');
			$this->SetFont('Courier','',8);
			$this->Cell(60,5,$this->makeName . ' - ' . $this->modelName,'RB',0,'L');
			$this->SetFont('Courier','B',8);
			$this->Cell(25,5,'Model Code:','RB',0,'L');
			$this->SetFont('Courier','',8);
			$this->Cell(30,5,$this->modelID,'RB',0,'L');
			$this->SetFont('Courier','B',8);
			$this->Cell(25,5,'Year Model:','RB',0,'L');
			$this->SetFont('Courier','',8);
			$this->Cell(20,5,$this->year,'RB',0,'L');
			$this->Ln();

			$this->SetFont('Courier','B',8);
			$this->Cell(30,5,'Assignee Name:','RLB',0,'L');
			$this->SetFont('Courier','',8);
			$this->Cell(60,5,$this->assigneeName,'RB',0,'L');
			$this->SetFont('Courier','B',8);
			$this->Cell(20,5,'Age:','RLB',0,'L');
			$this->SetFont('Courier','',8);
			$this->Cell(30,5,$this->assigneeAge,'RB',0,'L');
			$this->SetFont('Courier','B',8);
			$this->Cell(20,5,'Gender:','RLB',0,'L');
			$this->SetFont('Courier','',8);
			$this->Cell(30,5,$asGender = 'M' ? 'Male' : 'Female','RB',0,'L');
			$this->Ln();

			$this->SetFont('Courier','B',8);
			$this->Cell(30,5,'Assignee Address:','RLB',0,'L');
			$this->SetFont('Courier','',8);
			$this->Cell(70,5,$this->assigneeAddress,'RB',0,'L');
			$this->SetFont('Courier','B',8);
			$this->Cell(30,5,'Assignee Contact:','RLB',0,'L');
			$this->SetFont('Courier','',8);
			$this->Cell(60,5,$as['contactNo2'] = null ? $as['contactNo1'] : $this->assigneecontactNo,'RB',0,'L');
			$this->Ln();

			$this->SetFont('Courier','B',8);
			$this->Cell(30,5,'License No:','RLB',0,'L');
			$this->SetFont('Courier','',8);
			$this->Cell(60,5,$this->assigneeLicenseNo,'RB',0,'L');
			$this->SetFont('Courier','B',8);
			$this->Cell(50,5,'License Expiration Date:','RLB',0,'L');
			$this->SetFont('Courier','',8);
			$this->Cell(50,5,$this->licenseExpirationDate,'RB',0,'L');
			$this->Ln();
		}
		public function Footer(){
			$this->SetY(-30);
			
			$this->SetFont('Courier','B',8);
			$this->Cell(180,4,'Assignee Signature',"LT",0,'L');
			$this->Cell(10,4,null,"TR",0,'C');
			$this->Ln();
			$this->SetFont('Courier','B',15);
			$this->Cell(10,15,null,'L',0,'L');
			$this->Cell(75,15,$this->assigneename,null,0,'C');
			$this->Cell(10,15,null,0,0,'L');
			$this->Cell(10,15,null,0,0,'L');
			$this->Cell(75,15,date("F d, Y h:i"),null,0,'C');
			$this->Cell(10,15,null,'R',0,'L');

			$this->Cell(10,15,null,"R",0,'L');
			$this->Ln();
			$this->SetFont('Courier','B',8);
			$this->Cell(10,4,null,"LB",0,'L');
			$this->Cell(75,4,'Signature Over Printed Name',"TB",0,'C');
			$this->Cell(10,4,null,"B",0,'L');
			$this->Cell(10,4,null,"B",0,'L');
			$this->Cell(75,4,'Date / Time',"TB",0,'C');
			$this->Cell(10,4,null,"BR",0,'L');
			$this->Ln();
		}

	}
?>