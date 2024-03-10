<?php
function chargerClass($classname)
{
    require $classname.'.php';
}
spl_autoload_register("chargerClass");
session_start();
$con = new PDO('mysql:host=localhost;dbname=bd_cv_maker;', 'root', '');
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$manager = new CvManagers($con);
$id = $_GET['token']; 
if (isset($_POST['gener'])) { 
    $donnees = array(
        'descriptionprofil' => $_POST['desc'],
        'nomprenom' => $_POST['nomp'],
        'adresse' => $_POST['adr'],
        'telephone' => $_POST['tlf'],
        'email' => $_POST['mail'],
        'lienlinkedin' => $_POST['lnk'],
        'descriptioncompetences' => $_POST['descc'],
        'nomentreprise' => $_POST['nome'],
        'poste' => $_POST['pst'],
        'datedebut' => $_POST['datedeb'],
        'datefin' => $_POST['datef'],
        'a' => $_POST['desce'],
        'ecole' => $_POST['ecole'],
        'diplome' => $_POST['dip'],
        'datedeb' => $_POST['anned'],
        'datef' => $_POST['annef'],
        'domaineetude' => $_POST['dom'],
        'langues' => implode(', ', $_POST['langues']),
        'photo' => $_FILES['photo']['name'],
        'token'  => $id
    );
    $uploadDir = "uploads/"; 
    $uploadFile = $uploadDir . basename($_FILES['photo']['name']);

    if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
        echo "Le fichier photo a été téléchargé avec succès.\n";
        $photoLink = "http://".$_SERVER['HTTP_HOST']."/".$uploadFile;
        echo "Lien vers la photo : <a href='$photoLink'>$photoLink</a>";
    } else {
        echo "Erreur lors du téléchargement de la photo.";
    }

    $donnees['photo'] = $_FILES['photo']['name'];
    $cv = new CvManager($donnees); 
    $manager->addCv($cv); 
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}
a {
    text-decoration: none;
    color: #333;
}

.container1 {
    max-width: 1100px;
    margin: auto;
    overflow: hidden;
    padding: 0 20px;
}

.navbar {
    background-color: #444;
    height: 80px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.navbar a {
    color: #fff;
    padding: 0 20px;
}
.container {
    display: flex;
    justify-content: center;
    align-items: center;

}
#leftside {
    float: left;
    margin: 20px;
    background-color: #d1d1d1;
    flex: 1;
    padding: 60px;
    border-radius: 4px;
}

#righside {
    float: right;
    margin: 20px;
    background-color: #d1d1d1;
    flex: 1;
    padding: 60px;
    border-radius: 4px;
}

h2 {
    color: #333;
}

#form-group {
    margin-bottom: 10px;
}

label {
    display: inline-block;
    width: 150px;
}

input[type="text"],
select ,
input[type="date"] {
    width: calc(100% - 170px);
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 5px;
}

input[type="file"] {
    margin-top: 10px;
}

button {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
    margin: 20px;
}

button:hover {
    background-color: #45a049;
}
#ajoute {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
    margin: 20px;
}
#leftside,
#righside {
    display: inline-block;
    width: 450px;
}
h1 {
    font-family: cursive;
    font-size: 4rem;
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: 15px;
    margin-top: 80px;
    text-align: center;
}
#titre{
        font-size: 1.5rem;
        font-weight: 300;
        max-width: 500px;
        margin: 0 auto 40px auto;
        text-align: center;
        font-family: cursive;
        margin-bottom: 80px;
}
select{
    background-color: #c5c5c5;
    color: rgb(0, 0, 0) !important;
    border-color:#c5c5c5;
    color: #c5c5c5;
    float: right;
    cursor: pointer;
    outline: none;
    align-items: right;
    width: max-content;
}
.navbar a:hover {
    color: #4CAF50 ;
}
    </style>
    <title>Générer Votre Cv</title>
    <link rel="icon" href="logo.png">
</head>
<body>
  <header class="navbar">
    <div class="container1">
        <a href="Accueil_fr_sess.php?token=<?php $id=$_GET['token'];?>">Accueil</a>
        <a href="#section2">Template</a>
        <a href="Accueil_fr_sess.php?token=<?php $id=$_GET['token'];?>">Comment créez votre CV</a>
    </div>
</header>
<select id="language-switch">
  <option value="fr" selected>Français</option>
  <option value="en">English</option>
  <option value="ar">عربي</option>
