// global ajax setup
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});
// end global ajax setup

// pt info selection
available_encounters = [];

function ptModal() {
    $.ajax({
        url: "/get-active-encounters",
        type: "get",
        data: {
            location: localStorage.getItem("location")
        },
        success: function(data) {
            $("#ptInfoBody tr").remove();
            $(data).each(function(d) {
                available_encounters[d] = this;
                $("#ptInfoBody").append(`
            <tr ondblclick="selectPt(${d})">
              <td id="pt_id">${this.pt_id}</td>
              <td>${this.pt_name}</td>
            </tr>
            `);
            });
        }
    });
    $("#ptInfoModal").modal("show");
}

function selectPt(en) {
    e = available_encounters[en];
    $("#ptInfo").html(`${e.pt_name} <br> ${e.pt_id}`);
    $("#pat-button").removeClass("btn-danger");
    $("#pat-button").addClass("btn-success");
    $("#ptInfoModal").modal("hide");
}
// end patient info selection

// autorefractor selection

available_ars = [];
function autorefractorModal() {
    if (!$("#ptInfo").is(':contains("No Data")')) {
        $.ajax({
            url: "/get-unassigned-ar",
            type: "get",
            data: {
                location: localStorage.getItem("location")
            },
            success: function(data) {
                //            console.log(data)
                $("#autorefractorBody tr").remove();
                $(data).each(function(d) {
                    console.log(this);
                    available_ars[d] = this;
                    $("#autorefractorBody").append(`
                        <tr ondblclick="selectAr(${d})">
                          <td>${moment(this.created_at).format("LLL")}</td>
                          <td>OD: <span id="ar_sph_od">${numeral(
                              this.ar02
                          ).format(
                              "+0.00"
                          )}</span> <span id="ar_cyl_od">${numeral(this.ar03).format("0.00")}</span> x <span id="ar_axis_od">${numeral(this.ar04).format("000")}</span><br>OS: <span id="ar_sph_os">${numeral(this.ar05).format("+0.00")}</span> <span id = "ar_cyl_os">${numeral(this.ar06).format("0.00")}</span> x <span id="ar_axis_os">${numeral(this.ar07).format("000")}</span></td>
                        </tr>
                        `);
                });
            }
        });
        $("#autorefractorModal").modal("show");
    } else {
        alert("Please select a patient first");
    }
}

function selectAr(ar) {
    e = available_ars[ar];
    $("#arInfo").html(
        `OD: <span id="ar_sph_od">${numeral(e.ar02).format(
            "+0.00"
        )}</span> <span id="ar_cyl_od">${numeral(e.ar03).format(
            "0.00"
        )}</span> x <span id="ar_axis_od">${numeral(e.ar04).format(
            "000"
        )}</span>
        <br>
        OS: <span id="ar_sph_os">${numeral(e.ar05).format(
            "+0.00"
        )}</span> <span id = "ar_cyl_os">${numeral(e.ar06).format(
            "0.00"
        )}</span> x <span id="ar_axis_os">${numeral(e.ar07).format(
            "000"
        )}</span>`
    );

    if (e.la01 || e.la05 || e.la04 || e.la08) {
        $("#lmInfo").html(
            `OD: <span id="lm_sph_od">${numeral(e.la01).format(
                "+0.00"
            )}</span> <span id="lm_cyl_od">${numeral(e.la02).format(
                "0.00"
            )}</span> x <span id="lm_axis_od">${numeral(e.la03).format(
                "000"
            )}</span>
        <br>
        <span id="lm_add_od">Add: ${numeral(e.la04).format("+0.00")}</span>
        <br>
        OS: <span id="ar_sph_os">${numeral(e.la05).format(
            "+0.00"
        )}</span> <span id = "ar_cyl_os">${numeral(e.la06).format(
                "0.00"
            )}</span> x <span id="ar_axis_os">${numeral(e.la07).format(
                "000"
            )}</span>
        <br>
        <span id="lm_add_os">Add: ${numeral(e.la08).format("+0.00")}</span>`
        );

        $("#lm-button").removeClass("btn-danger");
        $("#lm-button").addClass("btn-success");
    }

    if (e.ar08 || e.ar10) {
        $("#kmInfo").html(
            `OD: <span id="km_flat_od">${numeral(e.ar08).format(
                "00.00"
            )}</span> x <span id="km_flat_axis_od">${numeral(e.ar09).format(
                "000"
            )}</span> / <span id="km_steep_od">${numeral(e.ar12).format(
                "00.00"
            )}</span> x <span id="km_steep_axis_od">${numeral(e.ar13).format(
                "000"
            )}</span>
            <br>
            OS: <span id="km_flat_os">${numeral(e.ar10).format(
                "00.00"
            )}</span> x <span id="km_flat_axis_os">${numeral(e.ar11).format(
                "000"
            )}</span> / <span id="km_steep_os">${numeral(e.ar14).format(
                "00.00"
            )}</span> x <span id="km_steep_axis_os">${numeral(e.ar15).format(
                "000"
            )}</span>
      `
        );

        $("#km-button").removeClass("btn-danger");
        $("#km-button").addClass("btn-success");
    }

    $.ajax({
        url: "/assign-ar",
        type: "post",
        data: {
            ar: e,
            patient: $("#pt_id").html()
        },
        success: function() {
            $("#ar-button").removeClass("btn-danger");
            $("#ar-button").addClass("btn-success");
            $("#autorefractorModal").modal("hide");
        }
    });
}

function enterManualAr() {
    if ($(".manualAr").length == 0) {
        $("#autorefractorBody").append(`
      <tr class="manualAr">
        <td></td>
        <td>
          OD: <input id="manual_ar_sphere_od"> -<input id="manual_ar_cyl_od"> x <input id="manual_ar_axis_od">
          <br><br>
          OS: <input id="manual_ar_sphere_os"> -<input id="manual_ar_cyl_os"> x <input id="manual_ar_axis_os">
        </td>
      </tr>
      `);
    }
}

function acceptManualAr() {
    available_ars["man"] = {};
    available_ars["man"] = {
        ar02: numeral($("#manual_ar_sphere_od").val()).format("+0.00"),
        ar03: numeral($("#manual_ar_cyl_od").val() * -1).format("0.00"),
        ar04: numeral($("#manual_ar_axis_od").val()).format("000"),
        ar05: numeral($("#manual_ar_sphere_os").val()).format("+0.00"),
        ar06: numeral($("#manual_ar_cyl_os").val() * -1).format("0.00"),
        ar07: numeral($("#manual_ar_axis_os").val()).format("000"),
        id: $("#pt_id").html()
    };
    selectAr("man");
}

// end auto refractor selections
