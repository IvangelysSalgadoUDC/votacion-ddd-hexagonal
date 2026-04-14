<?php

require_once __DIR__ . '/../Ports/In/RecoverPasswordUseCase.php';
require_once __DIR__ . '/../DTO/RecoverPasswordCommand.php';
require_once __DIR__ . '/../../Infrastructure/Repositories/UsuarioRepositoryMySQL.php';

class RecoverPasswordService implements RecoverPasswordUseCase
{
    private $repository;

    public function __construct()
    {
        $this->repository = new UsuarioRepositoryMySQL();
    }

    public function execute(RecoverPasswordCommand $command)
    {
        $user = $this->repository->findByEmail($command->email);

        if (!$user) {
            throw new Exception("Usuario no encontrado");
        }

        // Generar nueva contraseña
        $newPassword = substr(md5(time()), 0, 8);

        // Guardarla en BD
        $this->repository->updatePassword($command->email, $newPassword);

        return $newPassword;
    }
}