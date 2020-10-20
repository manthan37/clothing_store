<?php
$db = new mysqli('localhost', 'root', '', 'clothing_store');
if ($db->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
}
