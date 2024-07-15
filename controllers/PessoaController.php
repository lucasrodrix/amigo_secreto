<?php 
require_once '../config/database.php';
require_once '../models/Pessoa.php';

class PessoaController{
    private $db;
    private $pessoa;

    public function __construct(){
        $database  = new Database();
        $this->db = $database->getConnection();
        $this->pessoa = new Pessoa($this->db);
    }

    public function create($nome,$email){
        $this->pessoa->nome = $nome;
        $this->pessoa->email = $email;

        if($this->pessoa->create()){
            echo "Pessoa cadastrada com sucesso";
        }else{
            echo "Erro ao cadastrar pessoa";
        }
    }

    public function read(){
        $stmt = $this->pessoa->read();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id,$nome,$email){
        $this->pessoa->id = $id;
        $this->pessoa->nome = $nome;
        $this->pessoa->email = $email;

        if($this->pessoa->update()){
            echo "Pessoa atualizada com sucesso";
        }else{
            echo "Erro ao atualizar pessoa";
        }
    }

    public function delete($id){
        $this->pessoa->id = $id;

        if($this->pessoa->delete()){
            echo "Pessoa excluída com sucesso";
        }else{
            echo "Erro ao excluir pessoa";
        }
    }

    public function search($key){
        $stmt = $this->pessoa->search($key);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readById($id) {
        $this->pessoa->id = $id;
        $stmt = $this->pessoa->readOne();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}