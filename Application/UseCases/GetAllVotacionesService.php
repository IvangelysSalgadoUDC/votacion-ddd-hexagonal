<?php

require_once __DIR__ . '/../Ports/In/GetAllVotacionesUseCase.php';
require_once __DIR__ . '/../Ports/Out/GetAllVotacionesPort.php';
require_once __DIR__ . '/../DTO/GetAllVotacionesQuery.php';

class GetAllVotacionesService implements GetAllVotacionesUseCase
{
    private GetAllVotacionesPort $port;

    public function __construct(GetAllVotacionesPort $port)
    {
        $this->port = $port;
    }

    public function execute(GetAllVotacionesQuery $query): array
    {
        return $this->port->findAll();
    }
}