<?php


			

	require 'includes/fpdf181/fpdf.php';
	//require_once('../../../wp-load.php');
	require 'includes/PHPMailer/PHPMailerAutoload.php';

class PDF extends FPDF {

		function Header(){
			// Logo
			$this->Image('http://spillninja.com/wp-content/themes/spillninja/sellsheet/sn-logo.jpg',396,36,180,71);
		
			$this->SetxY(36,112);
			// Arial italic 8
			$this->SetFillColor(0,0,0);
		
			$this->Cell(540,0.25,'',0,1,"L",true);
			$this->SetxY(36,110);
		
			$this->Cell(540,0.5,'',0,1,"L",true);
		
			$this->SetFont('Forque','',36);
				$this->SetTextColor(0,0,0);
				$this->SetXY(36, 63);
				$this->Cell(380, 12, 'Clean Plant Assessment', 0,0,'L');
			
			$this->SetXY(36, 120);
		
		}

	// Page footer
		function Footer(){
		
			$this->SetY(-53);
			// Arial italic 8
			$this->SetFillColor(0,0,0);
		
			$this->Cell(540,0.25,'',0,1,"L",true);
			$this->SetY(-52);
		
			$this->Cell(540,0.5,'',0,1,"L",true);
		
		
			$this->SetFont('Times','',8);
			$this->SetTextColor(0,0,0);
			// Page number
			$this->Cell(360,15,'www.spillninja.com',0,0,'L');
		
			$this->Cell(180,15,'1-844-61-NINJA',0,0,'R');
		}
	
