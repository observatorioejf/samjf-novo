<?php
//include de sessão.
include	("../validacao.php");

$id = intval($_REQUEST['id']);
$nomeTabela = "samjf_m9_unic_2016";

$p91_new = $_REQUEST['p91'];
$p92_new = $_REQUEST['p92'];
//$referencia = $_REQUEST['referencia'];
//$orgao = $_REQUEST['orgao'];
//$ano = $_REQUEST ['ano'];

include '../../conn.php'; mysqli_select_db($conn, 'samjf');

$querySelect = ("select * from samjf_m9_unic_2016 where id=$id");

$result = mysqli_query($conn, $querySelect);
$obj = mysqli_fetch_object($result);
$p91 = $obj->p91;
$p92 = $obj->p92;

//Dados do Sistema:
$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
$hora = date('Y-m-d H:i:s');
$usuario = $_SESSION['UsuarioID'];
$tabela = "samjf.samjf_m9_unic_2016";
$sistema = "Samjf";

$mensagem = "Alterações ID = $id ";

if ($p91 != $p91_new)
	$mensagem .= "<br> p91 = $p91, para p91 = $p91_new";

if ($p92 != $p92_new)
	$mensagem .= "<br> p92 = $p92, para p92 = $p92_new";

$mensagem .= ".";
$mensagem = mysqli_real_escape_string($conn, $mensagem);

$sql = "update samjf_m9_unic_2016 set p91='$p91_new',p92='$p92_new' where id=$id";
@mysqli_query($conn, $sql);
echo json_encode(array(
	'id' => $id,
	'p91' => $p91_new,
	'p92' => $p92_new,
	//'p95' => $p95,
	//'referencia' => $referencia,
	//'orgao' => $orgao,
	//'ano' => $ano,
	
));

//Salva o Log
mysqli_select_db($conn, "adm") or print(mysqli_error($conn));

$sql_log = "INSERT INTO logs VALUES (NULL, '" . $hora . "', '" . $ip . "', '" . $mensagem . "', '" . $tabela . "', '" . $usuario . "', '" . $sistema . "')";
mysqli_query($conn, $sql_log);
?>