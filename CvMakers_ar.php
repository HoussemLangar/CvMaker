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
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
}

#leftside {
    float: right; 
    margin: 20px;
    background-color: #d1d1d1;
    flex: 1;
    padding: 60px;
    border-radius: 4px;
    direction: rtl; 
}

#righside {
    float: left; 
    margin: 20px;
    background-color: #d1d1d1;
    flex: 1;
    padding: 60px;
    border-radius: 4px;
    direction: rtl; 
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
select,
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

a {
    text-decoration: none;
    color: #333;
}

.container1 {
    max-width: 1100px;
    margin: auto;
    overflow: hidden;
    padding: 0px 20px;
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
    float: left;
    cursor: pointer;
    outline: none;
    align-items: left;
    width: max-content;
}
.navbar a:hover {
    color: #4CAF50 ;
}

    </style>
    <title>إنشاء سيرتك الذاتية المهنية</title>
    <link rel="icon" href="logo.png">
</head>
<body>
  <header class="navbar">
    <div class="container1">
        <a href="Accueil_fr_sess.php?token=<?php $id=$_GET['token'];?>">إستقبال</a>
        <a href="#section2">القالب</a>
        <a href="Accueil_fr_sess.php?token=<?php $id=$_GET['token'];?>">كيفية إنشاء سيرتك الذاتية</a>
    </div>
</header>
<select id="language-switch">
  <option value="fr">Français</option>
  <option value="en">English</option>
  <option value="ar" selected>عربي</option>
</select>
  <h1>إنشاء سيرتك الذاتية المهنية</h1>
  <p id="titre">املأ الاستمارة أدناه</p>
  <div class="container">  
  <form method="post" action="" id="cv" enctype="multipart/form-data">
      <div id="leftside">
        <div id="profil">
          <h2>الملف الشخصي</h2>
          <div id="form-group">
            <label for="desc">وصف الملف الشخصي: </label><br>
            <br>
            <textarea id="desc" name="desc" rows="4" cols="50" placeholder="فقرة قصيرة تلخص مهاراتك وخبرتك المهنية وإنجازاتك وأهدافك المهنية." required></textarea>
          </div>
      </div>
      <div id="Coordonnees">
          <h2>بيانات الاتصال</h2>
          <div id="form-group">
            <label for="nomp">الاسم واللقب :</label>
            <input type="text" id="nomp" name="nomp" placeholder="مثال: جان دوبون" required>
          </div>
          <div id="form-group">
              <label for="adr">العنوان :</label>
              <input type="text" id="adr" name="adr" placeholder="مثال: تونس، تونس، 0000" required>
            </div>
            <div id="form-group">
              <label for="tlf">الهاتف :</label>
              <input type="text" id="tlf" name="tlf" placeholder="مثال: +216 00 000 000" required>
            </div>
            <div id="form-group">
              <label for="mail">البريد الإلكتروني :</label>
              <input type="text" id="mail" name="mail" placeholder="مثال: example@gmail.com" required>
            </div>
            <div id="form-group">
              <label for="lnk">لينكدإن :</label>
              <input type="text" id="lnk" name="lnk" placeholder="مثال: linkedin.com/in/Exemple/">
            </div>
      </div>
      
      <div id="experience">
          <h2>خبرة العمل</h2>
          <div id="form-group">
            <label for="nomp">اسم الشركة :</label>
            <input type="text" id="nome" name="nome" placeholder="مثال: مقر شركة X" required>
          </div>
          <div id="form-group">
              <label for="pst">المنصب المحتل :</label>
              <input type="text" id="pst" name="pst" placeholder="مثال: فني في ديفوبس" required>
            </div>
            <div id="form-group">
              <label for="datedeb">تاريخ البداية :</label>
              <input type="date" id="datedeb" name="datedeb" placeholder="يوم/شهر/سنة" required>
            </div>
            <div id="form-group">
              <label for="datef">تاريخ الانتهاء :</label>
              <input type="date" id="datef" name="datef" placeholder="يوم/شهر/سنة" required>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div id="form-group">
              <label for="desce">الوصف :</label><br>
              <br>
              <textarea id="desce" name="desce" rows="4" cols="50" placeholder="المهام المنجزة خلال هذه الفترة" required></textarea>
            </div>
        </div>
        <br>
    </div>
      <div id="righside">
        <div id="competences">
          <div id="form-group">
              <h2>المهارات</h2>
              <p id="descc">أدخل مهاراتك، مفصولة بفاصلة:</p>
              <textarea id="descc" name="descc" rows="4" cols="50" placeholder="مثال: جافا، بيثون، سي شارب"  required></textarea>
          </div>
        <div id="formation">
          <h2>التعليم</h2>
          <div>
            <div id="form-group">
              <label for="ecole">اسم المدرسة:</label>
              <input type="text" id="ecole" name="ecole" placeholder="مثال: المدرسة العليا للعلوم الاقتصادية والتجارية بتونس" required>
            </div>
            <div id="form-group">
              <label for="dip">الشهادة المحصل عليها:</label>
              <input type="text" id="dip" name="dip" placeholder="مثال: الإجازة في إدارة تكنولوجيا المعلومات" required>
            </div>
            <div id="form-group">
              <label for="anned">سنة البدء:</label>
              <input type="date" id="anned" name="anned" placeholder="يوم/شهر/سنة" required>
            </div>
            <div id="form-group">
              <label for="annef">سنة الانتهاء:</label>
              <input type="date" id="annef" name="annef" placeholder="يوم/شهر/سنة" required>
            </div>
            <div id="form-group">
              <label for="dom">مجال الدراسة:</label>
              <input type="text" id="dom" name="dom" placeholder="مثال: التجارة الإلكترونية" required>
            </div>
          </div> 
        </div>
        <div id="form-group">
          <br>
          <br>
        </div>
       <div id="langue">
        <h2>اللغات</h2>
        <div id="form-group">
            <input type="checkbox" id="Français" name="langues[]" value="Français">
            <label for="Français">الفرنسية</label>
        </div>
        <div id="form-group">
            <input type="checkbox" id="Anglais" name="langues[]" value="Anglais">
            <label for="Anglais">الإنجليزية</label>
        </div>
        <div id="form-group">
            <input type="checkbox" id="Espagnol" name="langues[]" value="Espagnol">
            <label for="Espagnol">الإسبانية</label>
        </div>
        <div id="form-group">
            <input type="checkbox" id="Allemand" name="langues[]" value="Allemand">
            <label for="Allemand">الألمانية</label>
        </div>
        <div id="form-group">
            <label for="autre">لغة أخرى :</label>
            <input type="text" id="autre" name="langues[]" placeholder="مثال: الصينية">
        </div>
    </div>
      <div id="form-group">
        <br>
        <br>
        <br>  
        <input type="file" name="photo">
      </div>
      <button type="submit" id="generation" value="CvMaker" name="gener" >إنشاء سيرتي الذاتية</button>
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
