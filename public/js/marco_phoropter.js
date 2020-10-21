var changeAmount = 0.25;
var axisChangeAmount = 1;
var dist = "far";
var subjectiveData = [];
var finalData = [];

var specData = [
    refInfo.la01,
    refInfo.la05,
    refInfo.la02,
    refInfo.la06,
    refInfo.la03,
    refInfo.la07,
    refInfo.la04,
    refInfo.la08
];

var arData = [
    refInfo.ar02,
    refInfo.ar05,
    refInfo.ar03,
    refInfo.ar06,
    refInfo.ar04,
    refInfo.ar07
];
var sphEqOD = 0;
var sphEqOS = 0;
var plano = ["0.00", "0.00", "0.00", "0.00", "000", "000"];
var planoOn = false;
var phorButtons = $(".phorButton");
var curEye = "od";
$(document).keydown(function(event) {
    if ($("#odSelect").hasClass("phorEyeActive")) {
        curEye = "od";
    } else if ($("#osSelect").hasClass("phorEyeActive")) {
        curEye = "os";
    } else if ($("#ouSelect").hasClass("phorEyeActive")) {
        curEye = "ou";
    }
    if (event.which == 96) {
        changeAmount = 0.5;
        axisChangeAmount = 5;
    }

    if (
        $("#subjRx").hasClass("ref-data-active") ||
        $("#finRx").hasClass("ref-data-active")
    ) {
        // plus or minus sphere
        if (event.which == 105) {
            if (curEye == "ou") {
                odSph = parseFloat($(phorButtons[3]).html());
                osSph = parseFloat($(phorButtons[5]).html());

                odSph += changeAmount;
                osSph += changeAmount;

                $(phorButtons[3]).html(numeral(odSph).format("+0.00"));
                $(phorButtons[5]).html(numeral(osSph).format("+0.00"));

                $(".ref-data-active .odSphere").html(
                    numeral(odSph).format("+0.00")
                );
                $(".ref-data-active .osSphere").html(
                    numeral(osSph).format("+0.00")
                );
            } else {
                curPow = parseFloat(
                    $(".ref-data-active ." + curEye + "Sphere").html()
                );
                curPow += changeAmount;
                $(".ref-data-active ." + curEye + "Sphere").html(
                    numeral(curPow).format("+0.00")
                );
                var elems = document.getElementsByClassName(
                    "phorEyeActive " + curEye + "Sphere"
                );
                $(elems).html(numeral(curPow).format("+0.00"));
            }
        }
        if (event.which == 103) {
            if (curEye == "ou") {
                odSph = parseFloat($(phorButtons[3]).html());
                osSph = parseFloat($(phorButtons[5]).html());

                odSph -= changeAmount;
                osSph -= changeAmount;

                $(phorButtons[3]).html(numeral(odSph).format("+0.00"));
                $(phorButtons[5]).html(numeral(osSph).format("+0.00"));

                $(".ref-data-active .odSphere").html(
                    numeral(odSph).format("+0.00")
                );
                $(".ref-data-active .osSphere").html(
                    numeral(osSph).format("+0.00")
                );
            } else {
                org_val = $(".ref-data-active ." + curEye + "Sphere").html();
                trim_val = org_val.replace("+", "");
                curPow = parseFloat(trim_val);
                curPow -= changeAmount;
                $(".ref-data-active ." + curEye + "Sphere").html(
                    numeral(curPow).format("+0.00")
                );
                var elems = document.getElementsByClassName(
                    "phorEyeActive " + curEye + "Sphere"
                );
                $(elems).html(numeral(curPow).format("+0.00"));
            }
        }
        // end plus or minus sphere

        // plus or minus cyl
        if (event.which == 100) {
            curPow = parseFloat(
                $(".ref-data-active ." + curEye + "Cyl").html()
            );
            curPow -= changeAmount;
            //calculate spherical equivalent
            if (curEye == "od") {
                if (Math.abs(sphEqOD - curPow) >= 0.5) {
                    sphEqOD = curPow;
                    curSph = parseFloat(
                        $(".ref-data-active ." + curEye + "Sphere").html()
                    );
                    curSph += changeAmount;
                    $(".ref-data-active ." + curEye + "Sphere").html(
                        numeral(curSph).format("+0.00")
                    );
                    var elems = document.getElementsByClassName(
                        "phorEyeActive " + curEye + "Sphere"
                    );
                    $(elems).html(numeral(curSph).format("+0.00"));
                }
            } else if (curEye == "os") {
                if (Math.abs(sphEqOS - curPow) >= 0.5) {
                    sphEqOS = curPow;
                    curSph = parseFloat(
                        $(".ref-data-active ." + curEye + "Sphere").html()
                    );
                    curSph += changeAmount;
                    $(".ref-data-active ." + curEye + "Sphere").html(
                        numeral(curSph).format("+0.00")
                    );
                    var elems = document.getElementsByClassName(
                        "phorEyeActive " + curEye + "Sphere"
                    );
                    $(elems).html(numeral(curSph).format("+0.00"));
                }
            }
            //end calculate spherical equivalent
            $(".ref-data-active ." + curEye + "Cyl").html(
                numeral(curPow).format("+0.00")
            );
            var elems = document.getElementsByClassName(
                "phorEyeActive " + curEye + "Cyl"
            );
            $(elems).html(numeral(curPow).format("+0.00"));
        }
        if (event.which == 102) {
            curPow = parseFloat(
                $(".ref-data-active ." + curEye + "Cyl").html()
            );
            if (curPow != 0) {
                curPow += changeAmount;
            }
            //calculate spherical equivalent
            if (curEye == "od") {
                if (Math.abs(sphEqOD - curPow) >= 0.5) {
                    sphEqOD = curPow;
                    curSph = parseFloat(
                        $(".ref-data-active ." + curEye + "Sphere").html()
                    );
                    curSph -= changeAmount;
                    $(".ref-data-active ." + curEye + "Sphere").html(
                        numeral(curSph).format("+0.00")
                    );
                    var elems = document.getElementsByClassName(
                        "phorEyeActive " + curEye + "Sphere"
                    );
                    $(elems).html(numeral(curSph).format("+0.00"));
                }
            } else if (curEye == "os") {
                if (Math.abs(sphEqOS - curPow) >= 0.5) {
                    sphEqOS = curPow;
                    curSph = parseFloat(
                        $(".ref-data-active ." + curEye + "Sphere").html()
                    );
                    curSph -= changeAmount;
                    $(".ref-data-active ." + curEye + "Sphere").html(
                        numeral(curSph).format("+0.00")
                    );
                    var elems = document.getElementsByClassName(
                        "phorEyeActive " + curEye + "Sphere"
                    );
                    $(elems).html(numeral(curSph).format("+0.00"));
                }
            }
            //end calculate spherical equivalent
            $(".ref-data-active ." + curEye + "Cyl").html(
                numeral(curPow).format("+0.00")
            );
            var elems = document.getElementsByClassName(
                "phorEyeActive " + curEye + "Cyl"
            );
            $(elems).html(numeral(curPow).format("+0.00"));
        }
        // end plus or minus cyl

        // plus or minus axis
        if (event.which == 97) {
            curPow = parseFloat(
                $(".ref-data-active ." + curEye + "Axis").html()
            );
            curPow -= axisChangeAmount;

            if (curPow < 1) curPow = 180;
            $(".ref-data-active ." + curEye + "Axis").html(
                numeral(curPow).format("000")
            );
            var elems = document.getElementsByClassName(
                "phorEyeActive " + curEye + "Axis"
            );
            $(elems).html(numeral(curPow).format("000"));
        }
        if (event.which == 99) {
            curPow = parseFloat(
                $(".ref-data-active ." + curEye + "Axis").html()
            );
            curPow += axisChangeAmount;
            if (curPow > 180) curPow = 001;
            $(".ref-data-active ." + curEye + "Axis").html(
                numeral(curPow).format("000")
            );
            var elems = document.getElementsByClassName(
                "phorEyeActive " + curEye + "Axis"
            );
            $(elems).html(numeral(curPow).format("000"));
        }
        // end plus or minus axis

        // plus or minus add
        if (event.which == 109) {
            curPow = parseFloat($(phorButtons[14]).html());
            curPow -= changeAmount;
            $(".ref-data-active .odAdd").html(numeral(curPow).format("+0.00"));
            $(".ref-data-active .osAdd").html(numeral(curPow).format("+0.00"));
            $(phorButtons[12]).html(numeral(curPow).format("+0.00"));
            $(phorButtons[14]).html(numeral(curPow).format("+0.00"));
        }
        if (event.which == 107) {
            curPow = parseFloat($(phorButtons[14]).html());
            curPow += changeAmount;
            $(".ref-data-active .odAdd").html(numeral(curPow).format("+0.00"));
            $(".ref-data-active .osAdd").html(numeral(curPow).format("+0.00"));
            $(phorButtons[12]).html(numeral(curPow).format("+0.00"));
            $(phorButtons[14]).html(numeral(curPow).format("+0.00"));
        }
        // end plus or minus add

        if (event.which == 111) {
            curEye = "od";
            $("*").removeClass("phorEyeActive");
            $(".odButtons").addClass("phorEyeActive");
        }
        if (event.which == 106) {
            curEye = "os";
            $("*").removeClass("phorEyeActive");
            $(".osButtons").addClass("phorEyeActive");
        }
        if (event.which == 101) {
            curEye = "ou";
            $("*").removeClass("phorEyeActive");
            $([phorButtons[1], phorButtons[3], phorButtons[5]]).addClass(
                "phorEyeActive"
            );
        }
        if (event.which == 34) {
            dist = "near";
        }
        if (event.which == 33) {
            dist = "far";
        }
        if ($("#subjRx").hasClass("ref-data-active")) {
            createSubjectiveDataArray();
        } else if ($("#finRx").hasClass("ref-data-active")) {
            createFinalDataArray();
        }

        if (event.which == 13) {
            $("#finRxp").html("");
            // console.log(finalData);
            $("#finRxp").html(`
        <p><span class="odSphere">${subjectiveData[1]}</span><span class="odCyl"> ${subjectiveData[3]}</span> x <span class="odAxis">${subjectiveData[5]}</span> <span style="color: lightsteelblue; float:right" id="odDistVisionFinal"></span></p>
        <p><span class="osSphere">${subjectiveData[2]}</span><span class="osCyl"> ${subjectiveData[4]}</span> x <span class="osAxis">${subjectiveData[6]}</span> <span style="color: lightsteelblue; float: right" id="osDistVisionFinal"></span></p>
        <p><span style="color: lightsteelblue; float: right" id="ouDistVisionFinal"></span></p><br />
        <p><span style="color: lightsteelblue; float: left">Add: <span class="osAdd">${subjectiveData[8]}</span></p>
        `);
            finalData = [...subjectiveData];
        }
    }
});

