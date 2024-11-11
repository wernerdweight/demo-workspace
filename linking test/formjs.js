function kalkulacka(event) 
{
    var cislo_1 = document.getElementById("cislo_1").value
    var cislo_1_int = parseInt(cislo_1);
    var cislo_2 = document.getElementById("cislo_2").value
    var cislo_2_int = parseInt(cislo_2);
    var znamenko = document.querySelector('input[name=znamenko]:checked').value;

    switch(znamenko)
    {
        case "+":
            alert(cislo_1_int + cislo_2_int);
            break;
        case "-":
            alert(cislo_1_int - cislo_2_int);
            break;
        case "/":
            alert(cislo_1_int / cislo_2_int);
            break;
        case "*":
        alert(cislo_1_int * cislo_2_int);
        break;
        default:
            alert("error")
    }
}

document.getElementById("button").addEventListener("click", kalkulacka);