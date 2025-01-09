<?php
// Generate a bcrypt hash for 'admin123'
$password = 'admin123';
$hash = password_hash($password, PASSWORD_BCRYPT);

echo "Generated Hash: " . $hash;
?>
