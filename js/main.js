/**
 * Created by 52668 on 17/5/14.
 */

function allCheck() {
    let ch = document.getElementsByName("onetodel[]");
    let r = true;
    for (let i = 0; i < ch.length; i++) {
        if (ch[i].checked === false) {
            r = false;
        }
    }
    return r;
}function allUncheck() {
    let ch = document.getElementsByName("onetodel[]");
    let r = false;
    for (let i = 0; i < ch.length; i++) {
        if (ch[i].checked === true) {
            r = true;
        }
    }
    return r;
}
function DoCheck()
{
    let ch = document.getElementsByName("onetodel[]");
    if(allCheck())
    {
        for(let i=0;i<ch.length;i++)
        {
            ch[i].checked=false;
            console.log(ch);
        }
    }else{
        for(let i=0;i<ch.length;i++)
        {
            ch[i].checked=true;
            console.log(ch);
        }
    }
}
function getPCD(id) {//选择后填入input
    let targetInput=document.getElementById(id);
    let selectP=document.getElementById('selectP');
    let selectC=document.getElementById('selectC');
    let selectD=document.getElementById('selectD');
    if(selectD.value===''){
        if(selectC.value===''){
            targetInput.value=selectP.value;
        }else{
            targetInput.value=selectP.value+'-'+selectC.value;
        }
    }else{
        targetInput.value=selectP.value+'-'+selectC.value+'-'+selectD.value;
    }
}
function setPCD(id) {
    let sourceInput = document.getElementById(id);
    let selectP = document.getElementById('selectP');
    let selectC = document.getElementById('selectC');
    let selectD = document.getElementById('selectD');
    let PCDArray = sourceInput.value.split('-');
    console.log(PCDArray);
    for (i = 0; i < selectP.length; i++) {//给selectP赋值
        if (PCDArray[0] === selectP.options[i].text) {
            selectP.selectedIndex = i;
        }
    }
    for (i = 0; i < selectC.length; i++) {//给selectC赋值
        if (PCDArray[1] === selectC.options[i].text) {
            selectC.selectedIndex = i;
        }
    }
    for (i = 0; i < selectD.length; i++) {//给selectD赋值
        if (PCDArray[2] === selectD.options[i].text) {
            selectD.selectedIndex = i;
        }
    }
    let $distpicker = $('#distPicker');

    $distpicker.distpicker({
        province: '福建省',
        city: '厦门市',
        district: '思明区'
    });
}
function createRequest() {
    let request;
    try{
        request=new XMLHttpRequest();
    }catch (tryMS){
        try{
            request=new ActiveXObject("Msxml2.XMLHTTP");
        }catch (otherMS){
            try{
                request= new ActiveXObject("Microsoft.XMLHTTP");
            }catch (failed){
                request=null;
            }
        }
    }
    return request;
}