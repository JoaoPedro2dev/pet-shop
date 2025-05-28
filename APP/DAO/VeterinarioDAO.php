<?php

    require"APP/MODEL/Veterinario.php";

    class VeterinarioDAO{
        private $conexao;

        public function __construct()
        {
            try{
                $this->conexao = new PDO("mysql:host=localhost; dbname=petshop;", 'root', '');
                $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                echo "Conexão bem estabelecida";
            }catch(PDOException $e){
                echo "Erro na conexão ".$e->getMessage();
            }
        }

        public function insert(Veterinario $veterinario){
            $query = $this->conexao->prepare("INSERT INTO VETERINARIOS (NOME, CRV, TELEFONE) VALUES(?, ?, ?)");

            $query->bindValue(1, $veterinario->getNome());
            $query->bindValue(2, $veterinario->getCRV());
            $query->bindValue(3, $veterinario->getTelefone());

            $query->execute();

            header('Location: APP/VIEW/VETERINARIO/TABELA/veterinarioTabela.php');
        }
    }

?>