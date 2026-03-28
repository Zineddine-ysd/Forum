<?php 
require('actions/database.php');
 
$showqst= $bdd->query('SELECT id,nomauteur,titre,contenu,description,datepublication FROM question ORDER BY id DESC LIMIT 0,10 ' );

if(isset($_GET['search'])  AND !empty($_GET['search'])) {
$userSearch =$_GET['search'];
$showqst =$bdd ->query('SELECT id,nomauteur,titre,contenu,description, datepublication  FROM question WHERE titre LIKE"%'.$userSearch . '%" ORDER BY id DESC');

}