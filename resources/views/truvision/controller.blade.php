<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Truvision Acuity</title>
    <link href="{{asset('/css/truvision_controller.css')}}" rel="stylesheet"/>
</head>

<body class="container" onload="initialTrigger()">
	{{-- <div class="dropdown">
		<button class="dropbtn">Calibrate</button>
		<div class="dropdown-content">
			<button class="singleButtons" data-size = "shrink" id="zoomOut">Zoom Out</button>
			<button class="singleButtons" data-size = "grow" id="zoomIn">Zoom In</button>
			<button class="singleButtons" data-size = "mirror" id="mirror">Mirror</button>
			<button class="singleButtons" data-size = "reset" id="reset">Reset</button>
		</div>
	</div> --}}

<div id="vision_controls" class="col-6">
	<div class="row justify-content-center gutter margin-top" >
		<div class="logobackground">
			<div class="modeHolder">
				<div class="row justify-content-center">
				<button class="modeButton singleButtons modeButtonActive" id="singleLetter" data-size = "mode1" >Letters</button>
				<button class="modeButton singleButtons" id="number" data-size = "mode2">Numbers</button>
				<button class="modeButton singleButtons" id="tumblingE" data-size = "mode3">Tumbling E</button>
        <button class="modeButton singleButtons" id="duochrome" data-size = "duochrome">DuoChrome</button>
        <button class="modeButton singleButtons" id="picture" data-size = "mode4">LEA</button>
        {{-- <button class="singleButtons modeButton" id="colorPlates" data-size="colorPlates">Ishihara</button> --}}
      </div>
          {{-- <div class="row justify-content-center col-sm-3 col-md-3 col-lg-3"> --}}
				{{-- <button class="modeButton singleButtons" id="mute" data-size = "mute">Mute</button> --}}
        {{-- <button class="modeButton singleButtons" id="hotv" data-size="hotv">HOTV</button> --}}
				{{-- </div> --}}
			</div>

			<div class="lineHolder">
				<button class="singleButtons singleFilter" id="singleFilter" data-size="singleFilter">1</button>
        {{-- <button class="singleButtons retinoscopy" id="retinoscopy" data-size="retinoscopy">RS</button> --}}
        <button class="singleButtons colorPlates" id="colorPlates" data-size="colorPlates">CP</button>
				<button class="singleButtons" id="refresh" data-size="refresh">R</button>
        {{-- <button class="singleButtons" id="movie" data-size="movie">MV</button> --}}
				<div class="lineContent text">
             <p id="line1" class="soloLine singleButtons" data-size="solo1"></p>
             <p id="line2" class="soloLine singleButtons" data-size="solo2"></p>
             <p id="line3" class="soloLine singleButtons" data-size="solo3"></p>
             <p id="line4" class="soloLine singleButtons" data-size="solo4"></p>
             <p id="line5" class="soloLine singleButtons" data-size="solo5"></p>
             <p id="line6" class="soloLine singleButtons" data-size="solo6"></p>
				  </div>
			</div>

			<div class="modeHolder">
        <div id="sizeHolder">
        <div class="row justify-content-center ">
				<button class="modeButton singleButtons" data-clicker='1' id="fourHundred" data-size="400">20/400</button>
				<button class="modeButton singleButtons" data-clicker="2" id="threeHundred" data-size="300">20/300</button>
				<button class="modeButton singleButtons" data-clicker="3" id="twoHundred" data-size="200">20/200</button>
          <button class="modeButton singleButtons" data-clicker="4" id="oneHundred" data-size="100">20/100</button>
          <button class="modeButton singleButtons" data-clicker="5" id="eighty" data-size="80">20/80</button>
          <button class="modeButton singleButtons" data-clicker="6" id="seventy" data-size="70">20/70</button>
          <button class="modeButton singleButtons" data-clicker="7" id="sixty" data-size="60">20/60</button>

        </div>



				<div class="row justify-content-center ">
          <button class="modeButton singleButtons" data-clicker="8" id="fifty" data-size="50">20/50</button>
				  <button class="modeButton singleButtons" data-clicker="9" id="forty" data-size="40">20/40</button>
				<button class="modeButton singleButtons" data-clicker="10" id="thirty" data-size="30">20/30</button>
				<button class="modeButton singleButtons" data-clicker="11" id="twentyFive" data-size="25">20/25</button>
				<button class="modeButton singleButtons" data-clicker="12" id="twenty" data-size="20">20/20</button>
        <button class="modeButton singleButtons" data-clicker="13" id="fifteen" data-size="15">20/15</button>
        <button class="modeButton singleButtons" data-clicker="14" id="ten" data-size="10">20/10</button>
				</div>

				<div class="row justify-content-center">
					<hr style="width:80%"/>
				</div>

				<div class="row justify-content-center">

				<button class="modeButton singleButtons"  data-clicker="15" id="groupOne"  data-size = "400200" style="border: 5px solid #810815">400/200</button>
        <button class="modeButton singleButtons"  data-clicker="16" id="groupTwo" data-size = "1008070" style="border: 5px solid #810815">100/80/70</button>
        <button class="modeButton singleButtons"  data-clicker="17" id="groupThree" data-size = "605040" style="border: 5px solid #810815">60/50/40</button>
				<button class="modeButton singleButtons"  data-clicker="18" id="groupFour" data-size = "302520" style="border: 5px solid #810815">30/25/20</button>
				<button class="modeButton singleButtons"  data-clicker="19" id="groupSix" data-size = "6020" style="border: 5px solid #810815">60-20</button>
				</div>

      </div>
        <div id="colorHolder">
          <div class="row justify-content-center col-6 col-sm-6 col-md-6 col-lg-6">
  				<button class="modeButton singleButtons" id="plate1" data-size="cp12">12</button>
  				<button class="modeButton singleButtons" id="plate2" data-size="cp8">8</button>
  				<button class="modeButton singleButtons" id="plate3" data-size="cp29">29</button>
          <button class="modeButton singleButtons" id="plate4" data-size="cp51">5</button>
        	<button class="modeButton singleButtons" id="plate5" data-size="cp3">3</button>
          </div>
          <div class="row justify-content-center col-6 col-sm-6 col-md-6 col-lg-6">
  				<button class="modeButton singleButtons" id="plate6" data-size="cp15">15</button>
  				<button class="modeButton singleButtons" id="plate7" data-size="cp74">74</button>
          <button class="modeButton singleButtons" id="plate8" data-size="cp6">6</button>
          <button class="modeButton singleButtons" id="plate9" data-size="cp45">45</button>
          <button class="modeButton singleButtons" id="plate10" data-size="cp5">5</button>
          </div>
          <div class="row justify-content-center col-6 col-sm-6 col-md-6 col-lg-6">
  				<button class="modeButton singleButtons" id="plate11" data-size="cp7">7</button>
          <button class="modeButton singleButtons" id="plate12" data-size="cp16">16</button>
          <button class="modeButton singleButtons" id="plate13" data-size="cp73">73</button>
          <button class="modeButton singleButtons" id="plate14" data-size="cp26">26</button>
          <button class="modeButton singleButtons" id="plate15" data-size="cp42">42</button>
          </div>
        </div>


			</div>
		</div>
	</div>

