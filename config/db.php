<?php

require_once "auth.php";

$connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($connect != true) {
  echo "<strong>404 Error! Database Failed To Connect</strong>";
}

?>