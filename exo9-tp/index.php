<?php require('../exo9-tp/Model/pdo.php'); 



$etudiant = $dbPDO->prepare("SELECT * FROM etudiants");
$etudiant->execute();
$etudiants = $etudiant->fetchAll();
echo '<h1>'."liste des éleves:".'</h1>'.'<br>';
echo '<ul>';
foreach ($etudiants as $etudiant) {
    echo '<li>'.$etudiant['id'].' - '.$etudiant['prenom'].' '.$etudiant['nom'].'</li>';
}
echo '</ul>';



echo '<h1>'."liste des Classes:".'</h1>'.'<br>';
$classe = $dbPDO->prepare("SELECT * FROM classes");
$classe->execute();
$classes = $classe->fetchAll();
echo '<ul>';
foreach ($classes as $classe) {
    echo '<li>'.$classe['id'].' - '.$classe['libelle'].'</li>';
}
echo '</ul>';


echo '<h1>'."liste des Porfesseurs:".'</h1>'.'<br>';
$professeur = $dbPDO->prepare("SELECT * FROM professeurs");
$professeur->execute();
$professeurs = $professeur->fetchAll();
echo '<ul>';
foreach ($professeurs as $professeur) {
    echo '<li>'.$professeur['id'].' - '.$professeur['prenom'].'  '.$professeur['nom'].'</li>';
}
echo '</ul>';

echo '<h1>'."liste des Porfesseurs detaillée:".'</h1>'.'<br>';
$bonus = $dbPDO->prepare("SELECT professeurs.nom, professeurs.prenom, matiere.lib AS matiere, classes.libelle AS classe
                          FROM professeurs
                          JOIN matiere ON professeurs.id_matiere = matiere.id
                          JOIN classes ON professeurs.id_classe = classes.id");
$bonus->execute();
$profs = $bonus->fetchAll();
echo '<ul>';
foreach ($profs as $prof) {
    echo '<li>'.$prof['prenom'].' '.$prof['nom'].' '.$prof['matiere'].' '.$prof['classe'].'</li>';
}
echo '</ul>';

// $matiere = 'Anglais';
// $resultat = $dbPDO->prepare("INSERT INTO matiere (lib) VALUES (:matiere)");
// $resultat->bindParam(':matiere', $matiere);
// if ($resultat->execute()) {
//     echo "La matière '$matiere' a été ajoutée avec succès.";
// } else {
//     print_r($resultat->errorInfo());
// }

?>
<h1>Ajouter une matière :</h1>
<form action='../exo9-tp/View/nouvelle_matiere.php' method='post'>
    <label>Entrer votre matière :</label>
    <input type='text' name='libelle' />
    <button type="submit">Valider</button>
</form>