</div>


{{-- phoropter controls --}}



<div id="phoropter_controls" class="col-6">
	<div class="row justify-content-center gutter margin-top" >
		<div class="logobackground" style="width: 100%">
			<div class="phorModeHolder" style="position: relative">
        <button type="button" id="plano_button">PL</button>
				<div class="row justify-content-center">


				      <div class="ref-data" id="specRx">
                <label><u>Spec Rx</u></label>
                <p>{{$en->la01}} {{($en->la02 != null? $en->la02.' x '.$en->la03 : "")}} <span style="color: lightsteelblue; float:right">Add: {{$en->la04}}</span> <br /> {{$en->la05}} {{($en->la06 != null? $en->la06.' x '.$en->la07 : "")}} <span style="color: lightsteelblue; float:right">Add: {{$en->la08}}</span></p>
              </div>
              <div class="ref-data" id="arRx">
                <label><u>Auto Ref</u></label>
                <p>{{$en->ar02.' '. ($en->ar03 != null? $en->ar03.' x '.$en->ar04 : "")}} <br /> {{$en->ar05.' '. ($en->ar06 != null? $en->ar06.' x '.$en->ar07 : "")}}</p>
              </div>
        </div>
        <div class="row justify-content-center">
              <div class="ref-data ref-data-active" id="subjRx">
                <label><u>Subjective</u></label>
                <p><span class="odSphere">{{$en->la01 ?? $en->ar02 ?? "+0.00"}}</span><span class="odCyl"> {{$en->la02 ?? $en->ar03 ?? "-0.00"}}</span> x <span class="odAxis">{{$en->la03 ?? $en->ar04 ?? "180"}}</span> <span style="color: lightsteelblue; float:right">Add: <span class="odAdd">{{$en->la04 ?? ""}}</span></span>
                <br />
                <span class="osSphere">{{$en->la05 ?? $en->ar05 ?? "+0.00"}}</span><span class="osCyl"> {{$en->la06 ?? $en->ar06 ?? "-0.00"}}</span> x <span class="osAxis">{{$en->la07 ?? $en->ar07 ?? "180"}}</span> <span style="color: lightsteelblue; float: right">Add: <span class="osAdd">{{$en->la08 ??""}}</span> </span></p>
              </div>
              <div class="ref-data" id="finRx">
                <label><u>Final</u></label>
                <p id="finRxp"></p>
              </div>
        </div>
			</div>

