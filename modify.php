<?php

require_once 'config.php';
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

    <input type="submit" name="edit" value="Modosit">
        <input type="submit" name="delete" value="Töröl">

</form>    
<?php



if (isset($_POST['edit'])) {

    $utazas_id= $utazas->id;
    
    $stm = $db->prepare("update utazas set celallomas = :celallomas  where id=$utazas_id");
    $stm->execute(["celallomas" => $_POST["celallomas"]]);
   
    
     $stm = $db->prepare("update utazas set datum = :datum  where id=$utazas_id");
    $stm->execute(["datum" => $_POST["datum"]]);
   
    $stm = $db->prepare("update sofor set nev = :sofor  where id=$utazas_id");
    $stm->execute(["sofor" => $_POST["sofor"]]);
    
    print "update sofor set nev = :sofor  where id=$utazas_id";
    
    $stm = $db->prepare("update busz set rendszam= :rendszam where id=$utazas_id");
    $stm->execute(["rendszam" => $_POST["rendszam"]]);
  
   

    //header("Location: utazas_listazas.php");
}

if (isset($_POST['delete'])) {
    
       $utazas_id= $utazas->id;
    
$stmt = $db->prepare("delete from utazas where id=$utazas_id"); 
$stmt->execute();
    
    
    header("Location: utazas_listazas.php");
}
?>

   </div>
        <div id="footer">

        </div>
    </div>
</body>
</html>