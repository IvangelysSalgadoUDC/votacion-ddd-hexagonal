<?php
class UsuarioRepositoryMySQL
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::connect();
    }

    public function findByEmail($email)
    {
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function save($email, $password)
    {
        $stmt = $this->conn->prepare("INSERT INTO usuarios (email, password) VALUES (?, ?)");
        $stmt->execute([
            $email,
            password_hash($password, PASSWORD_BCRYPT)
        ]);
    }

    public function updatePassword($email, $newPassword)
    {
        $stmt = $this->conn->prepare("UPDATE usuarios SET password = ? WHERE email = ?");
        $stmt->execute([
            password_hash($newPassword, PASSWORD_BCRYPT),
            $email
        ]);
    }
}