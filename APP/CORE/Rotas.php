<?php 

    class Rotas{
        private $url;

        public function __construct($url)
        {
            $this->url = $url;
        }

        public function getUrl(){
            return $this->url;
        }

        public function navegar(){
            switch($this->url){
                case '/':
                    header("Location: http://localhost/pet-shop/APP/VIEW/DASHBOARD/dashboard.php");
                    exit;
                    break;
                case '/VETERINARIO/FORM':
                    header("Location: http://localhost/pet-shop/APP/VIEW/VETERINARIO/FORM/veterinarioForm.php");
                    exit;
                default: echo "Error 404 Not found";
            }
        }
    }
?>