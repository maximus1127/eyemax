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
            <td>${this.pt_name}</td>
              <td id="pt_id">${this.pt_id}</td>
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
    $("#encounter_number").val(`${e.pt_id}`);
    $("#pat-button").removeClass("btn-danger");
    $("#pat-button").addClass("btn-success");
    $("#ptInfoModal").modal("hide");
}

function enterManualPt() {
    var pt = prompt("Enter Encounter Number");
    $.ajax({
        url: "/api/new-encounter",
        type: "post",
        data: {
            location: localStorage.getItem("location"),
            pt_id: pt,
            pt_name: ""
        },
        success: function() {
            $("#ptInfo").html(`${pt}`);
            $("#encounter_number").val(`${pt}`);
            $("#pat-button").removeClass("btn-danger");
            $("#pat-button").addClass("btn-success");
            $("#ptInfoModal").modal("hide");
        }
    });
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

//lensometer section

available_lms = [];
function autolensometerModal() {
    if (!$("#ptInfo").is(':contains("No Data")')) {
        $.ajax({
            url: "/get-unassigned-lm",
            type: "get",
            data: {
                location: localStorage.getItem("location")
            },
            success: function(data) {
                //            console.log(data)
                $("#autolensometerBody tr").remove();
                $(data).each(function(d) {
                    console.log(this);
                    available_lms[d] = this;
                    $("#autolensometerBody").append(`
                        <tr ondblclick="selectLm(${d})">
                          <td>${moment(this.created_at).format("LLL")}</td>
                          <td>OD: <span id="lm_sph_od">${numeral(
                              this.la01
                          ).format(
                              "+0.00"
                          )}</span> <span id="lm_cyl_od">${numeral(this.la02).format("0.00")}</span> x <span id="lm_axis_od">${numeral(this.la03).format("000")}</span> <span id="lm_add_od"> Add: ${numeral(this.la04).format("0.00")}</span><br>OS: <span id="lm_sph_os">${numeral(this.la05).format("+0.00")}</span> <span id = "lm_cyl_os">${numeral(this.la06).format("0.00")}</span> x <span id="lm_axis_os">${numeral(this.ar07).format("000")}</span><span id="lm_add_os"> Add: ${numeral(this.la08).format("0.00")}</span></td>
                        </tr>
                        `);
                });
            }
        });
        $("#autolensometerModal").modal("show");
    } else {
        alert("Please select a patient first");
    }
}

function selectLm(lm) {
    e = available_lms[lm];
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

    $.ajax({
        url: "/assign-ar",
        type: "post",
        data: {
            ar: e,
            patient: $("#pt_id").html()
        },
        success: function() {
            $("#lm-button").removeClass("btn-danger");
            $("#lm-button").addClass("btn-success");
            $("#autolensometerModal").modal("hide");
        }
    });
}

function enterManualLm() {
    if ($(".manualLm").length == 0) {
        $("#autolensometerBody").append(`
      <tr class="manualLm">
        <td></td>
        <td>
          OD: <input id="manual_lm_sphere_od"> -<input id="manual_lm_cyl_od"> x <input id="manual_lm_axis_od"> Add: <input id="manual_lm_add_od">
          <br><br>
          OS: <input id="manual_lm_sphere_os"> -<input id="manual_lm_cyl_os"> x <input id="manual_lm_axis_os"> Add: <input id="manual_lm_add_os">
        </td>
      </tr>
      `);
    }
}

function acceptManualLm() {
    available_lms["man"] = {};
    available_lms["man"] = {
        la01: numeral($("#manual_lm_sphere_od").val()).format("+0.00"),
        la02: numeral($("#manual_lm_cyl_od").val() * -1).format("0.00"),
        la03: numeral($("#manual_lm_axis_od").val()).format("000"),
        la04: numeral($("#manual_lm_add_od").val()).format("0.00"),
        la05: numeral($("#manual_lm_sphere_os").val()).format("+0.00"),
        la06: numeral($("#manual_lm_cyl_os").val() * -1).format("0.00"),
        la07: numeral($("#manual_lm_axis_os").val()).format("000"),
        la08: numeral($("#manual_lm_add_os").val()).format("0.00"),
        id: $("#pt_id").html()
    };
    selectLm("man");
}

// end lensometer functions

//keratometer functions

available_kms = [];
function autokeratometerModal() {
    if (!$("#ptInfo").is(':contains("No Data")')) {
        $("#autokeratometerModal").modal("show");
    } else {
        alert("Please select a patient first");
    }
}

function selectKm(km) {
    e = available_kms[km];

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

    $.ajax({
        url: "/assign-ar",
        type: "post",
        data: {
            ar: e,
            patient: $("#pt_id").html()
        },
        success: function() {
            $("#km-button").removeClass("btn-danger");
            $("#km-button").addClass("btn-success");
            $("#autokeratometerModal").modal("hide");
        }
    });
}

function enterManualKm() {
    if ($(".manualKm").length == 0) {
        $("#autokeratometerBody").append(`
      <tr class="manualKm">
        <td></td>
        <td>
          OD: <input id="manual_km_flat_od"> x <input id="manual_km_flat_axis_od"> / <input id="manual_km_steep_od"> x <input id="manual_km_steep_axis_od">
          <br><br>
          OS: <input id="manual_km_flat_os"> x <input id="manual_km_flat_axis_os"> / <input id="manual_km_steep_os"> x <input id="manual_km_steep_axis_os">
        </td>
      </tr>
      `);
    }
}

function acceptManualKm() {
    available_kms["man"] = {};
    available_kms["man"] = {
        ar08: numeral($("#manual_km_flat_od").val()).format("00.00"),
        ar09: numeral($("#manual_km_flat_axis_od").val()).format("000"),
        ar12: numeral($("#manual_km_steep_od").val()).format("00.00"),
        ar13: numeral($("#manual_km_steep_axis_od").val()).format("000"),
        ar10: numeral($("#manual_km_flat_os").val()).format("00.00"),
        ar11: numeral($("#manual_km_flat_axis_os").val()).format("000"),
        ar14: numeral($("#manual_km_steep_os").val()).format("00.00"),
        ar15: numeral($("#manual_km_steep_axis_os").val()).format("000"),
        id: $("#pt_id").html()
    };
    selectKm("man");
}

// end keratometer functions
