
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

            <td><a href="./app/view/modify.php?id=<?= $utazas->id ?>"><?= $utazas->id ?></a></td>
            <td><?= $utazas->datum ?></td>
            <td><?= $utazas->sofor ?></td>
            <td><?= $utazas->celallomas ?></td>
            <td><?= $utazas->rendszam ?></td>
        </tr>
<?php endforeach; ?>
</table>
            <a href="./app/view/add.php">hozzáadas</a>

