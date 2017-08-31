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

    $sql = "insert into `utazas` (`datum`) values (:datum);";
            "insert into `sofor` (`nev`) values (:sofor);";
            "insert into `utazas` (`celallomas`) values (:celallomas);";
            "insert into `busz` (`rendszam`) values (:rendszam);";
            
            print $sql;

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':datum', $_POST['datum'], PDO::PARAM_STR);
    $stmt->bindParam(':sofor', $_POST['sofor'], PDO::PARAM_STR);
    $stmt->bindParam(':celallomas', $_POST['celallomas'], PDO::PARAM_STR);
    $stmt->bindParam(':rendszam', $_POST['rendszam'], PDO::PARAM_STR);


    $stmt->execute();



    header("Location: utazas_listazas.php");
}


