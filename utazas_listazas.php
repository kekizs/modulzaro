<?php
require_once 'utazass.php';

$db = new PDO("mysql:host=localhost;dbname=modulzaro;charset=utf8", 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$result = [];

$sql = " SELECT utazas.id,utazas.datum, sofor.nev as sofor, utazas.celallomas,busz.rendszam FROM `utazas`,`busz`,`sofor` where busz.id=utazas.busz_id and sofor.id=utazas.sofor_id;";

foreach ($db->query($sql) as $row) {
    $result[] = new utazass($row);
}
?>

<table   >
    <tr>
        <th>id</th>
        <th>datum</th>
        <th>sofor</th>
        <th>celallomas</th>
        <th>rendszam</th>
    </tr>
<?php foreach ($result as $utazas) : ?>
        <tr>

            <td><a href="/modulzaro/edit.php?id=<?= $utazas->id ?>"><?= $utazas->id ?></a></td>
            <td><?= $utazas->datum ?></td>
            <td><?= $utazas->sofor ?></td>
            <td><?= $utazas->celallomas ?></td>
            <td><?= $utazas->rendszam ?></td>
        </tr>
<?php endforeach; ?>
</table>
<a href="/modulzaro/add.php">hozzaadas</a>

<?php
//  $id=$_POST['$utazas->id']; 

/*$sql = "update `utazas` set `utazas.datum`='$utazas->datum', "
        . "`sofor.nev`='$utazas->sofor',"
        . "`utazas.celallomas`='$utazas->celallomas',"
        . "`busz.rendszam`='$utazas->rendszam' "
        . "`where utazas.id`=utazas.busz_id and sofor.id=utazas.sofor_id;";



 $sql="insert into `utazas` (`datum`) values ('$utazas->datum');";
        "insert into `sofor` (`nev`) values ('$utazas->sofor');";
        "insert into `utazas` (`celallomas`) values ('$utazas->celallomas');";
        "insert into `busz` (`rendszam`) values ('$utazas->rendszam');";*/
    
    
    