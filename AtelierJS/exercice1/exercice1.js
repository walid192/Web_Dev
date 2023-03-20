function play()
{
    let numero=Math.floor(Math.random() * 10);
    let tentative=window.prompt("nombre de tentative ");
    let win=false;
    while ((tentative) && (win==false))
    {
        let essai=window.prompt("JOUEZ")
        if(numero==essai)
        {
        window.alert("You win ");
        win=true;    
        }
        else
        {
        tentative--;
        }
    }
    if (win==false)
    {
        window.alert("you lose")
    }
}
play();