jQuery(document).ready( function() {
	// ready to go for jquery
	var count = 1;	
	jQuery("#othersiteadd").click(function() {		
		jQuery("#othersiteszone").append('<label for="othersitescompanyname' + count + '">Company Name</label><input type="textarea" class="textarea" name="othersitescompanyname' + count + '" id="othersitescompanyname' + count + '" /><label for="othersiteslocation' + count + '">Location <em>(city, state)</em></label><input type="textarea" class="textarea" name="othersiteslocation' + count + '" id="othersiteslocation' + count + '" /><br />');
		count++;		
		return false;
	});	
	jQuery("#wetfloorsno").click(function(){
		jQuery("#workcomphiddenarea").hide();
	});
	jQuery("#wetfloorsyes").click(function(){
		jQuery("#workcomphiddenarea").show();
	});
	jQuery("#sorbentrolls, #sorbentpads, #sorbentsocks, #sorbentpillows, #sorbentbooms, #sorbentdrippans, #sorbentrugs, #sorbentother").click(function(){
	
		if(jQuery("#sorbentrolls").is(':checked') || jQuery("#sorbentpads").is(':checked') || jQuery("#sorbentsocks").is(':checked') || jQuery("#sorbentpillows").is(':checked') || jQuery("#sorbentbooms").is(':checked') || jQuery("#sorbentdrippans").is(':checked') || jQuery("#sorbentrugs").is(':checked') || jQuery("#sorbentother").is(':checked')){
			jQuery("#sorbentsareinuse").show();
		} else {
			jQuery("#sorbentsareinuse").hide();
		}	
	});	
	jQuery("#wiperdispcloth, #wiperdisposable, #wiperlaunderedrag, #wipershoptowel, #wiperpapertowel").click(function(){
	
		if(jQuery("#wiperdispcloth").is(':checked') || jQuery("#wiperdisposable").is(':checked') || jQuery("#wiperlaunderedrag").is(':checked') || jQuery("#wipershoptowel").is(':checked') || jQuery("#wiperpapertowel").is(':checked')){
			jQuery("#wipersareinuse").show();
		} else {
			jQuery("#wipersareinuse").hide();
		}	
	});	
	jQuery("#looseuseno").click(function(){
		jQuery("#granularisinuse").hide();
	});
	jQuery("#looseuseyes").click(function(){
		jQuery("#granularisinuse").show();
	});	
	jQuery("#responsespillkits, #responseloose, #responsetrailers, #responsevacuum, #responseother").click(function(){
	
		if(jQuery("#responsespillkits").is(':checked') || jQuery("#responseloose").is(':checked') || jQuery("#responsetrailers").is(':checked') || jQuery("#responsevacuum").is(':checked') || jQuery("#responseother").is(':checked')){
			jQuery("#spillkitsareinuse").show();
		} else {
			jQuery("#spillkitsareinuse").hide();
		}	
	});	
	jQuery("#storagehaveNo").click(function(){
		jQuery("#storageproductsareinuse").hide();
	});
	jQuery("#storagehaveYes").click(function(){
		jQuery("#storageproductsareinuse").show();
	});
jQuery("#sorbentsareinuse, #wipersareinuse, #granularisinuse, #spillkitsareinuse, #storageproductsareinuse").hide();


// start of sections coding. 


jQuery("#minimizegeneralinformation").click(function(){
	jQuery("#generalinformationsection").toggle();
	jQuery(this).html() == "-" ? jQuery(this).html('+') : jQuery(this).html('-');
	return false;
});

jQuery("#minimizeabsorbents").click(function(){
	jQuery("#absorbentssection").toggle();
	jQuery(this).html() == "-" ? jQuery(this).html('+') : jQuery(this).html('-');
	return false;
});

jQuery("#minimizewipersrags").click(function(){
	jQuery("#wiperragssection").toggle();
	jQuery(this).html() == "-" ? jQuery(this).html('+') : jQuery(this).html('-');
	return false;
});

jQuery("#minimizeloose").click(function(){
	jQuery("#loosesection").toggle();
	jQuery(this).html() == "-" ? jQuery(this).html('+') : jQuery(this).html('-');
	return false;
});

jQuery("#minimizespillresponse").click(function(){
	jQuery("#spillresponsesection").toggle();
	jQuery(this).html() == "-" ? jQuery(this).html('+') : jQuery(this).html('-');
	return false;
});

jQuery("#minimizestorage").click(function(){
	jQuery("#storagesection").toggle();
	jQuery(this).html() == "-" ? jQuery(this).html('+') : jQuery(this).html('-');
	return false;
});

jQuery("#minimizeregulations").click(function(){
	jQuery("#regulationssection").toggle();
	jQuery(this).html() == "-" ? jQuery(this).html('+') : jQuery(this).html('-');
	return false;
});





jQuery("#gotoabsorbentssection").click(function(){
	jQuery("#generalinformationsection").hide();
	jQuery("#absorbentssection").show();
	return false;
});

jQuery("#gotowiperragssection").click(function(){
	jQuery("#absorbentssection").hide();
	jQuery("#wiperragssection").show();
	return false;
});


jQuery("#gotoloosesection").click(function(){
	jQuery("#wiperragssection").hide();
	jQuery("#loosesection").show();
	return false;
});


jQuery("#gotospillresponsesection").click(function(){
	jQuery("#loosesection").hide();
	jQuery("#spillresponsesection").show();
	return false;
});


jQuery("#gotostoragesection").click(function(){
	jQuery("#spillresponsesection").hide();
	jQuery("#storagesection").show();
	return false;
});

jQuery("#gotoregulationssection").click(function(){
	jQuery("#storagesection").hide();
	jQuery("#regulationssection").show();
	return false;
});





jQuery("#absorbentssection, #wiperragssection, #loosesection, #spillresponsesection, #storagesection, #regulationssection").hide();
});