<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../Domain/Models/Votacion.php';
require_once __DIR__ . '/../../Application/Ports/Out/SaveVotacionPort.php';
require_once __DIR__ . '/../../Application/Ports/Out/GetAllVotacionesPort.php';

class VotacionRepositoryMySQL implements SaveVotacionPort, GetAllVotacionesPort
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::connect();
    }

    public function save(Votacion $votacion): Votacion
    {
        $sql = "INSERT INTO votaciones 
        (fecha, partido_politico, candidato, votante, pais, departamento, ciudad, mesa, puesto_politico, duracion, numero_tarjeton)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            $votacion->getFecha(),
            $votacion->getPartidoPolitico(),
            $votacion->getCandidato(),
            $votacion->getVotante(),
            $votacion->getPais(),
            $votacion->getDepartamento(),
            $votacion->getCiudad(),
            $votacion->getMesa(),
            $votacion->getPuestoPolitico(),
            $votacion->getDuracion(),
            $votacion->getNumeroTarjeton()
        ]);

        return $votacion;
    }

    public function findAll(): array
    {
        $sql = "SELECT * FROM votaciones";
        $stmt = $this->conn->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id)
{
    $stmt = $this->conn->prepare("DELETE FROM votaciones WHERE id = ?");
    $stmt->execute([$id]);
}

public function findById($id)
{
    $stmt = $this->conn->prepare("SELECT * FROM votaciones WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function update($data)
{
    $sql = "UPDATE votaciones SET 
        fecha=?, partido_politico=?, candidato=?, votante=?, pais=?, 
        departamento=?, ciudad=?, mesa=?, puesto_politico=?, duracion=?, numero_tarjeton=?
        WHERE id=?";

    $stmt = $this->conn->prepare($sql);

    $stmt->execute([
        $data['fecha'],
        $data['partidoPolitico'],
        $data['candidato'],
        $data['votante'],
        $data['pais'],
        $data['departamento'],
        $data['ciudad'],
        $data['mesa'],
        $data['puestoPolitico'],
        $data['duracion'],
        $data['numeroTarjeton'],
        $data['id']
    ]);
}
}