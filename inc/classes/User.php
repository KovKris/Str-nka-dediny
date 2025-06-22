<?php

class User {
    private $db;

    public function __construct(Database $database) {
        $this->db = $database->getConnection();
    }

    public function index() {
        $stmt = $this->db->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function show($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $email, $role, $password) {
        // Skontrolujeme, či už existuje používateľ s rovnakým emailom
        $stmt = $this->db->prepare("SELECT id FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            // Užívateľ s týmto emailom existuje
            return false;
        }

        // Zašifrujeme heslo
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $this->db->prepare("
            INSERT INTO users (name, email, role, password) 
            VALUES (:name, :email, :role, :password)
        ");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function edit($id, $name, $email, $role) {
        // Overíme, či email už patrí inému používateľovi
        $stmt = $this->db->prepare("SELECT id FROM users WHERE email = :email AND id != :id");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            // Iný používateľ s týmto emailom už existuje
            return false;
        }

        $stmt = $this->db->prepare("
            UPDATE users 
            SET name = :name, email = :email, role = :role
            WHERE id = :id
        ");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function destroy($id) {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
