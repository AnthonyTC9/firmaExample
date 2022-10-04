console.log('Version: 0.0.6');

function copySafari(el) 
{
    // Copy textarea, pre, div, etc.
	if (document.body.createTextRange) {
        // IE 
        var textRange = document.body.createTextRange();
        textRange.moveToElementText(el);
        textRange.select();
        textRange.execCommand("Copy");   
		tooltip(el, "Copied!");  
    }
	else if (window.getSelection && document.createRange) {
        // non-IE
        var editable = el.contentEditable; // Record contentEditable status of element
        var readOnly = el.readOnly; // Record readOnly status of element
       	el.contentEditable = true; // iOS will only select text on non-form elements if contentEditable = true;
       	el.readOnly = true; // iOS will not select in a read only form element // Version 1.2c - Changed from false to true; Prevents keyboard from appearing when copying from textarea
        var range = document.createRange();
        range.selectNodeContents(el);
        var sel = window.getSelection();
        sel.removeAllRanges();
        sel.addRange(range); // Does not work for Firefox if a textarea or input
        if (el.nodeName == "TEXTAREA" || el.nodeName == "INPUT") 
        	el.select(); // Firefox will only select a form element with select()
        //if (el.setSelectionRange && navigator.userAgent.match(/ipad|ipod|iphone/i)) // Version 1.2c - iOS 12 might be defaulting to desktop mode so removed
        if (el.setSelectionRange) // Version 1.2c - iOS 12 might be defaulting to desktop mode and no longer has iphone in user agent
        	el.setSelectionRange(0, 999999); // iOS only selects "form" elements with SelectionRange
        el.contentEditable = editable; // Restore previous contentEditable status
        el.readOnly = readOnly; // Restore previous readOnly status 
	    if (document.queryCommandSupported("copy")) {
			var successful = document.execCommand('copy');  
		    if (!successful) alert("Press CTRL+C to copy");
		} else {
			if (!navigator.userAgent.match(/ipad|ipod|iphone|android|silk/i))
				tooltip(el, "Press CTRL+C to copy");	
		}
    }
}

function copyHTML(element_id){
	var sBrowser, sUsrAg = navigator.userAgent;
	if (sUsrAg.indexOf("Safari") > -1) {
		copySafari(document.getElementById(element_id));

		window.location.reload();
		return;
	}
	var aux = document.createElement("div");
	aux.setAttribute("contentEditable", true);
	aux.innerHTML = document.getElementById(element_id).innerHTML;
	aux.setAttribute("onfocus", "document.execCommand('selectAll',false,null)");
	document.body.appendChild(aux);
	aux.focus();
	aux.contentEditable = true;
	document.execCommand("copy");
	document.body.removeChild(aux);
	document.getElementById(element_id).scrollIntoView();
	var sBrowser, sUsrAg = navigator.userAgent;
	if (sUsrAg.indexOf("Firefox") > -1) {
		window.location.reload();
	}
	//window.location.href = window.location.href + '#' + element_id;
}