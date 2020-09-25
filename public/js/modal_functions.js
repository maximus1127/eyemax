// global ajax setup
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
// end global ajax setup


// pt info selection
available_encounters = [];

function ptModal() {
    $.ajax({
        url: '/get-active-encounters',
        type: 'get',
        data: {
            location: localStorage.getItem('location')
        },
        success: function(data) {
            $('#ptInfoBody tr').detach();
            $(data).each(function(d) {
                available_encounters[d] = this;
                $("#ptInfoBody").after(`
            <tr ondblclick="selectPt(${d})">
              <td>${this.pt_id}</td>
              <td>${this.pt_name}</td>
            </tr>
            `)
          });
        }
    });
    $("#ptInfoModal").modal('show');
}


function selectPt(en) {
    e = available_encounters[en]
    $("#ptInfo").html(`${e.pt_name} <br> ${e.pt_id}`)
    $('#pat-button').removeClass('btn-danger')
    $("#ptInfoModal").modal('hide');
}
// end patient info selection

// autorefractor selection

available_ars = [];

function autorefractorModal() {
    $.ajax({
        url: '/get-unassigned-ar',
        type: 'get',
        data: {
            location: localStorage.getItem('location')
        },
        success: function(data) {
            $('#autorefractorBody tr').detach();
            $(data).each(function(d) {
                available_encounters[d] = this;
                $("#autorefractorBody").after(`
            <tr ondblclick="selectAr(${d})">
              <td>${moment(this.created_at).format("LLL")}</td>
              <td><span id="ar_sph_od">${numeral(this.ar02).format("0.00")}</span><span id="ar_cyl_od">${numeral(this.ar03.format("0.00")}</span> x <span id="ar_axis_od">${numeral(this.ar04).format("000")}</span><br><span id="ar_sph_os">${numeral(this.ar05).format("0.00")}</span><span id = "ar_cyl_os">${numeral(this.ar06).format("0.00")}</span> x <span id="ar_axis_os">${numeral(this.ar07).format("000")}</span></td>
            </tr>
            `)
            });
        }
    });
    $("#autorefractorModal").modal('show');
}



// end auto refractor selections
