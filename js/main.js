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
    var ch=document.getElementsByName("onetodel[]");
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