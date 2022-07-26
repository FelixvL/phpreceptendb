<?php


?>

<script>
    function inloggenf(){
        let uname = document.getElementById("un").value;
        let wwoord = document.getElementById("ww").value;
        let url = 'http://localhost/recepten2207/checklogin.php?usern='+uname+'&wachtw='+wwoord;
        console.log(url);
        fetch(url)
        .then( res => res.text() )
        .then( data => instellen(data) )
    }
    function instellen(ingelogd){
        console.log(ingelogd);
        if(ingelogd == "true"){
            console.log("ja");
            localStorage.setItem("vandieenesite", document.getElementById("un").value );
            window.location = "ingredienten.php";
        }else{
            console.log("nee");
            alert("DIt is niet goed ingevuld");
        }
    }
</script>

username:<input type=text id=un><br>
wachtwoord:<input type=text id=ww><br>
<input type=button onclick="inloggenf()" value="inloggen">