$(document).keyup(function(event) {
    if (event.which == 96) {
        changeAmount = 0.25;
        axisChangeAmount = 1;
    }
});

$(document).ready(function() {
    $(".odButtons").addClass("phorEyeActive");
    createSubjectiveDataArray();
    sphEqOD = parseFloat($(phorButtons[6]).html());
    sphEqOS = parseFloat($(phorButtons[8]).html());
});

$(".ref-data").click(function(d) {
    rx = $(this).attr("id");
    if (rx == "subjRx") {
        $(phorButtons[3]).html(subjectiveData[1]);
        $(phorButtons[6]).html(subjectiveData[3]);
        $(phorButtons[9]).html(subjectiveData[5]);
        $(phorButtons[12]).html(subjectiveData[7]);
        $(phorButtons[5]).html(subjectiveData[2]);
        $(phorButtons[8]).html(subjectiveData[4]);
        $(phorButtons[11]).html(subjectiveData[6]);
        $(phorButtons[14]).html(subjectiveData[8]);
        createSubjectiveDataArray();
    }
    if (rx == "arRx") {
        $(phorButtons[3]).html(arData[0]);
        $(phorButtons[6]).html(arData[1]);
        $(phorButtons[9]).html(arData[2]);
        $(phorButtons[5]).html(arData[3]);
        $(phorButtons[8]).html(arData[4]);
        $(phorButtons[11]).html(arData[5]);
        arCopy = [...arData];
        arCopy.unshift(curEye);
        sendData(arCopy, "arRx");
    }
    if (rx == "specRx") {
        $(phorButtons[3]).html(specData[0]);
        $(phorButtons[6]).html(specData[1]);
        $(phorButtons[9]).html(specData[2]);
        $(phorButtons[12]).html(specData[3]);
        $(phorButtons[5]).html(specData[4]);
        $(phorButtons[8]).html(specData[5]);
        $(phorButtons[11]).html(specData[6]);
        $(phorButtons[14]).html(specData[7]);
        specCopy = [...specData];
        specCopy.unshift(curEye);
        sendData(specCopy, "specRx");
    }

    if (rx == "finRx") {
        $(phorButtons[3]).html(finalData[1]);
        $(phorButtons[6]).html(finalData[3]);
        $(phorButtons[9]).html(finalData[5]);
        $(phorButtons[12]).html(finalData[7]);
        $(phorButtons[5]).html(finalData[2]);
        $(phorButtons[8]).html(finalData[4]);
        $(phorButtons[11]).html(finalData[6]);
        $(phorButtons[14]).html(finalData[8]);
        createFinalDataArray();
    }

    $("*").removeClass("ref-data-active");
    $(this).toggleClass("ref-data-active");
});

