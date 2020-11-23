<?php

Class Conexao{


    private $user;
    private $pass;
   
    private function fabricaConexao($user,$pass){
        $this->user=$user;
        $this->pass=$pass;
     
    }
    
   

    public function Conexao($user,$pass){
     
        $this->fabricaConexao($user,$pass);
   


}

public function conecta(){
    $conexao;
    try{

        
        $conexao = new PDO("mysql:host=localhost;dbname=DUDA;charset=utf8",$this->user,$this->pass);
     
       echo 'Conexao Realizada';
     
        } catch(PDOException $e){
           
            echo $e-> getMenssage();
        }

        return $conexao;
}
}