		function clean($e){
			return filter_var ( $e, FILTER_SANITIZE_STRING );
		
		}
	
	
		function SetCustomerContent(){
				// display all content
			
				$this->SetFont('Times','',11);
				$this->SetTextColor(0,0,0);
				$this->SetXY(36, 120);
				$this->SetFont('Times','B',11);
				$this->Cell(90, 18, 'Company Name:', 0,0,'L');
				$this->SetFont('Times','',11);
				$this->Cell(310, 18, $this->clean($_POST['esa_esa_companyname']), 0,0,'L');
				$this->SetFont('Times','B',11);
				$this->Cell(30, 18, 'Date:', 0,0,'L');
				$this->SetFont('Times','',11);
				$this->Cell(130, 18, date("F j, Y"), 0,1,'L');
			
				$this->SetFont('Times','B',11);
				$this->Cell(90, 18, 'Contact Name:', 0,0,'L');
				$this->SetFont('Times','',11);
				$this->Cell(220, 18, $this->clean($_POST['esa_esa_contactname']), 0,0,'L');
				$this->SetFont('Times','B',11);
				$this->Cell(30, 18, 'Title:', 0,0,'L');
				$this->SetFont('Times','',11);
				$this->Cell(220, 18, $this->clean($_POST['esa_esa_contacttitle']), 0,1,'L');
			
				$this->ln(10);
			
				$this->SetFont('Times','',11);
				$this->MultiCell(540, 18, 'Thank you for taking the time to do this Plant Assessment. This survey will help us understand your facility better so that we may better serve your needs.', 0,'L');
			
				$this->ln(10);
			
				$this->SetFont('Times','B',11);
				$this->Cell(540, 18, 'What products or services does your facility produce?', 0,1,'L');
			
				$this->SetFont('Times','',11);
				$this->MultiCell(540, 18, $this->clean($_POST['esa_esa_companyservices']), 0,'L');
			
				$this->ln(10);
			
				$this->SetFont('Times','B',11);
				$this->Cell(230, 18, 'How many buildings are there in your facility?', 0,0,'L');
				$this->SetFont('Times','',11);
				$this->Cell(310, 18, $this->clean($_POST['esa_esa_companybuildings']), 0,1,'L');
			
				$this->SetFont('Times','B',11);
				$this->Cell(250, 18, 'How many employees work on site at your facility?', 0,0,'L');
				$this->SetFont('Times','',11);
				$this->Cell(290, 18, $this->clean($_POST['esa_esa_companyemployees']), 0,1,'L');

				$this->ln(10);

				$this->SetFont('Times','B',11);
				$this->Cell(540, 18, 'Please select the applications in which absorbents would be used', 0,1,'L');
			
				// assign the POSTS to a variable, and create a concatenated list. 
				$finaltemp = '';
				if(isset($_POST['esa_dripapplication']) && $_POST['esa_dripapplication'] == 'on'){$finaltemp .= 'Leaks and Drips, ';}
				if(isset($_POST['esa_oversprayapplication']) && $_POST['esa_oversprayapplication'] == 'on'){$finaltemp .= 'Overspray, ';}
				if(isset($_POST['esa_footapplication']) && $_POST['esa_footapplication'] == 'on'){$finaltemp .= 'Foot Traffic, ';}
				if(isset($_POST['esa_houseapplication']) && $_POST['esa_houseapplication'] == 'on'){$finaltemp .= 'General Housekeeping, ';}
				if(isset($_POST['esa_spillapplication']) && $_POST['esa_spillapplication'] == 'on'){$finaltemp .= 'Emergency Spill Response, ';}
				if(isset($_POST['esa_otherapplication']) && $_POST['esa_otherapplication'] == 'on'){$finaltemp .= $this->clean($_POST['esa_otherapplicationlabel']) . ', ';}
				$finaltemp = rtrim($finaltemp, ', ');
			
				$this->SetFont('Times','',11);
				$this->MultiCell(540, 18, $finaltemp, 0,'L');
		
					$this->ln(10);
		
				$this->SetFont('Times','B',11);
				$this->Cell(350, 18, 'Do you purchase absorbents through the use of a Corporate Agreement? ', 0,0,'L');

				if(isset($_POST['esa_corporateagreement'])){
					$this->SetFont('Times','',11);
					$this->MultiCell(190, 18, $this->clean($_POST['esa_corporateagreement']), 0,'L');
				}
			
				if(isset($_POST['esa_corporateagreement']) && $this->clean($_POST['esa_corporateagreement']) == 'yes'){
					$this->SetFont('Times','B',11);
					$this->Cell(214, 18, 'What office sets up Corporate Agreements?',0,0,'L');
					$this->SetFont('Times','',11);
					$this->Cell(326, 18, $this->clean($_POST['esa_corporateagreementlabel']), 0,1,'L');
				
				}
				if(!isset($_POST['esa_minmax'])){
					$_POST['esa_minmax'] = 'No';
				} 
				$this->SetFont('Times','B',11);
				$this->Cell(170, 18, 'Are you using a min/max system?',0,0,'L');
				$this->SetFont('Times','',11);
				$this->Cell(326, 18, $this->clean($_POST['esa_minmax']), 0,1,'L');
			
				if(!isset($_POST['esa_othersites'])){
					$_POST['esa_othersites'] = 'No';
				} 
			
				$this->SetFont('Times','B',11);
				$this->Cell(270, 18, 'Do you purchase for other sites within your company?',0,0,'L');
				$this->SetFont('Times','',11);
				$this->Cell(326, 18, $this->clean($_POST['esa_othersites']), 0,1,'L');
			
				if($_POST['esa_othersites'] == 'yes'){
					/////// ADD CODE HERE TO ADD THE COMPANY SITES HERE!!!!! ///////////////
					//
					//
				
					$ccc = 0;
					while($_POST['esa_othersiteslocation' . $ccc] != ''){
					
						$this->SetFont('Times','B',11);
						$this->Cell(90, 18, 'Company Name: ',0,0,'L');
						$this->SetFont('Times','',11);
						$this->Cell(197, 18, $this->clean($_POST['esa_othersitescompanyname' . $ccc]), 0,0,'L');
						$this->SetFont('Times','B',11);
						$this->Cell(56, 18, 'Address: ',0,0,'L');
						$this->SetFont('Times','',11);
						$this->Cell(197, 18, $this->clean($_POST['esa_othersiteslocation' . $ccc]), 0,1,'L');
					
					
						$ccc++;
					}
				}
			
				if(!isset($_POST['esa_blanketpo'])){
					$_POST['esa_blanketpo'] = 'No';
				} 
			
				$this->SetFont('Times','B',11);
				$this->Cell(274, 18, 'Does your system work with Blanket Purchase Orders?',0,0,'L');
				$this->SetFont('Times','',11);
				$this->Cell(326, 18, $this->clean($_POST['esa_blanketpo']), 0,1,'L');
			
			
				$this->SetFont('Times','B',11);
				$this->Cell(320, 18, 'Who in your company decides which suppliers to purchase from? ',0,1,'L');
				$this->SetFont('Times','',11);
				$this->MultiCell(540, 18, $this->clean($_POST['esa_supplierchooser']), 0,'L');
			
				$this->ln(10);
			
				$this->SetFont('Times','B',11);
				$this->Cell(320, 18, 'What do you feel are your current problem areas? ',0,1,'L');
				$this->SetFont('Times','',11);
				$this->MultiCell(540, 18, $this->clean($_POST['esa_companyproblems']), 0,'L');
			
				$this->SetFont('Times','B',11);
				$this->Cell(320, 18, 'What are your current solutions to these problems? ',0,1,'L');
				$this->SetFont('Times','',11);
				$this->MultiCell(540, 18, $this->clean($_POST['esa_companysolutions']), 0,'L');
			
				$this->SetFont('Times','B',11);
				$this->Cell(320, 18, 'What do you like or dislike about these solutions?',0,1,'L');
				$this->SetFont('Times','',11);
				$this->MultiCell(540, 18, $this->clean($_POST['esa_companysolutionenjoyment']), 0,'L');
			
			
			
				$this->SetFont('Times','B',11);
				$this->Cell(320, 18, 'Which liquids are commonly used within your facility?',0,1,'L');
			
				$finaltemp = '';
				if(isset($_POST['esa_waterliquids']) && $_POST['esa_waterliquids'] == 'on'){$finaltemp .= 'Water-based liquids, ';}
				if(isset($_POST['esa_oilliquids']) && $_POST['esa_oilliquids'] == 'on'){$finaltemp .= 'Oil/Petroleum Products, ';}
				if(isset($_POST['esa_flammableliquids']) && $_POST['esa_flammableliquids'] == 'on'){$finaltemp .= 'Flammables, ';}
				if(isset($_POST['esa_solventliquids']) && $_POST['esa_solventliquids'] == 'on'){$finaltemp .= 'Solvents, ';}
				if(isset($_POST['esa_otherliquids']) && $_POST['esa_otherliquids'] == 'on'){$finaltemp .= $this->clean($_POST['esa_otherliquidslabel']) . ', ';}
				$finaltemp = rtrim($finaltemp, ', ');
			
				$this->SetFont('Times','',11);
				$this->MultiCell(540, 18, $finaltemp, 0,'L');
			
				$this->SetFont('Times','B',11);
				$this->Cell(540, 18, 'List any chemicals you might know by name that are regularly used in your facility: ',0,1,'L');
				$this->SetFont('Times','',11);
				$this->MultiCell(540, 18, $this->clean($_POST['esa_chemicalslist']), 0,'L');
			
			
			
				$this->SetFont('Times','B',11);
				$this->Cell(540, 18, 'Approximately how many hours per week do your workers spend in "housekeeping" functions? ',0,1,'L');
				$this->SetFont('Times','',11);
				$this->MultiCell(540, 18, $this->clean($_POST['esa_housekeepingcosts']), 0,'L');
			
				$this->SetFont('Times','B',11);
				$this->Cell(290, 18, 'What would you estimate the cost of these services to be? $ ',0,0,'L');
				$this->SetFont('Times','',11);
				$this->Cell(100, 18, $this->clean($_POST['esa_houskeepingcostestimate']), 0,0,'L');
				$this->SetFont('Times','',11);
				$this->Cell(100, 18, 'per week', 0,1,'L');
			
				if(!isset($_POST['esa_wetfloors'])){
					$_POST['esa_wetfloors'] = 'No';
				} 
			
				$this->SetFont('Times','B',11);
				$this->Cell(540, 18, 'Has your company, in the past 12 months, lost any time due to slip and fall accidents associated with wet floors?',0,1,'L');
				$this->SetFont('Times','',11);
				$this->MultiCell(540, 18, $this->clean($_POST['esa_wetfloors']), 0,'L');	
				if(	$this->clean($_POST['esa_wetfloors']) == 'Yes'){
					$this->SetFont('Times','B',11);
					$this->Cell(540, 18, 'What were the workman\'s compensation costs associated with this/these accident(s)?',0,1,'L');
					$this->SetFont('Times','',11);
					$this->MultiCell(540, 18, $this->clean($_POST['esa_workmanscomp']), 0,'L');				
				}
				$this->ln(10);
		}
	
