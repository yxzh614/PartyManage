/**
 * Created by 52668 on 17/5/14.
 */

//得到地区码
function getAreaID(){
    var area = 0;
    if($("#seachdistrict").val() != "0"){
        area = $("#seachdistrict").val();
    }else if ($("#seachcity").val() != "0"){
        area = $("#seachcity").val();
    }else{
        area = $("#seachprov").val();
    }
    return area;
}

function showAreaID() {
    //地区码
    var areaID = getAreaID();
    //地区名
    var areaName = getAreaNamebyID(areaID) ;
    if(areaID<100){
        document.getElementById("getNativeName").value=areaID+"0000";
    }else if(areaID<10000){
        document.getElementById("getNativeName").value=areaID+"00";
    }
    else{
        document.getElementById("getNativeName").value=areaID;
    }
}

//根据地区码查询地区名
function getAreaNamebyID(areaID){
    var areaName = "";
    if(areaID.length == 2){
        areaName = area_array[areaID];
    }else if(areaID.length == 4){
        var index1 = areaID.substring(0, 2);
        areaName = area_array[index1] + " " + sub_array[index1][areaID];
    }else if(areaID.length == 6){
        var index1 = areaID.substring(0, 2);
        var index2 = areaID.substring(0, 4);
        areaName = area_array[index1] + " " + sub_array[index1][index2] + " " + sub_arr[index2][areaID];
    }
    return areaName;
}