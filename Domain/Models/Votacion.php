<?php

class Votacion
{
    private string $fecha;
    private string $partidoPolitico;
    private string $candidato;
    private string $votante;
    private string $pais;
    private string $departamento;
    private string $ciudad;
    private string $mesa;
    private string $puestoPolitico;
    private int $duracion;
    private string $numeroTarjeton;

    public function __construct(
        string $fecha,
        string $partidoPolitico,
        string $candidato,
        string $votante,
        string $pais,
        string $departamento,
        string $ciudad,
        string $mesa,
        string $puestoPolitico,
        int $duracion,
        string $numeroTarjeton
    ) {
        $this->fecha = $fecha;
        $this->partidoPolitico = $partidoPolitico;
        $this->candidato = $candidato;
        $this->votante = $votante;
        $this->pais = $pais;
        $this->departamento = $departamento;
        $this->ciudad = $ciudad;
        $this->mesa = $mesa;
        $this->puestoPolitico = $puestoPolitico;
        $this->duracion = $duracion;
        $this->numeroTarjeton = $numeroTarjeton;
    }

    // GETTERS (muy importantes)
    public function getFecha(): string { return $this->fecha; }
    public function getPartidoPolitico(): string { return $this->partidoPolitico; }
    public function getCandidato(): string { return $this->candidato; }
    public function getVotante(): string { return $this->votante; }
    public function getPais(): string { return $this->pais; }
    public function getDepartamento(): string { return $this->departamento; }
    public function getCiudad(): string { return $this->ciudad; }
    public function getMesa(): string { return $this->mesa; }
    public function getPuestoPolitico(): string { return $this->puestoPolitico; }
    public function getDuracion(): int { return $this->duracion; }
    public function getNumeroTarjeton(): string { return $this->numeroTarjeton; }
}