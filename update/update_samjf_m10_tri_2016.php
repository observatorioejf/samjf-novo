<?php
//include de sessão.
include	("../validacao.php");

$id = intval($_REQUEST['id']);
//$proc = $_REQUEST['proc'];
$nomeTabela = "samjf_m10_tri_2016";
$p106_new = $_REQUEST['p106'];
$p107_new = $_REQUEST['p107'];
$p108_new = $_REQUEST['p108'];
$p109_new = $_REQUEST['p109'];
$p1010_new = $_REQUEST['p1010'];
//$referencia = $_REQUEST['referencia'];
//$orgao = $_REQUEST['orgao'];
//$ano = $_REQUEST['ano'];

include '../../conn.php'; mysqli_select_db($conn, 'samjf');

$querySelect = ("select * from samjf_m10_tri_2016 where id=$id");

$result = mysqli_query($conn, $querySelect);
$obj = mysqli_fetch_object($result);
$p106 = $obj->p106;
$p107 = $obj->p107;
$p108 = $obj->p108;
$p109 = $obj->p109;
$p1010 = $obj->p1010;


//Dados do Sistema:
$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
$hora = date('Y-m-d H:i:s');
$usuario = $_SESSION['UsuarioID'];
$tabela = "samjf.samjf_m10_tri_2016";
$sistema = "Samjf";

$mensagem = "Alterações ID = $id ";

if ($p106 != $p106_new)
	$mensagem .= "<br> p106 = $p106, para p106 = $p106_new";

if ($p107 != $p107_new)
	$mensagem .= "<br> p107 = $p107, para p107 = $p107_new";

if ($p108 != $p108_new)
	$mensagem .= "<br> p108 = $p108, para p108 = $p108_new";

if ($p109 != $p109_new)
	$mensagem .= "<br> p109 = $p109, para p109 = $p109_new";

if ($p1010 != $p1010_new)
	$mensagem .= "<br> p1010 = $p1010, para p1010 = $p1010_new";

$mensagem .= ".";
$mensagem = mysqli_real_escape_string($conn, $mensagem);

$sql = "update samjf_m10_tri_2016 set p106='$p106_new',p107='$p107_new',p108='$p108_new',p109='$p109_new',p1010='$p1010_new' where id=$id";
@mysqli_query($conn, $sql);
echo json_encode(array(
	'id' => $id,
	//'proc' => $proc,
	'p106' => $p106_new,
	'p107' => $p107_new,
	'p108' => $p108_new,
	'p109' => $p109_new,
	'p1010' => $p1010_new,
	//'referencia' => $referencia,
	//'orgao' => $orgao,
	//'ano' => $ano,
));

//Salva o Log
mysqli_select_db($conn, "adm") or print(mysqli_error($conn));

$sql_log = "INSERT INTO logs VALUES (NULL, '" . $hora . "', '" . $ip . "', '" . $mensagem . "', '" . $tabela . "', '" . $usuario . "', '" . $sistema . "')";
mysqli_query($conn, $sql_log);
?>