<?php 

require_once 'Conexao_model.php';

Class Estilo{


private $id;
private $estilo;
private $fg_ativo;



public function fabricaEstilo($id, $estilo,$fg_ativo){

    $this->id = $id;
    $this->estilo=$estilo;
    $this->fg_ativo=$fg_ativo;
}


public function getId(){
    return $this->id;
}

public function getEstilo(){
    return $this->estilo;

}

public function getFgAtivo(){
    return $this->fg_ativo;
}

public function incluirEstilo($estilo,$fg){
    $this->fabricaEstilo(null,$estilo,$fg);
    $sql="INSERT INTO tb_estilos(estilo,fg_ativo) VALUES ('$estilo',$fg)";
    $conecta =new Conexao('root','');
    $conecta->conecta()->query($sql);
}

public function trasBanco($tipo,$filtro){
    $sql="select * from tb_estilos";
    if($tipo==1){
        $sql=$sql." where id =$filtro ";
    }
    $conecta = new Conexao('root','');
  $retorno= $conecta->conecta()->query($sql);
$linhas = $retorno->rowCount();
$lista =array();
echo $linhas;
  

  foreach($retorno as $cont){
    $c = new Estilo(); 
    $c->fabricaEstilo($cont['id'], $cont['estilo'],$cont['fg_ativo']);
    array_push($lista,$c);
    }
    return $lista;
}

}


