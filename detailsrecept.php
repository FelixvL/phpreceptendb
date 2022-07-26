<script>
    function toevoegenI(ingredientid){
        console.log("dit ga ik toevoegen"+ingredientid);
        console.log("aan het recept: "+  <?php echo $_GET["rid"]; ?> );
        url = "http://localhost/recepten2207/voegitoeaanr.php?recid=<?php echo $_GET["rid"]; ?>&ingrid="+ingredientid;
        console.log(url);
        fetch(url)
        .then(r => r.text())
        .then(t => console.log(t))
    }
</script>

<?php
    require("functiesphp.php");


    function detailsReceptZoeken($receptid){
        $conn = verbindDB();        
        $sql = "SELECT * FROM Recept WHERE id = $receptid ";
        $rs = $conn -> query($sql);

        while($rij = $rs->fetch_assoc()){
            echo ">>>".$rij["naam"];
        }
    }
    function toonAlleIngredienten2(){
        $conn = verbindDB();        
        $sql = "SELECT * FROM Ingredient";
        $rs = $conn -> query($sql);

        while($rij = $rs->fetch_assoc()){
            echo "<br>";
            echo "---".$rij["naam"]." <button onclick=toevoegenI(".$rij["id"].")>add</button> ";
        }
    }
    detailsReceptZoeken($_GET["rid"]);
    toonAlleIngredienten2();
?>