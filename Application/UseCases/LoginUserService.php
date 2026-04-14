<?php

require_once __DIR__ . '/../Ports/In/LoginUserUseCase.php';
require_once __DIR__ . '/../DTO/LoginUserCommand.php';
require_once __DIR__ . '/../../Infrastructure/Repositories/UsuarioRepositoryMySQL.php';

class LoginUserService implements LoginUserUseCase
{
    private $repository;

    public function __construct()
    {
        $this->repository = new UsuarioRepositoryMySQL();
    }

    public function execute(LoginUserCommand $command)
    {
        $user = $this->repository->findByEmail($command->email);

        if (!$user) {
            throw new Exception("Usuario no encontrado");
        }

        if (!password_verify($command->password, $user['password'])) {
            throw new Exception("Contraseña incorrecta");
        }

        return $user;
    }
}