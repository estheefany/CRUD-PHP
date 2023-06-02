<?php

namespace models;

class Livro extends Model {
    
    protected $table = "livros";
    #nao esqueça da ID
    protected $fields = ["id","nome_livro","capa_id","nome_autor","ano"];

    public function findById($id){
        $sql = "SELECT livros.*, capas.capa AS capa FROM {$this->table} "
                ." LEFT JOIN capas ON capas.id = livros.capa_id "
                ." WHERE livros.id = :id";
        $stmt = $this->pdo->prepare($sql);
        $data = [':id' => $id];
        $stmt->execute($data);
        if ($stmt == false){
            $this->showError($sql,$data);
        }
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function all(){
        $sql = "SELECT livros.*, capas.capa as capa FROM {$this->table} "
                ." LEFT JOIN capas ON capas.id = livros.capa_id ";
        
        $stmt = $this->pdo->prepare($sql);
        if ($stmt == false){
            $this->showError($sql);
        }
        $stmt->execute();
        
        $list = [];

        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($list,$row);
        }

        return $list;
    }


    public function getLeitores($idLivro){
        $sql = "SELECT * FROM usuarios
            INNER JOIN leitores ON
                usuarios.id = leitores.usuario_id
            WHERE leitores.livro_id = :idLivro ";

        $stmt = $this->pdo->prepare($sql);
        if ($stmt == false){
            $this->showError($sql);
        }
        $stmt->execute([':idLivro' => $idLivro]);

        $list = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($list,$row);
        }

        return $list;
    }




    
}

