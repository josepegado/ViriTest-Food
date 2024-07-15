<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $mensagem = $_POST["mensagem"];

  // Configurações de conexão com o banco de dados
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "formulario_contato";

  // Cria a conexão com o banco de dados
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Verifica se ocorreu algum erro na conexão
  if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
  }

  // Prepara a consulta SQL para inserção dos dados
  $sql = "INSERT INTO mensagens (nome, email, mensagem) VALUES ('$nome', '$email', '$mensagem')";

  // Executa a consulta SQL
  if ($conn->query($sql) === TRUE) {
    echo "Dados inseridos no banco de dados com sucesso!";
    header("Location: listar_contatos.php");
exit; // Certifique-se de chamar a função exit() após o redirecionamento
  } else {
    echo "Erro ao inserir os dados no banco de dados: " . $conn->error;
  }

  // Fecha a conexão com o banco de dados
  $conn->close();
}
?>
