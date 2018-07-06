function look(t){
    p=document.getElementById(t);
    l=document.getElementById("a-"+t);
    if(p.style.display=="none"){
        l.innerHTML="скрыть";
        p.style.display="block";}
    else{
        l.innerHTML="показать";
        p.style.display="none";}
}