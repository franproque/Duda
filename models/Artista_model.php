<?php 


require_once 'Conexao_model.php';

class Artista{

    private $id;
    private $nome;
    private $fg_ativo;


    public function fabricaArtista($id,$nome,$fg_ativo){

        $this->id=$id;
        $this->nome=$nome;
        $this->fg_ativo=$fg_ativo;

    }

    public function getId(){
        return $this->id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getFgAtivo(){
        return $this->fg_ativo;
    }


    public function incluirNoBanco(){
        $id=$this->id;
        $nome =$this->nome;
        $fg_ativo=$this->fg_ativo;
        $conexao = new Conexao('root','');
        $conexao->conecta()->query("INSERT INTO tb_artistas(nome,fg_ativo) VALUES ('$nome',$fg_ativo)");


    }

    public function trasDoBanco(){

        $conexao = new Conexao('root','');

        $consulta = $conexao->conecta()->query("SELECT * FROM tb_artistas");
        $ArrayDeArtista= array();
        foreach($consulta as $rc){
            $a = new Artista();
            $a->fabricaArtista($rc['id'],$rc['nome'],$rc['fg_ativo']);
            array_push($ArrayDeArtista,$a);
            
        }
        return $ArrayDeArtista;
    }
}


