<?php
require_once 'config.php';
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
                 
    ]);

    header("Location: utazas_listazas.php");
}

?>
   </div>
        <div id="footer">

        </div>
    </div>
</body>
</html>
