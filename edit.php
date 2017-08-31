<?php

require_once 'utazass.php';
require_once 'utazas_listazas.php';

$result = [];
$eid=$_GET['id'];

$sql = " SELECT utazas.id,utazas.datum,utazas.sofor_id,utazas.busz_id, sofor.nev as sofor, utazas.celallomas,busz.rendszam FROM `utazas`,`busz`,`sofor` where busz.id=utazas.busz_id and sofor.id=utazas.sofor_id and utazas.id=$eid;";

foreach ($db->query($sql) as $row) {
    $result[] = new utazass($row);
}
    $utazas->id=$eid;
    foreach ($result as $utazas)


?>



<form action="" method="post">

    <table>
        <tr>
            <th>datum: <br> <input type="text" name="datum" value="<?= $utazas->datum ?>"></th>
            <th>sofor: <br> <input type="text" name="sofor" value="<?= $utazas->sofor ?>"></th>
            <th>celallomas:  <br><input type="text" name="celallomas" value="<?= $utazas->celallomas ?>"></th>
            <th>rendszam:   <br><input type="text" name="rendszam" value="<?= $utazas->rendszam ?>"></th>
        </tr>
    </table>     

    <input type="submit" name="submit" value="Modosit">
</form>    
<?php



if (isset($_POST['submit'])) {

    $utazas_id= $utazas->id;
    
    $stm = $db->prepare("update sofor set nev = :sofor ");
    $stm->execute(["sofor" => $_POST["sofor"]]);
    $sofor_id = $utazas->sofor_id;
    
    
    $stm = $db->prepare("update busz set rendszam= :rendszam");
    $stm->execute(["rendszam" => $_POST["rendszam"]]);
    $busz_id = $utazas->busz_id;

    
    $stm = $db->prepare("update utazas set (celallomas =:celallomas, datum =:datum, sofor_id =:sofor, busz_id =:busz) where utazas_id =:utazas_id;");
    $stm->execute([
        
        
        "celallomas" => $_POST["celallomas"],
        "datum" => $_POST["datum"],
        "sofor" => $sofor_id,
        "busz" => $busz_id,
        "id" => $utazas_id    
            
    ]);



    header("Location: utazas_listazas.php");
}