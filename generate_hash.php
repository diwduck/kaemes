<?php
// Generate a bcrypt hash for 'admin123'
$password = 'testpebi';
$hash = password_hash($password, PASSWORD_BCRYPT);

echo "Generated Hash: " . $hash;
?>
