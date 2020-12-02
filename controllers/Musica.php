<?php
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
require_once '../models/Musica_model.php';

$tipo=$_POST['tipo'];

$retorno=array();
if($tipo==1){
    $nome=$_POST['nome'];
    $artista=$_POST['artista'];
    $musica=$_POST['musica'];
    $estilo=$_POST['estilo'];
    $m = new Musica();
    $m->fabricaMusica(null,$nome,$artista,$musica,$estilo,1);
    $m->incluirNoBanco();
$retorno=array('retorno'=>'Inserido');
ob_clean();
echo json_encode($retorno);
    
}else if($tipo==2){
    $retornoMusica=array();
    $t= new Musica();

    $r=$t->trasDoBanco();
    foreach($r as $p){
        $retornoMusica[]=array(
            'id'=>$p->getId(),
            'nome'=>$p->getNome(),
            'artista'=>$p->getArtista()->getNome(),
            'musica'=>$p->getMusica(),
            'estilo'=>$p->getEstilo(),
            
        );
       // echo '</br>';
        //echo $p->getMusica();
    }
    
    
    ob_clean();
    echo json_encode($retornoMusica);
    
}