		function sorbentcontent(){
			// sorbent section (part 2)
		
				$this->SetFont('Forque','',18);
				$this->Cell(320, 34, 'Absorbents, Wipers and Looses',0,1,'L');
				$this->SetFont('Times','',11);
				$this->MultiCell(540, 18, 'Now that we have a good broad view of your facility, let\'s look at some specific solutions. We will start with absorbents, which includes pads, rolls, pillow or pans. Then we will look at wipers/rags and loose absorbents and finally, spill response.', 0,'L');
				$this->ln(10);
			
				$this->SetFont('Times','B',14);
				$this->Cell(90, 20, 'Absorbents',0,0,'L');
			
				$this->SetFont('Times','I',11);
				$this->Cell(420, 20, ' (including mats, pads, rolls, pillows, pans or boom)',0,1,'L');
			
				$this->ln(10);
			
				$this->SetFont('Times','B',11);
				$this->Cell(540, 18, 'Please select the types of absorbents that are currently in use within your facility: ',0,1,'L');
			
				$finaltemp = '';
				if(isset($_POST['esa_sorbentrolls']) && $_POST['esa_sorbentrolls'] == 'on'){$finaltemp .= 'Rolls, ';}
				if(isset($_POST['esa_sorbentpads']) && $_POST['esa_sorbentpads'] == 'on'){$finaltemp .= 'Pads, ';}
				if(isset($_POST['esa_sorbentsocks']) && $_POST['esa_sorbentsocks'] == 'on'){$finaltemp .= 'Socks, ';}
				if(isset($_POST['esa_sorbentpillows']) && $_POST['esa_sorbentpillows'] == 'on'){$finaltemp .= 'Pillows, ';}
				if(isset($_POST['esa_sorbentbooms']) && $_POST['esa_sorbentbooms'] == 'on'){$finaltemp .= 'Booms, ';}
				if(isset($_POST['esa_sorbentdrippans']) && $_POST['esa_sorbentdrippans'] == 'on'){$finaltemp .= 'Drip Pans, ';}
				if(isset($_POST['esa_sorbentrugs']) && $_POST['esa_sorbentrugs'] == 'on'){$finaltemp .= 'Industrial Rugs, ';}
				if(isset($_POST['esa_sorbentother']) && $_POST['esa_sorbentother'] == 'on'){$finaltemp .= $this->clean($_POST['esa_sorbentotherlabel']) . ', ';}
				$finaltemp = rtrim($finaltemp, ', ');
			
			
			
				if($finaltemp != ''){ // there is something there... 
				
					$this->SetFont('Times','',11);
					$this->MultiCell(540, 18, $finaltemp, 0,'L');
				
					$this->SetFont('Times','B',11);
					$this->Cell(320, 18, 'What companies do you currently purchase absorbents from?',0,1,'L');
					$this->SetFont('Times','',11);
					$this->MultiCell(540, 18, $this->clean($_POST['esa_purchasecompany']), 0,'L');
				
					$this->SetFont('Times','B',11);
					$this->Cell(320, 18, 'What brands are you purchasing?',0,1,'L');
					$this->SetFont('Times','',11);
					$this->MultiCell(540, 18, $this->clean($_POST['esa_purchasebrands']), 0,'L');
				
					//////////////// EXPAND OUTPUT FOR PROPER SLOT SIZES BELOW!!!!! ////////////////
					$this->SetFont('Times','B',11);
					$this->Cell(370, 18, 'Approximately how much does your company spend on absorbents per year?', 0,0,'L');
					$priceset = '';
					switch($this->clean($_POST['esa_sorbentspend'])){
						case 'zero':
							$priceset = '$0 - $2,500';
							break;
						case '2k':
							$priceset = '$2,501 - $5,000';
							break;
						case '5k':
							$priceset = '$5,001 - $10,000';
							break;
						case '10k':
							$priceset = '$10,001 - $15,000';
							break;
						case '15k':
							$priceset = '$15,001 - $20,000';
							break;
						case '20k':
							$priceset = '$20,001 - $25,000';
							break;
						case '25k':
							$priceset = '$25,001 - $30,000';
							break;
						case '30k':
							$priceset = '$30,001 +';
							break;
					}
				
					$this->SetFont('Times','',11);
					$this->Cell(290, 18, $priceset, 0,1,'L');
				
				
					$this->SetFont('Times','B',11);
					$this->Cell(200, 18, 'How often do you purchase absorbents?', 0,0,'L');
					$this->SetFont('Times','',11);
					$this->Cell(290, 18, $this->clean($_POST['esa_sorbentbuy']), 0,1,'L');
				
					$this->SetFont('Times','B',11);
					$this->Cell(215, 18, 'Where are you currently using absorbents? ',0,0,'L');
				
					$finaltemp = '';
					if(isset($_POST['esa_sorbentlocationindoor']) && $_POST['esa_sorbentlocationindoor'] == 'on'){$finaltemp .= 'Indoors, ';}
					if(isset($_POST['esa_sorbentlocationoutdoor']) && $_POST['esa_sorbentlocationoutdoor'] == 'on'){$finaltemp .= 'Outdoors, ';}
					if(isset($_POST['esa_sorbentlocationboth']) && $_POST['esa_sorbentlocationboth'] == 'on'){$finaltemp .= 'Indoors and Outdoors, ';}
					$finaltemp = rtrim($finaltemp, ', ');
				
					$this->SetFont('Times','',11);
					$this->Cell(240, 18, $finaltemp, 0,1,'L');
				
					$this->SetFont('Times','B',11);
					$this->Cell(540, 18, 'How often do you change or replace absorbents? ',0,1,'L');
				
					$finaltemp = '';
					if(isset($_POST['esa_sorbentchangedaily']) && $_POST['esa_sorbentchangedaily'] == 'on'){$finaltemp .= 'Daily, ';}
					if(isset($_POST['esa_sorbentchangeweekly']) && $_POST['esa_sorbentchangeweekly'] == 'on'){$finaltemp .= 'Weekly, ';}
					if(isset($_POST['esa_sorbentchangemonthly']) && $_POST['esa_sorbentchangemonthly'] == 'on'){$finaltemp .= 'Monthly, ';}
					if(isset($_POST['esa_sorbentchangedirty']) && $_POST['esa_sorbentchangedirty'] == 'on'){$finaltemp .= 'When they appear dirty, ';}
					if(isset($_POST['esa_sorbentchangesaturated']) && $_POST['esa_sorbentchangesaturated'] == 'on'){$finaltemp .= 'When they are completely saturated, ';}
					if(isset($_POST['esa_sorbentchangeother']) && $_POST['esa_sorbentchangeother'] == 'on'){$finaltemp .= $this->clean($_POST['esa_sorbentchangelabel']) . ', ';}
					$finaltemp = rtrim($finaltemp, ', ');
				
					$this->SetFont('Times','',11);
					$this->MultiCell(540, 18, $finaltemp, 0,'L');
				
					$this->SetFont('Times','B',11);
					$this->Cell(540, 18, 'What departments within your facility currently use absorbents? ',0,1,'L');
				
					$finaltemp = '';
					if(isset($_POST['esa_departmentSafety']) && $_POST['esa_departmentSafety'] == 'on'){$finaltemp .= 'Safety, ';}
					if(isset($_POST['esa_departmentProduction']) && $_POST['esa_departmentProduction'] == 'on'){$finaltemp .= 'Production, ';}
					if(isset($_POST['esa_departmentenvironmental']) && $_POST['esa_departmentenvironmental'] == 'on'){$finaltemp .= 'Environmental, ';}
					if(isset($_POST['esa_departmentDispensing']) && $_POST['esa_departmentDispensing'] == 'on'){$finaltemp .= 'Dispensing, ';}
					if(isset($_POST['esa_departmentResponse']) && $_POST['esa_departmentResponse'] == 'on'){$finaltemp .= 'Emergency Response, ';}
					if(isset($_POST['esa_departmentManufacturing']) && $_POST['esa_departmentManufacturing'] == 'on'){$finaltemp .= 'Manufacturing, ';}
					if(isset($_POST['esa_departmentMaintenance']) && $_POST['esa_departmentMaintenance'] == 'on'){$finaltemp .= 'Maintenance, ';}
					if(isset($_POST['esa_departmentDrumWaste']) && $_POST['esa_departmentDrumWaste'] == 'on'){$finaltemp .= 'Drum/Waste, ';}
					if(isset($_POST['esa_departmentStorage']) && $_POST['esa_departmentStorage'] == 'on'){$finaltemp .= 'Storage, ';}
					if(isset($_POST['esa_departmentWasteWater']) && $_POST['esa_departmentWasteWater'] == 'on'){$finaltemp .= 'Waste Water, ';}
					if(isset($_POST['esa_departmentOther']) && $_POST['esa_departmentOther'] == 'on'){$finaltemp .= $this->clean($_POST['esa_departmentOtherlabel']) . ', ';}
					$finaltemp = rtrim($finaltemp, ', ');
				
					$this->SetFont('Times','',11);
					$this->MultiCell(540, 18, $finaltemp, 0,'L');
				
					$this->SetFont('Times','B',11);
					$this->Cell(320, 18, 'Of the types of machinery in your facility, which are the most likely to benefit from the use of absorbents?',0,1,'L');
					$this->SetFont('Times','',11);
					$this->MultiCell(540, 18, $this->clean($_POST['esa_machinerysorbent']), 0,'L');
				} else {
			
					$this->SetFont('Times','',11);
					$this->MultiCell(540, 18, 'Not using absorbents currently', 0,'L');
				
				}
			
			
				$this->ln(10);
		
				$this->SetFont('Times','B',14);
				$this->Cell(90, 20, 'Wipers/Rags',0,1,'L');
			
				$this->ln(10);
			
				$this->SetFont('Times','B',11);
				$this->Cell(540, 18, 'Are you using any of the following? ',0,1,'L');
			
				$finaltemp = '';
				if(isset($_POST['esa_wiperdispcloth']) && $_POST['esa_wiperdispcloth'] == 'on'){$finaltemp .= 'Disposable Cloth Rags, ';}
				if(isset($_POST['esa_wiperdisposable']) && $_POST['esa_wiperdisposable'] == 'on'){$finaltemp .= 'Disposable Wipers, ';}
				if(isset($_POST['esa_wiperlaunderedrag']) && $_POST['esa_wiperlaunderedrag'] == 'on'){$finaltemp .= 'Laundered Cloth Rags, ';}
				if(isset($_POST['esa_wipershoptowel']) && $_POST['esa_wipershoptowel'] == 'on'){$finaltemp .= 'Shop Towels, ';}
				if(isset($_POST['esa_wiperpapertowel']) && $_POST['esa_wiperpapertowel'] == 'on'){$finaltemp .= 'Paper Towels, ';}
				$finaltemp = rtrim($finaltemp, ', ');
			
				if($finaltemp != ''){ // there is something there.
					$this->SetFont('Times','',11);
					$this->MultiCell(540, 18, $finaltemp, 0,'L');
			
					$this->SetFont('Times','B',11);
					$this->Cell(320, 18, 'Who are you purchasing these products from?',0,1,'L');
					$this->SetFont('Times','',11);
					$this->MultiCell(540, 18, $this->clean($_POST['esa_wiperpurchasing']), 0,'L');
				
					$this->SetFont('Times','B',11);
					$this->Cell(320, 18, 'What brands are you purchasing?',0,1,'L');
					$this->SetFont('Times','',11);
					$this->MultiCell(540, 18, $this->clean($_POST['esa_wiperbrands']), 0,'L');
		
					$this->SetFont('Times','B',11);
					$this->Cell(360, 18, 'Approximately how much does your company spend each year on wipers?',0,0,'L');
					///// REPLACE WITH CODE TO GET PRICE BRACKETS!! //////////////
				
					$priceset = '';
					switch($this->clean($_POST['esa_wiperbuy'])){
						case 'zero':
							$priceset = '$0 - $2,500';
							break;
						case '2k':
							$priceset = '$2,501 - $5,000';
							break;
						case '5k':
							$priceset = '$5,001 - $10,000';
							break;
						case '10k':
							$priceset = '$10,001 - $15,000';
							break;
						case '15k':
							$priceset = '$15,001 - $20,000';
							break;
						case '20k':
							$priceset = '$20,001 - $25,000';
							break;
						case '25k':
							$priceset = '$25,001 - $30,000';
							break;
						case '30k':
							$priceset = '$30,001 +';
							break;
					}
				
					$this->SetFont('Times','',11);
					$this->Cell(290, 18, $priceset, 0,1,'L');
				
	
					$this->SetFont('Times','B',11);
					$this->Cell(320, 18, 'What is your estimated usage on wiper products, including rags and towels, per month?',0,1,'L');
					$this->SetFont('Times','',11);
					$this->MultiCell(540, 18, $this->clean($_POST['esa_wiperestusage']), 0,'L');
				
					$this->SetFont('Times','B',11);
					$this->Cell(320, 18, 'In what applications are you using wipers/rags?',0,1,'L');
					$this->SetFont('Times','',11);
					$this->MultiCell(540, 18, $this->clean($_POST['esa_wiperapplications']), 0,'L');
				} else {
			
					$this->SetFont('Times','',11);
					$this->MultiCell(540, 18, 'Not using wipers or rags', 0,'L');
				}
				$this->ln(10);
		
				$this->SetFont('Times','B',14);
				$this->Cell(110, 20, 'Loose Absorbents',0,0,'L');
			
				$this->SetFont('Times','I',11);
				$this->Cell(420, 20, ' (including clay)',0,1,'L');
			
				$this->ln(10);
			
				if(!isset($_POST['esa_looseuse'])){
					$_POST['esa_looseuse'] = 'No';
				} 
			
				$this->SetFont('Times','B',11);
				$this->Cell(245, 18, 'Do you use loose absorbents within your facility?',0,0,'L');
				$this->SetFont('Times','',11);
				$this->Cell(326, 18, $this->clean($_POST['esa_looseuse']), 0,1,'L');
			
				if(isset($_POST['esa_looseuse']) && $_POST['esa_looseuse'] == 'yes'){
				
					$this->SetFont('Times','B',11);
					$this->Cell(320, 18, 'Who are you purchasing these products from?',0,1,'L');
					$this->SetFont('Times','',11);
					$this->MultiCell(540, 18, $this->clean($_POST['esa_loosepurchasingfrom']), 0,'L');
				
					$this->SetFont('Times','B',11);
					$this->Cell(320, 18, 'What brands are you purchasing?',0,1,'L');
					$this->SetFont('Times','',11);
					$this->MultiCell(540, 18, $this->clean($_POST['esa_loosebrands']), 0,'L');
				
					$this->SetFont('Times','B',11);
					$this->Cell(400, 18, 'Approximately how much does your company spend each year on loose absorbents?',0,0,'L');
				
					$priceset = '';
					switch($this->clean($_POST['esa_loosebuy'])){
						case 'zero':
							$priceset = '$0 - $2,500';
							break;
						case '2k':
							$priceset = '$2,501 - $5,000';
							break;
						case '5k':
							$priceset = '$5,001 - $10,000';
							break;
						case '10k':
							$priceset = '$10,001 - $15,000';
							break;
						case '15k':
							$priceset = '$15,001 - $20,000';
							break;
						case '20k':
							$priceset = '$20,001 - $25,000';
							break;
						case '25k':
							$priceset = '$25,001 - $30,000';
							break;
						case '30k':
							$priceset = '$30,001 +';
							break;
					}
				
					$this->SetFont('Times','',11);
					$this->Cell(290, 18, $priceset, 0,1,'L');
				
				
				
				
					$this->SetFont('Times','B',11);
					$this->Cell(300, 18, 'What is your estimated usage on loose absorbents per month?',0,0,'L');
					$this->SetFont('Times','',11);
					$this->Cell(100, 18, $this->clean($_POST['esa_looseestimateduse']) . ' ' . $this->clean($_POST['esa_looseestimateduseselect']), 0,1,'L');
				
					$this->SetFont('Times','B',11);
					$this->Cell(320, 18, 'In what applications are you using loose absorbents?',0,1,'L');
					$this->SetFont('Times','',11);
					$this->MultiCell(540, 18, $this->clean($_POST['esa_looseapplications']), 0,'L');
				}
				$this->ln(10);
	
		}
	
