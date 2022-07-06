
<?php

$db = mysqli_connect('localhost', 'root', 'root', 'fruteria');


if (!$db) {
    echo "Error: ";
    echo "errno de depuración: " . mysqli_connect_errno();
    echo "error de depuración: " . mysqli_connect_error();
    exit;
}