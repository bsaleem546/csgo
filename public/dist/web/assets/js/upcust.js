function Circlle(el){
	$(el).circleProgress({fill: {color: '#f17600'}})
	  .on('circle-animation-progress', function(event, progress, stepValue){
	  $(this).find('strong').text(String(stepValue.toFixed(2)).substr(2)+'%');
	  });  
  }

  var host = "http://localhost:81/csgo";


  $(document).ready(function() {

	  let invItemcount = 0;
	  let invItemid = [];
	  let invItemPrice = 0;
	  
	  $(document).delegate(".invItem", "click", function(){
		  let id = $(this).attr("data-id");
		  $(this).remove();
			invItemid.push(id);
			if(invItemcount == 0){
			  var xhttp = new XMLHttpRequest();
			  xhttp.onreadystatechange = function() {
				  if (this.readyState == 4 && this.status == 200) {
					  var res = this.responseText;
					  var re = res.split("|");
					  document.getElementById("ipskinbox").innerHTML = re[0];
					  document.getElementById("ipskinlabel").innerHTML = re[1]+" | "+re[2];
					  document.getElementById("ipskinprice").innerHTML = re[3];
					  document.getElementById("inid").value = re[4];

					  let itprsp = re[3].split(' $');
					  let itpr = parseFloat(itprsp[0]);
					  invItemPrice = invItemPrice+itpr;

					  var type = $('#uptype').val();
					  var xhttpskin = new XMLHttpRequest();
					  xhttpskin.onreadystatechange = function() {
						  if (this.readyState == 4 && this.status == 200) {
							  document.getElementById("upskinsection").innerHTML = this.responseText;
						  }else{
							  document.getElementById("upskinsection").innerHTML = '<div class="blnk-contnt"><div class="blnk-gun-box"><img style="width:40%;" class="img-fluid" src="'+host+'/dist/web/assets/images/batle-loader.gif"></div></div><div class="colum-box blnk-box"><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div></div>';
						  }
					  };
					  xhttpskin.open("GET", host+"upgrade/skin/select/"+invItemPrice+"/"+type, true);
					  xhttpskin.send();
					  
				  }else{
					  document.getElementById("ipskinbox").innerHTML = '<img style="height:70px;" src="'+host+'/dist/web/assets/images/batle-loader.gif">';
					  document.getElementById("ipskinlabel").innerHTML = "...";
					  document.getElementById("ipskinprice").innerHTML = "..";

				  }
			  };
			  xhttp.open("GET", host+"upgrade/inventory/select/"+id, true);
			  xhttp.send();

			  invItemcount++;
		  }else{

			  document.getElementById("upskinbox").innerHTML = '<img class="img-fluid" src="'+host+'/dist/web/assets/images/upd-gun.png">';
			  document.getElementById("upskinlabel").innerHTML = 'Upgrade item';
			  document.getElementById("upskinprice").innerHTML = '0 $';
			  document.getElementById("unid").value = null;

			  var xhttp = new XMLHttpRequest();
			  xhttp.onreadystatechange = function() {
				  if (this.readyState == 4 && this.status == 200) {
					  var res = this.responseText;
					  var re = res.split("|");

					  let itprsp = re[3].split(' $');
					  let itpr = parseFloat(itprsp[0]);
					  invItemPrice = invItemPrice+itpr;

					  document.getElementById("ipskinbox").innerHTML += re[0]+'--';
					  document.getElementById("ipskinlabel").innerHTML = invItemcount+ ' Item Selected.';
					  document.getElementById("ipskinprice").innerHTML = invItemPrice.toFixed(2)+' $';
					  document.getElementById("inid").value = re[4];		                    
					  console.log(re[0]);
					  var type = $('#uptype').val();
					  var xhttpskin = new XMLHttpRequest();
					  xhttpskin.onreadystatechange = function() {
						  if (this.readyState == 4 && this.status == 200) {
							  document.getElementById("upskinsection").innerHTML = this.responseText;
						  }else{
							  document.getElementById("upskinsection").innerHTML = '<div class="blnk-contnt"><div class="blnk-gun-box"><img style="width:40%;" class="img-fluid" src="'+host+'/dist/web/assets/images/batle-loader.gif"></div></div><div class="colum-box blnk-box"><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div></div>';
						  }
					  };
					  xhttpskin.open("GET", host+"upgrade/skin/select/"+invItemPrice+"/"+type, true);
					  xhttpskin.send();
					  
				  }
			  };
			  xhttp.open("GET", host+"upgrade/inventory/select/"+id, true);
			  xhttp.send();
			  invItemcount++;
		  }
	  });


	   $(".btnx-shp-link a").click(function(){
		   var target = $(this).attr("data-target");
		   var type = $(this).attr("data-type");
		   $('#uptype').val(type);
		  var id = $('#inid').val();
		   btnStatus(target);
		  var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
			  if (this.readyState == 4 && this.status == 200) {
				  document.getElementById("upskinsection").innerHTML = this.responseText;
			  }else{
				  document.getElementById("upskinsection").innerHTML = '<div class="blnk-contnt"><div class="blnk-gun-box"><img style="width:40%;" class="img-fluid" src="'+host+'/dist/web/assets/images/batle-loader.gif"></div></div><div class="colum-box blnk-box"><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div></div>';
			  }
		  };
		  xhttp.open("GET", host+"upgrade/skin/select/"+invItemPrice+"/"+type, true);
		  xhttp.send();
	  });

	  $(".upd-main").delegate(".removeStack", "click", function(){
		   var price = $(this).attr("data-price");
		   var id = $(this).attr("data-id");
		   var sk = $(this).attr("data-sk");
		   var ski = $(this).attr("data-ski");
		   var label = $(this).attr("data-label");
		   var label2 = $(this).attr("data-label2");
		   invItemPrice = invItemPrice - parseFloat(price);
		   invItemcount--;

		   removeItemOnce(invItemid, id);
		  document.getElementById("ipskinlabel").innerHTML = invItemcount+ ' Item Selected.';
		  document.getElementById("ipskinprice").innerHTML = invItemPrice.toFixed(2)+' $';
		  $(this).remove();
		  var last = $('#invRetainItem').html();
		  $('#invRetainItem').html('<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-6 bs_upd invItem" data-id="'+ski+'"><div class="boxex-inner bg-yellow"><div class="boxex-skin-img"><img class="img-fluid" src="'+host+'dist/web/assets/images/skins/'+sk+'"></div><div class="boxex-dec"><h6>'+label+'</h6><span>'+label2+'</span><p>'+price+' $</p></div></div></div>'+last);
	  });

	  $("#uppricefil").keyup(function(){
		  var val = $(this).val();
		  var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
			  if (this.readyState == 4 && this.status == 200) {
				  document.getElementById("upskinsection").innerHTML = this.responseText;
			  }else{
				  document.getElementById("upskinsection").innerHTML = '<div class="blnk-contnt"><div class="blnk-gun-box"><img style="width:40%;" class="img-fluid" src="'+host+'/dist/web/assets/images/batle-loader.gif"></div></div><div class="colum-box blnk-box"><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div><div class="boxex-size hid-bnk"></div></div>';
			  }
		  };
		  xhttp.open("GET", host+"upgrade/skin/selectfil/"+invItemPrice+"/"+val, true);
		  xhttp.send();
	  });



	  $("#btnloading").click(function(){
		  var id = $('#inid').val();
		  var id2 = $('#unid').val();
		  if(id === '' || id2 === ''){
			  alert('Please select skins first.');
		  }else{
			  document.getElementById("circleBar").innerHTML = '<img style="height: 213px;margin-left: -7px;margin-top: -2px;" src="'+host+'/dist/web/assets/images/upgrade-loader.gif">';
			  setTimeout(function(){ uw() }, 5000);
		  }
	  });


	  function btnStatus(e) {
		  $("#multi-btn-xhp1").removeClass('active');
		  $("#multi-btn-xhp12").removeClass('active');
		  $("#multi-btn-xhp2").removeClass('active');
		  $("#multi-btn-xhp5").removeClass('active');
		  
		  var element = document.getElementById(e);
			element.classList.add("active");
	  }

	  function uw(){
		  var id1 = $('#inid').val();
		  var id2 = $('#unid').val();
		  var items = invItemid.join();
		  var newStr = items.replace(/,/g, '|');	

			  var xhttp = new XMLHttpRequest();
			  xhttp.onreadystatechange = function() {
				  if (this.readyState == 4 && this.status == 200) {
					  if(this.responseText == 'win'){
						  document.getElementById("circleBar").innerHTML = '<img style="height: 213px;margin-left: -7px;margin-top: -2px;" src="'+host+'/dist/web/assets/images/upgrade-win.gif">';
					  }else{
						  document.getElementById("circleBar").innerHTML = '<img style="height: 213px;margin-left: -7px;margin-top: -2px;" src="'+host+'/dist/web/assets/images/upgrade-loss.gif">';
					  }
					  setTimeout(function(){ location.reload(); }, 3000);
				  }else{
					  
				  }
			  };
			  xhttp.open("GET", host+"upgrade/result/select/"+invItemPrice+"/"+newStr+"/"+id2, true);
			  xhttp.send();
	  }
  });
  
  $("#upskinsection").delegate(".upgItem", "click", function(){
	  var id = $(this).attr("data-id");
			
		  var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
			  if (this.readyState == 4 && this.status == 200) {
				  var res = this.responseText;
				  var re = res.split("|");
				  document.getElementById("upskinbox").innerHTML = re[0];
				  document.getElementById("upskinlabel").innerHTML = re[1]+" | "+re[2];
				  document.getElementById("upskinprice").innerHTML = re[3];
				  document.getElementById("unid").value = re[4];
				  circlePer();
				  
			  }else{
				  document.getElementById("upskinbox").innerHTML = '<img style="height:70px;" src="'+host+'/dist/web/assets/images/batle-loader.gif">';
				  document.getElementById("upskinlabel").innerHTML = "...";
				  document.getElementById("upskinprice").innerHTML = "..";

			  }
		  };
		  xhttp.open("GET", host+"upgrade/upskin/select/"+id, true);
		  xhttp.send();
  });


	  function circlePer(){
		  var iprice = $('#ipskinprice').text();
		  var uprice = $('#upskinprice').text();
		  let per = 99;
		  var ip = iprice.split(' $');
		  var up = uprice.split(' $');
		  var ip2 = parseFloat(ip[0]);
		  var up2 = parseFloat(up[0]);
		  
		  let space =  up2/ip2;
		  per = 90/space;
		  per = parseInt(per);
		  if(per < 10){
			  per = '0'+per;
		  }
		   $('#circleBar').html('<div class="round" data-value="0.'+per+'" data-size="150" data-thickness="6"><strong></strong><span>Upgrade Chance</span></div>');
		   Circlle('.round');
	  }

	  function removeItemOnce(arr, value) {
		var index = arr.indexOf(value);
		if (index > -1) {
		  arr.splice(index, 1);
		}
		return arr;
	  }
