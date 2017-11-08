<?php
//include de sessão.
include	("../validacao.php");

$id = intval($_REQUEST['id']);
//$procbaix = $_REQUEST['procbaix'];
$p71_new = $_REQUEST['p71'];
$p72_new = $_REQUEST['p72'];
$p74_new = $_REQUEST['p74'];
$p75_new = $_REQUEST['p75'];
//$referencia = $_REQUEST['referencia'];
//$orgao = $_REQUEST['orgao'];
//$ano = $_REQUEST['ano'];

/*$cumprimento = $_REQUEST['cumprimento'];
$desempenho = $_REQUEST['desempenho'];*/

include '../../conn.php'; mysqli_select_db($conn, 'samjf');

$querySelect = ("select * from samjf_m7_mens_2016 where id=$id");

$result = mysqli_query($conn, $querySelect);
$obj = mysqli_fetch_object($result);
$p71 = $obj->p71;
$p72 = $obj->p72;
$p74 = $obj->p74;
$p75 = $obj->p75;

//Dados do Sistema:
$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
$hora = date('Y-m-d H:i:s');
$usuario = $_SESSION['UsuarioID'];
$tabela = "samjf.samjf_m7_mens_2016";
$sistema = "Samjf";

$mensagem = "Alterações ID = $id ";

	if ($p71 != $p71_new)
		$mensagem .= "<br> p71 = $p71, para p71 = $p71_new";
	
	if ($p72 != $p72_new)
		$mensagem .= "<br> p72 = $p72, para p72 = $p72_new";
		
	if ($p74 != $p74_new)
		$mensagem .= "<br> p74 = $p74, para p74 = $p74_new";
		
	if ($p75 != $p75_new)
		$mensagem .= "<br> p75 = $p75, para p75 = $p75_new";

$mensagem .= ".";
$mensagem = mysqli_real_escape_string($conn, $mensagem);

$sql = "update samjf_m7_mens_2016 set p71='$p71_new',p72='$p72_new',p74='$p74_new',p75='$p75_new' where id=$id";
@mysqli_query($conn, $sql);
echo json_encode(array(
	'id' => $id,
	//'procbaix' => $procbaix,
	'p71' => $p71_new,
	'p72' => $p72_new,
	'p74' => $p74_new,
	'p75' => $p75_new,
	//'referencia' => $referencia,
	//'orgao' => $orgao,
	//'ano' => $ano

));

//Salva o Log
mysqli_select_db($conn, "adm") or print(mysqli_error($conn));

$sql_log = "INSERT INTO logs VALUES (NULL, '" . $hora . "', '" . $ip . "', '" . $mensagem . "', '" . $tabela . "', '" . $usuario . "', '" . $sistema . "')";
mysqli_query($conn, $sql_log);
?>