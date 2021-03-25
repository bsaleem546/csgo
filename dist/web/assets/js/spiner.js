
    function viewbattle(res){

      var btlid = document.getElementById('btl_id').value;
      var p1price = parseFloat('0');
      var p2price = parseFloat('0');
      var p1skin = 0;
      var p2skin = 0;
      var win = 0;
          
      var ress = res.split("#");
        let time = 0;
        var loo = ress.length-1;
        for(let i=1; i<loo; i++){
          setTimeout(function(){
            let str = ress[i].split("@");
            //player 1
            var st1 = str[0].split("|");
            generate(st1[0], item_entries[str[2]], total[str[2]], '1', '#p1container', '1');
            p1price = p1price+parseFloat(st1[1]);
            //player 2
            var st2 = str[1].split("|");
            generate(st2[0], item_entries[str[2]], total[str[2]], '1', '#p2container', '2');
            p2price = p2price+parseFloat(st2[1]);

            $('#case_round').html(i);
          }, time);
          time = time+8000;
        }
      win = ress[ress.length-1];
      setTimeout(function(){
        dicission(win,p1price,p2price, p1price+p2price,p1skin,p2skin,btlid);
      }, time);
                
    }
    
    function stbattle(div){

          var host = 'http://localhost:81/csgo';
          var btlid = document.getElementById('btl_id').value;
          $('#bco').css({
            display: "none"
          });
          
          var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) { 
                      var p1price = parseFloat('0');
                      var p2price = parseFloat('0');
                      var p1skin = 0;
                      var p2skin = 0;
                      var win = 0;
                    var res = xhttp.response; 
                    var ress = res.split("#");
                    let time = 0;
                    var loo = ress.length-1;
                    for(let i=1; i<loo; i++){
                      setTimeout(function(){
                        let str = ress[i].split("@");
                        //player 1
                        var st1 = str[0].split("|");
                        generate(st1[0], item_entries[str[2]], total[str[2]], '1', '#p1container', '1');
                        p1price = p1price+parseFloat(st1[1]);
                        //player 2
                        var st2 = str[1].split("|");
                        generate(st2[0], item_entries[str[2]], total[str[2]], '1', '#p2container', '2');
                        p2price = p2price+parseFloat(st2[1]);

                        $('#case_round').html(i);
                        console.log(str[2]);
                      }, time);
                      time = time+8000;
                    }
                  win = ress[ress.length-1];
                  setTimeout(function(){
                    dicission(win,p1price,p2price, p1price+p2price,p1skin,p2skin,btlid);
                  }, time);
                }
            };
            xhttp.open("GET", host+"/battle/start/"+btlid, true);
            xhttp.send();

    }
var audsrc = 'http://localhost:81/csgo/dist/web/assets/sound/tick.mp3';
var sksrc = 'http://localhost:81/csgo/dist/web/assets/images/skins/';
let audio = new Audio(audsrc);  // Create audio object and load desired file.
function playSound()
    {
       audio.currentTime = 0;
        // Play the sound.
        audio.play();
    }
function dicission(win,p1p, p2p, total, skin1, skin2, id){
    if(win ==1){
      $('#furlo1').css({
        display: "none"
      });
      $('#fur1').css({
        display: "none"
      });
      $('#furre1').css({
        display: "block"
      });

      $('#furre1').html('<div class="winer-div"><h2>Winner!</h2><div class="win_price"><p>'+p1p+'$</p></div><span class="total-win">Total Winning</span><h3>'+total+'$</h3></div>');
    
       $('#furlo2').css({
        display: "none"
      });
      $('#fur2').css({
        display: "none"
      });
      $('#furre2').css({
        display: "block"
      });

      $('#furre2').html('<div class="loser-div"><h2>Looser!</h2><div class="lose_price"><p>'+p2p+'$</p></div><span class="total-lose">Total Loose</span><h3>'+total+'$</h3></div>');
    }else{
      $('#furlo2').css({
        display: "none"
      });
      $('#fur2').css({
        display: "none"
      });
      $('#furre2').css({
        display: "block"
      });

      $('#furre2').html('<div class="winer-div"><h2>Winner!</h2><div class="win_price"><p>'+p2p+'$</p></div><span class="total-win">Total Winning</span><h3>'+total+'$</h3></div>');
      

       $('#furlo1').css({
        display: "none"
      });
      $('#fur1').css({
        display: "none"
      });
      $('#furre1').css({
        display: "block"
      });

      $('#furre1').html('<div class="loser-div"><h2>Looser!</h2><div class="lose_price"><p>'+p1p+'$</p></div><span class="total-lose">Total Loose</span><h3>'+total+'$</h3></div>');

    }
}

