<?php
    require"../DAO/VeterinarioDAO.php";

    class VeterinarioController{

        public static function cadastrar(){
            $veterinario = new Veterinario();

            $veterinario->setNome($_POST['nome']);
            $veterinario->setCrv($_POST['crv']);
            $veterinario->setTelefone($_POST['telefone']);

            $veterinario->cadastrar();
        }
    }
?>