			function spillkitcontent(){
			// sorbent section (part 2)
		
				$this->SetFont('Forque','',18);
				$this->Cell(320, 34, 'Spill Response',0,1,'L');
				$this->ln(10);
			
				$this->SetFont('Times','B',11);
				$this->Cell(540, 18, 'Do you currently use any of the following for spill response?',0,1,'L');
			
				$finaltemp = '';
				if(isset($_POST['esa_responsespillkits']) && $_POST['esa_responsespillkits'] == 'on'){$finaltemp .= 'Spill Kits, ';}
				if(isset($_POST['esa_responseloose']) && $_POST['esa_responseloose'] == 'on'){$finaltemp .= 'Loose Absorbents, ';}
				if(isset($_POST['esa_responsetrailers']) && $_POST['esa_responsetrailers'] == 'on'){$finaltemp .= 'Trailers, ';}
				if(isset($_POST['esa_responsevacuum']) && $_POST['esa_responsevacuum'] == 'on'){$finaltemp .= 'Vacuum, ';}
				if(isset($_POST['esa_responseother']) && $_POST['esa_responseother'] == 'on'){$finaltemp .= $this->clean($_POST['esa_responseotherlabel']) . ', ';}
				$finaltemp = rtrim($finaltemp, ', ');
			
				if($finaltemp != ''){ // there is something there.
			
					$this->SetFont('Times','',11);
					$this->MultiCell(540, 18, $finaltemp, 0,'L');
				
					$this->SetFont('Times','B',11);
					$this->Cell(320, 18, 'Who are you purchasing these products from?',0,1,'L');
					$this->SetFont('Times','',11);
					$this->MultiCell(540, 18, $this->clean($_POST['esa_responsepurchasing']), 0,'L');
				
					$this->SetFont('Times','B',11);
					$this->Cell(320, 18, 'What brands are you purchasing?',0,1,'L');
					$this->SetFont('Times','',11);
					$this->MultiCell(540, 18, $this->clean($_POST['esa_responsebrands']), 0,'L');
				
					$this->SetFont('Times','B',11);
					$this->Cell(390, 18, 'Approximately how much does your company spend each year on spill response?',0,0,'L');
				
					$priceset = '';
					switch($this->clean($_POST['esa_responsebuy'])){
						case 'zero':
							$priceset = '$0 - $2,500';
							break;
						case '2k':
							$priceset = '$2,501 - $5,000';
							break;
						case '5k':
							$priceset = '$5,001 - $10,000';
							break;
						case '10k':
							$priceset = '$10,001 - $15,000';
							break;
						case '15k':
							$priceset = '$15,001 - $20,000';
							break;
						case '20k':
							$priceset = '$20,001 - $25,000';
							break;
						case '25k':
							$priceset = '$25,001 - $30,000';
							break;
						case '30k':
							$priceset = '$30,001 +';
							break;
					}
				
					$this->SetFont('Times','',11);
					$this->Cell(290, 18, $priceset, 0,1,'L');
				
				
				
				
					$this->SetFont('Times','B',11);
					$this->Cell(320, 18, 'How many spill kits are currently maintained at your facility?',0,1,'L');
					$this->SetFont('Times','',11);
					$this->MultiCell(540, 18, $this->clean($_POST['esa_responsetotalspillkits']), 0,'L');
				
					$this->SetFont('Times','B',11);
					$this->Cell(60, 18, 'Are they: ',0,0,'L');
				
					$this->SetFont('Times','',11);
					if($_POST['esa_responsespillittype'] == 'Both'){
						$this->Cell(60, 18, 'Both indoor and outdoor', 0,1,'L');
					} else if($_POST['esa_responsespillittype'] == 'Neither'){
						$this->Cell(60, 18, 'Neither Indoor Or Outdoor', 0,1,'L');
					} else {
						$this->Cell(60, 18, $this->clean($_POST['esa_responsespillittype']), 0,1,'L');
					}
				} else {
					$this->SetFont('Times','',11);
					$this->MultiCell(540, 18, 'Not currently using spill response products', 0,'L');
				}
				$this->SetFont('Times','B',11);
				$this->Cell(540, 18, 'Please select any items of concern regarding spills within your facility:',0,1,'L');
			
				$finaltemp = '';
				if(isset($_POST['esa_responsefacilityconcernwaterway']) && $_POST['esa_responsefacilityconcernwaterway'] == 'on'){$finaltemp .= 'Waterways, ';}
				if(isset($_POST['esa_responsefacilityconcernstormdrain']) && $_POST['esa_responsefacilityconcernstormdrain'] == 'on'){$finaltemp .= 'Storm Drains, ';}
				if(isset($_POST['esa_responsefacilityconcernfueling']) && $_POST['esa_responsefacilityconcernfueling'] == 'on'){$finaltemp .= 'Fueling Stations, ';}
				if(isset($_POST['esa_responsefacilityconcernrailside']) && $_POST['esa_responsefacilityconcernrailside'] == 'on'){$finaltemp .= 'Rail side, ';}
				if(isset($_POST['esa_responsefacilityconcerninternaldrain']) && $_POST['esa_responsefacilityconcerninternaldrain'] == 'on'){$finaltemp .= 'Internal Drain Systems, ';}
				if(isset($_POST['esa_responsefacilityconcerninternalspill']) && $_POST['esa_responsefacilityconcerninternalspill'] == 'on'){$finaltemp .= 'Other Internal Spills, ';}
				if(isset($_POST['esa_responsefacilityconcernpublicdrain']) && $_POST['esa_responsefacilityconcernpublicdrain'] == 'on'){$finaltemp .= 'Public Drainage Systems, ';}
				if(isset($_POST['esa_responsefacilityconcernother']) && $_POST['esa_responsefacilityconcernother'] == 'on'){$finaltemp .= $this->clean($_POST['esa_responsefacilityconcernotherlabel']) . ', ';}
				$finaltemp = rtrim($finaltemp, ', ');
			
				$this->SetFont('Times','',11);
				$this->MultiCell(540, 18, $finaltemp, 0,'L');
			
				$this->SetFont('Times','B',11);
				$this->Cell(320, 18, 'What is your worst case scenario spill? (Please list volumes of each liquid where possible)',0,1,'L');
				$this->SetFont('Times','',11);
				$this->MultiCell(540, 18, $this->clean($_POST['esa_responseworstcase']), 0,'L');
			
				$this->SetFont('Times','B',11);
				$this->Cell(320, 18, 'Additional Comments:',0,1,'L');
				$this->SetFont('Times','',11);
				$this->MultiCell(540, 18, $this->clean($_POST['esa_responsecomments']), 0,'L');
			
					$this->ln(10);
			
			}
		
