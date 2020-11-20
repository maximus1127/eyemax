<html>

<head>
{{-- <script src='/js/persist-min.js'></script> --}}
  <style>
  html {
    height: 100%;

  }

    .mirror{
         transform: scaleX(-1);
    }

  body {
    margin: auto;
    height: 100%;
    width: 100%;



  }

  img {
     margin-bottom: 0 !important;
     padding-top: 20px !important;
   }

  .inverted {
    background-color: black;
    filter: invert(100%);

  }


  .duochrome {
    background-color: red;
  }

  .background {
    position: fixed;
    top: 0px;
    left: 0px;
    width: 50%;
    height: 100%;
    background-color: rgb(0, 210, 5);
    z-index: -1;

  }

  #testDisplay {
    position: absolute;
    width: 100%;
    height: 90%;
    display: table;
    align-content: center;

    top: 3%;
    bottom: 0;
    left: 0;
    right:0;

  }
  #content {

    height: 30px;
    display: table-cell;
    text-align: center;
    vertical-align: middle;

  }



  .tumble400 img {

    height: 2000%;

  }

  .tumble300 img {

    height: 1500%;

  }

  .tumble200 img {

    height: 1000%;

  }

  .tumble100 img {

    height: 500%;
  }

  .tumble80 img {

    height: 400%;

  }

  .tumble70 img {

    height: 350%;

  }

  .tumble60 img {
    height: 300%;

  }

  .tumble50 img {
    height: 250%;

  }

  .tumble40 img {
    height: 200%;

  }

  .tumble30 img {
    height: 150%;
  padding: .15em .15em;
  }

  .tumble25 img {
    height: 125%;
  padding: .125em .125em;
  }

  .tumble20 img {

    height: 100%;
    padding: .1em .1em;
  }

  .tumble15 img {

    height: 75%;
    padding: .1em .1em;
  }

  .tumble10 img {

    height: 50%;
    padding: .1em .1em;
  }

/* ------------------------------------------------------------------------------------------------ */

  .tumble400 {

    font-size: 2000%;
    margin-top: .3em;

  }

  .tumble300 {

    font-size: 1500%;
    margin-top: .3em;

  }

  .tumble200 {

    font-size: 1000%;
    letter-spacing: .3em;
        margin-top: .3em;

  }

  .tumble100 {
    text-align: center;
    padding: 20px 0;

    font-size: 500%;
    letter-spacing: .3em;
        margin-top: .3em;

  }

  .tumble80 {
    padding: 20px 0;
        margin-top: .3em;
    font-size: 400%;
    letter-spacing: .35em;

  }

  .tumble70 {
    padding: 20px 0;
        margin-top: .3em;
    font-size: 350%;
    letter-spacing: .3em;
  }

  .tumble60 {
    padding: 20px 20px;
        margin-top: .3em;
    font-size: 300%;
    letter-spacing: .3em;


  }

  .tumble50 {
    padding: 20px 20px;
        margin-top: .3em;
    font-size: 250%;
    letter-spacing: .25em;


  }

  .tumble40 {
    padding: 20px 20px;
        margin-top: .3em;
    font-size: 200%;
    letter-spacing: .2em;
;
  }

  .tumble30 {
    padding: 20px 20px;
        margin-top: .3em;
    font-size: 150%;
    letter-spacing: .15em;

  }

  .tumble25 {
    padding: 20px 20px;
        margin-top: .3em;
    font-size: 125%;
    letter-spacing: .125em;


  }

  .tumble20 {
    padding: 20px 20px;
    margin-top: .3em;
    font-size: 100%;
    letter-spacing: .1em;

  }
  .tumble15 {
    padding: 20px 20px;
        margin-top: .3em;
    font-size: 75%;
    letter-spacing: .1em;

  }
  .tumble10 {
    padding: 20px 20px;
        margin-top: .3em;
    font-size: 50%;
    letter-spacing: .1em;

  }


  #cover{
  position:fixed;
  top:0;
  left:0;
  background:rgba(0,0,0,1);
  z-index:5;
  width:100%;
  height:100%;
  display:none;
}

    .noFlow{
        position:relative;
    }

    .fixed-bottom{
      position:fixed;
      bottom: 0;
      left: 0;
      font-family: "Arial Black", Gadget, sans-serif

    }

    #instructions{
      height: 100%;
      width: 100%;
      position: fixed;
      display: none;
      top: 0;
      left: 0;
      background:rgba(252,252,252,1);
      z-index: 10;
      line-height: 20px;
        overflow:scroll;
    }

    @font-face{
font-family: 'Sloan';
src: url('/font/Sloan.ttf') format('truetype');
}


.text{
font-family: 'Sloan';

}

#video{
  display: none;
  width: 100%;
  height:100%;
  position: relative;
}
#video video{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  max-width: 100%;
  max-height: 100%;
  width: 100%;
}

#color{
  display: none;
  width: 100%;
  height:100%;
  position: relative;
}

#color img {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  max-width: 100%;
  max-height: 100%;
  height: 100%;
}

.lineSolo{
  visibility: hidden;
}

</style>

</head>


<body >


<div id="background"></div>


<div id="testDisplay">

  <div id="content" class="text">

    <div id="video"></div>
    <div id="color"></div>
    <div id="patient1" class="noFlow" data-size="solo1" data-keepClass="soloLine"></div>
    <div id="patient2" class="noFlow" data-size="solo2" data-keepClass="soloLine"></div>
    <div id="patient3" class="noFlow" data-size="solo3" data-keepClass="soloLine"></div>
    <div id="patient4" class="noFlow" data-size="solo4" data-keepClass="soloLine"></div>
    <div id="patient5" class="noFlow" data-size="solo5" data-keepClass="soloLine"></div>
    <div id="patient6" class="noFlow" data-size="solo6" data-keepClass="soloLine"></div>

  </div>



</div>
<div id="cover"></div>



<div class="fixed-bottom">
  <p>
    <h2></h2>
  </p>
</div>

<script src="{{asset('js/app.js')}}"></script>

<script>



