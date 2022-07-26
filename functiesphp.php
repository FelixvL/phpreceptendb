<?php
    function verbindDB(){
        return new mysqli("localhost","root","","patat");
    }
    function toonAlleIngredienten(){
        $conn = verbindDB();

        $sql = "SELECT * FROM ingredient";
        $rs = $conn -> query($sql);

        while($rij = $rs->fetch_assoc()){
            $afbeelding = $rij["afbeelding"];
            $naam = $rij["naam"];
            echo "<h3>$naam</h3>";
            echo "<img src=img/$afbeelding width=200px>";
        }

    }
    function toonIngredientToevoegenFormulier(){
        echo "
    <form action=ingredienttoevoegen.php method=POST enctype=multipart/form-data>
        <input name=naam>
        <input type=file name=file>
        <input type=submit name=submit>
    </form>    
        ";
    }
?>