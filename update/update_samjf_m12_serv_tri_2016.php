<?php
//include de sessão.
include	("../validacao.php");

$id = intval($_REQUEST['id']);
$nomeTabela = "samjf_m12_serv_tri_2016";
//$orgao = $_REQUEST['orgao'];
//$referencia = $_REQUEST['referencia'];
//$ano = $_REQUEST['ano'];
//$proc = $_REQUEST['proc'];
$p121_new = $_REQUEST['p121'];
$p122_new = $_REQUEST['p122'];
$p123_new = $_REQUEST['p123'];

include '../../conn.php'; mysqli_select_db($conn, 'samjf');

$querySelect = ("select * from samjf_m12_serv_tri_2016 where id=$id");

$result = mysqli_query($conn, $querySelect);
$obj = mysqli_fetch_object($result);
$p121 = $obj->p121;
$p122 = $obj->p122;
$p123 = $obj->p123;

//Dados do Sistema:
$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
$hora = date('Y-m-d H:i:s');
$usuario = $_SESSION['UsuarioID'];
$tabela = "samjf.samjf_m12_serv_tri_2016";
$sistema = "Samjf";

$mensagem = "Alterações ID = $id ";

if ($p121 != $p121_new)
	$mensagem .= "<br> p121 = $p121, para p121 = $p121_new";

if ($p122 != $p122_new)
	$mensagem .= "<br> p122 = $p122, para p122 = $p122_new";

if ($p123 != $p123_new)
	$mensagem .= "<br> p123 = $p123, para p123 = $p123_new";

$mensagem .= ".";
$mensagem = mysqli_real_escape_string($conn, $mensagem);

$sql = "update samjf_m12_serv_tri_2016 set p121='$p121_new',p122='$p122_new',p123='$p123_new' where id=$id";
@mysqli_query($conn, $sql);
echo json_encode(array(
	'id' => $id,
	//'orgao' => $orgao,
	//'referencia' => $referencia,
	//'ano' => $ano,
	//'proc' => $proc,
	'p121' => $p121_new,
	'p122' => $p122_new,
	'p123' => $p123_new,
	
));

//Salva o Log
mysqli_select_db($conn, "adm") or print(mysqli_error($conn));

$sql_log = "INSERT INTO logs VALUES (NULL, '" . $hora . "', '" . $ip . "', '" . $mensagem . "', '" . $tabela . "', '" . $usuario . "', '" . $sistema . "')";
mysqli_query($conn, $sql_log);
?>