function clear(){
  $("#patient1").html("").removeClass();
  $("#patient2").html("").removeClass();
  $("#patient3").html("").removeClass();
  $("#patient4").html("").removeClass();
  $("#patient5").html("").removeClass();
  $("#patient6").html("").removeClass();
  $("#video").html("");
  $("#video").css('display', 'none');
  $("#color").html('');
  $('#color').css('display', 'none');
  $("h2").html('');

}


var currentZoom = 20;
var letters = ["C", "D", "H", "K", "N", "O", "R", "S", "V", "Z"];
var numbersImg = ["1", "2", "3", "4", "5", "6", "7", "8", "9" , "5"];
var ees = ["d","j","i","e", "d","j","i","e","i","j"];
var pictures = ["k", "h", "f", "g", "b", "c", "k", "h", "f", "g", "b", "c"];
var image = letters;
var singleLetter = false;
var fontType = true;
var colorMode = false;
var hotv = ['&nbsp;H', '&nbsp;O', '&nbsp;T', '&nbsp;V'];
var hotvActive = false;
var currentLine;
var movie = 0;
var movieArray = ['Moana.mp4', 'Cars.mp4', 'Frozen.mp4', 'Finding_Dory.mp4'];
var currentOptions = ['400', '300', '200', '100', '80', '70', '60', '50', '40', '30', '25', '20', '15', '10', '400200', '1008070', '605040', '302520', '6020'];

