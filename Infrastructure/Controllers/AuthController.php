<?php

require_once __DIR__ . '/../../Application/DTO/LoginUserCommand.php';
require_once __DIR__ . '/../../Application/UseCases/LoginUserService.php';

class AuthController
{
    public function showLogin()
    {
        require_once __DIR__ . '/../../views/login.php';
    }

    public function login()
{
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    //  VALIDACIONES
    if (empty($email) || empty($password)) {
        echo "Todos los campos son obligatorios";
        return;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email inválido";
        return;
    }

    require_once __DIR__ . '/../../Application/DTO/LoginUserCommand.php';
    require_once __DIR__ . '/../../Application/UseCases/LoginUserService.php';

    $command = new LoginUserCommand($email, $password);
    $service = new LoginUserService();

    try {
        $service->execute($command);

        $_SESSION['user'] = $email;

        header("Location: index.php?route=list");
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}


    public function register()
{
    require_once __DIR__ . '/../Repositories/UsuarioRepositoryMySQL.php';

    $repo = new UsuarioRepositoryMySQL();

    $repo->save($_POST['email'], $_POST['password']);

    echo "Usuario creado correctamente";
}

public function logout()
{
    session_start();
    session_destroy();
    header("Location: index.php?route=showLogin");
}

public function recover()
{
    require_once __DIR__ . '/../../Application/DTO/RecoverPasswordCommand.php';
    require_once __DIR__ . '/../../Application/UseCases/RecoverPasswordService.php';

    $command = new RecoverPasswordCommand($_POST['email']);
    $service = new RecoverPasswordService();

    try {
        $newPassword = $service->execute($command);

        echo "Nueva contraseña: " . $newPassword;

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

}