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
          @foreach($ins as $in)
            <div class="btn btn-danger" onclick="serialConnect({{$in->id}}, this)" id="ins-button">{{$in->instrument->name}}</div>
          @endforeach
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
  <script src="{{asset('js\marco_modal_functions.js')}}"></script>

  <script src="{{asset('js/serialclass.js')}}"> </script>
  <script src="{{asset('js/serialconnections.js')}}"> </script>
  <script>

    $(document).ready(function(){
      if(!localStorage.getItem('location')){
        var loc = prompt('Please enter the store location number');
        localStorage.setItem('location', loc);
      }
    })

  </script>
@endsection
