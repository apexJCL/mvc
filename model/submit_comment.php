<?php

require_once 'dbconn.php';

$conn = new DatabaseConnection();
$conn->query('Call addComment('.$_SESSION['id'].'');