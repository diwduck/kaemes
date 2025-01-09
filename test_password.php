<?php
// Replace this with the hash stored in your database
$hash = '$2y$10$p5N1/RIX.RnNEvFUnRzn8usZehCZOual6RryFwGN20BypYIAnQBnC';

// Replace this with the password you want to test
$password = 'admin123';

// Verify the password
if (password_verify($password, $hash)) {
    echo "Password matches the hash!";
} else {
    echo "Password does not match the hash.";
}
?>
