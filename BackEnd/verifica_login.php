<?php
session_start();
if(!$_SESSION['usuario']) {
	header('Location: ../FrontEnd/index.html');
	exit();
}
?>