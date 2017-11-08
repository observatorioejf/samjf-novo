<?php
//include de sessão.
include	("../validacao.php");

$id = intval($_REQUEST['id']);
$p93_new = $_REQUEST['p93'];
$p94_new = $_REQUEST['p94'];
//$referencia = $_REQUEST['referencia'];
//$orgao = $_REQUEST['orgao'];
//$ano = $_REQUEST ['ano'];

include '../../conn.php'; mysqli_select_db($conn, 'samjf');

$querySelect = ("select * from samjf_m9_tri_2016 where id=$id");

$result = mysqli_query($conn, $querySelect);
$obj = mysqli_fetch_object($result);
$p93 = $obj->p93;
$p94 = $obj->p94;

//Dados do Sistema:
$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
$hora = date('Y-m-d H:i:s');
$usuario = $_SESSION['UsuarioID'];
$tabela = "samjf.samjf_m9_tri_2016";
$sistema = "Samjf";

$mensagem = "Alterações ID = $id ";

if ($p93 != $p93_new)
	$mensagem .= "<br> p93 = $p93, para p93 = $p93_new";

if ($p94 != $p94_new)
	$mensagem .= "<br> p94 = $p94, para p94 = $p94_new";

$mensagem .= ".";
$mensagem = mysqli_real_escape_string($conn, $mensagem);

$sql = "update samjf_m9_tri_2016 set p93='$p93_new',p94='$p94_new' where id=$id";
@mysqli_query($conn, $sql);
echo json_encode(array(
	'id' => $id,
	'p93' => $p93_new,
	'p94' => $p94_new,
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