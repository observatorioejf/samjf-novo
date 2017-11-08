<?php
//include de sessão.
include	("../validacao.php");

$id = intval($_REQUEST['id']);
//$proc = $_REQUEST['proc'];
$p101_new = $_REQUEST['p101'];
$p102_new = $_REQUEST['p102'];
$p103_new = $_REQUEST['p103'];
$p104_new = $_REQUEST['p104'];
$p105_new = $_REQUEST['p105'];
//$referencia = $_REQUEST['referencia'];
//$orgao = $_REQUEST['orgao'];
//$ano = $_REQUEST['ano'];

include '../../conn.php'; mysqli_select_db($conn, 'samjf');

$querySelect = ("select * from samjf_m10_unic_2016 where id=$id");

$result = mysqli_query($conn, $querySelect);
$obj = mysqli_fetch_object($result);
$p101 = $obj->p101;
$p102 = $obj->p102;
$p103 = $obj->p103;
$p104 = $obj->p104;
$p105 = $obj->p105;

//Dados do Sistema:
$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
$hora = date('Y-m-d H:i:s');
$usuario = $_SESSION['UsuarioID'];
$tabela = "samjf.samjf_m10_unic_2016";
$sistema = "Samjf";

$mensagem = "Alterações ID = $id ";

if ($p101 != $p101_new)
	$mensagem .= "<br> p101 = $p101, para p101 = $p101_new";

if ($p102 != $p102_new)
	$mensagem .= "<br> p102 = $p102, para p102 = $p102_new";

if ($p103 != $p103_new)
	$mensagem .= "<br> p103 = $p103, para p103 = $p103_new";

if ($p104 != $p104_new)
	$mensagem .= "<br> p104 = $p104, para p104 = $p104_new";

if ($p105 != $p105_new)
	$mensagem .= "<br> p105 = $p105, para p105 = $p105_new";

$mensagem .= ".";
$mensagem = mysqli_real_escape_string($conn, $mensagem);

$sql = "update samjf_m10_unic_2016 set p101='$p101_new',p102='$p102_new',p103='$p103_new',p104='$p104_new',p105='$p105_new' where id=$id";
@mysqli_query($conn, $sql);
echo json_encode(array(
	'id' => $id,
	//'proc' => $proc,
	'p101' => $p101_new,
	'p102' => $p102_new,
	'p103' => $p103_new,
	'p104' => $p104_new,
	'p105' => $p105_new,
	//'referencia' => $referencia,
	//'orgao' => $orgao,
	//'ano' => $ano,
	
));

//Salva o Log
mysqli_select_db($conn, "adm") or print(mysqli_error($conn));

$sql_log = "INSERT INTO logs VALUES (NULL, '" . $hora . "', '" . $ip . "', '" . $mensagem . "', '" . $tabela . "', '" . $usuario . "', '" . $sistema . "')";
mysqli_query($conn, $sql_log);
?>