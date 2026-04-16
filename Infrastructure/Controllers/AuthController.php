<?php

require_once __DIR__ . '/../../Application/DTO/LoginUserCommand.php';
require_once __DIR__ . '/../../Application/UseCases/LoginUserService.php';
require_once __DIR__ . '/../Repositories/UsuarioRepositoryMySQL.php';

class AuthController
{
    // Mostrar login
    public function showLogin()
    {
        require_once __DIR__ . '/../../views/login.php';
    }

    // Iniciar sesión
    public function login()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // VALIDACIONES
        if (empty($email) || empty($password)) {
            echo "Todos los campos son obligatorios";
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Email inválido";
            return;
        }

        $command = new LoginUserCommand($email, $password);
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

    // Registro
    public function register()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // VALIDACIONES
        if (empty($email) || empty($password)) {
            echo "Todos los campos son obligatorios";
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Email inválido";
            return;
        }

        $repo = new UsuarioRepositoryMySQL();

        $user = $repo->findByEmail($email);

        if ($user) {
            echo "El usuario ya existe";
            return;
        }

        $repo->save($email, $password);

        echo "Usuario creado correctamente";
    }

    // Logout
    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: index.php?route=showLogin");
    }

    // Recuperar contraseña
    public function recover()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirm = $_POST['confirm_password'] ?? '';

        // Validar campos
        if (empty($email) || empty($password) || empty($confirm)) {
            echo "Todos los campos son obligatorios";
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Email inválido";
            return;
        }

        if ($password !== $confirm) {
            echo "Las contraseñas no coinciden";
            return;
        }

        $repo = new UsuarioRepositoryMySQL();

        $user = $repo->findByEmail($email);

        if (!$user) {
            echo "Usuario no encontrado";
            return;
        }

        $repo->updatePassword($email, $password);

        echo "Contraseña actualizada correctamente";
    }
}