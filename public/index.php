<?php

session_start();

// 1. INTERFACES (PRIMERO)
require_once __DIR__ . '/../Application/Ports/In/CreateVotacionUseCase.php';
require_once __DIR__ . '/../Application/Ports/In/GetAllVotacionesUseCase.php';
require_once __DIR__ . '/../Application/Ports/Out/SaveVotacionPort.php';
require_once __DIR__ . '/../Application/Ports/Out/GetAllVotacionesPort.php';


// 2. MODELO
require_once __DIR__ . '/../Domain/Models/Votacion.php';

// 3. DTO
require_once __DIR__ . '/../Application/DTO/CreateVotacionCommand.php';
require_once __DIR__ . '/../Application/DTO/GetAllVotacionesQuery.php';

// 4. SERVICES (DESPUÉS DE INTERFACES)
require_once __DIR__ . '/../Application/UseCases/CreateVotacionService.php';
require_once __DIR__ . '/../Application/UseCases/GetAllVotacionesService.php';

// 5. INFRAESTRUCTURA
require_once __DIR__ . '/../Infrastructure/Repositories/VotacionRepositoryMySQL.php';
require_once __DIR__ . '/../Infrastructure/Controllers/VotacionController.php';
require_once __DIR__ . '/../Infrastructure/Controllers/AuthController.php';

$controller = new VotacionController();
$auth = new AuthController();

$route = $_GET['route'] ?? 'showLogin';

if (!isset($_SESSION['user']) && $route != 'showLogin' && $route != 'login' && $route != 'showRegister' && $route != 'register') {
    header("Location: index.php?route=showLogin");
    exit;
}

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

    case 'edit':
    $controller->edit();
    break;

     case 'update':
    $controller->update();
    break;

     case 'delete':
    $controller->delete();
    break;

    case 'showLogin':
    $auth->showLogin();
    break;

case 'login':
    $auth->login();
    break;

    case 'register':
    $auth->register();
    break;

    case 'showRegister':
    require_once __DIR__ . '/../views/register.php';
    break;

    default:
        echo "Ruta no encontrada";

        
}