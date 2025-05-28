<?PHP
    require"APP/DAO/VeterinarioDAO.php";

    class Veterinario{
        private $id, $crv, $nome, $telefone;

        public function cadastrar(){
            $dao = new VeterinarioDAO();
            $dao->insert($this);
        }

        public function getId() {
            return $this->id;
        }
    
        public function setId($id) {
            $this->id = $id;
        }
    
        public function getCrv() {
            return $this->crv;
        }
    
        public function setCrv($crv) {
            $this->crv = $crv;
        }
    
        public function getNome() {
            return $this->nome;
        }
    
        public function setNome($nome) {
            $this->nome = $nome;
        }
    
        public function getTelefone() {
            return $this->telefone;
        }
    
        public function setTelefone($telefone) {
            $this->telefone = $telefone;
        }
    }

?>