<?php

class utazass{
    
  public $id;
  public $datum;
  public $sofor;
  public $celallomas;
  public $rendszam;
    
    
    public function __construct($data){
 
        $this->id= $data['id'];
        $this->datum= $data['datum'];
        $this->sofor= $data['sofor'];
        $this->celallomas= $data['celallomas'];
        $this->rendszam= $data['rendszam'];
       
 
    }
}




