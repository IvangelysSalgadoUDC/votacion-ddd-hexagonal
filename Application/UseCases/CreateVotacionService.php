<?php


require_once __DIR__ . '/../Ports/In/CreateVotacionUseCase.php';
require_once __DIR__ . '/../Ports/Out/SaveVotacionPort.php';
require_once __DIR__ . '/../DTO/CreateVotacionCommand.php';
require_once __DIR__ . '/../../Domain/Models/Votacion.php';

class CreateVotacionService implements CreateVotacionUseCase
{
    private SaveVotacionPort $savePort;

    public function __construct(SaveVotacionPort $savePort)
    {
        $this->savePort = $savePort;
    }

    public function execute(CreateVotacionCommand $command): Votacion
    {
        $votacion = new Votacion(
            $command->fecha,
            $command->partidoPolitico,
            $command->candidato,
            $command->votante,
            $command->pais,
            $command->departamento,
            $command->ciudad,
            $command->mesa,
            $command->puestoPolitico,
            $command->duracion,
            $command->numeroTarjeton
        );

        return $this->savePort->save($votacion);
    }
}