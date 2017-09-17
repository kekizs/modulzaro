<?php
require_once 'utazas_listazas.php';
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


   </div>
        <div id="footer">

        </div>
    </div>
</body>
</html>