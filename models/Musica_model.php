<?php 

require_once 'Estilo_model.php';
require_once 'Conexao_model.php';
require_once 'Artista_model.php';
class Musica{

    private $id;
    private $nome;
    private $idArtista;
    private $idSegArtista;
    private $musica;
    private $idEstilo;
    private $fgAtivo;


    public function fabricaMusica($id,$nome,$idArtista,$musica,$idEstilo,$fgAtivo){

        $esti= new Estilo();

        $this->id=$id;
        $this->nome=$nome;
        $this->idArtista=$idArtista;
       // $this->idSegArtista=null;
        $this->musica=$musica;
        $this->idEstilo=$idEstilo;
        $this->fgAtivo=$fgAtivo;

    }
 
    public function getId(){
        return $this->id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getArtista(){
        return $this->idArtista;
    }
    public function getidSegArtista(){
        return $this->idSegArtista;
    }
    public function getMusica(){
        return $this->musica;
    }
    public function getEstilo(){
        return $this->idEstilo;
    }
    public function getFgAtivo(){
        return $this->fgAtivo;
    }
 
    public function incluirNoBanco(){
        
        $conecta= new Conexao('root','');
        
        $sql="INSERT INTO tb_musicas(nome,id_artista,musica,id_estilo,fg_ativo) VALUES('$this->nome',$this->idArtista,'$this->musica',1,1);"     /*VALUES($this->nome,$this->idArtista,$this->musica,$this->idEstilo,$this->fgAtivo*/;
        $conecta->conecta()->query($sql);

        echo 'Incluido com sucesso';
    }
    
    public function trasDoBanco(){
        $retorna=array();
        $sql="select m.*, a.nome as 'nome_artista',a.fg_ativo as 'fg_artista' from tb_musicas as m INNER JOIN tb_artistas as a on m.id_artista = a.id;";

        $conecta= new Conexao('root','');
        $consulta=$conecta->conecta()->query($sql);

        
       echo $consulta->rowCount();
        foreach($consulta as $cont){
            $c = new Musica();
            $p= new Artista();

            $p->fabricaArtista($cont['id_artista'],$cont['nome_artista'],$cont['fg_artista']);
            $c->fabricaMusica($cont['id'],$cont['nome'],$p,$cont['musica'],$cont['id_estilo'],$cont['fg_ativo']);
            array_push($retorna,$c);
        }

        return $retorna;

    }

    
   
}
/*
$t= new Musica();

$r=$t->trasDoBanco();
foreach($r as $p){
    echo '</br>';
    echo $p->getMusica();
}*/