<?php

class buszController {

    public function lista() {
        require_once './app/model/buszModel.php';
        $model = new modifyModel;
        $result = $model->lista();
        $this->render('./app/view/utazas_listazas.php', ["utazas" => $result]);
    }
    
     public function modifyC() {
        require_once './app/model/buszModel.php';
        $model = new buszModel;
        $result = $model->modify($this->id);
        $this->render('./app/view/modify.php', ["utazas" => $result]);
    }
    
     public function addC() {
        require_once './app/model/buszModel.php';
        $model = new buszModel;
        $result = $model->add($this->id);
        $this->render('./app/view/add.php');
    }

}
