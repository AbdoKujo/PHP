<?php
class Connexion {
    protected $conn;
    private static $host = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $database = "Voitures";

    public function __construct() {
        try {
            $this->conn = new mysqli(self::$host, self::$username, self::$password, self::$database);
            if ($this->conn->connect_error) {
                throw new Exception("Erreur de connexion: " . $this->conn->connect_error);
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}

class CRUD extends Connexion {
    private $data;

    public function __construct($modele = null, $carburant = null) {
        parent::__construct();
        if ($modele !== null && $carburant !== null) {
            $this->data[$modele] = $carburant;
        }
    }

    public function Ajouter($table, $data = null) {
        if ($data === null) {
            $data = $this->data;
        }
        try {
            $stmt = $this->conn->prepare("INSERT INTO $table (modele, carburant) VALUES (?, ?)");
            foreach ($data as $modele => $carburant) {
                $stmt->execute([$modele,$carburant]);
            }
            return true;
        } catch (Exception $e) {
            echo "Erreur d'ajout : " . $e->getMessage();
            return false;
        }
    }

    public function Modifier($table, $id, $modele, $carburant) {
        try {
            $stmt = $this->conn->prepare("UPDATE $table SET modele = ?, carburant = ? WHERE id_modele = ?");
            $stmt->bind_param("ssi", $modele, $carburant, $id);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Erreur de modification : " . $e->getMessage();
            return false;
        }
    }

    public function Supprimer($table, $id) {
        try {
            $stmt = $this->conn->prepare("DELETE FROM $table WHERE id_modele = ?");
            $stmt->bind_param("i", $id);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Erreur de suppression : " . $e->getMessage();
            return false;
        }
    }

    public function Selectionner($table, $id = null) {
        try {
            if ($id === null) {
                $result = $this->conn->query("SELECT * FROM $table");
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                $stmt = $this->conn->prepare("SELECT * FROM $table WHERE id_modele = ?");
                $stmt->bind_param("i", $id);
                $stmt->execute();
                return $stmt->get_result()->fetch_assoc();
            }
        } catch (Exception $e) {
            echo "Erreur de sélection : " . $e->getMessage();
            return false;
        }
    }
}

// Exemple d'utilisation
try {
    $crud = new CRUD();

    // Ajouter un modèle
    $crud->Ajouter("modele", ["Peugeot 208" => "essence"]);

    // Modifier un modèle
    $crud->Modifier("modele", 1, "Renault Clio", "diesel");

    // Supprimer un modèle
    $crud->Supprimer("modele", 2);

    // Sélectionner tous les modèles
    $modeles = $crud->Selectionner("modele");
    foreach ($modeles as $modele) {
        echo $modele['modele'] . " - " . $modele['carburant'] . "<br>";
    }

    // Sélectionner un modèle spécifique
    $modele = $crud->Selectionner("modele", 1);
    if ($modele) {
        echo "Modèle sélectionné : " . $modele['modele'] . " - " . $modele['carburant'];
    }

} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
?>