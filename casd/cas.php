<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);
    $idade = $_POST["idade"];
    $sexo = $_POST["sexo"];
    $endereco = $_POST["endereco"];
    $cep = $_POST["cep"];
    $estado = $_POST["estado"];
    $data_nascimento = $_POST["data-nascimento"];

    // Conecte-se ao banco de dados MySQL
    $conexao = mysqli_connect("localhost", "root", "12345678", "cadastro_clientes");

    // Verifique a conexão
    if (!$conexao) {
        die("Erro na conexão: " . mysqli_connect_error());
    }

    // Insira os dados na tabela de usuários
    $sql = "INSERT INTO usuarios (nome, email, senha, idade, sexo, endereco, cep, estado, data_nascimento) VALUES ('$nome', '$email', '$senha', $idade, '$sexo', '$endereco', '$cep', '$estado', '$data_nascimento')";

    if (mysqli_query($conexao, $sql)) {
        // Cadastro realizado com sucesso, agora exibiremos um alert e redirecionaremos o usuário
        echo "<script>alert('Cadastro realizado com sucesso!'); window.location = '../Login/log.html';</script>";
    } else {
        echo "Erro ao cadastrar: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);
}
?>
