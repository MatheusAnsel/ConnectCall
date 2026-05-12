<?php
session_start();

// Somente admin pode gerar PDF
if (empty($_SESSION['idusuarios']) || empty($_SESSION['tipo'])) {
    header('Location: ../Tela de login/login.php');
    exit;
}

include_once('../config.php');

$stmt = $conexao->prepare("SELECT * FROM dados ORDER BY iddados DESC");
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $html  = "<table border='1' cellpadding='4' cellspacing='0'>";
    $html .= "<tr>
        <td><b>ID</b></td>
        <td><b>Nome</b></td>
        <td><b>Nome materno</b></td>
        <td><b>Celular</b></td>
        <td><b>Telefone Fixo</b></td>
        <td><b>CPF</b></td>
        <td><b>Data nasc.</b></td>
        <td><b>Gênero</b></td>
        <td><b>Email</b></td>
        <td><b>CEP</b></td>
        <td><b>Rua</b></td>
        <td><b>Número</b></td>
        <td><b>Bairro</b></td>
        <td><b>Cidade</b></td>
        <td><b>Estado</b></td>
    </tr>";

    while ($row = $result->fetch_assoc()) {
        $html .= "<tr>";
        foreach (['iddados','nome','nomemae','celular','telfixo','cpf','datanasc','genero','email','cep','rua','numero','bairro','cidade','estado'] as $col) {
            $html .= "<td>" . htmlspecialchars($row[$col]) . "</td>";
        }
        $html .= "</tr>";
    }
    $html .= "</table>";
} else {
    $html = '<p>Nenhum dado registrado.</p>';
}

use Dompdf\Dompdf;
require_once 'dompdf/autoload.inc.php';

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->set_option('default', 'sans');
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream('dados_telecall.pdf', ['Attachment' => true]);
exit;