function displaydiv(){
  $('#furlo1').css({
    display: "none"
  });
  $('#fur1').css({
    display: "block"
  });

  $('#furlo2').css({
    display: "none"
  });
  $('#fur2').css({
    display: "block"
  });
}
function generate(ng, items, t, qty, container, p) {
  displaydiv();

  $(container).css({
    transition: "sdf",
    "margin-top": "0px"
  }, 10).html('');
  
  var randed2 = ng;
  let x = 0;
  var wi = 0;


  var ranomized_Number_Array = createProbabilityArray(items);

  for(let i = 0;i < ranomized_Number_Array.length; i++) {
    //alert(Object.values(items[1]));
    const item_ent = Object.values(items[ranomized_Number_Array[i]]);
    var element = '<div class="bg-shap"> <div id="'+p+'CardNumber'+i+'" class="item class_red_item" style="background-image:url('+encodeURI(sksrc+item_ent[0]+'-'+item_ent[2])+');"><div class="skin_name_div"><div class="skin-inr-box"><h5 id="winlabel'+i+'-'+p+'">'+item_ent[1]+'</h5></div></div></div></div>';
    if(item_ent[0] == ng){
      wi = ranomized_Number_Array[i];
    }
    /*if(x < t-1){
      x++;
    }else{
      x = 0;
    }*/


    $(element).appendTo(container);
  }
  setTimeout(function() {
      const item_ent = Object.values(items[wi]);
      goRoll(item_ent[1], encodeURI(sksrc+item_ent[0]+'-'+item_ent[2]), container, p, item_ent[3], item_ent[4]);
  }, 500);
}

function goRoll(skin, skinimg, container, p, ext, pri) {
  $(container).css({
    transition: "all 8s cubic-bezier(.09,.6,0,1)"
  });
  // Play the sound.
        audio.play();
  $('#'+p+'CardNumber78').css({
    "background-image": "url("+skinimg+")"
  });
  
  $('#winlabel78-'+p).html(skin+" ("+ext+")");
  setTimeout(function() {
    $('#'+p+'CardNumber78').addClass('winningitem');
    // Stop and rewind the sound (stops it if already playing).
     /* $('#Modal').modal('show');
    $('#rolled').html(skin);*/
    var win_element = "<div class='wincase-bg'><div class='item class_red_item' style='background-image: url("+skinimg+");animation: topbar 0.5s linear 0s infinite alternate;position: relative;'></div></div>";
      // audio.pause();
      setTimeout(function(){
        $('#'+p+'winskin').append(' <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-6 bs_upd"><div class="boxex-inner bg-blue"><div class="boxex-skin-img"><img class="img-fluid" src="'+skinimg+'"></div><div class="boxex-dec"><span>'+skin+' ('+ext+')</span><span class="bttle_win_price">$'+pri+'</span></div></div></div>');
      }, 7000);
      $('#bco').css({
        display: "none"
      });
  }); 
  // , 8500
  var ss = screen.width;
  if(ss >= 2560){
    $(container).css('margin-top', '-21850px');
  }else if(ss >= 1920){
    $(container).css('margin-top', '-21850px');
  }else if(ss >= 1680){
    $(container).css('margin-top', '-21850px');
  }else if(ss >= 1600){
    $(container).css('margin-top', '-21850px');
  }else if(ss >= 1536){
    $(container).css('margin-top', '-21850px');
  }else if(ss >= 1440){
    $(container).css('margin-top', '-21850px');
  }else if(ss >= 1366){
    $(container).css('margin-top', '-21850px');
  }else if(ss >= 1280){
    $(container).css('margin-top', '-21850px');
  }else if(ss >= 1080){
    $(container).css('margin-top', '-21850px');
  }else if(ss >= 1024){
    $(container).css('margin-top', '-21850px');
  }else if(ss >= 992){
    $(container).css('margin-top', '-21850px');
  }else if(ss >= 768){
    $(container).css('margin-top', '-21850px');
  }else if(ss >= 414){
    $(container).css('margin-top', '-21850px');
  }else if(ss >= 375){
    $(container).css('margin-top', '-21850px');
  }else if(ss >= 360){
    $(container).css('margin-top', '-21850px');
  }else if(ss >= 320){
    $(container).css('margin-top', '-21850px');
  }
}
// -8125px
function randomInt(min, max) {
  return Math.floor(Math.random() * (max - min)) + min;
}

function shuffle(array) {
  var currentIndex = array.length, temporaryValue, randomIndex;

  // While there remain elements to shuffle...
  while (0 !== currentIndex) {

    // Pick a remaining element...
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;

    // And swap it with the current element.
    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }

  return array;
}

function createProbabilityArray(items) {
  const probabilityArray = []
  items.forEach((item, index) => {
    let probability = Math.floor(item.odds);
    if(probability === 0) { 
      probability = 1; 
    }   

    addOdds(probabilityArray, index, probability);
  })

  return shuffle(probabilityArray);
}

function addOdds(array, item, times) {
    for(let i = 0; i < times; i++) { 
      array.push(item)
  }
  return array;
}