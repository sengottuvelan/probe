// JavaScript Document
//JUMP MENU MODIFIED
function MM_jumpMenu_2(targ,selObj,restore){ //v3.0
  if(selObj.selectedIndex != 0){
  	eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  	if (restore) selObj.selectedIndex=0;
  }
}
//CONFIRM DELETE 
function confirmDeleteLink(str, url){
	if(confirm(str)){		
		window.location = url;
	}	
}
//NUMBERS ONLY
function numbersonly(myfield, e, dec)
{
	var key;
	var keychar;
	
	if (window.event)
	   key = window.event.keyCode;
	else if (e)
	   key = e.which;
	else
	   return true;
	keychar = String.fromCharCode(key);

	// control keys
	if ((key==null) || (key==0) || (key==8) || (key==9) || (key==13) || (key==27) ){
	   return true;
	}
	// numbers
	else {	
		if ((("0123456789").indexOf(keychar) > -1)){
		   
			return true;
		  
		} 
		else {
			 
			// decimal point jump
			if (dec && (keychar == "."))	{				
				myfield.form.elements[dec].focus();
				return false;
			} else {
				return false;
			}
		}
	}
}


function isEmailValid(st) {
	var error = false;
	var at = st.indexOf("@");
	var dot = st.indexOf(".", at);
	var invStringPresent = false;
	var invalidString = ['!', '#', '$', '%', '^', '&', '*', '+', '/', "\\", '(', ')', '[', ']', '{', '}', ';', ':', "'", '\"', '<', '>', ',', '?', '~', '`', ' ', '=', '|'];
	//check for invalid strings
	for (i=0; i<invalidString.length; i++) {
		if (st.indexOf(invalidString[i])>=0) {
			invStringPresent = true;
			//trace("Invalid String "+invalidString[i]+" present");
		}
	}
	//trace("AT = "+at+" , DOT = "+dot);
	switch (true) {
	case invStringPresent :
		// for Invalid Strings
	case (at<0) :
		// 'at' presence
	case (at == 0) :
		// 'at' NOT at the beginning
	case (st.indexOf("@", at+1)>=0) :
		// only one 'at'		
	case (dot<0) :
		// 'dot' presence
	case (dot<at) :
		// 'dot' after at
	case (st.lastIndexOf(".") == st.length-1) :
		// 'dot' not in the last
	case ((dot-at) == 1) :
		// NO 'dot' immediately after 'at'
		error = true;
	}
	//trace("ERROR = "+error);
	return (!error);
}
function isEmpty(st) {
	if (trimString(st) == "") {
		return true;
	} else {
		return false;
	}
	
}
function lTrim(st) {
	var l_trimIndex = st.length;
	for (var i = 0; i<st.length; i++) {
		if (st.charCodeAt(i) != 32) {
			l_trimIndex = i;
			break;
		}
	}
	return st.substring(l_trimIndex);
}
function rTrim(st) {
	var r_trimIndex = 0;
	for (var i = st.length-1; i>=0; i--) {
		if (st.charCodeAt(i) != 32) {
			r_trimIndex = i+1;
			break;
		}
	}
	return st.substring(0, r_trimIndex);
}
function trimString(st) {
	return lTrim(rTrim(st));
}

