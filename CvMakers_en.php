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
<html lang="en">
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
    <title>Generate your Cv</title>
    <link rel="icon" href="logo.png">
</head>
<body>
  <header class="navbar">
    <div class="container1">
        <a href="Accueil_en_sess.php?token=<?php $id=$_GET['token'];?>">Home</a>
        <a href="#section2">Template</a>
        <a href="Accueil_en_sess.php?token=<?php $id=$_GET['token'];?>">How to create your CV</a>
    </div>
</header>
<select id="language-switch">
  <option value="fr">Français</option>
  <option value="en" selected>English</option>
  <option value="ar">عربي</option>
</select>
    <h1>Create Your Professional Resume</h1> 
    <p id="titre">Fill out the form below</p>
    <div class="container">
        <form method="post" action="" id="cv" enctype="multipart/form-data">
            <div id="leftside">
                <div id="profil">
                    <h2>Profile</h2> 
                    <div id="form-group">
                        <label for="desc">Profile Description :</label><br><br>
                        <textarea id="desc" name="desc" rows="4" cols="50" placeholder="A short paragraph summarizing your skills, professional experience, achievements, and career goals." required></textarea>
                    </div>
                </div>
                <div id="Coordonnees">
                    <h2>Coordinates</h2> 
                    <div id="form-group">
                        <label for="nomp">Name :</label>
                        <input type="text" id="nomp" name="nomp" placeholder="Ex: John Doe" required>
                    </div>
                    <div id="form-group">
                        <label for="adr">Address :</label>
                        <input type="text" id="adr" name="adr" placeholder="Ex: New York, NY, 00000" required>
                    </div>
                    <div id="form-group">
                        <label for="tlf">Phone :</label>
                        <input type="text" id="tlf" name="tlf" placeholder="Ex: +1 000 000 0000" required>
                    </div>
                    <div id="form-group">
                        <label for="mail">Email :</label>
                        <input type="text" id="mail" name="mail" placeholder="Ex: example@email.com" required>
                    </div>
                    <div id="form-group">
                        <label for="lnk">LinkedIn :</label>
                        <input type="text" id="lnk" name="lnk" placeholder="Ex: linkedin.com/in/example/">
                    </div>
                </div>
                <div id="experience">
                    <h2>Work Experience</h2> 
                    <div id="form-group">
                      <label for="nomp">Company Name :</label>
                      <input type="text" id="nome" name="nome" placeholder="Ex: Company Headquarters X" required>
                    </div>
                    <div id="form-group">
                        <label for="pst">Position Held :</label>
                        <input type="text" id="pst" name="pst" placeholder="Ex: DevOps Technician" required>
                      </div>
                      <div id="form-group">
                        <label for="datedeb">Start Date :</label>
                        <input type="date" id="datedeb" name="datedeb" placeholder="DD/MM/YYYY" required>
                      </div>
                      <div id="form-group">
                        <label for="datef">End Date :</label>
                        <input type="date" id="datef" name="datef" placeholder="DD/MM/YYYY" required>
                      </div>
                      <br>
                      <br>
                      <br>
                      <br>
                      <div id="form-group">
                        <label for="desce">Description :</label><br>
                        <br>
                        <textarea id="desce" name="desce" rows="4" cols="50" placeholder="Tasks performed during this period" required></textarea>
                      </div>
                  </div>
                  <br>
              </div>
                <div id="righside">
                  <div id="competences">
                    <div id="form-group">
                        <h2>Skills</h2> 
                        <p id="descc">Enter your skills, separated by a comma:</p> 
                        <textarea id="descc" name="descc" rows="4" cols="50" placeholder="Ex: Java, Python, C#"  required></textarea>
                    </div>
                  <div id="formation">
                    <h2>Education</h2> 
                    <div>
                      <div id="form-group">
                        <label for="ecole">School Name:</label>
                        <input type="text" id="ecole" name="ecole" placeholder="Ex: School of Economics and Commercial Sciences of Tunis" required>
                      </div>
                      <div id="form-group">
                        <label for="dip">Degree Obtained:</label>
                        <input type="text" id="dip" name="dip" placeholder="Ex: Bachelor's Degree in Computer Science" required>
                      </div>
                      <div id="form-group">
                        <label for="anned">Start Year:</label>
                        <input type="date" id="anned" name="anned" placeholder="DD/MM/YYYY" required>
                      </div>
                      <div id="form-group">
                        <label for="annef">End Year:</label>
                        <input type="date" id="annef" name="annef" placeholder="DD/MM/YYYY" required>
                      </div>
                      <div id="form-group">
                        <label for="dom">Study Domain:</label>
                        <input type="text" id="dom" name="dom" placeholder="Ex: E-business" required>
                      </div>
                    </div> 
                  </div>
                  <div id="form-group">
                    <br>
                    <br>
                  </div>
                 <div id="langue">
                  <h2>Languages</h2> 
                  <div id="form-group">
                      <input type="checkbox" id="Français" name="langues[]" value="Français">
                      <label for="Français">French</label>
                  </div>
                  <div id="form-group">
                      <input type="checkbox" id="Anglais" name="langues[]" value="Anglais">
                      <label for="Anglais">English</label>
                  </div>
                  <div id="form-group">
                      <input type="checkbox" id="Espagnol" name="langues[]" value="Espagnol">
                      <label for="Espagnol">Spanish</label> 
                  </div>
                  <div id="form-group">
                      <input type="checkbox" id="Allemand" name="langues[]" value="Allemand">
                      <label for="Allemand">German</label> 
                  </div>
                  <div id="form-group">
                      <label for="autre">Other Language :</label>
                      <input type="text" id="autre" name="langues[]" placeholder="Ex: Chinese">
                  </div>
              </div>
                <div id="form-group">
                  <br>
                  <br>
                  <br>  
                  <input type="file" name="photo">
                </div>
                <button type="submit" id="generation" value="CvMaker" name="gener" >Generate My Resume</button> 
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