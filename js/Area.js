
function initComplexArea(sheng, shi, qu, p, q, shengNum, shiNum, quNum) {
    var allArg = initComplexArea.arguments;
    var shengSelect = document.getElementById(sheng);
    var shiSelect = document.getElementById(shi);
    var quSelect = document.getElementById(qu);
    var e = 0;
    var c = 0;
    if (p != undefined) {
        if (shengNum != undefined) {
            shengNum = parseInt(shengNum);
        }
        else {
            shengNum = 0;
        }
        if (shiNum != undefined) {
            shiNum = parseInt(shiNum);
        }
        else {
            shiNum = 0;
        }
        if (quNum != undefined) {
            quNum = parseInt(quNum);
        }
        else {
            quNum = 0
        }
        quSelect[0] = new Option("请选择 ", 0);
        for (e = 0; e < p.length; e++) {
            if (p[e] == undefined) {
                continue;
            }
            if (allArg[6]) {
                if (allArg[6] == true) {
                    if (e == 0) {
                        continue
                    }
                }
            }
            shengSelect[c] = new Option(p[e], e);
            if (shengNum == e) {
                shengSelect[c].selected = true;
            }
            c++
        }
        if (q[shengNum] != undefined) {
            c = 0; for (e = 0; e < q[shengNum].length; e++) {
                if (q[shengNum][e] == undefined) { continue }
                if (allArg[6]) {
                    if ((allArg[6] == true) && (shengNum != 71) && (shengNum != 81) && (shengNum != 82)) {
                        if ((e % 100) == 0) { continue }
                    }
                } shiSelect[c] = new Option(q[shengNum][e], e);
                if (shiNum == e) { shiSelect[c].selected = true } c++
            }
        }
    }
    changeCity(document.getElementById("seachcity").value,'seachdistrict','seachdistrict');
    document.getElementById("seachdistrict")[quNum-1].selected=true;
}
function changeComplexProvince(f, k, e, d) {
    var c = changeComplexProvince.arguments; var h = document.getElementById(e);
    var g = document.getElementById(d); var b = 0; var a = 0; removeOptions(h); f = parseInt(f);
    if (k[f] != undefined) {
        for (b = 0; b < k[f].length; b++) {
            if (k[f][b] == undefined) { continue }
            if (c[3]) { if ((c[3] == true) && (f != 71) && (f != 81) && (f != 82)) { if ((b % 100) == 0) { continue } } }
            h[a] = new Option(k[f][b], b); a++
        }
    }
    removeOptions(g); g[0] = new Option("请选择 ", 0);
    if (f == 11 || f == 12 || f == 31 || f == 71 || f == 50 || f == 81 || f == 82) {
        if ($("#" + d + "_div"))
        { $("#" + d + "_div").hide(); }
    }
    else {
        if ($("#" + d + "_div")) { $("#" + d + "_div").show(); }
    }
}

 
function changeCity(c, a, t) {
    $("#" + a).html('<option value="0" >请选择</option>');
    $("#" + a).unbind("change");
    c = parseInt(c); 
    var _d = sub_arr[c];
    var str = "";     
    str += "<option value='0' >请选择</option>";
    for (var i = c * 100; i < _d.length; i++) {
        if (_d[i] == undefined) continue; 
        str += "<option value='" + i + "' >" + _d[i] + "</option>";
    }
    $("#" + a).html(str);
    
}

function removeOptions(c) {
    if ((c != undefined) && (c.options != undefined)) {
        var a = c.options.length;
        for (var b = 0; b < a; b++) {
            c.options[0] = null;
        }
    }
}