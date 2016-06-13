function soloLetras(e){
	if (event.keyCode >45 && event.keyCode  <57) event.returnValue = false;
}
function soloNumeros(e){
	var keynum = window.event ? window.event.keyCode : e.which;
       if ((keynum == 8) || (keynum == 46))
            return true;
        return /\d/.test(String.fromCharCode(keynum));
}
