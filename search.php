<?php

if (!isset($_SESSION["NAME"])) {
  header("Location: Logout.php");
  exit;
}

ini_set('display_errors',1);
require_once('db_info.php');

if (isset($_GET['search'])) {
  $search = htmlspecialchars($_GET['search']);
  $search_value = $search;
}else {
  $search = '';
  $search_value = '';
}
//観光地名を照合
$sql = "SELECT * FROM spot where name LIKE '%$search%' order by id";
$stmt = array();
foreach ($db->query($sql) as $row) {
  array_push($stmt,$row);
}

?>
