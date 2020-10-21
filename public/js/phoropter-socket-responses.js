master_phor = {
    current_eye: "od",
    odsph: null,
    odcyl: null,
    odaxis: null,
    odadd: null,
    ossph: null,
    oscyl: null,
    osaxis: null,
    osadd: null,
    dist: "far"
};

send_to_phor = "";
converted_hex = "";
Echo.channel(localStorage.getItem("location").toString()).listen(
    "PhoropterSequence",
    data => {
        // received subjective signal
        // console.log(data.refInfo);

        comparable_phor = { ...master_phor };
        delete comparable_phor["current_eye"];
        send_to_phor = "";
        converted_hex = "";
        if (master_phor["dist"] != data.refInfo[data.refInfo.length - 1]) {
            master_phor["dist"] = data.refInfo[data.refInfo.length - 1];
            if (data.refInfo[data.refInfo.length - 1] == "far") {
                comparable_phor["dist"] = "KSB";
            }
            if (data.refInfo[data.refInfo.length - 1] == "near") {
                comparable_phor["dist"] = "KDB";
            }
        } else {
            delete comparable_phor["dist"];
        }

        if (master_phor["current_eye"] != data.refInfo[0]) {
            master_phor["current_eye"] = data.refInfo[0];
            if (data.refInfo[0] == "od") {
                comparable_phor["closed_eye"] = "LX01";
                comparable_phor["open_eye"] = "RX00";
            }
            if (data.refInfo[0] == "os") {
                comparable_phor["closed_eye"] = "RX01";
                comparable_phor["open_eye"] = "LX00";
            }
            if (data.refInfo[0] == "ou") {
                comparable_phor["closed_eye"] = "LX00";
                comparable_phor["open_eye"] = "RX00";
            }
        } else {
            delete comparable_phor["open_eye"];
            delete comparable_phor["closed_eye"];
        }

        if (
            master_phor["odsph"] !=
            "RS" + numeral(data.refInfo[1]).format("+00.00")
        ) {
            master_phor["odsph"] =
                "RS" + numeral(data.refInfo[1]).format("+00.00");
            comparable_phor["odsph"] =
                "RS" + numeral(data.refInfo[1]).format("+00.00");
        } else {
            delete comparable_phor["odsph"];
        }

        if (
            master_phor["odcyl"] !=
            "RC" + numeral(data.refInfo[3]).format("00.00")
        ) {
            master_phor["odcyl"] =
                "RC" + numeral(data.refInfo[3]).format("00.00");
            comparable_phor["odcyl"] =
                "RC" + numeral(data.refInfo[3]).format("00.00");
        } else {
            delete comparable_phor["odcyl"];
        }

        if (master_phor["odaxis"] != "RA" + data.refInfo[5]) {
            master_phor["odaxis"] = "RA" + data.refInfo[5];
            comparable_phor["odaxis"] = "RA" + data.refInfo[5];
        } else {
            delete comparable_phor["odaxis"];
        }

        if (
            master_phor["odadd"] !=
            "RD" + numeral(data.refInfo[7]).format("+00.00")
        ) {
            master_phor["odadd"] =
                "RD" + numeral(data.refInfo[7]).format("+00.00");
            comparable_phor["odadd"] =
                "RD" + numeral(data.refInfo[7]).format("+00.00");
        } else {
            delete comparable_phor["odadd"];
        }

        if (
            master_phor["ossph"] !=
            "LS" + numeral(data.refInfo[2]).format("+00.00")
        ) {
            master_phor["ossph"] =
                "LS" + numeral(data.refInfo[2]).format("+00.00");
            comparable_phor["ossph"] =
                "LS" + numeral(data.refInfo[2]).format("+00.00");
        } else {
            delete comparable_phor["ossph"];
        }

        if (
            master_phor["oscyl"] !=
            "LC" + numeral(data.refInfo[4]).format("+00.00")
        ) {
            master_phor["oscyl"] =
                "LC" + numeral(data.refInfo[4]).format("+00.00");
            comparable_phor["oscyl"] =
                "LC" + numeral(data.refInfo[4]).format("+00.00");
        } else {
            delete comparable_phor["oscyl"];
        }

        if (
            master_phor["osaxis"] !=
            "LA" + numeral(data.refInfo[6]).format("000")
        ) {
            master_phor["osaxis"] =
                "LA" + numeral(data.refInfo[6]).format("000");
            comparable_phor["osaxis"] =
                "LA" + numeral(data.refInfo[6]).format("000");
        } else {
            delete comparable_phor["osaxis"];
        }

        if (
            master_phor["osadd"] !=
            "LD" + numeral(data.refInfo[8]).format("+00.00")
        ) {
            master_phor["osadd"] =
                "LD" + numeral(data.refInfo[8]).format("+00.00");
            comparable_phor["osadd"] =
                "LD" + numeral(data.refInfo[8]).format("+00.00");
        } else {
            delete comparable_phor["osadd"];
        }

        // end subjective data
        for (const [key, value] of Object.entries(comparable_phor)) {
            if (value != null) {
                converted_hex += ascii_to_hexa(value) + "%0d";
            }
        }

        send_to_phor = "%01%44%52%54%02" + converted_hex + "%04";
        console.log(comparable_phor);
        serialDevices[1].write(decodeURIComponent(send_to_phor));
    }
);

function ascii_to_hexa(str) {
    var arr1 = [];
    for (var n = 0, l = str.length; n < l; n++) {
        var hex = Number(str.charCodeAt(n)).toString(16);
        arr1.push("%" + hex);
    }
    return arr1.join("");
}
