<?php
session_start();

// Ativar a exibição de erros
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verifique se a sessão contém 'id' e se os campos POST estão definidos
if (!isset($_SESSION['id'])) {
    die('Erro: A sessão não contém o ID.');
}

$titulo = isset($_POST['titulo']) ? str_replace('#', '-', $_POST['titulo']) : '';
$categoria = isset($_POST['categoria']) ? str_replace('#', '-', $_POST['categoria']) : '';
$descricao = isset($_POST['descricao']) ? str_replace('#', '-', $_POST['descricao']) : '';

// Montando o texto
$texto = $_SESSION['id'] . '#' . $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL;

// Abrindo o arquivo
$arquivo = fopen('/opt/lampp/htdocs/app_help_desk/arquivo.hd', 'a');
if ($arquivo === false) {
    die('Erro: Não foi possível abrir o arquivo.');
}

fwrite($arquivo, $texto);

fclose($arquivo);

header('Location: abrir_chamado.php');

?>
