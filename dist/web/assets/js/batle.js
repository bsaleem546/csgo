 var val = 1;
 var host = 'http://localhost:81/csgo';
 var t = document.getElementById('t').value;
/* if(t == 1){
    check_participant();
 }*/

function check_participant(){
	if(val == 1){
    	var id = document.getElementById('btl_id').value;
        var xhttp = new XMLHttpRequest();
	 	xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) { 
                if(xhttp.response != 'false'){
                    var res = xhttp.response;
                    document.getElementById('username-p2').innerHTML = res;
                    document.getElementById('bco').style.display = 'block';
                    val = 2;
                }
            }         
        };
        xhttp.open("GET", host+"/battle/check_participant/"+id, true);
        xhttp.send();
        
        setTimeout(check_participant(), 3000);
    }
}