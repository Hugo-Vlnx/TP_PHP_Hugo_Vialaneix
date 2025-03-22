<?php


require('../Model/pdo.php');

if (isset($_POST['libelle'])) {
    $libelle = $_POST['libelle'];

    // Utilisation de 'requete' au lieu de 'req'
    $requete = $dbPDO->prepare("INSERT INTO matiere (lib) VALUES (:libelle)");
    $requete->bindParam(':libelle', $libelle);
    $requete->execute();

    echo "Matière ajoutée : " . $libelle;
}
?>

<br>
<a href="../index.php">Retourner à l'index</a>