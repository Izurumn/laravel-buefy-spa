<?php
$salt = 'qQLrLJVd';
$password = 'hehehe';
echo '$SHA$' . $salt . '$' . hash('sha256', hash('sha256', $password) . $salt);
?>