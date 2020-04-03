<?php
session_start();
if(!$_SESSION['usuario']) {
	header('Location: ../FrontEnd/area_login.html');
	exit();
}
?>