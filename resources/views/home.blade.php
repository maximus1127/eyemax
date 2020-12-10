@extends('layouts.app')

@section('header-styles')
  <style>
    tr{
      cursor: pointer;
      border-bottom: 1px solid gray;
      height: 50px;

    }

    input{
      max-width: 50px;
    }

  </style>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          {{-- @foreach($ins as $in)
            <div class="btn btn-danger" onclick="serialConnect({{$in->id}}, this)" id="ins-button">{{$in->instrument->name}}</div>
          @endforeach --}}
          <div id="instrumentButton"></div>

          <br /><br />
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                  {{-- patient information --}}
                  <div>
                    <label>Patient Information</label>
                    <br />
                    <div class="row">
                      <div class="col-3">
                        <button class="btn btn-danger" onclick="ptModal()" id="pat-button">Select</button>
                      </div>
                      <div class="col-9">
                        <p id="ptInfo">No Data Selected</p>
                        <input type="hidden" id="encounter_number"/>
                      </div>
                    </div>
                  </div>
                  {{-- end patient information --}}
                  <hr />
                  {{-- auto refractor --}}
                  <div>
                    <label>Autorefractor</label>
                    <br />
                    <div class="row">
                      <div class="col-3">
                        <button class="btn btn-danger" id="ar-button" onclick="autorefractorModal()">Select</button>
                      </div>
                      <div class="col-9">
                        <p id="arInfo">No Data Selected</p>
                      </div>
                    </div>
                  </div>
                  {{-- end autorefractor --}}
                  <hr />
                  {{-- lensometer --}}
                  <div>
                    <label>Lensometer</label>
                    <br />
                    <div class="row">
                      <div class="col-3">
                        <button class="btn btn-danger" id="lm-button" onclick="autolensometerModal()">Select</button>
                      </div>
                      <div class="col-9">
                        <p id="lmInfo">No Data Selected</p>
                      </div>
                    </div>
                  </div>
                  {{-- end lensometer --}}
                  <hr />
                  {{-- keratometer --}}
                  <div>
                    <label>Keratometer</label>
                    <br />
                    <div class="row">
                      <div class="col-3">
                        <button class="btn btn-danger" id="km-button" onclick="autokeratometerModal()">Select</button>
                      </div>
                      <div class="col-9">
                        <p id="kmInfo">No Data Selected</p>
                      </div>
                    </div>
                  </div>
                  {{-- end keratometer --}}
                </div>
            </div>
        </div>
    </div>
</div>
@include('modals.marco_modals')
@endsection

@section('footer-scripts')

  <script src="{{asset('/js/marco_modal_functions.js')}}"></script>
  <script src="{{asset('/js/download.js')}}"> </script>
  <script src="{{asset('/js/serialclass.js')}}"> </script>
  <script src="{{asset('/js/serialconnections.js')}}"> </script>
  <script src="{{asset('/js/phoropter-socket-responses.js')}}"></script>
  {{-- <script src="https://2a1055a97d7d.ngrok.io/js/app.js"></script> --}}
  {{-- <script src="https://2a1055a97d7d.ngrok.io/js/marco_modal_functions.js"></script> --}}
  {{-- <script src="https://2a1055a97d7d.ngrok.io/js/serialclass.js"></script> --}}
  {{-- <script src="https://2a1055a97d7d.ngrok.io/js/serialconnections.js"></script> --}}
  {{-- <script src="https://2a1055a97d7d.ngrok.io/js/phoropter-socket-responses.js"></script> --}}
  <script>

    var chart;
    $(document).ready(function(){
      if(!localStorage.getItem('location')){
        var loc = prompt('Please enter the store location number');
        localStorage.setItem('location', loc);
      }

        chart = window.open("/patient-chart","PatientChart", "width=300, height=300, toolbar = 0, status=0,");
    })

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/get-store-instrument',
      type: 'get',
      data:{
        store: localStorage.getItem('location')
      },
      success: data => $("#instrumentButton").html(`<div class="btn btn-danger" onclick="serialConnect(${data.id}, this)" id="ins-button">${data.meta_name}</div>`)
    })




  </script>
@endsection
