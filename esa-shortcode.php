<?php

function ESA_load_page(){

wp_register_style( 'esa_style_css', '/wp-content/plugins/environmental-site-assessment/css/siteassess.css' );
wp_enqueue_style( 'esa_style_css' );

wp_enqueue_script( 'esa_style_js', '/wp-content/plugins/environmental-site-assessment/js/siteassessscripts.js', array('jquery'), null, true );


?>



	<form method="post" id="saform" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>">
	
		<input type="hidden" name="action" value="esa-form-return">
		<input type="hidden" name="esa-origin" value="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
			
	
			<h1>General Information <a href="#" id="minimizegeneralinformation">-</a></h1>
			<div id="generalinformationsection">
				<label for="companyname">Company Name</label><input type="textarea" class="textarea" name="esa_companyname" id="companyname" /><br />
				<label for="contactname">Contact Name</label><input type="textarea" class="textarea" name="esa_contactname" id="contactname" /><br />
				<label for="contacttitle">Contact Title</label><input type="textarea" class="textarea" name="esa_contacttitle" id="contacttitle" /><br />
				
				<p>Thank you for taking the time to do this Plant Assessment. Completely filling out each of the questions below will help us understand your facility better so that we may better serve your needs.</p>
				
				<label for="companyservices">What products or services does your facility produce?</label><textarea name="esa_companyservices" id="companyservices" /></textarea><br />
				<label for="companybuildings">How many buildings are there in your facility?</label><input type="textarea" class="textarea" name="esa_companybuildings" id="companybuildings" /><br />
				<label for="companyemployees">How many employees work on site at your facility?</label><input type="textarea" class="textarea" name="esa_companyemployees" id="companyemployees" /><br />
				
				<p>Please select the applications in which absorbents would be used</p>
				<label for="dripapplication">Leaks and Drips</label><input type="checkbox" class="check" name="esa_dripapplication" id="dripapplication" /><br />
				<label for="oversprayapplication">Overspray</label><input type="checkbox" class="check" name="esa_oversprayapplication" id="oversprayapplication" /><br />
				<label for="footapplication">Foot Traffic</label><input type="checkbox" class="check" name="esa_footapplication" id="footapplication" /><br />
				<label for="houseapplication">General Housekeeping</label><input type="checkbox" class="check" name="esa_houseapplication" id="houseapplication" /><br />
				<label for="spillapplication">Emergency Spill Response</label><input type="checkbox" class="check" name="esa_spillapplication" id="spillapplication" /><br />
				
				<label for="otherapplication">Other</label><input type="checkbox" class="check" name="esa_otherapplication" id="otherapplication" /><input type="textarea" class="textarea" name="esa_otherapplicationlabel" id="otherapplicationlabel" /><br />
				
				<p>Do you purchase absorbents through the use of a Corporate Agreement?</p>
				<label for="corporateagreementno">No</label><input type="radio" class="radio" name="esa_corporateagreement" id="corporateagreementno" value="no" /><br />
				<label for="corporateagreementyes">Yes</label><input type="radio" class="radio" name="esa_corporateagreement" id="corporateagreementyes" value="yes" /><label for="corporateagreementlabel">- If yes, what office sets these up?</label><input type="textarea" class="textarea" name="esa_corporateagreementlabel" id="corporateagreementlabel" /><br />
				
				<p>Are you using a min/max system?</p>
				<label for="minmaxno">No</label><input type="radio" class="radio" name="esa_minmax" id="minmaxno" value="no" /><br />
				<label for="minmaxyes">Yes</label><input type="radio" class="radio" name="esa_minmax" id="minmaxyes" value="yes" /><br />
				
				<p>Do you purchase for other sites within your company?</p>
				<label for="othersitesno">No</label><input type="radio" class="radio" name="esa_othersites" id="othersitesno" value="no" /><br />
				<label for="othersitesyes">Yes - If Yes, Where?</label><input type="radio" class="radio" name="esa_othersites" id="othersitesyes" value="yes" /><br />
				
				<div id="othersiteszone">
					<label for="othersitescompanyname0">Company Name</label><input type="textarea" class="textarea" name="esa_othersitescompanyname0" id="othersitescompanyname0" /><label for="othersiteslocation0">Location <em>(city, state)</em></label><input type="textarea" class="textarea" name="esa_othersiteslocation0" id="othersiteslocation0" /><br />
				</div> <a href="#" id="othersiteadd">Add</a>
				
				<p>Does your system work with Blanket Purchase Orders?</p>
				<label for="blanketpono">No</label><input type="radio" class="radio" name="esa_blanketpo" id="blanketpono" value="no" /><br />
				<label for="blanketpoyes">Yes</label><input type="radio" class="radio" name="esa_blanketpo" id="blanketpoyes" value="yes" /><br />
				
				
				<label for="supplierchooser">Who in your company decides which suppliers to purchase from?</label><textarea name="esa_supplierchooser" id="supplierchooser" ></textarea><br />
				<label for="companyproblems">What do you feel are your current problem areas?</label><textarea name="esa_companyproblems" id="companyproblems" ></textarea><br />
				<label for="companysolutions">What are your current solutions to these problems? </label><textarea name="esa_companysolutions" id="companysolutions" ></textarea><br />
				<label for="companysolutionenjoyment">What do you like or dislike about these solutions?</label><textarea name="esa_companysolutionenjoyment" id="companysolutionenjoyment" ></textarea><br />
				
				<p>Which liquids are commonly used within your facility?</p>
				<label for="waterliquids">Water-based liquids</label><input type="checkbox" class="check" name="esa_waterliquids" id="waterliquids" /><br />
				<label for="oilliquids">Oil/Petroleum Products</label><input type="checkbox" class="check" name="esa_oilliquids" id="oilliquids" /><br />
				<label for="flammableliquids">Flammables</label><input type="checkbox" class="check" name="esa_flammableliquids" id="flammableliquids" /><br />
				<label for="solventliquids">Solvents</label><input type="checkbox" class="check" name="esa_solventliquids" id="solventliquids" /><br />
				<label for="otherliquids">Other</label><input type="checkbox" class="check" name="esa_otherliquids" id="otherliquids" /><input type="textarea" class="textarea" name="esa_otherliquidslabel" id="otherliquidslabel" /><br />
				
				<label for="chemicalslist">List any chemicals you might know by name that are regularly used in your facility:</label><textarea name="esa_chemicalslist" id="chemicalslist" ></textarea><br />
				
				
				<label for="housekeepingcosts">Approximately how many hours per week do your workers spend in "housekeeping" functions?</label><input type="textarea" class="textarea" name="esa_housekeepingcosts" id="housekeepingcosts" /><br />
				
				<label for="houskeepingcostestimate">What would you estimate the cost of these services to be? $</label><input type="textarea" class="textarea" name="esa_houskeepingcostestimate" id="houskeepingcostestimate" /> per week<br />
				
				<p>Has your company, in the past 12 months, lost any time due to slip and fall accidents associated with wet floors?</p>
				<label for="wetfloorsno">No</label><input type="radio" class="radio" name="esa_wetfloors" id="wetfloorsno" value="No" /><br />
				<label for="wetfloorsyes">Yes</label><input type="radio" class="radio" name="esa_wetfloors" id="wetfloorsyes" value="Yes" /><br />
				<div id="workcomphiddenarea">
					<label for="workmanscomp">What were the workman's compensation costs associated with this/these accident(s)?</label><textarea name="esa_workmanscomp" id="workmanscomp" ></textarea><br />
				</div>
				<a href="#" id="gotoabsorbentssection">Next Section</a>
			</div>
				
				<h1>Absorbents, Wipers and Looses<a href="#" id="minimizeabsorbents">+</a></h1>
			<div id="absorbentssection">
				<p>Now that we have a good broad view of your facility, let's look at some specific solutions. We will start with absorbents, which includes pads, rolls, pillow or pans. Then we will look at wipers/rags and loose absorbents and  nally, spill response.</p>
				
				<p>Please select the types of absorbents that are currently in use within your facility:</p>
				<label for="sorbentrolls">Rolls</label><input type="checkbox" class="check" name="esa_sorbentrolls" id="sorbentrolls" /><br />
				<label for="sorbentpads">Pads</label><input type="checkbox" class="check" name="esa_sorbentpads" id="sorbentpads" /><br />
				<label for="sorbentsocks">Socks</label><input type="checkbox" class="check" name="esa_sorbentsocks" id="sorbentsocks" /><br />
				<label for="sorbentpillows">Pillows</label><input type="checkbox" class="check" name="esa_sorbentpillows" id="sorbentpillows" /><br />
				<label for="sorbentbooms">Booms</label><input type="checkbox" class="check" name="esa_sorbentbooms" id="sorbentbooms" /><br />
				<label for="sorbentdrippans">Drip Pans</label><input type="checkbox" class="check" name="esa_sorbentdrippans" id="sorbentdrippans" /><br />
				<label for="sorbentrugs">Industrial Rugs</label><input type="checkbox" class="check" name="esa_sorbentrugs" id="sorbentrugs" /><br />
				<label for="sorbentother">Other</label><input type="checkbox" class="check" name="esa_sorbentother" id="sorbentother" /><input type="textarea" class="textarea" name="esa_sorbentotherlabel" id="sorbentotherlabel" /><br />
				
				
				<div id="sorbentsareinuse">
					<label for="purchasecompany">What companies do you currently purchase absorbents from?</label><textarea name="esa_purchasecompany" id="purchasecompany" ></textarea><br />
					<label for="purchasebrands">What brands are you purchasing?</label><textarea name="esa_purchasebrands" id="purchasebrands" ></textarea><br />
					
					<p>Approximately how much does your company spend on absorbents per year?</p>
					<label for="sorbentspendzero">$0 - $2,500</label><input type="radio" class="radio" name="esa_sorbentspend" id="sorbentspendzero" value="zero" /><br />
					<label for="sorbentspend2k">$2,501 - $5,000</label><input type="radio" class="radio" name="esa_sorbentspend" id="sorbentspend2k" value="2k" /><br />
					<label for="sorbentspend5k">$5,001 - $10,000</label><input type="radio" class="radio" name="esa_sorbentspend" id="sorbentspend5k" value="5k" /><br />
					<label for="sorbentspend10k">$10,001 - $15,000</label><input type="radio" class="radio" name="esa_sorbentspend" id="sorbentspend10k" value="10k" /><br />
					<label for="sorbentspend15k">$15,001 - $20,000</label><input type="radio" class="radio" name="esa_sorbentspend" id="sorbentspend15k" value="15k" /><br />
					<label for="sorbentspend20k">$20,001 - $25,000</label><input type="radio" class="radio" name="esa_sorbentspend" id="sorbentspend20k" value="20k" /><br />
					<label for="sorbentspend25k">$25,001 - $30,000</label><input type="radio" class="radio" name="esa_sorbentspend" id="sorbentspend25k" value="25k" /><br />
					<label for="sorbentspend30k">$30,001 +</label><input type="radio" class="radio" name="esa_sorbentspend" id="sorbentspend30k" value="30k" /><br />
					
					<p>How often do you purchase absorbents?</p>
					<label for="sorbentbuyweekly">Weekly</label><input type="radio" class="radio" name="esa_sorbentbuy" id="sorbentbuyweekly" value="weekly" /><br />
					<label for="sorbentbuymonthly">Monthly</label><input type="radio" class="radio" name="esa_sorbentbuy" id="sorbentbuymonthly" value="monthly" /><br />
					<label for="sorbentbuyyearly">Yearly</label><input type="radio" class="radio" name="esa_sorbentbuy" id="sorbentbuyyearly" value="yearly" /><br />
					<label for="sorbentbuyasneeded">As Needed</label><input type="radio" class="radio" name="esa_sorbentbuy" id="sorbentbuyasneeded" value="asneeded" /><br />
					
					<p>Where are you currently using absorbents?</p>
					<label for="sorbentlocationindoor">Indoor</label><input type="checkbox" class="check" name="esa_sorbentlocationindoor" id="sorbentlocationindoor" /><br />
					<label for="sorbentlocationoutdoor">Outdoor</label><input type="checkbox" class="check" name="esa_sorbentlocationoutdoor" id="sorbentlocationoutdoor" /><br />
					<label for="sorbentlocationboth">Both</label><input type="checkbox" class="check" name="esa_sorbentlocationboth" id="sorbentlocationboth" /><br />
					
					<p>How often do you change or replace absorbents?</p>
					<label for="sorbentchangedaily">Daily</label><input type="checkbox" class="check" name="esa_sorbentchangedaily" id="sorbentchangedaily" /><br />
					<label for="sorbentchangeweekly">Weekly</label><input type="checkbox" class="check" name="esa_sorbentchangeweekly" id="sorbentchangeweekly" /><br />
					<label for="sorbentchangemonthly">Monthly</label><input type="checkbox" class="check" name="esa_sorbentchangemonthly" id="sorbentchangemonthly" /><br />
					<label for="sorbentchangedirty">When they appear dirty</label><input type="checkbox" class="check" name="esa_sorbentchangedirty" id="sorbentchangedirty" /><br />
					<label for="sorbentchangesaturated">when they are completely saturated</label><input type="checkbox" class="check" name="esa_sorbentchangesaturated" id="sorbentchangesaturated" /><br />
					<label for="sorbentchangeother">Other</label><input type="checkbox" class="check" name="esa_sorbentchangeother" id="sorbentchangeother" /><input type="textarea" class="textarea" name="esa_sorbentchangelabel" id="sorbentchangelabel" /><br />
					
					<p>What departments within your facility currently use absorbents?</p>
					<label for="departmentSafety">Safety</label><input type="checkbox" class="check" name="esa_departmentSafety" id="departmentSafety" /><br />
					<label for="departmentProduction">Production</label><input type="checkbox" class="check" name="esa_departmentProduction" id="departmentProduction" /><br />
					<label for="departmentenvironmental">Environmental</label><input type="checkbox" class="check" name="esa_departmentenvironmental" id="departmentenvironmental" /><br />
					<label for="departmentDispensing">Dispensing</label><input type="checkbox" class="check" name="esa_departmentDispensing" id="departmentDispensing" /><br />
					<label for="departmentResponse">Emergency Response</label><input type="checkbox" class="check" name="esa_departmentResponse" id="departmentResponse" /><br />
					<label for="departmentManufacturing">Manufacturing</label><input type="checkbox" class="check" name="esa_departmentManufacturing" id="departmentManufacturing" /><br />
					<label for="departmentMaintenance">Maintenance</label><input type="checkbox" class="check" name="esa_departmentMaintenance" id="departmentMaintenance" /><br />
					<label for="departmentDrumWaste">Drum/Waste</label><input type="checkbox" class="check" name="esa_departmentDrumWaste" id="departmentDrumWaste" /><br />
					<label for="departmentStorage">Storage</label><input type="checkbox" class="check" name="esa_departmentStorage" id="departmentStorage" /><br />
					<label for="departmentWasteWater">Waste Water</label><input type="checkbox" class="check" name="esa_departmentWasteWater" id="departmentWasteWater" /><br />
					<label for="departmentOther">Other</label><input type="checkbox" class="check" name="esa_departmentOther" id="departmentOther" /><input type="textarea" class="textarea" name="esa_departmentOtherlabel" id="departmentOtherlabel" /><br />
					
					
					<label for="machinerysorbent">Of the types of machinery in within your facility, which would be the most likely to benefit from the use of absorbents?</label><textarea name="esa_machinerysorbent" id="machinerysorbent" ></textarea><br />
				</div>
				<a href="#" id="gotowiperragssection">Next Section</a>
			</div>
			
			<h1>Wipers/Rags<a href="#" id="minimizewipersrags">+</a></h1>
			<div id="wiperragssection">
			<p>Are you using any of the following?</p>
			<label for="wiperdispcloth">Disposable Cloth Rags</label><input type="checkbox" class="check" name="esa_wiperdispcloth" id="wiperdispcloth" /><br />
			<label for="wiperdisposable">Disposable Wipers</label><input type="checkbox" class="check" name="esa_wiperdisposable" id="wiperdisposable" /><br />
			<label for="wiperlaunderedrag">Laundered Cloth Rags</label><input type="checkbox" class="check" name="esa_wiperlaunderedrag" id="wiperlaunderedrag" /><br />
			<label for="wipershoptowel">Shop Towels</label><input type="checkbox" class="check" name="esa_wipershoptowel" id="wipershoptowel" /><br />
			<label for="wiperpapertowel">Paper Towels</label><input type="checkbox" class="check" name="esa_wiperpapertowel" id="wiperpapertowel" /><br />
			
			<div id="wipersareinuse">
			
				<label for="wiperpurchasing">Who are you purchasing these products from?</label><textarea name="esa_wiperpurchasing" id="wiperpurchasing" ></textarea><br />
				<label for="wiperbrands">What brands are you purchasing?</label><textarea name="esa_wiperbrands" id="wiperbrands" ></textarea><br />
				
				<p>Approximately how much does your company spend each year on wipers?</p>
				<label for="wiperbuyzero">$0 - $2,500</label><input type="radio" class="radio" name="esa_wiperbuy" id="wiperbuyzero" value="zero" /><br />
				<label for="wiperbuy2k">$2,501 - $5,000</label><input type="radio" class="radio" name="esa_wiperbuy" id="wiperbuy2k" value="2k" /><br />
				<label for="wiperbuy5k">$5,001 - $10,000</label><input type="radio" class="radio" name="esa_wiperbuy" id="wiperbuy5k" value="5k" /><br />
				<label for="wiperbuy10k">$10,001 - $15,000</label><input type="radio" class="radio" name="esa_wiperbuy" id="wiperbuy10k" value="10k" /><br />
				<label for="wiperbuy15k">$15,001 +</label><input type="radio" class="radio" name="esa_wiperbuy" id="wiperbuy15k" value="15k" /><br />
				
				<label for="wiperestusage">What is your estimated usage on wiper products, including rags and towels, per month?</label><textarea name="esa_wiperestusage" id="wiperestusage" ></textarea><br />
				
				<label for="wiperapplications">In what applications are you using wipers/rags?</label><textarea name="esa_wiperapplications" id="wiperapplications" ></textarea><br />
			</div>
			<a href="#" id="gotoloosesection">Next Section</a>
			</div>
			
			<h1>Loose Absorbents <em>(including clay)</em><a href="#" id="minimizeloose">+</a></h1>
			<div id="loosesection">
			<p>Do you use loose absorbents within your facility?</p>
			<label for="looseuseno">No</label><input type="radio" class="radio" name="esa_looseuse" id="looseuseno" value="no" /><br />
			<label for="looseuseyes">Yes</label><input type="radio" class="radio" name="esa_looseuse" id="looseuseyes" value="yes" /><br />
			
			<div id="granularisinuse">
				<label for="loosepurchasingfrom">Who are you purchasing these products from?</label><textarea name="esa_loosepurchasingfrom" id="loosepurchasingfrom" ></textarea><br />
				<label for="loosebrands">What brands are you purchasing?</label><textarea name="esa_loosebrands" id="loosebrands" ></textarea><br />
				
				<p>Approximately how much does your company spend each year on loose absorbents?</p>
				<label for="loosebuyzero">$0 - $2,500</label><input type="radio" class="radio" name="esa_loosebuy" id="loosebuyzero" value="zero" /><br />
				<label for="loosebuy2k">$2,501 - $5,000</label><input type="radio" class="radio" name="esa_loosebuy" id="loosebuy2k" value="2k" /><br />
				<label for="loosebuy5k">$5,001 - $10,000</label><input type="radio" class="radio" name="esa_loosebuy" id="loosebuy5k" value="5k" /><br />
				<label for="loosebuy10k">$10,001 - $15,000</label><input type="radio" class="radio" name="esa_loosebuy" id="loosebuy10k" value="10k" /><br />
				<label for="loosebuy15k">$15,001 +</label><input type="radio" class="radio" name="esa_loosebuy" id="loosebuy15k" value="15k" /><br />
	
				<label for="looseestimateduse">What is your estimated usage on loose absorbents per month?</label><input type="textarea" class="textarea" name="esa_looseestimateduse" id="looseestimateduse" /><select name="esa_looseestimateduseselect" id="looseestimateduseselect"><option value="Bags">Bags</option><option value="Pallets">Pallets</option></select><br />
				
				<label for="looseapplications">In what applications are you using loose absorbents?</label><textarea name="esa_looseapplications" id="looseapplications" ></textarea><br />
			</div>			
<a href="#" id="gotospillresponsesection">Next Section</a>
			</div>

			<h1>Spill Response<a href="#" id="minimizespillresponse">+</a></h1>
			<div id="spillresponsesection">
			<p>Do you currently use any of the following for spill response?</p>
			<label for="responsespillkits">Spill Kits</label><input type="checkbox" class="check" name="esa_responsespillkits" id="responsespillkits" /><br />
			<label for="responseloose">Loose Absorbents</label><input type="checkbox" class="check" name="esa_responseloose" id="responseloose" /><br />
			<label for="responsetrailers">Trailers</label><input type="checkbox" class="check" name="esa_responsetrailers" id="responsetrailers" /><br />
			<label for="responsevacuum">Vacuum</label><input type="checkbox" class="check" name="esa_responsevacuum" id="responsevacuum" /><br />
			<label for="responseother">Other</label><input type="checkbox" class="check" name="esa_responseother" id="responseother" /><input type="textarea" class="textarea" name="esa_responseotherlabel" id="responseotherlabel" /><br />
			
			<div id="spillkitsareinuse">
				<label for="responsepurchasing">Who are you purchasing these products from?</label><textarea name="esa_responsepurchasing" id="responsepurchasing" ></textarea><br />
				<label for="responsebrands">What brands are you purchasing?</label><textarea name="esa_responsebrands" id="responsebrands" ></textarea><br />
				
				<p>Approximately how much does your company spend each year on spill response?</p>
				<label for="responsebuyzero">$0 - $2,500</label><input type="radio" class="radio" name="esa_responsebuy" id="responsebuyzero" value="zero" /><br />
				<label for="responsebuy2k">$2,501 - $5,000</label><input type="radio" class="radio" name="esa_responsebuy" id="responsebuy2k" value="2k" /><br />
				<label for="responsebuy5k">$5,001 - $10,000</label><input type="radio" class="radio" name="esa_responsebuy" id="responsebuy5k" value="5k" /><br />
				<label for="responsebuy10k">$10,001 - $15,000</label><input type="radio" class="radio" name="esa_responsebuy" id="responsebuy10k" value="10k" /><br />
				<label for="responsebuy15k">$15,001 +</label><input type="radio" class="radio" name="esa_responsebuy" id="responsebuy15k" value="15k" /><br />
				
				<label for="responsetotalspillkits">How many spill kits are currently maintained at your facility? </label><input type="textarea" class="textarea" name="esa_responsetotalspillkits" id="responsetotalspillkits" /><br />
				
				<p>Are they:</p>
				<label for="responsespillittypeIndoor">Indoor</label><input type="radio" class="radio" name="esa_responsespillittype" id="responsespillittypeIndoor" value="Indoor" /><br />
				<label for="responsespillittypeOutdoor">Outdoor</label><input type="radio" class="radio" name="esa_responsespillittype" id="responsespillittypeOutdoor" value="Outdoor" /><br />
				<label for="responsespillittypeBoth">Both</label><input type="radio" class="radio" name="esa_responsespillittype" id="responsespillittypeBoth" value="Both" /><br />
				<label for="responsespillittypeNeither">Neither</label><input type="radio" class="radio" name="esa_responsespillittype" id="responsespillittypeNeither" value="Neither" /><br />
			</div>
			<p>Please select any items of concern regarding spills within your facility:</p>
			<label for="responsefacilityconcernwaterway">Waterways</label><input type="checkbox" class="check" name="esa_responsefacilityconcernwaterway" id="responsefacilityconcernwaterway" /><br />
			<label for="responsefacilityconcernstormdrain">Storm Drains</label><input type="checkbox" class="check" name="esa_responsefacilityconcernstormdrain" id="responsefacilityconcernstormdrain" /><br />
			<label for="responsefacilityconcernfueling">Fueling Stations</label><input type="checkbox" class="check" name="esa_responsefacilityconcernfueling" id="responsefacilityconcernfueling" /><br />
			<label for="responsefacilityconcernrailside">Rail side</label><input type="checkbox" class="check" name="esa_responsefacilityconcernrailside" id="responsefacilityconcernrailside" /><br />
			<label for="responsefacilityconcerninternaldrain">Internal Drain Systems</label><input type="checkbox" class="check" name="esa_responsefacilityconcerninternaldrain" id="responsefacilityconcerninternaldrain" /><br />
			<label for="responsefacilityconcerninternalspill">Other Internal Spills</label><input type="checkbox" class="check" name="esa_responsefacilityconcerninternalspill" id="responsefacilityconcerninternalspill" /><br />
			<label for="responsefacilityconcernpublicdrain">Public Drainage Systems</label><input type="checkbox" class="check" name="esa_responsefacilityconcernpublicdrain" id="responsefacilityconcernpublicdrain" /><br />
			<label for="responsefacilityconcernother">Other</label><input type="checkbox" class="check" name="esa_responsefacilityconcernother" id="responsefacilityconcernother" /><input type="textarea" class="textarea" name="esa_responsefacilityconcernotherlabel" id="responsefacilityconcernotherlabel" /><br />
			
			<label for="responseworstcase">What is your worst case scenario spill? (Please list volumes of each liquid where possible)</label><textarea name="esa_responseworstcase" id="responseworstcase" ></textarea><br />
			<label for="responsecomments">Additional Comments:</label><textarea name="esa_responsecomments" id="responsecomments" ></textarea><br />
			<a href="#" id="gotostoragesection">Next Section</a>
			</div>
		
			<h1>Storage, Handling and Disposal<a href="#" id="minimizestorage">+</a></h1>
			<div id="storagesection">
			<p>Let's talk about storage  first, then we will move on to Disposal...</p>
			
			<h2>Storage & Handling</h2>
			<p>Do you currently have storage and disposal products?</p>
			<label for="storagehaveNo">No</label><input type="radio" class="radio" name="esa_storagehave" id="storagehaveNo" value="No" /><br />
			<label for="storagehaveYes">Yes</label><input type="radio" class="radio" name="esa_storagehave" id="storagehaveYes" value="Yes" /><br />
			
			
			<div id="storageproductsareinuse">
				<label for="storagepurchasing">Who are you purchasing these products from?</label><textarea name="esa_storagepurchasing" id="storagepurchasing" ></textarea><br />
				<label for="storagebrands">What brands are you purchasing?</label><textarea name="esa_storagebrands" id="storagebrands" ></textarea><br />
				
				<p>Approximately how much does your company spend on storage, handling and disposal per year?</p>
				<label for="storagebuyzero">$0 - $2,500</label><input type="radio" class="radio" name="esa_storagebuy" id="storagebuyzero" value="zero" /><br />
				<label for="storagebuy2k">$2,501 - $5,000</label><input type="radio" class="radio" name="esa_storagebuy" id="storagebuy2k" value="2k" /><br />
				<label for="storagebuy5k">$5,001 - $10,000</label><input type="radio" class="radio" name="esa_storagebuy" id="storagebuy5k" value="5k" /><br />
				<label for="storagebuy10k">$10,001 - $15,000</label><input type="radio" class="radio" name="esa_storagebuy" id="storagebuy10k" value="10k" /><br />
				<label for="storagebuy15k">$15,001 +</label><input type="radio" class="radio" name="esa_storagebuy" id="storagebuy15k" value="15k" /><br />
				
				<label for="storageneeds">What are your current storage needs?</label><textarea name="esa_storageneeds" id="storageneeds" ></textarea><br />
			</div>
			<p>Is your facility considered to be any of the following?</p>
			<label for="storagelargegenerator">Large Quantity Generator</label><input type="checkbox" class="check" name="esa_storagelargegenerator" id="storagelargegenerator" /><br />
			<label for="storagesmallgenerator">Small Quantity Generator</label><input type="checkbox" class="check" name="esa_storagesmallgenerator" id="storagesmallgenerator" /><br />
			<label for="storagedisposalfacility">Treatment Storage Disposal Facility</label><input type="checkbox" class="check" name="esa_storagedisposalfacility" id="storagedisposalfacility" /><br />
			
			<p>For each of the following, please indicate your current usage</p>
			Waste Reduction<input type="checkbox" class="check" name="esa_storagewasteuse" id="storagewasteuse" /><label for="storagewasteuse">Use</label><input type="checkbox" class="check" name="esa_storagewasteneed" id="storagewasteneed" /><label for="storagewasteneed">Need</label><input type="checkbox" class="check" name="esa_storagewastenoneed" id="storagewastenoneed" /><label for="storagewastenoneed">No Need</label><label for="storagewasteannualexpense">Annual Expense $</label><input type="textarea" class="textarea" name="esa_storagewasteannualexpense" id="storagewasteannualexpense" /><br />
			Funnels<input type="checkbox" class="check" name="esa_storagefunnelsuse" id="storagefunnelsuse" /><label for="storagefunnelsuse">Use</label><input type="checkbox" class="check" name="esa_storagefunnelsneed" id="storagefunnelsneed" /><label for="storagefunnelsneed">Need</label><input type="checkbox" class="check" name="esa_storagefunnelsnoneed" id="storagefunnelsnoneed" /><label for="storagefunnelsnoneed">No Need</label><label for="storagefunnelsannualexpense">Annual Expense $</label><input type="textarea" class="textarea" name="esa_storagefunnelsannualexpense" id="storagefunnelsannualexpense" /><br />
			Drums<input type="checkbox" class="check" name="esa_storagedrumuse" id="storagedrumuse" /><label for="storagedrumuse">Use</label><input type="checkbox" class="check" name="esa_storagedrumneed" id="storagedrumneed" /><label for="storagedrumneed">Need</label><input type="checkbox" class="check" name="esa_storagedrumnoneed" id="storagedrumnoneed" /><label for="storagedrumnoneed">No Need</label><label for="storagedrumannualexpense">Annual Expense $</label><input type="textarea" class="textarea" name="esa_storagedrumannualexpense" id="storagedrumannualexpense" /><br />
			Pumps<input type="checkbox" class="check" name="esa_storagepumpsuse" id="storagepumpsuse" /><label for="storagepumpsuse">Use</label><input type="checkbox" class="check" name="esa_storagepumpsneed" id="storagepumpsneed" /><label for="storagepumpsneed">Need</label><input type="checkbox" class="check" name="esa_storagepumpsnoneed" id="storagepumpsnoneed" /><label for="storagepumpsnoneed">No Need</label><label for="storagepumpsannualexpense">Annual Expense $</label><input type="textarea" class="textarea" name="esa_storagepumpsannualexpense" id="storagepumpsannualexpense" /><br />
			Spill Decks<input type="checkbox" class="check" name="esa_storagedecksuse" id="storagedecksuse" /><label for="storagedecksuse">Use</label><input type="checkbox" class="check" name="esa_storagedecksneed" id="storagedecksneed" /><label for="storagedecksneed">Need</label><input type="checkbox" class="check" name="esa_storagedecksnoneed" id="storagedecksnoneed" /><label for="storagedecksnoneed">No Need</label><label for="storagedecksannualexpense">Annual Expense $</label><input type="textarea" class="textarea" name="esa_storagedecksannualexpense" id="storagedecksannualexpense" /><br />
			Spill Pallets<input type="checkbox" class="check" name="esa_storagepalletuse" id="storagepalletuse" /><label for="storagepalletuse">Use</label><input type="checkbox" class="check" name="esa_storagepalletneed" id="storagepalletneed" /><label for="storagepalletneed">Need</label><input type="checkbox" class="check" name="esa_storagepalletnoneed" id="storagepalletnoneed" /><label for="storagepalletnoneed">No Need</label><label for="storagepalletannualexpense">Annual Expense $</label><input type="textarea" class="textarea" name="esa_storagepalletannualexpense" id="storagepalletannualexpense" /><br />
			
			<p>Please select the containers that your facility uses and list their volume capacity</p>
			<label for="storagebottles">Bottles</label><input type="checkbox" class="check" name="esa_storagebottles" id="storagebottles" /><label for="storagebottleslabel">Volume</label><input type="textarea" class="textarea" name="esa_storagebottleslabel" id="storagebottleslabel" /><br />
			<label for="storagepails">Pails</label><input type="checkbox" class="check" name="esa_storagepails" id="storagepails" /><label for="storagepailslabel">Volume</label><input type="textarea" class="textarea" name="esa_storagepailslabel" id="storagepailslabel" /><br />
			<label for="storagedrums">Drums</label><input type="checkbox" class="check" name="esa_storagedrums" id="storagedrums" /><label for="storagedrumslabel">Volume</label><input type="textarea" class="textarea" name="esa_storagedrumslabel" id="storagedrumslabel" /><br />
			<label for="storageibc">IBC Totes</label><input type="checkbox" class="check" name="esa_storageibc" id="storageibc" /><label for="storageibclabel">Volume</label><input type="textarea" class="textarea" name="esa_storageibclabel" id="storageibclabel" /><br />
				
			<h2>Disposal</h2>
			<p>What is the preferred method of waste disposal at your company?</p>
			<label for="disposallandfilling">Land filling</label><input type="checkbox" class="check" name="esa_disposallandfilling" id="disposallandfilling" /><br />
			<label for="disposalincineration">Incineration</label><input type="checkbox" class="check" name="esa_disposalincineration" id="disposalincineration" /><br />
			<label for="disposalblending">Fuels Blending</label><input type="checkbox" class="check" name="esa_disposalblending" id="disposalblending" /><br />
			<label for="disposalother">Other</label><input type="checkbox" class="check" name="esa_disposalother" id="disposalother" /><input type="textarea" class="textarea" name="esa_disposalotherlabel" id="disposalotherlabel" /><br />
			
			<p>How do you package absorbent waste for disposal?</p>
			<label for="disposalpackagedrum">Drums</label><input type="checkbox" class="check" name="esa_disposalpackagedrum" id="disposalpackagedrum" /><br />
			<label for="disposalpackagedumpster">Dumpster</label><input type="checkbox" class="check" name="esa_disposalpackagedumpster" id="disposalpackagedumpster" /><br />
			<label for="disposalpackageother">Other</label><input type="checkbox" class="check" name="esa_disposalpackageother" id="disposalpackageother" /><input type="textarea" class="textarea" name="esa_disposalpackageotherlabel" id="disposalpackageotherlabel" /><br />
			
			<p>Do you use a contractor?</p>
			<label for="disposalusecontractorno">No</label><input type="radio" class="radio" name="esa_disposalusecontractor" id="disposalusecontractorno" value="no" /><br />
			<label for="disposalusecontractoryes">Yes - If yes, please provide the name of the contracting company:</label><input type="radio" class="radio" name="esa_disposalusecontractor" id="disposalusecontractoryes" value="yes" /><input type="textarea" class="textarea" name="esa_disposalusecontractoryeslabel" id="disposalusecontractoryeslabel" /><br />
			
			<p>How many drums per week are being disposed of for the following?</p>
			<label for="disposalnonhazweekly">Non-hazardous Content - # of drums per month:</label><input type="textarea" class="textarea" name="esa_disposalnonhazweekly" id="disposalnonhazweekly" /><label for="disposalnonhazweeklycost">Cost per drum: $ </label><input type="textarea" class="textarea" name="esa_disposalnonhazweeklycost" id="disposalnonhazweeklycost" /><br />
			<label for="disposalhazweekly">Hazardous Content- # of drums per month:</label><input type="textarea" class="textarea" name="esa_disposalhazweekly" id="disposalhazweekly" /><label for="disposalhazweeklycost">Cost per drum: $ </label><input type="textarea" class="textarea" name="esa_disposalhazweeklycost" id="disposalhazweeklycost" /><br />
			<label for="disposalrolloffcost">What is your dumpster/roll off cost? $</label><input type="textarea" class="textarea" name="esa_disposalrolloffcost" id="disposalrolloffcost" /><br />
			<a href="#" id="gotoregulationssection">Next Section</a>
			</div>
			<h1>Regulations<a href="#" id="minimizeregulations">+</a></h1>
			<div id="regulationssection">
			<p>Do you have any concerns regarding the regulations surrounding the proper use of absorbents with regards to shipping and handling or worker safety?</p>
			<label for="regulationconcernno">No</label><input type="radio" class="radio" name="esa_regulationconcern" id="regulationconcernno" value="no" /><br />
			<label for="regulationconcernyes">Yes - If yes, which regulations concern you?</label><input type="radio" class="radio" name="esa_regulationconcern" id="regulationconcernyes" value="yes" /><textarea name="esa_regulationconcernyeslabel" id="regulationconcernyeslabel" ></textarea><br />
			
			<label for="regulationconcernlocal">Please list any regulations, specific to your region, regarding disposal that are of concern to your company.</label><textarea name="esa_regulationconcernlocal" id="regulationconcernlocal" ></textarea><br />
			
			<p>Thank you again for taking time out of your busy schedule to fill out this assessment. We will use the information you have provided to save your company money and provide you with the best absorbent products on the market.</p>
			
			</div>
			<p> Please enter your own email address. Due to a memory limitation, you will need to forward this email after. Upgrades to allow multiple emails are in progress.</p>
			<label for="emailaddress1">Email Address</label><input type="textarea" class="textarea" name="esa_email1" id="emailaddress1" /></label><br />
			
			<input type="submit" class="send" />
		</form>
<?php

}

add_shortcode('ESA_form', 'ESA_load_page');