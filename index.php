<?php
require_once 'vendor/autoload.php';
$real_path = realpath('src');
use Src\Shared\ContainerDependencyInjection;
require_once 'src/Shared/routes.php';
$container = new ContainerDependencyInjection();






