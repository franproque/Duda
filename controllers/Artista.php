<?php

header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
require_once '../models/Artista_model.php';



$retorno = array();



try{
    $artista = new Artista();
    $ret = $artista->trasDoBanco();

    foreach($ret as $t){
        $retorno[]=array(
            'id'=>$t->getId(),
            'nome'=>$t->getNome()

        );
       
    }
}catch(Exception $e){
    echo $e;
}
ob_clean();
echo json_encode($retorno);