Echo.channel(localStorage.getItem("location").toString()).listen('ChartSignal', (data) =>{
  console.log(data)
currentLine = data.size

  if(data.size.includes('solo')){
    var divs = $('[data-keepClass]');

    $(divs).each(function(e){
      if($(this).data('size') != data.size){
        $(this).addClass('lineSolo')
      }else{
        $(this).removeClass('lineSolo')
      }
    })
  }


  var size = data.size;
  var numbers = data.numbers;
  var numbers2 = data.numbers2;
  var numbers3 = data.numbers3;
  var numbers4 = data.numbers4;
  var numbers5 = data.numbers5;
  var numbers6 = data.numbers6;





   firstLine = document.getElementById("patient1");
   secondLine = document.getElementById("patient2");
   thirdLine = document.getElementById("patient3");
   fourthLine = document.getElementById("patient4");
   fifthLine = document.getElementById("patient5");
   sixthLine = document.getElementById("patient6");

   if (size == "singleFilter"){
     singleLetter = !singleLetter;
   }
   if (size == "refresh"){
     location.reload();
   }

   if(size == 'retinoscopy'){
     clear();
     $("h2").html('');
     $('#video').css('display', 'block');
     $("#video").html(`<video width="1040" height="880" autoplay muted>
                         <source src="{{asset('/images/rolypoly.webm')}}" type="video/webm">
                       </video>`);
   }

   if(size == 'circles'){
     clear();
     $("h2").html('');
     $("#color").show();
     $("#color").html(`<img src="{{asset('/images/astig-dots.png')}}" style="width: 400px; height: 400px;"/>`);

   }

   if(size == "movie"){
     clear();
     $("h2").html('');
     $('#video').css('display', 'block');
     $("#video").html(`<video width="1040" height="880" autoplay controls>
                         <source src="/images/${movieArray[movie]}" type="video/mp4">
                       </video>`);
    if(movie == 3){
      movie = 0
    } else {
      movie ++
    }
   }




   if(data.size == "colorPlates"){
     colorMode = !colorMode;
       clear();
   }


   if(data.size == 'cp12'){
     clear();
     $("#color").show();
     $("#color").html(`<img src="{{asset('/images/Plate1.jpg')}}" />`);
     $("h2").html("12");

   }
   if(data.size == 'cp8'){
     clear();
     $("#color").show();
     $("#color").html(`<img src="{{asset('/images/Plate2.jpg')}}" />`);
     $("h2").html("8");
   }
   if(data.size == 'cp29'){
     clear();
     $("#color").show();
     $("#color").html(`<img src="{{asset('/images/Plate3.jpg')}}" />`);
     $("h2").html("29");
   }
   if(data.size == 'cp51'){
     clear();
     $("#color").show();
     $("#color").html(`<img src="{{asset('/images/Plate4.jpg')}}" />`);
     $("h2").html("5");
   }
   if(data.size == 'cp3'){
     clear();
     $("#color").show();
     $("#color").html(`<img src="{{asset('/images/Plate5.jpg')}}" />`);
     $("h2").html("3");
   }
   if(data.size == 'cp15'){
     clear();
     $("#color").show();
     $("#color").html(`<img src="{{asset('/images/Plate6.jpg')}}" />`);
     $("h2").html("15");
   }
   if(data.size == 'cp74'){
     clear();
     $("#color").show();
     $("#color").html(`<img src="{{asset('/images/Plate7.jpg')}}" />`);
     $("h2").html("74");
   }
   if(data.size == 'cp6'){
     clear();
     $("#color").show();
     $("#color").html(`<img src="{{asset('/images/Plate8.jpg')}}" />`);
     $("h2").html("6");
   }
   if(data.size == 'cp45'){
     clear();
     $("#color").show();
     $("#color").html(`<img src="{{asset('/images/Plate9.jpg')}}" />`);
     $("h2").html("45");
   }
   if(data.size == 'cp5'){
     clear();
     $("#color").show();
     $("#color").html(`<img src="{{asset('/images/Plate10.jpg')}}" />`);
     $("h2").html("5");
   }
   if(data.size == 'cp7'){
     clear();
     $("#color").show();
     $("#color").html(`<img src="{{asset('/images/Plate11.jpg')}}" />`);
     $("h2").html("7");
   }
   if(data.size == 'cp16'){
     clear();
     $("#color").show();
     $("#color").html(`<img src="{{asset('/images/Plate12.jpg')}}" />`);
     $("h2").html("16");
   }
   if(data.size == 'cp73'){
     clear();
     $("#color").show();
     $("#color").html(`<img src="{{asset('/images/Plate13.jpg')}}" />`);
     $("h2").html("73");
   }
   if(data.size == 'cp26'){
     clear();
     $("#color").show();
     $("#color").html(`<img src="{{asset('/images/Plate14.jpg')}}" />`);
     $("h2").html("26");
   }
   if(data.size == 'cp42'){
     clear();
     $("#color").show();
     $("#color").html(`<img src="{{asset('/images/Plate15.jpg')}}" />`);
     $("h2").html("42");
   }




   if(size == 10){
     clear();
     firstLine.className = ("tumble10");
     if (singleLetter == true && fontType == false){
     $('#patient1').html("<img src='/images/" + image[numbers[1]] + "'/> " );
   } if (singleLetter == true && fontType == true){
     $("#patient1").html(image[numbers[1]]);
   } if(singleLetter == false && fontType == false){
    $("#patient1").html("<img src='/images/" + image[numbers[1]] + "'/> <img src='/images/" + image[numbers[2]] + "' /> <img src='/images/" + image[numbers[3]] + "' /> <img src='/images/" + image[numbers[4]] + "' /> <img src='/images/" + image[numbers[0]] + "' />" );
  } if (singleLetter == false && fontType == true){
    $("#patient1").html( "&nbsp" +image[numbers[1]] +" "+  image[numbers[2]] + " " + image[numbers[3]] + " " +  image[numbers[4]] + " " + image[numbers[0]]);
  }
    if(hotvActive == true && singleLetter == false){
      $('#patient1').html(image[data.hotv[0]] +' '+ image[data.hotv[1]] +' '+ image[data.hotv[2]] +' '+ image[data.hotv[3]])
    }
    if(hotvActive == true && singleLetter == true){
        $('#patient1').html(image[data.hotv[0]])
    }

    $("h2").html("20/"+size);
   }




   if(size == 15){
     clear();
     firstLine.className = ("tumble15");
     if (singleLetter == true && fontType == false){
     $('#patient1').html("<img src='/images/" + image[numbers[1]] + "'/> " );
   } if (singleLetter == true && fontType == true){
     $("#patient1").html(image[numbers[1]]);
   } if(singleLetter == false && fontType == false){
    $("#patient1").html("<img src='/images/" + image[numbers[1]] + "'/> <img src='/images/" + image[numbers[2]] + "' /> <img src='/images/" + image[numbers[3]] + "' /> <img src='/images/" + image[numbers[4]] + "' /> <img src='/images/" + image[numbers[0]] + "' />" );
  } if (singleLetter == false && fontType == true){
    $("#patient1").html( "&nbsp" +image[numbers[1]] +" "+  image[numbers[2]] + " " + image[numbers[3]] + " " +  image[numbers[4]] + " " + image[numbers[0]]);
  }    if(hotvActive == true && singleLetter == false){
        $('#patient1').html(image[data.hotv[0]] +' '+ image[data.hotv[1]] +' '+ image[data.hotv[2]] +' '+ image[data.hotv[3]])
      }
      if(hotvActive == true && singleLetter == true){
          $('#patient1').html(image[data.hotv[0]])
      }

    $("h2").html("20/"+size);
   }



  if(size == 20){
    clear();
    firstLine.className = ("tumble20");
    if (singleLetter == true && fontType == false){
    $('#patient1').html("<img src='/images/" + image[numbers[1]] + "'/> " );
  } if (singleLetter == true && fontType == true){
    $("#patient1").html(image[numbers[1]]);
  } if(singleLetter == false && fontType == false){
   $("#patient1").html("<img src='/images/" + image[numbers[1]] + "'/> <img src='/images/" + image[numbers[2]] + "' /> <img src='/images/" + image[numbers[3]] + "' /> <img src='/images/" + image[numbers[4]] + "' /> <img src='/images/" + image[numbers[0]] + "' />" );
 } if (singleLetter == false && fontType == true){
   $("#patient1").html( "&nbsp" +image[numbers[1]] +" "+  image[numbers[2]] + " " + image[numbers[3]] + " " +  image[numbers[4]] + " " + image[numbers[0]]);
 }
 if(hotvActive == true && singleLetter == false){
   $('#patient1').html(image[data.hotv[0]] +' '+ image[data.hotv[1]] +' '+ image[data.hotv[2]] +' '+ image[data.hotv[3]])
 }
 if(hotvActive == true && singleLetter == true){
     $('#patient1').html(image[data.hotv[0]])
 }
   $("h2").html("20/"+size);
  }
  if(size == 25){
    clear();
    firstLine.className = ("tumble25");
    if (singleLetter == true && fontType == false){
    $('#patient1').html("<img src='/images/" + image[numbers[1]] + "'/> " );
  } if (singleLetter == true && fontType == true){
    $("#patient1").html(image[numbers[1]]);
  } if(singleLetter == false && fontType == false){
   $("#patient1").html("<img src='/images/" + image[numbers[1]] + "'/> <img src='/images/" + image[numbers[2]] + "' /> <img src='/images/" + image[numbers[3]] + "' /> <img src='/images/" + image[numbers[4]] + "' /> <img src='/images/" + image[numbers[0]] + "' />" );
 } if (singleLetter == false && fontType == true){
   $("#patient1").html( "&nbsp" +image[numbers[1]] +" "+  image[numbers[2]] + " " + image[numbers[3]] + " " +  image[numbers[4]] + " " + image[numbers[0]]);
 }    if(hotvActive == true && singleLetter == false){
       $('#patient1').html(image[data.hotv[0]] +' '+ image[data.hotv[1]] +' '+ image[data.hotv[2]] +' '+ image[data.hotv[3]])
     }
     if(hotvActive == true && singleLetter == true){
         $('#patient1').html(image[data.hotv[0]])
     }
  $("h2").html("20/"+size);

  }
  if(size == 30){
    clear();
    firstLine.className = ("tumble30");
    if (singleLetter == true && fontType == false){
    $('#patient1').html(" <img src='/images/" + image[numbers[1]] + "'/> " );
  } if (singleLetter == true && fontType == true){
    $("#patient1").html(image[numbers[1]]);
  } if(singleLetter == false && fontType == false){
   $("#patient1").html("<img src='/images/" + image[numbers[1]] + "'/> <img src='/images/" + image[numbers[2]] + "' /> <img src='/images/" + image[numbers[3]] + "' /> <img src='/images/" + image[numbers[4]] + "' /> <img src='/images/" + image[numbers[0]] + "' />" );
  } if (singleLetter == false && fontType == true){
   $("#patient1").html( "&nbsp" +image[numbers[1]] +" "+  image[numbers[2]] + " " + image[numbers[3]] + " " +  image[numbers[4]] + " " + image[numbers[0]]);
  }    if(hotvActive == true && singleLetter == false){
        $('#patient1').html(image[data.hotv[0]] +' '+ image[data.hotv[1]] +' '+ image[data.hotv[2]] +' '+ image[data.hotv[3]])
      }
      if(hotvActive == true && singleLetter == true){
          $('#patient1').html(image[data.hotv[0]])
      }
   $("h2").html("20/"+size);

  }
  if(size == 40){
    clear();
    firstLine.className = ("tumble40");
    if (singleLetter == true && fontType == false){
    $('#patient1').html("<img src='/images/" + image[numbers[1]] + "'/> " );
  } if (singleLetter == true && fontType == true){
    $("#patient1").html(image[numbers[1]]);
  } if(singleLetter == false && fontType == false){
   $("#patient1").html("<img src='/images/" + image[numbers[1]] + "'/> <img src='/images/" + image[numbers[2]] + "' /> <img src='/images/" + image[numbers[3]] + "' /> <img src='/images/" + image[numbers[4]] + "' /> <img src='/images/" + image[numbers[0]] + "' />" );
  } if (singleLetter == false && fontType == true){
   $("#patient1").html( "&nbsp" +image[numbers[1]] +" "+  image[numbers[2]] + " " + image[numbers[3]] + " " +  image[numbers[4]] + " " + image[numbers[0]]);
  }    if(hotvActive == true && singleLetter == false){
        $('#patient1').html(image[data.hotv[0]] +' '+ image[data.hotv[1]] +' '+ image[data.hotv[2]] +' '+ image[data.hotv[3]])
      }
      if(hotvActive == true && singleLetter == true){
          $('#patient1').html(image[data.hotv[0]])
      }
  $("h2").html("20/"+size);

  }
  if(size == 50){
    clear();
    firstLine.className = ("tumble50");
    if (singleLetter == true && fontType == false){
    $('#patient1').html("<img src='/images/" + image[numbers[1]] + "'/> " );
  } if (singleLetter == true && fontType == true){
    $("#patient1").html(image[numbers[1]]);
  } if(singleLetter == false && fontType == false){
   $("#patient1").html("<img src='/images/" + image[numbers[1]] + "'/> <img src='/images/" + image[numbers[2]] + "' /> <img src='/images/" + image[numbers[3]] + "' /> <img src='/images/" + image[numbers[4]] + "' /> <img src='/images/" + image[numbers[0]] + "' />" );
  } if (singleLetter == false && fontType == true){
   $("#patient1").html( "&nbsp" +image[numbers[1]] +" "+  image[numbers[2]] + " " + image[numbers[3]] + " " +  image[numbers[4]] + " " + image[numbers[0]]);
  }    if(hotvActive == true && singleLetter == false){
        $('#patient1').html(image[data.hotv[0]] +' '+ image[data.hotv[1]] +' '+ image[data.hotv[2]] +' '+ image[data.hotv[3]])
      }
      if(hotvActive == true && singleLetter == true){
          $('#patient1').html(image[data.hotv[0]])
      }
   $("h2").html("20/"+size);

  }
  if(size == 60){
    clear();
    firstLine.className = ("tumble60");
    if (singleLetter == true && fontType == false){
    $('#patient1').html("<img src='/images/" + image[numbers[1]] + "'/> " );
  } if (singleLetter == true && fontType == true){
    $("#patient1").html(image[numbers[1]]);
  } if(singleLetter == false && fontType == false){
   $("#patient1").html("<img src='/images/" + image[numbers[1]] + "'/> <img src='/images/" + image[numbers[2]] + "' /> <img src='/images/" + image[numbers[3]] + "' /> <img src='/images/" + image[numbers[4]] + "' /> <img src='/images/" + image[numbers[0]] + "' />" );
  } if (singleLetter == false && fontType == true){
   $("#patient1").html("&nbsp" + image[numbers[1]] +" "+  image[numbers[2]] + " " + image[numbers[3]] + " " +  image[numbers[4]] + " " + image[numbers[0]]);
  }    if(hotvActive == true && singleLetter == false){
        $('#patient1').html(image[data.hotv[0]] +' '+ image[data.hotv[1]] +' '+ image[data.hotv[2]] +' '+ image[data.hotv[3]])
      }
      if(hotvActive == true && singleLetter == true){
          $('#patient1').html(image[data.hotv[0]])
      }
  $("h2").html("20/"+size);

  }
  if(size == 70){
    clear();
    firstLine.className = ("tumble70");
    if (singleLetter == true && fontType == false){
    $('#patient1').html("<img src='/images/" + image[numbers[1]] + "'/> " );
  } if (singleLetter == true && fontType == true){
    $("#patient1").html(image[numbers[1]]);
  } if(singleLetter == false && fontType == false){
   $("#patient1").html("<img src='/images/" + image[numbers[1]] + "'/> <img src='/images/" + image[numbers[2]] + "' /> <img src='/images/" + image[numbers[3]] + "' /> <img src='/images/" + image[numbers[4]] + "' /> <img src='/images/" + image[numbers[0]] + "' />" );
  } if (singleLetter == false && fontType == true){
   $("#patient1").html("&nbsp" + image[numbers[1]] +" "+  image[numbers[2]] + " " + image[numbers[3]] + " " +  image[numbers[4]] + " " + image[numbers[0]]);
  }    if(hotvActive == true && singleLetter == false){
        $('#patient1').html(image[data.hotv[0]] +' '+ image[data.hotv[1]] +' '+ image[data.hotv[2]] +' '+ image[data.hotv[3]])
      }
      if(hotvActive == true && singleLetter == true){
          $('#patient1').html(image[data.hotv[0]])
      }
   $("h2").html("20/"+size);

  }
  if(size == 80){
    clear();
    firstLine.className = ("tumble80");
    if (singleLetter == true && fontType == false){
    $('#patient1').html("<img src='/images/" + image[numbers[1]] + "'/> " );
  } if (singleLetter == true && fontType == true){
    $("#patient1").html(image[numbers[1]]);
  } if(singleLetter == false && fontType == false){
   $("#patient1").html("<img src='/images/" + image[numbers[1]] + "'/> <img src='/images/" + image[numbers[2]] + "' /> <img src='/images/" + image[numbers[3]] + "' /> <img src='/images/" + image[numbers[4]] + "' />" );
  } if (singleLetter == false && fontType == true){
   $("#patient1").html( "&nbsp" +image[numbers[1]] +" "+  image[numbers[2]] + " " + image[numbers[3]] + " " +  image[numbers[4]]);
  }    if(hotvActive == true && singleLetter == false){
        $('#patient1').html(image[data.hotv[0]] +' '+ image[data.hotv[1]] +' '+ image[data.hotv[2]] +' '+ image[data.hotv[3]])
      }
      if(hotvActive == true && singleLetter == true){
          $('#patient1').html(image[data.hotv[0]])
      }
  $("h2").html("20/"+size);

  }
  if(size == 100){
    clear();
    firstLine.className = ("tumble100");
    if (singleLetter == true && fontType == false){
    $('#patient1').html("<img src='/images/" + image[numbers[1]] + "'/> " );
  } if (singleLetter == true && fontType == true){
    $("#patient1").html(image[numbers[1]]);
  } if(singleLetter == false && fontType == false){
   $("#patient1").html("<img src='/images/" + image[numbers[1]] + "'/> <img src='/images/" + image[numbers[2]] + "' /> <img src='/images/" + image[numbers[3]] + "' />" );
  } if (singleLetter == false && fontType == true){
   $("#patient1").html("&nbsp" + image[numbers[1]] +" "+  image[numbers[2]] + " " + image[numbers[3]]);
  }    if(hotvActive == true && singleLetter == false){
        $('#patient1').html(image[data.hotv[0]] +' '+ image[data.hotv[1]] +' '+ image[data.hotv[2]])
      }
      if(hotvActive == true && singleLetter == true){
          $('#patient1').html(image[data.hotv[0]])
      }
   $("h2").html("20/"+size);

  }
  if(size == 200){
    clear();
    firstLine.className = ("tumble200");
    if (singleLetter == true && fontType == false){
    $('#patient1').html("<img src='/images/" + image[numbers[1]] + "'/> " );
  } if (singleLetter == true && fontType == true){
    $("#patient1").html(image[numbers[1]]);
  } if(singleLetter == false && fontType == false){
   $("#patient1").html("<img src='/images/" + image[numbers[1]] + "'/> <img src='/images/" + image[numbers[2]] + "'  />" );
 } if (singleLetter == false && fontType == true){
   $("#patient1").html( "&nbsp" +image[numbers[1]] +" "+  image[numbers[2]]);
 }    if(hotvActive == true && singleLetter == false){
       $('#patient1').html(image[data.hotv[0]] +' '+ image[data.hotv[1]])
     }
     if(hotvActive == true && singleLetter == true){
         $('#patient1').html(image[data.hotv[0]])
     }

  $("h2").html("20/"+size);

  }
  if(size == 300){
    clear();
    firstLine.className = ("tumble300");
    if (singleLetter == true && fontType == false){
    $('#patient1').html("<img src='/images/" + image[numbers[1]] + "'/> " );
  } if (singleLetter == true && fontType == true){
    $("#patient1").html(image[numbers[1]]);
  } if(singleLetter == false && fontType == false){
   $("#patient1").html("<img src='/images/" + image[numbers[1]] + "' />" );
 } if (singleLetter == false && fontType == true){
   $("#patient1").html("&nbsp" + image[numbers[1]] );
 }    if(hotvActive == true && singleLetter == false){
       $('#patient1').html(image[data.hotv[0]])
     }
     if(hotvActive == true && singleLetter == true){
         $('#patient1').html(image[data.hotv[0]])
     }
   $("h2").html("20/"+size);

  }
  if(size == 400){
    clear();
    firstLine.className = ("tumble400");
    if (singleLetter == true && fontType == false){
    $('#patient1').html("<img src='/images/" + image[numbers[1]] + "'/> " );
  } if (singleLetter == true && fontType == true){
    $("#patient1").html(image[numbers[1]]);
  } if(singleLetter == false && fontType == false){
   $("#patient1").html("<img src='/images/" + image[numbers[1]] + "' />" );
 } if (singleLetter == false && fontType == true){
   $("#patient1").html( "&nbsp" +image[numbers[1]] );
 }    if(hotvActive == true && singleLetter == false){
       $('#patient1').html(image[data.hotv[0]])
     }
     if(hotvActive == true && singleLetter == true){
         $('#patient1').html(image[data.hotv[0]])
     }
  $("h2").html("20/"+size);
  }

 if (data.size == 400200 ){
   clear();
   firstLine.className = ("tumble400");
   secondLine.className = ("tumble200");
   if (singleLetter == true && fontType == false){
   $('#patient1').html("<img src='/images/" + image[numbers[1]] + "'/> " );
 } if (singleLetter == true && fontType == true){
   $("#patient1").html(image[numbers[1]]);
 } if(singleLetter == false && fontType == false){
  $("#patient1").html("<img src='/images/" + image[numbers[1]] + "' />" );
     $("#patient2").html("<img src='/images/" + image[numbers2[0]] + "'/> <img src='/images/" + image[numbers2[1]] + "'  />" );
} if (singleLetter == false && fontType == true){
  $("#patient1").html("&nbsp;"+ image[numbers[1]] );
     $("#patient2").html( "&nbsp"+image[numbers2[0]] +" "+  image[numbers2[1]]);
}    if(hotvActive == true && singleLetter == false){
      $('#patient1').html(image[data.hotv[0]])
      $('#patient2').html(image[data.hotv2[0]] +' '+image[data.hotv2[1]])
    }
    if(hotvActive == true && singleLetter == true){
        $('#patient1').html(image[data.hotv[0]])
        $('#patient2').html(image[data.hotv2[0]])
    }
    $("h2").html("20/400 <br /> 20/200");

  }
   if (data.size == 1008070 ){
     clear();
     firstLine.className = ("tumble100");
     secondLine.className = ("tumble80");
     thirdLine.className = ("tumble70");
     if (singleLetter == true && fontType == false){
     $('#patient1').html("<img src='/images/" + image[numbers[1]] + "'/> " );
     $('#patient2').html("<img src='/images/" + image[numbers[2]] + "'/> " );
     $('#patient3').html("<img src='/images/" + image[numbers[3]] + "'/> " );
   } if (singleLetter == true && fontType == true){
     $("#patient1").html(image[numbers[1]]);
     $("#patient2").html(image[numbers[2]]);
     $("#patient3").html(image[numbers[3]]);
   } if(singleLetter == false && fontType == false){
    $("#patient1").html("<img src='/images/" + image[numbers[1]] + "'/> <img src='/images/" + image[numbers[2]] + "' /> <img src='/images/" + image[numbers[3]] + "'/>" );
       $("#patient2").html("<img src='/images/" + image[numbers2[0]] + "'/> <img src='/images/" + image[numbers2[1]] + "' /> <img src='/images/" + image[numbers2[2]] + "' /> <img src='/images/" + image[numbers2[3]] + "' />" );
       $("#patient3").html("<img src='/images/" + image[numbers3[0]] + "'/> <img src='/images/" + image[numbers3[1]] + "' /> <img src='/images/" + image[numbers3[2]] + "' /> <img src='/images/" + image[numbers3[3]] + "' /> <img src='/images/" + image[numbers3[4]] + "' />" );
  } if (singleLetter == false && fontType == true){
    $("#patient1").html( "&nbsp"+image[numbers[1]] + " " + image[numbers[2]] + " "+ image[numbers[3]]);
    $("#patient2").html( "&nbsp"+image[numbers2[0]] + " " + image[numbers2[1]] + " "+ image[numbers2[2]] + " "+ image[numbers2[3]] );
    $("#patient3").html( "&nbsp"+image[numbers3[0]] + " " + image[numbers3[1]] + " "+ image[numbers3[2]] + " "+ image[numbers3[3]] + " "+ image[numbers3[4]] );
  }    if(hotvActive == true && singleLetter == false){
        $('#patient1').html(image[data.hotv[0]] +' '+image[data.hotv[1]] +' '+ image[data.hotv[2]])
        $('#patient2').html(image[data.hotv2[0]] +' '+image[data.hotv2[1]] +' '+ image[data.hotv2[2]] +' '+image[data.hotv2[3]])
        $('#patient3').html(image[data.hotv3[0]] +' '+image[data.hotv3[1]] +' '+ image[data.hotv3[2]] +' '+image[data.hotv3[3]])
      }
      if(hotvActive == true && singleLetter == true){
          $('#patient1').html(image[data.hotv[0]])
          $('#patient2').html(image[data.hotv2[0]])
          $('#patient3').html(image[data.hotv3[0]])
      }
    $("h2").html("20/100 <br /> 20/80 <br /> 20/70");
  }
   if (data.size == 605040 ){

     clear();

     firstLine.className = ("tumble60");
     secondLine.className = ("tumble50");
     thirdLine.className = ("tumble40");
     if(fontType == false && singleLetter == false){
   $('#patient1').html("<img src='/images/" + image[numbers[0]] + "'/> <img src='/images/" + image[numbers[1]] + "' /> <img src='/images/" + image[numbers[2]] + "'/> <img src='/images/" + image[numbers[3]] + "'/> <img src='/images/" + image[numbers[4]] + "'/>" );
   $('#patient2').html("<img src='/images/" + image[numbers2[0]] + "'/> <img src='/images/" + image[numbers2[1]] + "' /> <img src='/images/" + image[numbers2[2]] + "' /> <img src='/images/" + image[numbers2[3]] + "' /> <img src='/images/" + image[numbers2[4]] + "'/>" );
   $('#patient3').html("<img src='/images/" + image[numbers3[0]] + "'/> <img src='/images/" + image[numbers3[1]] + "' /> <img src='/images/" + image[numbers3[2]] + "' /> <img src='/images/" + image[numbers3[3]] + "' /> <img src='/images/" + image[numbers3[4]] + "' />" );
   } if (fontType == true && singleLetter == false) {
   $("#patient1").html( "&nbsp"+image[numbers[0]] + " " + image[numbers[1]] + " "+ image[numbers[2]]+ " "+ image[numbers[3]]+ " "+ image[numbers[4]]);
   $("#patient2").html( "&nbsp"+image[numbers2[0]] + " " + image[numbers2[1]] + " "+ image[numbers2[2]] + " "+ image[numbers2[3]] + " "+ image[numbers2[4]] );
   $("#patient3").html( "&nbsp"+image[numbers3[0]] + " " + image[numbers3[1]] + " "+ image[numbers3[2]] + " "+ image[numbers3[3]] + " "+ image[numbers3[4]] );
   } if(fontType == false && singleLetter == true){
   $('#patient1').html("<img src='/images/" + image[numbers[1]] + "'/> ");
   $('#patient2').html("<img src='/images/" + image[numbers[2]] + "'/> ");
   $('#patient3').html("<img src='/images/" + image[numbers[3]] + "'/> ");
   } if (fontType == true && singleLetter == true){
   $("#patient1").html(image[numbers[1]]);
   $("#patient2").html(image[numbers[2]]);
   $("#patient3").html(image[numbers[3]]);

   }    if(hotvActive == true && singleLetter == false){
         $('#patient1').html(image[data.hotv[0]] +' '+image[data.hotv[1]] +' '+ image[data.hotv[2]] +' '+image[data.hotv[3]])
         $('#patient2').html(image[data.hotv2[0]] +' '+image[data.hotv2[1]] +' '+ image[data.hotv2[2]] +' '+image[data.hotv2[3]])
         $('#patient3').html(image[data.hotv3[0]] +' '+image[data.hotv3[1]] +' '+ image[data.hotv3[2]] +' '+image[data.hotv3[3]])
       }
       if(hotvActive == true && singleLetter == true){
           $('#patient1').html(image[data.hotv[0]])
           $('#patient2').html(image[data.hotv2[0]])
           $('#patient3').html(image[data.hotv3[0]])
       }
    $("h2").html("20/60 <br /> 20/50 <br /> 20/40");

  }
   if (data.size == 302520 ){
     clear();

     firstLine.className = ("tumble30");
     secondLine.className = ("tumble25");
     thirdLine.className = ("tumble20");
     if(fontType == false && singleLetter == false){
   $('#patient1').html("<img src='/images/" + image[numbers[0]] + "'/> <img src='/images/" + image[numbers[1]] + "' /> <img src='/images/" + image[numbers[2]] + "'/> <img src='/images/" + image[numbers[3]] + "'/> <img src='/images/" + image[numbers[4]] + "'/>" );
   $('#patient2').html("<img src='/images/" + image[numbers2[0]] + "'/> <img src='/images/" + image[numbers2[1]] + "' /> <img src='/images/" + image[numbers2[2]] + "' /> <img src='/images/" + image[numbers2[3]] + "' /> <img src='/images/" + image[numbers2[4]] + "'/>" );
   $('#patient3').html("<img src='/images/" + image[numbers3[0]] + "'/> <img src='/images/" + image[numbers3[1]] + "' /> <img src='/images/" + image[numbers3[2]] + "' /> <img src='/images/" + image[numbers3[3]] + "' /> <img src='/images/" + image[numbers3[4]] + "' />" );
   } if (fontType == true && singleLetter == false) {
   $("#patient1").html( "&nbsp"+image[numbers[0]] + " " + image[numbers[1]] + " "+ image[numbers[2]]+ " "+ image[numbers[3]]+ " "+ image[numbers[4]]);
   $("#patient2").html( "&nbsp"+image[numbers2[0]] + " " + image[numbers2[1]] + " "+ image[numbers2[2]] + " "+ image[numbers2[3]] + " "+ image[numbers2[4]] );
   $("#patient3").html( "&nbsp"+image[numbers3[0]] + " " + image[numbers3[1]] + " "+ image[numbers3[2]] + " "+ image[numbers3[3]] + " "+ image[numbers3[4]] );
   } if(fontType == false && singleLetter == true){
   $('#patient1').html("<img src='/images/" + image[numbers[1]] + "'/> ");
   $('#patient2').html("<img src='/images/" + image[numbers[2]] + "'/> ");
   $('#patient3').html("<img src='/images/" + image[numbers[3]] + "'/> ");
   } if (fontType == true && singleLetter == true){
   $("#patient1").html(image[numbers[1]]);
   $("#patient2").html(image[numbers[2]]);
   $("#patient3").html(image[numbers[3]]);

   }  if(hotvActive == true && singleLetter == false){
         $('#patient1').html(image[data.hotv[0]] +' '+image[data.hotv[1]] +' '+ image[data.hotv[2]] +' '+image[data.hotv[3]])
         $('#patient2').html(image[data.hotv2[0]] +' '+image[data.hotv2[1]] +' '+ image[data.hotv2[2]] +' '+image[data.hotv2[3]])
         $('#patient3').html(image[data.hotv3[0]] +' '+image[data.hotv3[1]] +' '+ image[data.hotv3[2]] +' '+image[data.hotv3[3]])
       }
       if(hotvActive == true && singleLetter == true){
           $('#patient1').html(image[data.hotv[0]])
           $('#patient2').html(image[data.hotv2[0]])
           $('#patient3').html(image[data.hotv3[0]])
       }
    $("h2").html("20/30 <br /> 20/25 <br /> 20/20");

  }
   if (data.size == 6020 ){
     clear();

     firstLine.className = ("tumble60");
     secondLine.className = ("tumble50");
     thirdLine.className = ("tumble40");
     fourthLine.className = ("tumble30");
     fifthLine.className = ("tumble25");
     sixthLine.className = ("tumble20");
     if(fontType == false && singleLetter == false){
   $('#patient1').html("<img src='/images/" + image[numbers[0]] + "'/> <img src='/images/" + image[numbers[1]] + "' /> <img src='/images/" + image[numbers[2]] + "'/> <img src='/images/" + image[numbers[3]] + "'/> <img src='/images/" + image[numbers[4]] + "'/>" );
   $('#patient2').html("<img src='/images/" + image[numbers2[0]] + "'/> <img src='/images/" + image[numbers2[1]] + "' /> <img src='/images/" + image[numbers2[2]] + "' /> <img src='/images/" + image[numbers2[3]] + "' /> <img src='/images/" + image[numbers2[4]] + "'/>" );
   $('#patient3').html("<img src='/images/" + image[numbers3[0]] + "'/> <img src='/images/" + image[numbers3[1]] + "' /> <img src='/images/" + image[numbers3[2]] + "' /> <img src='/images/" + image[numbers3[3]] + "' /> <img src='/images/" + image[numbers3[4]] + "' />" );
   $('#patient4').html("<img src='/images/" + image[numbers4[0]] + "'/> <img src='/images/" + image[numbers4[1]] + "' /> <img src='/images/" + image[numbers4[2]] + "'/> <img src='/images/" + image[numbers4[3]] + "'/> <img src='/images/" + image[numbers4[4]] + "'/>" );
   $('#patient5').html("<img src='/images/" + image[numbers5[0]] + "'/> <img src='/images/" + image[numbers5[1]] + "' /> <img src='/images/" + image[numbers5[2]] + "' /> <img src='/images/" + image[numbers5[3]] + "' /> <img src='/images/" + image[numbers5[4]] + "'/>" );
   $('#patient6').html("<img src='/images/" + image[numbers6[0]] + "'/> <img src='/images/" + image[numbers6[1]] + "' /> <img src='/images/" + image[numbers6[2]] + "' /> <img src='/images/" + image[numbers6[3]] + "' /> <img src='/images/" + image[numbers6[4]] + "' />" );
   } if (fontType == true && singleLetter == false) {
   $("#patient1").html("&nbsp"+image[numbers[0]] + " " + image[numbers[1]] + " "+ image[numbers[2]]+ " "+ image[numbers[3]]+ " "+ image[numbers[4]]);
   $("#patient2").html("&nbsp"+image[numbers2[0]] + " " + image[numbers2[1]] + " "+ image[numbers2[2]] + " "+ image[numbers2[3]] + " "+ image[numbers2[4]] );
   $("#patient3").html("&nbsp"+image[numbers3[0]] + " " + image[numbers3[1]] + " "+ image[numbers3[2]] + " "+ image[numbers3[3]] + " "+ image[numbers3[4]] );
   $("#patient4").html("&nbsp"+image[numbers4[0]] + " " + image[numbers4[1]] + " "+ image[numbers4[2]] + " "+ image[numbers4[3]] + " "+ image[numbers4[4]] );
   $("#patient5").html("&nbsp"+image[numbers5[0]] + " " + image[numbers5[1]] + " "+ image[numbers5[2]] + " "+ image[numbers5[3]] + " "+ image[numbers5[4]] );
   $("#patient6").html("&nbsp"+image[numbers6[0]] + " " + image[numbers6[1]] + " "+ image[numbers6[2]] + " "+ image[numbers6[3]] + " "+ image[numbers6[4]] );
   } if(fontType == false && singleLetter == true){
   $('#patient1').html("<img src='/images/" + image[numbers[1]] + "'/> ");
   $('#patient2').html("<img src='/images/" + image[numbers[2]] + "'/> ");
   $('#patient3').html("<img src='/images/" + image[numbers[3]] + "'/> ");
   $('#patient4').html("<img src='/images/" + image[numbers[4]] + "'/> ");
   $('#patient5').html("<img src='/images/" + image[numbers[0]] + "'/> ");
   $('#patient6').html("<img src='/images/" + image[numbers[2]] + "'/> ");
   } if (fontType == true && singleLetter == true){
   $("#patient1").html(image[numbers[1]]);
   $("#patient2").html(image[numbers[2]]);
   $("#patient3").html(image[numbers[3]]);
   $("#patient4").html(image[numbers[4]]);
   $("#patient5").html(image[numbers[0]]);
   $("#patient6").html(image[numbers[2]]);

   }  if(hotvActive == true && singleLetter == false){
         $('#patient1').html(image[data.hotv[0]] +' '+image[data.hotv[1]] +' '+ image[data.hotv[2]] +' '+image[data.hotv[3]])
         $('#patient2').html(image[data.hotv2[0]] +' '+image[data.hotv2[1]] +' '+ image[data.hotv2[2]] +' '+image[data.hotv2[3]])
         $('#patient3').html(image[data.hotv3[0]] +' '+image[data.hotv3[1]] +' '+ image[data.hotv3[2]] +' '+image[data.hotv3[3]])
         $('#patient4').html(image[data.hotv4[0]] +' '+image[data.hotv4[1]] +' '+ image[data.hotv4[2]] +' '+image[data.hotv4[3]])
         $('#patient5').html(image[data.hotv5[0]] +' '+image[data.hotv5[1]] +' '+ image[data.hotv5[2]] +' '+image[data.hotv5[3]])
         $('#patient6').html(image[data.hotv6[0]] +' '+image[data.hotv6[1]] +' '+ image[data.hotv6[2]] +' '+image[data.hotv6[3]])
       }
       if(hotvActive == true && singleLetter == true){
           $('#patient1').html(image[data.hotv[0]])
           $('#patient2').html(image[data.hotv2[0]])
           $('#patient3').html(image[data.hotv3[0]])
           $('#patient4').html(image[data.hotv4[0]])
           $('#patient5').html(image[data.hotv5[0]])
           $('#patient6').html(image[data.hotv6[0]])
       }
    $("h2").html("20/60 <br /> 20/50 <br /> 20/40 <br />20/30 <br /> 20/25 <br /> 20/20");

  }

   if (data.size == "mode1"){
     clear();
     fontType = true;
     hotvActive = false;
    image = letters;
  }if (data.size == "mode2"){
    clear();
    fontType = true;
    image = numbersImg;
    hotvActive = false;
  }if (data.size == "mode3"){
    clear();
    fontType = true;
    image = ees;
    hotvActive = false;
  } if (data.size == "mode4"){
    clear();
    fontType = true;
    image = pictures;
    hotvActive = false;
  }   if(size == 'hotv'){
      clear()
       hotvActive = true;
       image = hotv;
     }


  if(size == "grow"){
    grow();
  }
  if(size == "shrink"){
    shrink();
  }
  if(size == "reset"){
    reset();
  }
  if(size == "mirror"){
    mirror();
  }
  if(size == "duochrome"){
    duochrome();
  }
  if(size == "mute"){
    mute();
  }



  function duochrome() {
      $("html").toggleClass("duochrome");
      $("#background").toggleClass("background");

    }




    function mute(){
    if ($("#cover").css("display")=="none"){
      $("#cover").css("display", "block");
    } else {
       $("#cover").css("display", "none");
    }
  }











});
//replace up here
function grow(){
    currentZoom += 1;

    localStorage.setItem("size", currentZoom);
    $.ajax({
      url: '/calibrate',
      type: 'post',
      data: {
        calibration: currentZoom,
        location: localStorage.getItem('location')
      },
      success: function(){
        $("#content").css('font-size', currentZoom + 'px');
      }
    })
    // $("#content").css('height', currentZoom + 'px');
    // document.cookie = "storeSize="+currentZoom+"; expires=Thu, 18 Dec 2040 12:00:00 UTC;"
    // localStorage.setItem("storeSize", currentZoom);
    // console.log("grow triggered");
}


function shrink(){
   currentZoom -= 1;
   localStorage.setItem('size', currentZoom);
   $.ajax({
     url: '/calibrate',
     type: 'post',
     data: {
       calibration: currentZoom,
       location: localStorage.getItem('location')
     },
     success: function(){
       $("#content").css('font-size', currentZoom + 'px');
     }
   })
}

$(document).keydown(event=>{
  if(event.which == 187){
    grow()
  }
  if(event.which == 189){
    shrink()
  }
})


  $(document).ready(function(){
    var numbers;
    if (!localStorage.getItem('size')) {
      currentZoom = 40;
    } else {
      $("#content").css('font-size', localStorage.getItem('size') + "px");
    }
    var invert2 = localStorage.getItem('mirror');
    if (invert2 == 1){
        $("#testDisplay").addClass("mirror");
    }
  })




</script>
</body>
</html>
