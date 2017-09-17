<?php
require_once 'config.php';

$db = new PDO("mysql:host=localhost;dbname=modulzaro;charset=utf8", 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$result = [];

$sql = " SELECT utazas.id,utazas.datum, sofor.nev as sofor, utazas.celallomas,busz.rendszam FROM `utazas`,`busz`,`sofor` where busz.id=utazas.busz_id and sofor.id=utazas.sofor_id order by utazas.id;";

foreach ($db->query($sql) as $row) {
    $result[] = new utazass($row);
}
?>
<!doctype html>
<html lang="hu">
	<head>
		<meta charset="utf-8">
		<title>TopSchool Utazássszervező</title>
		<link href="style.css" rel="stylesheet" type="text/css" >
</head>
<body>
	<div id="keret">
    	<div id="header">
        	TopSchool Utazás
    	</div>
        
        <div id="content">
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

            <td><a href="/modify.php?id=<?= $utazas->id ?>"><?= $utazas->id ?></a></td>
            <td><?= $utazas->datum ?></td>
            <td><?= $utazas->sofor ?></td>
            <td><?= $utazas->celallomas ?></td>
            <td><?= $utazas->rendszam ?></td>
        </tr>
<?php endforeach; ?>
</table>
<a href="/add.php">hozzaadas</a>

