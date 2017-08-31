<?php

require_once 'utazass.php';
require_once 'utazas_listazas.php';
?>

<form action="" method="post">

<table>
	<tr>
		<th>id</th>
		<th>datum</th>
		<th>sofor</th>
		<th>celallomas</th>
		<th>rendszam</th>
	</tr>
<tr>

		<td><?=$utazas->id?></td>
		<td><?=$utazas->datum?></td>
		<td><?=$utazas->sofor?></td>
		<td><?=$utazas->celallomas?></td>
		<td><?=$utazas->rendszam?></td>
	</tr>


</table>
    <input type="submit" name="submit" value="Modosit">
</form>    
<?php

require_once 'utazass.php';
require_once 'utazas_listazas.php';

if (isset($_POST['submit']))

{
    $sql="update `utazas` set `datum`=:datum where id=:id;";
         "update `sofor` set `nev`=:sofor where id=:id;";
         "update `utazas` set `celallomas`=:celallomas where id=:id;";
         "update `busz` set `rendszam`=:rendszam where id=:id;";

header("Location: utazas_listazas.php");
            
}