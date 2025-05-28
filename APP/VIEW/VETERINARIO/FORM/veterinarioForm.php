<?php
$conn = new mysqli("localhost", "root", "", "petshop");

$msg = "";
$erro = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $crv = trim($_POST["crv"]);
    $nome = trim($_POST["nome"]);
    $telefone = trim($_POST["telefone"]);

    if (empty($crv) || empty($nome) || empty($telefone)) {
        $msg = "Preencha todos os campos!";
        $erro = true;
    } else {
        $crv = $conn->real_escape_string($crv);
        $nome = $conn->real_escape_string($nome);
        $telefone = $conn->real_escape_string($telefone);

        $sql = "INSERT INTO veterinarios (CRV, NOME, TELEFONE) VALUES ('$crv', '$nome', '$telefone')";
        if ($conn->query($sql) === TRUE) {
            $msg = "✅ Veterinário cadastrado com sucesso!";
        } else {
            $msg = "❌ Erro ao cadastrar: " . $conn->error;
            $erro = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastrar Veterinário</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #fff8f0;
      padding: 2rem;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .form-container {
      background: #fffbe6;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      max-width: 400px;
      width: 100%;
    }

    h2 {
      text-align: center;
      color: #5a2e0e;
      margin-bottom: 1.5rem;
    }

    label {
      display: block;
      margin-top: 1rem;
      font-weight: 600;
    }

    input[type="text"],
    input[type="tel"] {
      width: 100%;
      padding: 0.7rem;
      margin-top: 0.3rem;
      border-radius: 6px;
      border: 1px solid #ccc;
      font-size: 1rem;
    }

    button {
      margin-top: 2rem;
      width: 100%;
      background-color: #ffa94d;
      color: #fff;
      border: none;
      padding: 0.8rem;
      font-size: 1rem;
      border-radius: 6px;
      cursor: pointer;
      transition: background 0.3s;
    }

    button:hover {
      background-color: #e68a00;
    }

    .message {
      margin-top: 1rem;
      text-align: center;
      padding: 0.7rem;
      border-radius: 6px;
      font-weight: bold;
    }

    .message.success {
      background-color: #d4edda;
      color: #155724;
    }

    .message.error {
      background-color: #f8d7da;
      color: #721c24;
    }
  </style>
</head>
<body>

<div class="form-container">
  <h2>Cadastro de Veterinário</h2>

  <?php if (!empty($msg)): ?>
    <div class="message <?= $erro ? 'error' : 'success' ?>"><?= $msg ?></div>
  <?php endif; ?>

  <form method="post" id="form">
    <label for="crv">CRV (Registro Profissional):</label>
    <input type="text" id="crv" name="crv" maxlength="12" required>

    <label for="nome">Nome Completo:</label>
    <input type="text" id="nome" name="nome" maxlength="180" required>

    <label for="telefone">Telefone:</label>
    <input type="tel" id="telefone" name="telefone" maxlength="15" required placeholder="(99) 99999-9999">

    <button type="submit">Cadastrar</button>
  </form>
</div>

<script>
  // Máscara de telefone (manual, sem biblioteca)
  const telefone = document.getElementById("telefone");

  telefone.addEventListener("input", function(e) {
    let input = e.target.value.replace(/\D/g, "").substring(0, 11);
    let formatted = "";

    if (input.length > 0) {
      formatted += "(" + input.substring(0, 2);
    }
    if (input.length >= 3) {
      formatted += ") " + input.substring(2, 7);
    }
    if (input.length >= 8) {
      formatted += "-" + input.substring(7, 11);
    }

    e.target.value = formatted;
  });
</script>

</body>
</html>