$("#plano_button").click(function() {
    $("*").removeClass("ref-data-active");
    $(phorButtons[3]).html(plano[0]);
    $(phorButtons[6]).html(plano[1]);
    $(phorButtons[9]).html(plano[2]);
    $(phorButtons[12]).html(subjectiveData[7]);
    $(phorButtons[5]).html(plano[0]);
    $(phorButtons[8]).html(plano[1]);
    $(phorButtons[11]).html(plano[2]);
    $(phorButtons[14]).html(subjectiveData[8]);
    sendData(plano, "plano");
});

function createSubjectiveDataArray() {
    subjectiveData = [];
    $(".phorButton").each(function(e) {
        if (e > 2 && e != 4 && e != 7 && e != 10 && e != 13) {
            subjectiveData.push($(this).html());
        }
    });
    subjectiveData.unshift(curEye);
    subjectiveData[subjectiveData.length] = dist;
    sendData(subjectiveData, "subj");
}

function createFinalDataArray() {
    finalData = [];
    $(".phorButton").each(function(e) {
        if (e > 2 && e != 4 && e != 7 && e != 10 && e != 13) {
            finalData.push($(this).html());
        }
    });
    finalData.unshift(curEye);
    sendData(finalData, "fin");
}

function sendData(data, ar) {
    console.log(data);
    $.ajax({
        url: "/phoropter-sequence",
        type: "post",
        data: {
            refractive_info: data,
            ri_type: ar,
            location: refInfo.store_location_id
        }
    });
}
