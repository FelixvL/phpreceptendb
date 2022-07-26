<?php
    include("functiesphp.php");

    toonAlleIngredienten();
    toonIngredientToevoegenFormulier();



    
?>
<script>
    function gaan(){
        let deboxen = document.getElementsByClassName("chkbxen");
        console.log(deboxen)
        console.log(deboxen[0].checked   );
        terugString = "";
        for(let x = 0; x < deboxen.length ; x++){
            if(deboxen[x].checked){
                terugString += "1";
            }else{
                terugString += "0";
            }
        }
        console.log(terugString);
        document.getElementById("code").value = terugString;
        console.log(document.getElementById("code").value);

    }
</script>
ontbijt:<input type=checkbox id=testcheckbox class=chkbxen onclick=gaan()>
lunch:<input type=checkbox id=testcheckbox class=chkbxen onclick=gaan()>
diner:<input type=checkbox id=testcheckbox class=chkbxen onclick=gaan()>
<input type=hidden id="code">

<h1>LASTIG LASTIG LASTIG</h1>
<?php


$sql = "SELECT ingredient.naam as naampje, recept.naam as benaming, ingredient.afbeelding as afb, recept.afbeelding as beeltenis
FROM ingredient, recept, recept_ingredient_koppel
WHERE ingredient.id = recept_ingredient_koppel.ingredient_id AND recept.id = recept_ingredient_koppel.recept_id
ORDER BY recept.naam;";
/*
SELECT *
FROM ingredient as I, recept as R, recept_ingredient_koppel as RI
WHERE I.id = RI.ingredient_id AND R.id = RI.recept_id AND R.naam = 'broodrecept'
ORDER BY R.naam;
*/
$conn = verbindDB();
$rs = $conn -> query($sql);
$vorignaam = "niks";

while($rij = $rs->fetch_assoc()){
    $afbeelding = $rij["afb"];
    $naam = $rij["benaming"];
    $ingredientnaam = $rij["naampje"];
    if($vorignaam != $naam){
        echo "<hr>";
        echo "<h3>$naam</h3>";
        $vorignaam = $naam;
    }
    echo "<h5>$ingredientnaam</h5>";
    echo "<img src=img/$afbeelding width=200px>";
    echo "<br>";
}

?>
<h1 id="welkom"></h1>
<script>
let gebid = localStorage.getItem("vandieenesite");
console.log(gebid);   
if(gebid == null || gebid == "null"){
    alert("jij moet ff inloggen");
    window.location = "inloggen.php";
} else{
    document.getElementById("welkom").innerHTML = "welkom "+ gebid;
}
function uitloggen(){
    localStorage.setItem("vandieenesite", null );
    window.location = window.location;
}    
</script>
<button onclick=uitloggen()>uitloggen</button>

