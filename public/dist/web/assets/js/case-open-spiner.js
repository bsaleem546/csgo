
 $(document).ready(function() {
    $('#co').click(function(e) {
          var host = 'http://localhost:81/csgo';
          var caseid = $('#caseid').val();
          var qty = parseInt($('#oqty').val());
          var itr = 1;
          var itrcount = 1;
          for(var i=1; i<=qty; i++){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) { 
                   if(xhttp.response == 'Inefficient Balance'){
                      alert('Inefficient Balance');
                   }else{
                    var str = xhttp.response;
                    var st = str.split('|');
                    if(itr == 1){
                      document.getElementById('case-block1').innerHTML = createRaffleRoller(itrcount);
                      itr++;
                    }else{
                      document.getElementById('case-block1').innerHTML += createRaffleRoller(itrcount);
                    }  
                      generate(st[0], item_entries, total, qty, st[1], itrcount);
                      itrcount++;
                      window.scrollTo(0, 0);
                  }
                   
                }
                
              
            };
            xhttp.open("GET", host+"/case/open/response/"+caseid, true);
            xhttp.send();
          }
    });
    $('#tryagain').click(function(e) { 
      var host = 'http://localhost:81/csgo';
      var caseid = $('#caseid').val();
      var qty = parseInt($('#oqty').val());
      var itr = 1;
      var itrcount = 1;
      for(var i=1; i<=qty; i++){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) { 
               if(xhttp.response == 'Inefficient Balance'){
                  alert('Inefficient Balance');
               }else{
                var str = xhttp.response;
                var st = str.split('|');
                if(itr == 1){
                  document.getElementById('case-block1').innerHTML = createRaffleRoller(itrcount);
                  itr++;
                }else{
                  document.getElementById('case-block1').innerHTML += createRaffleRoller(itrcount);
                }  
                  generate(st[0], item_entries, total, qty, st[1], itrcount);
                  itrcount++;
                  window.scrollTo(0, 0);
              }
               
            }
            
          
        };
        xhttp.open("GET", host+"/case/open/response/"+caseid, true);
        xhttp.send();
      }
});
    
  });

var audsrc = 'http://localhost:81/csgo/dist/web/assets/sound/tick.mp3';
var sksrc = 'http://localhost:81/csgo/dist/web/assets/images/skins/';
let audio = new Audio(audsrc);  // Create audio object and load desired file.
function playSound()
    {
       audio.currentTime = 0;
        // Play the sound.
        audio.play();
    }
function generate(ng, items, t, qty, ie, itr) {
  $(`#roller${itr}` + ' .raffle-roller-containerr').css({
    transition: "sdf",
    "margin-left": "0px"
  }, 10).html('');

  var randed2 = ng;
  var x = 0;
  var wi = 0;
  
  var ranomized_Number_Array = createProbabilityArray(items);
  
  
  for(var i = 0;i < ranomized_Number_Array.length; i++) {
    const item_ent = Object.values(items[ranomized_Number_Array[i]]);
    var element = '<div class="bg-shapp"> <div id="Card'+ie+'Number'+i+'" class="item class_red_item" style="background-image:url('+encodeURI(sksrc+item_ent[0]+'-'+item_ent[2])+');"></div></div>';
    $(element).appendTo(`#roller${itr}` + ' .raffle-roller-containerr');
     
    /*
    if(item_ent[0] == ng){
      wi = x;
    }
    if(x < t-1){
      x++;
    }else{
      x = 0;
    }
    */ 
    if(item_ent[0] == ng){
      wi = ranomized_Number_Array[i];
    }
  }

  setTimeout(function() {
      const item_ent = Object.values(items[wi]);
      //alert(sksrc+item_ent[0]+'-'+item_ent[2]);
      goRoll(item_ent[1], encodeURI(sksrc+item_ent[0]+'-'+item_ent[2]), qty, ie, item_ent[4], itr);
  }, 500);
}

