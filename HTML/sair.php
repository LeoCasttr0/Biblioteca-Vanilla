<?php
session_start();

unset(  $_SESSION['admsistema']);
unset(  $_SESSION['senhasistema']);
header('Location: login-adm.php');
?>