			function storagecontent(){
			// sorbent section (part 2)
		
				$this->SetFont('Forque','',18);
				$this->Cell(320, 34, 'Storage, Handling and Disposal',0,1,'L');
				$this->SetFont('Times','',11);
				$this->MultiCell(540, 18, 'Let\'s talk about storage  first, then we will move on to Disposal...', 0,'L');
				$this->ln(10);
			
			
				$this->SetFont('Times','B',11);
				$this->Cell(265, 18, 'Do you currently have storage and disposal products?',0,0,'L');
			
				if(!isset($_POST['esa_storagehave'])){
					$_POST['esa_storagehave'] = 'No';
				} 
			
				$this->SetFont('Times','',11);
				$this->Cell(326, 18, $this->clean($_POST['esa_storagehave']), 0,1,'L');
			
				if($_POST['esa_storagehave'] == 'Yes'){
			
			
					$this->SetFont('Times','B',11);
					$this->Cell(320, 18, 'Who are you purchasing these products from?',0,1,'L');
					$this->SetFont('Times','',11);
					$this->MultiCell(540, 18, $this->clean($_POST['esa_storagepurchasing']), 0,'L');
				
					$this->SetFont('Times','B',11);
					$this->Cell(320, 18, 'What brands are you purchasing?',0,1,'L');
					$this->SetFont('Times','',11);
					$this->MultiCell(540, 18, $this->clean($_POST['esa_storagebrands']), 0,'L');
				
					$this->SetFont('Times','B',11);
					$this->Cell(460, 18, 'Approximately how much does your company spend on storage, handling and disposal per year?',0,0,'L');
				
				
					$priceset = '';
					switch($this->clean($_POST['esa_storagebuy'])){
						case 'zero':
							$priceset = '$0 - $2,500';
							break;
						case '2k':
							$priceset = '$2,501 - $5,000';
							break;
						case '5k':
							$priceset = '$5,001 - $10,000';
							break;
						case '10k':
							$priceset = '$10,001 - $15,000';
							break;
						case '15k':
							$priceset = '$15,001 - $20,000';
							break;
						case '20k':
							$priceset = '$20,001 - $25,000';
							break;
						case '25k':
							$priceset = '$25,001 - $30,000';
							break;
						case '30k':
							$priceset = '$30,001 +';
							break;
					}
				
					$this->SetFont('Times','',11);
					$this->Cell(290, 18, $priceset, 0,1,'L');
				
				
					$this->SetFont('Times','B',11);
					$this->Cell(320, 18, 'What are your current storage needs?',0,1,'L');
					$this->SetFont('Times','',11);
					$this->MultiCell(540, 18, $this->clean($_POST['esa_storageneeds']), 0,'L');
			
				}
			
				$this->SetFont('Times','B',11);
				$this->Cell(540, 18, 'Is your facility considered to be any of the following?',0,1,'L');
			
				$finaltemp = '';
				if(isset($_POST['esa_storagelargegenerator']) && $_POST['esa_storagelargegenerator'] == 'on'){$finaltemp .= 'Large Quantity Generator, ';}
				if(isset($_POST['esa_storagesmallgenerator']) && $_POST['esa_storagesmallgenerator'] == 'on'){$finaltemp .= 'Small Quantity Generator, ';}
				if(isset($_POST['esa_storagedisposalfacility']) && $_POST['esa_storagedisposalfacility'] == 'on'){$finaltemp .= 'Treatment Storage Disposal Facility, ';}
				$finaltemp = rtrim($finaltemp, ', ');
			
				$this->SetFont('Times','',11);
				$this->MultiCell(540, 18, $finaltemp, 0,'L');
			
				/// edits start here 
			
				$this->SetFont('Times','B',11);
				$this->Cell(326, 18, 'For each of the following, please indicate your current usage', 0,1,'L');
			
			
				$this->SetFont('Times','',11);
				$this->Cell(110, 18, 'Waste Reduction',0,0,'L');
			
				$finaltemp = '';
				if(isset($_POST['esa_storagewasteuse']) && $_POST['esa_storagewasteuse'] == 'on'){$finaltemp .= 'Use, ';}
				if(isset($_POST['esa_storagewasteneed']) && $_POST['esa_storagewasteneed'] == 'on'){$finaltemp .= 'Need, ';}
				if(isset($_POST['esa_storagewastenoneed']) && $_POST['esa_storagewastenoneed'] == 'on'){$finaltemp .= 'No Need, ';}
				$finaltemp = rtrim($finaltemp, ', ');
			 
			
			
				if(isset($_POST['esa_storagewasteuse']) && $_POST['esa_storagewasteuse'] == 'on'){
				$this->SetFont('Times','',11);
				$this->Cell(110, 18, $finaltemp, 0,0,'L');
				$this->SetFont('Times','',11);
				$this->Cell(326, 18,'Annual Expense $' . $this->clean($_POST['esa_storagewasteannualexpense']), 0,1,'L');
				} else {
					$this->SetFont('Times','',11);
					$this->Cell(326, 18, $finaltemp, 0,1,'L');
				}

				$this->SetFont('Times','',11);
				$this->Cell(110, 18, 'Funnels',0,0,'L');
			
				$finaltemp = '';
				if(isset($_POST['esa_storagefunnelsuse']) && $_POST['esa_storagefunnelsuse'] == 'on'){$finaltemp .= 'Use, ';}
				if(isset($_POST['esa_storagefunnelsneed']) && $_POST['esa_storagefunnelsneed'] == 'on'){$finaltemp .= 'Need, ';}
				if(isset($_POST['esa_storagefunnelsnoneed']) && $_POST['esa_storagefunnelsnoneed'] == 'on'){$finaltemp .= 'No Need, ';}
				$finaltemp = rtrim($finaltemp, ', ');
			
				if(isset($_POST['esa_storagefunnelsuse']) && $_POST['esa_storagefunnelsuse'] == 'on'){
				$this->SetFont('Times','',11);
				$this->Cell(110, 18, $finaltemp, 0,0,'L');
				$this->SetFont('Times','',11);
				$this->Cell(326, 18,'Annual Expense $' . $this->clean($_POST['esa_storagefunnelsannualexpense']), 0,1,'L');
				} else {
					$this->SetFont('Times','',11);
				$this->Cell(326, 18, $finaltemp, 0,1,'L');
				}
			
				$this->SetFont('Times','',11);
				$this->Cell(110, 18, 'Drums',0,0,'L');
			
				$finaltemp = '';
				if(isset($_POST['esa_storagedrumuse']) && $_POST['esa_storagedrumuse'] == 'on'){$finaltemp .= 'Use, ';}
				if(isset($_POST['esa_storagedrumneed']) && $_POST['esa_storagedrumneed'] == 'on'){$finaltemp .= 'Need, ';}
				if(isset($_POST['esa_storagedrumnoneed']) && $_POST['esa_storagedrumnoneed'] == 'on'){$finaltemp .= 'No Need, ';}
				$finaltemp = rtrim($finaltemp, ', ');
			
			
				if(isset($_POST['esa_storagedrumuse']) && $_POST['esa_storagedrumuse'] == 'on'){
				$this->SetFont('Times','',11);
				$this->Cell(110, 18, $finaltemp, 0,0,'L');
				$this->SetFont('Times','',11);
				$this->Cell(326, 18,'Annual Expense $' . $this->clean($_POST['esa_storagedrumannualexpense']), 0,1,'L');
				} else {
					$this->SetFont('Times','',11);
				$this->Cell(326, 18, $finaltemp, 0,1,'L');
				}

				$this->SetFont('Times','',11);
				$this->Cell(110, 18, 'Pumps',0,0,'L');
			
				$finaltemp = '';
				if(isset($_POST['esa_storagepumpsuse']) && $_POST['esa_storagepumpsuse'] == 'on'){$finaltemp .= 'Use, ';}
				if(isset($_POST['esa_storagepumpsneed']) && $_POST['esa_storagepumpsneed'] == 'on'){$finaltemp .= 'Need, ';}
				if(isset($_POST['esa_storagepumpsnoneed']) && $_POST['esa_storagepumpsnoneed'] == 'on'){$finaltemp .= 'No Need, ';}
				$finaltemp = rtrim($finaltemp, ', ');
			
				if(isset($_POST['esa_storagepumpsuse']) && $_POST['esa_storagepumpsuse'] == 'on'){
				$this->SetFont('Times','',11);
				$this->Cell(110, 18, $finaltemp, 0,0,'L');
				$this->SetFont('Times','',11);
				$this->Cell(326, 18,'Annual Expense $' . $this->clean($_POST['esa_storagepumpsannualexpense']), 0,1,'L');
				} else {
					$this->SetFont('Times','',11);
				$this->Cell(326, 18, $finaltemp, 0,1,'L');
				}

				$this->SetFont('Times','',11);
				$this->Cell(110, 18, 'Spill Decks',0,0,'L');
			
				$finaltemp = '';
				if(isset($_POST['esa_storagedecksuse']) && $_POST['esa_storagedecksuse'] == 'on'){$finaltemp .= 'Use, ';}
				if(isset($_POST['esa_storagedecksneed']) && $_POST['esa_storagedecksneed'] == 'on'){$finaltemp .= 'Need, ';}
				if(isset($_POST['esa_storagedecksnoneed']) && $_POST['esa_storagedecksnoneed'] == 'on'){$finaltemp .= 'No Need, ';}
				$finaltemp = rtrim($finaltemp, ', ');
			
				if(isset($_POST['esa_storagedecksuse']) && $_POST['esa_storagedecksuse'] == 'on'){
				$this->SetFont('Times','',11);
				$this->Cell(110, 18, $finaltemp, 0,0,'L');
				$this->SetFont('Times','',11);
				$this->Cell(326, 18,'Annual Expense $' . $this->clean($_POST['esa_storagedecksannualexpense']), 0,1,'L');
				} else {
					$this->SetFont('Times','',11);
				$this->Cell(326, 18, $finaltemp, 0,1,'L');
				}

				$this->SetFont('Times','',11);
				$this->Cell(110, 18, 'Spill Pallets',0,0,'L');
			
				$finaltemp = '';
				if(isset($_POST['esa_storagepalletuse']) && $_POST['esa_storagepalletuse'] == 'on'){$finaltemp .= 'Use, ';}
				if(isset($_POST['esa_storagepalletneed']) && $_POST['esa_storagepalletneed'] == 'on'){$finaltemp .= 'Need, ';}
				if(isset($_POST['esa_storagepalletnoneed']) && $_POST['esa_storagepalletnoneed'] == 'on'){$finaltemp .= 'No Need, ';}
				$finaltemp = rtrim($finaltemp, ', ');
			
				if(isset($_POST['esa_storagepalletuse']) && $_POST['esa_storagepalletuse'] == 'on'){
				$this->SetFont('Times','',11);
				$this->Cell(110, 18, $finaltemp, 0,0,'L');
				$this->SetFont('Times','',11);
				$this->Cell(326, 18,'Annual Expense $' . $this->clean($_POST['esa_storagepalletannualexpense']), 0,1,'L');
				} else {
					$this->SetFont('Times','',11);
				$this->Cell(326, 18, $finaltemp, 0,1,'L');
				}

				$this->SetFont('Times','B',11);
				$this->Cell(320, 18, 'Please select the containers that your facility uses and list their volume capacity',0,1,'L');
			
				if(isset($_POST['esa_storagebottles']) && $_POST['esa_storagebottles'] == 'on'){
				$this->SetFont('Times','',11);
				$this->MultiCell(540, 18, 'Bottles - Volume: ' . $this->clean($_POST['esa_storagebottleslabel']), 0,'L');
				}
				if(isset($_POST['esa_storagepails']) && $_POST['esa_storagepails'] == 'on'){
				$this->SetFont('Times','',11);
				$this->MultiCell(540, 18, 'Pails - Volume: ' . $this->clean($_POST['esa_storagepailslabel']), 0,'L');
				}
			
				if(isset($_POST['esa_storagedrums']) && $_POST['esa_storagedrums'] == 'on'){
				$this->SetFont('Times','',11);
				$this->MultiCell(540, 18, 'Drums - Volume: ' . $this->clean($_POST['esa_storagedrumslabel']), 0,'L');
				}
			
				if(isset($_POST['esa_storageibc']) && $_POST['esa_storageibc'] == 'on'){
				$this->SetFont('Times','',11);
				$this->MultiCell(540, 18, 'IBC Totes - Volume: ' . $this->clean($_POST['esa_storageibclabel']), 0,'L');
				}
			
				$this->ln(10);
			
				$this->SetFont('Times','B',14);
				$this->Cell(90, 20, 'Disposal',0,1,'L');
			
				$this->ln(10);
			
				$this->SetFont('Times','B',11);
				$this->Cell(540, 18, 'What is the preferred method of waste disposal at your company?',0,1,'L');
			
				$finaltemp = '';
				if(isset($_POST['esa_disposallandfilling']) && $_POST['esa_disposallandfilling'] == 'on'){$finaltemp .= 'Land Filling, ';}
				if(isset($_POST['esa_disposalincineration']) && $_POST['esa_disposalincineration'] == 'on'){$finaltemp .= 'Incineration, ';}
				if(isset($_POST['esa_disposalblending']) && $_POST['esa_disposalblending'] == 'on'){$finaltemp .= 'Fuels Blending, ';}
				if(isset($_POST['esa_disposalother']) && $_POST['esa_disposalother'] == 'on'){$finaltemp .= $this->clean($_POST['esa_disposalotherlabel']) . ', ';}
				$finaltemp = rtrim($finaltemp, ', ');
			
				$this->SetFont('Times','',11);
				$this->MultiCell(540, 18, $finaltemp, 0,'L');
			
				$this->SetFont('Times','B',11);
				$this->Cell(540, 18, 'How do you package absorbent waste for disposal?',0,1,'L');
			
				$finaltemp = '';
				if(isset($_POST['esa_disposalpackagedrum']) && $_POST['esa_disposalpackagedrum'] == 'on'){$finaltemp .= 'Drums, ';}
				if(isset($_POST['esa_disposalpackagedumpster']) && $_POST['esa_disposalpackagedumpster'] == 'on'){$finaltemp .= 'Dumpster, ';}
				if(isset($_POST['esa_disposalpackageother']) && $_POST['esa_disposalpackageother'] == 'on'){$finaltemp .= $this->clean($_POST['esa_disposalpackageotherlabel']) . ', ';}
				$finaltemp = rtrim($finaltemp, ', ');
			
				$this->SetFont('Times','',11);
				$this->MultiCell(540, 18, $finaltemp, 0,'L');
			
				$this->SetFont('Times','B',11);
				$this->Cell(130, 18, 'Do you use a contractor?',0,0,'L');
			
				if(!isset($_POST['esa_disposalusecontractor'])){
					$_POST['esa_disposalusecontractor'] = 'No';
				}
			
				if($_POST['esa_disposalusecontractor'] == 'yes'){
				$this->SetFont('Times','',11);
				$this->Cell(326, 18,'Yes - ' . $this->clean($_POST['esa_disposalusecontractoryeslabel']), 0,1,'L');
				} else {
				$this->SetFont('Times','',11);
				$this->Cell(326, 18,'No', 0,1,'L');
				}
			
				$this->SetFont('Times','B',11);
				$this->Cell(540, 18, 'How many drums per week are being disposed of for the following?',0,1,'L');
			
				$this->SetFont('Times','',11);
				$this->Cell(223, 18, 'Non-hazardous Content - # of drums per month:',0,0,'L');
				$this->Cell(117, 18, $this->clean($_POST['esa_disposalnonhazweekly']),0,0,'L');
				$this->Cell(83, 18, 'Cost per drum: $',0,0,'L');
				$this->Cell(117, 18, $this->clean($_POST['esa_disposalnonhazweeklycost']),0,1,'L');
			
				$this->SetFont('Times','',11);
				$this->Cell(223, 18, 'Hazardous Content - # of drums per month:',0,0,'L');
				$this->Cell(117, 18, $this->clean($_POST['esa_disposalhazweekly']),0,0,'L');
				$this->Cell(83, 18, 'Cost per drum: $',0,0,'L');
				$this->Cell(117, 18, $this->clean($_POST['esa_disposalhazweeklycost']),0,1,'L');

				$this->SetFont('Times','B',11);
				$this->Cell(190, 18, 'What is your dumpster/roll off cost? $',0,0,'L');
				$this->SetFont('Times','',11);
				$this->Cell(326, 18,$this->clean($_POST['esa_disposalrolloffcost']), 0,1,'L');
			
			
			
			
			
			}
		
		
			function regulationcontent(){
			// sorbent section (part 2)
		
				$this->SetFont('Forque','',18);
				$this->Cell(320, 34, 'Regulations',0,1,'L');
				$this->ln(10);
			
				$this->SetFont('Times','B',11);
				$this->MultiCell(540, 18, 'Do you have any concerns regarding the regulations surrounding the proper use of absorbents with regards to shipping and handling or worker safety?',0,'L');
			
				if(!isset($_POST['esa_regulationconcern'])){
					$_POST['esa_regulationconcern'] = 'No';
				}
			
				if($_POST['esa_regulationconcern'] == 'yes'){
				$this->SetFont('Times','',11);
				$this->MultiCell(540, 18,'Yes - ' . $this->clean($_POST['esa_regulationconcernyeslabel']), 0,'L');
				} else {
				$this->SetFont('Times','',11);
				$this->Cell(326, 18,'No', 0,1,'L');
				}
					$this->ln(10);
				$this->SetFont('Times','B',11);
				$this->Cell(540, 18, 'Please list any regulations, specific to your region, regarding disposal that are of concern to your company.',0,1,'L');
			
				$this->SetFont('Times','',11);
				$this->MultiCell(540, 18, $this->clean($_POST['esa_regulationconcernlocal']), 0,'L');
					$this->ln(10);
				$this->SetFont('Times','B',11);
				$this->MultiCell(540, 18, 'Thank you again for taking time out of your busy schedule to fill out this assessment. We will use the information you have provided to save your company money and provide you with the best absorbent products on the market.',0,'C');
			
			}
	}