function goRoll(skin, skinimg, qty, ie, price, itr) {
  var winclass = 'col-lg-12';
  if(qty == 2){
    winclass = 'col-lg-6';
  }else if(qty == 3){
    winclass = 'col-lg-4';
  }else if(qty == 4){
    winclass = 'col-lg-3';
  }
  $('.raffle-roller-containerr').css({
    transition: "all 8s cubic-bezier(.09,.6,0,1) 0.2s" 
  });
  // Play the sound.
        audio.play();
  $('#Card'+ie+'Number78').css({
    "background-image": "url("+skinimg+")"
  });
  setTimeout(function() {
    $('#Card'+ie+'Number78').addClass('winningitem');
    // Stop and rewind the sound (stops it if already playing).
      $('#Modal').modal('show');
    $('#rolled').html(skin);   

    var win_element = "<div class="+winclass+"><div class='wincase-bgg'><div class='item class_red_item' style='background-image: url("+skinimg+");animation: topbar 0.5s linear 0s infinite alternate;position: relative;'></div><div class='case-namee text-center'><h5>"+skin+"</h5></div></div> <button id='co' data-dismiss='modal' class='nk-btn-try-again nk-btn nk-btn-lg nk-btn-color-main-1 link-effect-4 ready'>Try Again</button> <button class='nk-btn-sell-case-for nk-btn nk-btn-lg nk-btn-color-main-1 link-effect-4 ready'>Sell For "+price+"$</button></div>";
 
    // audio.pause();

    $('.inventoryy').append(win_element);
    //$('#caselabel').html(skin);
  }, 8500);

  //Complex math but works
  let screenzoom = (Math.round((( window.outerWidth - 10 ) / window.innerWidth) * 100) + 1) / 100;

  var ss = screen.width / screenzoom;
  if(ss >= 2560){
    $('.raffle-roller-containerr').css('margin-left', '-7394px');
  }else if(ss >= 2280){
    $('.raffle-roller-containerr').css('margin-left', '-7545px');
  }else if(ss >= 1920){
    $('.raffle-roller-containerr').css('margin-left', '-7667px');
  }else if(ss >= 1680){
    $('.raffle-roller-containerr').css('margin-left', '-7824px');
  }else if(ss >= 1600){
    $('.raffle-roller-containerr').css('margin-left', '-7864px');
  }else if(ss >= 1536){
    $('.raffle-roller-containerr').css('margin-left', '-7904px');
  }else if(ss >= 1440){
    $('.raffle-roller-containerr').css('margin-left', '-7954px');
  }else if(ss >= 1366){
    $('.raffle-roller-containerr').css('margin-left', '-7987px');
  }else if(ss >= 1280){
    $('.raffle-roller-containerr').css('margin-left', '-8034px');
  }else if(ss >= 1080){
    $('.raffle-roller-containerr').css('margin-left', '-8077px');
  }else if(ss >= 1024){
    $('.raffle-roller-containerr').css('margin-left', '-8154px');
  }else if(ss >= 992){
    $('.raffle-roller-containerr').css('margin-left', '-8174px');
  }else if(ss >= 768){
    $('.raffle-roller-containerr').css('margin-left', '-8240px');
  }else if(ss >= 414){
    $('.raffle-roller-containerr').css('margin-left', '-8464px');
  }else if(ss >= 375){
    $('.raffle-roller-containerr').css('margin-left', '-8484px');
  }else if(ss >= 360){
    $('.raffle-roller-containerr').css('margin-left', '-8487px');
  }else if(ss >= 320){
    $('.raffle-roller-containerr').css('margin-left', '-8509px');
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

function createRaffleRoller(id){
  return `<div id="roller${id}" class="col-lg-12 no-pad case-bg-frm">
  <div class="raffle-overr">
      <div class="raffle-rollerr">
          <div class="raffle-roller-holderr">
              <span class="line-borderss"></span>
              <div class="raffle-roller-containerr" style="margin-left: 0px;">
              </div>
          </div>
      </div>
  </div>
</div>` 
}