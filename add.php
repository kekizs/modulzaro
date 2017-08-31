<?php
require_once 'utazass.php';
require_once 'utazas_listazas.php';
?>
<form action="" method="post">

    <table>
        <tr>
            <th>datum: <br> <input type="text" name="datum" value=""></th>
            <th>sofor: <br> <input type="text" name="sofor" value=""></th>
            <th>celallomas:  <br><input type="text" name="celallomas" value=""></th>
            <th>rendszam:   <br><input type="text" name="rendszam" value=""></th>
        </tr>
    </table>     

    <input type="submit" name="submit" value="Hozzáad">


</form>

<?php
if (isset($_POST['submit'])) {

   $stm = $db->prepare("insert into sofor(nev) values(:sofor)");
    $stm->execute(["sofor" => $_POST["sofor"]]);
    $sofor_id = $db->lastInsertId();
    
    
    $stm = $db->prepare("insert into busz(rendszam) values(:rendszam)");
    $stm->execute(["rendszam" => $_POST["rendszam"]]);
    $busz_id = $db->lastInsertId();

    
    $stm = $db->prepare("insert into utazas(celallomas, datum, sofor_id, busz_id) values(:celallomas, :datum, :sofor, :busz)");
    $stm->execute([
        
        
        "celallomas" => $_POST["celallomas"],
        "datum" => $_POST["datum"],
        "sofor" => $sofor_id,
        "busz" => $busz_id
            
           /* de egyébként ha megnyitod az utazas táblát szerkesztés nézetben, láthatod hogy az össze cella not nullable, tehát nem csinálhatod azt hogy beszursz egy sor úgy hogy csak egy cella adata van megadva insertnél
egyébként meg nem konkatenáltad az insert stringet, gondolom azt szeretted volna...
az utazas táblába ugy tudsz beszúrni hogy megadod az insert stringben az összes not nullable cella értékét ahogy a példában csinálom
a sofor meg a busz cella az meg nem string ugye hanem id, amit a busz és sofor táblából kell kinyerni
ahhoz meg először természetesen oda be kell szurni ezt a két értéket...
nézd át azt ha gondolod beszélhetünk még róla skype-on vagy ha hazajössz.*/
            
            
    ]);



    header("Location: utazas_listazas.php");
}


