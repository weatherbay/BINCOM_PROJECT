function validate(form){
	fail =validatepollingid(form.polling_id.value)
	fail +=validatePartyabbrev(form.party_abbrev.value)
	fail +=validatePartyscore(form.party_score.value)
	fail +=validatePersonnelname(form.personnel_name.value)
	fail +=validateuseripaddress(form.user_ip_address.value)
	
	if(fail=="") return true
	else {alert(fail); return false}
}

function validatepollingid(field){
	if(field=="" ) return "enter polling id.\n"
	return ""
	
}

function validatePartyabbrev(field){
	if(field=="" ) return "enter party_abbrev.\n"
	else if (field.length >4)
		return "party_abbrev must be < 4 characters.\n"
	return ""
	
	
}

function validatePartyscore(field){
	if(field=="" ) return "enter party score.\n"
	return ""
	
}

function validatePersonnelname(field){
	if(field=="" ) return "enter personnel_name.\n"
	return ""
	
}

function validateuseripaddress(field){
	if(field=="" ) return "enter ip_address.\n"
	return ""
	
}





























