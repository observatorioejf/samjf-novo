<?php
//include de sessão.
include	("../validacao.php");

$id = intval($_REQUEST['id']);
//$orgao = $_REQUEST['orgao'];
//$referencia = $_REQUEST['referencia'];
//$ano = $_REQUEST['ano'];
//$proc = $_REQUEST['proc'];
$p111_new = $_REQUEST['p111'];
$p112_new = $_REQUEST['p112'];
/*$desempenho = $_REQUEST['desempenho'];*/

include '../../conn.php'; mysqli_select_db($conn, 'samjf');

$querySelect = ("select * from samjf_m11_unic_2016 where id=$id");

$result = mysqli_query($conn, $querySelect);
$obj = mysqli_fetch_object($result);
$p111 = $obj->p111;
$p112 = $obj->p112;

//Dados do Sistema:
$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
$hora = date('Y-m-d H:i:s');
$usuario = $_SESSION['UsuarioID'];
$tabela = "samjf.samjf_m11_unic_2016";
$sistema = "Samjf";

$mensagem = "Alterações ID = $id ";

if ($p111 != $p111_new)
	$mensagem .= "<br> p111 = $p111, para p111 = $p111_new";

if ($p112 != $p112_new)
	$mensagem .= "<br> p112 = $p112, para p112 = $p112_new";

$mensagem .= ".";
$mensagem = mysqli_real_escape_string($conn, $mensagem);

$sql = "update samjf_m11_unic_2016 set p111='$p111_new',p112='$p112_new' where id=$id";
@mysqli_query($conn, $sql);
echo json_encode(array(
	'id' => $id,
	//'orgao' => $orgao,
	//'referencia' => $referencia,
	//'ano' => $ano,
	//'proc' => $proc,
	'p111' => $p111_new,
	'p112' => $p112_new,
	
	/*'desempenho' => $desempenho,*/
));

//Salva o Log
mysqli_select_db($conn, "adm") or print(mysqli_error($conn));

$sql_log = "INSERT INTO logs VALUES (NULL, '" . $hora . "', '" . $ip . "', '" . $mensagem . "', '" . $tabela . "', '" . $usuario . "', '" . $sistema . "')";
mysqli_query($conn, $sql_log);
?>