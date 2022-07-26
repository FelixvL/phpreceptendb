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