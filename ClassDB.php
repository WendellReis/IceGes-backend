<?php
class ClassDB
{
    #Conexão ao banco
    private function conectDB()
    {
        try{
            return $con = new \PDO("mysql:host=localhost;dbname=iceges","root","");
        }catch (PDOException $erro){
            return $erro->getMessage();
        }
    }

    #Verificar o login
    public function verifyLogin($cpf,$senha)
    {
        $b = $this->conectDB()->prepare("select * from gerente where cpf='$cpf' and senha='$senha'");
        $b->execute();

        return($b->rowCount() > 0)?true:false;
    }

    #Modifica nome
    public function modifyName($nome,$cpd)
    {
        $b = $this->conectDB()->prepare("update gerente set nome =? where cpf=?");
        $b->bindParam(1,$nome,\PDO::PARAM_STR);
        $b->bindParam(2,$cpf,\PDO::PARAM_STR);
        $b->execute();
        
        return($b)?true:false;
    }

    #Modifica email
    public function modifyEmail($email, $cpf)
    {
        $b = $this->conectDB()->prepare("update gerente set email =? where cpf=?");
        $b->bindParam(1,$email,\PDO::PARAM_STR);
        $b->bindParam(2,$cpf,\PDO::PARAM_STR);
        $b->execute();
        
        return($b)?true:false;
    }

    #Modifica telefone
    public function modifyPhone($telefone, $cpf)
    {
        $b = $this->conectDB()->prepare("update gerente set telefone =? where cpf=?");
        $b->bindParam(1,$telefone,\PDO::PARAM_STR);
        $b->bindParam(2,$cpf,\PDO::PARAM_STR);
        $b->execute();
        
        return($b)?true:false;
    }

    #Modifica senha
    public function modifyPassword($senha, $cpf)
    {
        $b = $this->conectDB()->prepare("update gerente set senha =? where cpf=?");
        $b->bindParam(1,$senha,\PDO::PARAM_STR);
        $b->bindParam(2,$cpf,\PDO::PARAM_STR);
        $b->execute();

        return($b)?true:false;
    }

    #Cadastra encomenda
    public function addEncomenda($codProduto, $quantidade, $idSorveteria)
    {
        $b = $this->conectDB()->prepare("insert into encomenda (codProduto, quantidade, idSorveteria, status) values (?,?,?,0)");
        $b->bindParam(1,$codProduto,\PDO::PARAM_STR);
        $b->bindParam(2,$quantidade,\PDO::PARAM_STR);
        $b->bindParam(3,$idSorveteria,\PDO::PARAM_STR);
        $b->execute();

        return($b)?true:false;
    }

    #Conclui encomenda
    public function finishEncomenda($idEncomenda, $codProduto, $quantidade)
    {
        $b = $this->conectDB()->prepare("update encomenda set status='1' where idEncomenda=?");
        $b->bindParam(1,$idEncomenda,\PDO::PARAM_STR);
        $b->execute();

        $c = $this->conectDB()->prepare("update produto set quantidade=quantidade+? where codProduto=?");
        $c->bindParam(1,$quantidade,\PDO::PARAM_STR);
        $c->bindParam(2,$codProduto,\PDO::PARAM_STR);
        $c->execute();

        return ($b && $c)?true:false;
    }

    #Altera estoque
    public function alterDisponivel($codProduto, $quantidade)
    {
        $b = $this->conectDB()->prepare("update produto set quantidade=? where codProduto=?");
        $b->bindParam(1,$quantidade,\PDO::PARAM_STR);
        $b->bindParam(2,$codProduto,\PDO::PARAM_STR);
        $b->execute();

        return ($b)?true:false;
    }

    public function getNome(){
        $hostname = "localhost";
        $banco = "iceges";
        $usuario = "root";
        $senha = "";

        $mysqli = new mysqli($hostname,$usuario,$senha,$banco);

        if($mysqli->connect_errno){
            echo "Falga ao conectar: (".$mysqli->connect_errno. ") ".$mysqli->connect_error;
        }

        $consulta = "SELECT * FROM gerente";
        $con = $mysqli->query($consulta) or die($mysqli->error);

        while($dado = $con->fetch_array()){
            $resp = $dado["nome"];
            return $resp;
        }
        }

        
    public function getUser($cpf)
    {
        $hostname = "localhost";
        $banco = "iceges";
        $usuario = "root";
        $senha = "";

        $mysqli = new mysqli($hostname,$usuario,$senha,$banco);

        if($mysqli->connect_errno){
            echo "Falga ao conectar: (".$mysqli->connect_errno. ") ".$mysqli->connect_error;
        }

        $consulta = "SELECT * FROM gerente";
        $con = $mysqli->query($consulta) or die($mysqli->error);

        while($dado = $con->fetch_array()){
            $resp[0] = $dado["cpf"];
            return $resp;
        }
    }
}