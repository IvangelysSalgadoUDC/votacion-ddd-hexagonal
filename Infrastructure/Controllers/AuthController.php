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
        $command = new LoginUserCommand(
            $_POST['email'],
            $_POST['password']
        );

        $service = new LoginUserService();

        try {
            $user = $service->execute($command);

            session_start();
            $_SESSION['user'] = $user['email'];

            header("Location: index.php?route=list");

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}