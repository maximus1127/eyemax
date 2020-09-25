


{{-- Patient Info Modal --}}
<div class="modal fade" id="ptInfoModal" tabindex="-1" role="dialog" aria-labelledby="ptInfoModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ptInfoModalLabel">Pt Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table style="width: 100%">
          <thead>
            <th>Pt Name</th>
            <th>Pt Id</th>
          </thead>
          <tbody id="ptInfoBody">

          </tbody>
        </table>
      </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> --}}
    </div>
  </div>
</div>

{{-- end patient info modal --}}

{{-- auto refractor modal --}}
<div class="modal fade" id="autorefractorModal" tabindex="-1" role="dialog" aria-labelledby="autorefractorModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="autorefractorModalLabel">AutoRefractor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table style="width: 100%">
          <thead>
            <th>Timestamp</th>
            <th>Readings</th>
          </thead>
          <tbody id="autorefractorBody">

          </tbody>
        </table>
      </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> --}}
    </div>
  </div>
</div>
{{-- end auto refractor modal --}}