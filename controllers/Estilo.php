<?php
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
require_once '../models/Estilo_model.php';




try{
$estilo = new Estilo();
$y= array();
$ret = $estilo->trasDoBanco();

foreach($ret as $t){
$y[]=array(
    'id'=>$t->getId(),
    'estilo'=>$t->getEstilo()

);
}

}catch(Exception $e){


}
ob_clean();
echo json_encode($y);