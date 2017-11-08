<?php
//include de sessão.
include	("../validacao.php");

$id = intval($_REQUEST['id']);
$tabela = "samjf_m8_trabescravo_exploracao_traficodepessoas_unic_2016";
$p81_new = $_REQUEST['p81'];
$p82_new = $_REQUEST['p82'];
$p83_new = $_REQUEST['p83'];

include '../../conn.php'; mysqli_select_db($conn, 'samjf');

$querySelect = ("select * from samjf_m8_trabescravo_exploracao_traficodepessoas_unic_2016 where id=$id");

$result = mysqli_query($conn, $querySelect);
$obj = mysqli_fetch_object($result);
$p81 = $obj->p81;
$p82 = $obj->p82;
$p83 = $obj->p83;

//Dados do Sistema:
$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
$hora = date('Y-m-d H:i:s');
$usuario = $_SESSION['UsuarioID'];
$tabela = "samjf.samjf_m8_trabescravo_exploracao_traficodepessoas_unic_2016";
$sistema = "Samjf";

$mensagem = "Alterações ID = $id ";

if ($p81 != $p81_new)
	$mensagem .= "<br> p81 = $p81, para p81 = $p81_new";

if ($p82 != $p82_new)
	$mensagem .= "<br> p82 = $p82, para p82 = $p82_new";

if ($p83 != $p83_new)
	$mensagem .= "<br> p83 = $p83, para p83 = $p83_new";

$mensagem .= ".";
$mensagem = mysqli_real_escape_string($conn, $mensagem);

$sql = "update samjf_m8_trabescravo_exploracao_traficodepessoas_unic_2016 set p81='$p81_new', p82='$p82_new', p83='$p83_new' where id=$id";
@mysqli_query($conn, $sql);
echo json_encode(array(
	'id' => $id,
	'p81' => $p81_new,
	'p82' => $p82_new,
	'p83' => $p83_new,
	
));

//Salva o Log
mysqli_select_db($conn, "adm") or print(mysqli_error($conn));

$sql_log = "INSERT INTO logs VALUES (NULL, '" . $hora . "', '" . $ip . "', '" . $mensagem . "', '" . $tabela . "', '" . $usuario . "', '" . $sistema . "')";
mysqli_query($conn, $sql_log);
?>