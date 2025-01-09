<?php
$directory = 'uploads/pdf';

// Test if directory exists
if (file_exists($directory)) {
    echo "Directory exists!<br>";
} else {
    echo "Directory does not exist!<br>";
}

// Test if directory is writable
if (is_writable($directory)) {
    echo "Directory is writable!<br>";
} else {
    echo "Directory is NOT writable!<br>";
}

// Try to create a test file
$testFile = $directory . '/test.txt';
if (file_put_contents($testFile, 'Test content')) {
    echo "Successfully wrote to directory!<br>";
    unlink($testFile); // Clean up by removing test file
} else {
    echo "Failed to write to directory!<br>";
}
?>