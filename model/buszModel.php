<?php

require_once 'config.php';

class addModel {

    public function lista() {
        $db = new PDO("mysql:host=localhost;dbname=modulzaro;charset=utf8", 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $result = [];

        $sql = " SELECT utazas.id,utazas.datum, sofor.nev as sofor, utazas.celallomas,busz.rendszam FROM `utazas`,`busz`,`sofor` where busz.id=utazas.busz_id and   sofor.id=utazas.sofor_id order by utazas.id;";

        foreach ($db->query($sql) as $row) {
            $result[] = new utazass($row);
        }
    }

    public function add() {
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
    }

    public function modify() {

        if (isset($_POST['edit'])) {

            $utazas_id = $utazas->id;

            $stm = $db->prepare("update utazas set celallomas = :celallomas  where id=$utazas_id");
            $stm->execute(["celallomas" => $_POST["celallomas"]]);

            $stm = $db->prepare("update utazas set datum = :datum  where id=$utazas_id");
            $stm->execute(["datum" => $_POST["datum"]]);

            $stm = $db->prepare("update sofor set nev = :sofor  where id=$utazas_id");
            $stm->execute(["sofor" => $_POST["sofor"]]);


            $stm = $db->prepare("update busz set rendszam= :rendszam where id=$utazas_id");
            $stm->execute(["rendszam" => $_POST["rendszam"]]);


            header("Location: utazas_listazas.php");
        }

        if (isset($_POST['delete'])) {

            $utazas_id = $utazas->id;

            $stmt = $db->prepare("delete from utazas where id=$utazas_id");
            $stmt->execute();


            header("Location: utazas_listazas.php");
        }
    }

}

?>