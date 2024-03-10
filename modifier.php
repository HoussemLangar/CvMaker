<?php
$token = $_GET['token'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        $updatedData = array(
            'description_profil' => $_POST['description_profil'],
            'nom_prenom' => $_POST['nom_prenom'],
            'adresse' => $_POST['adresse'],
            'telephone' => $_POST['telephone'],
            'email' => $_POST['email'],
            'linkedin' => $_POST['linkedin'],
            'competences' => $_POST['competences'],
            'nom_entreprise' => $_POST['nom_entreprise'],
            'poste_occupe' => $_POST['poste_occupe'],
            'date_debut' => $_POST['date_debut'],
            'date_fin' => $_POST['date_fin'],
            'description_exp' => $_POST['description_exp'],
            'nom_ecole' => $_POST['nom_ecole'],
            'diplome_obtenu' => $_POST['diplome_obtenu'],
            'annee_debut' => $_POST['annee_debut'],
            'annee_fin' => $_POST['annee_fin'],
            'domaine_etude' => $_POST['domaine_etude'],
            'langues' => $_POST['langues'],
            'photo' => $_POST['photo'],
            'token' => $_POST['token']
        );

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bd_cv_maker";

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE cv SET ";
        foreach ($updatedData as $key => $value) {
            $sql .= "$key = :$key, ";
        }
        $sql = rtrim($sql, ', '); 
        $sql .= " WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        foreach ($updatedData as $key => $value) {
            $stmt->bindParam(":$key", $value);
        }
        $stmt->execute();

        header("Location: admin_dashboard.php?token=$token");
        exit();

    } else {
        header("Location: admin_dashboard.php?token=$token");
        exit();
    }
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bd_cv_maker";

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM cv WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {

        header("Location: admin_dashboard.php?token=$token");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier</title>
</head>
<body>
    <h1>Modifier</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label>Description du Profil:</label><br>
    <input type="text" name="description_profil" value="<?php echo $row['description_profil']; ?>"><br>
    <label>Nom et Prénom:</label><br>
    <input type="text" name="nom_prenom" value="<?php echo $row['nom_prenom']; ?>"><br>
    <label>Adresse:</label><br>
    <input type="text" name="adresse" value="<?php echo $row['adresse']; ?>"><br>
    <label>Téléphone:</label><br>
    <input type="text" name="telephone" value="<?php echo $row['telephone']; ?>"><br>
    <label>Email:</label><br>
    <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>
    <label>LinkedIn:</label><br>
    <input type="text" name="linkedin" value="<?php echo $row['linkedin']; ?>"><br>
    <label>Compétences:</label><br>
    <input type="text" name="competences" value="<?php echo $row['competences']; ?>"><br>
    <label>Nom de l'Entreprise:</label><br>
    <input type="text" name="nom_entreprise" value="<?php echo $row['nom_entreprise']; ?>"><br>
    <label>Poste Occupé:</label><br>
    <input type="text" name="poste_occupe" value="<?php echo $row['poste_occupe']; ?>"><br>
    <label>Date de Début:</label><br>
    <input type="text" name="date_debut" value="<?php echo $row['date_debut']; ?>"><br>
    <label>Date de Fin:</label><br>
    <input type="text" name="date_fin" value="<?php echo $row['date_fin']; ?>"><br>
    <label>Description de l'Expérience:</label><br>
    <input type="text" name="description_exp" value="<?php echo $row['description_exp']; ?>"><br>
    <label>Nom de l'École:</label><br>
    <input type="text" name="nom_ecole" value="<?php echo $row['nom_ecole']; ?>"><br>
    <label>Diplôme Obtenu:</label><br>
    <input type="text" name="diplome_obtenu" value="<?php echo $row['diplome_obtenu']; ?>"><br>
    <label>Année de Début:</label><br>
    <input type="text" name="annee_debut" value="<?php echo $row['annee_debut']; ?>"><br>
    <label>Année de Fin:</label><br>
    <input type="text" name="annee_fin" value="<?php echo $row['annee_fin']; ?>"><br>
    <label>Domaine d'Étude:</label><br>
    <input type="text" name="domaine_etude" value="<?php echo $row['domaine_etude']; ?>"><br>
    <label>Langues:</label><br>
    <input type="text" name="langues" value="<?php echo $row['langues']; ?>"><br>
    <label>Photo:</label><br>
    <input type="text" name="photo" value="<?php echo $row['photo']; ?>"><br>
    <label>Token:</label><br>
    <input type="text" name="token" value="<?php echo $row['token']; ?>"><br>
    <br>
    <input type="submit" value="Enregistrer">
</form>

</body>
</html>
