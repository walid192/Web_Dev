let dayy=document.querySelector("#Dayy");
let todo=document.querySelector("#content");
let button=document.querySelector("#button");
let list=document.querySelector("#liste");
button.addEventListener("click",(e) =>
{
    list.innerHTML+="<li class='list-group-item'style ='margin-top:10px'>"+ dayy.value +":"+ todo.value+"<button onclick='del(event)' type='button' style ='float:right' class='btn-close' aria-label='Close' id='aa' ></button></li>";
    dayy.value="";
    todo.value="";
    button.disabled=true;

}
)
function del(e) 
{
    e.target.parentNode.parentNode.removeChild(e.target.parentNode);
}

let form=document.querySelector(form)
function myfct()
{
    if ((dayy.value) && (todo.value))
    {   
        button.disabled=false;
    }
}