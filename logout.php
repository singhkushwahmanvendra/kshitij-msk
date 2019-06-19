<?php
require 'core.inc.php';
require 'connect.inc.php';

session_destroy();

header('Location: index.php');
?>