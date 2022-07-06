<?php
require __DIR__ . '/../vendor/autoload.php';
require 'funciones.php';
require 'database.php';

//Conectarnos a la DB

use Model\Methods;
Methods::db($db);