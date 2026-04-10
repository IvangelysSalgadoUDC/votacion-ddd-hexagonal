<?php

require_once __DIR__ . '/../../Application/DTO/CreateVotacionCommand.php';
require_once __DIR__ . '/../../Application/UseCases/CreateVotacionService.php';
require_once __DIR__ . '/../../Application/UseCases/GetAllVotacionesService.php';
require_once __DIR__ . '/../../Infrastructure/Repositories/VotacionRepositoryMySQL.php';

class VotacionController
{
    public function create()
    {
        require_once __DIR__ . '/../../views/create.php';
    }

    public function store()
    {
        $repository = new VotacionRepositoryMySQL();
        $service = new CreateVotacionService($repository);

        $command = new CreateVotacionCommand(
            $_POST['fecha'],
            $_POST['partidoPolitico'],
            $_POST['candidato'],
            $_POST['votante'],
            $_POST['pais'],
            $_POST['departamento'],
            $_POST['ciudad'],
            $_POST['mesa'],
            $_POST['puestoPolitico'],
            $_POST['duracion'],
            $_POST['numeroTarjeton']
        );

        $service->execute($command);

        header("Location: index.php?route=list");
    }

    public function list()
    {
        $repository = new VotacionRepositoryMySQL();
        $service = new GetAllVotacionesService($repository);

        $votaciones = $service->execute(new GetAllVotacionesQuery());

        require_once __DIR__ . '/../../views/list.php';
    }
}