var host = location.protocol+"//"+location.hostname+"/elogistic";
$(document).ready(function(){
	  $("#mbl_vessel").change(function(){
	  		var value = this.value;
	  		var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			       // Typical action to be performed when the document is ready:
			       document.getElementById("voyage_select").innerHTML = xhttp.responseText;
			    }else{
			    	document.getElementById("voyage_select").innerHTML = "<option>...</option>";
			    }
			};
			xhttp.open("GET", host+"/mbl/masterBL/response/getvoyage/"+value, true);
			xhttp.send();
	  });

	  $("#voyage_select").change(function(){
	  		var value = this.value;
	  		var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			    	if(xhttp.responseText != ''){
			    		var data = JSON.parse(xhttp.responseText);
				        document.getElementById("mbl_arrival_date").value = data.arrival_date;
				        document.getElementById("mbl_sailing_date").value = data.sailing_date;
				        document.getElementById("mbl_igm").value = data.igm_no;
				        document.getElementById("mbl_ground_date").value = data.ground_date;
				    }else{
				    	
				    }
			    }
			};
			xhttp.open("GET", host+"/mbl/masterBL/response/getvoyagedetail/"+value, true);
			xhttp.send();
	  });
});
