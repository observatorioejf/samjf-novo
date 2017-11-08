<?php
//include de sessão.
include	("../validacao.php");

$id = intval($_REQUEST['id']);
//$orgao = $_REQUEST['orgao'];
//$referencia = $_REQUEST['referencia'];
//$ano = $_REQUEST['ano'];
//$proc = $_REQUEST['proc'];
$p131_new = $_REQUEST['p131'];
$p132_new = $_REQUEST['p132'];
$p133_new = $_REQUEST['p133'];

include '../../conn.php'; mysqli_select_db($conn, 'samjf');

$querySelect = ("select * from samjf_m13_serv_tri_2016 where id=$id");

$result = mysqli_query($conn, $querySelect);
$obj = mysqli_fetch_object($result);
$p131 = $obj->p131;
$p132 = $obj->p132;
$p123 = $obj->p123;

//Dados do Sistema:
$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
$hora = date('Y-m-d H:i:s');
$usuario = $_SESSION['UsuarioID'];
$tabela = "samjf.samjf_m13_serv_tri_2016";
$sistema = "Samjf";

$mensagem = "Alterações ID = $id ";

if ($p131 != $p131_new)
	$mensagem .= "<br> p131 = $p131, para p131 = $p131_new";

if ($p132 != $p132_new)
	$mensagem .= "<br> p132 = $p132, para p132 = $p132_new";

if ($p133 != $p123_new)
	$mensagem .= "<br> p133 = $p133, para p133 = $p123_new";

$mensagem .= ".";
$mensagem = mysqli_real_escape_string($conn, $mensagem);

$sql = "update samjf_m13_serv_tri_2016 set p131='$p131_new',p132='$p132_new',p133='$p133_new' where id=$id";
@mysqli_query($conn, $sql);
echo json_encode(array(
	'id' => $id,
	//'orgao' => $orgao,
	//'referencia' => $referencia,
	//'ano' => $ano,
	//'proc' => $proc,
	'p131' => $p131_new,
	'p132' => $p132_new,
	'p123' => $p133_new,
	
));

//Salva o Log
mysqli_select_db($conn, "adm") or print(mysqli_error($conn));

$sql_log = "INSERT INTO logs VALUES (NULL, '" . $hora . "', '" . $ip . "', '" . $mensagem . "', '" . $tabela . "', '" . $usuario . "', '" . $sistema . "')";
mysqli_query($conn, $sql_log);
?>