<?php
// Capturar dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$idade = $_POST["idade"];
$sexo = $_POST["sexo"];
$endereco = $_POST["endereco"];
$cep = $_POST["cep"];
$estado = $_POST["estado"];
$data_nascimento = $_POST["data-nascimento"];

// Inserir dados na tabela de usuários
$sql = "INSERT INTO usuarios (nome, email, senha, idade, sexo, endereco, cep, estado, data_nascimento) VALUES ('$nome', '$email', '$senha', $idade, '$sexo', '$endereco', '$cep', '$estado', '$data_nascimento')";
mysqli_query($conexao, $sql);
?> 