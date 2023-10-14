<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conexao, $_POST["email"]); // Evitar SQL Injection
    $senha = $_POST["senha"]; // Não é necessário escapar, pois você usará password_verify

    // Consulte o banco de dados para verificar o login
    $sql = "SELECT id, nome, senha FROM usuarios WHERE email = '$email'";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_assoc($resultado);
        if (password_verify($senha, $row["senha"])) {
            $_SESSION["id"] = $row["id"];
            $_SESSION["nome"] = $row["nome"];
            header("Location: ../retrowa-main/index.html"); // Redireciona para a página principal após o login
            exit();
        } else {
            $erro = "Senha incorreta.";
        }
    } else {
        $erro = "Usuário não encontrado.";
    }
}
?>
