<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Pet Shop</title>
  <link rel="stylesheet" href="./ASSETS/STYLE/style.CSS">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<!-- MENU LATERAL -->
<nav class="sidebar">
  <h1>🐶 PetShop</h1>
  <ul>
    <li>
      <div class="dropdown-btn">
        <span>📁 Cadastros</span>
        <i class="fas fa-chevron-down"></i>
      </div>
      <ul class="dropdown-container">
        <li><a href="#">Clientes</a></li>
        <li><a href="#">Animais</a></li>
        <li><a href="./VIEW/VETERINARIO/FORM/veterinarioForm.php">Veterinários</a></li>
      </ul>
    </li>
    <li><a href="#">🩺 Consultas</a></li>
    <li><a href="#">📊 Relatórios</a></li>
  </ul>
</nav>

<div class="main-content">
  <header>Dashboard Pet Shop</header>

  <div class="container">
    <?php

        $conexao = new mysqli("localhost", "root", "", "petshop");

        function contar($tabela, $conexao){ 
            $query = $conexao->query("SELECT COUNT(*) AS total FROM $tabela");
            return $query->fetch_assoc()['total'];
        }

        $veterinarios = contar('VETERINARIOS', $conexao);
        $clientes = contar('CLIENTES', $conexao);
        $consultas = contar('CONSULTA', $conexao);
        $animais = contar('ANIMAIS', $conexao);
    ?>

    <div class="card">
      <i class="fas fa-user"></i>
      <h2><?= $clientes ?></h2>
      <span>Clientes Cadastrados</span>
    </div>

    <div class="card">
      <i class="fas fa-dog"></i>
      <h2><?= $animais ?></h2>
      <span>Animais Registrados</span>
    </div>

    <div class="card">
      <i class="fas fa-user-md"></i>
      <h2><?=$veterinarios?></h2>
      <span>Veterinários Ativos</span>
    </div>

    <div class="card">
      <i class="fas fa-notes-medical"></i>
      <h2><?= $consultas ?></h2>
      <span>Consultas Realizadas</span>
    </div>
  </div>
</div>

-<script>
  const dropdownBtn = document.querySelector('.dropdown-btn');
  const dropdownContainer = document.querySelector('.dropdown-container');
  const icon = dropdownBtn.querySelector('i');

  dropdownBtn.addEventListener('click', () => {
    dropdownContainer.style.display = dropdownContainer.style.display === 'block' ? 'none' : 'block';
    icon.classList.toggle('fa-chevron-up');
    icon.classList.toggle('fa-chevron-down');
  });
</script>

</body>
</html>
