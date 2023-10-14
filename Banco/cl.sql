use cadastro_clientes;
select*from  usuarios;
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    idade INT,
    sexo ENUM('masculino', 'feminino', 'outro'),
    endereco VARCHAR(255),
    cep VARCHAR(10),
    estado VARCHAR(255),
    data_nascimento DATE
);