<br />


  			<div class="modeHolder">
          <div id="sizeHolder">
            <div class="row justify-content-center" style="border-bottom: 3px solid #810815;">
              <button class="phorButton odButtons" disabled  data-size="" id="odSelect">OD</button>
              <button class="phorButton ouButtons" disabled  data-size="" id="ouSelect">OU</button>
              <button class="phorButton osButtons" disabled  data-size="" id="osSelect">OS</button>
            </div>
            <div class="row justify-content-center ">
      				<button class="phorButton odButtons odSphere" disabled  data-size="" >{{$en->la01 ?? $en->ar02 ?? "+0.00"}}</button>
      				<button class="phorButton ouButtons" disabled  data-size="">Sphere</button>
      				<button class="phorButton osButtons osSphere" disabled  data-size="" >{{$en->la05 ?? $en->ar05 ?? "+0.00"}}</button>
            </div>
            <div class="row justify-content-center ">
              <button class="phorButton odButtons odCyl" disabled  data-size="" >{{$en->la02 ?? $en->ar03 ?? "-0.00"}}</button>
              <button class="phorButton ouButtons" disabled  data-size="">Cyl</button>
              <button class="phorButton osButtons osCyl" disabled  data-size="" >{{$en->la06 ?? $en->ar06 ?? "-0.00"}}</button>
            </div>
              <div class="row justify-content-center ">
              <button class="phorButton odButtons odAxis" disabled  data-size="" >{{$en->la03 ?? $en->ar04 ?? "180"}}</button>
              <button class="phorButton ouButtons" disabled  data-size="">Axis</button>
              <button class="phorButton osButtons osAxis" disabled  data-size="" >{{$en->la07 ?? $en->ar07 ?? "180"}}</button>
            </div>
            <div class="row justify-content-center ">
              <button class="phorButton odButtons odAdd" disabled  data-size="" >{{$en->la04 ??""}}</button>
              <button class="phorButton ouButtons" disabled  data-size="">Add</button>
              <button class="phorButton osButtons osAdd" disabled  data-size="" >{{$en->la08 ??""}}</button>
            </div>
          </div>
        </div>
			</div>
		</div>
	</div>

</div>

  <script src="{{asset('js/app.js')}}"></script>
	<script type="text/javascript" src="/js/truvision_control_screen.js"></script>
  <script> var refInfo = {!! $en !!}; </script>
  <script type="text/javascript" src="/js/marco_phoropter.js"></script>

</body>
</html>
