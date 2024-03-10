<?php
require('connect.php');
session_start();
$session_token = $_GET['token']; 
if (isset($_POST['deconnexion'])) {
    session_unset();
    session_destroy();
    header("Location: Accueil_fr.php");}
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
$id = $_GET['token'];
$stmt = $conn->prepare("SELECT * FROM cv WHERE token = :id LIMIT 1");
$stmt->bindValue(':id', $id);
$stmt->execute();
$donnees_cv = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    line-height: 1.6;
    background-color: #f9f9f9;
    color: #333;
}

.container {
    max-width: 960px;
    margin: 0 auto;
    padding: 20px;
    display: flex;
    justify-content: space-between;
}

.leftPanel {
    flex: 0.4;
    background-color: #78767b;
    padding: 40px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

.rightPanel {
    flex: 0.6;
    background-color: #fff;
    padding: 40px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

.avatar {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    border: 5px solid #000000;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    object-fit: cover; 
    object-position: center;
}


.details {
    margin-top: 40px;
}

.contactIcon {
    margin-right: 10px;
    color: #8e44ad;
}

.ligne-blanc {
    border-top: 1px solid #000000;
    margin: 20px 0;
}

.smallText {
    font-size: 14px;
    color: #ffffff;
}

.workExperience {
    margin-top: 40px;
}


h1 {
    font-size: 32px;
    font-weight: bold;
    margin-bottom: 20px;
    color: #000000;
}

h2 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 10px;
    color: #000000;
}

h3 {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 5px;
    color: #000000;
}
.a {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 5px;
    color: #ffffff;
}

@page {
    size: A4;
    margin: 0;
}

@media print {
    body {
        margin: 0;
        padding: 20px;
    }
}
.skills {
    margin-top: 40px;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.skills h2 {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 10px;
    color: #333;
}

.skillsText {
    font-size: 13px;
    color: #555;
    line-height: 1.6;
}
.pdf{
    color: white;
    border-radius: 5px;
    align-items: center;
    background-color: #4CAF50;
    width: 1100px; 
    height: 50px;
    margin : 50px 50px 50px 50px;
    margin-left: 390px
}
.con-button:hover {
    color: #3e8e41;
}
.bto{
  float: center;
  display: flex;
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
    margin-bottom : 20px;
}

.navbar .a {
    color: #fff;
    padding: 0 15px;
    align-items: center;
    background-color: transparent;
    border: none;
}
.navbar .a:hover {
    color: #4CAF50 ;
}

.hero {
    background-image: url('hero-background.jpg');
    background-size: cover;
    background-position: center;
    height: 60vh;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    color: #000000;
}
.con-button {
    color: #fff;
    border-radius: 5px;
    align-items: center;
    background-color: #444;
    margin-right: 10px;
    width: 100px; 
    height: 35px;
}
.con-button:hover {
    color: #4CAF50 ;
}
.cv{
  font-size: 1.8rem;
    font-weight: 300;
    max-width: 500px;
    margin: 0 auto 40px auto;
    margin-top:17px;
    color:white;
}
p a {
    color : #ffffff;
}

</style>
</head>
<body>
<header class="navbar">
        <div class="container1">
        <p class="cv">Votre CV est prêt .</p>  
        </div>
        <form action="#" method="POST">
            <button type="submit" class="con-button" name="deconnexion">Déconnexion</button>
        </form>
    </header>
  <page size="A4">
    <div class="container">
      <div class="leftPanel">
        <img src="<?php echo $donnees_cv['photo']; ?>" id="profileImage" class="avatar" alt="Photo de profil"/>
        <br>
        <br>
        <div class="details">
          <div id="contactDetails">
            <h2 class="a">
              CONTACT
            </h2>
            <hr class="ligne-blanc">
            <br>
            <div class="smallText">
              <p>
                <i class="fa fa-phone contactIcon" aria-hidden="true"></i>
                <?php echo $donnees_cv['telephone']; ?>
              </p>
              <p>
                <i class="fa fa-envelope contactIcon" aria-hidden="true"></i>
                <a href="mailto:<?php echo $donnees_cv['email']; ?>">
                  <?php echo $donnees_cv['email']; ?>
                </a>
              </p>
              <p>
                <i class="fa fa-map-marker contactIcon" aria-hidden="true"></i>
                <?php echo $donnees_cv['adresse']; ?>
              </p>
              <p>
                <i class="fa fa-linkedin-square contactIcon" aria-hidden="true"></i>
                  <?php echo $donnees_cv['linkedin']; ?>
                </a>
              </p>
            </div>
          </div>
          <br>
          <br>
          <div class="skills">
          <div id="">
            <h2>Langues</h2>
            <hr class="ligne-blanc">
            <br>
            <ul class="skillsText">
            <?php
                $langues = $donnees_cv['langues'];
                $langues_array = explode(", ", $langues);
                foreach ($langues_array as $langue) {
                    echo "<li>$langue</li>";
                }
            ?>
            </ul>
            </div>
          </div>
        </div>
        
        <div class="skills">
        <h2>Compétences</h2>
        <hr class="ligne-blanc">
        <br>
        <p class="skillsText"><?php echo $donnees_cv['competences']; ?></p>
    </div>
</div>

      <div class="rightPanel">
        <div id="nameTitle">
        <br>
        <br>
        <h1>
            <?php echo $donnees_cv['nom_prenom']; ?>
          </h1>
        </div>
        <br>
        <br>
        <br>
        <div>
          <h2 id="aboutMeTitle">
            Profil
          </h2> 
          <br>
          <div class="">
            <p><?php echo $donnees_cv['description_profil']; ?></p>
          </div>
        </div>
        <br>
        <br>
        <div class="workExperience" id="workExperienceSection">
          <h2>
            Expérience de travail
          </h2>
          <ul>
            <li>
              <h3><?php echo $donnees_cv['poste_occupe']; ?></h3>
              <p class="p1">AU <?php echo $donnees_cv['nom_entreprise']; ?></p>
              <p class="p1">Du '<?php echo $donnees_cv['date_debut'] . "' || Au '" . $donnees_cv['date_fin']; ?>'</p>
              <p class="p1"><?php echo $donnees_cv['description_exp']; ?></p>
            </li>
          </ul>
        </div>
        <br>
        <br>
        <div class="workExperience" id="workExperienceSection">
          <h2>
            Formation
          </h2>
          <ul>
            <li>
                <h3><?php echo $donnees_cv['diplome_obtenu']; ?></h3>
                <p class="p1">Spécialité : <?php echo $donnees_cv['domaine_etude']; ?></p>
                <p class="p1">A <?php echo $donnees_cv['nom_ecole']; ?></p>
                <p class="p1">Du '<?php echo $donnees_cv['annee_debut'] . "' || Au '" . $donnees_cv['annee_fin']; ?>'</p>
            </li>
            </ul>
        </div>
      </div>
    </div>
  </page>
  <div class="bto"><button onclick="downloadPDF()" class="pdf">Télécharger PDF</button></div>
  <script>
function downloadPDF() {
    var container = document.querySelector('.container');
    html2pdf(container);
}
</script>
</body>
</html>
