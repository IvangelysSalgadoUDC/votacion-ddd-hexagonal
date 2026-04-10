<?php

class CreateVotacionCommand
{
    public function __construct(
        public string $fecha,
        public string $partidoPolitico,
        public string $candidato,
        public string $votante,
        public string $pais,
        public string $departamento,
        public string $ciudad,
        public string $mesa,
        public string $puestoPolitico,
        public int $duracion,
        public string $numeroTarjeton
    ) {}
}