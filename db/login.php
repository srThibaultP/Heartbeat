<?php
 $host = '127.0.0.1'; /* L'adresse de l'hôte MySQL */
 $login = 'REDACTED'; /* Votre numéro d'utilisateur MySQL*/
 $password = 'REDACTED'; /* Votre mot de passe */
 $base = "REDACTED"; /* Le nom de votre base */

 $conn = mysqli_connect($host, $login, $password, $base);
 if(!$conn) die('Connection impossible au serveur MySQL:' . mysqli_error($conn));
?>
