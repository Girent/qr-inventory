<?php

try {
	$pdo = new PDO('mysql:dbname=netexpert_tr_BD; host=localhost:3306', 'root', 'my_pass');
} catch (PDOException $e) {
	die($e->getMessage());
}