function esa_post_return_data(){

	$pdf = new PDF("P", "pt", "Letter");
	$pdf->AddFont('Forque','','Forque.php');
	$pdf->SetMargins(36, 120, 36);
	$pdf->AddPage();


	$pdf->SetAutoPageBreak(true, 63);
	$pdf->SetFont('Helvetica','',24);
	$pdf->SetCustomerContent();
	$pdf->sorbentcontent();
	$pdf->spillkitcontent();
	$pdf->storagecontent();
	$pdf->regulationcontent();

	$doc = $pdf->Output('doc.pdf', 'S');

	// this saves the file to a directory that we set. we'll need a naming structure to use. 

	$mail = new PHPMailer;

//	$mail->SMTPDebug = 3;                // Enable verbose debug output
	$mail->isSMTP();                      // Set mailer to use SMTP
	$mail->Host = esc_attr(get_option('esa_smtp_gateway', ''));  	 // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;             // Enable SMTP authentication
	$mail->Username = esc_attr(get_option('esa_email', '')); // SMTP username
	$mail->Password = esc_attr(get_option('esa_email_password', ''));     // SMTP password
	$mail->SMTPSecure = 'ssl';       // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465;              // TCP port to connect to

	$mail->setFrom('user@site.com', 'MEP Brothers');
	$mail->addAddress(filter_var( $_POST['esa_email1'], FILTER_SANITIZE_STRING ));     // Add a recipient
	/*
	if($_POST['esa_email2'] != ''){
		$mail->addAddress(filter_var( $_POST['esa_email2'], FILTER_SANITIZE_STRING ));               // Name is optional
	}
	*/

	$mail->addReplyTo('user@site.com', 'MEP Brothers');


	$mail->AddStringAttachment($doc, 'doc.pdf', 'base64', 'application/pdf');

	//$mail->AddAttachment($pdfoutputfile, 'my-doc.pdf');
	// this string gets the physically created file and attaches it.


	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'Your Site Assessment PDF';
	$mail->Body    = 'This is an automatically generated email for your site assessment. If you have any questions, please call 1.234.567.8900 or reply to this email. <br /> -- MEP Brothers';
	$mail->AltBody = 'This is an automatically generated email for your site assessment. If you have any questions, please call 1.234.567.8900 or reply to this email. -- MEP Brothers';

	if(!$mail->send()) {
	
		echo get_option('esa_smtp_gateway', '') . '<br />';
		echo get_option('esa_email', '') . '<br />';
		echo get_option('esa_email_password', '') . '<br />';
	
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		wp_redirect($_POST['esa-origin']);
	}

	unset($pdf);
	unset($doc);

}

?>