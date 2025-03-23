<?php require('../Model/pdo.php'); 



if (isset($_GET['id'])) {
    $id = $_GET['id'];

 
    $requete = $dbPDO->prepare("SELECT * FROM etudiants WHERE id = :id");
    $requete->bindParam(':id', $id);
    $requete->execute();
    $etudiant = $requete->fetch();

  
    if (isset($_POST['nom']) && isset($_POST['prenom'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $classe_id = 1; 


        $update = $dbPDO->prepare("UPDATE etudiants SET nom = :nom, prenom = :prenom, classe_id = :classe_id WHERE id = :id");
        $update->bindParam(':nom', $nom);
        $update->bindParam(':prenom', $prenom);
        $update->bindParam(':classe_id', $classe_id);
        $update->bindParam(':id', $id);
        $update->execute();

        echo "<br>"."Élève modifié : ".$prenom." ".$nom;
    }
    
} 
?>

<h1>Modifier l'élève</h1>
<form action="" method="post">
    <label>Prénom :</label>
    <input type="text" name="prenom" value="<?php echo $etudiant['prenom']; ?>">
    <br>
    <label>Nom :</label>
    <input type="text" name="nom" value="<?php echo $etudiant['nom']; ?>">
    <br>
    <button type="submit">Valider</button>
</form>

<br>
<a href="../index.php">Retourner à l'index</a>

