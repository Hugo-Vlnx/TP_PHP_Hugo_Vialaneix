<?php


require('../Model/pdo.php');
echo"<br>";
if (isset($_POST['libelle'])) {
    $libelle = $_POST['libelle'];

    
    $requete = $dbPDO->prepare("INSERT INTO matiere (lib) VALUES (:libelle)");
    $requete->bindParam(':libelle', $libelle);
    $requete->execute();

    echo "Matière ajoutée : " . $libelle;
}
?>

<br>
<a href="../index.php">Retourner à l'index</a>