</select>
  <h1>Créez votre CV professionnel</h1>
  <p id="titre">Remplissez le formulaire ce dessous</p>
  <div class="container">  
  <form method="post" action="" id="cv" enctype="multipart/form-data">
      <div id="leftside">
        <div id="profil">
          <h2>Profil</h2>
          <div id="form-group">
            <label for="desc">Description  Profil : </label><br>
            <br>
            <textarea id="desc" name="desc" rows="4" cols="50" placeholder="Un court paragraphe qui résume vos compétences, votre expérience professionnelle, vos réalisations et vos objectifs de carrière." required></textarea>
          </div>
      </div>
      <div id="Coordonnees">
          <h2>Coordonnées</h2>
          <div id="form-group">
            <label for="nomp">Nom et Prénom :</label>
            <input type="text" id="nomp" name="nomp" placeholder="Ex: Jean Dupont" required>
          </div>
          <div id="form-group">
              <label for="adr">Adresse :</label>
              <input type="text" id="adr" name="adr" placeholder="Ex: Tunis, Tunis, 0000" required>
            </div>
            <div id="form-group">
              <label for="tlf">Téléphone :</label>
              <input type="text" id="tlf" name="tlf" placeholder="Ex: +216 00 000 000" required>
            </div>
            <div id="form-group">
              <label for="mail">E-mail :</label>
              <input type="text" id="mail" name="mail" placeholder="Ex: Exemple@gmail.com" required>
            </div>
            <div id="form-group">
              <label for="lnk">Linkedin :</label>
              <input type="text" id="lnk" name="lnk" placeholder="Ex: linkedin.com/in/Exemple/">
            </div>
      </div>
      
      <div id="experience">
          <h2>Expérience de Travail</h2>
          <div id="form-group">
            <label for="nomp">Nom de l'entreprise :</label>
            <input type="text" id="nome" name="nome" placeholder="Ex: Siége sociale X" required>
          </div>
          <div id="form-group">
              <label for="pst">Poste occupé :</label>
              <input type="text" id="pst" name="pst" placeholder="Ex: Technicien en Devops" required>
            </div>
            <div id="form-group">
              <label for="datedeb">Date début :</label>
              <input type="date" id="datedeb" name="datedeb" placeholder="JJ/MM/AAAA" required>
            </div>
            <div id="form-group">
              <label for="datef">Date de fin :</label>
              <input type="date" id="datef" name="datef" placeholder="JJ/MM/AAAA" required>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div id="form-group">
              <label for="desce">Description :</label><br>
              <br>
              <textarea id="desce" name="desce" rows="4" cols="50" placeholder="Tache réalisé pendant cette période" required></textarea>
            </div>
        </div>
        <br>
    </div>
      <div id="righside">
        <div id="competences">
          <div id="form-group">
              <h2>Compétences</h2>
              <p id="descc">Entrez vos compétences, séparées par une virgule :</p>
              <textarea id="descc" name="descc" rows="4" cols="50" placeholder="Ex: Java, Python, C#"  required></textarea>
          </div>
        <div id="formation">
          <h2>Formation</h2>
          <div>
            <div id="form-group">
              <label for="ecole">Nom de l'école:</label>
              <input type="text" id="ecole" name="ecole" placeholder="Ex: Ecole Supérieure des Sciences Economiques et Commerciales de Tunis" required>
            </div>
            <div id="form-group">
              <label for="dip">Diplôme obtenu:</label>
              <input type="text" id="dip" name="dip" placeholder="Ex: Licences en  Informatique de gestion" required>
            </div>
            <div id="form-group">
              <label for="anned">Année de début:</label>
              <input type="date" id="anned" name="anned" placeholder="JJ/MM/AAAA" required>
            </div>
            <div id="form-group">
              <label for="annef">Année de fin:</label>
              <input type="date" id="annef" name="annef" placeholder="JJ/MM/AAAA" required>
            </div>
            <div id="form-group">
              <label for="dom">Domaine d'étude:</label>
              <input type="text" id="dom" name="dom" placeholder="Ex: E-business" required>
            </div>
          </div> 
        </div>
        <div id="form-group">
          <br>
          <br>
        </div>
       <div id="langue">
        <h2>Langues</h2>
        <div id="form-group">
            <input type="checkbox" id="Français" name="langues[]" value="Français">
            <label for="Français">Français</label>
        </div>
        <div id="form-group">
            <input type="checkbox" id="Anglais" name="langues[]" value="Anglais">
            <label for="Anglais">Anglais</label>
        </div>
        <div id="form-group">
            <input type="checkbox" id="Espagnol" name="langues[]" value="Espagnol">
            <label for="Espagnol">Espagnol</label>
        </div>
        <div id="form-group">
            <input type="checkbox" id="Allemand" name="langues[]" value="Allemand">
            <label for="Allemand">Allemand</label>
        </div>
        <div id="form-group">
            <label for="autre">Autre Langue :</label>
            <input type="text" id="autre" name="langues[]" placeholder="Ex: Chinois">
        </div>
    </div>
      <div id="form-group">
        <br>
        <br>
        <br>  
        <input type="file" name="photo">
      </div>
      <button type="submit" id="generation" value="CvMaker" name="gener" >Générer mon CV</button>
      </div>
    </form>
  </div>
  <script>
    const languageSwitch = document.getElementById("language-switch");
    const currentLanguage = localStorage.getItem("currentLanguage") || "fr";
    languageSwitch.value = currentLanguage;

    languageSwitch.addEventListener("change", (event) => {
        localStorage.setItem("currentLanguage", event.target.value);
        window.location.href = `Connexion_${event.target.value}.php`;
    });
</script>
</body>
</html>