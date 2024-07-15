<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulario_contato";

// Conectando ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Construindo a consulta SQL para excluir todos os dados
$sql = "DELETE FROM mensagens";

// Executando a consulta
if ($conn->query($sql) === TRUE) {
    echo "Todos os dados foram removidos com sucesso.";
} else {
    echo "Erro ao remover os dados: " . $conn->error;
}

// Fechando a conexão com o banco de dados
$conn->close();
?>
