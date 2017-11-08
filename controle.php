<?php

//utilização de namespaces

namespace controle;

//include 'processaAcesso.php';
include '../conn.php';
include '../mysql.php';

use Mysql;
//use processaAcesso as processaAcesso;

$db = new Mysql\mysql(DB_SERVER, DB_NAME, DB_USERNAME, DB_PASSWORD);
//$controle = new \processaAcesso\ProcessaAcesso;

if ($_POST['enviar']) {

    $login = $_POST['login'];
    $senha = ($_POST['senha']);

//    $db = $controle->verificaAcesso($login, $senha);

    $usuario = $db->select('samjf_usuario', '*', " where login_usuario = '$login' and senha_usuario = '$senha'");
//    $usuario = $select;

    

    //redirecionando para pagina conforme o tipo do usuário
    if (count($usuario) > 0) {

        // Se a sessão não existir, inicia uma
        if (!isset($_SESSION)) {
            session_start();
        }
        
        // Salva os dados encontrados na sessão
        $_SESSION['UsuarioID'] = $login;
        
       //Salva o log 
		$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
		$hora = date('Y-m-d H:i:s');
		$usuario = $_SESSION['UsuarioID'];
		$tabela = "-";
		$sistema = "samjf";
		
		$mensagem = "Logon confirmado.";
		$mensagem = mysqli_real_escape_string($conn, $mensagem);
		
		mysqli_select_db($conn, "adm") or print(mysqli_error($conn));
		
		$sql = "INSERT INTO logs VALUES (NULL, '" . $hora . "', '" . $ip . "', '" . $mensagem . "', '" . $tabela . "', '" . $usuario . "', '" . $sistema . "')";
		mysqli_query($conn, $sql);
		
		// Redireciona o visitante
        echo '2';
//        header("Location:paginas/adm_samjf.php");
        
    } else if ($usuario[0]['id_tipo_acesso'] != 2) {
		//Salva o log 
		$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
		$hora = date('Y-m-d H:i:s');
		$usuario = $login;
		$tabela = "-";
		$sistema = "samjf";
		
		$mensagem = "Falha no Logon.";
		$mensagem = mysqli_real_escape_string($conn, $mensagem);
		
		mysqli_select_db($conn, "adm") or print(mysqli_error($conn));
		
		$sql = "INSERT INTO logs VALUES (NULL, '" . $hora . "', '" . $ip . "', '" . $mensagem . "', '" . $tabela . "', '" . $usuario . "', '" . $sistema . "')";
		mysqli_query($conn, $sql);
		echo '0';
//        header("Location:paginas/error.php");
    }
}
mysqli_close($conn);