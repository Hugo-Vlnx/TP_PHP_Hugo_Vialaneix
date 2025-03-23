<?php 
require('../Model/pdo.php');

if (isset($_POST['nom']) && isset($_POST['prenom'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $classe_id = 1; 

    $requete = $dbPDO->prepare("INSERT INTO etudiants (nom, prenom, classe_id) VALUES (:nom, :prenom, :classe_id)");
    $requete->bindParam(':nom', $nom);
    $requete->bindParam(':prenom', $prenom);
    $requete->bindParam(':classe_id', $classe_id);
    $requete->execute();

    echo "Nouvel élève ajouté : ".$prenom." ".$nom;
}
?>

<br>
