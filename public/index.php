<?php

require_once __DIR__ . '/../Infrastructure/Controllers/VotacionController.php';
require_once __DIR__ . '/../Application/DTO/GetAllVotacionesQuery.php';

$controller = new VotacionController();

$route = $_GET['route'] ?? 'create';

switch ($route) {
    case 'create':
        $controller->create();
        break;

    case 'store':
        $controller->store();
        break;

    case 'list':
        $controller->list();
        break;

    default:
        echo "Ruta no encontrada";
}