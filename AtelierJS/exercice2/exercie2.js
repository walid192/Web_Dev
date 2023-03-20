let a=document.querySelector("#test");
let couleur=document.querySelector("#color")
let size=document.querySelector("#size")
let font=document.querySelector("#font")
couleur.addEventListener('input',function(e) 
{
    a.style.color=couleur.value;
}
)
size.addEventListener('input',function(e)
{
    a.style.fontSize=size.value+"px";
}
)
font.addEventListener('input',function(e)
{
    a.style.fontFamily=font.value;
}
)