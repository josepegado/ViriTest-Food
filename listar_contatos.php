<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulario_contato";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
  die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta os dados na tabela
$sql = "SELECT * FROM mensagens";
$result = $conn->query($sql);

// Cria uma variável para armazenar os dados
$dados = array();

// Verifica se existem registros retornados
if ($result->num_rows > 0) {
  // Percorre os registros retornados e adiciona-os à variável $dados
  while ($row = $result->fetch_assoc()) {
    $dados[] = $row;
  }
}

// Fecha a conexão com o banco de dados
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Lista de Contatos</title>
</head>
<body>
  <h2>Mensagem enviada.</h2>

  <?php if (count($dados) > 0) : ?>
    <table>
      <tr>
        
        <th>Mensagem</th>
      </tr>

      <?php foreach ($dados as $contato) : ?>
        <tr>
          
          <td><?php echo $contato['mensagem']; ?></td>
        </tr>
      <?php endforeach; ?>

    </table>
  <?php else : ?>
    <p>Nenhum contato encontrado.</p>
  <?php endif; ?>
  <hr>
   <form method="POST" action="excluir_dados.php">
        <input type="submit" name="excluir" value="Apagar Dados">
    </form>
</body>
</html>
