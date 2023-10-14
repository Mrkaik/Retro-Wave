<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Conecte-se ao banco de dados MySQL
    $conexao = mysqli_connect("localhost", "root", "12345678", "cadastro_clientes");

    // Verifique a conexão
    if (!$conexao) {
        die("Erro na conexão: " . mysqli_connect_error());
    }

    // Consulte o banco de dados para verificar o login
    $sql = "SELECT id, nome, senha FROM usuarios WHERE email = '$email'";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_assoc($resultado);
        if (password_verify($senha, $row["senha"])) {
            $_SESSION["id"] = $row["id"];
            $_SESSION["nome"] = $row["nome"];
            header("Location: ../index.html"); // Redireciona para a página principal após o login
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }

    mysqli_close($conexao);
}

// Depois de verificar o login, você pode verificar se o nome do usuário está na sessão
$nomeUsuario = isset($_SESSION['nome']) ? $_SESSION['nome'] : '';

?>
